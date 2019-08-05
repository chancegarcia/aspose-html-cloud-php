<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="FolderApiTest.php">
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
use Client\Invoker\Model\FilesList;
use DateTime;
use InvalidArgumentException;

/**
 * FolderApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Model
 */
class FolderApiTest extends BaseTest
{
    /**
     * Test case for createFolder
     *
     * @param  string $path Folder path to create e.g. &#39;folder_1/folder_2/&#39; (required)
     * @param  string $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function testCreateFolder()
    {
        $path = "HtmlTestDoc/TestCreateFolder";
        $storage_name = null;

        //If status code != 200 throw exception
        self::$api_stor->createFolder($path, $storage_name);
    }

    /**
     * Test case for deleteFolder
     *
     * @param  string $path Folder path e.g. &#39;/folder&#39; (required)
     * @param  string $storage_name Storage name (optional)
     * @param  bool $recursive Enable to delete folders, subfolders and files (optional, default to false)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function testDeleteFolder()
    {
        $path = "HtmlTestDoc/TestCreateFolder";
        $storage_name = null;
        $recursive = true;

        //If status code != 200 throw exception
        self::$api_stor->deleteFolder($path, $storage_name, $recursive);
    }

    /**
     * Test case for copyFolder
     *
     * @param  string $src_path Source folder path e.g. &#39;/src&#39; (required)
     * @param  string $dest_path Destination folder path e.g. &#39;/dst&#39; (required)
     * @param  string $src_storage_name Source storage name (optional)
     * @param  string $dest_storage_name Destination storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function testCopyFolder()
    {
        $src_path = 'HtmlTestDoc';
        $dest_path = "HtmlTestDocCopy";
        $src_storage_name = null;
        $dest_storage_name = null;

        //If status code != 200 throw exception
        self::$api_stor->copyFolder($src_path, $dest_path, $src_storage_name, $dest_storage_name);

        //Delete dest folder
        $recursive =true;

        //If status code != 200 throw exception
        self::$api_stor->deleteFolder($dest_path, $src_storage_name, $recursive);
    }

    /**
     * Test case for getFilesList
     *
     * Get all files and folders within a folder
     *
     * @param  string $path Folder path e.g. &#39;/folder&#39; (required)
     * @param  string $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return FilesList
     */
    public function testGetFilesList()
    {
        $path = "HtmlTestDoc";
        $storage_name = null;

        $result = self::$api_stor->getFilesList($path, $storage_name);
        // Array of the Client\Invoker\Model\StorageFile
        $files = $result->getValue();
        $this->assertTrue(count($files) > 0);
        //Client\Invoker\Model\StorageFile
        $one_file = $files[0];
        $this->assertTrue(strlen($one_file->getName()) > 0);
        $this->assertTrue($one_file->getIsFolder() !== null);
        $this->assertTrue($one_file->getModifiedDate() instanceof  DateTime);
        $this->assertTrue($one_file->getSize() >= 0);
        $this->assertTrue(strlen($one_file->getPath()) > 0);
        print_r($files);
    }

    /**
     * Test case for moveFolder
     *
     * @param  string $src_path Folder path to move e.g. &#39;/folder&#39; (required)
     * @param  string $dest_path Destination folder path to move to e.g &#39;/dst&#39; (required)
     * @param  string $src_storage_name Source storage name (optional)
     * @param  string $dest_storage_name Destination storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function testMoveFolder()
    {
        $src_path = "HtmlTestDoc/TestCreateFolder";
        $src_storage_name = null;

        //If status code != 200 throw exception
        self::$api_stor->createFolder($src_path, $src_storage_name);

        $dest_path = "HtmlTestDoc/TestMoveFolder";
        $dest_storage_name = null;

        //If status code != 200 throw exception
        self::$api_stor->moveFolder($src_path, $dest_path, $src_storage_name, $dest_storage_name);

        //Delete moved folder
        //If status code != 200 throw exception
        $recursive = true;
        self::$api_stor->deleteFolder($dest_path, $dest_storage_name, $recursive);
    }
}
