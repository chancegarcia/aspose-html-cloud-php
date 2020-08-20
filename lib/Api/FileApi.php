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
use Client\Invoker\Model\FilesUploadResult;
use Client\Invoker\ObjectSerializer;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use function GuzzleHttp\Psr7\build_query;
use function GuzzleHttp\json_encode;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use function GuzzleHttp\Psr7\try_fopen;
use InvalidArgumentException;
use SplFileObject;
use stdClass;

/**
 * Operations with files on the storage
 *
 * @category FileApi
 * @package  html-sdk-php
 * @author   Alexander Makogon <alexander.makogon@aspose.com>
 * @license  https://opensource.org/licenses/mit-license.php  MIT License
 * @link     https://packagist.org/packages/aspose/html-sdk-php
 */
trait FileApi
{
    /**
     * Operation copyFile
     *
     * Copy file
     *
     * @param string $src_path          Source file path e.g.
     *                                  '/folder/file.ext' (required)
     * @param string $dest_path         Destination file path (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     * @param string $version_id        File version ID to copy (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function copyFile(
        $src_path, $dest_path, $src_storage_name = null,
        $dest_storage_name = null, $version_id = null
    ) {
        $this->copyFileWithHttpInfo(
            $src_path, $dest_path, $src_storage_name,
            $dest_storage_name, $version_id
        );
    }

    /**
     * Operation copyFileWithHttpInfo
     *
     * Copy file
     *
     * @param string $src_path          Source file path e.g.
     *                                  '/folder/file.ext' (required)
     * @param string $dest_path         Destination file path (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     * @param string $version_id        File version ID to copy (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function copyFileWithHttpInfo(
        $src_path, $dest_path, $src_storage_name = null,
        $dest_storage_name = null, $version_id = null
    ) {
        $returnType = '';
        $request = $this->copyFileRequest(
            $src_path, $dest_path, $src_storage_name,
            $dest_storage_name, $version_id
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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            throw $e;
        }
    }

    /**
     * Operation copyFileAsync
     *
     * Copy file
     *
     * @param string $src_path          Source file path e.g.
     *                                  '/folder/file.ext' (required)
     * @param string $dest_path         Destination file path (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     * @param string $version_id        File version ID to copy (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function copyFileAsync(
        $src_path, $dest_path, $src_storage_name = null,
        $dest_storage_name = null, $version_id = null
    ) {
        return $this->copyFileAsyncWithHttpInfo(
            $src_path, $dest_path, $src_storage_name,
            $dest_storage_name, $version_id
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation copyFileAsyncWithHttpInfo
     *
     * Copy file
     *
     * @param string $src_path          Source file path e.g.
     *                                  '/folder/file.ext' (required)
     * @param string $dest_path         Destination file path (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     * @param string $version_id        File version ID to copy (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function copyFileAsyncWithHttpInfo(
        $src_path, $dest_path, $src_storage_name = null,
        $dest_storage_name = null, $version_id = null
    ) {
        $returnType = '';
        $request = $this->copyFileRequest(
            $src_path, $dest_path, $src_storage_name,
            $dest_storage_name, $version_id
        );

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [
                        null, $response->getStatusCode(),
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
     * Create request for operation 'copyFile'
     *
     * @param string $src_path          Source file path e.g.
     *                                  '/folder/file.ext' (required)
     * @param string $dest_path         Destination file path (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     * @param string $version_id        File version ID to copy (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function copyFileRequest(
        $src_path, $dest_path, $src_storage_name = null,
        $dest_storage_name = null, $version_id = null
    ) {
        // verify the required parameter 'src_path' is set
        if (($src_path === null)
            || (is_array($src_path) && count($src_path) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$src_path when calling copyFile'
            );
        }
        // verify the required parameter 'dest_path' is set
        if (($dest_path === null)
            || (is_array($dest_path) && count($dest_path) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$dest_path when calling copyFile'
            );
        }

        $resourcePath = '/html/storage/file/copy/{srcPath}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'srcPath' . '}',
            ObjectSerializer::toPathValue($src_path),
            $resourcePath
        );

        $queryParams['destPath'] = ObjectSerializer::toQueryValue($dest_path);

        // query params
        if ($src_storage_name !== null) {
            $queryParams['srcStorageName']
                = ObjectSerializer::toQueryValue($src_storage_name);
        }
        // query params
        if ($dest_storage_name !== null) {
            $queryParams['destStorageName']
                = ObjectSerializer::toQueryValue($dest_storage_name);
        }
        // query params
        if ($version_id !== null) {
            $queryParams['versionId']
                = ObjectSerializer::toQueryValue($version_id);
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
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteFile
     *
     * Delete file
     *
     * @param string $path         File path e.g.
     *                             '/folder/file.ext' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $version_id   File version ID to delete (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function deleteFile($path, $storage_name = null, $version_id = null)
    {
        $this->deleteFileWithHttpInfo($path, $storage_name, $version_id);
    }

    /**
     * Operation deleteFileWithHttpInfo
     *
     * Delete file
     *
     * @param string $path         File path e.g. '/folder/file.ext' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $version_id   File version ID to delete (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function deleteFileWithHttpInfo(
        $path, $storage_name = null, $version_id = null
    ) {
        $returnType = '';
        $request = $this->deleteFileRequest($path, $storage_name, $version_id);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            throw $e;
        }
    }

    /**
     * Operation deleteFileAsync
     *
     * Delete file
     *
     * @param string $path         File path e.g. '/folder/file.ext' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $version_id   File version ID to delete (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteFileAsync($path, $storage_name = null, $version_id = null)
    {
        return $this->deleteFileAsyncWithHttpInfo($path, $storage_name, $version_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteFileAsyncWithHttpInfo
     *
     * Delete file
     *
     * @param string $path         File path e.g. '/folder/file.ext' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $version_id   File version ID to delete (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function deleteFileAsyncWithHttpInfo(
        $path, $storage_name = null, $version_id = null
    ) {
        $returnType = '';
        $request = $this->deleteFileRequest($path, $storage_name, $version_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [
                        null,
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
     * Create request for operation 'deleteFile'
     *
     * @param string $path         File path e.g. '/folder/file.ext' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $version_id   File version ID to delete (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function deleteFileRequest(
        $path, $storage_name = null, $version_id = null
    ) {
        // verify the required parameter 'path' is set
        if ($path === null || (is_array($path) && count($path) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$path when calling deleteFile'
            );
        }

        $resourcePath = '/html/storage/file/{path}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'path' . '}',
            ObjectSerializer::toPathValue($path),
            $resourcePath
        );

        // query params
        if ($storage_name !== null) {
            $queryParams['storageName']
                = ObjectSerializer::toQueryValue($storage_name);
        }
        // query params
        if ($version_id !== null) {
            $queryParams['versionId']
                = ObjectSerializer::toQueryValue($version_id);
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
            'DELETE',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation downloadFile
     *
     * Download file
     *
     * @param string $path         File path e.g. '/folder/file.ext' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $version_id   File version ID to download (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return SplFileObject
     */
    public function downloadFile($path, $storage_name = null, $version_id = null)
    {
        list($response) = $this->downloadFileWithHttpInfo(
            $path, $storage_name, $version_id
        );
        return $response;
    }

    /**
     * Operation downloadFileWithHttpInfo
     *
     * Download file
     *
     * @param string $path         File path e.g. '/folder/file.ext' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $version_id   File version ID to download (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \SplFileObject, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function downloadFileWithHttpInfo(
        $path, $storage_name = null, $version_id = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->downloadFileRequest($path, $storage_name, $version_id);

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
     * Operation downloadFileAsync
     *
     * Download file
     *
     * @param string $path         File path e.g. '/folder/file.ext' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $version_id   File version ID to download (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function downloadFileAsync(
        $path, $storage_name = null, $version_id = null
    ) {
        return $this->downloadFileAsyncWithHttpInfo(
            $path, $storage_name, $version_id
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation downloadFileAsyncWithHttpInfo
     *
     * Download file
     *
     * @param string $path         File path e.g. '/folder/file.ext' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $version_id   File version ID to download (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function downloadFileAsyncWithHttpInfo(
        $path, $storage_name = null, $version_id = null
    ) {
        $returnType = '\SplFileObject';
        $request = $this->downloadFileRequest($path, $storage_name, $version_id);

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
     * Create request for operation 'downloadFile'
     *
     * @param string $path         File path e.g. '/folder/file.ext' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $version_id   File version ID to download (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function downloadFileRequest(
        $path, $storage_name = null, $version_id = null
    ) {
        // verify the required parameter 'path' is set
        if ($path === null || (is_array($path) && count($path) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$path when calling downloadFile'
            );
        }

        $resourcePath = '/html/storage/file/{path}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'path' . '}',
            ObjectSerializer::toPathValue($path),
            $resourcePath
        );

        // query params
        if ($storage_name !== null) {
            $queryParams['storageName']
                = ObjectSerializer::toQueryValue($storage_name);
        }
        // query params
        if ($version_id !== null) {
            $queryParams['versionId']
                = ObjectSerializer::toQueryValue($version_id);
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
     * Operation moveFile
     *
     * Move file
     *
     * @param string $src_path          Source file path e.g. '/src.ext' (required)
     * @param string $dest_path         Destination file path e.g.
     *                                  '/dest.ext' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     * @param string $version_id        File version ID to move (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function moveFile(
        $src_path, $dest_path, $src_storage_name = null,
        $dest_storage_name = null, $version_id = null
    ) {
        $this->moveFileWithHttpInfo(
            $src_path, $dest_path, $src_storage_name,
            $dest_storage_name, $version_id
        );
    }

    /**
     * Operation moveFileWithHttpInfo
     *
     * Move file
     *
     * @param string $src_path          Source file path e.g. '/src.ext' (required)
     * @param string $dest_path         Destination file path
     *                                  e.g. '/dest.ext' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     * @param string $version_id        File version ID to move (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function moveFileWithHttpInfo(
        $src_path, $dest_path, $src_storage_name = null,
        $dest_storage_name = null, $version_id = null
    ) {
        $returnType = '';
        $request = $this->moveFileRequest(
            $src_path, $dest_path, $src_storage_name,
            $dest_storage_name, $version_id
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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            throw $e;
        }
    }

    /**
     * Operation moveFileAsync
     *
     * Move file
     *
     * @param string $src_path          Source file path e.g. '/src.ext' (required)
     * @param string $dest_path         Destination file path
     *                                  e.g. '/dest.ext' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     * @param string $version_id        File version ID to move (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function moveFileAsync(
        $src_path, $dest_path, $src_storage_name = null,
        $dest_storage_name = null, $version_id = null
    ) {
        return $this->moveFileAsyncWithHttpInfo(
            $src_path, $dest_path, $src_storage_name,
            $dest_storage_name, $version_id
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation moveFileAsyncWithHttpInfo
     *
     * Move file
     *
     * @param string $src_path          Source file path e.g. '/src.ext' (required)
     * @param string $dest_path         Destination file path
     *                                  e.g. '/dest.ext' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     * @param string $version_id        File version ID to move (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function moveFileAsyncWithHttpInfo(
        $src_path, $dest_path, $src_storage_name = null,
        $dest_storage_name = null, $version_id = null
    ) {
        $returnType = '';
        $request = $this->moveFileRequest(
            $src_path, $dest_path, $src_storage_name,
            $dest_storage_name, $version_id
        );

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [
                        null,
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
     * Create request for operation 'moveFile'
     *
     * @param string $src_path          Source file path e.g. '/src.ext' (required)
     * @param string $dest_path         Destination file path
     *                                  e.g. '/dest.ext' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     * @param string $version_id        File version ID to move (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function moveFileRequest(
        $src_path, $dest_path, $src_storage_name = null,
        $dest_storage_name = null, $version_id = null
    ) {
        // verify the required parameter 'src_path' is set
        if (($src_path === null)
            || (is_array($src_path) && count($src_path) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$src_path when calling moveFile'
            );
        }
        // verify the required parameter 'dest_path' is set
        if (($dest_path === null)
            || (is_array($dest_path) && count($dest_path) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$dest_path when calling moveFile'
            );
        }

        $resourcePath = '/html/storage/file/move/{srcPath}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // path params
        $resourcePath = str_replace(
            '{' . 'srcPath' . '}',
            ObjectSerializer::toPathValue($src_path),
            $resourcePath
        );

        $queryParams['destPath'] = ObjectSerializer::toQueryValue($dest_path);

        // query params
        if ($src_storage_name !== null) {
            $queryParams['srcStorageName']
                = ObjectSerializer::toQueryValue($src_storage_name);
        }
        // query params
        if ($dest_storage_name !== null) {
            $queryParams['destStorageName']
                = ObjectSerializer::toQueryValue($dest_storage_name);
        }
        // query params
        if ($version_id !== null) {
            $queryParams['versionId']
                = ObjectSerializer::toQueryValue($version_id);
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
            'PUT',
            $this->config['basePath'] . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation uploadFile
     *
     * Upload file
     *
     * @param string        $path         Path where to upload
     *                                    including filename and
     *                                    extension e.g. /file.ext or
     *                                    /Folder 1/file.ext If the content is
     *                                    multipart and path does not contains
     *                                    the file name it tries to get them from
     *                                    filename parameter from
     *                                    Content-Disposition header. (required)
     * @param SplFileObject $file         File to upload (required)
     * @param string        $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return FilesUploadResult
     */
    public function uploadFile($path, $file, $storage_name = null)
    {
        list($response) = $this->uploadFileWithHttpInfo($path, $file, $storage_name);
        return $response;
    }

    /**
     * Operation uploadFileWithHttpInfo
     *
     * Upload file
     *
     * @param string        $path         Path where to upload including filename
     *                                    and extension e.g. /file.ext or
     *                                    /Folder 1/file.ext If the content is
     *                                    multipart and path does not contains
     *                                    the file name it tries to get them from
     *                                    filename parameter from Content-Disposition
     *                                    header. (required)
     * @param SplFileObject $file         File to upload (required)
     * @param string        $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \Client\Invoker\Model\FilesUploadResult,
     * HTTP status code, HTTP response headers (array of strings)
     */
    public function uploadFileWithHttpInfo($path, $file, $storage_name = null)
    {
        $returnType = '\Client\Invoker\Model\FilesUploadResult';
        $request = $this->uploadFileRequest($path, $file, $storage_name);

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
                    '\Client\Invoker\Model\FilesUploadResult',
                    $e->getResponseHeaders()
                );
                $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /**
     * Operation uploadFileAsync
     *
     * Upload file
     *
     * @param string        $path         Path where to upload including filename
     *                                    and extension e.g. /file.ext or
     *                                    /Folder 1/file.ext If the content is
     *                                    multipart and path does not contains
     *                                    the file name it tries to get them from
     *                                    filename parameter from Content-Disposition
     *                                    header. (required)
     * @param SplFileObject $file         File to upload (required)
     * @param string        $storage_name Storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function uploadFileAsync($path, $file, $storage_name = null)
    {
        return $this->uploadFileAsyncWithHttpInfo($path, $file, $storage_name)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation uploadFileAsyncWithHttpInfo
     *
     * Upload file
     *
     * @param string        $path         Path where to upload including filename
     *                                    and extension e.g. /file.ext or
     *                                    /Folder 1/file.ext If the content is
     *                                    multipart and path does not contains
     *                                    the file name it tries to get them from
     *                                    filename parameter from Content-Disposition
     *                                    header. (required)
     * @param SplFileObject $file         File to upload (required)
     * @param string        $storage_name Storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function uploadFileAsyncWithHttpInfo($path, $file, $storage_name = null)
    {
        $returnType = '\Client\Invoker\Model\FilesUploadResult';
        $request = $this->uploadFileRequest($path, $file, $storage_name);

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
     * Create request for operation 'uploadFile'
     *
     * @param string        $path         Path where to upload including filename
     *                                    and extension e.g. /file.ext or
     *                                    /Folder 1/file.ext If the content is
     *                                    multipart and path does not contains
     *                                    the file name it tries to get them from
     *                                    filename parameter from Content-Disposition
     *                                    header. (required)
     * @param SplFileObject $file         File to upload (required)
     * @param string        $storage_name Storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function uploadFileRequest($path, $file, $storage_name = null)
    {
        // verify the required parameter 'path' is set
        if ($path === null || (is_array($path) && count($path) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$path when calling uploadFile'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$file when calling uploadFile'
            );
        }

        $resourcePath = '/html/storage/file/{path}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = true;

        $formParams['File']
            = try_fopen(ObjectSerializer::toFormValue($file), 'rb');

        $resourcePath = str_replace(
            '{' . 'path' . '}',
            ObjectSerializer::toPathValue($path),
            $resourcePath
        );

        // query params
        if ($storage_name !== null) {
            $queryParams['storageName']
                = ObjectSerializer::toQueryValue($storage_name);
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
}
