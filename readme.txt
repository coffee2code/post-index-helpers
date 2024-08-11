=== Post Index Helpers ===
Contributors: coffee2code
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=6ARCFJ9TX3522
Tags: post, index, position, loop, template tags
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 2.8
Tested up to: 6.6
Stable tag: 1.4.4

A variety of template tags related to the index/position of a post within a loop's listing of posts.


== Description ==

This plugin provides thirteen handy template tags that relate to the index/position of a post within a loop's listing of posts.

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

Note that index counting begins at 0, which means the first item has an index of 0. An index of -1 indicates no posts were found.

Links: [Plugin Homepage](https://coffee2code.com/wp-plugins/post-index-helpers/) | [Plugin Directory Page](https://wordpress.org/plugins/post-index-helpers/) | [GitHub](https://github.com/coffee2code/post-index-helpers/) | [Author Homepage](https://coffee2code.com)


== Installation ==

1. Install via the built-in WordPress plugin installer. Or download and unzip `post-index-helpers.zip` inside the plugins directory for your site (typically `wp-content/plugins/`)
1. Activate the plugin through the 'Plugins' admin menu in WordPress
1. Use one or more of the provided template tags in theme template file(s) as desired


== Developer Documentation ==

Developer documentation can be found in [DEVELOPER-DOCS.md](https://github.com/coffee2code/post-index-helpers/blob/master/DEVELOPER-DOCS.md). That documentation covers the numerous template tags provided by the plugin.

As an overview, these are the template tags provided the plugin:

* `c2c_get_last_index()`     : Gets the index number for the last post in the loop listing
* `c2c_get_post_by_index()`  : Get post based on specified index
* `c2c_get_posts_by_index()` : Get posts based on specified array of indexes
* `c2c_get_the_index()`      : Get the index for the current post
* `c2c_is_at_index()`        : Is the current index at the specified index?
* `c2c_is_even()`            : Is the current post at an even position? (i.e. 0, 2, 4, ...)
* `c2c_is_first()`           : Is the current post the first listed post?
* `c2c_is_last()`            : Is the current post the last listed post?
* `c2c_is_odd()`             : Is the current post at an odd position? (i.e. 1, 3, 5, ...)
* `c2c_is_index_within()`    : Is the current post (or one at the specified index) within the bounds of a specified range?
* `c2c_is_post_in_loop()`    : Is the specified post within the current loop?
* `c2c_is_valid_index()`     : Is the specified index valid?
* `c2c_the_index()`          : Echo the current post's index


== Changelog ==

= 1.4.4 (2024-08-10) =
* Change: Note compatibility through WP 6.6+
* Change: Update copyright date (2024)
* New: Add `.gitignore` file
* Change: Reduce number of 'Tags' from `readme.txt`
* Change: Remove development and testing-related files from release packaging
* Unit tests:
    * Hardening: Prevent direct web access to `bootstrap.php`
    * Allow tests to run against current versions of WordPress
    * New: Add `composer.json` for PHPUnit Polyfill dependency
    * Change: In bootstrap, store path to plugin directory in a constant

= 1.4.3 (2023-04-29) =
* Change: Note compatibility through WP 6.3+
* Change: Update copyright date (2023)
* Fix: Fix typo for link to DEVELOPER-DOCS.md in README.md

= 1.4.2 (2021-10-02) =
* New: Add DEVELOPER-DOCS.md and move template tag documentation into it
* Change: Note compatibility through WP 5.8+
* Unit tests:
    * Change: Restructure unit test directories
        * Change: Move `phpunit/` into `tests/phpunit/`
        * Change: Move `phpunit/bin/` into `tests/`
    * Change: Remove 'test-' prefix from unit test file
    * Change: In bootstrap, store path to plugin file constant
    * Change: In bootstrap, add backcompat for PHPUnit pre-v6.0

_Full changelog is available in [CHANGELOG.md](https://github.com/coffee2code/post-index-helpers/blob/master/CHANGELOG.md)._


== Upgrade Notice ==

= 1.4.4 =
Trivial update: noted compatibility through WP 6.6+, removed unit tests from release packaging, and updated copyright date (2024)

= 1.4.3 =
Trivial update: noted compatibility through WP 6.3+ and updated copyright date (2023)

= 1.4.2 =
Trivial update: added DEVELOPER-DOCS.md, noted compatibility through WP 5.8+, and minor reorganization and tweaks to unit tests

= 1.4.1 =
Trivial update: noted compatibility through WP 5.7+ and updated copyright date (2021)

= 1.4 =
Trivial update: Added support for action invocation of `c2c_the_index()`, restructured unit test file structure, added a TODO.md file, and noted compatibility through WP 5.5+.

= 1.3 =
Minor update: Changed `c2c_the_index()` to echo empty string if index is invalid, prevented warning if invalid argument is sent to `c2c_get_the_index(), updated a few URLs to be HTTPS, and noted compatibility through WP 5.4+

= 1.2.9 =
Trivial update: noted compatibility through WP 5.3+ and updated copyright date (2020)

= 1.2.8 =
Trivial update: created CHANGELOG.md to store historical changelog outside of readme.txt, modernized unit tests, noted compatibility through WP 5.2+

= 1.2.7 =
Trivial update: noted compatibility through WP 5.1+ and updated copyright date (2019)

= 1.2.6 =
Trivial update: added README.md, noted compatibility through WP 4.9+, and updated copyright date (2018)

= 1.2.5 =
Trivial update: tweaked readme, changed unit test bootstrap, noted compatibility through WP 4.7+, and updated copyright date

= 1.2.4 =
Trivial update: minor unit test tweaks, noted compatibility through WP 4.4+, and updated copyright date

= 1.2.3 =
Trivial update: noted compatibility through WP 4.3+

= 1.2.2 =
Trivial update: noted compatibility through WP 4.1+ and updated copyright date

= 1.2.1 =
Trivial update: noted compatibility through WP 4.0+; minor documentation tweaks; added plugin icon

= 1.2 =
Recommended minor update: fixed a few small bugs; added unit tests; noted compatibility through WP 3.8+

= 1.1.2 =
Trivial update: noted compatibility through WP 3.5+

= 1.1.1 =
Trivial update: noted compatibility through WP 3.4+; explicitly stated license

= 1.1 =
Minor update: added new function c2c_is_post_in_loop() and noted compatibility through WP 3.3+

= 1.0.3 =
Trivial update: noted compatibility through WP 3.2+

= 1.0.2 =
Trivial update: add link to plugin homepage to description in readme.txt

= 1.0.1 =
Trivial update: noted compatibility with WP 3.1+ and updated copyright date.
