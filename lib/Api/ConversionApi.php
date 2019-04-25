<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="ConversionApi.php">
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

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use Client\Invoker\ApiException;
use Client\Invoker\ObjectSerializer;


trait ConversionApi
{
    /**
     * Operation GetConvertDocumentToImage
     *
     * Convert the HTML document from the storage by its name to the specified image format.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function GetConvertDocumentToImage($name, $out_format, $width = null, $height = null, $left_margin = null,
            $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null,
            $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToImageWithHttpInfo($name, $out_format, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToImageWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to the specified image format.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function GetConvertDocumentToImageWithHttpInfo($name, $out_format, $width = null, $height = null,
           $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null,
           $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToImageRequest($name, $out_format, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

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
     * Operation GetConvertDocumentToImageAsync
     *
     * Convert the HTML document from the storage by its name to the specified image format.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToImageAsync($name, $out_format, $width = null, $height = null,
           $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null,
           $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToImageAsyncWithHttpInfo($name, $out_format, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToImageAsyncWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to the specified image format.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToImageAsyncWithHttpInfo($name, $out_format, $width = null, $height = null,
           $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null,
           $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToImageRequest($name, $out_format, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToImage'
     *
     * @param  string $name Document name. (required)
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GetConvertDocumentToImageRequest($name, $out_format, $width = null, $height = null,
              $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null,
              $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling GetConvertDocumentToImage'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_format when calling GetConvertDocumentToImage'
            );
        }

        $resourcePath = '/html/{name}/convert/image/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($resolution !== null) {
            $queryParams['resolution'] = ObjectSerializer::toQueryValue($resolution);
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
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation GetConvertDocumentToImageByUrl
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function GetConvertDocumentToImageByUrl($source_url, $out_format, $width = null, $height = null,
           $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null,
           $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToImageByUrlWithHttpInfo($source_url, $out_format, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToImageByUrlWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function GetConvertDocumentToImageByUrlWithHttpInfo($source_url, $out_format, $width = null, $height = null,
           $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null,
           $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToImageByUrlRequest($source_url, $out_format, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

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
     * Operation GetConvertDocumentToImageByUrlAsync
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToImageByUrlAsync($source_url, $out_format, $width = null, $height = null,
           $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null,
           $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToImageByUrlAsyncWithHttpInfo($source_url, $out_format, $width, $height,
            $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToImageByUrlAsyncWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to the specified image format.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToImageByUrlAsyncWithHttpInfo($source_url, $out_format, $width = null,
           $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null,
           $resolution = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToImageByUrlRequest($source_url, $out_format, $width, $height, $left_margin,
            $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToImageByUrl'
     *
     * @param  string $source_url Source page URL. (required)
     * @param  string $out_format Resulting image format. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  int $resolution Resolution of resulting image. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GetConvertDocumentToImageByUrlRequest($source_url, $out_format, $width = null, $height = null,
              $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null,
              $folder = null, $storage = null)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling GetConvertDocumentToImageByUrl'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_format when calling GetConvertDocumentToImageByUrl'
            );
        }

        $resourcePath = '/html/convert/image/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($source_url !== null) {
            $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);
        }
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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($resolution !== null) {
            $queryParams['resolution'] = ObjectSerializer::toQueryValue($resolution);
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
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation GetConvertDocumentToPdf
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function GetConvertDocumentToPdf($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToPdfWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToPdfWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function GetConvertDocumentToPdfWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToPdfRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Operation GetConvertDocumentToPdfAsync
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToPdfAsync($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToPdfAsyncWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToPdfAsyncWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to PDF.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToPdfAsyncWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToPdfRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToPdf'
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GetConvertDocumentToPdfRequest($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling GetConvertDocumentToPdf'
            );
        }

        $resourcePath = '/html/{name}/convert/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
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
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation GetConvertDocumentToPdfByUrl
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function GetConvertDocumentToPdfByUrl($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToPdfByUrlWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToPdfByUrlWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function GetConvertDocumentToPdfByUrlWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToPdfByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Operation GetConvertDocumentToPdfByUrlAsync
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToPdfByUrlAsync($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToPdfByUrlAsyncWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToPdfByUrlAsyncWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to PDF.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToPdfByUrlAsyncWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToPdfByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToPdfByUrl'
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GetConvertDocumentToPdfByUrlRequest($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling GetConvertDocumentToPdfByUrl'
            );
        }

        $resourcePath = '/html/convert/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($source_url !== null) {
            $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);
        }
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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
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
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation GetConvertDocumentToXps
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function GetConvertDocumentToXps($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToXpsWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToXpsWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function GetConvertDocumentToXpsWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToXpsRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Operation GetConvertDocumentToXpsAsync
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToXpsAsync($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToXpsAsyncWithHttpInfo($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToXpsAsyncWithHttpInfo
     *
     * Convert the HTML document from the storage by its name to XPS.
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToXpsAsyncWithHttpInfo($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToXpsRequest($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToXps'
     *
     * @param  string $name Document name. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GetConvertDocumentToXpsRequest($name, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling GetConvertDocumentToXps'
            );
        }

        $resourcePath = '/html/{name}/convert/xps';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
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
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation GetConvertDocumentToXpsByUrl
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function GetConvertDocumentToXpsByUrl($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToXpsByUrlWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToXpsByUrlWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function GetConvertDocumentToXpsByUrlWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToXpsByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Operation GetConvertDocumentToXpsByUrlAsync
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToXpsByUrlAsync($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToXpsByUrlAsyncWithHttpInfo($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToXpsByUrlAsyncWithHttpInfo
     *
     * Convert the HTML page from the web by its URL to XPS.
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToXpsByUrlAsyncWithHttpInfo($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToXpsByUrlRequest($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToXpsByUrl'
     *
     * @param  string $source_url Source page URL. (required)
     * @param  int $width Resulting image width. (optional)
     * @param  int $height Resulting image height. (optional)
     * @param  int $left_margin Left resulting image margin. (optional)
     * @param  int $right_margin Right resulting image margin. (optional)
     * @param  int $top_margin Top resulting image margin. (optional)
     * @param  int $bottom_margin Bottom resulting image margin. (optional)
     * @param  string $folder The document folder. (optional)
     * @param  string $storage The document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GetConvertDocumentToXpsByUrlRequest($source_url, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling GetConvertDocumentToXpsByUrl'
            );
        }

        $resourcePath = '/html/convert/xps';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($source_url !== null) {
            $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);
        }
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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
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
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * Operation PutConvertDocumentInRequestToImage
     *
     * Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format out_format (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function PutConvertDocumentInRequestToImage($out_path, $out_format, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null)
    {
        list($response) = $this->PutConvertDocumentInRequestToImageWithHttpInfo($out_path, $out_format, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution);
        return $response;
    }

    /**
     * Operation PutConvertDocumentInRequestToImageWithHttpInfo
     *
     * Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function PutConvertDocumentInRequestToImageWithHttpInfo($out_path, $out_format, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentInRequestToImageRequest($out_path, $out_format, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution);

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
     * Operation PutConvertDocumentInRequestToImageAsync
     *
     * Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentInRequestToImageAsync($out_path, $out_format, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null)
    {
        return $this->PutConvertDocumentInRequestToImageAsyncWithHttpInfo($out_path, $out_format, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation PutConvertDocumentInRequestToImageAsyncWithHttpInfo
     *
     * Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentInRequestToImageAsyncWithHttpInfo($out_path, $out_format, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentInRequestToImageRequest($out_path, $out_format, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution);

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
     * Create request for operation 'PutConvertDocumentInRequestToImage'
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function PutConvertDocumentInRequestToImageRequest($out_path, $out_format, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null)
    {
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling PutConvertDocumentInRequestToImage'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_format when calling PutConvertDocumentInRequestToImage'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling PutConvertDocumentInRequestToImage'
            );
        }

        $resourcePath = '/html/convert/image/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($resolution !== null) {
            $queryParams['resolution'] = ObjectSerializer::toQueryValue($resolution);
        }

        // path params
        if ($out_format !== null) {
            $resourcePath = str_replace(
                '{' . 'outFormat' . '}',
                ObjectSerializer::toPathValue($out_format),
                $resourcePath
            );
        }

        $handle = fopen($file, 'rb');
        $httpBody = fread($handle, filesize($file));
        fclose($handle);

        $defaultHeaders = [];
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation PutConvertDocumentInRequestToPdf
     *
     * Converts the HTML document (in request content) to PDF and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function PutConvertDocumentInRequestToPdf($out_path, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null)
    {
        list($response) = $this->PutConvertDocumentInRequestToPdfWithHttpInfo($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin);
        return $response;
    }

    /**
     * Operation PutConvertDocumentInRequestToPdfWithHttpInfo
     *
     * Converts the HTML document (in request content) to PDF and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function PutConvertDocumentInRequestToPdfWithHttpInfo($out_path, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentInRequestToPdfRequest($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin);

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
     * Operation PutConvertDocumentInRequestToPdfAsync
     *
     * Converts the HTML document (in request content) to PDF and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentInRequestToPdfAsync($out_path, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null)
    {
        return $this->PutConvertDocumentInRequestToPdfAsyncWithHttpInfo($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation PutConvertDocumentInRequestToPdfAsyncWithHttpInfo
     *
     * Converts the HTML document (in request content) to PDF and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentInRequestToPdfAsyncWithHttpInfo($out_path, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentInRequestToPdfRequest($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin);

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
     * Create request for operation 'PutConvertDocumentInRequestToPdf'
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function PutConvertDocumentInRequestToPdfRequest($out_path, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null)
    {
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling PutConvertDocumentInRequestToPdf'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling PutConvertDocumentInRequestToPdf'
            );
        }

        $resourcePath = '/html/convert/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }

        $handle = fopen($file, 'rb');
        $httpBody = fread($handle, filesize($file));
        fclose($handle);


        $defaultHeaders = [];
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation PutConvertDocumentInRequestToXps
     *
     * Converts the HTML document (in request content) to XPS and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function PutConvertDocumentInRequestToXps($out_path, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null)
    {
        list($response) = $this->PutConvertDocumentInRequestToXpsWithHttpInfo($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin);
        return $response;
    }

    /**
     * Operation PutConvertDocumentInRequestToXpsWithHttpInfo
     *
     * Converts the HTML document (in request content) to XPS and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function PutConvertDocumentInRequestToXpsWithHttpInfo($out_path, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentInRequestToXpsRequest($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin);

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
     * Operation PutConvertDocumentInRequestToXpsAsync
     *
     * Converts the HTML document (in request content) to XPS and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentInRequestToXpsAsync($out_path, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null)
    {
        return $this->PutConvertDocumentInRequestToXpsAsyncWithHttpInfo($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation PutConvertDocumentInRequestToXpsAsyncWithHttpInfo
     *
     * Converts the HTML document (in request content) to XPS and uploads resulting file to storage.
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentInRequestToXpsAsyncWithHttpInfo($out_path, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentInRequestToXpsRequest($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin);

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
     * Create request for operation 'PutConvertDocumentInRequestToXps'
     *
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function PutConvertDocumentInRequestToXpsRequest($out_path, $file, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null)
    {
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling PutConvertDocumentInRequestToXps'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling PutConvertDocumentInRequestToXps'
            );
        }

        $resourcePath = '/html/convert/xps';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }

        $handle = fopen($file, 'rb');
        $httpBody = fread($handle, filesize($file));
        fclose($handle);

        $defaultHeaders = [];
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation PutConvertDocumentToImage
     *
     * Converts the HTML document (located on storage) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format out_format (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function PutConvertDocumentToImage($name, $out_path, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null, $folder = null, $storage = null)
    {
        list($response) = $this->PutConvertDocumentToImageWithHttpInfo($name, $out_path, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);
        return $response;
    }

    /**
     * Operation PutConvertDocumentToImageWithHttpInfo
     *
     * Converts the HTML document (located on storage) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function PutConvertDocumentToImageWithHttpInfo($name, $out_path, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentToImageRequest($name, $out_path, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

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
     * Operation PutConvertDocumentToImageAsync
     *
     * Converts the HTML document (located on storage) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentToImageAsync($name, $out_path, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null, $folder = null, $storage = null)
    {
        return $this->PutConvertDocumentToImageAsyncWithHttpInfo($name, $out_path, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation PutConvertDocumentToImageAsyncWithHttpInfo
     *
     * Converts the HTML document (located on storage) to the specified image format and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentToImageAsyncWithHttpInfo($name, $out_path, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentToImageRequest($name, $out_path, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);

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
     * Create request for operation 'PutConvertDocumentToImage'
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.jpg) (required)
     * @param  string $out_format (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  int $resolution Resolution of resulting image. Default is 96 dpi. (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function PutConvertDocumentToImageRequest($name, $out_path, $out_format, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $resolution = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling PutConvertDocumentToImage'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling PutConvertDocumentToImage'
            );
        }
        // verify the required parameter 'out_format' is set
        if ($out_format === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_format when calling PutConvertDocumentToImage'
            );
        }

        $resourcePath = '/html/{name}/convert/image/{outFormat}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
        }
        // query params
        if ($resolution !== null) {
            $queryParams['resolution'] = ObjectSerializer::toQueryValue($resolution);
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
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation PutConvertDocumentToPdf
     *
     * Converts the HTML document (located on storage) to PDF and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function PutConvertDocumentToPdf($name, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->PutConvertDocumentToPdfWithHttpInfo($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation PutConvertDocumentToPdfWithHttpInfo
     *
     * Converts the HTML document (located on storage) to PDF and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function PutConvertDocumentToPdfWithHttpInfo($name, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentToPdfRequest($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Operation PutConvertDocumentToPdfAsync
     *
     * Converts the HTML document (located on storage) to PDF and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentToPdfAsync($name, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->PutConvertDocumentToPdfAsyncWithHttpInfo($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation PutConvertDocumentToPdfAsyncWithHttpInfo
     *
     * Converts the HTML document (located on storage) to PDF and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentToPdfAsyncWithHttpInfo($name, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentToPdfRequest($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Create request for operation 'PutConvertDocumentToPdf'
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.pdf) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function PutConvertDocumentToPdfRequest($name, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling PutConvertDocumentToPdf'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling PutConvertDocumentToPdf'
            );
        }

        $resourcePath = '/html/{name}/convert/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
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
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation PutConvertDocumentToXps
     *
     * Converts the HTML document (located on storage) to XPS and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function PutConvertDocumentToXps($name, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        list($response) = $this->PutConvertDocumentToXpsWithHttpInfo($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
        return $response;
    }

    /**
     * Operation PutConvertDocumentToXpsWithHttpInfo
     *
     * Converts the HTML document (located on storage) to XPS and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function PutConvertDocumentToXpsWithHttpInfo($name, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentToXpsRequest($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Operation PutConvertDocumentToXpsAsync
     *
     * Converts the HTML document (located on storage) to XPS and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentToXpsAsync($name, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        return $this->PutConvertDocumentToXpsAsyncWithHttpInfo($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation PutConvertDocumentToXpsAsyncWithHttpInfo
     *
     * Converts the HTML document (located on storage) to XPS and uploads resulting file to storage.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentToXpsAsyncWithHttpInfo($name, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentToXpsRequest($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);

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
     * Create request for operation 'PutConvertDocumentToXps'
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting filename (ex. /folder1/folder2/result.xps) (required)
     * @param  int $width Resulting document page width in points (1/96 inch). (optional)
     * @param  int $height Resulting document page height in points (1/96 inch). (optional)
     * @param  int $left_margin Left resulting document page margin in points (1/96 inch). (optional)
     * @param  int $right_margin Right resulting document page margin in points (1/96 inch). (optional)
     * @param  int $top_margin Top resulting document page margin in points (1/96 inch). (optional)
     * @param  int $bottom_margin Bottom resulting document page margin in points (1/96 inch). (optional)
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function PutConvertDocumentToXpsRequest($name, $out_path, $width = null, $height = null, $left_margin = null, $right_margin = null, $top_margin = null, $bottom_margin = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling PutConvertDocumentToXps'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling PutConvertDocumentToXps'
            );
        }

        $resourcePath = '/html/{name}/convert/xps';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
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
            $queryParams['leftMargin'] = ObjectSerializer::toQueryValue($left_margin);
        }
        // query params
        if ($right_margin !== null) {
            $queryParams['rightMargin'] = ObjectSerializer::toQueryValue($right_margin);
        }
        // query params
        if ($top_margin !== null) {
            $queryParams['topMargin'] = ObjectSerializer::toQueryValue($top_margin);
        }
        // query params
        if ($bottom_margin !== null) {
            $queryParams['bottomMargin'] = ObjectSerializer::toQueryValue($bottom_margin);
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
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * Operation GetConvertDocumentToMHTMLByUrl
     *
     * Converts the HTML page from Web by its URL to MHTML returns resulting file in response content.
     *
     * @param  string $source_url Source page URL. (required)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function GetConvertDocumentToMHTMLByUrl($source_url)
    {
        list($response) = $this->GetConvertDocumentToMHTMLByUrlWithHttpInfo($source_url);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToMHTMLByUrlWithHttpInfo
     *
     * Converts the HTML page from Web by its URL to MHTML returns resulting file in response content.
     *
     * @param  string $source_url Source page URL. (required)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function GetConvertDocumentToMHTMLByUrlWithHttpInfo($source_url)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToMHTMLByUrlRequest($source_url);

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
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
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
     * Operation GetConvertDocumentToMHTMLByUrlAsync
     *
     * Converts the HTML page from Web by its URL to MHTML returns resulting file in response content.
     *
     * @param  string $source_url Source page URL. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToMHTMLByUrlAsync($source_url)
    {
        return $this->GetConvertDocumentToMHTMLByUrlAsyncWithHttpInfo($source_url)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToMHTMLByUrlAsyncWithHttpInfo
     *
     * Converts the HTML page from Web by its URL to MHTML returns resulting file in response content.
     *
     * @param  string $source_url Source page URL. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToMHTMLByUrlAsyncWithHttpInfo($source_url)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToMHTMLByUrlRequest($source_url);

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
     * Create request for operation 'GetConvertDocumentToMHTMLByUrl'
     *
     * @param  string $source_url Source page URL. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GetConvertDocumentToMHTMLByUrlRequest($source_url)
    {
        // verify the required parameter 'source_url' is set
        if ($source_url === null || (is_array($source_url) && count($source_url) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $source_url when calling GetConvertDocumentToMHTMLByUrl'
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
            $queryParams['sourceUrl'] = ObjectSerializer::toQueryValue($source_url);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation GetConvertDocumentToMarkdown
     *
     * Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.
     *
     * @param  string $name Document name. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder Source document folder. (optional)
     * @param  string $storage Source document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function GetConvertDocumentToMarkdown($name, $use_git = 'false', $folder = null, $storage = null)
    {
        list($response) = $this->GetConvertDocumentToMarkdownWithHttpInfo($name, $use_git, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetConvertDocumentToMarkdownWithHttpInfo
     *
     * Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.
     *
     * @param  string $name Document name. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder Source document folder. (optional)
     * @param  string $storage Source document storage. (optional)
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function GetConvertDocumentToMarkdownWithHttpInfo($name, $use_git = 'false', $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToMarkdownRequest($name, $use_git, $folder, $storage);

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
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\SplFileObject',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
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
     * Operation GetConvertDocumentToMarkdownAsync
     *
     * Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.
     *
     * @param  string $name Document name. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder Source document folder. (optional)
     * @param  string $storage Source document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToMarkdownAsync($name, $use_git = 'false', $folder = null, $storage = null)
    {
        return $this->GetConvertDocumentToMarkdownAsyncWithHttpInfo($name, $use_git, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetConvertDocumentToMarkdownAsyncWithHttpInfo
     *
     * Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.
     *
     * @param  string $name Document name. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder Source document folder. (optional)
     * @param  string $storage Source document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetConvertDocumentToMarkdownAsyncWithHttpInfo($name, $use_git = 'false', $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetConvertDocumentToMarkdownRequest($name, $use_git, $folder, $storage);

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
     * Create request for operation 'GetConvertDocumentToMarkdown'
     *
     * @param  string $name Document name. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder Source document folder. (optional)
     * @param  string $storage Source document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GetConvertDocumentToMarkdownRequest($name, $use_git = 'false', $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling GetConvertDocumentToMarkdown'
            );
        }

        $resourcePath = '/html/{name}/convert/md';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

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
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['multipart/form-data']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['multipart/form-data'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
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
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * Operation PutConvertDocumentInRequestToMarkdown
     *
     * Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function PutConvertDocumentInRequestToMarkdown($out_path, $file, $use_git = 'false')
    {
        list($response) = $this->PutConvertDocumentInRequestToMarkdownWithHttpInfo($out_path, $file, $use_git);
        return $response;
    }

    /**
     * Operation PutConvertDocumentInRequestToMarkdownWithHttpInfo
     *
     * Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     *
     * @throws \Client\Invoker\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function PutConvertDocumentInRequestToMarkdownWithHttpInfo($out_path, $file, $use_git = 'false')
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentInRequestToMarkdownRequest($out_path, $file, $use_git);

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
     * Operation PutConvertDocumentInRequestToMarkdownAsync
     *
     * Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentInRequestToMarkdownAsync($out_path, $file, $use_git = 'false')
    {
        return $this->PutConvertDocumentInRequestToMarkdownAsyncWithHttpInfo($out_path, $file, $use_git)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation PutConvertDocumentInRequestToMarkdownAsyncWithHttpInfo
     *
     * Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentInRequestToMarkdownAsyncWithHttpInfo($out_path, $file, $use_git = 'false')
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentInRequestToMarkdownRequest($out_path, $file, $use_git);

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
     * Create request for operation 'PutConvertDocumentInRequestToMarkdown'
     *
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  \SplFileObject $file A file to be converted. (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function PutConvertDocumentInRequestToMarkdownRequest($out_path, $file, $use_git = 'false')
    {
        // verify the required parameter 'out_path' is set
        if ($out_path === null || (is_array($out_path) && count($out_path) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling PutConvertDocumentInRequestToMarkdown'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling PutConvertDocumentInRequestToMarkdown'
            );
        }

        $resourcePath = '/html/convert/md';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
        // query params
        if ($use_git !== null) {
            $queryParams['useGit'] = ObjectSerializer::toQueryValue($use_git);
        }

        $handle = fopen($file, 'rb');
        $httpBody = fread($handle, filesize($file));
        fclose($handle);

        $defaultHeaders = [];
        if ($this->config['defaultUserAgent']) {
            $defaultHeaders['User-Agent'] = $this->config['defaultUserAgent'];
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * Operation PutConvertDocumentToMarkdown
     *
     * Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \SplFileObject
     */
    public function PutConvertDocumentToMarkdown($name, $out_path, $use_git = 'false', $folder = null, $storage = null)
    {
        list($response) = $this->PutConvertDocumentToMarkdownWithHttpInfo($name, $out_path, $use_git, $folder, $storage);
        return $response;
    }

    /**
     * Operation PutConvertDocumentToMarkdownWithHttpInfo
     *
     * Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function PutConvertDocumentToMarkdownWithHttpInfo($name, $out_path, $use_git = 'false', $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentToMarkdownRequest($name, $out_path, $use_git, $folder, $storage);

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
     * Operation PutConvertDocumentToMarkdownAsync
     *
     * Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentToMarkdownAsync($name, $out_path, $use_git = 'false', $folder = null, $storage = null)
    {
        return $this->PutConvertDocumentToMarkdownAsyncWithHttpInfo($name, $out_path, $use_git, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation PutConvertDocumentToMarkdownAsyncWithHttpInfo
     *
     * Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutConvertDocumentToMarkdownAsyncWithHttpInfo($name, $out_path, $use_git = 'false', $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutConvertDocumentToMarkdownRequest($name, $out_path, $use_git, $folder, $storage);

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
     * Create request for operation 'PutConvertDocumentToMarkdown'
     *
     * @param  string $name Document name. (required)
     * @param  string $out_path Full resulting file path in the storage (ex. /folder1/folder2/result.md) (required)
     * @param  string $use_git Use Git Markdown flavor to save. "true" or "false" (optional, default to "false")
     * @param  string $folder The source document folder. (optional)
     * @param  string $storage The source and resulting document storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function PutConvertDocumentToMarkdownRequest($name, $out_path, $use_git = 'false', $folder = null, $storage = null)
    {
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling PutConvertDocumentToMarkdown'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null || (is_array($out_path) && count($out_path) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling PutConvertDocumentToMarkdown'
            );
        }

        $resourcePath = '/html/{name}/convert/md';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
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
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
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

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }
}
