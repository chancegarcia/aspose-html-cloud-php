<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="FolderApiTest.php">
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
use Client\Invoker\Model\FilesList;
use DateTime;
use InvalidArgumentException;
use SplFileObject;

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
        $path = "TestCreateFolder";
        $storage_name = null;

        //If status code != 200 throw exception
        self::$api_stor->createFolder($path, $storage_name);

        // Checking folder is exists
        $result = self::$api_stor->objectExists($path);
        $this->assertTrue($result->getExists());
        $this->assertTrue($result->getIsFolder());

        //Clear storage
        self::$api_stor->deleteFolder($path, $storage_name, true);

        // Checking folder is not exists
        $result = self::$api_stor->objectExists($path);
        $this->assertFalse($result->getExists());
        $this->assertFalse($result->getIsFolder());
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
        $path = "TestDeleteFolder";
        $storage_name = null;
        $recursive = true;

        //If status code != 200 throw exception
        self::$api_stor->createFolder($path, $storage_name, true);

        // Checking folder is exists
        $result = self::$api_stor->objectExists($path);
        $this->assertTrue($result->getExists());
        $this->assertTrue($result->getIsFolder());

        self::$api_stor->deleteFolder($path, $storage_name, true);

        // Checking folder is not exists
        $result = self::$api_stor->objectExists($path);
        $this->assertFalse($result->getExists());
        $this->assertFalse($result->getIsFolder());
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
        $storage_name = null;
        $name1 = "test.txt";
        $name2 = "test1.html";
        $name3 = "test_en.html";
        $folder = self::$api_html->config['remoteFolder'];

        $file1 = new SplFileObject(self::$testFolder . $name1);
        $file2 = new SplFileObject(self::$testFolder . $name2);
        $file3 = new SplFileObject(self::$testFolder . $name3);

        $response = self::$api_stor->uploadFile($folder, $file1, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        $response = self::$api_stor->uploadFile($folder, $file2, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        $response = self::$api_stor->uploadFile($folder, $file3, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);


        $result = self::$api_stor->getFilesList($folder, $storage_name);
        // Array of the Client\Invoker\Model\StorageFile
        $files = $result->getValue();
        $this->assertTrue(count($files) == 3);

        $one_file = $files[0];
        $this->assertTrue(strlen($one_file->getName()) > 0);
        $this->assertTrue($one_file->getIsFolder() !== null);
        $this->assertTrue($one_file->getModifiedDate() instanceof  DateTime);
        $this->assertTrue($one_file->getSize() >= 0);
        $this->assertTrue(strlen($one_file->getPath()) > 0);
        print_r($files);

        self::$api_stor->deleteFolder($folder, null, true);
        // Checking folder is not exists
        $result = self::$api_stor->objectExists($folder);
        $this->assertFalse($result->getExists());
        $this->assertFalse($result->getIsFolder());

    }

}
