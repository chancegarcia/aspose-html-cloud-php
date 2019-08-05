# Aspose HTML Cloud SDK 

This repository contains Aspose.HTML Cloud SDK source code. This SDK allows you to work with Aspose.HTML Cloud REST APIs in your applications quickly and easily.

See [API Reference](https://apireference.aspose.cloud/html/) for full API specification.

## How to use the SDK?
The complete source code is available in this repository folder, you can either directly use it in your project.

## Requirements

PHP 5.6 and later

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
    "aspose/aspose-html-cloud-php": "dev-master"
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

Example:   
Pass configuration to constructor (see in tests - BaseTest.php) 

```php
        $conf = array(
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
            
            self::$api_html = new HtmlApi($configuration);
            self::$api_stor = new StorageApi($configuration);

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

$conf = array(
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

$apiInstance = new Client\Invoker\Api\HtmlApi($conf);

$name = "name_example"; // string | Document name.
$out_format = "png"; // string | Resulting image format.
$width = 800; // int | Resulting image width.
$height = 1000; // int | Resulting image height.
$left_margin = 10; // int | Left resulting image margin.
$right_margin = 10; // int | Right resulting image margin.
$top_margin = 10; // int | Top resulting image margin.
$bottom_margin = 10; // int | Bottom resulting image margin.
$resolution = 300; // int | Resolution of resulting image.
$folder = "folder_example"; // string | The source document folder.
$storage = "storage_example"; // string | The source document storage.

try {
    $result = $apiInstance->getConvertDocumentToImage($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HtmlApi->getConvertDocumentToImage: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://api.aspose.cloud/v3.0*

<a name="html_api"></a>
## HTML API

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*HtmlApi* | [**getConvertDocumentToImage**](docs/ConversionApi.md#getConvertDocumentToImage) | **GET** /html/{name}/convert/image/{outFormat} | Convert the HTML document from the storage by its name to the specified image format.
*HtmlApi* | [**getConvertDocumentToImageByUrl**](docs/ConversionApi.md#getConvertDocumentToImageByUrl) | **GET** /html/convert/image/{outFormat} | Convert the HTML page from the web by its URL to the specified image format.
*HtmlApi* | [**getConvertDocumentToPdf**](docs/ConversionApi.md#getConvertDocumentToPdf) | **GET** /html/{name}/convert/pdf | Convert the HTML document from the storage by its name to PDF.
*HtmlApi* | [**getConvertDocumentToPdfByUrl**](docs/ConversionApi.md#getConvertDocumentToPdfByUrl) | **GET** /html/convert/pdf | Convert the HTML page from the web by its URL to PDF.
*HtmlApi* | [**getConvertDocumentToXps**](docs/ConversionApi.md#getConvertDocumentToXps) | **GET** /html/{name}/convert/xps | Convert the HTML document from the storage by its name to XPS.
*HtmlApi* | [**getConvertDocumentToXpsByUrl**](docs/ConversionApi.md#getConvertDocumentToXpsByUrl) | **GET** /html/convert/xps | Convert the HTML page from the web by its URL to XPS.
*HtmlApi* | [**postConvertDocumentInRequestToImage**](docs/ConversionApi.md#postConvertDocumentInRequestToImage) | **POST** /html/convert/image/{outFormat} | Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.
*HtmlApi* | [**postConvertDocumentInRequestToPdf**](docs/ConversionApi.md#postConvertDocumentInRequestToPdf) | **POST** /html/convert/pdf | Converts the HTML document (in request content) to PDF and uploads resulting file to storage.
*HtmlApi* | [**postConvertDocumentInRequestToXps**](docs/ConversionApi.md#postConvertDocumentInRequestToXps) | **POST** /html/convert/xps | Converts the HTML document (in request content) to XPS and uploads resulting file to storage.
*HtmlApi* | [**putConvertDocumentToImage**](docs/ConversionApi.md#putConvertDocumentToImage) | **PUT** /html/{name}/convert/image/{outFormat} | Converts the HTML document (located on storage) to the specified image format and uploads resulting file to storage.
*HtmlApi* | [**putConvertDocumentToPdf**](docs/ConversionApi.md#putConvertDocumentToPdf) | **PUT** /html/{name}/convert/pdf | Converts the HTML document (located on storage) to PDF and uploads resulting file to storage.
*HtmlApi* | [**putConvertDocumentToXps**](docs/ConversionApi.md#putConvertDocumentToXps) | **PUT** /html/{name}/convert/xps | Converts the HTML document (located on storage) to XPS and uploads resulting file to storage.
*HtmlApi* | [**getConvertDocumentToMHTMLByUrl**](docs/ConversionApi.md#getConvertDocumentToMHTMLByUrl) | **GET** /html/convert/mhtml | Converts the HTML page from Web by its URL to MHTML returns resulting file in response content.
*HtmlApi* | [**getConvertDocumentToMarkdown**](docs/ConversionApi.md#getConvertDocumentToMarkdown) | **GET** /html/{name}/convert/md | Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.
*HtmlApi* | [**postConvertDocumentInRequestToMarkdown**](docs/ConversionApi.md#postConvertDocumentInRequestToMarkdown) | **POST** /html/convert/md | Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.
*HtmlApi* | [**putConvertDocumentToMarkdown**](docs/ConversionApi.md#putConvertDocumentToMarkdown) | **PUT** /html/{name}/convert/md | Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.
*HtmlApi* | [**getConvertMarkdownToHtml**](docs/ImportApi.md#getConvertMarkdownToHtml) | **GET** /html/{name}/import/md | Converts the Markdown document (located on storage) to HTML and returns resulting file in response content.
*HtmlApi* | [**postConvertMarkdownInRequestToHtml**](docs/ImportApi.md#postConvertMarkdownInRequestToHtml) | **POST** /html/import/md | Converts the Markdown document (in request content) to HTML and uploads resulting file to storage by specified path.
*HtmlApi* | [**putConvertMarkdownToHtml**](docs/ImportApi.md#putConvertMarkdownToHtml) | **PUT** /html/{name}/import/md | Converts the Markdown document (located on storage) to HTML and uploads resulting file to storage by specified path.
*HtmlApi* | [**getDocumentFragmentByXPath**](docs/DocumentApi.md#getDocumentFragmentByXPath) | **GET** /html/{name}/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query.
*HtmlApi* | [**getDocumentByUrl**](docs/DocumentApi.md#getDocumentByUrl) | **GET** /html/download | Return all HTML page with linked resources packaged as a ZIP archive by the source page URL.
*HtmlApi* | [**getDocumentFragmentByXPathByUrl**](docs/DocumentApi.md#getDocumentFragmentByXPathByUrl) | **GET** /html/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query by the source page URL.
*HtmlApi* | [**getDocumentFragmentsByCSSSelector**](docs/DocumentApi.md#getDocumentFragmentsByCSSSelector) | **GET** /html/{name}/fragments/css/{outFormat} | Return list of HTML fragments matching the specified CSS selector.
*HtmlApi* | [**getDocumentFragmentsByCSSSelectorByUrl**](docs/DocumentApi.md#getDocumentFragmentsByCSSSelectorByUrl) | **GET** /html/fragments/css/{outFormat} | Return list of HTML fragments matching the specified CSS selector by the source page URL.
*HtmlApi* | [**getDocumentImages**](docs/DocumentApi.md#getDocumentImages) | **GET** /html/{name}/images/all | Return all HTML document images packaged as a ZIP archive.
*HtmlApi* | [**getDocumentImagesByUrl**](docs/DocumentApi.md#getDocumentImagesByUrl) | **GET** /html/images/all | Return all HTML page images packaged as a ZIP archive by the source page URL.
*HtmlApi* | [**getRecognizeAndImportToHtml**](docs/OcrApi.md#getRecognizeAndImportToHtml) | **GET** /html/{name}/ocr/import | Recognize text from the image file in the storage and import it to HTML format.
*HtmlApi* | [**getRecognizeAndTranslateToHtml**](docs/OcrApi.md#getRecognizeAndTranslateToHtml) | **GET** /html/{name}/ocr/translate/{srcLang}/{resLang} | Recognize text from the image file in the storage, import it to HTML format and translate to specified language.
*HtmlApi* | [**getTranslateDocument**](docs/TranslationApi.md#getTranslateDocument) | **GET** /html/{name}/translate/{srcLang}/{resLang} | Translate the HTML document specified by the name from default or specified storage.
*HtmlApi* | [**getTranslateDocumentByUrl**](docs/TranslationApi.md#getTranslateDocumentByUrl) | **GET** /html/translate/{srcLang}/{resLang} | Translate the HTML document from Web specified by its URL.
*HtmlApi* | [**getDetectHtmlKeywords**](docs/SummarizationApi.md#getDetectHtmlKeywords) | **GET** /html/{name}/summ/keywords | Get the HTML document keywords using the keyword detection service.
*HtmlApi* | [**getDetectHtmlKeywordsByUrl**](docs/SummarizationApi.md#getDetectHtmlKeywordsByUrl) | **GET** /html/summ/keywords | Get the keywords from HTML document from Web specified by its URL using the keyword detection service
*HtmlApi* | [**getMergeHtmlTemplate**](docs/TemplateMergeApi.md#getMergeHtmlTemplate) | **GET** /html/{templateName}/merge | Populate HTML document template with data located as a file in the storage.
*HtmlApi* | [**postMergeHtmlTemplate**](docs/TemplateMergeApi.md#postMergeHtmlTemplate) | **POST** /html/{templateName}/merge | Populate HTML document template with data from the request body. Result document will be saved to storage.

<a name="storage_api"></a>
## STORAGE API  

*StorageApi* | [**copyFile**](docs/FileApi.md#copyfile) | **PUT** /html/storage/file/copy/{srcPath} | Copy file
*StorageApi* | [**deleteFile**](docs/FileApi.md#deletefile) | **DELETE** /html/storage/file/{path} | Delete file
*StorageApi* | [**downloadFile**](docs/FileApi.md#downloadfile) | **GET** /html/storage/file/{path} | Download file
*StorageApi* | [**moveFile**](docs/FileApi.md#movefile) | **PUT** /html/storage/file/move/{srcPath} | Move file
*StorageApi* | [**uploadFile**](docs/FileApi.md#uploadfile) | **PUT** /html/storage/file/{path} | Upload file
*StorageApi* | [**copyFolder**](docs/FolderApi.md#copyfolder) | **PUT** /html/storage/folder/copy/{srcPath} | Copy folder
*StorageApi* | [**createFolder**](docs/FolderApi.md#createfolder) | **PUT** /html/storage/folder/{path} | Create the folder
*StorageApi* | [**deleteFolder**](docs/FolderApi.md#deletefolder) | **DELETE** /html/storage/folder/{path} | Delete folder
*StorageApi* | [**getFilesList**](docs/FolderApi.md#getfileslist) | **GET** /html/storage/folder/{path} | Get all files and folders within a folder
*StorageApi* | [**moveFolder**](docs/FolderApi.md#movefolder) | **PUT** /html/storage/folder/move/{srcPath} | Move folder
*StorageApi* | [**getDiscUsage**](docs/StorageApi.md#getdiscusage) | **GET** /html/storage/disc | Get disc usage
*StorageApi* | [**getFileVersions**](docs/StorageApi.md#getfileversions) | **GET** /html/storage/version/{path} | Get file versions
*StorageApi* | [**objectExists**](docs/StorageApi.md#objectexists) | **GET** /html/storage/exist/{path} | Check if file or folder exists
*StorageApi* | [**storageExists**](docs/StorageApi.md#storageexists) | **GET** /html/storage/{storageName}/exist | Check if storage exists

## Documentation For Models

 - [DiscUsage](docs/DiscUsage.md)
 - [Error](docs/Error.md)
 - [ErrorDetails](docs/ErrorDetails.md)
 - [FileVersions](docs/FileVersions.md)
 - [FilesList](docs/FilesList.md)
 - [FilesUploadResult](docs/FilesUploadResult.md)
 - [ObjectExist](docs/ObjectExist.md)
 - [StorageExist](docs/StorageExist.md)
 - [StorageFile](docs/StorageFile.md)
 - [FileVersion](docs/FileVersion.md)

## Documentation For Authorization

## oauth

- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: "https://api.aspose.cloud/oauth2/token"
- **Scopes**: N/A

### Examples

[Tests](./test/Api/) contain various examples of using the Aspose.HTML SDK.

## Author
Aspose
