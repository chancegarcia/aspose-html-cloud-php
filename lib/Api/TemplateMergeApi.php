<?php
/*
* --------------------------------------------------------------------------------------------------------------------
* <copyright company="Aspose" file="TemplateMergeApi.php">
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

namespace Client\Invoker\Client;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Client\Invoker\ApiException;
use Client\Invoker\Configuration;
use Client\Invoker\HeaderSelector;
use Client\Invoker\ObjectSerializer;

trait TemplateMergeApi
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
    public function GetMergeHtmlTemplate($template_name, $data_path, $options = null, $folder = null, $storage = null)
    {
        list($response) = $this->GetMergeHtmlTemplateWithHttpInfo($template_name, $data_path, $options, $folder, $storage);
        return $response;
    }

    /**
     * Operation GetMergeHtmlTemplateWithHttpInfo
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
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function GetMergeHtmlTemplateWithHttpInfo($template_name, $data_path, $options = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetMergeHtmlTemplateRequest($template_name, $data_path, $options, $folder, $storage);

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
     * Operation GetMergeHtmlTemplateAsync
     *
     * Populate HTML document template with data located as a file in the storage.
     *
     * @param  string $template_name Template document name. Template document is HTML or zipped HTML. (required)
     * @param  string $data_path Data source file path in the storage. Supported data format: XML (required)
     * @param  string $options Template merge options: reserved for further implementation. (optional)
     * @param  string $folder The template document folder. (optional)
     * @param  string $storage The template document and data source storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetMergeHtmlTemplateAsync($template_name, $data_path, $options = null, $folder = null, $storage = null)
    {
        return $this->GetMergeHtmlTemplateAsyncWithHttpInfo($template_name, $data_path, $options, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation GetMergeHtmlTemplateAsyncWithHttpInfo
     *
     * Populate HTML document template with data located as a file in the storage.
     *
     * @param  string $template_name Template document name. Template document is HTML or zipped HTML. (required)
     * @param  string $data_path Data source file path in the storage. Supported data format: XML (required)
     * @param  string $options Template merge options: reserved for further implementation. (optional)
     * @param  string $folder The template document folder. (optional)
     * @param  string $storage The template document and data source storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function GetMergeHtmlTemplateAsyncWithHttpInfo($template_name, $data_path, $options = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->GetMergeHtmlTemplateRequest($template_name, $data_path, $options, $folder, $storage);

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
     * Create request for operation 'GetMergeHtmlTemplate'
     *
     * @param  string $template_name Template document name. Template document is HTML or zipped HTML. (required)
     * @param  string $data_path Data source file path in the storage. Supported data format: XML (required)
     * @param  string $options Template merge options: reserved for further implementation. (optional)
     * @param  string $folder The template document folder. (optional)
     * @param  string $storage The template document and data source storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function GetMergeHtmlTemplateRequest($template_name, $data_path, $options = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'template_name' is set
        if ($template_name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_name when calling GetMergeHtmlTemplate'
            );
        }
        // verify the required parameter 'data_path' is set
        if ($data_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $data_path when calling GetMergeHtmlTemplate'
            );
        }

        $resourcePath = '/html/{templateName}/merge';
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';

        // query params
        if ($data_path !== null) {
            $queryParams['dataPath'] = ObjectSerializer::toQueryValue($data_path);
        }
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

        // path params
        if ($template_name !== null) {
            $resourcePath = str_replace(
                '{' . 'templateName' . '}',
                ObjectSerializer::toPathValue($template_name),
                $resourcePath
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
            'GET',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
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
    public function PutMergeHtmlTemplate($template_name, $out_path, $file, $options = null, $folder = null, $storage = null)
    {
        list($response) = $this->PutMergeHtmlTemplateWithHttpInfo($template_name, $out_path, $file, $options, $folder, $storage);
        return $response;
    }

    /**
     * Operation PutMergeHtmlTemplateWithHttpInfo
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
     * @return array of \SplFileObject, HTTP status code, HTTP response headers (array of strings)
     */
    public function PutMergeHtmlTemplateWithHttpInfo($template_name, $out_path, $file, $options = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutMergeHtmlTemplateRequest($template_name, $out_path, $file, $options, $folder, $storage);

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
     * Operation PutMergeHtmlTemplateAsync
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
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutMergeHtmlTemplateAsync($template_name, $out_path, $file, $options = null, $folder = null, $storage = null)
    {
        return $this->PutMergeHtmlTemplateAsyncWithHttpInfo($template_name, $out_path, $file, $options, $folder, $storage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation PutMergeHtmlTemplateAsyncWithHttpInfo
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
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function PutMergeHtmlTemplateAsyncWithHttpInfo($template_name, $out_path, $file, $options = null, $folder = null, $storage = null)
    {
        $returnType = '\SplFileObject';
        $request = $this->PutMergeHtmlTemplateRequest($template_name, $out_path, $file, $options, $folder, $storage);

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
     * Create request for operation 'PutMergeHtmlTemplate'
     *
     * @param  string $template_name Template document name. Template document is HTML or zipped HTML. (required)
     * @param  string $out_path Result document path. (required)
     * @param  \SplFileObject $file A data file to populate template. (required)
     * @param  string $options Template merge options: reserved for further implementation. (optional)
     * @param  string $folder The template document folder. (optional)
     * @param  string $storage The template document and data source storage. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function PutMergeHtmlTemplateRequest($template_name, $out_path, $file, $options = null, $folder = null, $storage = null)
    {
        // verify the required parameter 'template_name' is set
        if ($template_name === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $template_name when calling PutMergeHtmlTemplate'
            );
        }
        // verify the required parameter 'out_path' is set
        if ($out_path === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $out_path when calling PutMergeHtmlTemplate'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling PutMergeHtmlTemplate'
            );
        }

        $resourcePath = '/html/{templateName}/merge';
        $queryParams = [];
        $headerParams = [];

        // query params
        if ($out_path !== null) {
            $queryParams['outPath'] = ObjectSerializer::toQueryValue($out_path);
        }
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

        // path params
        if ($template_name !== null) {
            $resourcePath = str_replace(
                '{' . 'templateName' . '}',
                ObjectSerializer::toPathValue($template_name),
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
}
