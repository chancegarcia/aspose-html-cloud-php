<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="TemplateMergeApiTest.php">
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
use InvalidArgumentException;
use SplFileObject;

/**
 * TemplateMergeApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class TemplateMergeApiTest extends BaseTest
{

    /**
     * Operation getMergeHtmlTemplate
     *
     * Populate HTML document template with data located as a file in the storage.
     *
     * @param  string $template_name Template document name. Template document is HTML or zipped HTML. (required)
     * @param  string $data_path Data source file path in the storage. Supported data format: XML (required)
     * @param  string $options Template merge options: reserved for further implementation. (optional)
     * @param  string $folder The template document folder. (optional)
     * @param  string $storage The template document and data source storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function testgetMergeHtmlTemplate()
    {
        $template_name = "HtmlTemplate.html";
        $data_name = "XmlSourceData.xml";
        $folder = self::$api_html->config['remoteFolder'];
        $options = "";
        $storage = null;
        $data_path = $folder . "/" . $data_name;
        $result_name = "getMergeHtmlTemplatePHP.html";

        $this->uploadHelper($template_name);
        $this->uploadHelper($data_name);

        $result = self::$api_html->getMergeHtmlTemplate($template_name, $data_path, $options, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $result_name);
    }

    /**
     * Operation postMergeHtmlTemplate
     *
     * Populate HTML document template with data from the request body. Result document will be saved to storage.
     *
     * @param  string $template_name Template document name. Template document is HTML or zipped HTML. (required)
     * @param  string $out_path Result document path. (required)
     * @param  SplFileObject $file A data file to populate template. (required)
     * @param  string $options Template merge options: reserved for further implementation. (optional)
     * @param  string $folder The template document folder. (optional)
     * @param  string $storage The template document and data source storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function testpostMergeHtmlTemplate()
    {
        $template_name = "HtmlTemplate.html";
        $data_name = "XmlSourceData.xml";
        $folder = self::$api_html->config['remoteFolder'];
        $options = "";
        $storage = null;
        $result_name = "postMergeHtmlTemplatePHP.html";
        $out_path = $folder . "/" . $result_name;
        $file = self::$testFolder . $data_name;

        self::$api_html->postMergeHtmlTemplate($template_name, $out_path, $file, $options, $folder, $storage);

        //Download result from storage
        $this->downloadHelper($out_path);
    }
}
