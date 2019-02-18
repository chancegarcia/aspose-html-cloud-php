# Client\Invoker\Api\ConversionApi

All URIs are relative to *https://api.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**GetConvertDocumentToImage**](ConversionApi.md#GetConvertDocumentToImage) | **GET** /html/{name}/convert/image/{outFormat} | Convert the HTML document from the storage by its name to the specified image format.
[**GetConvertDocumentToImageByUrl**](ConversionApi.md#GetConvertDocumentToImageByUrl) | **GET** /html/convert/image/{outFormat} | Convert the HTML page from the web by its URL to the specified image format.
[**GetConvertDocumentToPdf**](ConversionApi.md#GetConvertDocumentToPdf) | **GET** /html/{name}/convert/pdf | Convert the HTML document from the storage by its name to PDF.
[**GetConvertDocumentToPdfByUrl**](ConversionApi.md#GetConvertDocumentToPdfByUrl) | **GET** /html/convert/pdf | Convert the HTML page from the web by its URL to PDF.
[**GetConvertDocumentToXps**](ConversionApi.md#GetConvertDocumentToXps) | **GET** /html/{name}/convert/xps | Convert the HTML document from the storage by its name to XPS.
[**GetConvertDocumentToXpsByUrl**](ConversionApi.md#GetConvertDocumentToXpsByUrl) | **GET** /html/convert/xps | Convert the HTML page from the web by its URL to XPS.
[**PutConvertDocumentInRequestToImage**](ConversionApi.md#PutConvertDocumentInRequestToImage) | **PUT** /html/convert/image/{outFormat} | Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.
[**PutConvertDocumentInRequestToPdf**](ConversionApi.md#PutConvertDocumentInRequestToPdf) | **PUT** /html/convert/pdf | Converts the HTML document (in request content) to PDF and uploads resulting file to storage.
[**PutConvertDocumentInRequestToXps**](ConversionApi.md#PutConvertDocumentInRequestToXps) | **PUT** /html/convert/xps | Converts the HTML document (in request content) to XPS and uploads resulting file to storage.
[**PutConvertDocumentToImage**](ConversionApi.md#PutConvertDocumentToImage) | **PUT** /html/{name}/convert/image/{outFormat} | Converts the HTML document (located on storage) to the specified image format and uploads resulting file to storage.
[**PutConvertDocumentToPdf**](ConversionApi.md#PutConvertDocumentToPdf) | **PUT** /html/{name}/convert/pdf | Converts the HTML document (located on storage) to PDF and uploads resulting file to storage.
[**PutConvertDocumentToXps**](ConversionApi.md#PutConvertDocumentToXps) | **PUT** /html/{name}/convert/xps | Converts the HTML document (located on storage) to XPS and uploads resulting file to storage.
[**GetConvertDocumentToMHTMLByUrl**](ConversionApi.md#GetConvertDocumentToMHTMLByUrl) | **GET** /html/convert/mhtml | Converts the HTML page from Web by its URL to MHTML returns resulting file in response content.
[**GetConvertDocumentToMarkdown**](ConversionApi.md#GetConvertDocumentToMarkdown) | **GET** /html/{name}/convert/md | Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.
[**PutConvertDocumentInRequestToMarkdown**](ConversionApi.md#PutConvertDocumentInRequestToMarkdown) | **PUT** /html/convert/md | Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.
[**PutConvertDocumentToMarkdown**](ConversionApi.md#PutConvertDocumentToMarkdown) | **PUT** /html/{name}/convert/md | Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.


# **GetConvertDocumentToImage**
> \SplFileObject GetConvertDocumentToImage($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage)

Convert the HTML document from the storage by its name to the specified image format.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$name = "name_example"; // string | Document name.
$out_format = "out_format_example"; // string | Resulting image format.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$x_resolution = 56; // int | Horizontal resolution of resulting image.
$y_resolution = 56; // int | Vertical resolution of resulting image.
$folder = "folder_example"; // string | The source document folder.
$storage = "storage_example"; // string | The source document storage.

try {
    $result = $apiInstance->GetConvertDocumentToImage($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->GetConvertDocumentToImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **out_format** | **string**| Resulting image format. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **x_resolution** | **int**| Horizontal resolution of resulting image. | [optional]
 **y_resolution** | **int**| Vertical resolution of resulting image. | [optional]
 **folder** | **string**| The source document folder. | [optional]
 **storage** | **string**| The source document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetConvertDocumentToImageByUrl**
> \SplFileObject GetConvertDocumentToImageByUrl($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage)

Convert the HTML page from the web by its URL to the specified image format.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$source_url = "source_url_example"; // string | Source page URL.
$out_format = "out_format_example"; // string | Resulting image format.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$x_resolution = 56; // int | Horizontal resolution of resulting image.
$y_resolution = 56; // int | Vertical resolution of resulting image.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->GetConvertDocumentToImageByUrl($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->GetConvertDocumentToImageByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source page URL. |
 **out_format** | **string**| Resulting image format. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **x_resolution** | **int**| Horizontal resolution of resulting image. | [optional]
 **y_resolution** | **int**| Vertical resolution of resulting image. | [optional]
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetConvertDocumentToPdf**
> \SplFileObject GetConvertDocumentToPdf($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML document from the storage by its name to PDF.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$name = "name_example"; // string | Document name.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->GetConvertDocumentToPdf($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->GetConvertDocumentToPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetConvertDocumentToPdfByUrl**
> \SplFileObject GetConvertDocumentToPdfByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML page from the web by its URL to PDF.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$source_url = "source_url_example"; // string | Source page URL.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->GetConvertDocumentToPdfByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->GetConvertDocumentToPdfByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source page URL. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetConvertDocumentToXps**
> \SplFileObject GetConvertDocumentToXps($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML document from the storage by its name to XPS.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$name = "name_example"; // string | Document name.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->GetConvertDocumentToXps($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->GetConvertDocumentToXps: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)

# **GetConvertDocumentToXpsByUrl**
> \SplFileObject GetConvertDocumentToXpsByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML page from the web by its URL to XPS.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$source_url = "source_url_example"; // string | Source page URL.
$width = 56; // int | Resulting image width.
$height = 56; // int | Resulting image height.
$left_margin = 56; // int | Left resulting image margin.
$right_margin = 56; // int | Right resulting image margin.
$top_margin = 56; // int | Top resulting image margin.
$bottom_margin = 56; // int | Bottom resulting image margin.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->GetConvertDocumentToXpsByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->GetConvertDocumentToXpsByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source page URL. |
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)


# **PutConvertDocumentInRequestToImage**
> \SplFileObject PutConvertDocumentInRequestToImage($out_path, $out_format, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution)

Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$out_path = "out_path_example"; // string | Full resulting filename (ex. /folder1/folder2/result.jpg)
$out_format = "out_format_example"; // string | 
$file = "/path/to/file.txt"; // \SplFileObject | A file to be converted.
$width = 56; // int | Resulting document page width in points (1/96 inch).
$height = 56; // int | Resulting document page height in points (1/96 inch).
$left_margin = 56; // int | Left resulting document page margin in points (1/96 inch).
$right_margin = 56; // int | Right resulting document page margin in points (1/96 inch).
$top_margin = 56; // int | Top resulting document page margin in points (1/96 inch).
$bottom_margin = 56; // int | Bottom resulting document page margin in points (1/96 inch).
$resolution = 56; // int | Resolution of resulting image. Default is 96 dpi.

try {
    $result = $apiInstance->PutConvertDocumentInRequestToImage($out_path, $out_format, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->PutConvertDocumentInRequestToImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_path** | **string**| Full resulting filename (ex. /folder1/folder2/result.jpg) |
 **out_format** | **string**|  |
 **file** | **\SplFileObject**| A file to be converted. |
 **width** | **int**| Resulting document page width in points (1/96 inch). | [optional]
 **height** | **int**| Resulting document page height in points (1/96 inch). | [optional]
 **left_margin** | **int**| Left resulting document page margin in points (1/96 inch). | [optional]
 **right_margin** | **int**| Right resulting document page margin in points (1/96 inch). | [optional]
 **top_margin** | **int**| Top resulting document page margin in points (1/96 inch). | [optional]
 **bottom_margin** | **int**| Bottom resulting document page margin in points (1/96 inch). | [optional]
 **resolution** | **int**| Resolution of resulting image. Default is 96 dpi. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

# **PutConvertDocumentInRequestToPdf**
> \SplFileObject PutConvertDocumentInRequestToPdf($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin)

Converts the HTML document (in request content) to PDF and uploads resulting file to storage.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$out_path = "out_path_example"; // string | Full resulting filename (ex. /folder1/folder2/result.pdf)
$file = "/path/to/file.txt"; // \SplFileObject | A file to be converted.
$width = 56; // int | Resulting document page width in points (1/96 inch).
$height = 56; // int | Resulting document page height in points (1/96 inch).
$left_margin = 56; // int | Left resulting document page margin in points (1/96 inch).
$right_margin = 56; // int | Right resulting document page margin in points (1/96 inch).
$top_margin = 56; // int | Top resulting document page margin in points (1/96 inch).
$bottom_margin = 56; // int | Bottom resulting document page margin in points (1/96 inch).

try {
    $result = $apiInstance->PutConvertDocumentInRequestToPdf($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->PutConvertDocumentInRequestToPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_path** | **string**| Full resulting filename (ex. /folder1/folder2/result.pdf) |
 **file** | **\SplFileObject**| A file to be converted. |
 **width** | **int**| Resulting document page width in points (1/96 inch). | [optional]
 **height** | **int**| Resulting document page height in points (1/96 inch). | [optional]
 **left_margin** | **int**| Left resulting document page margin in points (1/96 inch). | [optional]
 **right_margin** | **int**| Right resulting document page margin in points (1/96 inch). | [optional]
 **top_margin** | **int**| Top resulting document page margin in points (1/96 inch). | [optional]
 **bottom_margin** | **int**| Bottom resulting document page margin in points (1/96 inch). | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

# **PutConvertDocumentInRequestToXps**
> \SplFileObject PutConvertDocumentInRequestToXps($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin)

Converts the HTML document (in request content) to XPS and uploads resulting file to storage.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$out_path = "out_path_example"; // string | Full resulting filename (ex. /folder1/folder2/result.xps)
$file = "/path/to/file.txt"; // \SplFileObject | A file to be converted.
$width = 56; // int | Resulting document page width in points (1/96 inch).
$height = 56; // int | Resulting document page height in points (1/96 inch).
$left_margin = 56; // int | Left resulting document page margin in points (1/96 inch).
$right_margin = 56; // int | Right resulting document page margin in points (1/96 inch).
$top_margin = 56; // int | Top resulting document page margin in points (1/96 inch).
$bottom_margin = 56; // int | Bottom resulting document page margin in points (1/96 inch).

try {
    $result = $apiInstance->PutConvertDocumentInRequestToXps($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->PutConvertDocumentInRequestToXps: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_path** | **string**| Full resulting filename (ex. /folder1/folder2/result.xps) |
 **file** | **\SplFileObject**| A file to be converted. |
 **width** | **int**| Resulting document page width in points (1/96 inch). | [optional]
 **height** | **int**| Resulting document page height in points (1/96 inch). | [optional]
 **left_margin** | **int**| Left resulting document page margin in points (1/96 inch). | [optional]
 **right_margin** | **int**| Right resulting document page margin in points (1/96 inch). | [optional]
 **top_margin** | **int**| Top resulting document page margin in points (1/96 inch). | [optional]
 **bottom_margin** | **int**| Bottom resulting document page margin in points (1/96 inch). | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

# **PutConvertDocumentToImage**
> \SplFileObject PutConvertDocumentToImage($name, $out_path, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage)

Converts the HTML document (located on storage) to the specified image format and uploads resulting file to storage.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$name = "name_example"; // string | Document name.
$out_path = "out_path_example"; // string | Full resulting filename (ex. /folder1/folder2/result.jpg)
$out_format = "out_format_example"; // string | 
$width = 56; // int | Resulting document page width in points (1/96 inch).
$height = 56; // int | Resulting document page height in points (1/96 inch).
$left_margin = 56; // int | Left resulting document page margin in points (1/96 inch).
$right_margin = 56; // int | Right resulting document page margin in points (1/96 inch).
$top_margin = 56; // int | Top resulting document page margin in points (1/96 inch).
$bottom_margin = 56; // int | Bottom resulting document page margin in points (1/96 inch).
$resolution = 56; // int | Resolution of resulting image. Default is 96 dpi.
$folder = "folder_example"; // string | The source document folder.
$storage = "storage_example"; // string | The source and resulting document storage.

try {
    $result = $apiInstance->PutConvertDocumentToImage($name, $out_path, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->PutConvertDocumentToImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **out_path** | **string**| Full resulting filename (ex. /folder1/folder2/result.jpg) |
 **out_format** | **string**|  |
 **width** | **int**| Resulting document page width in points (1/96 inch). | [optional]
 **height** | **int**| Resulting document page height in points (1/96 inch). | [optional]
 **left_margin** | **int**| Left resulting document page margin in points (1/96 inch). | [optional]
 **right_margin** | **int**| Right resulting document page margin in points (1/96 inch). | [optional]
 **top_margin** | **int**| Top resulting document page margin in points (1/96 inch). | [optional]
 **bottom_margin** | **int**| Bottom resulting document page margin in points (1/96 inch). | [optional]
 **resolution** | **int**| Resolution of resulting image. Default is 96 dpi. | [optional]
 **folder** | **string**| The source document folder. | [optional]
 **storage** | **string**| The source and resulting document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

# **PutConvertDocumentToPdf**
> \SplFileObject PutConvertDocumentToPdf($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Converts the HTML document (located on storage) to PDF and uploads resulting file to storage.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$name = "name_example"; // string | Document name.

$out_path = "out_path_example"; // string | Full resulting filename (ex. /folder1/folder2/result.pdf)
$width = 56; // int | Resulting document page width in points (1/96 inch).
$height = 56; // int | Resulting document page height in points (1/96 inch).
$left_margin = 56; // int | Left resulting document page margin in points (1/96 inch).
$right_margin = 56; // int | Right resulting document page margin in points (1/96 inch).
$top_margin = 56; // int | Top resulting document page margin in points (1/96 inch).
$bottom_margin = 56; // int | Bottom resulting document page margin in points (1/96 inch).
$folder = "folder_example"; // string | The source document folder.
$storage = "storage_example"; // string | The source and resulting document storage.

try {
    $result = $apiInstance->PutConvertDocumentToPdf($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->PutConvertDocumentToPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **out_path** | **string**| Full resulting filename (ex. /folder1/folder2/result.pdf) |
 **width** | **int**| Resulting document page width in points (1/96 inch). | [optional]
 **height** | **int**| Resulting document page height in points (1/96 inch). | [optional]
 **left_margin** | **int**| Left resulting document page margin in points (1/96 inch). | [optional]
 **right_margin** | **int**| Right resulting document page margin in points (1/96 inch). | [optional]
 **top_margin** | **int**| Top resulting document page margin in points (1/96 inch). | [optional]
 **bottom_margin** | **int**| Bottom resulting document page margin in points (1/96 inch). | [optional]
 **folder** | **string**| The source document folder. | [optional]
 **storage** | **string**| The source and resulting document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

# **PutConvertDocumentToXps**
> \SplFileObject PutConvertDocumentToXps($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Converts the HTML document (located on storage) to XPS and uploads resulting file to storage.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$name = "name_example"; // string | Document name.
$out_path = "out_path_example"; // string | Full resulting filename (ex. /folder1/folder2/result.xps)
$width = 56; // int | Resulting document page width in points (1/96 inch).
$height = 56; // int | Resulting document page height in points (1/96 inch).
$left_margin = 56; // int | Left resulting document page margin in points (1/96 inch).
$right_margin = 56; // int | Right resulting document page margin in points (1/96 inch).
$top_margin = 56; // int | Top resulting document page margin in points (1/96 inch).
$bottom_margin = 56; // int | Bottom resulting document page margin in points (1/96 inch).
$folder = "folder_example"; // string | The source document folder.
$storage = "storage_example"; // string | The source and resulting document storage.

try {
    $result = $apiInstance->PutConvertDocumentToXps($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->PutConvertDocumentToXps: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **out_path** | **string**| Full resulting filename (ex. /folder1/folder2/result.xps) |
 **width** | **int**| Resulting document page width in points (1/96 inch). | [optional]
 **height** | **int**| Resulting document page height in points (1/96 inch). | [optional]
 **left_margin** | **int**| Left resulting document page margin in points (1/96 inch). | [optional]
 **right_margin** | **int**| Right resulting document page margin in points (1/96 inch). | [optional]
 **top_margin** | **int**| Top resulting document page margin in points (1/96 inch). | [optional]
 **bottom_margin** | **int**| Bottom resulting document page margin in points (1/96 inch). | [optional]
 **folder** | **string**| The source document folder. | [optional]
 **storage** | **string**| The source and resulting document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)


# **GetConvertDocumentToMHTMLByUrl**
> \SplFileObject GetConvertDocumentToMHTMLByUrl($source_url)


Converts the HTML page from Web by its URL to MHTML returns resulting file in response content.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$source_url = "source_url_example"; // string | Source page URL.

try {
    $result = $apiInstance->GetConvertDocumentToMHTMLByUrl($source_url);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->conversionGetConvertDocumentToMHTMLByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source page URL. |

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)


# **GetConvertDocumentToMarkdown**
> \SplFileObject GetConvertDocumentToMarkdown($name, $use_git, $folder, $storage)

Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$name = "name_example"; // string | Document name.
$use_git = "false"; // string ("true"/"false") | Use Git Markdown flavor to save.
$folder = "folder_example"; // string | Source document folder.
$storage = "storage_example"; // string | Source document storage.

try {
    $result = $apiInstance->GetConvertDocumentToMarkdown($name, $use_git, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->GetConvertDocumentToMarkdown: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **use_git** | **string**| Use Git Markdown flavor to save ("true"/"false"). | [optional] [default to "false"]
 **folder** | **string**| Source document folder. | [optional]
 **storage** | **string**| Source document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)


# **PutConvertDocumentInRequestToMarkdown**
> \SplFileObject PutConvertDocumentInRequestToMarkdown($out_path, $file, $use_git)

Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$out_path = "out_path_example"; // string | Full resulting file path in the storage (ex. /folder1/folder2/result.md)
$file = "/path/to/file.txt"; // \SplFileObject | A file to be converted.
$use_git = "false"; // string ("true"/"false") | Use Git Markdown flavor to save.

try {
    $result = $apiInstance->PutConvertDocumentInRequestToMarkdown($out_path, $file, $use_git);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->PutConvertDocumentInRequestToMarkdown: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_path** | **string**| Full resulting file path in the storage (ex. /folder1/folder2/result.md) |
 **file** | **\SplFileObject**| A file to be converted. |
 **use_git** | **string**| Use Git Markdown flavor to save ("true"/"false"). | [optional] [default to "false"]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)


# **PutConvertDocumentToMarkdown**
> \SplFileObject PutConvertDocumentToMarkdown($name, $out_path, $use_git, $folder, $storage)

Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.

### Example
```php
<?php
require_once(__DIR__ . '/vendorequire_once(__DIR__ . '/vendor/autoload.php');

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

$apiInstance = new Client\Invoker\Api\HtmlApi($configuration);

$name = "name_example"; // string | Document name.
$out_path = "out_path_example"; // string | Full resulting file path in the storage (ex. /folder1/folder2/result.md)
$use_git = "false"; // string ("true"/"false") | Use Git Markdown flavor to save .
$folder = "folder_example"; // string | The source document folder.
$storage = "storage_example"; // string | The source and resulting document storage.

try {
    $result = $apiInstance->PutConvertDocumentToMarkdown($name, $out_path, $use_git, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->PutConvertDocumentToMarkdown: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **out_path** | **string**| Full resulting file path in the storage (ex. /folder1/folder2/result.md) |
 **use_git** | **string**| Use Git Markdown flavor to save ("true"/"false"). | [optional] [default to "false"]
 **folder** | **string**| The source document folder. | [optional]
 **storage** | **string**| The source and resulting document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)  [[Back to README]](../../README.md)


