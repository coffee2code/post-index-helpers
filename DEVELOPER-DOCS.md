# Developer Documentation

## Template Tags

The plugin provides thirteen optional template tags for use in your theme templates or custom code.

### Functions

* `<?php function c2c_get_last_index( $wp_query = null ) ?>`
Gets the index number for the last post in the loop listing

* `<?php function c2c_get_post_by_index( $index, $wp_query = null ) ?>`
Get post based on specified index

* `<?php function c2c_get_posts_by_index( $indexes, $wp_query = null ) ?>`
Get posts based on specified array of indexes

* `<?php function c2c_get_the_index( $wp_query = null ) ?>`
Get the index for the current post

* `<?php function c2c_is_at_index( $index, $wp_query = null ) ?>`
Is the current index at the specified index?

* `<?php function c2c_is_even( $wp_query = null ) ?>`
Is the current post at an even position? (i.e. 0, 2, 4, ...)

* `<?php function c2c_is_first( $wp_query = null ) ?>`
Is the current post the first listed post?

* `<?php function c2c_is_last( $wp_query = null ) ?>`
Is the current post the last listed post?

* `<?php function c2c_is_odd( $wp_query = null ) ?>`
Is the current post at an odd position? (i.e. 1, 3, 5, ...)

* `<?php function c2c_is_index_within( $start_index, $end_index, $index = null, $wp_query = null ) ?>`
Is the current post (or one at the specified index) within the bounds of a specified range?

* `<?phh function c2c_is_post_in_loop( $post_id, $wp_query = null ) ?>`
Is the specified post within the current loop?

* `<?php function c2c_is_valid_index( $index, $wp_query = null ) ?>`
Is the specified index valid? Validity is defined as being within the range of indexes actively occupied by posts in the current loop listing.

* `<?php function c2c_the_index( $wp_query = null ) ?>` or more safely `<?php do_action( 'c2c_the_index', $wp_query  ); ?>`
Echo the current post's index


### Arguments

* `$index`
Integer value representing an index.

* `$indexes`
Array of integer values representing indexes.

* `$wp_query`
Optional argument. A custom `WP_Query` object. If null or not defined, then the global wp_query object is used. (Specifying this is not typical.)

* `$start_index`
Integer value representing the index at the start of the range (value is inclusive)

* `$end_index`
Integer value representing the index at the end of the range (value is inclusive)

* `$post_id`
Integer value representing the ID of the post.


### Examples

* Only show thumbnail for the first listed post.
```php
<div class="content">
	<?php
	/* Only show thumbnail for the first listed post. */
	if ( c2c_is_first() && has_post_thumbnail() ) { the_post_thumbnail(); }
	?>
	<?php the_content(); ?>
</div>
```

* Add a class name that includes the post's index number, i.e. post-index-0 indicates the first post
`<div class="post post-index-<?php c2c_the_index(); ?>">`

* Supply a "stripe" class if the post is at an odd index.
`<div class="<?php echo ( c2c_is_odd() ? 'stripe' : '' ); ?>">`
