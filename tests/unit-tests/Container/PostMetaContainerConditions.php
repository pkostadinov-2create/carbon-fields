<?php
use Carbon_Fields\Container\Container;
use Carbon_Fields\Container\Post_Meta_Container;
use Carbon_Fields\Exception\Incorrect_Syntax_Exception;

class PostMetaContainerConditions extends WP_UnitTestCase {
	public function setUp() {
		parent::setup();

		$this->containerTitle = 'Page Settings';
		$this->page = get_post( $this->factory->post->create( array( 'post_type' => 'page' ) ) );
	}

	public function tearDown() {
		parent::tearDown();

		Container::$registered_panel_ids = array();
		unset( $this->page );
	}

	/**
	 * @covers Carbon_Fields\Container\Post_Meta_Container::show_on_page_children
	 */
	public function testShowOnPageChildrenResultPostType() {
		$container = Container::make('post_meta', $this->containerTitle);
		$container->show_on_page_children( $this->page->post_name );
		$this->assertSame( array( 'page' ), $container->settings['post_type'] );
	}

}