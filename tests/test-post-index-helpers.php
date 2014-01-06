<?php

class Post_Index_Helpers_Test extends WP_UnitTestCase {

	private $posts;

	function setUp() {
		parent::setUp();

		$this->setup_loop();
	}

	function tearDown() {
		parent::tearDown();

		wp_reset_query();
	}


	/**
	 *
	 * HELPER FUNCTIONS
	 *
	 */


	private function setup_loop( $number_of_posts = 6 ) {
		$this->posts = array_reverse( $this->factory->post->create_many( $number_of_posts ) );
		query_posts( array( 'orderby' => 'title' ) );
		return $this->posts;
	}

	/**
	 * Simulates the loop.
	 */
	private function loop( $number_of_times = 1 ) {
		for ( $i = 0; $i < $number_of_times; $i++ ) {
			if ( have_posts() ) {
				the_post();
			}
		}
	}


	/**
	 *
	 * TESTS
	 *
	 */


	/* c2c_get_last_index() */

	function test_get_last_index() {
		$this->assertEquals( 5, c2c_get_last_index() );
	}

	function test_get_last_index_for_one_post_loop() {
		query_posts( array( 'p' => $this->posts[1] ) );

		$this->assertEquals( 0, c2c_get_last_index() );
	}

	function test_get_last_index_for_empty_loop() {
		query_posts( array( 'p' => '1000' ) );

		$this->assertEquals( -1, c2c_get_last_index() );
	}

	/* c2c_get_post_by_index() */

	function test_get_post_by_index() {
		$this->assertEquals( get_post( $this->posts[1] ), c2c_get_post_by_index( 1 ) );
	}

	function test_get_post_by_index_with_invalid_index() {
		$this->assertEmpty( c2c_get_post_by_index( 1000 ) );
	}

	function test_get_post_by_index_for_one_post_loop() {
		query_posts( array( 'p' => $this->posts[1] ) );

		$this->assertEquals( get_post( $this->posts[1] ), c2c_get_post_by_index( 0 ) );
	}

	function test_get_post_by_index_for_empty_loop() {
		query_posts( array( 'p' => '1000' ) );

		$this->assertEmpty( c2c_get_post_by_index( 0 ) );
	}

	/* c2c_get_posts_by_index() */

	function test_get_posts_by_index() {
		$expected = array( get_post( $this->posts[1] ), get_post( $this->posts[3] ) );
		$this->assertEquals( $expected, c2c_get_posts_by_index( array( 1, 3 ) ) );
	}

	function test_get_posts_by_index_with_invalid_index() {
		$expected = array( get_post( $this->posts[1] ), get_post( $this->posts[3] ) );
		$this->assertEquals( $expected, c2c_get_posts_by_index( array( 1, 1000, 3 ) ) );
	}

	function test_get_posts_by_index_with_all_invalid_indexes() {
		$this->assertEmpty( c2c_get_posts_by_index( array( 1000, 1001 ) ) );
	}

	function test_get_posts_by_index_for_one_post_loop() {
		query_posts( array( 'p' => $this->posts[1] ) );

		$this->assertEquals( array( get_post( $this->posts[1] ) ), c2c_get_posts_by_index( array( 0, 1 ) ) );
	}

	function test_get_posts_by_index_for_empty_loop() {
		query_posts( array( 'p' => '1000' ) );

		$this->assertEmpty( c2c_get_posts_by_index( array( 0, 1 ) ) );
	}

	/* c2c_get_the_index() */

	function test_get_the_index_before_loop() {
		$this->assertEquals( -1, c2c_get_the_index() );
	}

	function test_get_the_index_start_of_loop() {
		$this->loop();

		$this->assertEquals( 0, c2c_get_the_index() );
	}

	function test_get_the_index() {
		$this->loop( 3 );

		$this->assertEquals( 2, c2c_get_the_index() );
	}

	function test_get_the_index_for_empty_loop() {
		query_posts( array( 'p' => '1000' ) );
		$this->loop();

		$this->assertEquals( -1, c2c_get_the_index() );
	}

	/* c2c_is_at_index() */

	function test_is_at_index_beginning() {
		$this->loop();

		$this->assertTrue(  c2c_is_at_index( 0 ) );
		$this->assertFalse( c2c_is_at_index( 1 ) );
	}

	function test_is_at_index_middle() {
		$this->loop( 3 );

		$this->assertFalse( c2c_is_at_index( 0 ) );
		$this->assertFalse( c2c_is_at_index( 1 ) );
		$this->assertTrue(  c2c_is_at_index( 2 ) );
		$this->assertFalse( c2c_is_at_index( 3 ) );
	}

	function test_is_at_index_with_invalid_index() {
		$this->assertFalse( c2c_is_at_index( 1000 ) );
	}

	function test_is_at_index_for_empty_loop() {
		query_posts( array( 'p' => '1000' ) );
		$this->loop();

		$this->assertFalse( c2c_is_at_index( 0 ) );
		$this->assertFalse( c2c_is_at_index( 1 ) );
		$this->assertFalse( c2c_is_at_index( 2 ) );
	}

	/* c2c_is_even() */

	function test_is_even_before_loop() {
		$this->assertFalse( c2c_is_even() );
	}

	function test_is_even() {
		$this->loop();
		$this->assertTrue(  c2c_is_even() );
		$this->loop();
		$this->assertFalse( c2c_is_even() );
		$this->loop();
		$this->assertTrue(  c2c_is_even() );
		$this->loop();
		$this->assertFalse( c2c_is_even() );
	}

	/* c2c_is_first() */

	function test_is_first_before_loop() {
		$this->assertFalse( c2c_is_first() );
	}

	function test_is_first() {
		$this->loop();

		$this->assertTrue( c2c_is_first() );

		$n = 5;
		for ( $i = 0; $i < $n; $i++ ) {
			$this->loop();
			$this->assertFalse( c2c_is_first() );
		}
	}

	/* c2c_is_index_within() */

	function test_is_index_within_with_valid_indexes() {
		for ( $i = 0; $i < 6; $i++ ) {
			$this->assertTrue( c2c_is_index_within( 0, 5, $i ) );
		}
	}

	function test_is_index_within_with_invalid_indexes() {
		foreach( array( -1, 6, 1000 ) as $i ) {
			$this->assertFalse( c2c_is_index_within( 0, 5, $i ) );
		}
	}

	function test_is_index_within_with_implicit_index() {
		for ( $i = 0; $i < 6; $i++ ) {
			$this->loop();
			$this->assertTrue( c2c_is_index_within( 0, 5 ) );
		}
	}

	/* c2c_is_last() */

	function test_is_last_before_loop() {
		$this->assertFalse( c2c_is_last() );
	}

	function test_is_last() {
		$n = 5;
		for ( $i = 0; $i < $n; $i++ ) {
			$this->loop();
			$this->assertFalse(  c2c_is_last() );
		}

		$this->loop();
		$this->assertTrue( c2c_is_last() );
	}

	/* c2c_is_odd() */

	function test_is_odd_before_loop() {
		$this->assertFalse( c2c_is_odd() );
	}

	function test_is_odd() {
		$this->loop();
		$this->assertFalse( c2c_is_odd() );
		$this->loop();
		$this->assertTrue(  c2c_is_odd() );
		$this->loop();
		$this->assertFalse( c2c_is_odd() );
		$this->loop();
		$this->assertTrue(  c2c_is_odd() );
	}

	/* c2c_is_post_in_loop() */

	function test_is_post_in_loop_with_inloop_post() {
		foreach ( $this->posts as $post_id ) {
			$this->assertTrue( c2c_is_post_in_loop( $post_id ) );
		}
	}

	function test_is_post_in_loop_with_post_not_in_loop() {
		$this->assertFalse( c2c_is_post_in_loop( -1 ) );
		$this->assertFalse( c2c_is_post_in_loop( 1000 ) );

		$post_id = $this->factory->post->create();

		$this->assertFalse( c2c_is_post_in_loop( $post_id ) );
	}

	/* c2c_is_valid_index() */

	function test_is_valid_index_with_valid_indexes() {
		$n = 6;
		for ( $i = 0; $i < $n; $i++ ) {
			$this->assertTrue( c2c_is_valid_index( $i ) );
		}
	}

	function test_is_valid_index_with_invalid_indexes() {
		foreach ( array( -1, 6, 1000 ) as $i ) {
			$this->assertFalse( c2c_is_valid_index( $i ) );
		}
	}

}
