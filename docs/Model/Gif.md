# Gif

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**type** | **string** | By default, this is almost always gif | [optional] [default to 'gif']
**id** | **string** | This GIF&#39;s unique ID | [optional] 
**slug** | **string** | The unique slug used in this GIF&#39;s URL | [optional] 
**url** | **string** | The unique URL for this GIF | [optional] 
**bitly_gif_url** | **string** | The unique bit.ly URL for this GIF | [optional] 
**bitly_url** | **string** | The unique bit.ly URL for this GIF | [optional] 
**embed_url** | **string** | A URL used for embedding this GIF | [optional] 
**username** | **string** | The username this GIF is attached to, if applicable | [optional] 
**source** | **string** | The page on which this GIF was found | [optional] 
**rating** | **string** | The MPAA-style rating for this content. Examples include Y, G, PG, PG-13 and R | [optional] 
**content_url** | **string** | Currently unused | [optional] 
**tags** | **string[]** | An array of tags for this GIF (Note\\: Not available when using the Public Beta Key) | [optional] 
**featured_tags** | **string[]** | An array of featured tags for this GIF (Note\\: Not available when using the Public Beta Key) | [optional] 
**user** | [**\GPH\Model\User**](User.md) | An object containing data about the user associated with this GIF, if applicable. | [optional] 
**source_tld** | **string** | The top level domain of the source URL. | [optional] 
**source_post_url** | **string** | The URL of the webpage on which this GIF was found. | [optional] 
**is_hidden** | **bool** | Denotes whether or not this GIF is private. | [optional] 
**is_removed** | **bool** | Denotes whether or not this GIF has been deleted. | [optional] 
**is_community** | **bool** | Denotes whether or not this GIF has been uploaded by a GIPHY user. | [optional] 
**is_anonymous** | **bool** | Denotes whether or not this GIF has been uploaded to GIPHY by an anonymous user. | [optional] 
**is_featured** | **bool** | Denotes whether or not this GIF is featured on giphy.com (deprecated). | [optional] 
**is_realtime** | **bool** | Denotes whether or not this GIF has been sourced from a realtime crawl. | [optional] 
**is_indexable** | **bool** | Denotes whether or not this GIF is indexable. | [optional] 
**is_sticker** | **bool** | Denotes whether this GIF is a sticker (has a transparent background). | [optional] 
**update_datetime** | **string** | The date on which this GIF was last updated. | [optional] 
**create_datetime** | **string** | The date this GIF was added to the GIPHY database. | [optional] 
**import_datetime** | **string** | The creation or upload date from this GIF&#39;s source. | [optional] 
**trending_datetime** | **string** | The date on which this gif was marked trending, if applicable. | [optional] 
**images** | [**\GPH\Model\GifImages**](GifImages.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


