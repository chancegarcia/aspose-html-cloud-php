<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="OcrApiTest.php">
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
 * OcrApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class OcrApiTest extends BaseTest
{

    /**
     * Test case for getRecognizeAndImportToHtml
     *
     * @dataProvider providergetRecognizeAndImportToHtml
     *
     * Recognize text from the image file in the storage and import it to HTML format..
     *
     */
    public function testgetRecognizeAndImportToHtml($fileName, $ocr_engine_lang = 'en', $folder = null, $storage = null)
    {
        $this->uploadHelper($fileName);
        $folder = $folder ?: self::$api_html->config['remoteFolder'];


        //Request to server Api
        $result = self::$api_html->getRecognizeAndImportToHtml($fileName, $ocr_engine_lang , $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $fileName . "_" . $ocr_engine_lang .".html");
    }

    public function providergetRecognizeAndImportToHtml()
    {
        return [
            ["test_ocr.png","en"],
            ["test_ocr.jpg","en"]
        ];
    }


    /**
     * Test case for getRecognizeAndTranslateToHtml
     *
     * @dataProvider providergetRecognizeAndTranslateToHtml
     *
     * Recognize text from the image file in the storage, import it to HTML format and translate to specified language..
     *
     */
    public function testgetRecognizeAndTranslateToHtml($fileName, $src_lang, $res_lang, $folder = null, $storage = null)
    {
        $this->uploadHelper($fileName);
        $folder = $folder ?: self::$api_html->config['remoteFolder'];


        //Request to server Api
        $result = self::$api_html->getRecognizeAndTranslateToHtml($fileName, $src_lang, $res_lang, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $fileName . "_" . $src_lang . "_". $res_lang . ".html");
    }

    public function providergetRecognizeAndTranslateToHtml()
    {
        return [
            ["test_ocr.png","en","fr"],
            ["test_ocr.jpg","en","de"]
        ];
    }
}
