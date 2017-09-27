# Giphy Core Client for PHP


The **Giphy Core SDK** is a wrapper around [Giphy API](https://github.com/Giphy/GiphyAPI).

[![Build Status](https://travis-ci.com/Giphy/giphy-php-client.svg?token=ytpQbMSuy8sydsqZwbwp&branch=master)](https://travis-ci.com/Giphy/giphy-php-client)

[Giphy](https://www.giphy.com) is the best way to search, share, and discover GIFs on the Internet. Similar to the way other search engines work, the majority of our content comes from indexing based on the best and most popular GIFs and search terms across the web. We organize all those GIFs so you can find the good content easier and share it out through your social channels. We also feature some of our favorite GIF artists and work with brands to create and promote their original GIF content.

[![](https://media.giphy.com/media/5xaOcLOqNmWHaLeB14I/giphy.gif)]()

# Getting Started

## Requirements

PHP 5.4.0 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/giphy/giphy-php-client.git"
    }
  ],
  "require": {
    "giphy/giphy-php-client": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/GiphyClient/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$q = "cheeseburgers"; // string | Search query term or prhase.
$limit = 25; // int | The maximum number of records to return.
$offset = 0; // int | An optional results offset. Defaults to 0.
$rating = "g"; // string | Filters results by specified rating.
$lang = "en"; // string | Specify default country for regional content; use a 2-letter ISO 639-1 country code. See list of supported languages <a href = \"../language-support\">here</a>.
$fmt = "json"; // string | Used to indicate the expected response format. Default is Json.

try {
    $result = $api_instance->gifsSearchGet($api_key, $q, $limit, $offset, $rating, $lang, $fmt);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->gifsSearchGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

## Documentation for API Endpoints

All URIs are relative to *http://api.giphy.com/v1*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*DefaultApi* | [**gifsCategoriesCategoryGet**](docs/Api/DefaultApi.md#gifscategoriescategoryget) | **GET** /gifs/categories/{category} | Category Tags Endpoint.
*DefaultApi* | [**gifsCategoriesCategoryTagGet**](docs/Api/DefaultApi.md#gifscategoriescategorytagget) | **GET** /gifs/categories/{category}/{tag} | Tagged Gifs Endpoint.
*DefaultApi* | [**gifsCategoriesGet**](docs/Api/DefaultApi.md#gifscategoriesget) | **GET** /gifs/categories | Categories Endpoint.
*DefaultApi* | [**gifsGet**](docs/Api/DefaultApi.md#gifsget) | **GET** /gifs | Get GIFs by ID Endpoint
*DefaultApi* | [**gifsGifIdGet**](docs/Api/DefaultApi.md#gifsgifidget) | **GET** /gifs/{gif_id} | Get GIF by ID Endpoint
*DefaultApi* | [**gifsRandomGet**](docs/Api/DefaultApi.md#gifsrandomget) | **GET** /gifs/random | Random Endpoint
*DefaultApi* | [**gifsSearchGet**](docs/Api/DefaultApi.md#gifssearchget) | **GET** /gifs/search | Search Endpoint
*DefaultApi* | [**gifsTranslateGet**](docs/Api/DefaultApi.md#gifstranslateget) | **GET** /gifs/translate | Translate Endpoint
*DefaultApi* | [**gifsTrendingGet**](docs/Api/DefaultApi.md#gifstrendingget) | **GET** /gifs/trending | Trending GIFs Endpoint
*DefaultApi* | [**stickersRandomGet**](docs/Api/DefaultApi.md#stickersrandomget) | **GET** /stickers/random | Random Sticker Endpoint
*DefaultApi* | [**stickersSearchGet**](docs/Api/DefaultApi.md#stickerssearchget) | **GET** /stickers/search | Sticker Search Endpoint
*DefaultApi* | [**stickersTranslateGet**](docs/Api/DefaultApi.md#stickerstranslateget) | **GET** /stickers/translate | Sticker Translate Endpoint
*DefaultApi* | [**stickersTrendingGet**](docs/Api/DefaultApi.md#stickerstrendingget) | **GET** /stickers/trending | Trending Stickers Endpoint


## Documentation For Models

 - [BaseChannelModel](docs/Model/BaseChannelModel.md)
 - [BaseChannelModelGifs](docs/Model/BaseChannelModelGifs.md)
 - [Breadcrumb](docs/Model/Breadcrumb.md)
 - [Category](docs/Model/Category.md)
 - [ChannelWithChildrenModel](docs/Model/ChannelWithChildrenModel.md)
 - [ChannelWithChildrenModelChildren](docs/Model/ChannelWithChildrenModelChildren.md)
 - [Gif](docs/Model/Gif.md)
 - [GifImages](docs/Model/GifImages.md)
 - [GifImagesDownsized](docs/Model/GifImagesDownsized.md)
 - [GifImagesDownsizedLarge](docs/Model/GifImagesDownsizedLarge.md)
 - [GifImagesDownsizedMedium](docs/Model/GifImagesDownsizedMedium.md)
 - [GifImagesDownsizedSmall](docs/Model/GifImagesDownsizedSmall.md)
 - [GifImagesDownsizedStill](docs/Model/GifImagesDownsizedStill.md)
 - [GifImagesFixedHeight](docs/Model/GifImagesFixedHeight.md)
 - [GifImagesFixedHeightDownsampled](docs/Model/GifImagesFixedHeightDownsampled.md)
 - [GifImagesFixedHeightSmall](docs/Model/GifImagesFixedHeightSmall.md)
 - [GifImagesFixedHeightSmallStill](docs/Model/GifImagesFixedHeightSmallStill.md)
 - [GifImagesFixedHeightStill](docs/Model/GifImagesFixedHeightStill.md)
 - [GifImagesFixedWidth](docs/Model/GifImagesFixedWidth.md)
 - [GifImagesFixedWidthDownsampled](docs/Model/GifImagesFixedWidthDownsampled.md)
 - [GifImagesFixedWidthSmall](docs/Model/GifImagesFixedWidthSmall.md)
 - [GifImagesFixedWidthSmallStill](docs/Model/GifImagesFixedWidthSmallStill.md)
 - [GifImagesFixedWidthStill](docs/Model/GifImagesFixedWidthStill.md)
 - [GifImagesLooping](docs/Model/GifImagesLooping.md)
 - [GifImagesOriginal](docs/Model/GifImagesOriginal.md)
 - [GifImagesOriginalStill](docs/Model/GifImagesOriginalStill.md)
 - [GifImagesPreview](docs/Model/GifImagesPreview.md)
 - [GifImagesPreviewGif](docs/Model/GifImagesPreviewGif.md)
 - [InlineResponse200](docs/Model/InlineResponse200.md)
 - [InlineResponse2001](docs/Model/InlineResponse2001.md)
 - [InlineResponse2002](docs/Model/InlineResponse2002.md)
 - [InlineResponse2003](docs/Model/InlineResponse2003.md)
 - [InlineResponse2004](docs/Model/InlineResponse2004.md)
 - [InlineResponse2005](docs/Model/InlineResponse2005.md)
 - [InlineResponse400](docs/Model/InlineResponse400.md)
 - [LastChildModel](docs/Model/LastChildModel.md)
 - [LastChildModelChildren](docs/Model/LastChildModelChildren.md)
 - [MetaContent](docs/Model/MetaContent.md)
 - [MetaObject](docs/Model/MetaObject.md)
 - [Pagination](docs/Model/Pagination.md)
 - [RandomGif](docs/Model/RandomGif.md)
 - [ShallowTag](docs/Model/ShallowTag.md)
 - [Tag](docs/Model/Tag.md)
 - [TrendingTag](docs/Model/TrendingTag.md)
 - [User](docs/Model/User.md)


