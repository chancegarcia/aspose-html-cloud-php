<?php
/**
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
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
 * php version 7.4
 *
 * @category  Aspose_Html_Cloud_SDK
 * @package   html-sdk-php
 * @author    Alexander Makogon <alexander.makogon@aspose.com>
 * @copyright 2022 Aspose
 * @license   https://opensource.org/licenses/mit-license.php  MIT License
 * @version   GIT: @22.9.1@
 * @link      https://packagist.org/packages/aspose/html-sdk-php
 */

namespace Client\Invoker\Api;

use Client\Invoker\ApiException;
use Client\Invoker\Configuration;
use Client\Invoker\HeaderSelector;
use Client\Invoker\Model\ConversionResult;
use Client\Invoker\ObjectSerializer;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use RuntimeException;
use SplFileObject;


/**
 * Collecting all HtmlApi
 *
 * @category HtmlApi
 * @package  html-sdk-php
 * @author   Alexander Makogon <alexander.makogon@aspose.com>
 * @license  https://opensource.org/licenses/mit-license.php  MIT License
 * @link     https://packagist.org/packages/aspose/html-sdk-php
 */
class HtmlApi
{
    /**
     * Http client
     *
     * @var ClientInterface
     */
    public $client;

    /**
     * Configuration endpoint and security
     *
     * @var Configuration
     */
    public $config;

    /**
     * Selector custom headers
     *
     * @var HeaderSelector
     */
    private HeaderSelector $_headerSelector;

    /**
     * For manipulation with storage
     *
     * @var StorageApi
     */
    protected static StorageApi $api_stor;

    /**
     * Create HtmlApi
     *
     * @param array $params   Configuration Api
     * @param HeaderSelector | null $selector Headers
     */
    public function __construct(array $params, HeaderSelector $selector = null)
    {
        $this->client = Configuration::getClient($params);
        $this->config = $params;
        $this->_headerSelector = $selector ?: new HeaderSelector();
        self::$api_stor = new StorageApi($params, $selector);
    }

    /**
     * Create http client option
     *
     * @throws RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption(): array
    {
        $options = [];
        if ($this->config['debug']) {
            $options[RequestOptions::DEBUG]
                = fopen($this->config['debugFile'], 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new RuntimeException(
                    'Failed to open the debug file: '
                    . $this->config['debugFile']
                );
            }
        }

        return $options;
    }

    /**
     * General function for conversion
     *
     * Convert the HTML, EPUB or website to the specified format.
     *
     * @param string    $src           Path to a source file or url. (required)
     * @param string    $dest          Path to the result. (required)
     * @param bool      $srcInLocal    Source file located on the local disk. (required)
     * @param bool      $dstInLocal    Result file located on the local disk. (required)
     * @param bool      $isUrl         Source is URL. (required)
     * @param ?array    $options       Options for conversion. (optional)
     * @param ?string   $storage_name  User's storage name. (optional)
     *
     * @return ?ConversionResult
     * @throws ApiException on non-2xx response
     */
    public function convert(string $src, string $dest, bool $srcInLocal, bool $dstInLocal, bool $isUrl, ?array $options=null, ?string $storage_name=null) : ConversionResult {

        if($srcInLocal){
            $file = new SplFileObject($src);
            $res = self::$api_stor->uploadFile("/", $file);
            if(count($res->getUploaded()) != 1 || count($res->getErrors()) != 0) {
                throw new ApiException("Unable to upload file");
            }
            $fileInStorage = $res->getUploaded()[0];
        } else {
            $fileInStorage = $src;
        }

        $outFile = $dstInLocal ? basename($dest) : $dest;
        $inputFormat = $isUrl ? "html" : $this->getInputFormat($src);
        $outputFormat = strtolower(pathinfo($dest)['extension']);

        if($outputFormat == "jpg") {
            $outputFormat = "jpeg";
        } else if($outputFormat == "mht") {
            $outputFormat = "mhtml";
        } else if ($outputFormat == "tif") {
            $outputFormat = "tiff";
        }

        $resourcePath = "/html/conversion/{from}-{to}";

        // path params
        $resourcePath = str_replace(
            '{from}',
            ObjectSerializer::toPathValue($inputFormat),
            $resourcePath
        );

        // path params
        $resourcePath = str_replace(
            '{to}',
            ObjectSerializer::toPathValue($outputFormat),
            $resourcePath
        );


        $defaultHeaders = [];
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = $this->_headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        $headers = array_merge(
            $defaultHeaders,
            $headers
        );

        $httpBody = ["InputPath" => $fileInStorage, "OutputFile" => $outFile];

        if($storage_name != null) $httpBody["StorageName"] = $storage_name;

        $opt = [];
        if($options) {
            if (array_key_exists('width',$options) && $options['width'])
                $opt['width'] = $options['width'];
            if (array_key_exists('height',$options) && $options['height'])
                $opt['height'] = $options['height'];
            if (array_key_exists('top_margin',$options) && $options['top_margin'])
                $opt['topmargin'] = $options['top_margin'];
            if (array_key_exists('bottom_margin',$options) && $options['bottom_margin'])
                $opt['bottommargin'] = $options['bottom_margin'];
            if (array_key_exists('left_margin',$options) && $options['left_margin'])
                $opt['leftmargin'] = $options['left_margin'];
            if (array_key_exists('right_margin',$options) && $options['right_margin'])
                $opt['rightmargin'] = $options['right_margin'];
        }

        if(count($opt))
            $httpBody["Options"] = $opt;

        $httpBody = json_encode($httpBody);

        $request = new Request(
            'POST',
            $this->config['basePath'] . $resourcePath,
            $headers,
            $httpBody
        );

        $result = $this->executeRequest($request);

        $id = $result->getId();


        while(true) {
            $res = $this->checkStatus($id);
            $status = $res->getStatus();
            if($status == 'faulted' || $status == 'canceled') throw new ApiException('Conversion failed');
            if($status == 'completed') break;
            sleep(3);
        }

        if($dstInLocal) {
            $result = self::$api_stor->downloadFile($res->getFile(), $storage_name);
            $resultFile = dirname($dest) . "/". basename($res->getFile());
            copy($result->getRealPath(), $resultFile);
            $res->setFile($resultFile);
        }

        return $res;
    }

    /**
     * Convert HTML or EPUB document on the local disk to the specific format and save result on the local disk.
     *
     * @param string    $src           Path to a source file or url. (required)
     * @param string    $dst           Path to the result file. (required)
     * @param ?array    $options       Options for conversion. (optional)
     *
     * @return ?ConversionResult
     * @throws ApiException on non-2xx response
     */
    public function convertLocalToLocal(string $src, string $dst, array $options = null) : ?ConversionResult {
        return $this->convert($src, $dst, true, true, false, $options);
    }

    /**
     * Convert HTML or EPUB document on the local disk to the specific format and save result on the storage.
     *
     * @param string    $src           Path to a source file or url. (required)
     * @param string    $dst           Path to the result file. (required)
     * @param ?string   $storage       User's storage name. (optional)
     * @param ?array    $options       Options for conversion. (optional)
     *
     * @return ?ConversionResult
     * @throws ApiException on non-2xx response
     */
    public function convertLocalToStorage(string $src, string $dst, ?string $storage, ?array $options = null) : ?ConversionResult {
        return $this->convert($src, $dst, true, false, false, $options, $storage);
    }

    /**
     * Convert HTML or EPUB document on the storage to the specific format and save result on the local disk.
     *
     * @param string    $src           Path to a source file or url. (required)
     * @param string    $dst           Path to the result file. (required)
     * @param ?string   $storage       User's storage name. (optional)
     * @param ?array    $options       Options for conversion. (optional)
     *
     * @return ?ConversionResult
     * @throws ApiException on non-2xx response
     */
    public function convertStorageToLocal(string $src, string $dst, ?string $storage, ?array $options = null) : ?ConversionResult {
        return $this->convert($src, $dst, false, true, false, $options, $storage);
    }

    /**
     * Convert HTML or EPUB document on the storage to the specific format and save result on the storage.
     *
     * @param string    $src           Path to a source file or url. (required)
     * @param string    $dst           Path to the result file. (required)
     * @param ?string   $storage       User's storage name. (optional)
     * @param ?array    $options       Options for conversion. (optional)
     *
     * @return ?ConversionResult
     * @throws ApiException on non-2xx response
     */
    public function convertStorageToStorage(string $src, string $dst, ?string $storage, ?array $options = null) : ?ConversionResult {
        return $this->convert($src, $dst, false, false, false, $options, $storage);
    }

    /**
     * Convert the website to the specific format and save result on the local disk.
     *
     * @param string    $src           Path to a source file or url. (required)
     * @param string    $dst           Path to the result file. (required)
     * @param ?array    $options       Options for conversion. (optional)
     *
     * @return ?ConversionResult
     * @throws ApiException on non-2xx response
     */
    public function convertUrlToLocal(string $src, string $dst, ?array $options = null) : ?ConversionResult {
        return $this->convert($src, $dst, false, true, true, $options);
    }

    /**
     * Convert the website to the specific format and save result on the storage.
     *
     * @param string    $src           Path to a source file or url. (required)
     * @param string    $dst           Path to the result file. (required)
     * @param ?string   $storage       User's storage name. (optional)
     * @param ?array    $options       Options for conversion. (optional)
     *
     * @return ?ConversionResult
     * @throws ApiException on non-2xx response
     */
    public function convertUrlToStorage(string $src, string $dst, ?string $storage, ?array $options = null) : ?ConversionResult {
        return $this->convert($src, $dst, false, false, true, $options, $storage);
    }

    private function getInputFormat(string $src) : string {

        $ext = strtolower(pathinfo($src)['extension']);
        switch($ext) {
            case "htm":
            case "html":
                return "html";
            case "mht":
            case "mhtml":
                return "mhtml";
            case "xml":
            case "xhtml":
                return "xhtml";
            case "epub":
            case "svg":
            case "md":
                return $ext;
        }

        return "html";
    }

    private function executeRequest($request) : ConversionResult {

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                    );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            $content = $responseBody->getContents();
            $content = json_decode($content);
            return ObjectSerializer::deserialize($content, '\Client\Invoker\Model\ConversionResult', []);

        } catch (ApiException $e) {
            if ($e->getCode() == 200) {
                $data = ObjectSerializer::deserialize(
                    $e->getResponseBody(),
                    'ConversionResult',
                    $e->getResponseHeaders()
                );
                $e->setResponseObject($data);
            }
            throw $e;
        }

    }

    private function checkStatus(string $id) : ConversionResult {

        $resourcePath = "/html/conversion/" . $id;

        $defaultHeaders = [];
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = $this->_headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        $headers = array_merge(
            $defaultHeaders,
            $headers
        );

        $request = new Request(
            'GET',
            $this->config['basePath'] . $resourcePath,
            $headers
        );

        return $this->executeRequest($request);
    }

}
