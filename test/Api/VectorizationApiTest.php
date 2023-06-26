<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="VectorizationApiTest.php">
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

use SplFileObject;

/**
 * VectorizationApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class VectorizationApiTest extends BaseTest
{
    public function testVectorizationLocalToLocal() {

        $formats = ['bmp', 'jpg', 'gif', 'png', 'tiff'];
        foreach ($formats as $f){
            $src = self::$testFolder . "car." . $f;
            $dst = self::$testResult. 'VectorizeLocToLoc_' . strtoupper($f) . '.svg';

            $result = self::$api_html->vectorizeLocalToLocal($src, $dst);

            $this->assertTrue($result->getCode() == 200,"Error code after vectorization from image to svg format");
            $this->assertTrue($result->getStatus() == 'completed',"Error status after vectorization from image to svg format");
            $this->assertTrue(file_exists($result->getFile()),"File not exists after vectorization from image to svg format");
        }
    }

    public function testVectorizationLocalToLocalWithOpts() {

        $formats = ['bmp', 'jpg', 'gif', 'png', 'tiff'];
        foreach ($formats as $f){
            $src = self::$testFolder . "car." . $f;
            $dst = self::$testResult. 'VectorizeLocToLocWithOpts_' . strtoupper($f) . '.svg';

            $opts = [
                'error_threshold' => 30,
                'max_iterations' => 50,
                'colors_limit' => 3,
                'line_width' => 2.0,
            ];

            $result = self::$api_html->vectorizeLocalToLocal($src, $dst, $opts);

            $this->assertTrue($result->getCode() == 200,"Error code after vectorization from image to svg format");
            $this->assertTrue($result->getStatus() == 'completed',"Error status after vectorization from image to svg format");
            $this->assertTrue(file_exists($result->getFile()),"File not exists after vectorization from image to svg format");
        }
    }

    public function testVectorizationLocalToStorage() {

        $formats = ['bmp', 'jpg', 'gif', 'png', 'tiff'];
        foreach ($formats as $f){
            $src = self::$testFolder . "car." . $f;
            $folder = self::$api_html->config['remoteFolder'];
            $dst = $folder . '/VectorizeLocToStor_' . strtoupper($f) . '.svg';
            $storage = null;

            $result = self::$api_html->vectorizeLocalToStorage($src, $dst, $storage);

            $this->assertTrue($result->getCode() == 200,"Error code after vectorization from image to svg format");
            $this->assertTrue($result->getStatus() == 'completed',"Error status after vectorization from image to svg format");

            $res = self::$api_stor->objectExists($result->getFile());
            $this->assertTrue($res->getExists(),"File not exists after vectorization to SVG format");
            $this->assertFalse($res->getIsFolder(),"File not exists after vectorization to SVG format");
        }
    }


    public function testVectorizationLocalToStorageWithOpts() {

        $formats = ['bmp', 'jpg', 'gif', 'png', 'tiff'];
        foreach ($formats as $f){
            $src = self::$testFolder . "car." . $f;
            $folder = self::$api_html->config['remoteFolder'];
            $dst = $folder . '/VectorizeLocToStorWithOpts_' . strtoupper($f). '.svg';

            $storage = null;
            $opts = [
                'error_threshold' => 30,
                'max_iterations' => 50,
                'colors_limit' => 3,
                'line_width' => 2.0,
            ];

            $result = self::$api_html->vectorizeLocalToStorage($src, $dst, $storage, $opts);

            $this->assertTrue($result->getCode() == 200,"Error code after vectorization from image to svg format");
            $this->assertTrue($result->getStatus() == 'completed',"Error status after vectorization from image to svg format");

            $res = self::$api_stor->objectExists($result->getFile());
            $this->assertTrue($res->getExists(),"File not exists after vectorization to SVG format");
            $this->assertFalse($res->getIsFolder(),"File not exists after vectorization to SVG format");
        }
    }

    public function testVectorizationStorageToLocal() {

        $formats = ['bmp', 'jpg', 'gif', 'png', 'tiff'];
        foreach ($formats as $f) {

            $file = new SplFileObject(self::$testFolder . "car." . $f);
            $folder = self::$api_html->config['remoteFolder'];
            $storage_name = null;
            $src = $folder . "/" . "car." . $f;
            $storage = null;

            $response = self::$api_stor->uploadFile($folder, $file, $storage_name);
            $this->assertTrue(count($response->getUploaded()) == 1);
            $this->assertTrue(count($response->getErrors()) == 0);

            $dst = self::$testResult . 'VectorizeStorToLoc_' . strtoupper($f) . '.svg';

            $result = self::$api_html->convertStorageToLocal($src, $dst, $storage);

            $this->assertTrue($result->getCode() == 200, "Error code after vectorization to SVG format");
            $this->assertTrue($result->getStatus() == 'completed', "Error status after vectorization to SVG format");
            $this->assertTrue(file_exists($result->getFile()), "File not exists after vectorization to SVG format");
        }
    }

    public function testVectorizationStorageToLocalWithOpts() {

        $formats = ['bmp', 'jpg', 'gif', 'png', 'tiff'];
        foreach ($formats as $f) {

            $file = new SplFileObject(self::$testFolder . "car." . $f);
            $folder = self::$api_html->config['remoteFolder'];
            $storage_name = null;
            $src = $folder . "/" . "car." . $f;
            $storage = null;
            $opts = [
                'error_threshold' => 30,
                'max_iterations' => 50,
                'colors_limit' => 3,
                'line_width' => 2.0,
            ];

            $response = self::$api_stor->uploadFile($folder, $file, $storage_name);
            $this->assertTrue(count($response->getUploaded()) == 1);
            $this->assertTrue(count($response->getErrors()) == 0);

            $dst = self::$testResult . 'StorToLocWithOpts_' . strtoupper($f) . '.svg';

            $result = self::$api_html->convertStorageToLocal($src, $dst, $storage, $opts);

            $this->assertTrue($result->getCode() == 200, "Error code after vectorization to SVG format");
            $this->assertTrue($result->getStatus() == 'completed', "Error status after vectorization to SVG format");
            $this->assertTrue(file_exists($result->getFile()), "File not exists after vectorization to SVG format");
        }
    }

    public function testVectorizationStorageToStorage() {

        $formats = ['bmp', 'jpg', 'gif', 'png', 'tiff'];
        foreach ($formats as $f) {

            $file = new SplFileObject(self::$testFolder . "car." . $f);
            $folder = self::$api_html->config['remoteFolder'];
            $storage_name = null;
            $src = $folder . "/" . "car." . $f;
            $storage = null;

            $response = self::$api_stor->uploadFile($folder, $file, $storage_name);
            $this->assertTrue(count($response->getUploaded()) == 1);
            $this->assertTrue(count($response->getErrors()) == 0);

            $dst = $folder . '/VectorizeStorToStor_' . strtoupper($f). '.svg';

            $result = self::$api_html->vectorizeStorageToStorage($src, $dst, $storage);

            $this->assertTrue($result->getCode() == 200, "Error code after vectorization to SVG format");
            $this->assertTrue($result->getStatus() == 'completed', "Error status after vectorization to SVG format");

            $res = self::$api_stor->objectExists($result->getFile());
            $this->assertTrue($res->getExists(),"File not exists after vectorization to SVG format");
            $this->assertFalse($res->getIsFolder(),"File not exists after vectorization to SVG format");
        }
    }

    public function testVectorizationStorageToStorageWithOpts() {

        $formats = ['bmp', 'jpg', 'gif', 'png', 'tiff'];
        foreach ($formats as $f) {

            $file = new SplFileObject(self::$testFolder . "car." . $f);
            $folder = self::$api_html->config['remoteFolder'];
            $storage_name = null;
            $src = $folder . "/" . "car." . $f;


            $response = self::$api_stor->uploadFile($folder, $file, $storage_name);
            $this->assertTrue(count($response->getUploaded()) == 1);
            $this->assertTrue(count($response->getErrors()) == 0);

            $dst = $folder . '/VectorizeStorToStorWithOpts_' . strtoupper($f). '.svg';

            $storage = null;
            $opts = [
                'error_threshold' => 30,
                'max_iterations' => 50,
                'colors_limit' => 3,
                'line_width' => 2.0,
            ];

            $result = self::$api_html->convertStorageToStorage($src, $dst, $storage, $opts);

            $this->assertTrue($result->getCode() == 200, "Error code after vectorization to SVG format");
            $this->assertTrue($result->getStatus() == 'completed', "Error status after vectorization to SVG format");

            $res = self::$api_stor->objectExists($result->getFile());
            $this->assertTrue($res->getExists(),"File not exists after vectorization to SVG format");
            $this->assertFalse($res->getIsFolder(),"File not exists after vectorization to SVG format");
        }
    }


}
