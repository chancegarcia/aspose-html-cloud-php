# Client\Invoker\Api\SummarizationApi

All URIs are relative to *https://api.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDetectHtmlKeywords**](SummarizationApi.md#getDetectHtmlKeywords) | **GET** /html/{name}/summ/keywords | Get the HTML document keywords using the keyword detection service.
[**getDetectHtmlKeywordsByUrl**](SummarizationApi.md#getDetectHtmlKeywordsByUrl) | **GET** /html/summ/keywords | Get the keywords from HTML document from Web specified by its URL using the keyword detection service

<a name="getDetectHtmlKeywords"></a>
# **getDetectHtmlKeywords**
> \SplFileObject getDetectHtmlKeywords($name, $folder, $storage)

Get the HTML document keywords using the keyword detection service.

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
$folder = "folder_example"; // string | Document folder.
$storage = "storage_example"; // string | Document storage.

try {
    $result = $apiInstance->getDetectHtmlKeywords($name, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getDetectHtmlKeywords: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. | Html file in the storage.
 **folder** | **string**| Document folder. | [optional]
 **storage** | **string**| Document storage. | [optional]

### Return type

**\SplFileObject**


### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getDetectHtmlKeywordsByUrl"></a>
# **getDetectHtmlKeywordsByUrl**
> \SplFileObject getDetectHtmlKeywordsByUrl($source_url)

Get the keywords from HTML document from Web specified by its URL using the keyword detection service

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

$source_url = "source_url_example"; // string | Source document URL.

try {
    $result = $apiInstance->getDetectHtmlKeywordsByUrl($source_url);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getDetectHtmlKeywordsByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source document URL. |

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

