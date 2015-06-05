<?php
/**
 * Plugin name: Lasso SEO
 * Version: 0.0.1
 */

/**
 * Load add-on
 */
add_action( 'plugins_loaded', function() {
	//@todo update to 0.9.5 when it gets updated in core
	if ( defined( 'LASSO_VERSION' ) && 0 >= version_compare( LASSO_VERSION, '0.9.4.1' ) ) {
		new Lasso_SEO();
	}

}, 50 );

class Lasso_SEO {

	/**
	 * Name of meta field for SEO Title
	 *
	 * @since 0.0.1
	 *
	 * @todo set dynamically based on current SEO plugin.
	 *
	 * @var string
	 */
	public $title_field = '_yoast_wpseo_title';

	/**
	 * Name of meta field for SEO description
	 *
	 * @since 0.0.1
	 *
	 * @todo set dynamically based on current SEO plugin.
	 *
	 * @var string
	 */
	public $desc_field = '_yoast_wpseo_metadesc';

	/**
	 * Consturctor for class
	 *
	 * @since 0.0.1
	 */
	public function __construct() {
		add_filter( 'lasso_modal_tabs', array( $this, 'the_tabs' ) );
		add_action( 'init', array( $this, 'register_fields' ) );
	}

	/**
	 * Register the tab
	 *
	 * @uses "lasso_modal_tabs" filter
	 *
	 * @since 0.0.1
	 *
	 * @param $tabs
	 *
	 * @return array
	 */
	public function the_tabs( $tabs ) {
		$tabs[] = array(
			'name'     => 'SEO',
			'content' => array( $this, 'content_cb' ),
			'options'    => array($this, 'options_cb' ),
		);

		return $tabs;

	}

	/**
	 * Register fields to be saved.
	 *
	 * @since 0.0.1
	 */
	public function register_fields() {
		$fields = array(
			$this->title_field => array('trim','sanitize_text_field'),
			$this->desc_field => array('trim','sanitize_text_field'),
		);

		new \lasso_public_facing\register_meta_field( $fields );

	}

	/**
	 * Create UI
	 *
	 * @since 0.0.1
	 *
	 * @return string
	 */
	public function content_cb() {
		ob_start();

		?>
		<div>
			<?php _e( 'SEO Fields', 'lasso-seo' ); ?>
		</div>

		<?php

		return ob_get_clean();
	}

	/**
	 * Define options for metabox
	 *
	 * @since 0.0.1
	 *
	 * @return array
	 */
	public function options_cb() {
		$options = array(
			array(
				'id'            => $this->title_field,
				'name'          => __( 'SEO Title', 'lasso-seo'),
				'type'          => 'text',
				'default'       => 'default',
				'desc'          => __( 'SEO Title', 'lasso-seo'),
			),
			array(
				'id'           => $this->desc_field,
				'name'         => __( 'SEO Description', 'lasso-seo'),
				'type'          => 'textarea',
				'default'       => 'default',
				'desc'          => __( 'SEO Description Max Characters: ?', 'lasso-seo' ),
			)
		);

		return $options;

	}

}
