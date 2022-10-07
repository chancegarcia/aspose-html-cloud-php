<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="BaseTest.php">
*   Copyright (c) 2022 Aspose.HTML for Cloud
* </copyright>
* <summary>
*   Permission is hereby granted, free of charge, to any person obtaining a copy
*  of this software and associated documentation files (the "Software"), to deal
*  in the Software without restriction, including without limitation the rights
*  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
*  copies of the Software, and to permit persons to whom the Software is
*  furnished to do so, subject to the following conditions:
*
*  The above copyright notice and this permission notice shall be included in all
*  copies or substantial portions of the Software.
*
*  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
*  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
*  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
*  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
*  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
*  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
*  SOFTWARE.
* </summary>
* --------------------------------------------------------------------------------------------------------------------
*/


namespace Client\Invoker\Api;


use SplFileObject;

abstract class BaseTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Api object
     */
    protected static HtmlApi $api_html;

    /**
     * Storage Api
     */
    protected static StorageApi $api_stor;

    /**
     * Folder with test samples
     */
    protected static string $testFolder;

    /**
     * Folder for storage result
     */
    protected static string $testResult;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass() : void
    {

 //Configuration - pass by constructor
        $configuration = array(
//            "basePath" => "https://api.aspose.cloud/v4.0",
//            "authPath" => "https://api.aspose.cloud/connect/token",
//            "apiKey" => "71a5b89b3f83cd39195d7fc39382babd",
//            "appSID" => "5add06cf-9af7-44f6-b180-dfcc2583cfcb",
            "basePath" => "http://localhost:5000/v4.0",
            "authPath" => "https://api-qa.aspose.cloud/connect/token",
            "apiKey" => "html.cloud",
            "appSID" => "html.cloud",

            "testResult" => "\\testresult\\",
            "testData" => "\\testdata\\",
            "remoteFolder" => "HtmlTestDocPhpSdk",
            "defaultUserAgent" => "Webkit",
            "debugFile" => "debug.txt",
            "debug" => false
        );

        self::$api_html = new HtmlApi($configuration);
        self::$api_stor = new StorageApi($configuration);
        self::$testFolder = realpath(__DIR__ . '/../..') . $configuration['testData'];
        self::$testResult = realpath(__DIR__ . '/../..') . $configuration['testResult'];
    }

    public function downloadHelper($path)
    {
        $storage_name = null;
        $version_id = null;

        $result = self::$api_stor->downloadFile($path, $storage_name, $version_id);

        $this->assertTrue($result->isFile(),"Error download file");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "".basename($path));
    }

    public function uploadHelper($filename, $uploadFolder = null)
    {
        $file = new SplFileObject(self::$testFolder . $filename);
        $folder = $uploadFolder ?: self::$api_html->config['remoteFolder'];
        $path = $folder . "/" . $filename;
        $storage_name = null;

        $response = self::$api_stor->uploadFile($path, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        //Assert - file exist
        $version_id = null;

        $result = self::$api_stor->objectExists($path, $storage_name, $version_id);
        $this->assertTrue($result->getExists());
        $this->assertFalse($result->getIsFolder());
   }
}