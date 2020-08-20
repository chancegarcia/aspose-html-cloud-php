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
 * @package   html-sdk-php
 * @author    Alexander Makogon <alexander.makogon@aspose.com>
 * @copyright 2020 Aspose
 * @license   https://opensource.org/licenses/mit-license.php  MIT License
 * @version   GIT: @20.8.0@
 * @link      https://packagist.org/packages/aspose/html-sdk-php
 */

namespace Client\Invoker\Api;

use Client\Invoker\ApiException;
use Client\Invoker\ObjectSerializer;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use stdClass;
use function GuzzleHttp\Psr7\build_query;
use function GuzzleHttp\json_encode;
use function GuzzleHttp\Psr7\try_fopen;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use SplFileObject;

/**
 * Populate HTML document template with data.
 *
 * @category TemplateMergeApi
 * @package  html-sdk-php
 * @author   Alexander Makogon <alexander.makogon@aspose.com>
 * @license  https://opensource.org/licenses/mit-license.php  MIT License
 * @link     https://packagist.org/packages/aspose/html-sdk-php
 */
trait TemplateMergeApi
{
    /**
     * Operation getMergeHtmlTemplate
     *
     * Populate HTML document template with data located as a file in the storage.
     *
     * @param string $template_name Template document name. Template document is
     *                              HTML or zipped HTML. (required)
     * @param string $data_path     Data source file path in the storage.
     *                              Supported data format: XML (required)
     * @param string $options       Template merge options: reserved for further
     *                              implementation. (optional)
     * @param string $folder        The template document folder. (optional)
     * @param string $storage       The template document and data source storage.
     *                              (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getMergeHtmlTemplate(
        $template_name, $data_path, $options = null, $folder = null, $storage = null
    ) {
        list($response) = $this->getMergeHtmlTemplateWithHttpInfo(
            $template_name, $data_path, $options, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getMergeHtmlTemplateWithHttpInfo
     *
     * Populate HTML document template with data located as a file in the storage.
     *
     * @param string $template_name Template document name.
     *                              Template document is HTML or zipped HTML.
     *                              (required)
     * @param string $data_path     Data source file path in the storage.
     *                              Supported data format: XML (required)
     * @param string $options       Template merge options: reserved for further
     *                              implementation. (optional)
     * @param string $folder        The template document folder. (optional)
     * @param string $storage       The template document and data source storage.
     *                              (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getMergeHtmlTemplateWithHttpInfo(
        $template_name, $data_path, $options = null, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getMergeHtmlTemplateRequest(
            $template_name, $data_path, $options, $folder, $storage
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
            case 401:
            case 404:
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
     * Operation getMergeHtmlTemplateAsync
     *
     * Populate HTML document template with data located as a file in the storage.
     *
     * @param string $template_name Template document name. Template document is
     *                              HTML or zipped HTML. (required)
     * @param string $data_path     Data source file path in the storage.
     *                              Supported data format: XML (required)
     * @param string $options       Template merge options: reserved for further
     *                              implementation. (optional)
     * @param string $folder        The template document folder. (optional)
     * @param string $storage       The template document and data source
     *                              storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getMergeHtmlTemplateAsync(
        $template_name, $data_path, $options = null, $folder = null, $storage = null
    ) {
        return $this->getMergeHtmlTemplateAsyncWithHttpInfo(
            $template_name, $data_path, $options, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getMergeHtmlTemplateAsyncWithHttpInfo
     *
     * Populate HTML document template with data located as a file in the storage.
     *
     * @param string $template_name Template document name. Template document is
     *                              HTML or zipped HTML. (required)
     * @param string $data_path     Data source file path in the storage.
     *                              Supported data format: XML (required)
     * @param string $options       Template merge options: reserved for further
     *                              implementation. (optional)
     * @param string $folder        The template document folder. (optional)
     * @param string $storage       The template document and data source storage.
     *                              (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getMergeHtmlTemplateAsyncWithHttpInfo(
        $template_name, $data_path, $options = null, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getMergeHtmlTemplateRequest(
            $template_name, $data_path, $options, $folder, $storage
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
     * Create request for operation 'getMergeHtmlTemplate'
     *
     * @param string $template_name Template document name. Template document is
     *                              HTML or zipped HTML. (required)
     * @param string $data_path     Data source file path in the storage.
     *                              Supported data format: XML (required)
     * @param string $options       Template merge options: reserved for further
     *                              implementation. (optional)
     * @param string $folder        The template document folder. (optional)
     * @param string $storage       The template document and data source storage.
     *                              (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getMergeHtmlTemplateRequest(
        $template_name, $data_path, $options = null, $folder = null, $storage = null
    ) {
        // verify the required parameter 'template_name' is set
        if ($template_name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$template_name when calling getMergeHtmlTemplate'
            );
        }
        // verify the required parameter 'data_path' is set
        if ($data_path === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$data_path when calling getMergeHtmlTemplate'
            );
        }

        $resourcePath = '/html/{templateName}/merge';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        $resourcePath = str_replace(
            '{' . 'templateName' . '}',
            ObjectSerializer::toPathValue($template_name),
            $resourcePath
        );

        $queryParams['dataPath'] = ObjectSerializer::toQueryValue($data_path);

        // query params
        if ($options !== null) {
            $queryParams['options']
                = ObjectSerializer::toQueryValue($options);
        }
        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }

        $defaultHeaders = [];
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams
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
     * Operation postMergeHtmlTemplate
     *
     * Populate HTML document template with data from the request body.
     * Result document will be saved to storage.
     *
     * @param string        $template_name Template document name. Template
     *                                     document is HTML or zipped HTML.
     *                                     (required)
     * @param string        $out_path      Result document path. (required)
     * @param SplFileObject $file          A data file to populate template.
     *                                     (required)
     * @param string        $options       Template merge options: reserved for
     *                                     further implementation. (optional)
     * @param string        $folder        The template document folder. (optional)
     * @param string        $storage       The template document and data source
     *                                     storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function postMergeHtmlTemplate(
        $template_name, $out_path, $file, $options = null,
        $folder = null, $storage = null
    ) {
        list($response) = $this->postMergeHtmlTemplateWithHttpInfo(
            $template_name, $out_path, $file, $options, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation postMergeHtmlTemplateWithHttpInfo
     *
     * Populate HTML document template with data from the request body.
     * Result document will be saved to storage.
     *
     * @param string        $template_name Template document name. Template document
     *                                     is HTML or zipped HTML. (required)
     * @param string        $out_path      Result document path. (required)
     * @param SplFileObject $file          A data file to populate template.
     *                                     (required)
     * @param string        $options       Template merge options: reserved for
     *                                     further implementation. (optional)
     * @param string        $folder        The template document folder. (optional)
     * @param string        $storage       The template document and data source
     *                                     storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function postMergeHtmlTemplateWithHttpInfo(
        $template_name, $out_path, $file, $options = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postMergeHtmlTemplateRequest(
            $template_name, $out_path, $file, $options, $folder, $storage
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
            case 401:
            case 404:
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
     * Operation postMergeHtmlTemplateAsync
     *
     * Populate HTML document template with data from the request body.
     * Result document will be saved to storage.
     *
     * @param string        $template_name Template document name. Template
     *                                     document is HTML or zipped HTML.
     *                                     (required)
     * @param string        $out_path      Result document path. (required)
     * @param SplFileObject $file          A data file to populate template.
     *                                     (required)
     * @param string        $options       Template merge options: reserved for
     *                                     further implementation. (optional)
     * @param string        $folder        The template document folder.
     *                                     (optional)
     * @param string        $storage       The template document and data source
     *                                     storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function postMergeHtmlTemplateAsync(
        $template_name, $out_path, $file, $options = null,
        $folder = null, $storage = null
    ) {
        return $this->postMergeHtmlTemplateAsyncWithHttpInfo(
            $template_name, $out_path, $file, $options, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation postMergeHtmlTemplateAsyncWithHttpInfo
     *
     * Populate HTML document template with data from the request body.
     * Result document will be saved to storage.
     *
     * @param string        $template_name Template document name. Template
     *                                     document is HTML or zipped HTML.
     *                                     (required)
     * @param string        $out_path      Result document path. (required)
     * @param SplFileObject $file          A data file to populate template.
     *                                     (required)
     * @param string        $options       Template merge options: reserved for
     *                                     further implementation. (optional)
     * @param string        $folder        The template document folder. (optional)
     * @param string        $storage       The template document and data source
     *                                     storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function postMergeHtmlTemplateAsyncWithHttpInfo(
        $template_name, $out_path, $file, $options = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postMergeHtmlTemplateRequest(
            $template_name, $out_path, $file, $options, $folder, $storage
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
     * Create request for operation 'postMergeHtmlTemplate'
     *
     * @param string        $template_name Template document name.
     *                                     Template document is HTML or
     *                                     zipped HTML. (required)
     * @param string        $out_path      Result document path. (required)
     * @param SplFileObject $file          A data file to populate template.
     *                                     (required)
     * @param string        $options       Template merge options: reserved for
     *                                     further implementation. (optional)
     * @param string        $folder        The template document folder. (optional)
     * @param string        $storage       The template document and data source
     *                                     storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function postMergeHtmlTemplateRequest(
        $template_name, $out_path, $file, $options = null,
        $folder = null, $storage = null
    ) {
        // verify the required parameter 'template_name' is set
        if ($template_name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$template_name when calling postMergeHtmlTemplate'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_path when calling postMergeHtmlTemplate'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$file when calling postMergeHtmlTemplate'
            );
        }

        $resourcePath = '/html/{templateName}/merge';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // path params
        $resourcePath = str_replace(
            '{' . 'templateName' . '}',
            ObjectSerializer::toPathValue($template_name),
            $resourcePath
        );

        // form params
        $multipart = true;
        $formParams['file']
            = try_fopen(ObjectSerializer::toFormValue($file), 'rb');

        $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);

        // query params
        if ($options !== null) {
            $queryParams['options'] = ObjectSerializer::toQueryValue($options);
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
                ['application/json']
            );
        } else {
            $headers = $this->_headerSelector->selectHeaders(
                ['application/json'],
                ['multipart/form-data']
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
            $headerParams
        );

        $query = build_query($queryParams);
        return new Request(
            'POST',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}
