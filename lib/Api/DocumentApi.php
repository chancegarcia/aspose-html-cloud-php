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

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use function GuzzleHttp\Psr7\build_query;
use function GuzzleHttp\json_encode;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use Client\Invoker\ApiException;
use Client\Invoker\ObjectSerializer;
use InvalidArgumentException;
use SplFileObject;
use stdClass;

/**
 * Downloading a site with all resources.
 * Get document with XPath filters from zip or url.
 * Get document with CSS selector filters from zip or url.
 * Extract all images from document or url.
 *
 * @category DocumentApi
 * @package  Asposehtmlcloudphp
 * @author   Alexander Makogon <alexander.makogon@aspose.com>
 * @license  https://opensource.org/licenses/mit-license.php  MIT License
 * @link     https://packagist.org/packages/aspose/aspose-html-cloud-php
 */
trait DocumentApi
{
    /**
     * Operation getDocumentByUrl
     *
     * Return all HTML page with linked resources packaged as a
     * ZIP archive by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getDocumentByUrl($source_url)
    {
        list($response) = $this->getDocumentByUrlWithHttpInfo($source_url);
        return $response;
    }

    /**
     * Operation getDocumentByUrlWithHttpInfo
     *
     * Return all HTML page with linked resources packaged as a
     * ZIP archive by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getDocumentByUrlWithHttpInfo($source_url)
    {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentByUrlRequest($source_url);

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
     * Operation getDocumentByUrlAsync
     *
     * Return all HTML page with linked resources packaged as a
     * ZIP archive by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentByUrlAsync($source_url)
    {
        return $this->getDocumentByUrlAsyncWithHttpInfo($source_url)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDocumentByUrlAsyncWithHttpInfo
     *
     * Return all HTML page with linked resources packaged as a
     * ZIP archive by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentByUrlAsyncWithHttpInfo($source_url)
    {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentByUrlRequest($source_url);

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
     * Create request for operation 'getDocumentByUrl'
     *
     * @param string $source_url Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getDocumentByUrlRequest($source_url)
    {
        // verify the required parameter 'source_url' is set
        if (($source_url === null)
            || (is_array($source_url) && count($source_url) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$source_url when calling getDocumentByUrl'
            );
        }

        $resourcePath = '/html/download';
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
                ['application/zip']
            );
        } else {
            $headers = $this->_headerSelector->selectHeaders(
                ['application/zip'],
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
     * Operation getDocumentFragmentByXPath
     *
     * Return list of HTML fragments matching the specified XPath query.
     *
     * @param string $name       The document name. (required)
     * @param string $x_path     XPath query string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     * @param string $storage    The document storage. (optional)
     * @param string $folder     The document folder. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getDocumentFragmentByXPath(
        $name, $x_path, $out_format, $storage = null, $folder = null
    ) {
        list($response) = $this->getDocumentFragmentByXPathWithHttpInfo(
            $name, $x_path, $out_format, $storage, $folder
        );
        return $response;
    }

    /**
     * Operation getDocumentFragmentByXPathWithHttpInfo
     *
     * Return list of HTML fragments matching the specified XPath query.
     *
     * @param string $name       The document name. (required)
     * @param string $x_path     XPath query string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     * @param string $storage    The document storage. (optional)
     * @param string $folder     The document folder. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getDocumentFragmentByXPathWithHttpInfo(
        $name, $x_path, $out_format, $storage = null, $folder = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentFragmentByXPathRequest(
            $name, $x_path, $out_format, $storage, $folder
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
     * Operation getDocumentFragmentByXPathAsync
     *
     * Return list of HTML fragments matching the specified XPath query.
     *
     * @param string $name       The document name. (required)
     * @param string $x_path     XPath query string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     * @param string $storage    The document storage. (optional)
     * @param string $folder     The document folder. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentFragmentByXPathAsync(
        $name, $x_path, $out_format, $storage = null, $folder = null
    ) {
        return $this->getDocumentFragmentByXPathAsyncWithHttpInfo(
            $name, $x_path, $out_format, $storage, $folder
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getDocumentFragmentByXPathAsyncWithHttpInfo
     *
     * Return list of HTML fragments matching the specified XPath query.
     *
     * @param string $name       The document name. (required)
     * @param string $x_path     XPath query string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     * @param string $storage    The document storage. (optional)
     * @param string $folder     The document folder. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentFragmentByXPathAsyncWithHttpInfo(
        $name, $x_path, $out_format, $storage = null, $folder = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentFragmentByXPathRequest(
            $name, $x_path, $out_format, $storage, $folder
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
     * Create request for operation 'getDocumentFragmentByXPath'
     *
     * @param string $name       The document name. (required)
     * @param string $x_path     XPath query string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     * @param string $storage    The document storage. (optional)
     * @param string $folder     The document folder. (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getDocumentFragmentByXPathRequest(
        $name, $x_path, $out_format, $storage = null, $folder = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling getDocumentFragmentByXPath'
            );
        }
        // verify the required parameter 'x_path' is set
        if ($x_path === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$x_path when calling getDocumentFragmentByXPath'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_format when calling getDocumentFragmentByXPath'
            );
        }

        $resourcePath = '/html/{name}/fragments/{outFormat}';
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
            '{' . 'outFormat' . '}',
            ObjectSerializer::toPathValue($out_format),
            $resourcePath
        );

        $queryParams['xPath'] = ObjectSerializer::toQueryValue($x_path);

        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }
        // query params
        if ($folder !== null) {
            $queryParams['folder'] = ObjectSerializer::toQueryValue($folder);
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
     * Operation getDocumentFragmentByXPathByUrl
     *
     * Return list of HTML fragments matching the specified
     * XPath query by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     * @param string $x_path     XPath query string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getDocumentFragmentByXPathByUrl(
        $source_url, $x_path, $out_format
    ) {
        list($response) = $this->getDocumentFragmentByXPathByUrlWithHttpInfo(
            $source_url, $x_path, $out_format
        );
        return $response;
    }

    /**
     * Operation getDocumentFragmentByXPathByUrlWithHttpInfo
     *
     * Return list of HTML fragments matching the specified
     * XPath query by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     * @param string $x_path     XPath query string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getDocumentFragmentByXPathByUrlWithHttpInfo(
        $source_url, $x_path, $out_format
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentFragmentByXPathByUrlRequest(
            $source_url, $x_path, $out_format
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
     * Operation getDocumentFragmentByXPathByUrlAsync
     *
     * Return list of HTML fragments matching the specified
     * XPath query by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     * @param string $x_path     XPath query string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentFragmentByXPathByUrlAsync(
        $source_url, $x_path, $out_format
    ) {
        return $this->getDocumentFragmentByXPathByUrlAsyncWithHttpInfo(
            $source_url, $x_path, $out_format
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getDocumentFragmentByXPathByUrlAsyncWithHttpInfo
     *
     * Return list of HTML fragments matching the specified
     * XPath query by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     * @param string $x_path     XPath query string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentFragmentByXPathByUrlAsyncWithHttpInfo(
        $source_url, $x_path, $out_format
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentFragmentByXPathByUrlRequest(
            $source_url, $x_path, $out_format
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
     * Create request for operation 'getDocumentFragmentByXPathByUrl'
     *
     * @param string $source_url Source page URL. (required)
     * @param string $x_path     XPath query string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getDocumentFragmentByXPathByUrlRequest(
        $source_url, $x_path, $out_format
    ) {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$source_url when calling getDocumentFragmentByXPathByUrl'
            );
        }
        // verify the required parameter 'x_path' is set
        if ($x_path === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$x_path when calling getDocumentFragmentByXPathByUrl'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_format when calling getDocumentFragmentByXPathByUrl'
            );
        }

        $resourcePath = '/html/fragments/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);
        $queryParams['xPath'] = ObjectSerializer::toQueryValue($x_path);
        $resourcePath = str_replace(
            '{' . 'outFormat' . '}',
            ObjectSerializer::toPathValue($out_format),
            $resourcePath
        );

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->_headerSelector->selectHeadersForMultipart(
                ['application/zip']
            );
        } else {
            $headers = $this->_headerSelector->selectHeaders(
                ['application/zip'],
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
     * Operation getDocumentFragmentsByCSSSelector
     *
     * Return list of HTML fragments matching the specified CSS selector.
     *
     * @param string $name       The document name. (required)
     * @param string $selector   CSS selector string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     * @param string $folder     The document folder. (optional)
     * @param string $storage    The document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getDocumentFragmentsByCSSSelector(
        $name, $selector, $out_format, $folder = null, $storage = null
    ) {
        list($response) = $this->getDocumentFragmentsByCSSSelectorWithHttpInfo(
            $name, $selector, $out_format, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getDocumentFragmentsByCSSSelectorWithHttpInfo
     *
     * Return list of HTML fragments matching the specified CSS selector.
     *
     * @param string $name       The document name. (required)
     * @param string $selector   CSS selector string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     * @param string $folder     The document folder. (optional)
     * @param string $storage    The document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getDocumentFragmentsByCSSSelectorWithHttpInfo(
        $name, $selector, $out_format, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentFragmentsByCSSSelectorRequest(
            $name, $selector, $out_format, $folder, $storage
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
            case 204:
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
     * Operation getDocumentFragmentsByCSSSelectorAsync
     *
     * Return list of HTML fragments matching the specified CSS selector.
     *
     * @param string $name       The document name. (required)
     * @param string $selector   CSS selector string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     * @param string $folder     The document folder. (optional)
     * @param string $storage    The document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentFragmentsByCSSSelectorAsync(
        $name, $selector, $out_format, $folder = null, $storage = null
    ) {
        return $this->getDocumentFragmentsByCSSSelectorAsyncWithHttpInfo(
            $name, $selector, $out_format, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getDocumentFragmentsByCSSSelectorAsyncWithHttpInfo
     *
     * Return list of HTML fragments matching the specified CSS selector.
     *
     * @param string $name       The document name. (required)
     * @param string $selector   CSS selector string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     * @param string $folder     The document folder. (optional)
     * @param string $storage    The document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentFragmentsByCSSSelectorAsyncWithHttpInfo(
        $name, $selector, $out_format, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentFragmentsByCSSSelectorRequest(
            $name, $selector, $out_format, $folder, $storage
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
     * Create request for operation 'getDocumentFragmentsByCSSSelector'
     *
     * @param string $name       The document name. (required)
     * @param string $selector   CSS selector string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     * @param string $folder     The document folder. (optional)
     * @param string $storage    The document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getDocumentFragmentsByCSSSelectorRequest(
        $name, $selector, $out_format, $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling getDocumentFragmentsByCSSSelector'
            );
        }
        // verify the required parameter 'selector' is set
        if ($selector === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$selector when calling getDocumentFragmentsByCSSSelector'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_format when calling getDocumentFragmentsByCSSSelector'
            );
        }

        $resourcePath = '/html/{name}/fragments/css/{outFormat}';
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
            '{' . 'outFormat' . '}',
            ObjectSerializer::toPathValue($out_format),
            $resourcePath
        );

        $queryParams['selector'] = ObjectSerializer::toQueryValue($selector);

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
            $headers = $this->__headerSelector->selectHeadersForMultipart(
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
     * Operation getDocumentFragmentsByCSSSelectorByUrl
     *
     * Return list of HTML fragments matching the specified
     * CSS selector by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     * @param string $selector   CSS selector string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getDocumentFragmentsByCSSSelectorByUrl(
        $source_url, $selector, $out_format
    ) {
        list($response) = $this->getDocumentFragmentsByCSSSelectorByUrlWithHttpInfo(
            $source_url, $selector, $out_format
        );
        return $response;
    }

    /**
     * Operation getDocumentFragmentsByCSSSelectorByUrlWithHttpInfo
     *
     * Return list of HTML fragments matching the specified
     * CSS selector by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     * @param string $selector   CSS selector string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getDocumentFragmentsByCSSSelectorByUrlWithHttpInfo(
        $source_url, $selector, $out_format
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentFragmentsByCSSSelectorByUrlRequest(
            $source_url, $selector, $out_format
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
            case 204:
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
     * Operation getDocumentFragmentsByCSSSelectorByUrlAsync
     *
     * Return list of HTML fragments matching the specified
     * CSS selector by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     * @param string $selector   CSS selector string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentFragmentsByCSSSelectorByUrlAsync(
        $source_url, $selector, $out_format
    ) {
        return $this->getDocumentFragmentsByCSSSelectorByUrlAsyncWithHttpInfo(
            $source_url, $selector, $out_format
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getDocumentFragmentsByCSSSelectorByUrlAsyncWithHttpInfo
     *
     * Return list of HTML fragments matching the specified
     * CSS selector by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     * @param string $selector   CSS selector string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentFragmentsByCSSSelectorByUrlAsyncWithHttpInfo(
        $source_url, $selector, $out_format
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentFragmentsByCSSSelectorByUrlRequest(
            $source_url, $selector, $out_format
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
     * Create request for operation 'getDocumentFragmentsByCSSSelectorByUrl'
     *
     * @param string $source_url Source page URL. (required)
     * @param string $selector   CSS selector string. (required)
     * @param string $out_format Output format. Possible values:
     *                           'plain' and 'json'. (required)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getDocumentFragmentsByCSSSelectorByUrlRequest(
        $source_url, $selector, $out_format
    ) {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$source_url when calling getDocumentFragmentsByCSSSelectorByUrl'
            );
        }
        // verify the required parameter 'selector' is set
        if ($selector === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$selector when calling getDocumentFragmentsByCSSSelectorByUrl'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_format when calling getDocumentFragmentsByCSSSelectorByUrl'
            );
        }

        $resourcePath = '/html/fragments/css/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);
        $queryParams['selector'] = ObjectSerializer::toQueryValue($selector);

        // path params
        $resourcePath = str_replace(
            '{' . 'outFormat' . '}',
            ObjectSerializer::toPathValue($out_format),
            $resourcePath
        );

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
     * Operation getDocumentImages
     *
     * Return all HTML document images packaged as a ZIP archive.
     *
     * @param string $name    The document name. (required)
     * @param string $folder  The document folder. (optional)
     * @param string $storage The document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getDocumentImages($name, $folder = null, $storage = null)
    {
        list($response) = $this->getDocumentImagesWithHttpInfo(
            $name, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getDocumentImagesWithHttpInfo
     *
     * Return all HTML document images packaged as a ZIP archive.
     *
     * @param string $name    The document name. (required)
     * @param string $folder  The document folder. (optional)
     * @param string $storage The document storage. (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getDocumentImagesWithHttpInfo(
        $name, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentImagesRequest($name, $folder, $storage);

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
     * Operation getDocumentImagesAsync
     *
     * Return all HTML document images packaged as a ZIP archive.
     *
     * @param string $name    The document name. (required)
     * @param string $folder  The document folder. (optional)
     * @param string $storage The document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentImagesAsync($name, $folder = null, $storage = null)
    {
        return $this->getDocumentImagesAsyncWithHttpInfo($name, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDocumentImagesAsyncWithHttpInfo
     *
     * Return all HTML document images packaged as a ZIP archive.
     *
     * @param string $name    The document name. (required)
     * @param string $folder  The document folder. (optional)
     * @param string $storage The document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentImagesAsyncWithHttpInfo(
        $name, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentImagesRequest($name, $folder, $storage);

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
     * Create request for operation 'getDocumentImages'
     *
     * @param string $name    The document name. (required)
     * @param string $folder  The document folder. (optional)
     * @param string $storage The document storage. (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getDocumentImagesRequest(
        $name, $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling getDocumentImages'
            );
        }

        $resourcePath = '/html/{name}/images/all';
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
        $resourcePath = str_replace(
            '{' . 'name' . '}',
            ObjectSerializer::toPathValue($name),
            $resourcePath
        );

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->_headerSelector->selectHeadersForMultipart(
                ['application/zip']
            );
        } else {
            $headers = $this->_headerSelector->selectHeaders(
                ['application/zip'],
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
     * Operation getDocumentImagesByUrl
     *
     * Return all HTML page images packaged as a ZIP archive by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getDocumentImagesByUrl($source_url)
    {
        list($response) = $this->getDocumentImagesByUrlWithHttpInfo($source_url);
        return $response;
    }

    /**
     * Operation getDocumentImagesByUrlWithHttpInfo
     *
     * Return all HTML page images packaged as a ZIP archive by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getDocumentImagesByUrlWithHttpInfo($source_url)
    {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentImagesByUrlRequest($source_url);

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
     * Operation getDocumentImagesByUrlAsync
     *
     * Return all HTML page images packaged as a
     * ZIP archive by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentImagesByUrlAsync($source_url)
    {
        return $this->getDocumentImagesByUrlAsyncWithHttpInfo($source_url)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDocumentImagesByUrlAsyncWithHttpInfo
     *
     * Return all HTML page images packaged as a
     * ZIP archive by the source page URL.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getDocumentImagesByUrlAsyncWithHttpInfo($source_url)
    {
        $returnType = '\SplFileObject';
        $request = $this->getDocumentImagesByUrlRequest($source_url);

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
     * Create request for operation 'getDocumentImagesByUrl'
     *
     * @param string $source_url Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getDocumentImagesByUrlRequest($source_url)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$source_url when calling getDocumentImagesByUrl'
            );
        }

        $resourcePath = '/html/images/all';
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
                ['application/zip']
            );
        } else {
            $headers = $this->_headerSelector->selectHeaders(
                ['application/zip'],
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
