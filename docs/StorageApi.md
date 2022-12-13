# # Client\Invoker\Api\StorageApi

All URIs are relative to *https://api.aspose.cloud/v4.0*

| Method                                               | HTTP request                              | Description                    |
|------------------------------------------------------|-------------------------------------------|--------------------------------|
| [**getDiscUsage**](StorageApi.md#getDiscUsage)       | **GET** /html/storage/disc/usage          | Get disc usage                 |
| [**objectExists**](StorageApi.md#objectExists)       | **GET** /html/storage/exist/{path}        | Check if file or folder exists |
| [**storageExists**](StorageApi.md#storageExists)     | **GET** /html/storage/{storageName}/exist | Check if storage exists        |

## **getDiscUsage**
> Client\Invoker\Model\DiscUsage getDiscUsage($storage_name)

Get disc usage

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

$storage_name = "storage_name_example"; // string | Storage name

try {
    $result = $apiInstance->getDiscUsage($storage_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->getDiscUsage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name             | Type       | Description  | Notes      |
|------------------|------------|--------------|------------|
| **storage_name** | **string** | Storage name | [optional] |

### Return type
[**\Client\Invoker\Model\DiscUsage**](DiscUsage.md)


[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)


## **objectExists**
> \Client\Invoker\Model\ObjectExist objectExists($path, $storage_name, $version_id)

Check if file or folder exists

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

$path = "path_example"; // string | File or folder path e.g. '/file.ext' or '/folder'
$storage_name = "storage_name_example"; // string | Storage name
$version_id = "version_id_example"; // string | File version ID

try {
    $result = $apiInstance->objectExists($path, $storage_name, $version_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->objectExists: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name             | Type       | Description                                                       | Notes      |
|------------------|------------|-------------------------------------------------------------------|------------|
| **path**         | **string** | File or folder path e.g. &#39;/file.ext&#39; or &#39;/folder&#39; |            |
| **storage_name** | **string** | Storage name                                                      | [optional] |
| **version_id**   | **string** | File version ID                                                   | [optional] |

### Return type
[**\Client\Invoker\Model\ObjectExist**](ObjectExist.md)

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

## **storageExists**
> \Client\Invoker\Model\StorageExist storageExists($storage_name)

Check if storage exists

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

$storage_name = "storage_name_example"; // string | Storage name

try {
    $result = $apiInstance->storageExists($storage_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StorageApi->storageExists: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name             | Type       | Description  | Notes |
|------------------|------------|--------------|-------|
| **storage_name** | **string** | Storage name |       |

### Return type
[**\Client\Invoker\Model\StorageExist**](StorageExist.md)

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to Model list]](../README.md#documentation-for-models) [[Back to README]](../README.md)

