# Client\Invoker\Api\SeoApi

All URIs are relative to *https://api.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getSeoWarning**](SeoApi.md#getSeoWarning) | **GET** /html/seo | Page analysis and return of SEO warnings in json format.
[**getHtmlWarning**](SeoApi.md#getHtmlWarning) | **GET** /html/validator | Checks the markup validity of Web documents in HTML, XHTML, etc., and return result in json format.


<a name="getSeoWarning"></a>
# **getSeoWarning**
> \SplFileObject getSeoWarning($addr)

Page analysis and return of SEO warnings in json format.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Get keys from aspose site.
// There is free quota available. 
// For more details, see https://purchase.aspose.cloud/pricing

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

$addr = "https://edition.cnn.com/"; // string | Source page URL.

try {
    $result = $apiInstance->getSeoWarning($addr);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getSeoWarning: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **addr** | **string**| Source page URL. |

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)


<a name="getHtmlWarning"></a>
# **getHtmlWarning**
> \SplFileObject getHtmlWarning($addr)

Checks the markup validity of Web documents in HTML, XHTML, etc., and return result in json format.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Get keys from aspose site.
// There is free quota available. 
// For more details, see https://purchase.aspose.cloud/pricing

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

$url = "https://edition.cnn.com/"; // string | Source page URL.

try {
    $result = $apiInstance->getHtmlWarning($addr);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getHtmlWarning: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **addr** | **string**| Source page URL. |

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)


