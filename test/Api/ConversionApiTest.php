<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="ConversionApiTest.php">
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
 * ConversionApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class ConversionApiTest extends BaseTest
{

    /**
     * Test case for getConvertDocumentToImage for html format
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
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToImage
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
        copy($result->getRealPath(), self::$testResult . $resultFile . '.' . $out_format . '.zip');
    }

    /**
     * Test case for getConvertDocumentToImage for epub format
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
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToImage
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
        copy($result->getRealPath(), self::$testResult . $resultFile . '.' . $out_format . ".zip");
    }


    /**
     * Test case for getConvertDocumentToImage from svg format
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
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToImage
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
    		["jpeg", 700,  700,  50, 100, 150, 200, 120],
    		["jpeg", 800,  800, 200, 150, 100,  50, 300],
    		["jpeg", 800, 1000,  50,  50,  50,  50, 200],
    		["jpeg", 800, 1200, 100, 100, 100, 100,  96],
    		["jpeg", 800, 1400, 150, 150, 150, 150,  96],

    		["png"],
    		["png", 500, 500],
    		["png", 700, 700,   50, 100, 150, 200, 120],
    		["png", 800, 800,  200, 150, 100,  50, 300],
    		["png", 800, 1000,  50,  50,  50,  50, 200],
    		["png", 800, 1200, 100, 100, 100, 100,  96],
    		["png", 800, 1400, 150, 150, 150, 150,  96],

    		["bmp"],
    		["bmp", 500, 500],
    		["bmp", 700, 700,  200, 150,  10,  50, 120],
    		["bmp", 800, 800,   50, 100, 150, 200, 300],
    		["bmp", 800, 1000,  50,  50,  50,  50, 200],
    		["bmp", 800, 1200, 100, 100, 100, 100,  96],
    		["bmp", 800, 1400, 300, 200, 100,   0,  96],

    		["tiff"],
    		["tiff", 500, 500],
    		["tiff", 700, 700,  200, 150, 100,  50, 120],
    		["tiff", 800, 800,   50, 100, 150, 200, 300],
    		["tiff", 800, 1000,  50,  50,  50,  50, 200],
    		["tiff", 800, 1200, 100, 100, 100, 100,  96],
    		["tiff", 800, 1400, 150, 150, 150, 150,  96],

            ["gif"],
            ["gif", 500, 500],
            ["gif", 700, 700,  200, 150, 100,  50, 120],
            ["gif", 800, 800,   50, 100, 150, 200, 300],
            ["gif", 800, 1000,  50,  50,  50,  50, 200],
            ["gif", 800, 1200, 100, 100, 100, 100,  96],
            ["gif", 800, 1400, 150, 150, 150, 150,  96]
        ];
    }



    /**
     * Test case for getConvertDocumentToImageByUrl
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
    public function testgetConvertDocumentToImageByUrl
    ($out_format, $width = null, $height = null, $left_margin = null, $right_margin = null,
     $top_margin = null, $bottom_margin = null, $resolution = null, $folder = null, $storage = null)
    {
        $source_url = "https://stallman.org/articles/anonymous-payments-thru-phones.html";
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToImageByUrl
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
        copy($result->getRealPath(), self::$testResult . $resultFile . '.' . $out_format . '.zip');
    }


    /**
     * Test case for getConvertDocumentToPdf from html format
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
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToPdf($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "HtmlToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .=".pdf";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);
    }

    /**
     * Test case for getConvertDocumentToPdf from epub format
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
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToPdf($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after convert epub to pdf");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "EpubToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .=".pdf";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);
    }

    /**
     * Test case for getConvertDocumentToPdf from svg format
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
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToPdf($fileName, $width, $height, $left_margin, $right_margin,
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
     * Test case for getConvertDocumentToPdfByUrl
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
    public function testgetConvertDocumentToPdfByUrl
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $source_url = "https://stallman.org/articles/anonymous-payments-thru-phones.html";
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToPdfByUrl($source_url, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "UrlToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .=".pdf";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);
    }

    /**
     * Test case for getConvertDocumentToXps from html format
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
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToXps($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after conversion from html format");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "HtmlToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .=".xps";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);
    }

    /**
     * Test case for getConvertDocumentToXps from epub format
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
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToXps($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after conversion from epub format");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "EpubToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .=".xps";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);
    }

    /**
     * Test case for getConvertDocumentToXps from svg format
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
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToXps($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after conversion from svg format");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "SvgToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .=".xps";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);
    }

    /**
     * Test case for getConvertDocumentToXpsByUrl
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
    public function testgetConvertDocumentToXpsByUrl
    ($width = null, $height = null,  $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $source_url = "https://stallman.org/articles/anonymous-payments-thru-phones.html";
        $folder = $folder ?: self::$api_html->config['remoteFolder'];

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToXpsByUrl($source_url, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "UrlToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .=".xps";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);
    }


    /**
     * Test case for postConvertDocumentInRequestToImage for html format
     *
     * Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format out_format (required)
     * @param  SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testPostHtmlInRequestToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null)
    {
        $resultFile = "postHtmlToImgInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution) ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .="." . $out_format . '.zip';

            //Convert html to image
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;

        self::$api_html->postConvertDocumentInRequestToImage($out_path, $out_format, $file, $width, $height,
             $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for postConvertDocumentInRequestToImage for epub format
     *
     * Converts the EPUB document (in request content) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format out_format (required)
     * @param  SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testPostEpubInRequestToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null)
    {
        $resultFile = "postEpubToImgInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution) ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .= "." . $out_format . ".zip";

            //Convert html to image
        $filename = "georgia.epub";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        self::$api_html->postConvertDocumentInRequestToImage($out_path, $out_format, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for postConvertDocumentInRequestToImage for svg format
     *
     * Converts the SVG document (in request content) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format out_format (required)
     * @param  SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testPostSvgInRequestToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $resolution = null)
    {
        $resultFile = "postSvgToImgInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($resolution) ? $resolution . "x" . $resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .= "." . $out_format;

        //Convert svg to image
        $filename = "Map-World.svg";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        self::$api_html->postConvertDocumentInRequestToImage($out_path, $out_format, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for postConvertDocumentInRequestToPdf from html format
     *
     * Converts the HTML document (in request content) to PDF and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPostHtmlInRequestToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "postHtmlToPdfInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .= ".pdf";

        //Convert html to pdf
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        self::$api_html->postConvertDocumentInRequestToPdf($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for postConvertDocumentInRequestToPdf from epub format
     *
     * Converts the EPUB document (in request content) to PDF and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPostEpubInRequestToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "postEpubToPdfInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .= ".pdf";

        //Convert epub to pdf
        $filename = "georgia.epub";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        self::$api_html->postConvertDocumentInRequestToPdf($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for postConvertDocumentInRequestToPdf from svg format
     *
     * Converts the SVG document (in request content) to PDF and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPostSvgInRequestToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "postSvgToPdfInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .= ".pdf";

            //Convert svg to pdf
        $filename = "Map-World.svg";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        self::$api_html->postConvertDocumentInRequestToPdf($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $this->downloadHelper($out_path);
    }


    /**
     * Test case for postConvertDocumentInRequestToXps from html format
     *
     * Converts the HTML document (in request content) to XPS and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPostHtmlInRequestToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "postHtmlToXpsInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .=".xps";

            //Convert html to xps
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        self::$api_html->postConvertDocumentInRequestToXps($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for postConvertDocumentInRequestToXps from epub format
     *
     * Converts the EPUB document (in request content) to XPS and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPostEpubInRequestToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "postEpubToXpsInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .= ".xps";

        //Convert epub to xps
        $filename = "georgia.epub";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        self::$api_html->postConvertDocumentInRequestToXps($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for postConvertDocumentInRequestToXps from svg format
     *
     * Converts the SVG document (in request content) to XPS and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     *
     * @dataProvider providerConversionToPdfOrXps
     *
     */
    public function testPostSvgInRequestToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "postSvgToXpsInReq_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";
        $resultFile .= ".xps";

        //Convert svg to xps
        $filename = "Map-World.svg";
        $out_path = "HtmlTestDoc/".$resultFile;
        $file = self::$testFolder . $filename;
        self::$api_html->postConvertDocumentInRequestToXps($out_path, $file, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for putConvertDocumentToImage from html format
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
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
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
        $resultFile .= "." . $out_format . '.zip';

        //test1.html already in storage
        $filename = "test1.html";

        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        self::$api_html->putConvertDocumentToImage($filename, $out_path, $out_format, $width, $height,
             $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for putConvertDocumentToImage from epub format
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
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
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
        $resultFile .= "." . $out_format . ".zip";

        //test1.html already in storage
        $filename = "georgia.epub";

        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        self::$api_html->putConvertDocumentToImage($filename, $out_path, $out_format, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for putConvertDocumentToImage from svg format
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
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
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
        $resultFile .= "." . $out_format;

        //test1.html already in storage
        $filename = "Map-World.svg";

        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        self::$api_html->putConvertDocumentToImage($filename, $out_path, $out_format, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for putConvertDocumentToPdf from html format
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
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
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
        $resultFile .= ".pdf";

        //Convert html to pdf in storage
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;

        self::$api_html->putConvertDocumentToPdf($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for putConvertDocumentToPdf from epub format
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
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
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
        $resultFile .= ".pdf";

        //Convert html to pdf in storage
        $filename = "georgia.epub";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;

        self::$api_html->putConvertDocumentToPdf($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for putConvertDocumentToPdf from svg format
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
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
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
        $resultFile .= ".pdf";

        //Convert html to pdf in storage
        $filename = "Map-World.svg";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;

        self::$api_html->putConvertDocumentToPdf($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for putConvertDocumentToXps from html format
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
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
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
        $resultFile .= ".xps";

        //Convert html to xps
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        self::$api_html->putConvertDocumentToXps($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for putConvertDocumentToXps from epub format
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
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
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
        $resultFile .= ".xps";

        //Convert epub to xps
        $filename = "georgia.epub";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        self::$api_html->putConvertDocumentToXps($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for putConvertDocumentToXps from svg format
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
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
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
        $resultFile .= ".xps";

        //Convert svg to xps
        $filename = "Map-World.svg";
        $out_path = "HtmlTestDoc/".$resultFile;
        $folder = "HtmlTestDoc";
        $storage = null;
        self::$api_html->putConvertDocumentToXps($filename, $out_path, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    public function providerMarkdown()
    {
        return [ ["true"], ["false"] ];
    }

    public function testgetConvertDocumentToMHTMLByUrl()
    {
        $source_url = "https://www.yahoo.com";

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToMHTMLByUrl($source_url);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "UrlToMhtml.mht";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile);
    }

    /**
     * Test case for getConvertDocumentToMarkdown
     *
     * Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.
     *
     * @param  string $name Document name. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder Source document folder. (optional)
     * @param  string $storage Source document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     * @dataProvider providerMarkdown
     *
     */
    public function testgetConvertDocumentToMarkdown($use_git)
    {
        $fileName = "test_md.html";
        $folder = "HtmlTestDoc";
        $storage = null;

        $this->uploadHelper($fileName);

        //Request to server Api
        $result = self::$api_html->getConvertDocumentToMarkdown($fileName, $use_git, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after getConvertDocumentToMarkdown");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "GetHtmlToMarkdown_";
        $resultFile .= $use_git == "true" ? "useGit" : "not_useGit";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.md');
    }

    /**
     * Test case for postConvertDocumentInRequestToMarkdown
     *
     * Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  SplFileObject $file A file to be converted. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     * @dataProvider providerMarkdown
     *
     */
    public function testpostConvertDocumentInRequestToMarkdown($use_git)
    {
        $filename = "test_md.html";
        $folder = "HtmlTestDoc";
        $resultFile = "postConvDocInReqToMarkdownJS_";
        $resultFile .= $use_git == "true" ? "useGit.md" : "not_useGit.md";
        $file = self::$testFolder . $filename;
        $out_path = $folder . "/" .  $resultFile;

        //Request to server Api
        self::$api_html->postConvertDocumentInRequestToMarkdown($out_path, $file, $use_git);

        //Download result from storage
        $this->downloadHelper($out_path);
    }

    /**
     * Test case for putConvertDocumentToMarkdown
     *
     * Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     *
     * @dataProvider providerMarkdown
     *
     */
    public function testputConvertDocumentToMarkdown($use_git)
    {
        $filename = "test_md.html";
        $folder = "HtmlTestDoc";
        $resultFile = "putConvDocToMarkdownJS_";
        $resultFile .= $use_git == "true" ? "useGit.md" : "not_useGit.md";
        $out_path = $folder . "/" .  $resultFile;

        //Request to server Api
        self::$api_html->putConvertDocumentToMarkdown($filename, $out_path, $use_git, $folder, null);

        //Download result from storage
        $this->downloadHelper($out_path);
    }
}
