# GPH\DefaultApi

All URIs are relative to *http://api.giphy.com/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**gifsCategoriesCategoryGet**](DefaultApi.md#gifsCategoriesCategoryGet) | **GET** /gifs/categories/{category} | Category Tags Endpoint.
[**gifsCategoriesCategoryTagGet**](DefaultApi.md#gifsCategoriesCategoryTagGet) | **GET** /gifs/categories/{category}/{tag} | Tagged Gifs Endpoint.
[**gifsCategoriesGet**](DefaultApi.md#gifsCategoriesGet) | **GET** /gifs/categories | Categories Endpoint.
[**gifsGet**](DefaultApi.md#gifsGet) | **GET** /gifs | Get GIFs by ID Endpoint
[**gifsGifIdGet**](DefaultApi.md#gifsGifIdGet) | **GET** /gifs/{gif_id} | Get GIF by ID Endpoint
[**gifsRandomGet**](DefaultApi.md#gifsRandomGet) | **GET** /gifs/random | Random Endpoint
[**gifsSearchGet**](DefaultApi.md#gifsSearchGet) | **GET** /gifs/search | Search Endpoint
[**gifsTranslateGet**](DefaultApi.md#gifsTranslateGet) | **GET** /gifs/translate | Translate Endpoint
[**gifsTrendingGet**](DefaultApi.md#gifsTrendingGet) | **GET** /gifs/trending | Trending GIFs Endpoint
[**stickersRandomGet**](DefaultApi.md#stickersRandomGet) | **GET** /stickers/random | Random Sticker Endpoint
[**stickersSearchGet**](DefaultApi.md#stickersSearchGet) | **GET** /stickers/search | Sticker Search Endpoint
[**stickersTranslateGet**](DefaultApi.md#stickersTranslateGet) | **GET** /stickers/translate | Sticker Translate Endpoint
[**stickersTrendingGet**](DefaultApi.md#stickersTrendingGet) | **GET** /stickers/trending | Trending Stickers Endpoint


# **gifsCategoriesCategoryGet**
> \GPH\Model\InlineResponse2004 gifsCategoriesCategoryGet($api_key, $category, $limit, $offset)

Category Tags Endpoint.

Returns a list of tags for a given category. NOTE `limit` and `offset` must both be set; otherwise they're ignored.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$category = "category_example"; // string | Filters results by category.
$limit = 25; // int | The maximum number of records to return.
$offset = 0; // int | An optional results offset. Defaults to 0.

try {
    $result = $api_instance->gifsCategoriesCategoryGet($api_key, $category, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->gifsCategoriesCategoryGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **category** | **string**| Filters results by category. |
 **limit** | **int**| The maximum number of records to return. | [optional] [default to 25]
 **offset** | **int**| An optional results offset. Defaults to 0. | [optional] [default to 0]

### Return type

[**\GPH\Model\InlineResponse2004**](../Model/InlineResponse2004.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gifsCategoriesCategoryTagGet**
> \GPH\Model\InlineResponse2005 gifsCategoriesCategoryTagGet($api_key, $category, $tag, $limit, $offset)

Tagged Gifs Endpoint.

Returns a list of gifs for a given tag (alias to `/gif/search`).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$category = "category_example"; // string | Filters results by category.
$tag = "tag_example"; // string | Filters results by tag.
$limit = 25; // int | The maximum number of records to return.
$offset = 0; // int | An optional results offset. Defaults to 0.

try {
    $result = $api_instance->gifsCategoriesCategoryTagGet($api_key, $category, $tag, $limit, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->gifsCategoriesCategoryTagGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **category** | **string**| Filters results by category. |
 **tag** | **string**| Filters results by tag. |
 **limit** | **int**| The maximum number of records to return. | [optional] [default to 25]
 **offset** | **int**| An optional results offset. Defaults to 0. | [optional] [default to 0]

### Return type

[**\GPH\Model\InlineResponse2005**](../Model/InlineResponse2005.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gifsCategoriesGet**
> \GPH\Model\InlineResponse2003 gifsCategoriesGet($api_key, $limit)

Categories Endpoint.

Returns a list of categories.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$limit = 25; // int | The maximum number of records to return.

try {
    $result = $api_instance->gifsCategoriesGet($api_key, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->gifsCategoriesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **limit** | **int**| The maximum number of records to return. | [optional] [default to 25]

### Return type

[**\GPH\Model\InlineResponse2003**](../Model/InlineResponse2003.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gifsGet**
> \GPH\Model\InlineResponse200 gifsGet($api_key, $ids)

Get GIFs by ID Endpoint

A multiget version of the get GIF by ID endpoint.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$ids = "feqkVgjJpYtjy,7rzbxdu0ZEXLy"; // string | Filters results by specified GIF IDs, separated by commas.

try {
    $result = $api_instance->gifsGet($api_key, $ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->gifsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **ids** | **string**| Filters results by specified GIF IDs, separated by commas. |

### Return type

[**\GPH\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gifsGifIdGet**
> \GPH\Model\InlineResponse2001 gifsGifIdGet($api_key, $gif_id)

Get GIF by ID Endpoint

Returns a GIF given that GIF's unique ID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$gif_id = "gif_id_example"; // string | Filters results by specified GIF ID.

try {
    $result = $api_instance->gifsGifIdGet($api_key, $gif_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->gifsGifIdGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **gif_id** | **string**| Filters results by specified GIF ID. |

### Return type

[**\GPH\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gifsRandomGet**
> \GPH\Model\InlineResponse2002 gifsRandomGet($api_key, $tag, $rating, $fmt)

Random Endpoint

Returns a random GIF, limited by tag. Excluding the tag parameter will return a random GIF from the GIPHY catalog.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$tag = "burrito"; // string | Filters results by specified tag.
$rating = "g"; // string | Filters results by specified rating.
$fmt = "json"; // string | Used to indicate the expected response format. Default is Json.

try {
    $result = $api_instance->gifsRandomGet($api_key, $tag, $rating, $fmt);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->gifsRandomGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **tag** | **string**| Filters results by specified tag. | [optional]
 **rating** | **string**| Filters results by specified rating. | [optional]
 **fmt** | **string**| Used to indicate the expected response format. Default is Json. | [optional] [default to json]

### Return type

[**\GPH\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gifsSearchGet**
> \GPH\Model\InlineResponse200 gifsSearchGet($api_key, $q, $limit, $offset, $rating, $lang, $fmt)

Search Endpoint

Search all Giphy GIFs for a word or phrase. Punctuation will be stripped and ignored. Use a plus or url encode for phrases. Example paul+rudd, ryan+gosling or american+psycho.

### Example
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

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **q** | **string**| Search query term or prhase. |
 **limit** | **int**| The maximum number of records to return. | [optional] [default to 25]
 **offset** | **int**| An optional results offset. Defaults to 0. | [optional] [default to 0]
 **rating** | **string**| Filters results by specified rating. | [optional]
 **lang** | **string**| Specify default country for regional content; use a 2-letter ISO 639-1 country code. See list of supported languages &lt;a href &#x3D; \&quot;../language-support\&quot;&gt;here&lt;/a&gt;. | [optional]
 **fmt** | **string**| Used to indicate the expected response format. Default is Json. | [optional] [default to json]

### Return type

[**\GPH\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gifsTranslateGet**
> \GPH\Model\InlineResponse2001 gifsTranslateGet($api_key, $s)

Translate Endpoint

The translate API draws on search, but uses the Giphy `special sauce` to handle translating from one vocabulary to another. In this case, words and phrases to GIFs.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$s = "ryan gosling"; // string | Search term.

try {
    $result = $api_instance->gifsTranslateGet($api_key, $s);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->gifsTranslateGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **s** | **string**| Search term. |

### Return type

[**\GPH\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **gifsTrendingGet**
> \GPH\Model\InlineResponse200 gifsTrendingGet($api_key, $limit, $rating, $fmt)

Trending GIFs Endpoint

Fetch GIFs currently trending online. Hand curated by the GIPHY editorial team. The data returned mirrors the GIFs showcased on the <a href = \"http://www.giphy.com\">GIPHY homepage</a>. Returns 25 results by default.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$limit = 25; // int | The maximum number of records to return.
$rating = "g"; // string | Filters results by specified rating.
$fmt = "json"; // string | Used to indicate the expected response format. Default is Json.

try {
    $result = $api_instance->gifsTrendingGet($api_key, $limit, $rating, $fmt);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->gifsTrendingGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **limit** | **int**| The maximum number of records to return. | [optional] [default to 25]
 **rating** | **string**| Filters results by specified rating. | [optional]
 **fmt** | **string**| Used to indicate the expected response format. Default is Json. | [optional] [default to json]

### Return type

[**\GPH\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stickersRandomGet**
> \GPH\Model\InlineResponse2002 stickersRandomGet($api_key, $tag, $rating, $fmt)

Random Sticker Endpoint

Returns a random GIF, limited by tag. Excluding the tag parameter will return a random GIF from the GIPHY catalog.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$tag = "burrito"; // string | Filters results by specified tag.
$rating = "g"; // string | Filters results by specified rating.
$fmt = "json"; // string | Used to indicate the expected response format. Default is Json.

try {
    $result = $api_instance->stickersRandomGet($api_key, $tag, $rating, $fmt);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->stickersRandomGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **tag** | **string**| Filters results by specified tag. | [optional]
 **rating** | **string**| Filters results by specified rating. | [optional]
 **fmt** | **string**| Used to indicate the expected response format. Default is Json. | [optional] [default to json]

### Return type

[**\GPH\Model\InlineResponse2002**](../Model/InlineResponse2002.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stickersSearchGet**
> \GPH\Model\InlineResponse200 stickersSearchGet($api_key, $q, $limit, $offset, $rating, $lang, $fmt)

Sticker Search Endpoint

Replicates the functionality and requirements of the classic GIPHY search, but returns animated stickers rather than GIFs.

### Example
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
    $result = $api_instance->stickersSearchGet($api_key, $q, $limit, $offset, $rating, $lang, $fmt);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->stickersSearchGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **q** | **string**| Search query term or prhase. |
 **limit** | **int**| The maximum number of records to return. | [optional] [default to 25]
 **offset** | **int**| An optional results offset. Defaults to 0. | [optional] [default to 0]
 **rating** | **string**| Filters results by specified rating. | [optional]
 **lang** | **string**| Specify default country for regional content; use a 2-letter ISO 639-1 country code. See list of supported languages &lt;a href &#x3D; \&quot;../language-support\&quot;&gt;here&lt;/a&gt;. | [optional]
 **fmt** | **string**| Used to indicate the expected response format. Default is Json. | [optional] [default to json]

### Return type

[**\GPH\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stickersTranslateGet**
> \GPH\Model\InlineResponse2001 stickersTranslateGet($api_key, $s)

Sticker Translate Endpoint

The translate API draws on search, but uses the Giphy `special sauce` to handle translating from one vocabulary to another. In this case, words and phrases to GIFs.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$s = "ryan gosling"; // string | Search term.

try {
    $result = $api_instance->stickersTranslateGet($api_key, $s);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->stickersTranslateGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **s** | **string**| Search term. |

### Return type

[**\GPH\Model\InlineResponse2001**](../Model/InlineResponse2001.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **stickersTrendingGet**
> \GPH\Model\InlineResponse200 stickersTrendingGet($api_key, $limit, $rating, $fmt)

Trending Stickers Endpoint

Fetch GIFs currently trending online. Hand curated by the GIPHY editorial team. The data returned mirrors the GIFs showcased on the <a href = \"http://www.giphy.com\">GIPHY homepage</a>. Returns 25 results by default.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$api_instance = new GPH\Api\DefaultApi();
$api_key = "dc6zaTOxFJmzC"; // string | Giphy API Key.
$limit = 25; // int | The maximum number of records to return.
$rating = "g"; // string | Filters results by specified rating.
$fmt = "json"; // string | Used to indicate the expected response format. Default is Json.

try {
    $result = $api_instance->stickersTrendingGet($api_key, $limit, $rating, $fmt);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->stickersTrendingGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **api_key** | **string**| Giphy API Key. |
 **limit** | **int**| The maximum number of records to return. | [optional] [default to 25]
 **rating** | **string**| Filters results by specified rating. | [optional]
 **fmt** | **string**| Used to indicate the expected response format. Default is Json. | [optional] [default to json]

### Return type

[**\GPH\Model\InlineResponse200**](../Model/InlineResponse200.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

