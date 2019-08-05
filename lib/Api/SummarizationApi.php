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
 * Get the HTML document keywords using the keyword detection service.
 *
 * @category SummarizationApi
 * @package  Asposehtmlcloudphp
 * @author   Alexander Makogon <alexander.makogon@aspose.com>
 * @license  https://opensource.org/licenses/mit-license.php  MIT License
 * @link     https://packagist.org/packages/aspose/aspose-html-cloud-php
 */
trait SummarizationApi
{

    /**
     * Operation getDetectHtmlKeywords
     *
     * Get the HTML document keywords using the keyword detection service.
     *
     * @param string $name    Document name. (required)
     * @param string $folder  Document folder. (optional)
     * @param string $storage Document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getDetectHtmlKeywords($name, $folder = null, $storage = null)
    {
        list($response) = $this->getDetectHtmlKeywordsWithHttpInfo(
            $name, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getDetectHtmlKeywordsWithHttpInfo
     *
     * Get the HTML document keywords using the keyword detection service.
     *
     * @param string $name    Document name. (required)
     * @param string $folder  Document folder. (optional)
     * @param string $storage Document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getDetectHtmlKeywordsWithHttpInfo(
        $name, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDetectHtmlKeywordsRequest($name, $folder, $storage);

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
     * Operation getDetectHtmlKeywordsAsync
     *
     * Get the HTML document keywords using the keyword detection service.
     *
     * @param string $name    Document name. (required)
     * @param string $folder  Document folder. (optional)
     * @param string $storage Document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDetectHtmlKeywordsAsync(
        $name, $folder = null, $storage = null
    ) {
        return $this->getDetectHtmlKeywordsAsyncWithHttpInfo(
            $name, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getDetectHtmlKeywordsAsyncWithHttpInfo
     *
     * Get the HTML document keywords using the keyword detection service.
     *
     * @param string $name    Document name. (required)
     * @param string $folder  Document folder. (optional)
     * @param string $storage Document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDetectHtmlKeywordsAsyncWithHttpInfo(
        $name, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDetectHtmlKeywordsRequest($name, $folder, $storage);

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
     * Create request for operation 'getDetectHtmlKeywords'
     *
     * @param string $name    Document name. (required)
     * @param string $folder  Document folder. (optional)
     * @param string $storage Document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getDetectHtmlKeywordsRequest(
        $name, $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling getDetectHtmlKeywords'
            );
        }

        $resourcePath = '/html/{name}/summ/keywords';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
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
                ['application/json']
            );
        } else {
            $headers = $this->_headerSelector->selectHeaders(
                ['application/json'],
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
     * Operation getDetectHtmlKeywordsByUrl
     *
     * Get the keywords from HTML document from Web specified by its
     * URL using the keyword detection service
     *
     * @param string $source_url Source document URL. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getDetectHtmlKeywordsByUrl($source_url)
    {
        list($response) = $this->getDetectHtmlKeywordsByUrlWithHttpInfo($source_url);
        return $response;
    }

    /**
     * Operation getDetectHtmlKeywordsByUrlWithHttpInfo
     *
     * Get the keywords from HTML document from Web specified by its
     * URL using the keyword detection service
     *
     * @param string $source_url Source document URL. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getDetectHtmlKeywordsByUrlWithHttpInfo($source_url)
    {
        $returnType = '\SplFileObject';
        $request = $this->getDetectHtmlKeywordsByUrlRequest($source_url);

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
     * Operation getDetectHtmlKeywordsByUrlAsync
     *
     * Get the keywords from HTML document from Web specified by its URL
     * using the keyword detection service
     *
     * @param string $source_url Source document URL. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDetectHtmlKeywordsByUrlAsync($source_url)
    {
        return $this->getDetectHtmlKeywordsByUrlAsyncWithHttpInfo($source_url)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDetectHtmlKeywordsByUrlAsyncWithHttpInfo
     *
     * Get the keywords from HTML document from Web specified by its
     * URL using the keyword detection service
     *
     * @param string $source_url Source document URL. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDetectHtmlKeywordsByUrlAsyncWithHttpInfo($source_url)
    {
        $returnType = '\SplFileObject';
        $request = $this->getDetectHtmlKeywordsByUrlRequest($source_url);

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
     * Create request for operation 'getDetectHtmlKeywordsByUrl'
     *
     * @param string $source_url Source document URL. (required)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getDetectHtmlKeywordsByUrlRequest($source_url)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$source_url when calling getDetectHtmlKeywordsByUrl'
            );
        }

        $resourcePath = '/html/summ/keywords';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->_headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->_headerSelector->selectHeaders(
                ['application/json'],
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
