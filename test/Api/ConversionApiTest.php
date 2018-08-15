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
     * Test case for GetConvertDocumentToImage
     *
     * Convert the HTML document from the storage by its name to the specified image format..
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $x_resolution Horizontal resolution of resulting image. (optional)
     * @param  int $y_resolution Vertical resolution of resulting image. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source document storage. (optional)
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testGetConvertDocumentToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null )
    {
        $fileName = "test1.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToImage
        ( $fileName, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin,
          $x_resolution, $y_resolution, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "HtmlToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($x_resolution) && isset($y_resolution) ? $x_resolution . "x" . $y_resolution . "_" : "-x-_";
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
    		["jpeg", 700, 700, 50, 100, 150, 200, 100, 100],
    		["jpeg", 800, 800, 200, 150, 100, 50, 150, 150],
    		["jpeg", 800, 1000, 50, 50, 50, 50, 200, 200],
    		["jpeg", 800, 1200, 100, 100, 100, 100, 50, 50],
    		["jpeg", 800, 1400, 150, 150, 150, 150, 50, 50],
    		["jpeg", 800, 1600, 200, 200, 200, 200, 50, 50],

    		["png"],
    		["png", 500, 500],
    		["png", 600, 600],
    		["png", 700, 700, 50, 100, 150, 200, 100, 100],
    		["png", 800, 800, 200, 150, 100, 50, 150, 150],
    		["png", 800, 1000, 50, 50, 50, 50, 200, 200],
    		["png", 800, 1200, 100, 100, 100, 100, 50, 50],
    		["png", 800, 1400, 150, 150, 150, 150, 50, 50],
    		["png", 800, 1600, 200, 200, 200, 200, 50, 50],

    		["bmp"],
    		["bmp", 500, 500],
    		["bmp", 600, 600],
    		["bmp", 700, 700, 200, 150, 10, 50, 100, 100],
    		["bmp", 800, 800, 50, 100, 150, 200, 150, 150],
    		["bmp", 800, 1000, 50, 50, 50, 50, 200, 200],
    		["bmp", 800, 1200, 100, 100, 100, 100, 50, 50],
    		["bmp", 800, 1400, 300, 200, 100, 0, 50, 50],
    		["bmp", 800, 1600, 150, 150, 150, 150, 50, 50],

    		["tiff"],
    		["tiff", 500, 500],
    		["tiff", 600, 600],
    		["tiff", 700, 700, 200, 150, 100, 50, 100, 100],
    		["tiff", 800, 800, 50, 100, 150, 200, 150, 150],
    		["tiff", 800, 1000, 50, 50, 50, 50, 200, 200],
    		["tiff", 800, 1200, 100, 100, 100, 100, 50, 50],
    		["tiff", 800, 1400, 150, 150, 150, 150, 50, 50],
    		["tiff", 800, 1600, 200, 200, 200, 200, 50, 50]
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
     * @param  int $x_resolution Horizontal resolution of resulting image. (optional)
     * @param  int $y_resolution Vertical resolution of resulting image. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     *
     * @dataProvider providerConversionToImage
     *
     */
    public function testGetConvertDocumentToImageByUrl
    ($out_format, $width = null, $height = null, $left_margin = null, $right_margin = null,
     $top_margin = null, $bottom_margin = null, $x_resolution = null, $y_resolution = null, $folder = null, $storage = null)
    {
        $source_url = "https://stallman.org/articles/anonymous-payments-thru-phones.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        //Request to server Api
        $result = self::$api->GetConvertDocumentToImageByUrl
        ( $source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin,
          $x_resolution, $y_resolution, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        $resultFile = "UrlToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($x_resolution) && isset($y_resolution) ? $x_resolution . "x" . $y_resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $resultFile . '.' . $out_format);
    }


    /**
     * Test case for GetConvertDocumentToPdf
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
    public function testGetConvertDocumentToPdf
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
     * Test case for GetConvertDocumentToXps
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
    public function testGetConvertDocumentToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null, $folder = null, $storage = null)
    {
        $fileName = "test1.html";
        $folder = $folder ?: self::$api->config['remoteFolder'];

        $this->uploadFile($fileName);

        //Request to server Api
        $result = self::$api->GetConvertDocumentToXps($fileName, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
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
     * Test case for PutConvertDocumentInRequestToImage
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

    public function testPutConvertDocumentInRequestToImage
    ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $x_resolution = null, $y_resolution = null)
    {
        $resolution = $x_resolution;
        $resultFile = "putConvertToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($x_resolution) && isset($y_resolution) ? $x_resolution . "x" . $y_resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to image
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/" +  $resultFile;
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
     * Test case for PutConvertDocumentInRequestToPdf
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
    public function testPutConvertDocumentInRequestToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putConvertToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to pdf
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/" +  $resultFile;
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
     * Test case for PutConvertDocumentInRequestToXps
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
    public function testPutConvertDocumentInRequestToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putConvertToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to xps
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/" +  $resultFile;
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
     * Test case for PutConvertDocumentToImage
     *
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
    public function testPutConvertDocumentToImage
   ( $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
      $bottom_margin = null, $x_resolution = null, $y_resolution = null)
    {
        $resolution = $x_resolution;
        $resultFile = "putConvertDocToImg_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($x_resolution) && isset($y_resolution) ? $x_resolution . "x" . $y_resolution . "_" : "-x-_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //test1.html already in storage
        $filename = "test1.html";

        $out_path = "HtmlTestDoc/" +  $resultFile;
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
     * Test case for PutConvertDocumentToPdf
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
    public function testPutConvertDocumentToPdf
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putConvertDocToPdf_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to pdf in storage
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/" +  $resultFile;
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
     * Test case for PutConvertDocumentToXps
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
    public function testPutConvertDocumentToXps
    ($width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null,
     $bottom_margin = null)
    {
        $resultFile = "putConvertDocToXps_";
        $resultFile .= isset($width) && isset($height) ? $width . "x" . $height . "_" : "--x--_";
        $resultFile .= isset($left_margin) ? "L" . $left_margin . "_" : "L_";
        $resultFile .= isset($right_margin) ? "R" . $right_margin . "_" : "R_";
        $resultFile .= isset($top_margin) ? "T" . $top_margin . "_" : "T_";
        $resultFile .= isset($bottom_margin) ? "B" . $bottom_margin  : "B_";

        //Convert html to xps
        $filename = "test1.html";
        $out_path = "HtmlTestDoc/" +  $resultFile;
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
}
