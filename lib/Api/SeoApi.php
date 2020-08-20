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

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use function GuzzleHttp\Psr7\build_query;
use GuzzleHttp\Psr7\Request;
use Client\Invoker\ApiException;
use Client\Invoker\ObjectSerializer;
use InvalidArgumentException;
use SplFileObject;

/**
 * Page analysis and return of SEO warnings in json format.
 * Checks the markup validity of Web documents in HTML, XHTML, etc., and return result in json format.
 *
 * @category SeoApi
 * @package  html-sdk-php
 * @author   Alexander Makogon <alexander.makogon@aspose.com>
 * @license  https://opensource.org/licenses/mit-license.php  MIT License
 * @link     https://packagist.org/packages/aspose/html-sdk-php
 */
trait SeoApi
{
    /**
     * Operation getSeoWarning
     *
     * Page analysis and return of SEO warnings in json format.
     *
     * @param string $addr Source page URL. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getSeoWarning($addr)
    {
        list($response) = $this->getSeoWarningWithHttpInfo($addr);
        return $response;
    }

    /**
     * Operation getSeoWarningWithHttpInfo
     *
     * Page analysis and return of SEO warnings in json format.
     *
     * @param string $addr Source page URL. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getSeoWarningWithHttpInfo($addr)
    {
        $returnType = '\SplFileObject';
        $request = $this->getSeoWarningRequest($addr);

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
     * Operation getSeoWarningAsync
     *
     * Page analysis and return of SEO warnings in json format.
     *
     * @param string $addr Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getSeoWarningAsync($addr)
    {
        return $this->getSeoWarningAsyncWithHttpInfo($addr)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getSeoWarningAsyncWithHttpInfo
     *
     * Page analysis and return of SEO warnings in json format.
     *
     * @param string $addr Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getSeoWarningAsyncWithHttpInfo($addr)
    {
        $returnType = '\SplFileObject';
        $request = $this->getSeoWarningRequest($addr);

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
     * Create request for operation 'getSeoWarning'
     *
     * @param string $addr Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getSeoWarningRequest($addr)
    {
        // verify the required parameter 'addr' is set
        if (($addr === null)
            || (is_array($addr) && count($addr) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$addr when calling getSeoWarning'
            );
        }

        $resourcePath = '/html/seo';
        $queryParams = [];
        $httpBody = '';

        $queryParams['addr'] = ObjectSerializer::toQueryValue($addr);

        $headers = $this->_headerSelector->selectHeaders(['application/json'], ['application/json']);

        $defaultHeaders = [];
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
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
     * Operation getHtmlWarning
     *
     * Checks the markup validity of Web documents in HTML, XHTML, etc., and return result in json format.
     *
     * @param string $url Source page URL. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function getHtmlWarning($url)
    {
        list($response) = $this->getHtmlWarningWithHttpInfo($url);
        return $response;
    }

    /**
     * Operation getHtmlWarningWithHttpInfo
     *
     * Checks the markup validity of Web documents in HTML, XHTML, etc., and return result in json format.
     *
     * @param string $url Source page URL. (required)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function getHtmlWarningWithHttpInfo($url)
    {
        $returnType = '\SplFileObject';
        $request = $this->getHtmlWarningRequest($url);

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
     * Operation getHtmlWarningAsync
     *
     * Checks the markup validity of Web documents in HTML, XHTML, etc., and return result in json format.
     *
     * @param string $url Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getHtmlWarningAsync($url)
    {
        return $this->getHtmlWarningAsyncWithHttpInfo($url)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getHtmlWarningAsyncWithHttpInfo
     *
     * Checks the markup validity of Web documents in HTML, XHTML, etc., and return result in json format.
     *
     * @param string $url Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getHtmlWarningAsyncWithHttpInfo($url)
    {
        $returnType = '\SplFileObject';
        $request = $this->getHtmlWarningRequest($url);

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
     * Create request for operation 'getHtmlWarning'
     *
     * @param string $url Source page URL. (required)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getHtmlWarningRequest($url)
    {
        // verify the required parameter 'url' is set
        if (($url === null)
            || (is_array($url) && count($url) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$url when calling getHtmlWarning'
            );
        }

        $resourcePath = '/html/validator';
        $queryParams = [];
        $httpBody = '';

        $queryParams['url'] = ObjectSerializer::toQueryValue($url);

        $headers = $this->_headerSelector->selectHeaders(['application/json'], ['application/json']);

        $defaultHeaders = [];
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
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
