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
            "basePath" => "https://api.aspose.cloud/v4.0",
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

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$conf = array(
	"basePath" => "https://api.aspose.cloud/v4.0",
	"authPath" => "https://api.aspose.cloud/connect/token",
	"apiKey" => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
	"appSID" => "XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX",
	"defaultUserAgent" => "Webkit"
);

$apiInstance = new Client\Invoker\Api\HtmlApi($conf);

// For PDF, XPS and DOCX formats the size is in inches, for images (JPEG, BMP, PNG, TIFF, GIF) - in pixels.
$options_a4 = [
    'width' => 8.3,
    'height' => 11.7,
    'left_margin' => 0.2,
    'right_margin' => 0.2,
    'top_margin' => 0.2,
    'bottom_margin' => 0.2
];

$src = 'https://stallman.org/articles/anonymous-payments-thru-phones.html';
$dst = 'website.pdf'

try {
    //Request to server Api
    $result = self::$api_html->convertUrlToLocal($src, $dst, $options_a4);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HtmlApi->convertUrlToLocal: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints
All URIs are relative to *https://api.aspose.cloud/v4.0*

Possible conversions:
- HTML -> PDF, XPS, DOCX, MD, MHTML, JPEG, BMP, PNG, TIFF, GIF
- EPUB -> PDF, XPS, DOCX, JPEG, BMP, PNG, TIFF, GIF
- MD -> PDF, XPS, DOCX, HTML, MHTML, JPEG, BMP, PNG, TIFF, GIF
- MHTML -> PDF, XPS, DOCX, JPEG, BMP, PNG, TIFF, GIF


<a name="html_api"></a>
## HTML API

| Class     | Method                                                                       | Description                                                              |
|-----------|------------------------------------------------------------------------------|--------------------------------------------------------------------------|
| *HtmlApi* | [**convertLocalToLocal**](docs/ConversionApi.md#convertlocaltolocal)         | Convert the HTML or EPUB document from the local file to the local file. |
| *HtmlApi* | [**convertLocalToStorage**](docs/ConversionApi.md#convertlocaltostorage)     | Convert the HTML or EPUB document from the local file to the storage.    |
| *HtmlApi* | [**convertStorageToLocal**](docs/ConversionApi.md#convertstoragetolocal)     | Convert the HTML or EPUB document from the storage to the local file.    |
| *HtmlApi* | [**convertStorageToStorage**](docs/ConversionApi.md#convertstoragetostorage) | Convert the HTML or EPUB document from the storage to the storage.       |
| *HtmlApi* | [**convertUrlToLocal**](docs/ConversionApi.md#converturltolocal)             | Convert the website and saving result to the local file.                 |
| *HtmlApi* | [**convertUrlToStorage**](docs/ConversionApi.md#converturltostorage)         | Convert the website and saving result to the storage.                    |
| *HtmlApi* | [**convert**](docs/ConversionApi.md#convert)                                 | General function for conversion.                                         |

<a name="storage_api"></a>
## STORAGE API  
| Class        | Method                                                    | Description                               |
|--------------|-----------------------------------------------------------|-------------------------------------------|
| *StorageApi* | [**deleteFile**](docs/FileApi.md#deletefile)              | Delete file                               |
| *StorageApi* | [**downloadFile**](docs/FileApi.md#downloadfile)          | Download file                             |
| *StorageApi* | [**uploadFile**](docs/FileApi.md#uploadfile)              | Upload file                               |
| *StorageApi* | [**createFolder**](docs/FolderApi.md#createfolder)        | Create the folder                         |
| *StorageApi* | [**deleteFolder**](docs/FolderApi.md#deletefolder)        | Delete folder                             |
| *StorageApi* | [**getFilesList**](docs/FolderApi.md#getfileslist)        | Get all files and folders within a folder |
| *StorageApi* | [**getDiscUsage**](docs/StorageApi.md#getdiscusage)       | Get disc usage                            |
| *StorageApi* | [**objectExists**](docs/StorageApi.md#objectexists)       | Check if file or folder exists            |
| *StorageApi* | [**storageExists**](docs/StorageApi.md#storageexists)     | Check if storage exists                   |

## Documentation For Models

 - [DiscUsage](docs/DiscUsage.md)
 - [Error](docs/Error.md)
 - [ErrorDetails](docs/ErrorDetails.md)
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

[Tests](https://github.com/aspose-html-cloud/aspose-html-cloud-php/tree/master/test/Api/) contain various examples of using the Aspose.HTML SDK.

## Author
Aspose
