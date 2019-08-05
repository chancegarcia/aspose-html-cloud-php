<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="DocumentApiTest.php">
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
 * DocumentApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class DocumentApiTest extends BaseTest
{

    /**
     * Test case for getDocumentByUrl
     *
     * Return all HTML page with linked resources packaged as a ZIP archive by the source page URL.
     * @param  string $source_url The document URL. (required)
     *
     * @dataProvider providergetDocumentByUrl
     */
    public function testgetDocumentByUrl($num_test, $source_url)
    {
        $result = self::$api_html->getDocumentByUrl($source_url);

        $this->assertTrue($result->isFile(),"Error result after get site from url");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult .$num_test . "get_site_by_url.zip");
    }

    public function providergetDocumentByUrl()
    {
        return [
            [1, "https://lenta.ru"],
            [2, "https://www.yahoo.com"]
        ];
    }


    /**
     * Test case for getDocumentFragmentByXPath
     *
     * Return list of HTML fragments matching the specified XPath query..
     * @param  string $fileName The document name. (required)
     * @param  string $xPath XPath query string. (required)
     * @param  string $outFormat Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. (required)
     *
     * @dataProvider providergetDocumentFragmentByXPath
     *
     */
    public function testgetDocumentFragmentByXPath($fileName, $xPath, $outFormat)
    {
        $this->uploadHelper($fileName);
        $result = self::$api_html->getDocumentFragmentByXPath($fileName, $xPath, $outFormat, null, self::$api_html->config['remoteFolder']);

        $this->assertTrue($result->isFile(),"Error result after get document xpath");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        $ext = "";
        if($outFormat == "plain") {
            $ext = ".html";
        }else if($outFormat == "json") {
            $ext = ".json";
        }

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "GetDocXPath_" . $fileName . $ext);
    }

    public function providergetDocumentFragmentByXPath()
    {
        return [
    		["test2.html.zip",".//p", "plain"],
    		["test3.html.zip",".//p", "plain"],
    		["test4.html.zip",".//p", "plain"],
    		["test2.html",".//ol/li", "json"]
    	];
    }

    /**
     * Test case for getDocumentFragmentByXPathByUrl
     *
     * Return list of HTML fragments matching the specified XPath query from url.
     * @param  integer $num_test Source page URL. (required for test)
     * @param  string $source_url Source page URL. (required)
     * @param  string $x_path XPath query string. (required)
     * @param  string $out_format Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. (required)
     *
     * @dataProvider providergetDocumentFragmentByXPathByUrl
     *
     */
    public function testgetDocumentFragmentByXPathByUrl($num_test, $source_url, $x_path, $out_format)
    {
        $result = self::$api_html->getDocumentFragmentByXPathByUrl($source_url, $x_path, $out_format);

        $this->assertTrue($result->isFile(),"Error result after get xPath from url");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        $ext = "";
        if($out_format == "plain") {
            $ext = ".html";
        }else if($out_format == "json") {
            $ext = ".json";
        }

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "GetDocXPathByUrl_" . $num_test . $ext);
    }


    public function providergetDocumentFragmentByXPathByUrl()
    {
        return [
            [1, "https://stallman.org/articles/anonymous-payments-thru-phones.html",".//p", "plain"],
            [2, "https://stallman.org/articles/anonymous-payments-thru-phones.html",".//p", "json"]
        ];
    }

    /**
     * Operation getDocumentFragmentsByCSSSelector
     *
     * Return list of HTML fragments matching the specified CSS selector.
     *
     * @param  string $name The document name. (required)
     * @param  string $selector CSS selector string. (required)
     * @param  string $out_format Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. (required)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     * @dataProvider providergetDocumentFragmentsByCSSSelector
     */
    public function testgetDocumentFragmentsByCSSSelector($name, $selector, $out_format)
    {
        $this->uploadHelper($name);
        $result = self::$api_html->getDocumentFragmentsByCSSSelector($name, $selector, $out_format, self::$api_html->config['remoteFolder'], null);

        $this->assertTrue($result->isFile(),"Error result after get document xpath");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        $ext = "";
        if($out_format == "plain") {
            $ext = ".html";
        }else if($out_format == "json") {
            $ext = ".json";
        }

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "GetDocCSS_" . $name . $ext);
    }

    public function providergetDocumentFragmentsByCSSSelector()
    {
        return [
            ["test2.html.zip","div p", "plain"],
            ["test3.html.zip","div", "plain"],
            ["test4.html.zip","p", "plain"],
            ["test2.html","ol li", "json"]
        ];
    }

    /**
     * Operation getDocumentFragmentsByCSSSelectorByUrl
     *
     * Return list of HTML fragments matching the specified CSS selector by the source page URL.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  string $selector CSS selector string. (required)
     * @param  string $out_format Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     *
     * @dataProvider providergetDocumentFragmentsByCSSSelectorByUrl
     */
    public function testgetDocumentFragmentsByCSSSelectorByUrl($num_test, $source_url, $selector, $out_format)
    {
        $result = self::$api_html->getDocumentFragmentsByCSSSelectorByUrl($source_url, $selector, $out_format);

        $this->assertTrue($result->isFile(),"Error result after get xPath from url");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        $ext = "";
        if($out_format == "plain") {
            $ext = ".html";
        }else if($out_format == "json") {
            $ext = ".json";
        }

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "GetDocCSSByUrl_" . $num_test . $ext);
    }


    public function providergetDocumentFragmentsByCSSSelectorByUrl()
    {
        return [
            [1, "https://www.w3schools.com/cssref/css_selectors.asp",'a[href$=".asp"]', "plain"],
            [2, "https://www.w3schools.com/cssref/css_selectors.asp",'a[href$=".asp"]', "json"]
        ];
    }


    /**
     * Test case for getDocumentImages
     *
     * Return all HTML document images packaged as a ZIP archive..
     * @param  string $fileName The document name. (required)
     *
     * @dataProvider providergetDocumentImages
     */
    public function testgetDocumentImages($fileName)
    {
        $this->uploadHelper($fileName);
        $result = self::$api_html->getDocumentImages($fileName,self::$api_html->config['remoteFolder'],null);
        print_r($result);

        $this->assertTrue($result->isFile(),"Error result after get document images");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $fileName);
    }

    public function providergetDocumentImages()
    {
        return [
            ["test1.html.zip"],
            ["test2.html.zip"],
            ["test3.html.zip"],
            ["test4.html.zip"]
        ];
    }

    /**
     * Test case for getDocumentImagesByUrl
     *
     * Return all HTML document images packaged as a ZIP archive. from url
     * @param  string $source_url The document URL. (required)
     *
     * @dataProvider providergetDocumentImagesByUrl
     */
    public function testgetDocumentImagesByUrl($num_test, $source_url)
    {
        $result = self::$api_html->getDocumentImagesByUrl($source_url);

        $this->assertTrue($result->isFile(),"Error result after get images from url");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult .$num_test . "get_images_by_url.zip");
    }

    public function providergetDocumentImagesByUrl()
    {
        return [
            [1, "https://www.google.com"],
            [2, "https://www.yahoo.com"]
        ];
    }


}
