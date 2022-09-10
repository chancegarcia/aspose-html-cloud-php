# Client\Invoker\Api\FolderApi

All URIs are relative to *https://api.aspose.cloud/v4.0*

| Method                                        | HTTP request                                | Description                               |
|-----------------------------------------------|---------------------------------------------|-------------------------------------------|
| [**createFolder**](FolderApi.md#createfolder) | **PUT** /html/storage/folder/{path}         | Create the folder                         |
| [**deleteFolder**](FolderApi.md#deletefolder) | **DELETE** /html/storage/folder/{path}      | Delete folder                             |
| [**getFilesList**](FolderApi.md#getfileslist) | **GET** /html/storage/folder/{path}         | Get all files and folders within a folder |

## **createFolder**
> createFolder($path, $storage_name) : void

Create the folder

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

| Name             | Type       | Description                                             | Notes      |
|------------------|------------|---------------------------------------------------------|------------|
| **path**         | **string** | Folder path to create e.g. &#39;folder_1/folder_2/&#39; |            |
| **storage_name** | **string** | Storage name                                            | [optional] |

### Return type
void (empty response body)

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

## **deleteFolder**
> deleteFolder($path, $storage_name, $recursive)

Delete folder

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
| Name             | Type       | Description                                    | Notes                         |
|------------------|------------|------------------------------------------------|-------------------------------|
| **path**         | **string** | Folder path e.g. &#39;/folder&#39;             |                               |
| **storage_name** | **string** | Storage name                                   | [optional]                    |
| **recursive**    | **string** | Enable to delete folders, subfolders and files | [optional] [default to false] |

### Return type
void (empty response body)

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

## **getFilesList**
> \Client\Invoker\Model\FilesList getFilesList($path, $storage_name)

Get all files and folders within a folder

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
| Name             | Type       | Description                        | Notes      |
|------------------|------------|------------------------------------|------------|
| **path**         | **string** | Folder path e.g. &#39;/folder&#39; |            |
| **storage_name** | **string** | Storage name                       | [optional] |

### Return type
[**\Client\Invoker\Model\FilesList**](FilesList.md)

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)
