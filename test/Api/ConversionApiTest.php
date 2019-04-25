<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="ConversionApiTest.php">
*   Copyright (c) 2018 Aspose.HTML for Cloud
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

use Aspose\Storage\Model\Requests;

/**
 * ConversionApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class ConversionApiTest extends BaseTest
{

    /**
     * Test case for GetConvertDocumentToImage for html format
     *
     * Convert the HTML document from the storage by its name to the specified image format..
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source document storage. (optional)
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testGetHtmlToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null, $folder = null, $storage = null )
    {
        $fileName = "test1.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToImage
        ( $fileName, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin,
          $resolution, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after conversion from html format");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "HtmlToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution)  ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.' . $out_format);
    }

    /**
     * Test case for GetConvertDocumentToImage for epub format
     *
     * Convert the EPUB document from the storage by its name to the specified image format..
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source document storage. (optional)
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testGetEpubToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null, $folder = null, $storage = null )
    {
        $fileName = "georgia.epub";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToImage
        ( $fileName, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin,
            $resolution, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after conversion from epub format");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "EpubToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution) ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.' . $out_format);
    }


    /**
     * Test case for GetConvertDocumentToImage from svg format
     *
     * Convert the SVG document from the storage by its name to the specified image format..
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source document storage. (optional)
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testGetSvgToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null, $folder = null, $storage = null )
    {
        $fileName = "Map-World.svg";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToImage
        ( $fileName, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin,
            $resolution, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after conversion from svg format");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "SvgToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution)  ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.' . $out_format);
    }

    public function providerConversionToImage()
    {
        return [
    		["jpeg"],
    		["jpeg", 500, 500],
    		["jpeg", 600, 600],
    		["jpeg", 700,  700,  50, 100, 150, 200, 120],
    		["jpeg", 800,  800, 200, 150, 100,  50, 300],
    		["jpeg", 800, 1000,  50,  50,  50,  50, 200],
    		["jpeg", 800, 1200, 100, 100, 100, 100,  96],
    		["jpeg", 800, 1400, 150, 150, 150, 150,  96],
    		["jpeg", 800, 1600, 200, 200, 200, 200,  96],

    		["png"],
    		["png", 500, 500],
    		["png", 600, 600],
    		["png", 700, 700,   50, 100, 150, 200, 120],
    		["png", 800, 800,  200, 150, 100,  50, 300],
    		["png", 800, 1000,  50,  50,  50,  50, 200],
    		["png", 800, 1200, 100, 100, 100, 100,  96],
    		["png", 800, 1400, 150, 150, 150, 150,  96],
    		["png", 800, 1600, 200, 200, 200, 200,  96],

    		["bmp"],
    		["bmp", 500, 500],
    		["bmp", 600, 600],
    		["bmp", 700, 700,  200, 150,  10,  50, 120],
    		["bmp", 800, 800,   50, 100, 150, 200, 300],
    		["bmp", 800, 1000,  50,  50,  50,  50, 200],
    		["bmp", 800, 1200, 100, 100, 100, 100,  96],
    		["bmp", 800, 1400, 300, 200, 100,   0,  96],
    		["bmp", 800, 1600, 150, 150, 150, 150,  96],

    		["tiff"],
    		["tiff", 500, 500],
    		["tiff", 600, 600],
    		["tiff", 700, 700,  200, 150, 100,  50, 120],
    		["tiff", 800, 800,   50, 100, 150, 200, 300],
    		["tiff", 800, 1000,  50,  50,  50,  50, 200],
    		["tiff", 800, 1200, 100, 100, 100, 100,  96],
    		["tiff", 800, 1400, 150, 150, 150, 150,  96],
    		["tiff", 800, 1600, 200, 200, 200, 200,  96]
        ];
    }



    /**
     * Test case for GetConvertDocumentToImageByUrl
     *
     * Convert the HTML page from the web by its URL to the specified image format..
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testGetConvertDocumentToImageByUrl
    ($out_format, $width = null, $height = null, $left_margin = null, $right_margin = null,
     $top_margin = null, $bottom_margin = null, $resolution = null, $folder = null, $storage = null)
    {
        $source_url = "https://stallman.org/articles/anonymous-payments-thru-phones.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        //Request to server Api
        $result = self::$api->GetConvertDocumentToImageByUrl
        ( $source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin,
          $resolution, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "UrlToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution) ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.' . $out_format);
    }


    /**
     * Test case for GetConvertDocumentToPdf from html format
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testGetHtmlToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $fileName = "test1.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToPdf($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "HtmlToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.pdf');
    }

    /**
     * Test case for GetConvertDocumentToPdf from epub format
     *
     * Convert the EPUB document from the storage by its name to PDF.
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testGetEpubToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $fileName = "georgia.epub";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToPdf($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after convert epub to pdf");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "EpubToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.pdf');
    }

    /**
     * Test case for GetConvertDocumentToPdf from svg format
     *
     * Convert the SVG document from the storage by its name to PDF.
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testGetSvgToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $fileName = "Map-World.svg";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToPdf($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after convert svg to pdf");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "SvgToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.pdf');
    }

    public function providerConversionToPdfOrXps()
    {
        return [
      		// Test width, height
    		[null, null, null, null, null, null],
    		[200,  500,  null, null, null, null],
    		[300,  600,  null, null, null, null],
    		[400,  700,  null, null, null, null],
    		[500,  800,  null, null, null, null],
    		[600,  900,  null, null, null, null],
    		[700,  1000, null, null, null, null],
    		[300,  300, null, null, null, null],
            [400,  400, null, null, null, null],
            [500,  500, 10, 10, 10, 10],
            [600,  600, 50, 50, 50, 50],
            [700,  700, 100, 100, 100, 100],
            [800,  800, 50, 100, 150, 200],

      		[null, null, 0, 0, 0, 0],

      		// Test margin left, right
    		[null, null, 40,  0,   0, 0],
    		[null, null, 80,  0,   0, 0],
    		[null, null, 120, 0,   0, 0],
    		[null, null, 160, 0,   0, 0],
    		[null, null, 0,   40,  0, 0],
    		[null, null, 0,   80,  0, 0],
    		[null, null, 0,   120, 0, 0],
    		[null, null, 0,   160, 0, 0],

    		// Test margin top, bottom
      		[null, null, 0, 0, 40,  0  ],
    		[null, null, 0, 0, 80,  0  ],
    		[null, null, 0, 0, 120, 0  ],
    		[null, null, 0, 0, 160, 0  ],
    		[null, null, 0, 0, 0,   40 ],
    		[null, null, 0, 0, 0,   80 ],
    		[null, null, 0, 0, 0,   120],
    		[null, null, 0, 0, 0,   160]
        ];
    }

    /**
     * Test case for GetConvertDocumentToPdfByUrl
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testGetConvertDocumentToPdfByUrl
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $source_url = "https://stallman.org/articles/anonymous-payments-thru-phones.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        //Request to server Api
        $result = self::$api->GetConvertDocumentToPdfByUrl($source_url, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "UrlToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.pdf');
    }

    /**
     * Test case for GetConvertDocumentToXps from html format
     *
     * Convert the HTML document from the storage by its name to XPS..
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testGetHtmlToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $fileName = "test1.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToXps($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after conversion from html format");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "HtmlToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.xps');
    }

    /**
     * Test case for GetConvertDocumentToXps from epub format
     *
     * Convert the EPUB document from the storage by its name to XPS..
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testGetEpubToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $fileName = "georgia.epub";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToXps($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after conversion from epub format");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "EpubToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.xps');
    }

    /**
     * Test case for GetConvertDocumentToXps from svg format
     *
     * Convert the SVG document from the storage by its name to XPS..
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testGetSvgToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $fileName = "Map-World.svg";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToXps($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after conversion from svg format");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "SvgToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.xps');
    }

    /**
     * Test case for GetConvertDocumentToXpsByUrl
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testGetConvertDocumentToXpsByUrl
    ($width = null, $height = null,  $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $source_url = "https://stallman.org/articles/anonymous-payments-thru-phones.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        //Request to server Api
        $result = self::$api->GetConvertDocumentToXpsByUrl($source_url, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "UrlToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.xps');
    }


    /**
     * Test case for PutConvertDocumentInRequestToImage for html format
     *
     * Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format out_format (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testPutHtmlInRequestToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null)
    {
        $resultFile = "putHtmlToImgInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution) ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to image
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        $result = self::$api->PutConvertDocumentInRequestToImage($out_path, $out_format, $file, $width, $height,
             $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . "." . $out_format);
    }

    /**
     * Test case for PutConvertDocumentInRequestToImage for epub format
     *
     * Converts the EPUB document (in request content) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format out_format (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testPutEpubInRequestToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null)
    {
        $resultFile = "putEpubToImgInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution) ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to image
        $filename = "georgia.epub";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        $result = self::$api->PutConvertDocumentInRequestToImage($out_path, $out_format, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . "." . $out_format);
    }

    /**
     * Test case for PutConvertDocumentInRequestToImage for svg format
     *
     * Converts the SVG document (in request content) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format out_format (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testPutSvgInRequestToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null)
    {
        $resultFile = "putSvgToImgInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution) ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to image
        $filename = "Map-World.svg";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        $result = self::$api->PutConvertDocumentInRequestToImage($out_path, $out_format, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . "." . $out_format);
    }

    /**
     * Test case for PutConvertDocumentInRequestToPdf from html format
     *
     * Converts the HTML document (in request content) to PDF and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutHtmlInRequestToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putHtmlToPdfInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to pdf
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        $result = self::$api->PutConvertDocumentInRequestToPdf($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".pdf");
    }

    /**
     * Test case for PutConvertDocumentInRequestToPdf from epub format
     *
     * Converts the EPUB document (in request content) to PDF and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutEpubInRequestToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putEpubToPdfInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to pdf
        $filename = "georgia.epub";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        $result = self::$api->PutConvertDocumentInRequestToPdf($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".pdf");
    }

    /**
     * Test case for PutConvertDocumentInRequestToPdf from svg format
     *
     * Converts the SVG document (in request content) to PDF and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutSvgInRequestToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putSvgToPdfInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to pdf
        $filename = "Map-World.svg";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        $result = self::$api->PutConvertDocumentInRequestToPdf($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".pdf");
    }


    /**
     * Test case for PutConvertDocumentInRequestToXps from html format
     *
     * Converts the HTML document (in request content) to XPS and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutHtmlInRequestToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putHtmlToXpsInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to xps
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        $result = self::$api->PutConvertDocumentInRequestToXps($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".xps");
    }

    /**
     * Test case for PutConvertDocumentInRequestToXps from epub format
     *
     * Converts the EPUB document (in request content) to XPS and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutEpubInRequestToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putEpubToXpsInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to xps
        $filename = "georgia.epub";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        $result = self::$api->PutConvertDocumentInRequestToXps($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".xps");
    }

    /**
     * Test case for PutConvertDocumentInRequestToXps from svg format
     *
     * Converts the SVG document (in request content) to XPS and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutSvgInRequestToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putSvgToXpsInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to xps
        $filename = "Map-World.svg";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        $result = self::$api->PutConvertDocumentInRequestToXps($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".xps");
    }

    /**
     * Test case for PutConvertDocumentToImage from html format
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format out_format (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testPutHtmlToImage
   ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null)
    {
        $resultFile = "putHtmlToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution) ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //test1.html already in storage
        $filename = "test1.html";

        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        $result = self::$api->PutConvertDocumentToImage($filename, $out_path, $out_format, $width, $height,
             $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . "." . $out_format);
    }

    /**
     * Test case for PutConvertDocumentToImage from epub format
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format out_format (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testPutEpubToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null)
    {
        $resultFile = "putEpubToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution) ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //test1.html already in storage
        $filename = "georgia.epub";

        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        $result = self::$api->PutConvertDocumentToImage($filename, $out_path, $out_format, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . "." . $out_format);
    }

    /**
     * Test case for PutConvertDocumentToImage from svg format
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format out_format (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testPutSvgToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null)
    {
        $resultFile = "putSvgToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution) ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //test1.html already in storage
        $filename = "Map-World.svg";

        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        $result = self::$api->PutConvertDocumentToImage($filename, $out_path, $out_format, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . "." . $out_format);
    }

    /**
     * Test case for PutConvertDocumentToPdf from html format
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutHtmlToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putHtmlToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to pdf in storage
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;

        $result = self::$api->PutConvertDocumentToPdf($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".pdf");
    }

    /**
     * Test case for PutConvertDocumentToPdf from epub format
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutEpubToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putEpubToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to pdf in storage
        $filename = "georgia.epub";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;

        $result = self::$api->PutConvertDocumentToPdf($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".pdf");
    }

    /**
     * Test case for PutConvertDocumentToPdf from svg format
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutSvgToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putSvgToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to pdf in storage
        $filename = "Map-World.svg";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;

        $result = self::$api->PutConvertDocumentToPdf($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".pdf");
    }

    /**
     * Test case for PutConvertDocumentToXps from html format
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutHtmlToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putHtmlToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to xps
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        $result = self::$api->PutConvertDocumentToXps($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".xps");
    }

    /**
     * Test case for PutConvertDocumentToXps from epub format
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutEpubToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putEpubToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to xps
        $filename = "georgia.epub";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        $result = self::$api->PutConvertDocumentToXps($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".xps");
    }

    /**
     * Test case for PutConvertDocumentToXps from svg format
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPutSvgToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putSvgToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to xps
        $filename = "Map-World.svg";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        $result = self::$api->PutConvertDocumentToXps($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . ".xps");
    }

    public function providerMarkdown()
    {
        return [ ["true"], ["false"] ];
    }

    public function testGetConvertDocumentToMHTMLByUrl()
    {
        $source_url = "https://www.yahoo.com";

        //Request to server Api
        $result = self::$api->GetConvertDocumentToMHTMLByUrl($source_url);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "UrlToMhtml.mht";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);
    }

    /**
     * Test case for GetConvertDocumentToMarkdown
     *
     * Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.
     *
     * @param  string $name Document name. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder Source document folder. (optional)
     * @param  string $storage Source document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerMarkdown
     *
     */
    public function testGetConvertDocumentToMarkdown($use_git)
    {
        $fileName = "test_md.html";
        $folder = "HtmlTestDoc";
        $storage = null;

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToMarkdown($fileName, $use_git, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after GetConvertDocumentToMarkdown");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "GetHtmlToMarkdown_";
        $resultFile .= $use_git == "true" ? "useGit" : "not_useGit";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.md');
    }

    /**
     * Test case for PutConvertDocumentInRequestToMarkdown
     *
     * Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     *
     * @dataProvider providerMarkdown
     *
     */
    public function testPutConvertDocumentInRequestToMarkdown($use_git)
    {
        $filename = "test_md.html";
        $folder = "HtmlTestDoc";
        $resultFile = "putConvDocInReqToMarkdownJS_";
        $resultFile .= $use_git == "true" ? "useGit.md" : "not_useGit.md";
        $file = self::$testFolder . $filename;
        $out_path = $folder . "/" .  $resultFile;

        //Request to server Api
        $result = self::$api->PutConvertDocumentInRequestToMarkdown($out_path, $file, $use_git);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);
        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);

        $this->assertTrue($result->isFile(),"Error result after putConvDocInReqToMarkdown");
        $this->assertTrue($result->getSize() > 0,"Zero result");
    }

    /**
     * Test case for PutConvertDocumentToMarkdown
     *
     * Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     *
     * @dataProvider providerMarkdown
     *
     */
    public function testPutConvertDocumentToMarkdown($use_git)
    {
        $filename = "test_md.html";
        $folder = "HtmlTestDoc";
        $resultFile = "putConvDocToMarkdownJS_";
        $resultFile .= $use_git == "true" ? "useGit.md" : "not_useGit.md";
        $out_path = $folder . "/" .  $resultFile;

        //Request to server Api
        $result = self::$api->PutConvertDocumentToMarkdown($filename, $out_path, $use_git, $folder, null);

        //Download result from storage
        $request = new Requests\GetDownloadRequest($out_path, null, null);
        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);

        $this->assertTrue($result->isFile(),"Error result after putConvDocInReqToMarkdown");
        $this->assertTrue($result->getSize() > 0,"Zero result");
    }
}
