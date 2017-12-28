<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Fired during plugin activation.
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since   1.6.0
 * @author  Sayful Islam <sayful.islam001@gmail.com>
 */
if ( ! class_exists( 'Carousel_Slider_Activator' ) ):

	class Carousel_Slider_Activator {

		protected static $instance = null;

		/**
		 * Ensures only one instance of this class is loaded or can be loaded.
		 *
		 * @return Carousel_Slider_Activator
		 */
		public static function init() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {
			add_action( 'carousel_slider_activation', array( $this, 'activate' ) );
		}

		/**
		 * Script that should load upon plugin activation
		 */
		public function activate() {
			$version = get_option( 'carousel_slider_version' );

			if ( $version == false ) {
				$this->update_meta_160();
			}

			// Add plugin version to database
			update_option( 'carousel_slider_version', CAROUSEL_SLIDER_VERSION );
		}

		/**
		 * Update meta for prior to version 1.6.0
		 */
		public function update_meta_160() {
			$carousels = get_posts( array(
				'post_type'   => 'carousels',
				'post_status' => 'any',
			) );

			if ( count( $carousels ) > 0 ) {
				foreach ( $carousels as $carousel ) {

					$id             = $carousel->ID;
					$_items_desktop = get_post_meta( $id, '_items', true );
					$_lazy_load     = get_post_meta( $id, '_lazy_load_image', true );
					$_lazy_load     = $_lazy_load == 'on' ? 'on' : 'off';

					update_post_meta( $id, '_lazy_load_image', $_lazy_load );
					update_post_meta( $id, '_items_desktop', $_items_desktop );
					update_post_meta( $id, '_slide_type', 'image-carousel' );
					update_post_meta( $id, '_video_width', '560' );
					update_post_meta( $id, '_video_height', '315' );
				}
			}
		}
	}

endif;

Carousel_Slider_Activator::init();
