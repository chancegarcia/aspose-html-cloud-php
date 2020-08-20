<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="SeoApiTest.php">
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


/**
 * SeoApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class SeoApiTest extends BaseTest
{

    /**
     * Test case for getSeoWarning
     *
     * Page analysis and return of SEO warnings in json format.
     *
     * @param  string $num_test Test number in the batch.
     * @param  string $addr     Source page URL.
     *
     * @dataProvider providerWarning
     */
    public function testGetSeoWarning($num_test, $addr)
    {
        $result = self::$api_html->getSeoWarning($addr);

        $this->assertTrue($result->isFile(),"Error result after getSeoWarning");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult .$num_test . "_get_seo_warning.json");
    }

    /**
     * Test case for getHtmlWarning
     *
     * Checks the markup validity of Web documents in HTML, XHTML, etc., and return result in json format.
     *
     * @param  string $num_test Test number in the batch.
     * @param  string $url      Source page URL.
     *
     * @dataProvider providerWarning
     */
    public function testHtmlWarning($num_test, $url)
    {
        $result = self::$api_html->getHtmlWarning($url);

        $this->assertTrue($result->isFile(),"Error result after getHtmlWarning");
        $this->assertTrue($result->getSize() > 0,"Size of file is zero");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult .$num_test . "_get_html_warning.json");
    }

    public function providerWarning()
    {
        return [
            [1, "https://edition.cnn.com/"],
            [2, "https://lenta.ru/"]
        ];
    }
}
