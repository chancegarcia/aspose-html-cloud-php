# Client\Invoker\Api\ConversionApi

All URIs are relative to *https://api.aspose.cloud/v3.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getConvertDocumentToImage**](ConversionApi.md#getConvertDocumentToImage) | **GET** /html/{name}/convert/image/{outFormat} | Convert the HTML document from the storage by its name to the specified image format.
[**getConvertDocumentToImageByUrl**](ConversionApi.md#getConvertDocumentToImageByUrl) | **GET** /html/convert/image/{outFormat} | Convert the HTML page from the web by its URL to the specified image format.
[**getConvertDocumentToPdf**](ConversionApi.md#getConvertDocumentToPdf) | **GET** /html/{name}/convert/pdf | Convert the HTML document from the storage by its name to PDF.
[**getConvertDocumentToPdfByUrl**](ConversionApi.md#getConvertDocumentToPdfByUrl) | **GET** /html/convert/pdf | Convert the HTML page from the web by its URL to PDF.
[**getConvertDocumentToXps**](ConversionApi.md#getConvertDocumentToXps) | **GET** /html/{name}/convert/xps | Convert the HTML document from the storage by its name to XPS.
[**getConvertDocumentToXpsByUrl**](ConversionApi.md#getConvertDocumentToXpsByUrl) | **GET** /html/convert/xps | Convert the HTML page from the web by its URL to XPS.
[**postConvertDocumentInRequestToImage**](ConversionApi.md#postConvertDocumentInRequestToImage) | **POST** /html/convert/image/{outFormat} | Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.
[**postConvertDocumentInRequestToPdf**](ConversionApi.md#postConvertDocumentInRequestToPdf) | **POST** /html/convert/pdf | Converts the HTML document (in request content) to PDF and uploads resulting file to storage.
[**postConvertDocumentInRequestToXps**](ConversionApi.md#postConvertDocumentInRequestToXps) | **POST** /html/convert/xps | Converts the HTML document (in request content) to XPS and uploads resulting file to storage.
[**putConvertDocumentToImage**](ConversionApi.md#putConvertDocumentToImage) | **PUT** /html/{name}/convert/image/{outFormat} | Converts the HTML document (located on storage) to the specified image format and uploads resulting file to storage.
[**putConvertDocumentToPdf**](ConversionApi.md#putConvertDocumentToPdf) | **PUT** /html/{name}/convert/pdf | Converts the HTML document (located on storage) to PDF and uploads resulting file to storage.
[**putConvertDocumentToXps**](ConversionApi.md#putConvertDocumentToXps) | **PUT** /html/{name}/convert/xps | Converts the HTML document (located on storage) to XPS and uploads resulting file to storage.
[**getConvertDocumentToMHTMLByUrl**](ConversionApi.md#getConvertDocumentToMHTMLByUrl) | **GET** /html/convert/mhtml | Converts the HTML page from Web by its URL to MHTML returns resulting file in response content.
[**getConvertDocumentToMarkdown**](ConversionApi.md#getConvertDocumentToMarkdown) | **GET** /html/{name}/convert/md | Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.
[**postConvertDocumentInRequestToMarkdown**](ConversionApi.md#postConvertDocumentInRequestToMarkdown) | **POST** /html/convert/md | Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.
[**putConvertDocumentToMarkdown**](ConversionApi.md#putConvertDocumentToMarkdown) | **PUT** /html/{name}/convert/md | Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.


<a name="getConvertDocumentToImage"></a>
# **getConvertDocumentToImage**
> \SplFileObject getConvertDocumentToImage($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage)

Convert the HTML document from the storage by its name to the specified image format.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
$resolution = 56; // int | Resolution of resulting image.
$folder = "folder_example"; // string | The source document folder.
$storage = "storage_example"; // string | The source document storage.

try {
    $result = $apiInstance->getConvertDocumentToImage($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getConvertDocumentToImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. | html, epub, svg
 **out_format** | **string**| Resulting image format. | jpeg, png, bmp, tiff, gif 
 **width** | **int**| Resulting image width. | [optional]
 **height** | **int**| Resulting image height. | [optional]
 **left_margin** | **int**| Left resulting image margin. | [optional]
 **right_margin** | **int**| Right resulting image margin. | [optional]
 **top_margin** | **int**| Top resulting image margin. | [optional]
 **bottom_margin** | **int**| Bottom resulting image margin. | [optional]
 **resolution** | **int**| Resolution of resulting image. | [optional]
 **folder** | **string**| The source document folder. | [optional]
 **storage** | **string**| The source document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getConvertDocumentToImageByUrl"></a>
# **getConvertDocumentToImageByUrl**
> \SplFileObject getConvertDocumentToImageByUrl($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage)

Convert the HTML page from the web by its URL to the specified image format.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
$resolution = 56; // int | Resolution of resulting image.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->getConvertDocumentToImageByUrl($source_url, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getConvertDocumentToImageByUrl: ', $e->getMessage(), PHP_EOL;
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
 **resolution** | **int**| Resolution of resulting image. | [optional]
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getConvertDocumentToPdf"></a>
# **getConvertDocumentToPdf**
> \SplFileObject getConvertDocumentToPdf($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML document from the storage by its name to PDF.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->getConvertDocumentToPdf($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getConvertDocumentToPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |  html, epub, svg
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getConvertDocumentToPdfByUrl"></a>
# **getConvertDocumentToPdfByUrl**
> \SplFileObject getConvertDocumentToPdfByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML page from the web by its URL to PDF.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->getConvertDocumentToPdfByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getConvertDocumentToPdfByUrl: ', $e->getMessage(), PHP_EOL;
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getConvertDocumentToXps"></a>
# **getConvertDocumentToXps**
> \SplFileObject getConvertDocumentToXps($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML document from the storage by its name to XPS.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->getConvertDocumentToXps($name, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getConvertDocumentToXps: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |  html, epub, svg
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getConvertDocumentToXpsByUrl"></a>
# **getConvertDocumentToXpsByUrl**
> \SplFileObject getConvertDocumentToXpsByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Convert the HTML page from the web by its URL to XPS.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->getConvertDocumentToXpsByUrl($source_url, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getConvertDocumentToXpsByUrl: ', $e->getMessage(), PHP_EOL;
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="postConvertDocumentInRequestToImage"></a>
# **postConvertDocumentInRequestToImage**
> \SplFileObject postConvertDocumentInRequestToImage($out_path, $out_format, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution)

Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->postConvertDocumentInRequestToImage($out_path, $out_format, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->postConvertDocumentInRequestToImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_path** | **string**| Full resulting filename (ex. /folder1/folder2/result.jpg) |
 **out_format** | **string**|  | jpeg, png, bmp, tiff, gif
 **file** | **\SplFileObject**| A file to be converted. |  html, epub, svg
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

<a name="postConvertDocumentInRequestToPdf"></a>
# **postConvertDocumentInRequestToPdf**
> \SplFileObject postConvertDocumentInRequestToPdf($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin)

Converts the HTML document (in request content) to PDF and uploads resulting file to storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->postConvertDocumentInRequestToPdf($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->postConvertDocumentInRequestToPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_path** | **string**| Full resulting filename (ex. /folder1/folder2/result.pdf) |
 **file** | **\SplFileObject**| A file to be converted. | html, epub, svg
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

<a name="postConvertDocumentInRequestToXps"></a>
# **postConvertDocumentInRequestToXps**
> \SplFileObject postConvertDocumentInRequestToXps($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin)

Converts the HTML document (in request content) to XPS and uploads resulting file to storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->postConvertDocumentInRequestToXps($out_path, $file, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->postConvertDocumentInRequestToXps: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_path** | **string**| Full resulting filename (ex. /folder1/folder2/result.xps) |
 **file** | **\SplFileObject**| A file to be converted. | html, epub, svg
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

<a name="putConvertDocumentToImage"></a>
# **putConvertDocumentToImage**
> \SplFileObject putConvertDocumentToImage($name, $out_path, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage)

Converts the HTML document (located on storage) to the specified image format and uploads resulting file to storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->putConvertDocumentToImage($name, $out_path, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->putConvertDocumentToImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. | html, epub, svg
 **out_path** | **string**| Full resulting filename (ex. /folder1/folder2/result.jpg) |
 **out_format** | **string**|  | jpeg, png, bmp, tiff, gif
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

<a name="putConvertDocumentToPdf"></a>
# **putConvertDocumentToPdf**
> \SplFileObject putConvertDocumentToPdf($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Converts the HTML document (located on storage) to PDF and uploads resulting file to storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->putConvertDocumentToPdf($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->putConvertDocumentToPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. | html, epub, svg
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

<a name="putConvertDocumentToXps"></a>
# **putConvertDocumentToXps**
> \SplFileObject putConvertDocumentToXps($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage)

Converts the HTML document (located on storage) to XPS and uploads resulting file to storage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->putConvertDocumentToXps($name, $out_path, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->putConvertDocumentToXps: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. | html, epub, svg
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getConvertDocumentToMHTMLByUrl"></a>
# **getConvertDocumentToMHTMLByUrl**
> \SplFileObject getConvertDocumentToMHTMLByUrl($source_url)


Converts the HTML page from Web by its URL to MHTML returns resulting file in response content.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->getConvertDocumentToMHTMLByUrl($source_url);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->getConvertDocumentToMHTMLByUrl: ', $e->getMessage(), PHP_EOL;
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getConvertDocumentToMarkdown"></a>
# **getConvertDocumentToMarkdown**
> \SplFileObject getConvertDocumentToMarkdown($name, $use_git, $folder, $storage)

Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->getConvertDocumentToMarkdown($name, $use_git, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->getConvertDocumentToMarkdown: ', $e->getMessage(), PHP_EOL;
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="postConvertDocumentInRequestToMarkdown"></a>
# **postConvertDocumentInRequestToMarkdown**
> \SplFileObject postConvertDocumentInRequestToMarkdown($out_path, $file, $use_git, $storage)

Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
$file = "/path/to/file.html"; // \SplFileObject | A file to be converted.
$use_git = "false"; // string ("true"/"false") | Use Git Markdown flavor to save.
$storage = "storage_example"; // string | Source document storage.

try {
    $result = $apiInstance->postConvertDocumentInRequestToMarkdown($out_path, $file, $use_git, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->postConvertDocumentInRequestToMarkdown: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_path** | **string**| Full resulting file path in the storage (ex. /folder1/folder2/result.md) |
 **file** | **\SplFileObject**| A file to be converted. |
 **use_git** | **string**| Use Git Markdown flavor to save ("true"/"false"). | [optional] [default to "false"]
 **storage** | **string**| Source document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="putConvertDocumentToMarkdown"></a>
# **putConvertDocumentToMarkdown**
> \SplFileObject putConvertDocumentToMarkdown($name, $out_path, $use_git, $folder, $storage)

Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$configuration = array(
    "basePath" => "https://api.aspose.cloud/v3.0",
    "authPath" => "https://api.aspose.cloud/connect/token",
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
    $result = $apiInstance->putConvertDocumentToMarkdown($name, $out_path, $use_git, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->putConvertDocumentToMarkdown: ', $e->getMessage(), PHP_EOL;
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

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)
