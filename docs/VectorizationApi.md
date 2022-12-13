# Client\Invoker\Api\HtmlApi

All URIs are relative to *https://api.aspose.cloud/v4.0*

Possible vectorization:
- JPEG, BMP, PNG, TIFF, GIF -> SVG

| Class     | Method                                                                         | Description                                               |
|-----------|--------------------------------------------------------------------------------|-----------------------------------------------------------|
| *HtmlApi* | [**vectorizeLocalToLocal**](VectorizationApi.md#vectorizelocaltolocal)         | Vectorize an image from the local file to the local file. |
| *HtmlApi* | [**vectorizeLocalToStorage**](VectorizationApi.md#vectorizelocaltostorage)     | Vectorize an image from the local file to the storage.    |
| *HtmlApi* | [**vectorizeStorageToLocal**](VectorizationApi.md#vectorizestoragetolocal)     | Vectorize an image from the storage to the local file.    |
| *HtmlApi* | [**vectorizeStorageToStorage**](VectorizationApi.md#vectorizestoragetostorage) | Vectorize an image from the storage to the storage.       |
| *HtmlApi* | [**vectorize**](VectorizationApi.md#vectorize)                                 | General function for vectorization.                       |


## vectorizationOptions
| Field               | Type  | Description                                                                                             | Note     |
|---------------------|-------|---------------------------------------------------------------------------------------------------------|----------|
| **error_threshold** | float | This parameter defines maximum deviation of points to fitted curve. By default it is 30.                | Optional |
| **max_iterations**  | int   | This parameter defines number of iteration for least-squares approximation method. By default it is 30. | Optional |
| **colors_limit**    | int   | The maximum number of colors used to quantize an image. Default value is 25.                            | Optional |
| **line_width**      | float | The value of this parameter is affected by the graphics scale. Default value is 1.                      | Optional |


## vectorizeLocalToLocal
> vectorizeLocalToLocal(string $src, string $dst, array $options = null) : [OperationResult](OperationResult.md)

Vectorize an image from the local file to the local file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v4.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "defaultUserAgent" => "Webkit"
);

$api_html = new HtmlApi($configuration);

$src = "c:/tests/test.jpeg";
$dst = "c:/tests/test.svg";

$options = [
    'error_threshold' => 30,
    'max_iterations' => 50,
    'colors_limit' => 3,
    'line_width' => 2.0,
];

try {
    $result = $api_html->vectorizeLocalToLocal($src, $dst, $options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->vectorizeLocalToLocal: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name                | Type       | Description                                                                                             | Notes                     |
|---------------------|------------|---------------------------------------------------------------------------------------------------------|---------------------------|
| **$src**            | **string** | Full path to the source file.                                                                           | jpeg, tiff, png, bmp, gif |
| **$dst**            | **string** | Full path to the result file.                                                                           | svg                       |
| **$options**        | **string** | Option for vectorization.                                                                               | [optional]                |

### Return type
**[OperationResult](OperationResult.md)**

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

## **vectorizeLocalToStorage**
> vectorizeLocalToStorage(string $src, string $dst, ?string $storage, ?array $options = null) : [OperationResult](OperationResult.md)

Vectorize an image from the local file to the storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v4.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "defaultUserAgent" => "Webkit"
);

$api_html = new HtmlApi($configuration);

$src = "c:/test.bmp";
$dst = 'FolderInStorage/test.svg';
$options = null;

try {
    $result = $api_html->vectorizeLocalToStorage($src, $dst, null, $options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->vectorizeLocalToStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name               | Type       | Description                                                              | Notes                     |
|--------------------|------------|--------------------------------------------------------------------------|---------------------------|
| **$src**           | **string** | Full path to the source file.                                            | jpeg, tiff, png, bmp, gif |
| **$dst**           | **string** | Full path to the result file.                                            | svg                       |
| **$storage**       | **string** | User's storage.                                                          | Null is default storage   |
| **$options**       | **string** | Option for vectorization.                                                | [optional]                |

### Return type
**[OperationResult](OperationResult.md)**


[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

## **vectorizeStorageToLocal**
> vectorizeStorageToLocal(string $src, string $dst, ?string $storage, ?array $options = null) : [OperationResult](OperationResult.md)

Vectorization an image from the storage to the local file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v4.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "defaultUserAgent" => "Webkit"
);

$api_html = new HtmlApi($configuration);

$src = "FolderInStorage/test.png";
$dst = 'c:/test.svg';
$options = null;

try {
    $result = $api_html->vectorizeStorageToLocal($src, $dst, null, $options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->vectorizeStorageToLocal: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name               | Type       | Description                   | Notes                     |
|--------------------|------------|-------------------------------|---------------------------|
| **$src**           | **string** | Full path to the source file. | jpeg, tiff, png, bmp, gif |
| **$dst**           | **string** | Full path to the result file. | svg                       |
| **$storage**       | **string** | User's storage.               | Null is default storage   |
| **$options**       | **string** | Option for vectorization.     | [optional]                |

### Return type
**[OperationResult](OperationResult.md)**


[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

## **vectorizeStorageToStorage**
> vectorizeStorageToStorage(string $src, string $dst, ?string $storage, ?array $options = null) : [OperationResult](OperationResult.md)

Vectorization an image from the storage to the storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v4.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "defaultUserAgent" => "Webkit"
);

$api_html = new HtmlApi($configuration);

$src = "FolderInStorage/test.tiff";
$dst = 'FolderInStorage/test.svg';
$options = null;

try {
    $result = $api_html->vectorizeStorageToStorage($src, $dst, null, $options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->vectorizeStorageToStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name               | Type       | Description                                                              | Notes                     |
|--------------------|------------|--------------------------------------------------------------------------|---------------------------|
| **$src**           | **string** | Full path to the source file.                                            | jpeg, tiff, png, bmp, gif |
| **$dst**           | **string** | Full path to the result file.                                            | svg                       |
| **$storage**       | **string** | User's storage.                                                          | Null is default storage   |
| **$options**       | **string** | Option for vectorization.                                                | [optional]                |

### Return type
**[OperationResult](OperationResult.md)**


[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

## **vectorize**
> vectorize(string $src, string $dst, bool $srcInLocal, bool $dstInLocal, ?array $options=null, ?string $storage=null) : [OperationResult](OperationResult.md)

General function for vectorization.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v4.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
    "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "defaultUserAgent" => "Webkit"
);

$api_html = new HtmlApi($configuration);

$src = 'C:/temp/test.bmp';
$dst = 'C:/test.svg';
$options = null;

try {
    $result = $api_html->vectorize($src, $dst, true, true, null, null);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->vectorize: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name               | Type       | Description                                                              | Notes                     |
|--------------------|------------|--------------------------------------------------------------------------|---------------------------|
| **$src**           | **string** | Full path to the source file or url.                                     | jpeg, tiff, png, bmp, gif |
| **$dst**           | **string** | Full path to the result file.                                            | svg                       |
| **$srcInLocal**    | **bool**   | Source file on the local disk.                                           |                           |
| **$dstInLocal**    | **string** | Result file on the local disk.                                           |                           |
| **$options**       | **string** | Option for vectorization.                                                | [optional]                |
| **$storage**       | **string** | User's storage.                                                          | Null is default storage   |

### Return type
**[OperationResult](OperationResult.md)**


[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)
