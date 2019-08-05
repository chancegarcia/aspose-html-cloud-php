<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="ImportApiTest.php">
*   Copyright (c) 2019 Aspose.HTML for Cloud
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

use Client\Invoker\ApiException;
use InvalidArgumentException;
use SplFileObject;

/**
 * ImportApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class ImportApiTest extends BaseTest
{
    /**
     * Test case for getConvertMarkdownToHtml
     * Converts the Markdown document (located on storage) to HTML and returns resulting file in response content.
     */
    public function testgetConvertMarkdownToHtml()
    {
        $fileName = "testpage1.md";
        $folder = "HtmlTestDoc";
        $storage = null;
        $version_id = null;

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertMarkdownToHtml($fileName, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after getConvertMarkdownToHtml");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "GetMarkdownToHtml.html";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);

        //Delete source file
        // If not 200 -> throw error
        self::$api_stor->deleteFile($folder . "/" . $fileName, $storage, $version_id);
    }

    /**
     * Test case for postConvertMarkdownInRequestToHtml
     * Converts the Markdown document (in request content) to HTML and uploads resulting file to storage by specified path.
     */
    public function testpostConvertMarkdownInRequestToHtml()
    {
        $filename = "testpage1.md";
        $folder = "HtmlTestDoc";
        $resultFile = "postConvMarkdownInReqToHtmlJS.html";
        $file = self::$testFolder . $filename;
        $out_path = $folder . "/" .  $resultFile;
        $storage = null;

        //Request to server Api
        self::$api_html->postConvertMarkdownInRequestToHtml($out_path, $file, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);

        //Delete result file
        // If not 200 -> throw error
        self::$api_stor->deleteFile($out_path);
    }

    /**
     * Test case for putConvertMarkdownToHtml
     * Converts the Markdown document (located on storage) to HTML and uploads resulting file to storage by specified path.
     */
    public function testputConvertMarkdownToHtml()
    {
        $fileName = "testpage1.md";
        $folder = "HtmlTestDoc";
        $resultFile = "putConvMarkdownToHtmlJS.html";
        $out_path = $folder . "/" .  $resultFile;
        $storage = null;

        $this->uploadHelper($fileName);

        //Request to server Api
        self::$api_html->putConvertMarkdownToHtml($fileName, $out_path, $folder, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);

        //Delete source file
        self::$api_stor->deleteFile($folder . "/" . $fileName);

        //Delete result file
        // If not 200 -> throw error
        self::$api_stor->deleteFile($out_path);
    }
}
