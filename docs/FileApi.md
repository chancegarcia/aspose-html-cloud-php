# Client\Invoker\Api\FileApi

All URIs are relative to *https://api.aspose.cloud/v4.0*

| Method                                      | HTTP request                         | Description   |
|---------------------------------------------|--------------------------------------|---------------|
| [**deleteFile**](FileApi.md#deletefile)     | **DELETE** /html/storage/file/{path} | Delete file   |
| [**downloadFile**](FileApi.md#downloadfile) | **GET** /html/storage/file/{path}    | Download file |
| [**uploadFile**](FileApi.md#uploadfile)     | **PUT** /html/storage/file/{path}    | Upload file   |

## **deleteFile**
> deleteFile($path, $storage_name, $version_id)

Delete file

### Example
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v4.0",
    "authPath" => "https://api.aspose.cloud/oauth2/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "defaultUserAgent" => "Webkit"
);

$apiInstance = new Client\Invoker\Api\StorageApi($configuration);

$path = "path_example"; // string | File path e.g. '/folder/file.ext'
$storage_name = "storage_name_example"; // string | Storage name
$version_id = "version_id_example"; // string | File version ID to delete

try {
    $apiInstance->deleteFile($path, $storage_name, $version_id);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->deleteFile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name             | Type       | Description                               | Notes      |
|------------------|------------|-------------------------------------------|------------|
| **path**         | **string** | File path e.g. &#39;/folder/file.ext&#39; |            |
| **storage_name** | **string** | Storage name                              | [optional] |
| **version_id**   | **string** | File version ID to delete                 | [optional] |

### Return type
void (empty response body)

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

## **downloadFile**
> \SplFileObject downloadFile($path, $storage_name, $version_id)

Download file

### Example
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v4.0",
    "authPath" => "https://api.aspose.cloud/oauth2/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "defaultUserAgent" => "Webkit"
);

$apiInstance = new Client\Invoker\Api\StorageApi($configuration);

$path = "path_example"; // string | File path e.g. '/folder/file.ext'
$storage_name = "storage_name_example"; // string | Storage name
$version_id = "version_id_example"; // string | File version ID to download

try {
    $result = $apiInstance->downloadFile($path, $storage_name, $version_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->downloadFile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name             | Type       | Description                               | Notes      |
|------------------|------------|-------------------------------------------|------------|
| **path**         | **string** | File path e.g. &#39;/folder/file.ext&#39; |            |
| **storage_name** | **string** | Storage name                              | [optional] |
| **version_id**   | **string** | File version ID to download               | [optional] |

### Return type
**\SplFileObject**

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)


## **uploadFile**
> \Client\Invoker\Model\FilesUploadResult uploadFile($path, $file, $storage_name)

Upload file

### Example
```php
<?php

require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v4.0",
    "authPath" => "https://api.aspose.cloud/oauth2/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "defaultUserAgent" => "Webkit"
);

$apiInstance = new Client\Invoker\Api\StorageApi($configuration);

$path = "FolderInStorage"; // string | Path where to upload excluding filename e.g. "/" or "Folder"
$file = "/path/to/file.txt"; // \SplFileObject | File to upload
$storage_name = "storage_name_example"; // string | Storage name

try {
    $result = $apiInstance->uploadFile($path, $file, $storage_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->uploadFile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name             | Type               | Description                                                  | Notes      |
|------------------|--------------------|--------------------------------------------------------------|------------|
| **path**         | **string**         | Path where to upload excluding filename e.g. "/" or "Folder" |            |
| **file**         | **\SplFileObject** | File to upload                                               |            |
| **storage_name** | **string**         | Storage name                                                 | [optional] |

### Return type
[**\Client\Invoker\Model\FilesUploadResult**](FilesUploadResult.md)

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)
