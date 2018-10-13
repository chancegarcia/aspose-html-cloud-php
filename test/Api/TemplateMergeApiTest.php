<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="TemplateMergeApiTest.php">
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
 * TemplateMergeApiTest Class Doc Comment
 *
 * @category Class
 * @package  Client\Invoker\Api
 */
class TemplateMergeApiTest extends BaseTest
{

    /**
     * Operation GetMergeHtmlTemplate
     *
     * Populate HTML document template with data located as a file in the storage.
     *
     * @param  string $template_name Template document name. Template document is HTML or zipped HTML. (required)
     * @param  string $data_path Data source file path in the storage. Supported data format: XML (required)
     * @param  string $options Template merge options: reserved for further implementation. (optional)
     * @param  string $folder The template document folder. (optional)
     * @param  string $storage The template document and data source storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function testGetMergeHtmlTemplate()
    {
        $template_name = "HtmlTemplate.html";
        $data_name = "XmlSourceData.xml";
        $folder = self::$api->config['remoteFolder'];
        $options = "";
        $storage = null;
        $data_path = $folder . "/" . $data_name;
        $result_name = "GetMergeHtmlTemplatePHP.html";

        $this->uploadFile($template_name);
        $this->uploadFile($data_name);

        $result = self::$api->GetMergeHtmlTemplate($template_name, $data_path, $options, $folder, $storage);

        $this->assertTrue($result->isFile(),"Error result after recognize");
        $this->assertTrue($result->getSize() > 0,"Zero result");

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $result_name);
    }

    /**
     * Operation PutMergeHtmlTemplate
     *
     * Populate HTML document template with data from the request body. Result document will be saved to storage.
     *
     * @param  string $template_name Template document name. Template document is HTML or zipped HTML. (required)
     * @param  string $out_path Result document path. (required)
     * @param  \SplFileObject $file A data file to populate template. (required)
     * @param  string $options Template merge options: reserved for further implementation. (optional)
     * @param  string $folder The template document folder. (optional)
     * @param  string $storage The template document and data source storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function testPutMergeHtmlTemplate()
    {
        $template_name = "HtmlTemplate.html";
        $data_name = "XmlSourceData.xml";
        $folder = self::$api->config['remoteFolder'];
        $options = "";
        $storage = null;
        $result_name = "PutMergeHtmlTemplatePHP.html";
        $out_path = $folder . "/" . $result_name;
        $file = self::$testFolder . $data_name;

        self::$api->PutMergeHtmlTemplate($template_name, $out_path, $file, $options, $folder, $storage);

        //Download result file from storage.
        $request = new Requests\GetDownloadRequest($out_path, null, null);

        $result = self::$storage->GetDownload($request);

        //Copy result to testFolder
        copy($result->getRealPath(), self::$testResult . $result_name);
    }
}
