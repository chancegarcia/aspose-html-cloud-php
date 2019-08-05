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
use function GuzzleHttp\Psr7\try_fopen;

/**
 * Convert Markdown document to html format.
 *
 * @category ImportApi
 * @package  Asposehtmlcloudphp
 * @author   Alexander Makogon <alexander.makogon@aspose.com>
 * @license  https://opensource.org/licenses/mit-license.php  MIT License
 * @link     https://packagist.org/packages/aspose/aspose-html-cloud-php
 */
trait ImportApi
{
    /**
     * Operation getConvertMarkdownToHtml
     *
     * Converts the Markdown document (located on storage) to HTML
     * and returns resulting file in response content.
     *
     * @param string $name    Document name. (required)
     * @param string $folder  Source document folder. (optional)
     * @param string $storage Source document storage. (optional)
     *
     * @throws ApiException
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getConvertMarkdownToHtml($name, $folder = null, $storage = null)
    {
        list($response) = $this->getConvertMarkdownToHtmlWithHttpInfo(
            $name, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getConvertMarkdownToHtmlWithHttpInfo
     *
     * Converts the Markdown document (located on storage) to HTML
     * and returns resulting file in response content.
     *
     * @param string $name    Document name. (required)
     * @param string $folder  Source document folder. (optional)
     * @param string $storage Source document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getConvertMarkdownToHtmlWithHttpInfo(
        $name, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertMarkdownToHtmlRequest($name, $folder, $storage);

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
     * Operation getConvertMarkdownToHtmlAsync
     *
     * Converts the Markdown document (located on storage) to HTML
     * and returns resulting file in response content.
     *
     * @param string $name    Document name. (required)
     * @param string $folder  Source document folder. (optional)
     * @param string $storage Source document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getConvertMarkdownToHtmlAsync(
        $name, $folder = null, $storage = null
    ) {
        return $this->getConvertMarkdownToHtmlAsyncWithHttpInfo(
            $name, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getConvertMarkdownToHtmlAsyncWithHttpInfo
     *
     * Converts the Markdown document (located on storage) to HTML
     * and returns resulting file in response content.
     *
     * @param string $name    Document name. (required)
     * @param string $folder  Source document folder. (optional)
     * @param string $storage Source document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getConvertMarkdownToHtmlAsyncWithHttpInfo(
        $name, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertMarkdownToHtmlRequest($name, $folder, $storage);

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
     * Create request for operation 'getConvertMarkdownToHtml'
     *
     * @param string $name    Document name. (required)
     * @param string $folder  Source document folder. (optional)
     * @param string $storage Source document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getConvertMarkdownToHtmlRequest(
        $name, $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling getConvertMarkdownToHtml'
            );
        }

        $resourcePath = '/html/{name}/import/md';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }

        // path params
        if ($name !== null) {
            $resourcePath = str_replace(
                '{' . 'name' . '}',
                ObjectSerializer::toPathValue($name),
                $resourcePath
            );
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
     * Operation postConvertMarkdownInRequestToHtml
     *
     * Converts the Markdown document (in request content) to
     * HTML and uploads resulting file to storage by specified path.
     *
     * @param string        $out_path Full resulting file path in the storage
     *                                (ex. /folder1/folder2/result.html)
     *                                (required)
     * @param SplFileObject $file     A file to be converted. (required)
     * @param string        $storage  Source document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function postConvertMarkdownInRequestToHtml(
        $out_path, $file, $storage = null
    ) {
        list($response) = $this->postConvertMarkdownInRequestToHtmlWithHttpInfo(
            $out_path, $file, $storage
        );
        return $response;
    }

    /**
     * Operation postConvertMarkdownInRequestToHtmlWithHttpInfo
     *
     * Converts the Markdown document (in request content) to
     * HTML and uploads resulting file to storage by specified path.
     *
     * @param string        $out_path Full resulting file path in the storage
     *                                (ex. /folder1/folder2/result.html)
     *                                (required)
     * @param SplFileObject $file     A file to be converted. (required)
     * @param string        $storage  Source document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function postConvertMarkdownInRequestToHtmlWithHttpInfo(
        $out_path, $file, $storage
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postConvertMarkdownInRequestToHtmlRequest(
            $out_path, $file, $storage
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
     * Operation postConvertMarkdownInRequestToHtmlAsync
     *
     * Converts the Markdown document (in request content) to HTML and
     * uploads resulting file to storage by specified path.
     *
     * @param string        $out_path Full resulting file path in the storage
     *                                (ex. /folder1/folder2/result.html)
     *                                (required)
     * @param SplFileObject $file     A file to be converted. (required)
     * @param string        $storage  Source document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function postConvertMarkdownInRequestToHtmlAsync(
        $out_path, $file, $storage = null
    ) {
        return $this->postConvertMarkdownInRequestToHtmlAsyncWithHttpInfo(
            $out_path, $file, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation postConvertMarkdownInRequestToHtmlAsyncWithHttpInfo
     *
     * Converts the Markdown document (in request content) to
     * HTML and uploads resulting file to storage by specified path.
     *
     * @param string        $out_path Full resulting file path in the storage
     *                                (ex. /folder1/folder2/result.html)
     *                                (required)
     * @param SplFileObject $file     A file to be converted. (required)
     * @param string        $storage  Source document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function postConvertMarkdownInRequestToHtmlAsyncWithHttpInfo(
        $out_path, $file, $storage
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postConvertMarkdownInRequestToHtmlRequest(
            $out_path, $file, $storage
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
     * Create request for operation 'postConvertMarkdownInRequestToHtml'
     *
     * @param string        $out_path Full resulting file path in the storage
     *                                (ex. /folder1/folder2/result.html)
     *                                (required)
     * @param SplFileObject $file     A file to be converted. (required)
     * @param string        $storage  Source document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function postConvertMarkdownInRequestToHtmlRequest(
        $out_path, $file, $storage
    ) {
        // verify the required parameter 'out_path' is set
        if (($out_path === null)
            || (is_array($out_path) && count($out_path) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_path when calling postConvertMarkdownInRequestToHtml'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$file when calling postConvertMarkdownInRequestToHtml'
            );
        }

        $resourcePath = '/html/import/md';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = true;

        $formParams['file']
            = try_fopen(ObjectSerializer::toFormValue($file), 'rb');

        $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);

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

    /**
     * Operation putConvertMarkdownToHtml
     *
     * Converts the Markdown document (located on storage) to
     * HTML and uploads resulting file to storage by specified path.
     *
     * @param string $name     Document name. (required)
     * @param string $out_path Full resulting file path in the storage
     *                         (ex. /folder1/folder2/result.html) (required)
     * @param string $folder   The source document folder. (optional)
     * @param string $storage  The source and resulting document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function putConvertMarkdownToHtml(
        $name, $out_path, $folder = null, $storage = null
    ) {
        list($response) = $this->putConvertMarkdownToHtmlWithHttpInfo(
            $name, $out_path, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation putConvertMarkdownToHtmlWithHttpInfo
     *
     * Converts the Markdown document (located on storage) to HTML
     * and uploads resulting file to storage by specified path.
     *
     * @param string $name     Document name. (required)
     * @param string $out_path Full resulting file path in the storage
     *                         (ex. /folder1/folder2/result.html) (required)
     * @param string $folder   The source document folder. (optional)
     * @param string $storage  The source and resulting document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function putConvertMarkdownToHtmlWithHttpInfo(
        $name, $out_path, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->putConvertMarkdownToHtmlRequest(
            $name, $out_path, $folder, $storage
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
     * Operation putConvertMarkdownToHtmlAsync
     *
     * Converts the Markdown document (located on storage) to HTML
     * and uploads resulting file to storage by specified path.
     *
     * @param string $name     Document name. (required)
     * @param string $out_path Full resulting file path in the storage
     *                         (ex. /folder1/folder2/result.html) (required)
     * @param string $folder   The source document folder. (optional)
     * @param string $storage  The source and resulting document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function putConvertMarkdownToHtmlAsync(
        $name, $out_path, $folder = null, $storage = null
    ) {
        return $this->putConvertMarkdownToHtmlAsyncWithHttpInfo(
            $name, $out_path, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation putConvertMarkdownToHtmlAsyncWithHttpInfo
     *
     * Converts the Markdown document (located on storage) to HTML
     * and uploads resulting file to storage by specified path.
     *
     * @param string $name     Document name. (required)
     * @param string $out_path Full resulting file path in the storage
     *                         (ex. /folder1/folder2/result.html) (required)
     * @param string $folder   The source document folder. (optional)
     * @param string $storage  The source and resulting document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function putConvertMarkdownToHtmlAsyncWithHttpInfo(
        $name, $out_path, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->putConvertMarkdownToHtmlRequest(
            $name, $out_path, $folder, $storage
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
     * Create request for operation 'putConvertMarkdownToHtml'
     *
     * @param string $name     Document name. (required)
     * @param string $out_path Full resulting file path in the storage
     *                         (ex. /folder1/folder2/result.html) (required)
     * @param string $folder   The source document folder. (optional)
     * @param string $storage  The source and resulting document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function putConvertMarkdownToHtmlRequest(
        $name, $out_path, $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling putConvertMarkdownToHtml'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null || (is_array($out_path) && count($out_path) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_path when calling putConvertMarkdownToHtml'
            );
        }

        $resourcePath = '/html/{name}/import/md';
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

        $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);

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
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}
