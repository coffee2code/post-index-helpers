# Changelog

## _(in-progress)_
* Hardening: Ensure `c2c_the_index()` only outputs variable as an integer
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

## 1.4.3 _(2023-04-29)_
* Change: Note compatibility through WP 6.3+
* Change: Update copyright date (2023)
* Fix: Fix typo for link to DEVELOPER-DOCS.md in README.md

## 1.4.2 _(2021-10-02)_
* New: Add DEVELOPER-DOCS.md and move template tag documentation into it
* Change: Note compatibility through WP 5.8+
* Unit tests:
    * Change: Restructure unit test directories
        * Change: Move `phpunit/` into `tests/phpunit/`
        * Change: Move `phpunit/bin/` into `tests/`
    * Change: Remove 'test-' prefix from unit test file
    * Change: In bootstrap, store path to plugin file constant
    * Change: In bootstrap, add backcompat for PHPUnit pre-v6.0

## 1.4.1 _(2021-04-15)_
* Change: Note compatibility through WP 5.7+
* Change: Update copyright date (2021)

## 1.4 _(2020-08-25)_
* New: Support action invocation as alternative to calling `c2c_the_index()`
* New: Add TODO.md for newly added potential TODO items
* Change: Restructure unit test file structure
    * New: Create new subdirectory `phpunit/` to house all files related to unit testing
    * Change: Move `bin/` to `phpunit/bin/`
    * Change: Move `tests/bootstrap.php` to `phpunit/`
    * Change: Move `tests/` to `phpunit/tests/`
    * Change: Rename `phpunit.xml` to `phpunit.xml.dist` per best practices
* Change: Note compatibility through WP 5.5+

## 1.3 _(2020-05-28)_
* Change: In `c2c_the_index()`, echo an empty string if index is invalid
* Change: In `c2c_get_the_index()`, ensure object property exists before referencing it
* Change: Use HTTPS for link to WP SVN repository in bin script for configuring unit tests
* Change: Note compatibility through WP 5.4+
* Change: Explicitly document optional arguments as such, per WP core documentation standards
* Change: Update links to coffee2code.com to be HTTPS
* Change: Unit tests: Add tests for `c2c_the_index()`

## 1.2.9 _(2019-12-23)_
* Change: Note compatibility through WP 5.3+
* Change: Update copyright date (2020)

## 1.2.8 _(2019-06-16)_
* New: Add CHANGELOG.md file and move all but most recent changelog entries into it
* Change: Update unit test install script and bootstrap to use latest WP unit test repo
* Change: Note compatibility through WP 5.2+
* Change: Split paragraph in README.md's "Support" section into two

## 1.2.7_(2019-03-01)_
* Fix: Correct typo in readme docs
* Change: Note compatibility through WP 5.1+
* Change: Update copyright date (2019)
* Change: Update License URI to be HTTPS

## 1.2.6 _(2018-04-20)_
* New: Add README.md
* New: Add LICENSE file
* Change: Add GitHub link to readme
* Change: Unit tests: Minor whitespace tweaks to bootstrap
* Change: Note compatibility through WP 4.9+
* Change: Update copyright date (2018)

## 1.2.5 _(2017-01-25)_
* Change: Default `WP_TESTS_DIR` to `/tmp/wordpress-tests-lib` rather than erroring out if not defined via environment variable.
* Change: Enable more error output for unit tests.
* Change: Note compatibility through WP 4.7+.
* Change: Minor readme.txt improvements.
* Change: Update copyright date (2017).

## 1.2.4 _(2015-12-16)_
* Change: Note compatibility through WP 4.4+.
* Change: Explicitly declare methods in unit tests as public.
* Change: Update copyright date (2016).
* Add: Define 'Text Domain' header attribute.
* Add: Create empty index.php to prevent files from being listed if web server has enabled directory listings.

## 1.2.3 _(2015-08-08)_
* Note compatibility through WP 4.3+
* Minor code comment tweaks

## 1.2.2 _(2015-02-11)_
* Note compatibility through WP 4.1+
* Update copyright date (2015)

## 1.2.1 _(2014-08-26)_
* Die early if script is directly invoked
* Minor plugin header reformatting
* Change documentation links to wp.org to be https
* Note compatibility through WP 4.0+
* Add plugin icon

## 1.2
* Fix `c2c_is_odd()` to return false if the loop hasn't started
* Fix `c2c_get_last_index()` to explicitly check that `$index` arg is null before assuming current index
* Fix to prevent warnings if invalid index(es) are sent to `c2c_get_post_by_index()` and `c2c_get_posts_by_index()`
* Add unit tests
* Note compatibility through WP 3.8+
* Update copyright date (2014)
* Minor code and documentation reformatting (spacing, bracing)
* Change donate link
* Add banner image

## 1.1.2
* Note compatibility through WP 3.5+
* Update copyright date (2013)

## 1.1.1
* Re-license as GPLv2 or later (from X11)
* Add 'License' and 'License URI' header tags to readme.txt and plugin file
* Remove ending PHP close tag
* Note compatibility through WP 3.4+

## 1.1
* Add `c2c_is_post_in_loop()`
* Move `c2c_is_index_within()` to achieve alphabetic arrangement of functions
* Note compatibility through WP 3.3+
* Add link to plugin directory page to readme.txt
* Update copyright date (2012)

## 1.0.3
* Note compatibility through WP 3.2+
* Minor code formatting changes (spacing)
* Minor readme.txt formatting changes
* Fix plugin homepage and author links in description in readme.txt

## 1.0.2
* Add link to plugin homepage to description in readme.txt

## 1.0.1
* Note compatibility through WP 3.1+
* Update copyright date (2011)
* Minor doc tweaks

## 1.0
* Initial release
