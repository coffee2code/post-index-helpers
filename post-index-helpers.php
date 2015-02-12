<?php
/**
 * Plugin Name: Post Index Helpers
 * Version:     1.2.2
 * Plugin URI:  http://coffee2code.com/wp-plugins/post-index-helpers/
 * Author:      Scott Reilly
 * Author URI:  http://coffee2code.com/
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Description: A variety of template tags related to the index/position of a post within a loop's listing of posts.
 *
 * Compatible with WordPress 2.8 through 4.1+.
 *
 * =>> Read the accompanying readme.txt file for instructions and documentation.
 * =>> Also, visit the plugin's homepage for additional information and updates.
 * =>> Or visit: https://wordpress.org/extend/plugins/post-index-helpers/
 *
 * @package Post_Index_Helpers
 * @author Scott Reilly
 * @version 1.2.2
 */

/*
	Copyright (c) 2010-2015 by Scott Reilly (aka coffee2code)

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

defined( 'ABSPATH' ) or die();

if ( ! function_exists( 'c2c_get_last_index' ) ) {
	/**
	 * Gets the index number for the last post in the loop listing
	 *
	 * @param  WP_Query $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return int      Index for last post in the loop listing
	 */
	function c2c_get_last_index( $wp_query = null ) {
		if ( ! $wp_query ) {
			global $wp_query;
		}

		return $wp_query->post_count - 1;
	}
}

if ( ! function_exists( 'c2c_get_post_by_index' ) ) {
	/**
	 * Get post based on specified index
	 *
	 * @param int           $index    The index at which to get the post from
	 * @param WP_Query      $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return WP_Post|null Post data
	 */
	function c2c_get_post_by_index( $index, $wp_query = null ) {
		if ( ! $wp_query ) {
			global $wp_query;
		}

		return is_array( $wp_query->posts ) && isset( $wp_query->posts[ $index ] ) ? $wp_query->posts[ $index ] : null;
	}
}

if ( ! function_exists( 'c2c_get_posts_by_index' ) ) {
	/**
	 * Get posts based on specified array of indexes
	 *
	 * @param array    $indexes  An array of indexes at which to get the post from
	 * @param WP_Query $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return array   Posts
	 */
	function c2c_get_posts_by_index( $indexes, $wp_query = null ) {
		if ( ! $wp_query ) {
			global $wp_query;
		}

		$posts = array();

		foreach ( $indexes as $index ) {
			if ( isset( $wp_query->posts[ $index ] ) && ! empty( $wp_query->posts[ $index ] ) ) {
				$posts[] = $wp_query->posts[ $index ];
			}
		}

		return $posts;
	}
}

if ( ! function_exists( 'c2c_get_the_index' ) ) {
	/**
	 * Get the index for the current post
	 *
	 * @param WP_Query $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return int     Index of current post
	 */
	function c2c_get_the_index( $wp_query = null ) {
		if ( ! $wp_query ) {
			global $wp_query;
		}

		return $wp_query->current_post;
	}
}

if ( ! function_exists( 'c2c_is_at_index' ) ) {
	/**
	 * Is the current index at the specified index?
	 *
	 * @param int      $index    The index to check if it is the current index.
	 * @param WP_Query $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return bool    True if the current index is at the specified index, otherwise false
	 */
	function c2c_is_at_index( $index, $wp_query = null ) {
		return ( c2c_get_the_index( $wp_query ) == $index ? true : false );
	}
}

if ( ! function_exists( 'c2c_is_even' ) ) {
	/**
	 * Is the current post at an even position? (i.e. 0, 2, 4, ...)
	 *
	 * @param WP_Query $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return bool    True if the post is at an even position, otherwise false
	 */
	function c2c_is_even( $wp_query = null ) {
		$index = c2c_get_the_index( $wp_query );

		return ( $index % 2 == 0 ? true : false );
	}
}

if ( ! function_exists( 'c2c_is_first' ) ) {
	/**
	 * Is the current post the first listed post?
	 *
	 * @param WP_Query $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return bool    True if the post is the first post, otherwise false
	 */
	function c2c_is_first( $wp_query = null ) {
		return ( c2c_get_the_index( $wp_query ) == 0 ? true : false );
	}
}

if ( ! function_exists( 'c2c_is_index_within' ) ) {
	/**
	 * Is the current post (or one at the specified index) within the bounds of a specified range?
	 *
	 * @param int      $start_index The index at the start of the range (value is inclusive)
	 * @param int      $end_index   The index at the end of the range (value is inclusive)
	 * @param int      $index       The index to check if it is within the specified range. If null, then uses index of current post.
	 * @param WP_Query $wp_query    A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return bool    True if the index is within the specified range, otherwise false
	 */
	function c2c_is_index_within( $start_index, $end_index, $index = null, $wp_query = null ) {
		if ( null === $index ) {
			$index = c2c_get_the_index( $wp_query );
		}

		return ( $index >= $start_index && $index <= $end_index );
	}
}

if ( ! function_exists( 'c2c_is_last' ) ) {
	/**
	 * Is the current post the last listed post?
	 *
	 * @param WP_Query $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return bool    True if the post is the last post, otherwise false
	 */
	function c2c_is_last( $wp_query = null ) {
		$index = c2c_get_the_index( $wp_query );
		return ( c2c_get_the_index( $wp_query ) == c2c_get_last_index( $wp_query ) ? true : false );
	}
}

if ( ! function_exists( 'c2c_is_odd' ) ) {
	/**
	 * Is the current post at an odd position? (i.e. 1, 3, 5, ...)
	 *
	 * @param WP_Query $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return bool    True if the post is at an odd position, otherwise false
	 */
	function c2c_is_odd( $wp_query = null ) {
		return ( c2c_get_the_index( $wp_query ) == -1 || c2c_is_even( $wp_query ) ? false : true );
	}
}

if ( ! function_exists( 'c2c_is_post_in_loop' ) ) {
	/**
	 * Is the specified post within the current loop?
	 *
	 * @param int      $post_id  The ID of the post to check for
	 * @param WP_Query $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return bool    True if the post is part of the loop, otherwise false
	 */
	function c2c_is_post_in_loop( $post_id, $wp_query = null ) {
		if ( ! $wp_query ) {
			global $wp_query;
		}

		$in_loop = false;

		foreach ( $wp_query->posts as $post ) {
			if ( $post->ID == $post_id ) {
				$in_loop = true;
				break;
			}
		}

		return $in_loop;
	}
}

if ( ! function_exists( 'c2c_is_valid_index' ) ) {
	/**
	 * Is the specified index valid?  Validity is defined as being within the range of indexes actively occupied by
	 * posts in the current loop listing.
	 *
	 * @param int      $index    The index to check for validity
	 * @param WP_Query $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 * @return bool    True if the post is the last post, otherwise false
	 */
	function c2c_is_valid_index( $index, $wp_query = null ) {
		return c2c_is_index_within( 0, c2c_get_last_index( $wp_query ), $index, $wp_query );
	}
}

if ( ! function_exists( 'c2c_the_index' ) ) {
	/**
	 * Echo the current post's index
	 *
	 * @param WP_Query $wp_query A WP_Query object. If not defined or null, then uses the global $wp_query
	 */
	function c2c_the_index( $wp_query = null ) {
		echo c2c_get_the_index( $wp_query );
	}
}
