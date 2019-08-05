# Client\Invoker\Api\FolderApi

All URIs are relative to *https://api.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**copyFolder**](FolderApi.md#copyFolder) | **PUT** /html/storage/folder/copy/{srcPath} | Copy folder
[**createFolder**](FolderApi.md#createFolder) | **PUT** /html/storage/folder/{path} | Create the folder
[**deleteFolder**](FolderApi.md#deleteFolder) | **DELETE** /html/storage/folder/{path} | Delete folder
[**getFilesList**](FolderApi.md#getFilesList) | **GET** /html/storage/folder/{path} | Get all files and folders within a folder
[**moveFolder**](FolderApi.md#moveFolder) | **PUT** /html/storage/folder/move/{srcPath} | Move folder

<a name="copyFolder"></a>
# **copyFolder**
> copyFolder($src_path, $dest_path, $src_storage_name, $dest_storage_name)

Copy folder

### Example
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v1.1",
    "authPath" => "https://api.aspose.cloud/oauth2/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "testResult" => "\\testresult\\",
    "testData" => "\\testdata\\",
    "remoteFolder" => "HtmlTestDoc",
    "defaultUserAgent" => "Webkit",
    "debugFile" => "php://output",
    "debug" => false
);

$apiInstance = new Client\Invoker\Api\StorageApi($configuration);

$src_path = "src_path_example"; // string | Source folder path e.g. '/src'
$dest_path = "dest_path_example"; // string | Destination folder path e.g. '/dst'
$src_storage_name = "src_storage_name_example"; // string | Source storage name
$dest_storage_name = "dest_storage_name_example"; // string | Destination storage name

try {
    $apiInstance->copyFolder($src_path, $dest_path, $src_storage_name, $dest_storage_name);
} catch (Exception $e) {
    echo 'Exception when calling FolderApi->copyFolder: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **src_path** | **string**| Source folder path e.g. &#39;/src&#39; |
 **dest_path** | **string**| Destination folder path e.g. &#39;/dst&#39; |
 **src_storage_name** | **string**| Source storage name | [optional]
 **dest_storage_name** | **string**| Destination storage name | [optional]

### Return type

void (empty response body)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

<a name="createFolder"></a>
# **createFolder**
> createFolder($path, $storage_name)

Create the folder

### Example
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v1.1",
    "authPath" => "https://api.aspose.cloud/oauth2/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "testResult" => "\\testresult\\",
    "testData" => "\\testdata\\",
    "remoteFolder" => "HtmlTestDoc",
    "defaultUserAgent" => "Webkit",
    "debugFile" => "php://output",
    "debug" => false
);

$apiInstance = new Client\Invoker\Api\StorageApi($configuration);

$path = "path_example"; // string | Folder path to create e.g. 'folder_1/folder_2/'
$storage_name = "storage_name_example"; // string | Storage name

try {
    $apiInstance->createFolder($path, $storage_name);
} catch (Exception $e) {
    echo 'Exception when calling FolderApi->createFolder: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **path** | **string**| Folder path to create e.g. &#39;folder_1/folder_2/&#39; |
 **storage_name** | **string**| Storage name | [optional]

### Return type

void (empty response body)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

<a name="deleteFolder"></a>
# **deleteFolder**
> deleteFolder($path, $storage_name, $recursive)

Delete folder

### Example
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v1.1",
    "authPath" => "https://api.aspose.cloud/oauth2/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "testResult" => "\\testresult\\",
    "testData" => "\\testdata\\",
    "remoteFolder" => "HtmlTestDoc",
    "defaultUserAgent" => "Webkit",
    "debugFile" => "php://output",
    "debug" => false
);

$apiInstance = new Client\Invoker\Api\StorageApi($configuration);

$path = "path_example"; // string | Folder path e.g. '/folder'
$storage_name = "storage_name_example"; // string | Storage name
$recursive = 'false'; // string | Enable to delete folders, subfolders and files

try {
    $apiInstance->deleteFolder($path, $storage_name, $recursive);
} catch (Exception $e) {
    echo 'Exception when calling FolderApi->deleteFolder: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **path** | **string**| Folder path e.g. &#39;/folder&#39; |
 **storage_name** | **string**| Storage name | [optional]
 **recursive** | **string**| Enable to delete folders, subfolders and files | [optional] [default to false]

### Return type

void (empty response body)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

<a name="getFileList"></a>
# **getFilesList**
> \Client\Invoker\Model\FilesList getFilesList($path, $storage_name)

Get all files and folders within a folder

### Example
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v1.1",
    "authPath" => "https://api.aspose.cloud/oauth2/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "testResult" => "\\testresult\\",
    "testData" => "\\testdata\\",
    "remoteFolder" => "HtmlTestDoc",
    "defaultUserAgent" => "Webkit",
    "debugFile" => "php://output",
    "debug" => false
);

$apiInstance = new Client\Invoker\Api\StorageApi($configuration);

$path = "path_example"; // string | Folder path e.g. '/folder'
$storage_name = "storage_name_example"; // string | Storage name

try {
    $result = $apiInstance->getFilesList($path, $storage_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FolderApi->getFilesList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **path** | **string**| Folder path e.g. &#39;/folder&#39; |
 **storage_name** | **string**| Storage name | [optional]

### Return type

[**\Client\Invoker\Model\FilesList**](FilesList.md)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

<a name="moveFolder"></a>
# **moveFolder**
> moveFolder($src_path, $dest_path, $src_storage_name, $dest_storage_name)

Move folder

### Example
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v1.1",
    "authPath" => "https://api.aspose.cloud/oauth2/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "testResult" => "\\testresult\\",
    "testData" => "\\testdata\\",
    "remoteFolder" => "HtmlTestDoc",
    "defaultUserAgent" => "Webkit",
    "debugFile" => "php://output",
    "debug" => false
);

$apiInstance = new Client\Invoker\Api\StorageApi($configuration);

$src_path = "src_path_example"; // string | Folder path to move e.g. '/folder'
$dest_path = "dest_path_example"; // string | Destination folder path to move to e.g '/dst'
$src_storage_name = "src_storage_name_example"; // string | Source storage name
$dest_storage_name = "dest_storage_name_example"; // string | Destination storage name

try {
    $apiInstance->moveFolder($src_path, $dest_path, $src_storage_name, $dest_storage_name);
} catch (Exception $e) {
    echo 'Exception when calling FolderApi->moveFolder: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **src_path** | **string**| Folder path to move e.g. &#39;/folder&#39; |
 **dest_path** | **string**| Destination folder path to move to e.g &#39;/dst&#39; |
 **src_storage_name** | **string**| Source storage name | [optional]
 **dest_storage_name** | **string**| Destination storage name | [optional]

### Return type

void (empty response body)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

