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
use Client\Invoker\Model\FilesList;
use Client\Invoker\ObjectSerializer;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use function GuzzleHttp\Psr7\build_query;
use function GuzzleHttp\json_encode;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use InvalidArgumentException;
use stdClass;

/**
 * Operations with folders on the storage
 *
 * @category FolderApi
 * @package  Asposehtmlcloudphp
 * @author   Alexander Makogon <alexander.makogon@aspose.com>
 * @license  https://opensource.org/licenses/mit-license.php  MIT License
 * @link     https://packagist.org/packages/aspose/aspose-html-cloud-php
 */
trait FolderApi
{

    /**
     * Operation copyFolder
     *
     * Copy folder
     *
     * @param string $src_path          Source folder path e.g.
     *                                  '/src' (required)
     * @param string $dest_path         Destination folder path e.g.
     *                                  '/dst' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function copyFolder(
        $src_path, $dest_path, $src_storage_name = null, $dest_storage_name = null
    ) {
        $this->copyFolderWithHttpInfo(
            $src_path, $dest_path, $src_storage_name, $dest_storage_name
        );
    }

    /**
     * Operation copyFolderWithHttpInfo
     *
     * Copy folder
     *
     * @param string $src_path          Source folder path e.g. '/src' (required)
     * @param string $dest_path         Destination folder path e.g.
     *                                  '/dst' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function copyFolderWithHttpInfo(
        $src_path, $dest_path, $src_storage_name = null, $dest_storage_name = null
    ) {
        $returnType = '';
        $request = $this->copyFolderRequest(
            $src_path, $dest_path, $src_storage_name, $dest_storage_name
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
     * Operation copyFolderAsync
     *
     * Copy folder
     *
     * @param string $src_path          Source folder path e.g. '/src' (required)
     * @param string $dest_path         Destination folder path e.g.
     *                                  '/dst' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function copyFolderAsync(
        $src_path, $dest_path, $src_storage_name = null, $dest_storage_name = null
    ) {
        return $this->copyFolderAsyncWithHttpInfo(
            $src_path, $dest_path, $src_storage_name, $dest_storage_name
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation copyFolderAsyncWithHttpInfo
     *
     * Copy folder
     *
     * @param string $src_path          Source folder path e.g. '/src' (required)
     * @param string $dest_path         Destination folder path e.g.
     *                                  '/dst' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function copyFolderAsyncWithHttpInfo(
        $src_path, $dest_path, $src_storage_name = null, $dest_storage_name = null
    ) {
        $returnType = '';
        $request = $this->copyFolderRequest(
            $src_path, $dest_path, $src_storage_name, $dest_storage_name
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
     * Create request for operation 'copyFolder'
     *
     * @param string $src_path          Source folder path e.g. '/src' (required)
     * @param string $dest_path         Destination folder path e.g.
     *                                  '/dst' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function copyFolderRequest(
        $src_path, $dest_path, $src_storage_name = null, $dest_storage_name = null
    ) {
        // verify the required parameter 'src_path' is set
        if (($src_path === null)
            || (is_array($src_path) && count($src_path) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$src_path when calling copyFolder'
            );
        }
        // verify the required parameter 'dest_path' is set
        if (($dest_path === null)
            || (is_array($dest_path) && count($dest_path) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$dest_path when calling copyFolder'
            );
        }

        $resourcePath = '/html/storage/folder/copy/{srcPath}';
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
     * Operation createFolder
     *
     * Create the folder
     *
     * @param string $path         Folder path to create e.g.
     *                             'folder_1/folder_2/' (required)
     * @param string $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function createFolder($path, $storage_name = null)
    {
        $this->createFolderWithHttpInfo($path, $storage_name);
    }

    /**
     * Operation createFolderWithHttpInfo
     *
     * Create the folder
     *
     * @param string $path         Folder path to create e.g.
     *                             'folder_1/folder_2/' (required)
     * @param string $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function createFolderWithHttpInfo($path, $storage_name = null)
    {
        $returnType = '';
        $request = $this->createFolderRequest($path, $storage_name);

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
     * Operation createFolderAsync
     *
     * Create the folder
     *
     * @param string $path         Folder path to create e.g.
     *                             'folder_1/folder_2/' (required)
     * @param string $storage_name Storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createFolderAsync($path, $storage_name = null)
    {
        return $this->createFolderAsyncWithHttpInfo($path, $storage_name)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation createFolderAsyncWithHttpInfo
     *
     * Create the folder
     *
     * @param string $path         Folder path to create e.g.
     *                             'folder_1/folder_2/' (required)
     * @param string $storage_name Storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function createFolderAsyncWithHttpInfo($path, $storage_name = null)
    {
        $returnType = '';
        $request = $this->createFolderRequest($path, $storage_name);

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
     * Create request for operation 'createFolder'
     *
     * @param string $path         Folder path to create e.g.
     *                             'folder_1/folder_2/' (required)
     * @param string $storage_name Storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function createFolderRequest($path, $storage_name = null)
    {
        // verify the required parameter 'path' is set
        if ($path === null || (is_array($path) && count($path) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$path when calling createFolder'
            );
        }

        $resourcePath = '/html/storage/folder/{path}';
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
     * Operation deleteFolder
     *
     * Delete folder
     *
     * @param string $path         Folder path e.g. '/folder' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $recursive    Enable to delete folders, subfolders
     *                             and files (optional, default to 'false')
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function deleteFolder($path, $storage_name = null, $recursive = 'false')
    {
        $this->deleteFolderWithHttpInfo($path, $storage_name, $recursive);
    }

    /**
     * Operation deleteFolderWithHttpInfo
     *
     * Delete folder
     *
     * @param string $path         Folder path e.g. '/folder' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $recursive    Enable to delete folders, subfolders
     *                             and files (optional, default to 'false')
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function deleteFolderWithHttpInfo(
        $path, $storage_name = null, $recursive = 'false'
    ) {
        $returnType = '';
        $request = $this->deleteFolderRequest($path, $storage_name, $recursive);

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
     * Operation deleteFolderAsync
     *
     * Delete folder
     *
     * @param string $path         Folder path e.g. '/folder' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $recursive    Enable to delete folders, subfolders
     *                             and files (optional, default to 'false')
     *
     * @return PromiseInterface
     */
    public function deleteFolderAsync(
        $path, $storage_name = null, $recursive = 'false'
    ) {
        return $this->deleteFolderAsyncWithHttpInfo($path, $storage_name, $recursive)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteFolderAsyncWithHttpInfo
     *
     * Delete folder
     *
     * @param string $path         Folder path e.g. '/folder' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $recursive    Enable to delete folders, subfolders
     *                             and files (optional, default to 'false')
     *
     * @return PromiseInterface
     */
    public function deleteFolderAsyncWithHttpInfo(
        $path, $storage_name = null, $recursive = 'false'
    ) {
        $returnType = '';
        $request = $this->deleteFolderRequest($path, $storage_name, $recursive);

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
     * Create request for operation 'deleteFolder'
     *
     * @param string $path         Folder path e.g. '/folder' (required)
     * @param string $storage_name Storage name (optional)
     * @param string $recursive    Enable to delete folders, subfolders
     *                             and files (optional, default to 'false')
     *
     * @return Request
     */
    protected function deleteFolderRequest(
        $path, $storage_name = null, $recursive = 'false'
    ) {
        // verify the required parameter 'path' is set
        if ($path === null || (is_array($path) && count($path) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$path when calling deleteFolder'
            );
        }

        $resourcePath = '/html/storage/folder/{path}';
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
        if ($recursive) {
            $queryParams['recursive'] = 'true';
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
     * Operation getFilesList
     *
     * Get all files and folders within a folder
     *
     * @param string $path         Folder path e.g. '/folder' (required)
     * @param string $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return FilesList
     */
    public function getFilesList($path, $storage_name = null)
    {
        list($response) = $this->getFilesListWithHttpInfo($path, $storage_name);
        return $response;
    }

    /**
     * Operation getFilesListWithHttpInfo
     *
     * Get all files and folders within a folder
     *
     * @param string $path         Folder path e.g. '/folder' (required)
     * @param string $storage_name Storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of \Client\Invoker\Model\FilesList,
     * HTTP status code, HTTP response headers (array of strings)
     */
    public function getFilesListWithHttpInfo($path, $storage_name = null)
    {
        $returnType = '\Client\Invoker\Model\FilesList';
        $request = $this->getFilesListRequest($path, $storage_name);

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
                    '\Client\Invoker\Model\FilesList',
                    $e->getResponseHeaders()
                );
                $e->setResponseObject($data);
                break;
            }
            throw $e;
        }
    }

    /**
     * Operation getFilesListAsync
     *
     * Get all files and folders within a folder
     *
     * @param string $path         Folder path e.g. '/folder' (required)
     * @param string $storage_name Storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getFilesListAsync($path, $storage_name = null)
    {
        return $this->getFilesListAsyncWithHttpInfo($path, $storage_name)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getFilesListAsyncWithHttpInfo
     *
     * Get all files and folders within a folder
     *
     * @param string $path         Folder path e.g. '/folder' (required)
     * @param string $storage_name Storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function getFilesListAsyncWithHttpInfo($path, $storage_name = null)
    {
        $returnType = '\Client\Invoker\Model\FilesList';
        $request = $this->getFilesListRequest($path, $storage_name);

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
     * Create request for operation 'getFilesList'
     *
     * @param string $path         Folder path e.g. '/folder' (required)
     * @param string $storage_name Storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function getFilesListRequest($path, $storage_name = null)
    {
        // verify the required parameter 'path' is set
        if ($path === null || (is_array($path) && count($path) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$path when calling getFilesList'
            );
        }

        $resourcePath = '/html/storage/folder/{path}';
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
     * Operation moveFolder
     *
     * Move folder
     *
     * @param string $src_path          Folder path to move e.g.
     *                                  '/folder' (required)
     * @param string $dest_path         Destination folder path to move to e.g
     *                                  '/dst' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return void
     */
    public function moveFolder(
        $src_path, $dest_path, $src_storage_name = null, $dest_storage_name = null
    ) {
        $this->moveFolderWithHttpInfo(
            $src_path, $dest_path, $src_storage_name, $dest_storage_name
        );
    }

    /**
     * Operation moveFolderWithHttpInfo
     *
     * Move folder
     *
     * @param string $src_path          Folder path to move e.g.
     *                                  '/folder' (required)
     * @param string $dest_path         Destination folder path to move to e.g
     *                                  '/dst' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     *
     * @throws ApiException on non-2xx response
     * @throws InvalidArgumentException
     * @return array of null, HTTP status code,
     * HTTP response headers (array of strings)
     */
    public function moveFolderWithHttpInfo(
        $src_path, $dest_path, $src_storage_name = null, $dest_storage_name = null
    ) {
        $returnType = '';
        $request = $this->moveFolderRequest(
            $src_path, $dest_path, $src_storage_name, $dest_storage_name
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
     * Operation moveFolderAsync
     *
     * Move folder
     *
     * @param string $src_path          Folder path to move e.g.
     *                                  '/folder' (required)
     * @param string $dest_path         Destination folder path to move to
     *                                  e.g '/dst' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function moveFolderAsync(
        $src_path, $dest_path, $src_storage_name = null, $dest_storage_name = null
    ) {
        return $this->moveFolderAsyncWithHttpInfo(
            $src_path, $dest_path, $src_storage_name, $dest_storage_name
        )->then(
            function ($response) {
                return $response[0];
            }
        );
    }

    /**
     * Operation moveFolderAsyncWithHttpInfo
     *
     * Move folder
     *
     * @param string $src_path          Folder path to move e.g.
     *                                  '/folder' (required)
     * @param string $dest_path         Destination folder path to move to e.g
     *                                  '/dst' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return PromiseInterface
     */
    public function moveFolderAsyncWithHttpInfo(
        $src_path, $dest_path, $src_storage_name = null, $dest_storage_name = null
    ) {
        $returnType = '';
        $request = $this->moveFolderRequest(
            $src_path, $dest_path, $src_storage_name, $dest_storage_name
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
     * Create request for operation 'moveFolder'
     *
     * @param string $src_path          Folder path to move e.g.
     *                                  '/folder' (required)
     * @param string $dest_path         Destination folder path to move to e.g
     *                                  '/dst' (required)
     * @param string $src_storage_name  Source storage name (optional)
     * @param string $dest_storage_name Destination storage name (optional)
     *
     * @throws InvalidArgumentException
     * @return Request
     */
    protected function moveFolderRequest(
        $src_path, $dest_path, $src_storage_name = null, $dest_storage_name = null
    ) {
        // verify the required parameter 'src_path' is set
        if (($src_path === null)
            || (is_array($src_path) && count($src_path) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$src_path when calling moveFolder'
            );
        }
        // verify the required parameter 'dest_path' is set
        if (($dest_path === null)
            || (is_array($dest_path) && count($dest_path) === 0)
        ) {
            throw new InvalidArgumentException(
                'Missing the required parameter '
                .'$dest_path when calling moveFolder'
            );
        }

        $resourcePath = '/html/storage/folder/move/{srcPath}';
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

        // query params
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

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->_headerSelector->selectHeadersForMultipart(
                ['application/json']
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
}
