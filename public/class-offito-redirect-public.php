<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.offito.com
 * @since      1.0.0
 *
 * @package    Offito_Redirect
 * @subpackage Offito_Redirect/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Offito_Redirect
 * @subpackage Offito_Redirect/public
 * @author     Tomáš Tyleček <tomas@offito.com>
 */
class Offito_Redirect_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->offito_options = get_option($this->plugin_name);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Offito_Redirect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Offito_Redirect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/offito-redirect-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Offito_Redirect_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Offito_Redirect_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/offito-redirect-public.js', array( 'jquery' ), $this->version, false );

	}

	private function startsWith($haystack, $needle)
	{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
	}

	public function offito_redirect() {
		if($this->offito_options['subdomain']){
			$subdomain = $this->offito_options['subdomain'];
			$redirectURL = "";
			$shouldRedirect = false;

			$uri = $_SERVER['REQUEST_URI'];

			$toTest = array(
				'/confirm/',
				'/recovery/',
				'/s/',
				'/recoverysubmit',
				'/reminder/',
			);

			foreach ($toTest as $value) {
				if ($this->startsWith($uri, $value)) {
					$shouldRedirect = true;
					$redirectURL = sprintf("%s%s", $subdomain, $uri);
					break;
				}
			}

			if ($shouldRedirect) {
				wp_redirect( $redirectURL, 302 );
				exit();
			}
		}
	}

}
