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
 * php version 5.6
 *
 * @category  Aspose_Html_Cloud_SDK
 * @package   Asposehtmlcloudphp
 * @author    Alexander Makogon <alexander.makogon@aspose.com>
 * @copyright 2019 Aspose
 * @license   https://opensource.org/licenses/mit-license.php  MIT License
 * @version   GIT: @19.5.0@
 * @link      https://packagist.org/packages/aspose/aspose-html-cloud-php
 */

namespace Client\Invoker\Api;

use Client\Invoker\ApiException;
use Client\Invoker\ObjectSerializer;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use function GuzzleHttp\Psr7\build_query;
use function GuzzleHttp\json_encode;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use SplFileObject;
use stdClass;

/**
 * Recognize text from the image file in the storage and import it to HTML format.
 * Recognize text from the image file in the storage, import it to HTML format
 * and translate to specified language.
 *
 * @category OcrApi
 * @package  Asposehtmlcloudphp
 * @author   Alexander Makogon <alexander.makogon@aspose.com>
 * @license  https://opensource.org/licenses/mit-license.php  MIT License
 * @link     https://packagist.org/packages/aspose/aspose-html-cloud-php
 */

trait OcrApi
{
    /**
     * Operation getRecognizeAndImportToHtml
     *
     * Recognize text from the image file in the storage and
     * import it to HTML format.
     *
     * @param string $name            The image file name. (required)
     * @param string $ocr_engine_lang OCR engine language - language
     *                                (optional, default to en)
     * @param string $folder          The source image folder. (optional)
     * @param string $storage         The source image storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getRecognizeAndImportToHtml(
        $name, $ocr_engine_lang = 'en', $folder = null, $storage = null
    ) {
        list($response) = $this->getRecognizeAndImportToHtmlWithHttpInfo(
            $name, $ocr_engine_lang, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getRecognizeAndImportToHtmlWithHttpInfo
     *
     * Recognize text from the image file in the storage and
     * import it to HTML format.
     *
     * @param string $name            The image file name. (required)
     * @param string $ocr_engine_lang OCR engine language - language
     *                                (optional, default to en)
     * @param string $folder          The source image folder. (optional)
     * @param string $storage         The source image storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getRecognizeAndImportToHtmlWithHttpInfo(
        $name, $ocr_engine_lang = 'en', $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getRecognizeAndImportToHtmlRequest(
            $name, $ocr_engine_lang, $folder, $storage
        );

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse()
                        ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e->getResponse()->getBody()->getContents() : null
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
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                $data = ObjectSerializer::deserialize(
                    $e->getResponseBody(),
                    '\SplFileObject',
                    $e->getResponseHeaders()
                );
                $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /**
     * Operation getRecognizeAndImportToHtmlAsync
     *
     * Recognize text from the image file in the storage
     * and import it to HTML format.
     *
     * @param string $name            The image file name. (required)
     * @param string $ocr_engine_lang OCR engine language - language
     *                                (optional, default to en)
     * @param string $folder          The source image folder. (optional)
     * @param string $storage         The source image storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getRecognizeAndImportToHtmlAsync(
        $name, $ocr_engine_lang = 'en', $folder = null, $storage = null
    ) {
        return $this->getRecognizeAndImportToHtmlAsyncWithHttpInfo(
            $name, $ocr_engine_lang, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getRecognizeAndImportToHtmlAsyncWithHttpInfo
     *
     * Recognize text from the image file in the storage and
     * import it to HTML format.
     *
     * @param string $name            The image file name. (required)
     * @param string $ocr_engine_lang OCR engine language
     *                                (optional, default to en)
     * @param string $folder          The source image folder. (optional)
     * @param string $storage         The source image storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getRecognizeAndImportToHtmlAsyncWithHttpInfo(
        $name, $ocr_engine_lang = 'en', $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getRecognizeAndImportToHtmlRequest(
            $name, $ocr_engine_lang, $folder, $storage
        );

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getRecognizeAndImportToHtml'
     *
     * @param string $name            The image file name. (required)
     * @param string $ocr_engine_lang OCR engine language
     *                                (optional, default to en)
     * @param string $folder          The source image folder. (optional)
     * @param string $storage         The source image storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getRecognizeAndImportToHtmlRequest(
        $name, $ocr_engine_lang = 'en', $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling getRecognizeAndImportToHtml'
            );
        }

        $resourcePath = '/html/{name}/ocr/import';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
            $resourcePath
        );

        // query params
        if ($ocr_engine_lang !== null) {
            $queryParams['ocrEngineLang']
                = ObjectSerializer::toQueryValue($ocr_engine_lang);
        }
        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->_headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->_headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (($httpBody instanceof stdClass)
                && $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = build_query($formParams);
            }
        }

        $defaultHeaders = [];
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getRecognizeAndTranslateToHtml
     *
     * Recognize text from the image file in the storage,
     * import it to HTML format and translate to specified language.
     *
     * @param string $name     The image file name. (required)
     * @param string $src_lang Source language - also supposed as the OCR engine
     *                         language. (required)
     * @param string $res_lang Result language. (required)
     * @param string $folder   The source image folder. (optional)
     * @param string $storage  The source image storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getRecognizeAndTranslateToHtml(
        $name, $src_lang, $res_lang, $folder = null, $storage = null
    ) {
        list($response) = $this->getRecognizeAndTranslateToHtmlWithHttpInfo(
            $name, $src_lang, $res_lang, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getRecognizeAndTranslateToHtmlWithHttpInfo
     *
     * Recognize text from the image file in the storage, import it to
     * HTML format and translate to specified language.
     *
     * @param string $name     The image file name. (required)
     * @param string $src_lang Source language - also supposed as the OCR
     *                         engine language. (required)
     * @param string $res_lang Result language. (required)
     * @param string $folder   The source image folder. (optional)
     * @param string $storage  The source image storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getRecognizeAndTranslateToHtmlWithHttpInfo(
        $name, $src_lang, $res_lang, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getRecognizeAndTranslateToHtmlRequest(
            $name, $src_lang, $res_lang, $folder, $storage
        );

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse()
                        ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse()
                        ? $e->getResponse()->getBody()->getContents() : null
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
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            case 200:
                $data = ObjectSerializer::deserialize(
                    $e->getResponseBody(),
                    '\SplFileObject',
                    $e->getResponseHeaders()
                );
                $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /**
     * Operation getRecognizeAndTranslateToHtmlAsync
     *
     * Recognize text from the image file in the storage, import it to
     * HTML format and translate to specified language.
     *
     * @param string $name     The image file name. (required)
     * @param string $src_lang Source language - also supposed as the
     *                         OCR engine language. (required)
     * @param string $res_lang Result language. (required)
     * @param string $folder   The source image folder. (optional)
     * @param string $storage  The source image storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getRecognizeAndTranslateToHtmlAsync(
        $name, $src_lang, $res_lang, $folder = null, $storage = null
    ) {
        return $this->getRecognizeAndTranslateToHtmlAsyncWithHttpInfo(
            $name, $src_lang, $res_lang, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getRecognizeAndTranslateToHtmlAsyncWithHttpInfo
     *
     * Recognize text from the image file in the storage, import it to HTML
     * format and translate to specified language.
     *
     * @param string $name     The image file name. (required)
     * @param string $src_lang Source language - also supposed as the OCR engine
     *                         language. (required)
     * @param string $res_lang Result language. (required)
     * @param string $folder   The source image folder. (optional)
     * @param string $storage  The source image storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getRecognizeAndTranslateToHtmlAsyncWithHttpInfo(
        $name, $src_lang, $res_lang, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getRecognizeAndTranslateToHtmlRequest(
            $name, $src_lang, $res_lang, $folder, $storage
        );

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getRecognizeAndTranslateToHtml'
     *
     * @param string $name     The image file name. (required)
     * @param string $src_lang Source language - also supposed as the OCR
     *                         engine language. (required)
     * @param string $res_lang Result language. (required)
     * @param string $folder   The source image folder. (optional)
     * @param string $storage  The source image storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getRecognizeAndTranslateToHtmlRequest(
        $name, $src_lang, $res_lang, $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling getRecognizeAndTranslateToHtml'
            );
        }
        // verify the required parameter 'src_lang' is set
        if ($src_lang === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$src_lang when calling getRecognizeAndTranslateToHtml'
            );
        }
        // verify the required parameter 'res_lang' is set
        if ($res_lang === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$res_lang when calling getRecognizeAndTranslateToHtml'
            );
        }

        $resourcePath = '/html/{name}/ocr/translate/{srcLang}/{resLang}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
            $resourcePath
        );
        // path params
        $resourcePath = str_replace(
            '{' . 'srcLang' . '}',
            ObjectSerializer::toPathValue($src_lang),
            $resourcePath
        );
        // path params
        $resourcePath = str_replace(
            '{' . 'resLang' . '}',
            ObjectSerializer::toPathValue($res_lang),
            $resourcePath
        );

        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->_headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->_headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if (($httpBody instanceof stdClass)
                && $headers['Content-Type'] === 'application/json'
            ) {
                $httpBody = json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = build_query($formParams);
            }
        }

        $defaultHeaders = [];
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}
