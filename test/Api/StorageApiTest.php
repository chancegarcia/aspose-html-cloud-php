<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="StorageApiTest.php">
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
use Client\Invoker\Model\DiscUsage;
use Client\Invoker\Model\FileVersions;
use Client\Invoker\Model\ObjectExist;
use Client\Invoker\Model\StorageExist;
use DateTime;
use InvalidArgumentException;
use SplFileObject;

/**
 * StorageApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class StorageApiTest extends BaseTest
{

    /**
     * Test case for getDiscUsage
     *
     * @param  string $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return DiscUsage
     */    public function testGetDiscUsage()
    {
        $storage_name = null;
        $result = self::$api_stor->getDiscUsage($storage_name);
        $this->assertTrue($result->getUsedSize() > 0);
        $this->assertTrue($result->getTotalSize() > 0);
    }

    /**
     * Test case for getFileVersions
     *
     * @param  string $path File path e.g. &#39;/file.ext&#39; (required)
     * @param  string $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return FileVersions
     */
    public function testGetFileVersions()
    {
        //Upload files to the storage
        $name = "test1.html";
        $file = $file = new SplFileObject(self::$testFolder . $name);
        $folder = self::$api_html->config['remoteFolder'];
        $path = $folder . "/" . $name;
        $storage_name = null;

        $response = self::$api_stor->uploadFile($path, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        $response = self::$api_stor->uploadFile($path, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        $response = self::$api_stor->uploadFile($path, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        $result = self::$api_stor->getFileVersions($path, $storage_name);
        // \Client\Invoker\Model\FileVersion[]
        $files = $result->getValue();
        $this->assertTrue(count($files) >= 3);
        // \Client\Invoker\Model\FileVersion
        $one_file = $files[0];
        $this->assertTrue(strlen($one_file->getName()) > 0);
        $this->assertFalse($one_file->getIsFolder());
        $this->assertTrue($one_file->getModifiedDate() instanceof DateTime);
        $this->assertTrue($one_file->getSize() >= 0);
        $this->assertTrue(strlen($one_file->getPath()) > 0);
        $this->assertTrue(strlen($one_file->getVersionId()) > 0);
        $this->assertTrue($one_file->getIsLatest() !== null);
    }

    /**
     * Test case for objectExists
     *
     * @param  string $path File or folder path e.g. &#39;/file.ext&#39; or &#39;/folder&#39; (required)
     * @param  string $storage_name Storage name (optional)
     * @param  string $version_id File version ID (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return ObjectExist
     */
    public function testObjectExists()
    {
        $path_exist_file = 'HtmlTestDoc/test1.html';
        $storage_name = null;
        $version_id = null;

        $result = self::$api_stor->objectExists($path_exist_file, $storage_name, $version_id);
        $this->assertTrue($result->getExists());
        $this->assertFalse($result->getIsFolder());

        $path_not_exist_file = 'HtmlTestDoc/test_not_exist.html';
        $storage_name = null;
        $version_id = null;

        $result = self::$api_stor->objectExists($path_not_exist_file, $storage_name, $version_id);
        $this->assertFalse($result->getExists());
        $this->assertFalse($result->getIsFolder());

        $path_exist_folder = 'HtmlTestDoc';
        $storage_name = null;
        $version_id = null;

        $result = self::$api_stor->objectExists($path_exist_folder, $storage_name, $version_id);
        $this->assertTrue($result->getExists());
        $this->assertTrue($result->getIsFolder());

        $path_not_exist_folder = 'NotExistFolder';
        $storage_name = null;
        $version_id = null;

        $result = self::$api_stor->objectExists($path_not_exist_folder, $storage_name, $version_id);
        $this->assertFalse($result->getExists());
        $this->assertFalse($result->getIsFolder());
    }

    /**
     * Test case for storageExists
     *
     * @param  string $storage_name Storage name (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return StorageExist
     */
    public function testStorageExists()
    {
        $storage_name_not_exist = "NotExist";
        $result = self::$api_stor->storageExists($storage_name_not_exist);
        $this->assertFalse($result->getExists());

//        $storage_name_exist = "";
//        $result = self::$api_stor->storageExists($storage_name_exist);
//        $this->assertTrue($result->getExists());
    }
}
