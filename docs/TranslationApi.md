# Client\Invoker\Api\TranslationApi

All URIs are relative to *https://api.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTranslateDocument**](TranslationApi.md#getTranslateDocument) | **GET** /html/{name}/translate/{srcLang}/{resLang} | Translate the HTML document specified by the name from default or specified storage.
[**getTranslateDocumentByUrl**](TranslationApi.md#getTranslateDocumentByUrl) | **GET** /html/translate/{srcLang}/{resLang} | Translate the HTML document from Web specified by its URL.

<a name="getTranslateDocument"></a>
# **getTranslateDocument**
> \SplFileObject getTranslateDocument($name, $src_lang, $res_lang, $storage, $folder)

Translate the HTML document specified by the name from default or specified storage.    
Allowed values for language pairs is en-de, en-fr, en-ru, de-en, ru-en, en-zh, zh-en.

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
$src_lang = "src_lang_example"; // string | Source language.
$res_lang = "res_lang_example"; // string | Result language.
$storage = "storage_example"; // string | The source document storage.
$folder = "folder_example"; // string | The source document folder.

try {
    $result = $apiInstance->getTranslateDocument($name, $src_lang, $res_lang, $storage, $folder);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getTranslateDocument: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Document name. | Html file in the storage.
 **src_lang** | **string**| Source language. | Allowed values is "en" (alias "eng", "english"), "de" (alias "deu", "deutsch", "german"), "fr" (alias "fra", "french"), "ru" (alias "rus", "russian"), "zh", alias ("chinese").
 **res_lang** | **string**| Result language. | Allowed values is "en" (alias "eng", "english"), "de" (alias "deu", "deutsch", "german"), "fr" (alias "fra", "french"), "ru" (alias "rus", "russian"), "zh", alias ("chinese").
 **storage** | **string**| The source document storage. | [optional]
 **folder** | **string**| The source document folder. | [optional]

### Return type

**\SplFileObject**   

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints)  [[Back to README]](../README.md)

<a name="getTranslateDocumentByUrl"></a>
# **getTranslateDocumentByUrl**
> \SplFileObject getTranslateDocumentByUrl($source_url, $src_lang, $res_lang)

Translate the HTML document from Web specified by its URL.    
Allowed values for language pairs is en-de, en-fr, en-ru, de-en, ru-en, en-zh, zh-en.

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
$src_lang = "src_lang_example"; // string | Source language.
$res_lang = "res_lang_example"; // string | Result language.

try {
    $result = $apiInstance->getTranslateDocumentByUrl($source_url, $src_lang, $res_lang);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling $apiInstance->getTranslateDocumentByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **source_url** | **string**| Source document URL. |
 **src_lang** | **string**| Source language. | Allowed values is "en" (alias "eng", "english"), "de" (alias "deu", "deutsch", "german"), "fr" (alias "fra", "french"), "ru" (alias "rus", "russian"), "zh", alias ("chinese").
 **res_lang** | **string**| Result language. | Allowed values is "en" (alias "eng", "english"), "de" (alias "deu", "deutsch", "german"), "fr" (alias "fra", "french"), "ru" (alias "rus", "russian"), "zh", alias ("chinese").

### Return type

**\SplFileObject**   

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

