<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Carousel_Slider_Script' ) ):

	class Carousel_Slider_Script {

		protected static $instance = null;

		/**
		 * Ensures only one instance of this class is loaded or can be loaded.
		 *
		 * @return Carousel_Slider_Script
		 */
		public static function init() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {
			add_action( 'wp_loaded', array( $this, 'register_styles' ) );
			add_action( 'wp_loaded', array( $this, 'register_scripts' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts' ), 15 );
			add_action( 'wp_footer', array( $this, 'inline_script' ), 30 );

			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ), 10 );
			add_action( 'admin_footer', array( $this, 'gallery_url_template' ), 5 );
		}

		public function register_styles() {
			$suffix = ( defined( "SCRIPT_DEBUG" ) && SCRIPT_DEBUG ) ? '' : '.min';

			$styles = array(
				'carousel-slider'       => array(
					'src'        => CAROUSEL_SLIDER_ASSETS . '/css/style.css',
					'dependency' => array(),
					'version'    => CAROUSEL_SLIDER_VERSION,
					'media'      => 'all',
				),
				'carousel-slider-admin' => array(
					'src'        => CAROUSEL_SLIDER_ASSETS . '/css/admin.css',
					'dependency' => array( 'wp-color-picker' ),
					'version'    => CAROUSEL_SLIDER_VERSION,
					'media'      => 'all',
				),
			);

			foreach ( $styles as $handle => $style ) {
				wp_register_style( $handle, $style['src'], $style['dependency'], $style['version'], $style['media'] );
			}
		}

		public function register_scripts() {
			$suffix = ( defined( "SCRIPT_DEBUG" ) && SCRIPT_DEBUG ) ? '' : '.min';

			$scripts = array(
				'select2'               => array(
					'src'        => CAROUSEL_SLIDER_ASSETS . '/lib/select2/select2' . $suffix . '.js',
					'dependency' => array( 'jquery' ),
					'version'    => '4.0.5',
					'in_footer'  => true,
				),
				'jquery-tiptip'         => array(
					'src'        => CAROUSEL_SLIDER_ASSETS . '/lib/jquery-tiptip/jquery.tipTip' . $suffix . '.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.3',
					'in_footer'  => true,
				),
				'wp-color-picker-alpha' => array(
					'src'        => CAROUSEL_SLIDER_ASSETS . '/lib/wp-color-picker-alpha/wp-color-picker-alpha' . $suffix . '.js',
					'dependency' => array( 'jquery', 'wp-color-picker' ),
					'version'    => '2.1.3',
					'in_footer'  => true,
				),
				'carousel-slider-admin' => array(
					'src'        => CAROUSEL_SLIDER_ASSETS . '/js/admin' . $suffix . '.js',
					'dependency' => array(
						'jquery',
						'select2',
						'wp-color-picker-alpha',
						'jquery-ui-accordion',
						'jquery-ui-datepicker',
						'jquery-ui-sortable',
						'jquery-ui-tabs',
						'jquery-tiptip',
					),
					'version'    => CAROUSEL_SLIDER_VERSION,
					'in_footer'  => true,
				),
				'owl-carousel'          => array(
					'src'        => CAROUSEL_SLIDER_ASSETS . '/lib/owl-carousel/owl.carousel' . $suffix . '.js',
					'dependency' => array( 'jquery' ),
					'version'    => '2.2.1',
					'in_footer'  => true,
				),
				'magnific-popup'        => array(
					'src'        => CAROUSEL_SLIDER_ASSETS . '/lib/magnific-popup/jquery.magnific-popup' . $suffix . '.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.1.0',
					'in_footer'  => true,
				),
			);

			foreach ( $scripts as $handle => $script ) {
				wp_register_script( $handle, $script['src'], $script['dependency'], $script['version'], $script['in_footer'] );
			}
		}

		/**
		 * Load frontend scripts
		 */
		public function frontend_scripts() {
			if ( ! $this->should_load_scripts() ) {
				return;
			}

			wp_enqueue_style( 'carousel-slider' );
			wp_enqueue_script( 'owl-carousel' );
		}

		/**
		 * Load admin scripts
		 *
		 * @param $hook
		 */
		public function admin_scripts( $hook ) {
			global $post;

			$_is_carousel = is_a( $post, 'WP_Post' ) && ( 'carousels' == $post->post_type );
			$_is_doc      = ( 'carousels_page_carousel-slider-documentation' == $hook );

			if ( ! $_is_carousel && ! $_is_doc ) {
				return;
			}

			wp_enqueue_media();
			wp_enqueue_style( 'carousel-slider-admin' );
			wp_enqueue_script( 'carousel-slider-admin' );
		}

		/**
		 * Load front end inline script
		 */
		public function inline_script() {
			if ( ! $this->should_load_scripts() ) {
				return;
			}
			?>
            <script type="text/javascript">
                (function ($) {
                    'use strict';

                    $('body').find('.carousel-slider').each(function () {
                        var _this = $(this);
                        var isVideo = _this.data('slide-type') === 'video-carousel';
                        var videoWidth = isVideo ? _this.data('video-width') : false;
                        var videoHeight = isVideo ? _this.data('video-height') : false;
                        var autoWidth = _this.data('auto-width');
                        var stagePadding = parseInt(_this.data('stage-padding'));
                        autoWidth = isVideo ? isVideo : autoWidth;
                        stagePadding = stagePadding > 0 ? stagePadding : 0;

                        if (jQuery().owlCarousel) {
                            _this.owlCarousel({
                                stagePadding: stagePadding,
                                nav: _this.data('nav'),
                                dots: _this.data('dots'),
                                margin: _this.data('margin'),
                                loop: _this.data('loop'),
                                autoplay: _this.data('autoplay'),
                                autoplayTimeout: _this.data('autoplay-timeout'),
                                autoplaySpeed: _this.data('autoplay-speed'),
                                autoplayHoverPause: _this.data('autoplay-hover-pause'),
                                slideBy: _this.data('slide-by'),
                                lazyLoad: _this.data('lazy-load'),
                                video: isVideo,
                                videoWidth: videoWidth,
                                videoHeight: videoHeight,
                                autoWidth: autoWidth,
                                navText: [
                                    '<svg class="carousel-slider-nav-icon" viewBox="0 0 20 20"><path d="M14 5l-5 5 5 5-1 2-7-7 7-7z"></path></use></svg>',
                                    '<svg class="carousel-slider-nav-icon" viewBox="0 0 20 20"><path d="M6 15l5-5-5-5 1-2 7 7-7 7z"></path></svg>'
                                ],
                                responsive: {
                                    320: {items: _this.data('colums-mobile')},
                                    600: {items: _this.data('colums-small-tablet')},
                                    768: {items: _this.data('colums-tablet')},
                                    993: {items: _this.data('colums-small-desktop')},
                                    1200: {items: _this.data('colums-desktop')},
                                    1921: {items: _this.data('colums')}
                                }
                            });
                        }

                        if (jQuery().magnificPopup) {
                            var popupType = _this.data('slide-type') === 'product-carousel' ? 'ajax' : 'image';
                            var popupGallery = _this.data('slide-type') !== 'product-carousel';
                            $(this).find('.magnific-popup').magnificPopup({
                                type: popupType,
                                gallery: {
                                    enabled: popupGallery
                                },
                                zoom: {
                                    enabled: popupGallery,
                                    duration: 300,
                                    easing: 'ease-in-out'
                                }
                            });
                        }
                    });
                })(jQuery);
            </script>
			<?php
		}

		/**
		 * Carousel slider gallery url template
		 *
		 * @return void
		 */
		public function gallery_url_template() {
			global $post_type;
			if ( $post_type != 'carousels' ) {
				return;
			}
			?>
            <template id="carouselSliderGalleryUrlTemplate" style="display: none;">
                <div class="carousel_slider-fields">
                    <label class="setting">
                        <span class="name"><?php esc_html_e( 'URL', 'carousel-slider' ); ?></span>
                        <input type="url" name="_images_urls[url][]" value="" autocomplete="off">
                    </label>
                    <label class="setting">
                        <span class="name"><?php esc_html_e( 'Title', 'carousel-slider' ); ?></span>
                        <input type="text" name="_images_urls[title][]" value="" autocomplete="off">
                    </label>
                    <label class="setting">
                        <span class="name"><?php esc_html_e( 'Caption', 'carousel-slider' ); ?></span>
                        <textarea name="_images_urls[caption][]"></textarea>
                    </label>
                    <label class="setting">
                        <span class="name"><?php esc_html_e( 'Alt Text', 'carousel-slider' ); ?></span>
                        <input type="text" name="_images_urls[alt][]" value="" autocomplete="off">
                    </label>
                    <label class="setting">
                        <span class="name"><?php esc_html_e( 'Link To URL', 'carousel-slider' ); ?></span>
                        <input type="text" name="_images_urls[link_url][]" value="" autocomplete="off">
                    </label>
                    <div class="actions">
                        <span><span class="dashicons dashicons-move"></span></span>
                        <span class="add_row"><span class="dashicons dashicons-plus-alt"></span></span>
                        <span class="delete_row"><span class="dashicons dashicons-trash"></span></span>
                    </div>
                </div>
            </template>
			<?php
		}

		/**
		 * Check if it should load frontend scripts
		 *
		 * @return boolean
		 */
		private function should_load_scripts() {
			global $post;
			$load_scripts = is_active_widget( false, false, 'widget_carousel_slider', true ) ||
			                ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'carousel_slide' ) ) ||
			                ( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'carousel' ) );

			return apply_filters( 'carousel_slider_load_scripts', $load_scripts );
		}
	}

endif;

Carousel_Slider_Script::init();
