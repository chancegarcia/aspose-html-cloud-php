# Client\Invoker\Api\ImportApi

All URIs are relative to *https://api.aspose.cloud/v3.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getConvertMarkdownToHtml**](ConversionApi.md#getConvertMarkdownToHtml) | **GET** /html/{name}/import/md | Converts the Markdown document (located on storage) to HTML and returns resulting file in response content.
[**postConvertMarkdownInRequestToHtml**](ConversionApi.md#postConvertMarkdownInRequestToHtml) | **POST** /html/import/md | Converts the Markdown document (in request content) to HTML and uploads resulting file to storage by specified path.
[**putConvertMarkdownToHtml**](ConversionApi.md#putConvertMarkdownToHtml) | **PUT** /html/{name}/import/md | Converts the Markdown document (located on storage) to HTML and uploads resulting file to storage by specified path.

<a name="getConvertMarkdownToHtml"></a>
# **getConvertMarkdownToHtml**
> \SplFileObject getConvertMarkdownToHtml($name, $folder, $storage)

Converts the Markdown document (located on storage) to HTML and returns resulting file in response content.

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
$folder = "folder_example"; // string | Source document folder.
$storage = "storage_example"; // string | Source document storage.

try {
    $result = $apiInstance->getConvertMarkdownToHtml($name, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->getConvertMarkdownToHtml: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **folder** | **string**| Source document folder. | [optional]
 **storage** | **string**| Source document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="postConvertMarkdownInRequestToHtml"></a>
# **postConvertMarkdownInRequestToHtml**
> \SplFileObject postConvertMarkdownInRequestToHtml($out_path, $file, $storage)

Converts the Markdown document (in request content) to HTML and uploads resulting file to storage by specified path.

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

$out_path = "out_path_example"; // string | Full resulting file path in the storage (ex. /folder1/folder2/result.html)
$file = "/path/to/file.md"; // \SplFileObject | A file to be converted.
$storage = "storage_example"; // string | Source document storage.

try {
    $result = $apiInstance->postConvertMarkdownInRequestToHtml($out_path, $file, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->postConvertMarkdownInRequestToHtml: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **out_path** | **string**| Full resulting file path in the storage (ex. /folder1/folder2/result.html) |
 **file** | **\SplFileObject**| A file to be converted. |
 **storage** | **string**| Source document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: multipart/form-data
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="putConvertMarkdownToHtml"></a>
# **putConvertMarkdownToHtml**
> \SplFileObject putConvertMarkdownToHtml($name, $folder, $storage)

Converts the Markdown document (located on storage) to HTML and uploads resulting file to storage by specified path.

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
$out_path = "out_path_example"; // string | Full resulting file path in the storage (ex. /folder1/folder2/result.html)
$folder = "folder_example"; // string | The source document folder.
$storage = "storage_example"; // string | The source and resulting document storage.

try {
    $result = $apiInstance->putConvertMarkdownToHtml($name, $out_path, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConversionApi->putConvertMarkdownToHtml: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. |
 **out_path** | **string**| Full resulting file path in the storage (ex. /folder1/folder2/result.html) |
 **folder** | **string**| The source document folder. | [optional]
 **storage** | **string**| The source and resulting document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)
