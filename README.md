# Aspose HTML Cloud SDK 

This repository contains Aspose.HTML Cloud SDK source code. This SDK allows you to work with Aspose.HTML Cloud REST APIs in your applications quickly and easily.

See [API Reference](https://apireference.aspose.cloud/html/) for full API specification.

## How to use the SDK?
The complete source code is available in this repository folder, you can either directly use it in your project.

## Requirements

PHP 5.5 and later

### Prerequisites

To use Aspose HTML for Cloud SDK you need to register an account with [Aspose Cloud](https://www.aspose.cloud/) and lookup/create App Key and SID at [Cloud Dashboard](https://dashboard.aspose.cloud/#/apps). There is free quota available. For more details, see [Aspose Cloud Pricing](https://purchase.aspose.cloud/pricing).


## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/aspose-html-cloud/aspose-html-cloud-php.git"
    }
  ],
  "require": {
    "aspose-html-cloud/aspose-html-cloud-php": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/aspose-html-cloud-php/vendor/autoload.php');
```

## Getting Started

Before fill all fields in /setting/config.json   

Example:   
```json
{
    "basePath":"https://api.aspose.cloud/v1.1",
    "authPath":"https://api.aspose.cloud/oauth2/token",
    "apiKey":"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    "appSID":"XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
    "testResult":"\\testresult\\",
    "testData":"\\testdata\\",
	"remoteFolder":"HtmlTestDoc",
	"defaultUserAgent":"Webkit",
	"debugFile":"php://output",
	"debug":false
}
```

or pass configuration to constructor (see in tests - BaseTest.php) 

```php
        $configuration = array(
            "basePath" => "https://api-qa.aspose.cloud/v1.1",
            "authPath" => "https://api-qa.aspose.cloud/oauth2/token",
            "apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
            "appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
            "testResult" => "\\testresult\\",
            "testData" => "\\testdata\\",
            "remoteFolder" => "HtmlTestDoc",
            "defaultUserAgent" => "Webkit",
            "debugFile" => "php://output",
            "debug" => false
        };
            
            self::$api = new HtmlApi($configuration);

// Storage api for upload data to remove storage (see tests)           
            $storage_cfg = new \Aspose\Storage\Configuration();
            $storage_cfg->setAppKey($configuration['apiKey'])->
                setAppSid($configuration['appSID'])->
                setHost("https://api-qa.aspose.cloud/");

            self::$storage = new StorageApi($storage_cfg);

// optional for test
            self::$testFolder = realpath(__DIR__ . '/../..') . $configuration['testData'];
            self::$testResult = realpath(__DIR__ . '/../..') . $configuration['testResult'];
```

###Note: do not forget to add in php.ini
```code
...
upload_max_filesize = 200M
...
curl.cainfo = "path_to_cert\cacert.pem"
...
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```


Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Client\Invoker\Api\HtmlApi();

$name = "name_example"; // string | Document name.
$out_format = "png"; // string | Resulting image format.
$width = 800; // int | Resulting image width.
$height = 1000; // int | Resulting image height.
$left_margin = 10; // int | Left resulting image margin.
$right_margin = 10; // int | Right resulting image margin.
$top_margin = 10; // int | Top resulting image margin.
$bottom_margin = 10; // int | Bottom resulting image margin.
$x_resolution = 300; // int | Horizontal resolution of resulting image.
$y_resolution = 300; // int | Vertical resolution of resulting image.
$folder = "folder_example"; // string | The source document folder.
$storage = "storage_example"; // string | The source document storage.

try {
    $result = $apiInstance->GetConvertDocumentToImage($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $x_resolution, $y_resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HtmlApi->GetConvertDocumentToImage: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://api.aspose.cloud/v1.1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*HtmlApi* | [**GetConvertDocumentToImage**](docs/Api/ConversionApi.md#GetConvertDocumentToImage) | **GET** /html/{name}/convert/image/{outFormat} | Convert the HTML document from the storage by its name to the specified image format.
*HtmlApi* | [**GetConvertDocumentToImageByUrl**](docs/Api/ConversionApi.md#GetConvertDocumentToImageByUrl) | **GET** /html/convert/image/{outFormat} | Convert the HTML page from the web by its URL to the specified image format.
*HtmlApi* | [**GetConvertDocumentToPdf**](docs/Api/ConversionApi.md#GetConvertDocumentToPdf) | **GET** /html/{name}/convert/pdf | Convert the HTML document from the storage by its name to PDF.
*HtmlApi* | [**GetConvertDocumentToPdfByUrl**](docs/Api/ConversionApi.md#GetConvertDocumentToPdfByUrl) | **GET** /html/convert/pdf | Convert the HTML page from the web by its URL to PDF.
*HtmlApi* | [**GetConvertDocumentToXps**](docs/Api/ConversionApi.md#GetConvertDocumentToXps) | **GET** /html/{name}/convert/xps | Convert the HTML document from the storage by its name to XPS.
*HtmlApi* | [**GetConvertDocumentToXpsByUrl**](docs/Api/ConversionApi.md#GetConvertDocumentToXpsByUrl) | **GET** /html/convert/xps | Convert the HTML page from the web by its URL to XPS.
*HtmlApi* | [**PutConvertDocumentInRequestToImage**](docs/Api/ConversionApi.md#PutConvertDocumentInRequestToImage) | **PUT** /html/convert/image/{outFormat} | Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.
*HtmlApi* | [**PutConvertDocumentInRequestToPdf**](docs/Api/ConversionApi.md#PutConvertDocumentInRequestToPdf) | **PUT** /html/convert/pdf | Converts the HTML document (in request content) to PDF and uploads resulting file to storage.
*HtmlApi* | [**PutConvertDocumentInRequestToXps**](docs/Api/ConversionApi.md#PutConvertDocumentInRequestToXps) | **PUT** /html/convert/xps | Converts the HTML document (in request content) to XPS and uploads resulting file to storage.
*HtmlApi* | [**PutConvertDocumentToImage**](docs/Api/ConversionApi.md#PutConvertDocumentToImage) | **PUT** /html/{name}/convert/image/{outFormat} | Converts the HTML document (located on storage) to the specified image format and uploads resulting file to storage.
*HtmlApi* | [**PutConvertDocumentToPdf**](docs/Api/ConversionApi.md#PutConvertDocumentToPdf) | **PUT** /html/{name}/convert/pdf | Converts the HTML document (located on storage) to PDF and uploads resulting file to storage.
*HtmlApi* | [**PutConvertDocumentToXps**](docs/Api/ConversionApi.md#PutConvertDocumentToXps) | **PUT** /html/{name}/convert/xps | Converts the HTML document (located on storage) to XPS and uploads resulting file to storage.
*HtmlApi* | [**GetConvertDocumentToMHTMLByUrl**](docs/Api/ConversionApi.md#GetConvertDocumentToMHTMLByUrl) | **GET** /html/convert/mhtml | Converts the HTML page from Web by its URL to MHTML returns resulting file in response content.
*HtmlApi* | [**GetConvertDocumentToMarkdown**](docs/Api/ConversionApi.md#GetConvertDocumentToMarkdown) | **GET** /html/{name}/convert/md | Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.
*HtmlApi* | [**PutConvertDocumentInRequestToMarkdown**](docs/Api/ConversionApi.md#PutConvertDocumentInRequestToMarkdown) | **PUT** /html/convert/md | Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.
*HtmlApi* | [**PutConvertDocumentToMarkdown**](docs/Api/ConversionApi.md#PutConvertDocumentToMarkdown) | **PUT** /html/{name}/convert/md | Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.
*HtmlApi* | [**GetDocumentFragmentByXPath**](docs/Api/DocumentApi.md#GetDocumentFragmentByXPath) | **GET** /html/{name}/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query.
*HtmlApi* | [**GetDocumentByUrl**](docs/Api/DocumentApi.md#GetDocumentByUrl) | **GET** /html/download | Return all HTML page with linked resources packaged as a ZIP archive by the source page URL.
*HtmlApi* | [**GetDocumentFragmentByXPathByUrl**](docs/Api/DocumentApi.md#GetDocumentFragmentByXPathByUrl) | **GET** /html/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query by the source page URL.
*HtmlApi* | [**GetDocumentFragmentsByCSSSelector**](docs/Api/DocumentApi.md#GetDocumentFragmentsByCSSSelector) | **GET** /html/{name}/fragments/css/{outFormat} | Return list of HTML fragments matching the specified CSS selector.
*HtmlApi* | [**GetDocumentFragmentsByCSSSelectorByUrl**](docs/Api/DocumentApi.md#GetDocumentFragmentsByCSSSelectorByUrl) | **GET** /html/fragments/css/{outFormat} | Return list of HTML fragments matching the specified CSS selector by the source page URL.
*HtmlApi* | [**GetDocumentImages**](docs/Api/DocumentApi.md#GetDocumentImages) | **GET** /html/{name}/images/all | Return all HTML document images packaged as a ZIP archive.
*HtmlApi* | [**GetDocumentImagesByUrl**](docs/Api/DocumentApi.md#GetDocumentImagesByUrl) | **GET** /html/images/all | Return all HTML page images packaged as a ZIP archive by the source page URL.
*HtmlApi* | [**GetRecognizeAndImportToHtml**](docs/Api/OcrApi.md#GetRecognizeAndImportToHtml) | **GET** /html/{name}/ocr/import | Recognize text from the image file in the storage and import it to HTML format.
*HtmlApi* | [**GetRecognizeAndTranslateToHtml**](docs/Api/OcrApi.md#GetRecognizeAndTranslateToHtml) | **GET** /html/{name}/ocr/translate/{srcLang}/{resLang} | Recognize text from the image file in the storage, import it to HTML format and translate to specified language.
*HtmlApi* | [**GetTranslateDocument**](docs/Api/TranslationApi.md#GetTranslateDocument) | **GET** /html/{name}/translate/{srcLang}/{resLang} | Translate the HTML document specified by the name from default or specified storage.
*HtmlApi* | [**GetTranslateDocumentByUrl**](docs/Api/TranslationApi.md#GetTranslateDocumentByUrl) | **GET** /html/translate/{srcLang}/{resLang} | Translate the HTML document from Web specified by its URL.
*HtmlApi* | [**GetDetectHtmlKeywords**](docs/Api/SummarizationApi.md#GetDetectHtmlKeywords) | **GET** /html/{name}/summ/keywords | Get the HTML document keywords using the keyword detection service.
*HtmlApi* | [**GetDetectHtmlKeywordsByUrl**](docs/Api/SummarizationApi.md#GetDetectHtmlKeywordsByUrl) | **GET** /html/summ/keywords | Get the keywords from HTML document from Web specified by its URL using the keyword detection service
*HtmlApi* | [**GetMergeHtmlTemplate**](docs/Api/TemplateMergeApi.md#GetMergeHtmlTemplate) | **GET** /html/{templateName}/merge | Populate HTML document template with data located as a file in the storage.
*HtmlApi* | [**PutMergeHtmlTemplate**](docs/Api/TemplateMergeApi.md#PutMergeHtmlTemplate) | **PUT** /html/{templateName}/merge | Populate HTML document template with data from the request body. Result document will be saved to storage.


## Documentation For Authorization

## oauth

- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: "https://api.aspose.cloud/oauth2/token"
- **Scopes**: N/A

### Examples
Test uses [StorageApi](https://github.com/aspose-storage-cloud/aspose-storage-cloud-php) for upload(download) file to(from) remote storage. 

[Tests](./test/Api/) contain various examples of using the Aspose.HTML SDK.


## Author
Aspose
