# Client\Invoker\TemplateMergeApi

All URIs are relative to *https://api-qa.aspose.cloud/v1.1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getMergeHtmlTemplate**](TemplateMergeApi.md#getMergeHtmlTemplate) | **GET** /html/{templateName}/merge | Populate HTML document template with data located as a file in the storage.
[**postMergeHtmlTemplate**](TemplateMergeApi.md#postMergeHtmlTemplate) | **POST** /html/{templateName}/merge | Populate HTML document template with data from the request body. Result document will be saved to storage.

<a name="getMergeHtmlTemplate"></a>
# **getMergeHtmlTemplate**
> \SplFileObject getMergeHtmlTemplate($template_name, $data_path, $options, $folder, $storage)

Populate HTML document template with data located as a file in the storage.

### Example

#### Template file HtmlTemplate.html

```html
<html>
     <head>
          <title>{{Title}}</title>
          <meta charset="utf-8" />
     </head>
     <body>
          <div>
               <p>Name: {{Name}} {{Surname}}</p>
               <p>Address: {{Address.Number}}, {{Address.Street}}, {{Address.City}}</p>
          </div>
      </body>
</html>
```

#### Data file XmlSourceData.xml
```xml
<?xml version="1.0" encoding="utf-8" ?>
<Data>
	<Title>Test</Title>
	<Person>
		<Name>John</Name>
		<Surname>Smith</Surname>
		<Address>
			<Number>200</Number>
			<Street>Austin rd.</Street>
			<City>Dallas</City>
		</Address>
	</Person>
	<Person>
		<Name>Jack</Name>
		<Surname>Fox</Surname>
		<Address>
			<Number>25</Number>
			<Street>Broadway</Street>
			<City>New York</City>
		</Address>
	</Person>
	<Person>
		<Name>Sherlock</Name>
		<Surname>Holmes</Surname>
		<Address>
			<Number>65</Number>
			<Street>Baker str.</Street>
			<City>London</City>
		</Address>
	</Person>
</Data>
```

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

$template_name = "template_name_example"; // string | Template document name. Template document is HTML or zipped HTML.
$data_path = "HtmlTestDoc/XmlSourceData.xml"; // string | Data source file path in the storage. Supported data format: XML
$options = ""; // string | Template merge options: reserved for further implementation.
$folder = "HtmlTestDoc"; // string | The template document folder.
$storage = null; // string | The template document and data source storage.

try {
    $result = $apiInstance->getMergeHtmlTemplate($template_name, $data_path, $options, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TemplateMergeApi->getMergeHtmlTemplate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template_name** | **string**| Template document name. Template document is HTML or zipped HTML. |
 **data_path** | **string**| Data source file path in the storage. Supported data format: XML |
 **options** | **string**| Template merge options: reserved for further implementation. | [optional]
 **folder** | **string**| The template document folder. | [optional]
 **storage** | **string**| The template document and data source storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: multipart/form-data

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

<a name="postMergeHtmlTemplate"></a>
# **postMergeHtmlTemplate**
> \SplFileObject postMergeHtmlTemplate($template_name, $out_path, $file, $options, $folder, $storage)

Populate HTML document template with data from the request body. Result document will be saved to storage.

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

$template_name = "HtmlTemplate.html"; // string | Template document name. Template document is HTML or zipped HTML.
$out_path = "/HtmlTestDoc/ResultFileName.html"; // string | Result document path.
$file = "/path/to/XmlSourceData.xml"; // \SplFileObject | A data file to populate template.
$options = ""; // string | Template merge options: reserved for further implementation.
$folder = "HtmlTestDoc"; // string | The template document folder.
$storage = null; // string | The template document and data source storage.

try {
    $result = $apiInstance->postMergeHtmlTemplate($template_name, $out_path, $file, $options, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling Api->postMergeHtmlTemplate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **template_name** | **string**| Template document name. Template document is HTML or zipped HTML. |
 **out_path** | **string**| Result document path. |
 **file** | **\SplFileObject**| A data file to populate template. |
 **options** | **string**| Template merge options: reserved for further implementation. | [optional]
 **folder** | **string**| The template document folder. | [optional]
 **storage** | **string**| The template document and data source storage. | [optional]

### Return type

**\SplFileObject**

### HTTP request headers

 - **Content-Type**: application/octet-stream
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

