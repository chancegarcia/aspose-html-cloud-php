<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="ConversionApiTest.php">
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

use Client\Invoker\ApiException;
use InvalidArgumentException;
use SplFileObject;

/**
 * ConversionApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class ConversionApiTest extends BaseTest
{
    /**
     * Test case for conversion a local file to a local file for html format
     *
     * Convert the HTML document from the local disk by its name to the specified format.
     * @param string $out_format Resulting format. (required)
     * @param int|null $width Resulting width. (optional)
     * @param int|null $height Resulting height. (optional)
     * @param int|null $left_margin Left resulting margin. (optional)
     * @param int|null $right_margin Right resulting margin. (optional)
     * @param int|null $top_margin Top resulting margin. (optional)
     * @param int|null $bottom_margin Bottom resulting margin. (optional)
     *
     * @dataProvider providerConversion
     *
     */
    public function testConvertLocalToLocalHtml(
        string $out_format,
        int    $width = null,
        int    $height = null,
        int    $left_margin = null,
        int    $right_margin = null,
        int    $top_margin = null,
        int $bottom_margin = null
    ) {
        $src = self::$testFolder . "test1.html";
        $dst = self::$testResult . 'test.' . $out_format;

        $options = [
            'width' => $width,
            'height' => $height,
            'left_margin' => $left_margin,
            'right_margin' => $right_margin,
            'top_margin' => $top_margin,
            'bottom_margin' => $bottom_margin
        ];

        //Request to server Api
        $result = self::$api_html->convertLocalToLocal($src, $dst, $options);

        $this->assertTrue($result->getCode() == 200,"Error code after conversion from html format");
        $this->assertTrue($result->getStatus() == 'completed',"Error status after conversion from html format");
        $this->assertTrue(file_exists($result->getFile()),"File not exists after conversion from html format");
    }

    /**
     * Test case for conversion a local file to a storage file for html format
     *
     * Convert the HTML document from the local disk by its name to the specified format.
     * @param string $out_format Resulting format. (required)
     * @param int|null $width Resulting width. (optional)
     * @param int|null $height Resulting height. (optional)
     * @param int|null $left_margin Left resulting margin. (optional)
     * @param int|null $right_margin Right resulting margin. (optional)
     * @param int|null $top_margin Top resulting margin. (optional)
     * @param int|null $bottom_margin Bottom resulting margin. (optional)
     *
     * @dataProvider providerConversion
     *
     */
    public function testConvertLocalToStorageHtml(
        string $out_format,
        int    $width = null,
        int    $height = null,
        int    $left_margin = null,
        int    $right_margin = null,
        int    $top_margin = null,
        int $bottom_margin = null
    ) {
        $src = self::$testFolder . "test1.html";
        $dst = 'test.' . $out_format;

        $options = [
            'width' => $width,
            'height' => $height,
            'left_margin' => $left_margin,
            'right_margin' => $right_margin,
            'top_margin' => $top_margin,
            'bottom_margin' => $bottom_margin
        ];

        //Request to server Api
        $result = self::$api_html->convertLocalToStorage($src, $dst, null, $options);

        $this->assertTrue($result->getCode() == 200,"Error code after conversion from html format");
        $this->assertTrue($result->getStatus() == 'completed',"Error status after conversion from html format");
        $res = self::$api_stor->objectExists($result->getFile());
        $this->assertTrue($res->getExists(),"File not exists after conversion from html format");
        $this->assertFalse($res->getIsFolder(),"File not exists after conversion from html format");
    }

    /**
     * Test case for conversion the file from storage to the local file for html format
     *
     * Convert the HTML document from the storage by its name to the specified format.
     * @param string $out_format Resulting format. (required)
     * @param int|null $width Resulting width. (optional)
     * @param int|null $height Resulting height. (optional)
     * @param int|null $left_margin Left resulting margin. (optional)
     * @param int|null $right_margin Right resulting margin. (optional)
     * @param int|null $top_margin Top resulting margin. (optional)
     * @param int|null $bottom_margin Bottom resulting margin. (optional)
     *
     * @dataProvider providerConversion
     *
     */
    public function testConvertStorageToLocalHtml(
        string $out_format,
        int    $width = null,
        int    $height = null,
        int    $left_margin = null,
        int    $right_margin = null,
        int    $top_margin = null,
        int $bottom_margin = null
    ) {
        $name = "test1.html";
        $file = new SplFileObject(self::$testFolder . $name);
        $folder = self::$api_html->config['remoteFolder'];
        $storage_name = null;
        $src = $folder . "/" . $name;

        $response = self::$api_stor->uploadFile($folder, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        $dst = self::$testResult . 'test.' . $out_format;

        $options = [
            'width' => $width,
            'height' => $height,
            'left_margin' => $left_margin,
            'right_margin' => $right_margin,
            'top_margin' => $top_margin,
            'bottom_margin' => $bottom_margin
        ];

        //Request to server Api
        $result = self::$api_html->convertStorageToLocal($src, $dst, null, $options);

        $this->assertTrue($result->getCode() == 200,"Error code after conversion from html format");
        $this->assertTrue($result->getStatus() == 'completed',"Error status after conversion from html format");
        $this->assertTrue(file_exists($result->getFile()),"File not exists after conversion from html format");
    }

    /**
     * Test case for conversion the file from storage to the storage for html format
     *
     * Convert the HTML document from the storage by its name to the specified format.
     * @param string $out_format Resulting format. (required)
     * @param int|null $width Resulting width. (optional)
     * @param int|null $height Resulting height. (optional)
     * @param int|null $left_margin Left resulting margin. (optional)
     * @param int|null $right_margin Right resulting margin. (optional)
     * @param int|null $top_margin Top resulting margin. (optional)
     * @param int|null $bottom_margin Bottom resulting margin. (optional)
     *
     * @dataProvider providerConversion
     *
     */
    public function testConvertStorageToStorageHtml(
        string $out_format,
        int    $width = null,
        int    $height = null,
        int    $left_margin = null,
        int    $right_margin = null,
        int    $top_margin = null,
        int $bottom_margin = null
    ) {
        $name = "test1.html";
        $file = new SplFileObject(self::$testFolder . $name);
        $folder = self::$api_html->config['remoteFolder'];
        $storage_name = null;
        $src = $folder . "/" . $name;

        $response = self::$api_stor->uploadFile($folder, $file, $storage_name);
        $this->assertTrue(count($response->getUploaded()) == 1);
        $this->assertTrue(count($response->getErrors()) == 0);

        $dst = $folder . "/test." . $out_format;

        $options = [
            'width' => $width,
            'height' => $height,
            'left_margin' => $left_margin,
            'right_margin' => $right_margin,
            'top_margin' => $top_margin,
            'bottom_margin' => $bottom_margin
        ];

        //Request to server Api
        $result = self::$api_html->convertStorageToStorage($src, $dst, null, $options);

        $this->assertTrue($result->getCode() == 200,"Error code after conversion from html format");
        $this->assertTrue($result->getStatus() == 'completed',"Error status after conversion from html format");
        $res = self::$api_stor->objectExists($result->getFile());
        $this->assertTrue($res->getExists(),"File not exists after conversion from html format");
        $this->assertFalse($res->getIsFolder(),"File not exists after conversion from html format");
    }

    /**
     * Test case for conversion a website to a local file for html format
     *
     * Convert a website to the specified format.
     * @param string $out_format Resulting format. (required)
     * @param int|null $width Resulting width. (optional)
     * @param int|null $height Resulting height. (optional)
     * @param int|null $left_margin Left resulting margin. (optional)
     * @param int|null $right_margin Right resulting margin. (optional)
     * @param int|null $top_margin Top resulting margin. (optional)
     * @param int|null $bottom_margin Bottom resulting margin. (optional)
     *
     * @dataProvider providerConversion
     *
     */
    public function testConvertUrlToLocalHtmlToImage(
        string $out_format,
        int    $width = null,
        int    $height = null,
        int    $left_margin = null,
        int    $right_margin = null,
        int    $top_margin = null,
        int $bottom_margin = null
    ) {
        $src = 'https://stallman.org/articles/anonymous-payments-thru-phones.html';
        $dst = self::$testResult . 'testWeb.' . $out_format;

        $options = [
            'width' => $width,
            'height' => $height,
            'left_margin' => $left_margin,
            'right_margin' => $right_margin,
            'top_margin' => $top_margin,
            'bottom_margin' => $bottom_margin
        ];

        //Request to server Api
        $result = self::$api_html->convertUrlToLocal($src, $dst, $options);

        $this->assertTrue($result->getCode() == 200,"Error code after conversion from html format");
        $this->assertTrue($result->getStatus() == 'completed',"Error status after conversion from html format");
        $this->assertTrue(file_exists($result->getFile()),"File not exists after conversion from html format");
    }

    /**
     * Test case for conversion a website to a storage file for html format
     *
     * Convert the website to the specified image format.
     * @param string $out_format Resulting format. (required)
     * @param int|null $width Resulting width. (optional)
     * @param int|null $height Resulting height. (optional)
     * @param int|null $left_margin Left resulting margin. (optional)
     * @param int|null $right_margin Right resulting margin. (optional)
     * @param int|null $top_margin Top resulting margin. (optional)
     * @param int|null $bottom_margin Bottom resulting margin. (optional)
     *
     * @dataProvider providerConversion
     *
     */
    public function testConvertUrlToStorageHtml(
        string $out_format,
        int    $width = null,
        int    $height = null,
        int    $left_margin = null,
        int    $right_margin = null,
        int    $top_margin = null,
        int $bottom_margin = null
    ) {
        $src = 'https://stallman.org/articles/anonymous-payments-thru-phones.html';
        $dst = 'test.' . $out_format;

        $options = [
            'width' => $width,
            'height' => $height,
            'left_margin' => $left_margin,
            'right_margin' => $right_margin,
            'top_margin' => $top_margin,
            'bottom_margin' => $bottom_margin
        ];

        //Request to server Api
        $result = self::$api_html->convertUrlToStorage($src, $dst, null, $options);

        $this->assertTrue($result->getCode() == 200,"Error code after conversion from html format");
        $this->assertTrue($result->getStatus() == 'completed',"Error status after conversion from html format");
        $res = self::$api_stor->objectExists($result->getFile());
        $this->assertTrue($res->getExists(),"File not exists after conversion from html format");
        $this->assertFalse($res->getIsFolder(),"File not exists after conversion from html format");
    }

    /**
     * Test case for conversion a local file to a local file for html format
     *
     * Convert the HTML document from the local disk by its name to the specified format.
     * @param string $out_format Resulting format. (required)
     * @param int|null $width Resulting width. (optional)
     * @param int|null $height Resulting height. (optional)
     * @param int|null $left_margin Left resulting margin. (optional)
     * @param int|null $right_margin Right resulting margin. (optional)
     * @param int|null $top_margin Top resulting margin. (optional)
     * @param int|null $bottom_margin Bottom resulting margin. (optional)
     *
     * @dataProvider providerConversionEpub
     *
     */
    public function testConvertLocalToLocalEpub(
        string $out_format,
        int    $width = null,
        int    $height = null,
        int    $left_margin = null,
        int    $right_margin = null,
        int    $top_margin = null,
        int $bottom_margin = null
    ) {
        $src = self::$testFolder . "georgia.epub";
        $dst = self::$testResult . 'testEpub.' . $out_format;

        $options = [
            'width' => $width,
            'height' => $height,
            'left_margin' => $left_margin,
            'right_margin' => $right_margin,
            'top_margin' => $top_margin,
            'bottom_margin' => $bottom_margin
        ];

        //Request to server Api
        $result = self::$api_html->convertLocalToLocal($src, $dst, $options);

        $this->assertTrue($result->getCode() == 200,"Error code after conversion from html format");
        $this->assertTrue($result->getStatus() == 'completed',"Error status after conversion from html format");
        $this->assertTrue(file_exists($result->getFile()),"File not exists after conversion from html format");
    }


    public function providerConversion(): array
    {
        return [
            ["pdf"],
            ["pdf", 500, 500],
            ["pdf", 700,  700,  50, 100, 150, 200],
            ["pdf", 800, 1000,  50,  50,  50,  50],
            ["pdf", 800,  800, 200, 150, 100,  50],
            ["pdf", 800, 1200, 100, 100, 100, 100],
            ["pdf", 800, 1400, 150, 150, 150, 150],

            ["xps"],
            ["xps", 500, 500],
            ["xps", 700, 700,   50, 100, 150, 200],
            ["xps", 800, 800,  200, 150, 100,  50],
            ["xps", 800, 1000,  50,  50,  50,  50],
            ["xps", 800, 1200, 100, 100, 100, 100],
            ["xps", 800, 1400, 150, 150, 150, 150],

            ["docx"],
            ["docx", 500, 500],
            ["docx", 700, 700,  200, 150,  10,  50],
            ["docx", 800, 800,   50, 100, 150, 200],
            ["docx", 800, 1000,  50,  50,  50,  50],
            ["docx", 800, 1200, 100, 100, 100, 100],
            ["docx", 800, 1400, 300, 200, 100,   0],

            ["md"],
            ["md", 500, 500],
            ["md", 700, 700,  200, 150, 100,  50],
            ["md", 800, 800,   50, 100, 150, 200],
            ["md", 800, 1000,  50,  50,  50,  50],
            ["md", 800, 1200, 100, 100, 100, 100],
            ["md", 800, 1400, 150, 150, 150, 150],

            ["mhtml"],
            ["mhtml", 500, 500],
            ["mhtml", 700, 700,  200, 150, 100,  50],
            ["mhtml", 800, 800,   50, 100, 150, 200],
            ["mhtml", 800, 1000,  50,  50,  50,  50],
            ["mhtml", 800, 1200, 100, 100, 100, 100],
            ["mhtml", 800, 1400, 150, 150, 150, 150],

            ["jpeg"],
            ["jpeg", 500, 500],
            ["jpeg", 700,  700,  50, 100, 150, 200],
            ["jpeg", 800, 1000,  50,  50,  50,  50],
            ["jpeg", 800,  800, 200, 150, 100,  50],
            ["jpeg", 800, 1200, 100, 100, 100, 100],
            ["jpeg", 800, 1400, 150, 150, 150, 150],

            ["png"],
            ["png", 500, 500],
            ["png", 700, 700,   50, 100, 150, 200],
            ["png", 800, 800,  200, 150, 100,  50],
            ["png", 800, 1000,  50,  50,  50,  50],
            ["png", 800, 1200, 100, 100, 100, 100],
            ["png", 800, 1400, 150, 150, 150, 150],

            ["bmp"],
            ["bmp", 500, 500],
            ["bmp", 700, 700,  200, 150,  10,  50],
            ["bmp", 800, 800,   50, 100, 150, 200],
            ["bmp", 800, 1000,  50,  50,  50,  50],
            ["bmp", 800, 1200, 100, 100, 100, 100],
            ["bmp", 800, 1400, 300, 200, 100,   0],

            ["tiff"],
            ["tiff", 500, 500],
            ["tiff", 700, 700,  200, 150, 100,  50],
            ["tiff", 800, 800,   50, 100, 150, 200],
            ["tiff", 800, 1000,  50,  50,  50,  50],
            ["tiff", 800, 1200, 100, 100, 100, 100],
            ["tiff", 800, 1400, 150, 150, 150, 150],

            ["gif"],
            ["gif", 500, 500],
            ["gif", 700, 700,  200, 150, 100,  50],
            ["gif", 800, 800,   50, 100, 150, 200],
            ["gif", 800, 1000,  50,  50,  50,  50],
            ["gif", 800, 1200, 100, 100, 100, 100],
            ["gif", 800, 1400, 150, 150, 150, 150]
        ];
    }

    public function providerConversionEpub(): array
    {
        return [
            ["pdf"],
            ["pdf", 500, 500],
            ["pdf", 700,  700,  50, 100, 150, 200],
            ["pdf", 800, 1000,  50,  50,  50,  50],
            ["pdf", 800,  800, 200, 150, 100,  50],
            ["pdf", 800, 1200, 100, 100, 100, 100],
            ["pdf", 800, 1400, 150, 150, 150, 150],

            ["xps"],
            ["xps", 500, 500],
            ["xps", 700, 700,   50, 100, 150, 200],
            ["xps", 800, 800,  200, 150, 100,  50],
            ["xps", 800, 1000,  50,  50,  50,  50],
            ["xps", 800, 1200, 100, 100, 100, 100],
            ["xps", 800, 1400, 150, 150, 150, 150],

            ["docx"],
            ["docx", 500, 500],
            ["docx", 700, 700,  200, 150,  10,  50],
            ["docx", 800, 800,   50, 100, 150, 200],
            ["docx", 800, 1000,  50,  50,  50,  50],
            ["docx", 800, 1200, 100, 100, 100, 100],
            ["docx", 800, 1400, 300, 200, 100,  50],

            ["jpeg"],
            ["jpeg", 500, 500],
            ["jpeg", 700,  700,  50, 100, 150, 200],
            ["jpeg", 800, 1000,  50,  50,  50,  50],
            ["jpeg", 800,  800, 200, 150, 100,  50],
            ["jpeg", 800, 1200, 100, 100, 100, 100],
            ["jpeg", 800, 1400, 150, 150, 150, 150],

            ["png"],
            ["png", 500, 500],
            ["png", 700, 700,   50, 100, 150, 200],
            ["png", 800, 800,  200, 150, 100,  50],
            ["png", 800, 1000,  50,  50,  50,  50],
            ["png", 800, 1200, 100, 100, 100, 100],
            ["png", 800, 1400, 150, 150, 150, 150],

            ["bmp"],
            ["bmp", 500, 500],
            ["bmp", 700, 700,  200, 150,  10,  50],
            ["bmp", 800, 800,   50, 100, 150, 200],
            ["bmp", 800, 1000,  50,  50,  50,  50],
            ["bmp", 800, 1200, 100, 100, 100, 100],
            ["bmp", 800, 1400, 300, 200, 100,   0],

            ["tiff"],
            ["tiff", 500, 500],
            ["tiff", 700, 700,  200, 150, 100,  50],
            ["tiff", 800, 800,   50, 100, 150, 200],
            ["tiff", 800, 1000,  50,  50,  50,  50],
            ["tiff", 800, 1200, 100, 100, 100, 100],
            ["tiff", 800, 1400, 150, 150, 150, 150],

            ["gif"],
            ["gif", 500, 500],
            ["gif", 700, 700,  200, 150, 100,  50],
            ["gif", 800, 800,   50, 100, 150, 200],
            ["gif", 800, 1000,  50,  50,  50,  50],
            ["gif", 800, 1200, 100, 100, 100, 100],
            ["gif", 800, 1400, 150, 150, 150, 150]
        ];
    }
}
