# Client\Invoker\Api\ConversionApi

All URIs are relative to *https://api.aspose.cloud/v4.0*

Possible conversions:
- HTML -> PDF, XPS, DOCX, MD, MHTML, JPEG, BMP, PNG, TIFF, GIF
- EPUB -> PDF, XPS, DOCX, JPEG, BMP, PNG, TIFF, GIF
- MD -> PDF, XPS, DOCX, HTML, MHTML, JPEG, BMP, PNG, TIFF, GIF
- MHTML -> PDF, XPS, DOCX, JPEG, BMP, PNG, TIFF, GIF

| Class     | Method                                                                  | Description                                                              |
|-----------|-------------------------------------------------------------------------|--------------------------------------------------------------------------|
| *HtmlApi* | [**convertLocalToLocal**](ConversionApi.md#convertlocaltolocal)         | Convert the HTML or EPUB document from the local file to the local file. |
| *HtmlApi* | [**convertLocalToStorage**](ConversionApi.md#convertlocaltostorage)     | Convert the HTML or EPUB document from the local file to the storage.    |
| *HtmlApi* | [**convertStorageToLocal**](ConversionApi.md#convertstoragetolocal)     | Convert the HTML or EPUB document from the storage to the local file.    |
| *HtmlApi* | [**convertStorageToStorage**](ConversionApi.md#convertstoragetostorage) | Convert the HTML or EPUB document from the storage to the storage.       |
| *HtmlApi* | [**convertUrlToLocal**](ConversionApi.md#converturltolocal)             | Convert the website and saving result to the local file.                 |
| *HtmlApi* | [**convertUrlToStorage**](ConversionApi.md#converturltostorage)         | Convert the website and saving result to the storage.                    |
| *HtmlApi* | [**convert**](ConversionApi.md#convert)                                 | General function for conversion.                                         |

## convertLocalToLocal
> convertLocalToLocal(string $src, string $dst, array $options = null) : [ConversionResult](ConversionResult.md)

Convert the HTML, EPUB from the local file to the local file.

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

$src = "c:/tests/test.html";
$dst = "c:/tests/test.jpeg";

$options = [
    'width' => 800,
    'height' => 600,
    'left_margin' => 10,
    'right_margin' => 10,
    'top_margin' => 10,
    'bottom_margin' => 10
];

try {
    $result = $api_html->convertLocalToLocal($src, $dst, $options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->convertLocalToLocal: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

| Name               | Type       | Description                                                              | Notes      |
|--------------------|------------|--------------------------------------------------------------------------|------------|
| **$src**           | **string** | Full path to the source file.                                            | html, epub |
| **$dst**           | **string** | Full path to the result file.                                            |            |
| **$options**       | **string** | Option for conversion.                                                   | [optional] |
| **$width**         | **float**  | Resulting width in pixel. For PDF, XPS or DOC formats in inches.         | [optional] |
| **$height**        | **float**  | Resulting height in pixel. For PDF, XPS or DOC formats in inches.        | [optional] |
| **$left_margin**   | **float**  | Left resulting margin in pixel. For PDF, XPS or DOC formats in inches.   | [optional] |
| **$right_margin**  | **float**  | Right resulting margin in pixel. For PDF, XPS or DOC formats in inches.  | [optional] |
| **$top_margin**    | **float**  | Top resulting margin in pixel. For PDF, XPS or DOC formats in inches.    | [optional] |
| **$bottom_margin** | **float**  | Bottom resulting margin in pixel. For PDF, XPS or DOC formats in inches. | [optional] |

### Return type
**[ConversionResult](ConversionResult.md)**

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

## **convertLocalToStorage**
> convertLocalToStorage(string $src, string $dst, ?string $storage, ?array $options = null) : [ConversionResult](ConversionResult.md)

Convert the HTML or EPUB from the local file to the storage.

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

$src = "c:/test.html";
$dst = 'c:/test.pdf';
$options = null;

try {
    $result = $api_html->convertLocalToStorage($src, $dst, null, $options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->convertLocalToStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name               | Type       | Description                                                              | Notes                   |
|--------------------|------------|--------------------------------------------------------------------------|-------------------------|
| **$src**           | **string** | Full path to the source file.                                            | html, epub              |
| **$dst**           | **string** | Full path to the result file.                                            |                         |
| **$storage**       | **string** | User's storage.                                                          | Null is default storage |
| **$options**       | **string** | Option for conversion.                                                   | [optional]              |
| **$width**         | **float**  | Resulting width in pixel. For PDF, XPS or DOC formats in inches.         | [optional]              |
| **$height**        | **float**  | Resulting height in pixel. For PDF, XPS or DOC formats in inches.        | [optional]              |
| **$left_margin**   | **float**  | Left resulting margin in pixel. For PDF, XPS or DOC formats in inches.   | [optional]              |
| **$right_margin**  | **float**  | Right resulting margin in pixel. For PDF, XPS or DOC formats in inches.  | [optional]              |
| **$top_margin**    | **float**  | Top resulting margin in pixel. For PDF, XPS or DOC formats in inches.    | [optional]              |
| **$bottom_margin** | **float**  | Bottom resulting margin in pixel. For PDF, XPS or DOC formats in inches. | [optional]              |

### Return type
**[ConversionResult](ConversionResult.md)**


[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

## **convertStorageToLocal**
> convertStorageToLocal(string $src, string $dst, ?string $storage, ?array $options = null) : [ConversionResult](ConversionResult.md)

Convert the HTML or EPUB from the storage to the local file.

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

$src = "FolderInStorage/test.html";
$dst = 'c:/test.pdf';
$options = null;

try {
    $result = $api_html->convertStorageToLocal($src, $dst, null, $options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->convertStorageToLocal: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name               | Type       | Description                                                              | Notes                   |
|--------------------|------------|--------------------------------------------------------------------------|-------------------------|
| **$src**           | **string** | Full path to the source file.                                            | html, epub              |
| **$dst**           | **string** | Full path to the result file.                                            |                         |
| **$storage**       | **string** | User's storage.                                                          | Null is default storage |
| **$options**       | **string** | Option for conversion.                                                   | [optional]              |
| **$width**         | **float**  | Resulting width in pixel. For PDF, XPS or DOC formats in inches.         | [optional]              |
| **$height**        | **float**  | Resulting height in pixel. For PDF, XPS or DOC formats in inches.        | [optional]              |
| **$left_margin**   | **float**  | Left resulting margin in pixel. For PDF, XPS or DOC formats in inches.   | [optional]              |
| **$right_margin**  | **float**  | Right resulting margin in pixel. For PDF, XPS or DOC formats in inches.  | [optional]              |
| **$top_margin**    | **float**  | Top resulting margin in pixel. For PDF, XPS or DOC formats in inches.    | [optional]              |
| **$bottom_margin** | **float**  | Bottom resulting margin in pixel. For PDF, XPS or DOC formats in inches. | [optional]              |

### Return type
**[ConversionResult](ConversionResult.md)**


[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

## **convertStorageToStorage**
> convertStorageToStorage(string $src, string $dst, ?string $storage, ?array $options = null) : [ConversionResult](ConversionResult.md)

Convert the HTML or EPUB from the storage to the storage.

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

$src = "FolderInStorage/test.epub";
$dst = 'FolderInStorage/test.pdf';
$options = null;

try {
    $result = $api_html->convertStorageToStorage($src, $dst, null, $options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->convertStorageToStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name               | Type       | Description                                                              | Notes                   |
|--------------------|------------|--------------------------------------------------------------------------|-------------------------|
| **$src**           | **string** | Full path to the source file.                                            | html, epub              |
| **$dst**           | **string** | Full path to the result file.                                            |                         |
| **$storage**       | **string** | User's storage.                                                          | Null is default storage |
| **$options**       | **string** | Option for conversion.                                                   | [optional]              |
| **$width**         | **float**  | Resulting width in pixel. For PDF, XPS or DOC formats in inches.         | [optional]              |
| **$height**        | **float**  | Resulting height in pixel. For PDF, XPS or DOC formats in inches.        | [optional]              |
| **$left_margin**   | **float**  | Left resulting margin in pixel. For PDF, XPS or DOC formats in inches.   | [optional]              |
| **$right_margin**  | **float**  | Right resulting margin in pixel. For PDF, XPS or DOC formats in inches.  | [optional]              |
| **$top_margin**    | **float**  | Top resulting margin in pixel. For PDF, XPS or DOC formats in inches.    | [optional]              |
| **$bottom_margin** | **float**  | Bottom resulting margin in pixel. For PDF, XPS or DOC formats in inches. | [optional]              |

### Return type
**[ConversionResult](ConversionResult.md)**


[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

## **convertUrlToLocal**
> convertUrlToLocal(string $src, string $dst, ?array $options = null) : [ConversionResult](ConversionResult.md)

Convert the website to the local file.

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

$src = 'https://stallman.org/articles/anonymous-payments-thru-phones.html';
$dst = 'c:/test.pdf';
$options = null;

try {
    $result = $api_html->convertUrlToLocal($src, $dst, $options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->convertUrlToLocal: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name               | Type       | Description                                                              | Notes      |
|--------------------|------------|--------------------------------------------------------------------------|------------|
| **$src**           | **string** | Full path to the source file.                                            | html, epub |
| **$dst**           | **string** | Full path to the result file.                                            |            |
| **$options**       | **string** | Option for conversion.                                                   | [optional] |
| **$width**         | **float**  | Resulting width in pixel. For PDF, XPS or DOC formats in inches.         | [optional] |
| **$height**        | **float**  | Resulting height in pixel. For PDF, XPS or DOC formats in inches.        | [optional] |
| **$left_margin**   | **float**  | Left resulting margin in pixel. For PDF, XPS or DOC formats in inches.   | [optional] |
| **$right_margin**  | **float**  | Right resulting margin in pixel. For PDF, XPS or DOC formats in inches.  | [optional] |
| **$top_margin**    | **float**  | Top resulting margin in pixel. For PDF, XPS or DOC formats in inches.    | [optional] |
| **$bottom_margin** | **float**  | Bottom resulting margin in pixel. For PDF, XPS or DOC formats in inches. | [optional] |

### Return type
**[ConversionResult](ConversionResult.md)**


[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

## **convertUrlToStorage**
> convertUrlToStorage(string $src, string $dst, ?array $options = null) : [ConversionResult](ConversionResult.md)

Convert the website to the storage.

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

$src = 'https://stallman.org/articles/anonymous-payments-thru-phones.html';
$dst = 'FolderInStorage/test.pdf';
$options = null;

try {
    $result = $api_html->convertUrlToStorage($src, $dst, null, $options);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->convertUrlToStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name               | Type       | Description                                                              | Notes                   |
|--------------------|------------|--------------------------------------------------------------------------|-------------------------|
| **$src**           | **string** | Full path to the source file.                                            | html, epub              |
| **$dst**           | **string** | Full path to the result file.                                            |                         |
| **$storage**       | **string** | User's storage.                                                          | Null is default storage |
| **$options**       | **string** | Option for conversion.                                                   | [optional]              |
| **$width**         | **float**  | Resulting width in pixel. For PDF, XPS or DOC formats in inches.         | [optional]              |
| **$height**        | **float**  | Resulting height in pixel. For PDF, XPS or DOC formats in inches.        | [optional]              |
| **$left_margin**   | **float**  | Left resulting margin in pixel. For PDF, XPS or DOC formats in inches.   | [optional]              |
| **$right_margin**  | **float**  | Right resulting margin in pixel. For PDF, XPS or DOC formats in inches.  | [optional]              |
| **$top_margin**    | **float**  | Top resulting margin in pixel. For PDF, XPS or DOC formats in inches.    | [optional]              |
| **$bottom_margin** | **float**  | Bottom resulting margin in pixel. For PDF, XPS or DOC formats in inches. | [optional]              |

### Return type
**[ConversionResult](ConversionResult.md)**


[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

## **convert**
> convert(string $src, string $dst, bool $srcInLocal, bool $dstInLocal, bool $isUrl, ?array $options=null, ?string $storage=null) : [ConversionResult](ConversionResult.md)

General function for conversion.

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

$src = 'https://stallman.org/articles/anonymous-payments-thru-phones.html';
$dst = 'FolderInStorage/test.pdf';
$options = null;

try {
    $result = $api_html->convert($src, $dst, false, false, true, null, null);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $api_html->convert: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
| Name               | Type       | Description                                                              | Notes                   |
|--------------------|------------|--------------------------------------------------------------------------|-------------------------|
| **$src**           | **string** | Full path to the source file or url.                                     | html, epub or url       |
| **$dst**           | **string** | Full path to the result file.                                            |                         |
| **$srcInLocal**    | **bool**   | Source file on the local disk.                                           |                         |
| **$dstInLocal**    | **string** | Result file on the local disk.                                           |                         |
| **$isUrl**         | **string** | Source is the website.                                                   |                         |
| **$options**       | **string** | Option for conversion.                                                   | [optional]              |
| **$width**         | **float**  | Resulting width in pixel. For PDF, XPS or DOC formats in inches.         | [optional]              |
| **$height**        | **float**  | Resulting height in pixel. For PDF, XPS or DOC formats in inches.        | [optional]              |
| **$left_margin**   | **float**  | Left resulting margin in pixel. For PDF, XPS or DOC formats in inches.   | [optional]              |
| **$right_margin**  | **float**  | Right resulting margin in pixel. For PDF, XPS or DOC formats in inches.  | [optional]              |
| **$top_margin**    | **float**  | Top resulting margin in pixel. For PDF, XPS or DOC formats in inches.    | [optional]              |
| **$bottom_margin** | **float**  | Bottom resulting margin in pixel. For PDF, XPS or DOC formats in inches. | [optional]              |
| **$storage**       | **string** | User's storage.                                                          | Null is default storage |

### Return type
**[ConversionResult](ConversionResult.md)**


[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)
