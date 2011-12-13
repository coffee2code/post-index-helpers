=== Post Index Helpers ===
Contributors: coffee2code
Donate link: http://coffee2code.com/donate
Tags: post, index, position, loop, template tags, conditional, coffee2code
Requires at least: 2.8
Tested up to: 3.3
Stable tag: 1.1
Version: 1.1

A variety of template tags related to the index/position of a post within a loop's listing of posts.


== Description ==

A variety of template tags related to the index/position of a post within a loop's listing of posts.

Some of the template tags provided by this plugin relate to the position of the current post within the current loop:

* `c2c_is_first()`
* `c2c_is_last()`
* `c2c_is_at_index()`
* `c2c_is_even()`
* `c2c_is_odd()`
* `c2c_get_the_index()`
* `c2c_is_index_within()`
* `c2c_the_index()`

Other functions help you get a post (or posts) at a given position in the current loop:

* `c2c_get_post_by_index()`
* `c2c_get_posts_by_index()`

While the remaining three functions relate to index information about the loop in general:

* `c2c_get_last_index()`
* `c2c_is_post_in_loop()`
* `c2c_is_valid_index()`

Please see the Template Tags section (in some places found under the Other Notes section) for descriptions of all the functions and their arguments.

Note that index counting begins at 0, which means the first item has an index of 0.  An index of -1 indicates no posts were found.

Links: [Plugin Homepage](http://coffee2code.com/wp-plugins/post-index-helpers/) | [Plugin Directory Page](http://wordpress.org/extend/plugins/post-index-helpers/) | [Author Homepage](http://coffee2code.com)


== Installation ==

1. Unzip `post-index-helpers.zip` inside the `/wp-content/plugins/` directory (or install via the built-in WordPress plugin installer)
1. Activate the plugin through the 'Plugins' admin menu in WordPress
1. Use one or more of the provided template tags in theme template file(s) as desired


== Template Tags ==

The plugin provides twelve template tags for use in your theme templates.

= Functions =

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
Is the specified index valid?  Validity is defined as being within the range of indexes actively occupied by posts in the current loop listing.
* `<?php function c2c_the_index( $wp_query = null ) ?>`
Echo the current post's index

= Arguments =

* `$index`
Integer value representing an index.

* `$indexes`
Array of integer values representing indexes.

* `$wp_query`
(optional) A custom WP_Query object.  If null or not defined, then the global wp_query object is used. (Specifying this is not typical.)

* `$start_index`
Integer value representing the index at the start of the range (value is inclusive)

* `$end_index`
Integer value representing the index at the end of the range (value is inclusive)

* `$post_id`
Integer value representing the ID of the post.

= Examples =

* Only show thumbnail for the first listed post.

`
<div class="content">
	<?php
	/* Only show thumbnail for the first listed post. */
	if ( c2c_is_first() && has_post_thumbnail() ) { the_post_thumbnail(); }
	?>
	<?php the_content(); ?>
</div>
`

* Add a class name that includes the post's index number, i.e. post-index-0 indicates the first post

`<div class="post post-index-<?php c2c_the_index(); ?>">`

* Supply a "stripe" class if the post is at an odd index.

`<div class="<?php echo ( c2c_is_odd() ? 'stripe' : '' ); ?>">`


== Changelog ==

= 1.1 =
* Add c2c_is_post_in_loop()
* Move c2c_is_index_within() to achieve alphabetic arrangement of functions
* Note compatibility through WP 3.3+
* Add link to plugin directory page to readme.txt
* Update copyright date (2012)

= 1.0.3 =
* Note compatibility through WP 3.2+
* Minor code formatting changes (spacing)
* Minor readme.txt formatting changes
* Fix plugin homepage and author links in description in readme.txt

= 1.0.2 =
* Add link to plugin homepage to description in readme.txt

= 1.0.1 =
* Note compatibility through WP 3.1+
* Update copyright date (2011)
* Minor doc tweaks

= 1.0 =
* Initial release


== Upgrade Notice ==

= 1.1 =
Minor update: added new function c2c_is_post_in_loop() and noted compatibility through WP 3.3+

= 1.0.3 =
Trivial update: noted compatibility through WP 3.2+

= 1.0.2 =
Trivial update: add link to plugin homepage to description in readme.txt

= 1.0.1 =
Trivial update: noted compatibility with WP 3.1+ and updated copyright date.
