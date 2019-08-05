<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="SummarizationApiTest.php">
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


/**
 * SummarizationApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class SummarizationApiTest extends BaseTest
{


    /**
     * Test case for getDetectHtmlKeywords
     *
     * Get the HTML document keywords using the keyword detection service..
     *
     * @dataProvider providergetDetectHtmlKeywords
     *
     */
    public function testgetDetectHtmlKeywords($fileName)
    {
        $this->uploadHelper($fileName);
        $folder = self::$api_html->config['remoteFolder'];
        $storage = null;


        //Request to server Api
        $result = self::$api_html->getDetectHtmlKeywords($fileName, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "Keyword_" . $fileName . ".json");
    }


    public function providergetDetectHtmlKeywords()
    {
        return [
            ["test_en.html"],
            ["testpage3.html"]
        ];
    }


    /**
     * Test case for getDetectHtmlKeywordsByUrl
     *
     * Get the keywords from HTML document from Web specified by its URL using the keyword detection service.
     *
     * @dataProvider providergetDetectHtmlKeywordsByUrl
     *
     */
    public function testgetDetectHtmlKeywordsByUrl($source_url, $num_test)
    {
        //Request to server Api
        $result = self::$api_html->getDetectHtmlKeywordsByUrl($source_url);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . "KeywordUrl_" . $num_test  . ".json");
    }

    public function providergetDetectHtmlKeywordsByUrl()
    {
        return [
            ["https://www.le.ac.uk/oerresources/bdra/html/page_01.htm", 1],
            ["https://www.le.ac.uk/oerresources/bdra/html/page_02.htm", 2],
            ["https://www.le.ac.uk/oerresources/bdra/html/page_03.htm", 3]
        ];
    }

}
