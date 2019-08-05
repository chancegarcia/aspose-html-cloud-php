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
 * Conversion from html, epub, svg formats to
 * images (gif, tiff, png, bmp, jpeg), xps and pdf formats.
 * Conversion from html to markdown format.
 *
 * @category ConversionApi
 * @package  Asposehtmlcloudphp
 * @author   Alexander Makogon <alexander.makogon@aspose.com>
 * @license  https://opensource.org/licenses/mit-license.php  MIT License
 * @link     https://packagist.org/packages/aspose/aspose-html-cloud-php
 */
trait ConversionApi
{
    /**
     * Operation getConvertDocumentToImage
     *
     * Convert the HTML document from the storage by its name to the specified
     * image format.
     *
     * @param string $name          Document name. (required)
     * @param string $out_format    Resulting image format. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param int    $resolution    Resolution of resulting image. (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source document storage. (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToImage(
        $name, $out_format, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $resolution = null, $folder = null, $storage = null
    ) {
        list($response) = $this->getConvertDocumentToImageWithHttpInfo(
            $name, $out_format, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution,
            $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getConvertDocumentToImageWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to the specified
     * image format.
     *
     * @param string $name          Document name. (required)
     * @param string $out_format    Resulting image format. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param int    $resolution    Resolution of resulting image. (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code, HTTP response
     * headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToImageWithHttpInfo(
        $name, $out_format, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $resolution = null, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToImageRequest(
            $name, $out_format, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $resolution, $folder, $storage
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
     * Create request for operation 'getConvertDocumentToImage'
     *
     * @param string $name          Document name. (required)
     * @param string $out_format    Resulting image format. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param int    $resolution    Resolution of resulting image. (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getConvertDocumentToImageRequest(
        $name, $out_format, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $resolution = null, $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling getConvertDocumentToImage'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_format when calling getConvertDocumentToImage'
            );
        }

        $resourcePath = '/html/{name}/convert/image/{outFormat}';
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

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($resolution !== null) {
            $queryParams['resolution']
                = ObjectSerializer::toQueryValue($resolution);
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
     * Operation getConvertDocumentToImageAsync
     *
     * Convert the HTML document from the storage by its name to the specified
     * image format.
     *
     * @param string $name          Document name. (required)
     * @param string $out_format    Resulting image format. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param int    $resolution    Resolution of resulting image. (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToImageAsync(
        $name, $out_format, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $resolution = null, $folder = null, $storage = null
    ) {
        return $this->getConvertDocumentToImageAsyncWithHttpInfo(
            $name, $out_format, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $resolution, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getConvertDocumentToImageAsyncWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to the specified
     * image format.
     *
     * @param string $name          Document name. (required)
     * @param string $out_format    Resulting image format. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param int    $resolution    Resolution of resulting image. (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToImageAsyncWithHttpInfo(
        $name, $out_format, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $resolution = null, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToImageRequest(
            $name, $out_format, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $resolution, $folder, $storage
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
     * Operation getConvertDocumentToImageByUrl
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param string $source_url    Source page URL. (required)
     * @param string $out_format    Resulting image format. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param int    $resolution    Resolution of resulting image. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToImageByUrl(
        $source_url, $out_format, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $resolution = null, $folder = null, $storage = null
    ) {
        list($response) = $this->getConvertDocumentToImageByUrlWithHttpInfo(
            $source_url, $out_format, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $resolution, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getConvertDocumentToImageByUrlWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param string $source_url    Source page URL. (required)
     * @param string $out_format    Resulting image format. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param int    $resolution    Resolution of resulting image. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToImageByUrlWithHttpInfo(
        $source_url, $out_format, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $resolution = null, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToImageByUrlRequest(
            $source_url, $out_format, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $resolution, $folder, $storage
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
     * Create request for operation 'getConvertDocumentToImageByUrl'
     *
     * @param string $source_url    Source page URL. (required)
     * @param string $out_format    Resulting image format. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param int    $resolution    Resolution of resulting image. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getConvertDocumentToImageByUrlRequest(
        $source_url, $out_format, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $resolution = null, $folder = null, $storage = null
    ) {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$source_url when calling getConvertDocumentToImageByUrl'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_format when calling getConvertDocumentToImageByUrl'
            );
        }

        $resourcePath = '/html/convert/image/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'outFormat' . '}',
            ObjectSerializer::toPathValue($out_format),
            $resourcePath
        );

        $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin']
                = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($resolution !== null) {
            $queryParams['resolution']
                = ObjectSerializer::toQueryValue($resolution);
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
     * Operation getConvertDocumentToImageByUrlAsync
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param string $source_url    Source page URL. (required)
     * @param string $out_format    Resulting image format. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param int    $resolution    Resolution of resulting image. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToImageByUrlAsync(
        $source_url, $out_format, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $resolution = null, $folder = null, $storage = null
    ) {
        return $this->getConvertDocumentToImageByUrlAsyncWithHttpInfo(
            $source_url, $out_format, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $resolution, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getConvertDocumentToImageByUrlAsyncWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param string $source_url    Source page URL. (required)
     * @param string $out_format    Resulting image format. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param int    $resolution    Resolution of resulting image. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToImageByUrlAsyncWithHttpInfo(
        $source_url, $out_format, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $resolution = null, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToImageByUrlRequest(
            $source_url, $out_format, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $resolution, $folder, $storage
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
     * Operation getConvertDocumentToPdf
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param string $name          Document name. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToPdf(
        $name, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        list($response) = $this->getConvertDocumentToPdfWithHttpInfo(
            $name, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getConvertDocumentToPdfWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param string $name          Document name. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code, HTTP response
     * headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToPdfWithHttpInfo(
        $name, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToPdfRequest(
            $name, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
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
     * Create request for operation 'getConvertDocumentToPdf'
     *
     * @param string $name          Document name. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getConvertDocumentToPdfRequest(
        $name, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling getConvertDocumentToPdf'
            );
        }

        $resourcePath = '/html/{name}/convert/pdf';
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
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin']
                = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
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
     * Operation getConvertDocumentToPdfAsync
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param string $name          Document name. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToPdfAsync(
        $name, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        return $this->getConvertDocumentToPdfAsyncWithHttpInfo(
            $name, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getConvertDocumentToPdfAsyncWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param string $name          Document name. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToPdfAsyncWithHttpInfo(
        $name, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToPdfRequest(
            $name, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
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
     * Operation getConvertDocumentToPdfByUrl
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param string $source_url    Source page URL. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToPdfByUrl(
        $source_url, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        list($response) = $this->getConvertDocumentToPdfByUrlWithHttpInfo(
            $source_url, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getConvertDocumentToPdfByUrlWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param string $source_url    Source page URL. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToPdfByUrlWithHttpInfo(
        $source_url, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToPdfByUrlRequest(
            $source_url, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
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
     * Create request for operation 'getConvertDocumentToPdfByUrl'
     *
     * @param string $source_url    Source page URL. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getConvertDocumentToPdfByUrlRequest(
        $source_url, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$source_url when calling getConvertDocumentToPdfByUrl'
            );
        }

        $resourcePath = '/html/convert/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin']
                = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
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
     * Operation getConvertDocumentToPdfByUrlAsync
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param string $source_url    Source page URL. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToPdfByUrlAsync(
        $source_url, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        return $this->getConvertDocumentToPdfByUrlAsyncWithHttpInfo(
            $source_url, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getConvertDocumentToPdfByUrlAsyncWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param string $source_url    Source page URL. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToPdfByUrlAsyncWithHttpInfo(
        $source_url, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToPdfByUrlRequest(
            $source_url, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
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
     * Operation getConvertDocumentToXps
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param string $name          Document name. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToXps(
        $name, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        list($response) = $this->getConvertDocumentToXpsWithHttpInfo(
            $name, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getConvertDocumentToXpsWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param string $name          Document name. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code, HTTP response
     * headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToXpsWithHttpInfo(
        $name, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToXpsRequest(
            $name, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
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
     * Create request for operation 'getConvertDocumentToXps'
     *
     * @param string $name          Document name. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getConvertDocumentToXpsRequest(
        $name, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling getConvertDocumentToXps'
            );
        }

        $resourcePath = '/html/{name}/convert/xps';
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
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin']
                = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
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
     * Operation getConvertDocumentToXpsAsync
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param string $name          Document name. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToXpsAsync(
        $name, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        return $this->getConvertDocumentToXpsAsyncWithHttpInfo(
            $name, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getConvertDocumentToXpsAsyncWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param string $name          Document name. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToXpsAsyncWithHttpInfo(
        $name, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToXpsRequest(
            $name, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
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
     * Operation getConvertDocumentToXpsByUrl
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param string $source_url    Source page URL. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToXpsByUrl(
        $source_url, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        list($response) = $this->getConvertDocumentToXpsByUrlWithHttpInfo(
            $source_url, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getConvertDocumentToXpsByUrlWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param string $source_url    Source page URL. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code, HTTP response
     * headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToXpsByUrlWithHttpInfo(
        $source_url, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToXpsByUrlRequest(
            $source_url, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
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
     * Create request for operation 'getConvertDocumentToXpsByUrl'
     *
     * @param string $source_url    Source page URL. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getConvertDocumentToXpsByUrlRequest(
        $source_url, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$source_url when calling getConvertDocumentToXpsByUrl'
            );
        }

        $resourcePath = '/html/convert/xps';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin']
                = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
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
     * Operation getConvertDocumentToXpsByUrlAsync
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param string $source_url    Source page URL. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToXpsByUrlAsync(
        $source_url, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        return $this->getConvertDocumentToXpsByUrlAsyncWithHttpInfo(
            $source_url, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getConvertDocumentToXpsByUrlAsyncWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param string $source_url    Source page URL. (required)
     * @param int    $width         Resulting image width. (optional)
     * @param int    $height        Resulting image height. (optional)
     * @param int    $left_margin   Left resulting image margin. (optional)
     * @param int    $right_margin  Right resulting image margin. (optional)
     * @param int    $top_margin    Top resulting image margin. (optional)
     * @param int    $bottom_margin Bottom resulting image margin. (optional)
     * @param string $folder        The document folder. (optional)
     * @param string $storage       The document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToXpsByUrlAsyncWithHttpInfo(
        $source_url, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToXpsByUrlRequest(
            $source_url, $width, $height, $left_margin, $right_margin, $top_margin,
            $bottom_margin, $folder, $storage
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
     * Operation postConvertDocumentInRequestToImage
     *
     * Converts the HTML document (in request content) to the specified image
     * format and uploads resulting file to storage.
     *
     * @param string        $out_path      Full resulting
     *                                     filename (ex. /folder1/folder2/result.jpg)
     *                                     (required)
     * @param string        $out_format    Out format (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page
     *                                     margin in points (1/96 inch). (optional)
     * @param int           $resolution    Resolution of resulting image.
     *                                     Default is 96 dpi. (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToImage(
        $out_path, $out_format, $file, $width = null, $height = null,
        $left_margin = null, $right_margin = null, $top_margin = null,
        $bottom_margin = null, $resolution = null
    ) {
        list($response) = $this->postConvertDocumentInRequestToImageWithHttpInfo(
            $out_path, $out_format, $file, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution
        );
        return $response;
    }
    /**
     * Operation postConvertDocumentInRequestToImageWithHttpInfo
     *
     * Converts the HTML document (in request content) to the specified image
     * format and uploads resulting file to storage.
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.jpg)
     *                                     (required)
     * @param string        $out_format    Out format (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $resolution    Resolution of resulting image.
     *                                     Default is 96 dpi. (optional)
     *
     * @return array of \SplFileObject, HTTP status code, HTTP response
     * headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToImageWithHttpInfo(
        $out_path, $out_format, $file, $width = null, $height = null,
        $left_margin = null, $right_margin = null, $top_margin = null,
        $bottom_margin = null, $resolution = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postConvertDocumentInRequestToImageRequest(
            $out_path, $out_format, $file, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution
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
     * Create request for operation 'postConvertDocumentInRequestToImage'
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.jpg)
     *                                     (required)
     * @param string        $out_format    Out format (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page
     *                                     margin in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page
     *                                     margin in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page
     *                                     margin in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page
     *                                     margin in points (1/96 inch). (optional)
     * @param int           $resolution    Resolution of resulting image.
     *                                     Default is 96 dpi. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function postConvertDocumentInRequestToImageRequest(
        $out_path, $out_format, $file, $width = null, $height = null,
        $left_margin = null, $right_margin = null, $top_margin = null,
        $bottom_margin = null, $resolution = null
    ) {
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_path when calling postConvertDocumentInRequestToImage'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_format when calling postConvertDocumentInRequestToImage'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$file when calling postConvertDocumentInRequestToImage'
            );
        }

        $resourcePath = '/html/convert/image/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // form params
        $multipart = true;
        $formParams['file']
            = try_fopen(ObjectSerializer::toFormValue($file), 'rb');

        $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin']
                = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($resolution !== null) {
            $queryParams['resolution']
                = ObjectSerializer::toQueryValue($resolution);
        }

        // path params
        if ($out_format !== null) {
            $resourcePath = str_replace(
                '{' . 'outFormat' . '}',
                ObjectSerializer::toPathValue($out_format),
                $resourcePath
            );
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
     * Operation postConvertDocumentInRequestToImageAsync
     *
     * Converts the HTML document (in request content) to the specified
     * image format and uploads resulting file to storage.
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.jpg)
     *                                     (required)
     * @param string        $out_format    Out format (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $resolution    Resolution of resulting image.
     *                                     Default is 96 dpi. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToImageAsync(
        $out_path, $out_format, $file, $width = null, $height = null,
        $left_margin = null, $right_margin = null, $top_margin = null,
        $bottom_margin = null, $resolution = null
    ) {
        return $this->postConvertDocumentInRequestToImageAsyncWithHttpInfo(
            $out_path, $out_format, $file, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation postConvertDocumentInRequestToImageAsyncWithHttpInfo
     *
     * Converts the HTML document (in request content) to the
     * specified image format and uploads resulting file to storage.
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.jpg)
     *                                     (required)
     * @param string        $out_format    Out format (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin in
     *                                     points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $resolution    Resolution of resulting image.
     *                                     Default is 96 dpi. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToImageAsyncWithHttpInfo(
        $out_path, $out_format, $file, $width = null, $height = null,
        $left_margin = null, $right_margin = null, $top_margin = null,
        $bottom_margin = null, $resolution = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postConvertDocumentInRequestToImageRequest(
            $out_path, $out_format, $file, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution
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
     * Operation postConvertDocumentInRequestToPdf
     *
     * Converts the HTML document (in request content) to PDF and uploads
     * resulting file to storage.
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.pdf)
     *                                     (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToPdf(
        $out_path, $file, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null
    ) {
        list($response) = $this->postConvertDocumentInRequestToPdfWithHttpInfo(
            $out_path, $file, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin
        );
        return $response;
    }

    /**
     * Operation postConvertDocumentInRequestToPdfWithHttpInfo
     *
     * Converts the HTML document (in request content) to PDF
     * and uploads resulting file to storage.
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.pdf)
     *                                     (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     *
     * @return array of \SplFileObject, HTTP status code, HTTP response
     * headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToPdfWithHttpInfo(
        $out_path, $file, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postConvertDocumentInRequestToPdfRequest(
            $out_path, $file, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin
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
     * Create request for operation 'postConvertDocumentInRequestToPdf'
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.pdf)
     *                                     (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function postConvertDocumentInRequestToPdfRequest(
        $out_path, $file, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null
    ) {
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_path when calling postConvertDocumentInRequestToPdf'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$file when calling postConvertDocumentInRequestToPdf'
            );
        }

        $resourcePath = '/html/convert/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $multipart = true;
        $formParams['file']
            = try_fopen(ObjectSerializer::toFormValue($file), 'rb');

        $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin']
                = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
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
     * Operation postConvertDocumentInRequestToPdfAsync
     *
     * Converts the HTML document (in request content) to PDF
     * and uploads resulting file to storage.
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.pdf)
     *                                     (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToPdfAsync(
        $out_path, $file, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null
    ) {
        return $this->postConvertDocumentInRequestToPdfAsyncWithHttpInfo(
            $out_path, $file, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation postConvertDocumentInRequestToPdfAsyncWithHttpInfo
     *
     * Converts the HTML document (in request content) to PDF
     * and uploads resulting file to storage.
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.pdf)
     *                                     (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToPdfAsyncWithHttpInfo(
        $out_path, $file, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postConvertDocumentInRequestToPdfRequest(
            $out_path, $file, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin
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
     * Operation postConvertDocumentInRequestToXps
     *
     * Converts the HTML document (in request content) to XPS
     * and uploads resulting file to storage.
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.xps)
     *                                     (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToXps(
        $out_path, $file, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null
    ) {
        list($response) = $this->postConvertDocumentInRequestToXpsWithHttpInfo(
            $out_path, $file, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin
        );
        return $response;
    }

    /**
     * Operation postConvertDocumentInRequestToXpsWithHttpInfo
     *
     * Converts the HTML document (in request content) to XPS
     * and uploads resulting file to storage.
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.xps)
     *                                     (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     *
     * @return array of \SplFileObject, HTTP status code, HTTP response
     * headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToXpsWithHttpInfo(
        $out_path, $file, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postConvertDocumentInRequestToXpsRequest(
            $out_path, $file, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin
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
     * Create request for operation 'postConvertDocumentInRequestToXps'
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.xps)
     *                                     (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function postConvertDocumentInRequestToXpsRequest(
        $out_path, $file, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null
    ) {
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_path when calling postConvertDocumentInRequestToXps'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$file when calling postConvertDocumentInRequestToXps'
            );
        }

        $resourcePath = '/html/convert/xps';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin']
                = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
        }

        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file']
                = try_fopen(ObjectSerializer::toFormValue($file), 'rb');
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
     * Operation postConvertDocumentInRequestToXpsAsync
     *
     * Converts the HTML document (in request content) to XPS
     * and uploads resulting file to storage.
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.xps)
     *                                     (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToXpsAsync(
        $out_path, $file, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null
    ) {
        return $this->postConvertDocumentInRequestToXpsAsyncWithHttpInfo(
            $out_path, $file, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation postConvertDocumentInRequestToXpsAsyncWithHttpInfo
     *
     * Converts the HTML document (in request content) to XPS
     * and uploads resulting file to storage.
     *
     * @param string        $out_path      Full resulting filename
     *                                     (ex. /folder1/folder2/result.xps)
     *                                     (required)
     * @param SplFileObject $file          A file to be converted. (required)
     * @param int           $width         Resulting document page width
     *                                     in points (1/96 inch). (optional)
     * @param int           $height        Resulting document page height
     *                                     in points (1/96 inch). (optional)
     * @param int           $left_margin   Left resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $right_margin  Right resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $top_margin    Top resulting document page margin
     *                                     in points (1/96 inch). (optional)
     * @param int           $bottom_margin Bottom resulting document page margin
     *                                     in points (1/96 inch). (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToXpsAsyncWithHttpInfo(
        $out_path, $file, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postConvertDocumentInRequestToXpsRequest(
            $out_path, $file, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin
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
     * Operation putConvertDocumentToImage
     *
     * Converts the HTML document (located on storage) to the
     * specified image format and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.jpg)
     *                              (required)
     * @param string $out_format    Out format (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $resolution    Resolution of resulting image.
     *                              Default is 96 dpi. (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToImage(
        $name, $out_path, $out_format, $width = null, $height = null,
        $left_margin = null, $right_margin = null, $top_margin = null,
        $bottom_margin = null, $resolution = null, $folder = null, $storage = null
    ) {
        list($response) = $this->putConvertDocumentToImageWithHttpInfo(
            $name, $out_path, $out_format, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution,
            $folder, $storage
        );
        return $response;
    }

    /**
     * Operation putConvertDocumentToImageWithHttpInfo
     *
     * Converts the HTML document (located on storage) to the
     * specified image format and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.jpg)
     *                              (required)
     * @param string $out_format    Out format (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $resolution    Resolution of resulting image.
     *                              Default is 96 dpi. (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToImageWithHttpInfo(
        $name, $out_path, $out_format, $width = null, $height = null,
        $left_margin = null, $right_margin = null, $top_margin = null,
        $bottom_margin = null, $resolution = null, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->putConvertDocumentToImageRequest(
            $name, $out_path, $out_format, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution,
            $folder, $storage
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
     * Create request for operation 'putConvertDocumentToImage'
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.jpg)
     *                              (required)
     * @param string $out_format    Out format(required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $resolution    Resolution of resulting image.
     *                              Default is 96 dpi. (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function putConvertDocumentToImageRequest(
        $name, $out_path, $out_format, $width = null, $height = null,
        $left_margin = null, $right_margin = null, $top_margin = null,
        $bottom_margin = null, $resolution = null, $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling putConvertDocumentToImage'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_path when calling putConvertDocumentToImage'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_format when calling putConvertDocumentToImage'
            );
        }

        $resourcePath = '/html/{name}/convert/image/{outFormat}';
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

        $resourcePath = str_replace(
            '{' . 'outFormat' . '}',
            ObjectSerializer::toPathValue($out_format),
            $resourcePath
        );

        $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin']
                = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($resolution !== null) {
            $queryParams['resolution']
                = ObjectSerializer::toQueryValue($resolution);
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
            $headerParams,
            $headers
        );

        $query = build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation putConvertDocumentToImageAsync
     *
     * Converts the HTML document (located on storage) to the specified
     * image format and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.jpg)
     *                              (required)
     * @param string $out_format    Out format (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $resolution    Resolution of resulting image.
     *                              Default is 96 dpi. (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToImageAsync(
        $name, $out_path, $out_format, $width = null, $height = null,
        $left_margin = null, $right_margin = null, $top_margin = null,
        $bottom_margin = null, $resolution = null, $folder = null, $storage = null
    ) {
        return $this->putConvertDocumentToImageAsyncWithHttpInfo(
            $name, $out_path, $out_format, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution,
            $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation putConvertDocumentToImageAsyncWithHttpInfo
     *
     * Converts the HTML document (located on storage) to the
     * specified image format and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.jpg)
     *                              (required)
     * @param string $out_format    Out format (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $resolution    Resolution of resulting image.
     *                              Default is 96 dpi. (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToImageAsyncWithHttpInfo(
        $name, $out_path, $out_format, $width = null, $height = null,
        $left_margin = null, $right_margin = null, $top_margin = null,
        $bottom_margin = null, $resolution = null, $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->putConvertDocumentToImageRequest(
            $name, $out_path, $out_format, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution,
            $folder, $storage
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
     * Operation putConvertDocumentToPdf
     *
     * Converts the HTML document (located on storage) to PDF
     * and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.pdf)
     *                              (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToPdf(
        $name, $out_path, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        list($response) = $this->putConvertDocumentToPdfWithHttpInfo(
            $name, $out_path, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation putConvertDocumentToPdfWithHttpInfo
     *
     * Converts the HTML document (located on storage) to PDF
     * and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.pdf)
     *                              (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToPdfWithHttpInfo(
        $name, $out_path, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->putConvertDocumentToPdfRequest(
            $name, $out_path, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage
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
     * Create request for operation 'putConvertDocumentToPdf'
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.pdf)
     *                              (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function putConvertDocumentToPdfRequest(
        $name, $out_path, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling putConvertDocumentToPdf'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_path when calling putConvertDocumentToPdf'
            );
        }

        $resourcePath = '/html/{name}/convert/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin']
                = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
        }
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
            $headerParams,
            $headers
        );

        $query = build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation putConvertDocumentToPdfAsync
     *
     * Converts the HTML document (located on storage) to PDF
     * and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.pdf)
     *                              (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToPdfAsync(
        $name, $out_path, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        return $this->putConvertDocumentToPdfAsyncWithHttpInfo(
            $name, $out_path, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation putConvertDocumentToPdfAsyncWithHttpInfo
     *
     * Converts the HTML document (located on storage) to PDF
     * and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.pdf)
     *                              (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToPdfAsyncWithHttpInfo(
        $name, $out_path, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->putConvertDocumentToPdfRequest(
            $name, $out_path, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage
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
     * Operation putConvertDocumentToXps
     *
     * Converts the HTML document (located on storage) to XPS
     * and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.xps)
     *                              (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return SplFileObject
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToXps(
        $name, $out_path, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        list($response) = $this->putConvertDocumentToXpsWithHttpInfo(
            $name, $out_path, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation putConvertDocumentToXpsWithHttpInfo
     *
     * Converts the HTML document (located on storage) to XPS
     * and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.xps)
     *                              (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToXpsWithHttpInfo(
        $name, $out_path, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->putConvertDocumentToXpsRequest(
            $name, $out_path, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage
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
     * Create request for operation 'putConvertDocumentToXps'
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.xps)
     *                              (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function putConvertDocumentToXpsRequest(
        $name, $out_path, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling putConvertDocumentToXps'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_path when calling putConvertDocumentToXps'
            );
        }

        $resourcePath = '/html/{name}/convert/xps';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);

        // query params
        if ($width !== null) {
            $queryParams['width'] = ObjectSerializer::toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = ObjectSerializer::toQueryValue($height);
        }
        // query params
        if ($left_margin !== null) {
            $queryParams['leftMargin']
                = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin']
                = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin']
                = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin']
                = ObjectSerializer::toQueryValue($bottom_margin);
        }
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
            $headerParams,
            $headers
        );

        $query = build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation putConvertDocumentToXpsAsync
     *
     * Converts the HTML document (located on storage) to
     * XPS and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.xps)
     *                              (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToXpsAsync(
        $name, $out_path, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        return $this->putConvertDocumentToXpsAsyncWithHttpInfo(
            $name, $out_path, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation putConvertDocumentToXpsAsyncWithHttpInfo
     *
     * Converts the HTML document (located on storage) to XPS
     * and uploads resulting file to storage.
     *
     * @param string $name          Document name. (required)
     * @param string $out_path      Full resulting filename
     *                              (ex. /folder1/folder2/result.xps)
     *                              (required)
     * @param int    $width         Resulting document page width
     *                              in points (1/96 inch). (optional)
     * @param int    $height        Resulting document page height
     *                              in points (1/96 inch). (optional)
     * @param int    $left_margin   Left resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $right_margin  Right resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $top_margin    Top resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param int    $bottom_margin Bottom resulting document page margin
     *                              in points (1/96 inch). (optional)
     * @param string $folder        The source document folder. (optional)
     * @param string $storage       The source and resulting
     *                              document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToXpsAsyncWithHttpInfo(
        $name, $out_path, $width = null, $height = null, $left_margin = null,
        $right_margin = null, $top_margin = null, $bottom_margin = null,
        $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->putConvertDocumentToXpsRequest(
            $name, $out_path, $width, $height, $left_margin, $right_margin,
            $top_margin, $bottom_margin, $folder, $storage
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
     * Operation getConvertDocumentToMHTMLByUrl
     *
     * Converts the HTML page from Web by its URL to MHTML returns
     * resulting file in response content.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @return SplFileObject
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getConvertDocumentToMHTMLByUrl($source_url)
    {
        list($response)
            = $this->getConvertDocumentToMHTMLByUrlWithHttpInfo($source_url);
        return $response;
    }

    /**
     * Operation getConvertDocumentToMHTMLByUrlWithHttpInfo
     *
     * Converts the HTML page from Web by its URL to MHTML
     * returns resulting file in response content.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getConvertDocumentToMHTMLByUrlWithHttpInfo($source_url)
    {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToMHTMLByUrlRequest($source_url);

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
     * Create request for operation 'getConvertDocumentToMHTMLByUrl'
     *
     * @param string $source_url Source page URL. (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getConvertDocumentToMHTMLByUrlRequest($source_url)
    {
        // verify the required parameter 'source_url' is set
        if (($source_url === null)
            || (is_array($source_url) && count($source_url) === 0 )
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$source_url when calling getConvertDocumentToMHTMLByUrl'
            );
        }

        $resourcePath = '/html/convert/mhtml';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($source_url !== null) {
            $queryParams['sourceUrl']
                = ObjectSerializer::toQueryValue($source_url);
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
     * Operation getConvertDocumentToMHTMLByUrlAsync
     *
     * Converts the HTML page from Web by its URL to MHTML returns
     * resulting file in response content.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToMHTMLByUrlAsync($source_url)
    {
        return $this->getConvertDocumentToMHTMLByUrlAsyncWithHttpInfo($source_url)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getConvertDocumentToMHTMLByUrlAsyncWithHttpInfo
     *
     * Converts the HTML page from Web by its URL to MHTML returns
     * resulting file in response content.
     *
     * @param string $source_url Source page URL. (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToMHTMLByUrlAsyncWithHttpInfo($source_url)
    {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToMHTMLByUrlRequest($source_url);

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
     * Operation getConvertDocumentToMarkdown
     *
     * Converts the HTML document (located on storage) to Markdown
     * and returns resulting file in response content.
     *
     * @param string $name    Document name. (required)
     * @param string $use_git Use Git Markdown flavor to save.
     *                        "true" or "false" (optional, default to "false")
     * @param string $folder  Source document folder. (optional)
     * @param string $storage Source document storage. (optional)
     *
     * @return SplFileObject
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getConvertDocumentToMarkdown(
        $name, $use_git = 'false', $folder = null, $storage = null
    ) {
        list($response) = $this->getConvertDocumentToMarkdownWithHttpInfo(
            $name, $use_git, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation getConvertDocumentToMarkdownWithHttpInfo
     *
     * Converts the HTML document (located on storage) to Markdown
     * and returns resulting file in response content.
     *
     * @param string $name    Document name. (required)
     * @param string $use_git Use Git Markdown flavor to save.
     *                        "true" or "false" (optional, default to "false")
     * @param string $folder  Source document folder. (optional)
     * @param string $storage Source document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function getConvertDocumentToMarkdownWithHttpInfo(
        $name, $use_git = 'false', $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToMarkdownRequest(
            $name, $use_git, $folder, $storage
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
     * Create request for operation 'getConvertDocumentToMarkdown'
     *
     * @param string $name    Document name. (required)
     * @param string $use_git Use Git Markdown flavor to save.
     *                        "true" or "false" (optional, default to "false")
     * @param string $folder  Source document folder. (optional)
     * @param string $storage Source document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function getConvertDocumentToMarkdownRequest(
        $name, $use_git = 'false', $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling getConvertDocumentToMarkdown'
            );
        }

        $resourcePath = '/html/{name}/convert/md';
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
        if ($use_git !== null) {
            $queryParams['useGit'] = ObjectSerializer::toQueryValue($use_git);
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
     * Operation getConvertDocumentToMarkdownAsync
     *
     * Converts the HTML document (located on storage) to
     * Markdown and returns resulting file in response content.
     *
     * @param string $name    Document name. (required)
     * @param string $use_git Use Git Markdown flavor to save.
     *                        "true" or "false" (optional, default to "false")
     * @param string $folder  Source document folder. (optional)
     * @param string $storage Source document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToMarkdownAsync(
        $name, $use_git = 'false', $folder = null, $storage = null
    ) {
        return $this->getConvertDocumentToMarkdownAsyncWithHttpInfo(
            $name, $use_git, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation getConvertDocumentToMarkdownAsyncWithHttpInfo
     *
     * Converts the HTML document (located on storage) to Markdown
     * and returns resulting file in response content.
     *
     * @param string $name    Document name. (required)
     * @param string $use_git Use Git Markdown flavor to save.
     *                        "true" or "false" (optional, default to "false")
     * @param string $folder  Source document folder. (optional)
     * @param string $storage Source document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function getConvertDocumentToMarkdownAsyncWithHttpInfo(
        $name, $use_git = 'false', $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->getConvertDocumentToMarkdownRequest(
            $name, $use_git, $folder, $storage
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
     * Operation postConvertDocumentInRequestToMarkdown
     *
     * Converts the HTML document (in request content) to
     * Markdown and uploads resulting file to storage by specified path.
     *
     * @param string        $out_path Full resulting file path in the storage
     *                                (ex. /folder1/folder2/result.md)
     *                                (required)
     * @param SplFileObject $file     A file to be converted. (required)
     * @param string        $use_git  Use Git Markdown flavor to save.
     *                                "true" or "false" (optional,
     *                                default to "false")
     * @param string        $storage  Source document storage. (optional)
     *
     * @return SplFileObject
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function postConvertDocumentInRequestToMarkdown(
        $out_path, $file, $use_git = 'false', $storage = null
    ) {
        list($response) = $this->postConvertDocumentInRequestToMarkdownWithHttpInfo(
            $out_path, $file, $use_git, $storage
        );
        return $response;
    }

    /**
     * Operation postConvertDocumentInRequestToMarkdownWithHttpInfo
     *
     * Converts the HTML document (in request content) to Markdown
     * and uploads resulting file to storage by specified path.
     *
     * @param string        $out_path Full resulting file path in the storage
     *                                (ex. /folder1/folder2/result.md)
     *                                (required)
     * @param SplFileObject $file     A file to be converted. (required)
     * @param string        $use_git  Use Git Markdown flavor to save.
     *                                "true" or "false"
     *                                (optional, default to "false")
     * @param string        $storage  Source document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function postConvertDocumentInRequestToMarkdownWithHttpInfo(
        $out_path, $file, $use_git, $storage
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postConvertDocumentInRequestToMarkdownRequest(
            $out_path, $file, $use_git, $storage
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
     * Create request for operation 'postConvertDocumentInRequestToMarkdown'
     *
     * @param string        $out_path Full resulting file path in the storage
     *                                (ex. /folder1/folder2/result.md)
     *                                (required)
     * @param SplFileObject $file     A file to be converted. (required)
     * @param string        $use_git  Use Git Markdown flavor to save.
     *                                "true" or "false"
     *                                (optional, default to "false")
     * @param string        $storage  Source document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function postConvertDocumentInRequestToMarkdownRequest(
        $out_path, $file, $use_git, $storage
    ) {
        // verify the required parameter 'out_path' is set
        if ($out_path === null || (is_array($out_path) && count($out_path) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_path when calling postConvertDocumentInRequestToMarkdown'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$file when calling postConvertDocumentInRequestToMarkdown'
            );
        }

        $resourcePath = '/html/convert/md';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);

        // query params
        if ($use_git !== null) {
            $queryParams['useGit'] = ObjectSerializer::toQueryValue($use_git);
        }
        // query params
        if ($storage !== null) {
            $queryParams['storage'] = ObjectSerializer::toQueryValue($storage);
        }

        $multipart = true;
        $formParams['file']
            = try_fopen(ObjectSerializer::toFormValue($file), 'rb');

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
     * Operation postConvertDocumentInRequestToMarkdownAsync
     *
     * Converts the HTML document (in request content) to Markdown
     * and uploads resulting file to storage by specified path.
     *
     * @param string        $out_path Full resulting file path in the storage
     *                                (ex. /folder1/folder2/result.md)
     *                                (required)
     * @param SplFileObject $file     A file to be converted. (required)
     * @param string        $use_git  Use Git Markdown flavor to save.
     *                                "true" or "false"
     *                                (optional, default to "false")
     * @param string        $storage  Source document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToMarkdownAsync(
        $out_path, $file, $use_git = 'false', $storage = null
    ) {
        return $this->postConvertDocumentInRequestToMarkdownAsyncWithHttpInfo(
            $out_path, $file, $use_git, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation postConvertDocumentInRequestToMarkdownAsyncWithHttpInfo
     *
     * Converts the HTML document (in request content) to Markdown
     * and uploads resulting file to storage by specified path.
     *
     * @param string        $out_path Full resulting file path in the storage
     *                                (ex. /folder1/folder2/result.md)
     *                                (required)
     * @param SplFileObject $file     A file to be converted. (required)
     * @param string        $use_git  Use Git Markdown flavor to save.
     *                                "true" or "false"
     *                                (optional, default to "false")
     * @param string        $storage  Source document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function postConvertDocumentInRequestToMarkdownAsyncWithHttpInfo(
        $out_path, $file, $use_git, $storage
    ) {
        $returnType = '\SplFileObject';
        $request = $this->postConvertDocumentInRequestToMarkdownRequest(
            $out_path, $file, $use_git, $storage
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
     * Operation putConvertDocumentToMarkdown
     *
     * Converts the HTML document (located on storage) to Markdown
     * and uploads resulting file to storage by specified path.
     *
     * @param string $name     Document name. (required)
     * @param string $out_path Full resulting file path in the storage
     *                         (ex. /folder1/folder2/result.md)
     *                         (required)
     * @param string $use_git  Use Git Markdown flavor to save.
     *                         "true" or "false"
     *                         (optional, default to "false")
     * @param string $folder   The source document folder. (optional)
     * @param string $storage  The source and resulting
     *                         document storage. (optional)
     *
     * @return SplFileObject
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function putConvertDocumentToMarkdown(
        $name, $out_path, $use_git = 'false', $folder = null, $storage = null
    ) {
        list($response) = $this->putConvertDocumentToMarkdownWithHttpInfo(
            $name, $out_path, $use_git, $folder, $storage
        );
        return $response;
    }

    /**
     * Operation putConvertDocumentToMarkdownWithHttpInfo
     *
     * Converts the HTML document (located on storage) to Markdown
     * and uploads resulting file to storage by specified path.
     *
     * @param string $name     Document name. (required)
     * @param string $out_path Full resulting file path in the storage
     *                         (ex. /folder1/folder2/result.md)
     *                         (required)
     * @param string $use_git  Use Git Markdown flavor to save.
     *                         "true" or "false"
     *                         (optional, default to "false")
     * @param string $folder   The source document folder. (optional)
     * @param string $storage  The source and resulting
     *                         document storage. (optional)
     *
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function putConvertDocumentToMarkdownWithHttpInfo(
        $name, $out_path, $use_git = 'false', $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->putConvertDocumentToMarkdownRequest(
            $name, $out_path, $use_git, $folder, $storage
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
     * Create request for operation 'putConvertDocumentToMarkdown'
     *
     * @param string $name     Document name. (required)
     * @param string $out_path Full resulting file path in the storage
     *                         (ex. /folder1/folder2/result.md)
     *                         (required)
     * @param string $use_git  Use Git Markdown flavor to save.
     *                         "true" or "false"
     *                         (optional, default to "false")
     * @param string $folder   The source document folder. (optional)
     * @param string $storage  The source and resulting
     *                         document storage. (optional)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    protected function putConvertDocumentToMarkdownRequest(
        $name, $out_path, $use_git = 'false', $folder = null, $storage = null
    ) {
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$name when calling putConvertDocumentToMarkdown'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null || (is_array($out_path) && count($out_path) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$out_path when calling putConvertDocumentToMarkdown'
            );
        }

        $resourcePath = '/html/{name}/convert/md';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);

        // query params
        if ($use_git !== null) {
            $queryParams['useGit'] = ObjectSerializer::toQueryValue($use_git);
        }
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
            $headerParams,
            $headers
        );

        $query = build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation putConvertDocumentToMarkdownAsync
     *
     * Converts the HTML document (located on storage) to
     * Markdown and uploads resulting file to storage by specified path.
     *
     * @param string $name     Document name. (required)
     * @param string $out_path Full resulting file path in the storage
     *                         (ex. /folder1/folder2/result.md)
     *                         (required)
     * @param string $use_git  Use Git Markdown flavor to save.
     *                         "true" or "false"
     *                         (optional, default to "false")
     * @param string $folder   The source document folder. (optional)
     * @param string $storage  The source and resulting
     *                         document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToMarkdownAsync(
        $name, $out_path, $use_git = 'false', $folder = null, $storage = null
    ) {
        return $this->putConvertDocumentToMarkdownAsyncWithHttpInfo(
            $name, $out_path, $use_git, $folder, $storage
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation putConvertDocumentToMarkdownAsyncWithHttpInfo
     *
     * Converts the HTML document (located on storage) to Markdown
     * and uploads resulting file to storage by specified path.
     *
     * @param string $name     Document name. (required)
     * @param string $out_path Full resulting file path in the storage
     *                         (ex. /folder1/folder2/result.md)
     *                         (required)
     * @param string $use_git  Use Git Markdown flavor to save.
     *                         "true" or "false"
     *                         (optional, default to "false")
     * @param string $folder   The source document folder. (optional)
     * @param string $storage  The source and resulting
     *                         document storage. (optional)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function putConvertDocumentToMarkdownAsyncWithHttpInfo(
        $name, $out_path, $use_git = 'false', $folder = null, $storage = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->putConvertDocumentToMarkdownRequest(
            $name, $out_path, $use_git, $folder, $storage
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
}
