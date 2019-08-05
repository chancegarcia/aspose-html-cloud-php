# Client\Invoker\Api\DocumentApi

All URIs are relative to *https://api.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDocumentByUrl**](DocumentApi.md#getDocumentByUrl) | **GET** /html/download | Return all HTML page with linked resources packaged as a ZIP archive by the source page URL.
[**getDocumentFragmentByXPath**](DocumentApi.md#getDocumentFragmentByXPath) | **GET** /html/{name}/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query.
[**getDocumentFragmentByXPathByUrl**](DocumentApi.md#getDocumentFragmentByXPathByUrl) | **GET** /html/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query by the source page URL.
[**getDocumentFragmentsByCSSSelector**](DocumentApi.md#dgetDocumentFragmentsByCSSSelector) | **GET** /html/{name}/fragments/css/{outFormat} | Return list of HTML fragments matching the specified CSS selector.
[**getDocumentFragmentsByCSSSelectorByUrl**](DocumentApi.md#getDocumentFragmentsByCSSSelectorByUrl) | **GET** /html/fragments/css/{outFormat} | Return list of HTML fragments matching the specified CSS selector by the source page URL.
[**getDocumentImages**](DocumentApi.md#getDocumentImages) | **GET** /html/{name}/images/all | Return all HTML document images packaged as a ZIP archive.
[**getDocumentImagesByUrl**](DocumentApi.md#getDocumentImagesByUrl) | **GET** /html/images/all | Return all HTML page images packaged as a ZIP archive by the source page URL.

<a name="getDocumentByUrl"></a>
# **getDocumentByUrl**
> \SplFileObject getDocumentByUrl($source_url)

Return all HTML page with linked resources packaged as a ZIP archive by the source page URL.

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
    $result = $apiInstance->getDocumentByUrl($source_url);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getDocumentByUrl: ', $e->getMessage(), PHP_EOL;
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

 - **Content-Type**: application/json
 - **Accept**: application/zip

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getDocumentFragmentByXPath"></a>
# **getDocumentFragmentByXPath**
> \SplFileObject getDocumentFragmentByXPath($name, $x_path, $out_format, $storage, $folder)

Return list of HTML fragments matching the specified XPath query.

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

$name = "name_example"; // string | The document name.
$x_path = "x_path_example"; // string | XPath query string.
$out_format = "out_format_example"; // string | Output format. Possible values: 'plain' and 'json'.
$storage = "storage_example"; // string | The document storage.
$folder = "folder_example"; // string | The document folder.

try {
    $result = $apiInstance->getDocumentFragmentByXPath($name, $x_path, $out_format, $storage, $folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getDocumentFragmentByXPath: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| The document name. | Presented as zip archive with one html file in the root or html file.
 **x_path** | **string**| XPath query string. |
 **out_format** | **string**| Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. |
 **storage** | **string**| The document storage. | [optional]
 **folder** | **string**| The document folder. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getDocumentFragmentByXPathByUrl"></a>
# **getDocumentFragmentByXPathByUrl**
> \SplFileObject getDocumentFragmentByXPathByUrl($source_url, $x_path, $out_format)

Return list of HTML fragments matching the specified XPath query by the source page URL.

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
$x_path = "x_path_example"; // string | XPath query string.
$out_format = "out_format_example"; // string | Output format. Possible values: 'plain' and 'json'.

try {
    $result = $apiInstance->getDocumentFragmentByXPathByUrl($source_url, $x_path, $out_format);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getDocumentFragmentByXPathByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source page URL. |
 **x_path** | **string**| XPath query string. |
 **out_format** | **string**| Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. |

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/zip

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getDocumentFragmentsByCSSSelector"></a>
# **getDocumentFragmentsByCSSSelector**
> \SplFileObject getDocumentFragmentsByCSSSelector($name, $selector, $out_format, $folder, $storage)

Return list of HTML fragments matching the specified CSS selector.

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

$name = "name_example"; // string | The document name.
$selector = "selector_example"; // string | CSS selector string.
$out_format = "out_format_example"; // string | Output format. Possible values: 'plain' and 'json'.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->getDocumentFragmentsByCSSSelector($name, $selector, $out_format, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->getDocumentFragmentsByCSSSelector: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| The document name. | Presented as zip archive with one html file in the root or html file.
 **selector** | **string**| CSS selector string. |
 **out_format** | **string**| Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. |
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

<a name="getDocumentFragmentsByCSSSelectorByUrl"></a>
# **getDocumentFragmentsByCSSSelectorByUrl**
> \SplFileObject getDocumentFragmentsByCSSSelectorByUrl($source_url, $selector, $out_format)

Return list of HTML fragments matching the specified CSS selector by the source page URL.

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
$selector = "selector_example"; // string | CSS selector string.
$out_format = "out_format_example"; // string | Output format. Possible values: 'plain' and 'json'.

try {
    $result = $apiInstance->getDocumentFragmentsByCSSSelectorByUrl($source_url, $selector, $out_format);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DocumentApi->getDocumentFragmentsByCSSSelectorByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source page URL. |
 **selector** | **string**| CSS selector string. |
 **out_format** | **string**| Output format. Possible values: &#39;plain&#39; and &#39;json&#39;. |

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

<a name="getDocumentImages"></a>
# **getDocumentImages**
> \SplFileObject getDocumentImages($name, $folder, $storage)

Return all HTML document images packaged as a ZIP archive.

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

$name = "name_example"; // string | The document name.
$folder = "folder_example"; // string | The document folder.
$storage = "storage_example"; // string | The document storage.

try {
    $result = $apiInstance->getDocumentImages($name, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getDocumentImages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| The document name. | Presented as zip archive with one html file in the root.
 **folder** | **string**| The document folder. | [optional]
 **storage** | **string**| The document storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/zip

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getDocumentImagesByUrl"></a>
# **getDocumentImagesByUrl**
> \SplFileObject getDocumentImagesByUrl($source_url)

Return all HTML page images packaged as a ZIP archive by the source page URL.

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
    $result = $apiInstance->getDocumentImagesByUrl($source_url);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getDocumentImagesByUrl: ', $e->getMessage(), PHP_EOL;
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

 - **Content-Type**: application/json
 - **Accept**: application/zip

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

