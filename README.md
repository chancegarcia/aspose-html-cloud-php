![](https://img.shields.io/badge/api-v3.0-lightgrey) ![Packagist Version](https://img.shields.io/packagist/v/aspose/html-sdk-php)  ![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/aspose/html-sdk-php) [![GitHub license](https://img.shields.io/github/license/aspose-html-cloud/aspose-html-cloud-php)](https://github.com/aspose-html-cloud/aspose-html-cloud-php/blob/master/LICENSE) ![GitHub last commit](https://img.shields.io/github/last-commit/Aspose-html-Cloud/aspose-html-cloud-php)
# HTML Rendering & Conversion PHP Cloud REST API
Aspose.HTML Cloud for PHP is a programming SDK that allows software developers to manipulate and convert HTML documents from within their own applications. A Wrapper of RESTful APIs, Aspose.HTML Cloud for PHP speeds up HTML programming and conversion.
This cloud SDK assists to develop cloud-based [HTML page rendering, processing, translation & conversion](https://products.aspose.cloud/html/php) apps in PHP via REST API.

## HTML Processing Features
- Fetch the HTML page along with its resources as a ZIP archive by providing the page URL.
- Based on page URL, retrieve all images of an HTML page as a ZIP package.
- Load data from a local file to populate the HTML document template.
- Use the request body to populate the HTML document template.
- Convert HTML page to numerous other file formats.

## Read & Write HTML Formats
HTML, XHTML, zipped HTML, zipped XHTML, MHTML, HTML containing SVG markup, Markdown, JSON

## Save HTML As
*Fixed Layout*: PDF, XPS
*Images*: TIFF, JPEG, PNG, BMP, GIF
*Other*: TXT, ZIP (images)

## Read HTML Formats
*eBook*: EPUB
*Other*: XML, SVG

## Enhancements Version 20.11

- New generation of Aspose.HTML Cloud SDK for .NET (C#) is provided.
- This version of SDK has been redesigned from scratch being based on the new Aspose.HTML Cloud REST API (v3.0).
- Currently, it provides only the conversion feature. Other features that are still available in the versions up to v.20.08 are planned to be implemented in this SDK later.
- Conversion interface provides a more flexible conversion parameters setup.
- Redesigned storage access is provided using SDK entry point HtmlApi.Storage.
- Availability of synchronous and asynchronous file upload and download methods.
- Asynchronous download provides the ability to get progress data for the longer downloads.

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
## Convert HTML to PNG in PHP

```php
	// Get your ClientId and ClientSecret from https://dashboard.aspose.cloud (free registration required).

	$conf = array(
		"appSID" => "MY_CLIENT_ID",
		"apiKey" => "MY_CLIENT_SECRET",
		"basePath" => "https://api.aspose.cloud/v3.0",
		"authPath" => "https://api.aspose.cloud/connect/token",
		"testResult" => "\\testresult\\",
		"testData" => "\\testdata\\",
		"remoteFolder" => "HtmlTestDoc",
		"defaultUserAgent" => "Webkit",
		"debugFile" => "php://output",
		"debug" => false
	);

	$api_html = new HtmlApi($conf);
	
	$name = "sample.html"; // string | Document name.
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

	$result = $api_html->getConvertDocumentToImage($name, $out_format, $width, $height, $left_margin, $right_margin, $top_margin, $bottom_margin, $resolution, $folder, $storage);
	print_r($result);	
```

###Note: do not forget to add in php.ini
```code
...
extension=php_openssl.dll
...
upload_max_filesize = 200M ; or 0 - unlimited
...
max_execution_time = 0 ; unlimited
...
default_socket_timeout = 3600 ; for long time operations

```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```


## Documentation for API Endpoints
All URIs are relative to *https://api.aspose.cloud/v3.0*

<a name="html_api"></a>
## HTML API

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*HtmlApi* | [**getConvertDocumentToImage**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#getConvertDocumentToImage) | **GET** /html/{name}/convert/image/{outFormat} | Convert the HTML document from the storage by its name to the specified image format.
*HtmlApi* | [**getConvertDocumentToImageByUrl**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#getConvertDocumentToImageByUrl) | **GET** /html/convert/image/{outFormat} | Convert the HTML page from the web by its URL to the specified image format.
*HtmlApi* | [**getConvertDocumentToPdf**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#getConvertDocumentToPdf) | **GET** /html/{name}/convert/pdf | Convert the HTML document from the storage by its name to PDF.
*HtmlApi* | [**getConvertDocumentToPdfByUrl**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#getConvertDocumentToPdfByUrl) | **GET** /html/convert/pdf | Convert the HTML page from the web by its URL to PDF.
*HtmlApi* | [**getConvertDocumentToXps**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#getConvertDocumentToXps) | **GET** /html/{name}/convert/xps | Convert the HTML document from the storage by its name to XPS.
*HtmlApi* | [**getConvertDocumentToXpsByUrl**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#getConvertDocumentToXpsByUrl) | **GET** /html/convert/xps | Convert the HTML page from the web by its URL to XPS.
*HtmlApi* | [**postConvertDocumentInRequestToImage**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#postConvertDocumentInRequestToImage) | **POST** /html/convert/image/{outFormat} | Converts the HTML document (in request content) to the specified image format and uploads resulting file to storage.
*HtmlApi* | [**postConvertDocumentInRequestToPdf**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#postConvertDocumentInRequestToPdf) | **POST** /html/convert/pdf | Converts the HTML document (in request content) to PDF and uploads resulting file to storage.
*HtmlApi* | [**postConvertDocumentInRequestToXps**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#postConvertDocumentInRequestToXps) | **POST** /html/convert/xps | Converts the HTML document (in request content) to XPS and uploads resulting file to storage.
*HtmlApi* | [**putConvertDocumentToImage**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#putConvertDocumentToImage) | **PUT** /html/{name}/convert/image/{outFormat} | Converts the HTML document (located on storage) to the specified image format and uploads resulting file to storage.
*HtmlApi* | [**putConvertDocumentToPdf**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#putConvertDocumentToPdf) | **PUT** /html/{name}/convert/pdf | Converts the HTML document (located on storage) to PDF and uploads resulting file to storage.
*HtmlApi* | [**putConvertDocumentToXps**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#putConvertDocumentToXps) | **PUT** /html/{name}/convert/xps | Converts the HTML document (located on storage) to XPS and uploads resulting file to storage.
*HtmlApi* | [**getConvertDocumentToMHTMLByUrl**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#getConvertDocumentToMHTMLByUrl) | **GET** /html/convert/mhtml | Converts the HTML page from Web by its URL to MHTML returns resulting file in response content.
*HtmlApi* | [**getConvertDocumentToMarkdown**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#getConvertDocumentToMarkdown) | **GET** /html/{name}/convert/md | Converts the HTML document (located on storage) to Markdown and returns resulting file in response content.
*HtmlApi* | [**postConvertDocumentInRequestToMarkdown**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#postConvertDocumentInRequestToMarkdown) | **POST** /html/convert/md | Converts the HTML document (in request content) to Markdown and uploads resulting file to storage by specified path.
*HtmlApi* | [**putConvertDocumentToMarkdown**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ConversionApi.md#putConvertDocumentToMarkdown) | **PUT** /html/{name}/convert/md | Converts the HTML document (located on storage) to Markdown and uploads resulting file to storage by specified path.
*HtmlApi* | [**getConvertMarkdownToHtml**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ImportApi.md#getConvertMarkdownToHtml) | **GET** /html/{name}/import/md | Converts the Markdown document (located on storage) to HTML and returns resulting file in response content.
*HtmlApi* | [**postConvertMarkdownInRequestToHtml**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ImportApi.md#postConvertMarkdownInRequestToHtml) | **POST** /html/import/md | Converts the Markdown document (in request content) to HTML and uploads resulting file to storage by specified path.
*HtmlApi* | [**putConvertMarkdownToHtml**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ImportApi.md#putConvertMarkdownToHtml) | **PUT** /html/{name}/import/md | Converts the Markdown document (located on storage) to HTML and uploads resulting file to storage by specified path.
*HtmlApi* | [**getDocumentFragmentByXPath**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/DocumentApi.md#getDocumentFragmentByXPath) | **GET** /html/{name}/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query.
*HtmlApi* | [**getDocumentByUrl**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/DocumentApi.md#getDocumentByUrl) | **GET** /html/download | Return all HTML page with linked resources packaged as a ZIP archive by the source page URL.
*HtmlApi* | [**getDocumentFragmentByXPathByUrl**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/DocumentApi.md#getDocumentFragmentByXPathByUrl) | **GET** /html/fragments/{outFormat} | Return list of HTML fragments matching the specified XPath query by the source page URL.
*HtmlApi* | [**getDocumentFragmentsByCSSSelector**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/DocumentApi.md#getDocumentFragmentsByCSSSelector) | **GET** /html/{name}/fragments/css/{outFormat} | Return list of HTML fragments matching the specified CSS selector.
*HtmlApi* | [**getDocumentFragmentsByCSSSelectorByUrl**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/DocumentApi.md#getDocumentFragmentsByCSSSelectorByUrl) | **GET** /html/fragments/css/{outFormat} | Return list of HTML fragments matching the specified CSS selector by the source page URL.
*HtmlApi* | [**getDocumentImages**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/DocumentApi.md#getDocumentImages) | **GET** /html/{name}/images/all | Return all HTML document images packaged as a ZIP archive.
*HtmlApi* | [**getDocumentImagesByUrl**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/DocumentApi.md#getDocumentImagesByUrl) | **GET** /html/images/all | Return all HTML page images packaged as a ZIP archive by the source page URL.
*HtmlApi* | [**getMergeHtmlTemplate**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/TemplateMergeApi.md#getMergeHtmlTemplate) | **GET** /html/{templateName}/merge | Populate HTML document template with data located as a file in the storage.
*HtmlApi* | [**postMergeHtmlTemplate**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/TemplateMergeApi.md#postMergeHtmlTemplate) | **POST** /html/{templateName}/merge | Populate HTML document template with data from the request body. Result document will be saved to storage.
*HtmlApi* | [**getSeoWarning**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/SeoApi.md#getSeoWarning) | **GET** /html/seo | Page analysis and return of SEO warnings in json format.
*HtmlApi* | [**getHtmlWarning**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/SeoApi.md#getHtmlWarning) | **GET** /html/validator | Checks the markup validity of Web documents in HTML, XHTML, etc., and return result in json format.

<a name="storage_api"></a>
## STORAGE API  
Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*StorageApi* | [**copyFile**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FileApi.md#copyfile) | **PUT** /html/storage/file/copy/{srcPath} | Copy file
*StorageApi* | [**deleteFile**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FileApi.md#deletefile) | **DELETE** /html/storage/file/{path} | Delete file
*StorageApi* | [**downloadFile**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FileApi.md#downloadfile) | **GET** /html/storage/file/{path} | Download file
*StorageApi* | [**moveFile**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FileApi.md#movefile) | **PUT** /html/storage/file/move/{srcPath} | Move file
*StorageApi* | [**uploadFile**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FileApi.md#uploadfile) | **PUT** /html/storage/file/{path} | Upload file
*StorageApi* | [**copyFolder**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FolderApi.md#copyfolder) | **PUT** /html/storage/folder/copy/{srcPath} | Copy folder
*StorageApi* | [**createFolder**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FolderApi.md#createfolder) | **PUT** /html/storage/folder/{path} | Create the folder
*StorageApi* | [**deleteFolder**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FolderApi.md#deletefolder) | **DELETE** /html/storage/folder/{path} | Delete folder
*StorageApi* | [**getFilesList**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FolderApi.md#getfileslist) | **GET** /html/storage/folder/{path} | Get all files and folders within a folder
*StorageApi* | [**moveFolder**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FolderApi.md#movefolder) | **PUT** /html/storage/folder/move/{srcPath} | Move folder
*StorageApi* | [**getDiscUsage**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/StorageApi.md#getdiscusage) | **GET** /html/storage/disc | Get disc usage
*StorageApi* | [**getFileVersions**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/StorageApi.md#getfileversions) | **GET** /html/storage/version/{path} | Get file versions
*StorageApi* | [**objectExists**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/StorageApi.md#objectexists) | **GET** /html/storage/exist/{path} | Check if file or folder exists
*StorageApi* | [**storageExists**](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/StorageApi.md#storageexists) | **GET** /html/storage/{storageName}/exist | Check if storage exists

## Documentation For Models

 - [DiscUsage](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/DiscUsage.md)
 - [Error](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/Error.md)
 - [ErrorDetails](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ErrorDetails.md)
 - [FileVersions](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FileVersions.md)
 - [FilesList](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FilesList.md)
 - [FilesUploadResult](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FilesUploadResult.md)
 - [ObjectExist](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/ObjectExist.md)
 - [StorageExist](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/StorageExist.md)
 - [StorageFile](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/StorageFile.md)
 - [FileVersion](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/docs/FileVersion.md)

## Documentation For Authorization

## oauth

- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: "https://api.aspose.cloud/oauth2/token"
- **Scopes**: N/A

### Examples

[Tests](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/test/Api/) contain various examples of using the Aspose.HTML SDK.

## Aspose.HTML Cloud SDKs in Popular Languages

| .NET | Java | PHP | Python | Ruby | Node.js | Android | Swift|C++|Go|
|---|---|---|---|---|---|---|--|--|--|
| [GitHub](https://github.com/aspose-html-cloud/aspose-html-cloud-dotnet) | [GitHub](https://github.com/aspose-html-cloud/aspose-html-cloud-java) | [GitHub](https://github.com/aspose-html-cloud/aspose-html-cloud-php) | [GitHub](https://github.com/aspose-html-cloud/aspose-html-cloud-python) | [GitHub](https://github.com/aspose-html-cloud/aspose-html-cloud-ruby)  | [GitHub](https://github.com/aspose-html-cloud/aspose-html-cloud-nodejs) | [GitHub](https://github.com/aspose-html-cloud/aspose-html-cloud-android) | [GitHub](https://github.com/aspose-html-cloud/aspose-html-cloud-swift)|[GitHub](https://github.com/aspose-html-cloud/aspose-html-cloud-cpp) |[GitHub](https://github.com/aspose-html-cloud/aspose-html-cloud-go) |
| [NuGet](https://www.nuget.org/packages/Aspose.html-Cloud/) | [Maven](https://repository.aspose.cloud/webapp/#/artifacts/browse/tree/General/repo/com/aspose/aspose-html-cloud) | [Composer](https://packagist.org/packages/aspose/aspose-html-cloud-php) | [PIP](https://pypi.org/project/asposehtmlcloud/) | [GEM](https://rubygems.org/gems/aspose_html_cloud)  | [NPM](https://www.npmjs.com/package/@asposecloud/aspose-html-cloud) | [Maven](https://repository.aspose.cloud/webapp/#/artifacts/browse/tree/General/repo/com/aspose/aspose-html-cloud) | [Cocoapods](https://cocoapods.org/pods/AsposeHtmlCloud)|[NuGet](https://www.nuget.org/packages/Aspose.Html-Cloud.Cpp/) | [Go.Dev](#) |

[Product Page](https://products.aspose.cloud/html/php) | [Documentation](https://docs.aspose.cloud/display/htmlcloud/Home) | [API Reference](https://apireference.aspose.cloud/html/) | [Code Samples](https://github.com/aspose-html-cloud/aspose-html-cloud-php) | [Blog](https://blog.aspose.cloud/category/html/) | [Free Support](https://forum.aspose.cloud/c/html) | [Free Trial](https://dashboard.aspose.cloud/#/apps)
