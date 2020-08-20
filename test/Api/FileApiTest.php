<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="FileApiTest.php">
*   Copyright (c) 2020 Aspose.HTML for Cloud
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
     * @param  string $path Path where to upload including filename and extension e.g. /file.ext or /Folder 1/file.ext             If the content is multipart and path does not contains the file name it tries to get them from filename parameter             from Content-Disposition header. (required)
     * @param  SplFileObject $file File to upload (required)
     * @param  string $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return FilesUploadResult
     */
    public function testUploadFile()
    {
        $name = "test.txt";
        $file = $file = new SplFileObject(self::$testFolder . $name);
        $folder = self::$api_html->config['remoteFolder'];
        $path = $folder . "/" . $name;
        $storage_name = null;

        $response = self::$api_stor->uploadFile($path, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);
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
    public function testDownloadFile()
    {
        $name = "test.txt";
        $folder = self::$api_html->config['remoteFolder'];
        $path = $folder . "/" . $name;
        $storage_name = null;
        $version_id = null;

        $result = self::$api_stor->downloadFile($path, $storage_name, $version_id);

        $this->assertTrue($result->isFile(),"Error download file");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $name);
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
    public function testDeleteFile()
    {
        $name = "test.txt";
        $folder = self::$api_html->config['remoteFolder'];
        $path = $folder . "/" . $name;
        $storage_name = null;
        $version_id = null;
        // If not 200 -> throw error
        self::$api_stor->deleteFile($path, $storage_name, $version_id);
    }

    /**
     * Test case for copyFile
     *
     * @param  string $src_path Source file path e.g. &#39;/folder/file.ext&#39; (required)
     * @param  string $dest_path Destination file path (required)
     * @param  string $src_storage_name Source storage name (optional)
     * @param  string $dest_storage_name Destination storage name (optional)
     * @param  string $version_id File version ID to copy (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */

    public function testCopyFile()
    {
        // Upload file to storage
        $name = "test.txt";
        $file = $file = new SplFileObject(self::$testFolder . $name);
        $folder = self::$api_html->config['remoteFolder'];
        $path = $folder . "/" . $name;
        $storage_name = null;

        $response = self::$api_stor->uploadFile($path, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        //Copy file
        $src_path = "HtmlTestDoc/test.txt";
        $dest_path = "HtmlTestDoc/test_copy.txt";
        $src_storage_name = null;
        $dest_storage_name = null;
        $version_id = null;

        // If not 200 -> throw error
        self::$api_stor->copyFile($src_path, $dest_path, $src_storage_name, $dest_storage_name, $version_id);

        // Delete source file
        // If not 200 -> throw error
        self::$api_stor->deleteFile($src_path, $src_storage_name, $version_id);

        //Delete dest file
        // If not 200 -> throw error
        self::$api_stor->deleteFile($dest_path, $dest_storage_name, $version_id);
    }

    /**
     * Test case for moveFile
     *
     * @param  string $src_path Source file path e.g. &#39;/src.ext&#39; (required)
     * @param  string $dest_path Destination file path e.g. &#39;/dest.ext&#39; (required)
     * @param  string $src_storage_name Source storage name (optional)
     * @param  string $dest_storage_name Destination storage name (optional)
     * @param  string $version_id File version ID to move (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function testMoveFile()
    {
        // Upload file to storage
        $name = "test.txt";
        $file = $file = new SplFileObject(self::$testFolder . $name);
        $folder = self::$api_html->config['remoteFolder'];
        $path = $folder . "/" . $name;
        $storage_name = null;

        $response = self::$api_stor->uploadFile($path, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        // Move file
        $src_path = "HtmlTestDoc/test.txt";
        $dest_path = "HtmlTestDoc/test_moved.txt";
        $src_storage_name = null;
        $dest_storage_name = null;
        $version_id = null;

        // If not 200 -> throw error
        self::$api_stor->moveFile($src_path, $dest_path, $src_storage_name, $dest_storage_name, $version_id);

        //Delete dest file
        // If not 200 -> throw error
        self::$api_stor->deleteFile($dest_path, $dest_storage_name, $version_id);
    }

}
