<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="FileApiTest.php">
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

namespace Client\Invoker\Test\Api;

use Client\Invoker\ApiException;
use Client\Invoker\Model\FilesUploadResult;
use InvalidArgumentException;
use SplFileObject;

/**
 * FileApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class FileApiTest extends BaseTest
{
    /**
     * Test case for uploadFile
     *
     * @param  string $path Folder where to upload exclude filename and extension e.g. / or /Folder. (required)
     * @param  SplFileObject $file File to upload (required)
     * @param  string $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function testUploadFile(): void
    {
        $name = "test.txt";
        $file = new SplFileObject(self::$testFolder . $name);
        $folder = self::$api_html->config['remoteFolder'];
        $storage_name = null;

        $response = self::$api_stor->uploadFile($folder, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        // Clear storage
        self::$api_stor->deleteFolder($folder, null, true);
        // Checking folder is not exists
        $result = self::$api_stor->objectExists($folder);
        $this->assertFalse($result->getExists());
        $this->assertFalse($result->getIsFolder());
    }

    /**
     * Test case for downloadFile
     *
     * @param  string $path File path e.g. &#39;/folder/file.ext&#39; (required)
     * @param  string $storage_name Storage name (optional)
     * @param  string $version_id File version ID to download (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function testDownloadFile(): void
    {
        $name = "test.txt";
        $file = new SplFileObject(self::$testFolder . $name);
        $folder = self::$api_html->config['remoteFolder'];
        $storage_name = null;
        $version_id = null;

        $response = self::$api_stor->uploadFile($folder, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        $result = self::$api_stor->downloadFile($folder . "/" . $name, $storage_name, $version_id);

        $this->assertTrue($result->isFile(),"Error download file");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $name);

        // Clear storage
        self::$api_stor->deleteFolder($folder, null, true);
        // Checking folder is not exists
        $result = self::$api_stor->objectExists($folder);
        $this->assertFalse($result->getExists());
        $this->assertFalse($result->getIsFolder());
    }

    /**
     * Test case for deleteFile
     *
     * @param  string $path File path e.g. &#39;/folder/file.ext&#39; (required)
     * @param  string $storage_name Storage name (optional)
     * @param  string $version_id File version ID to delete (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function testDeleteFile(): void
    {

        $name = "test.txt";
        $file = new SplFileObject(self::$testFolder . $name);
        $folder = self::$api_html->config['remoteFolder'];
        $storage_name = null;
        $version_id = null;

        $response = self::$api_stor->uploadFile($folder, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        $full_path = $folder . "/" . $name;

        // Checking file is exists
        $result = self::$api_stor->objectExists($full_path);
        $this->assertTrue($result->getExists());
        $this->assertFalse($result->getIsFolder());


        // If not 200 -> throw error
        self::$api_stor->deleteFile($full_path, $storage_name, $version_id);

        // Checking file is not exists
        $result = self::$api_stor->objectExists($full_path);
        $this->assertFalse($result->getExists());
        $this->assertFalse($result->getIsFolder());

        // Clear storage
        self::$api_stor->deleteFolder($folder, null, true);
        // Checking folder is not exists
        $result = self::$api_stor->objectExists($folder);
        $this->assertFalse($result->getExists());
        $this->assertFalse($result->getIsFolder());

    }

}
