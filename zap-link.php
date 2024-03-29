<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mudarisso.com.br
 * @since             1.0.0
 * @package           Zap_Link
 *
 * @wordpress-plugin
 * Plugin Name:       Zap Link
 * Plugin URI:        https://mudarisso.com
 * Description:       mudar descricao
 * Version:           1.0.0
 * Author:            Paul Pessoa
 * Author URI:        https://mudarisso.com.br/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       zap-link
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ZAP_LINK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-zap-link-activator.php
 */
function activate_zap_link() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zap-link-activator.php';
	Zap_Link_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-zap-link-deactivator.php
 */
function deactivate_zap_link() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-zap-link-deactivator.php';
	Zap_Link_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_zap_link' );
register_deactivation_hook( __FILE__, 'deactivate_zap_link' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-zap-link.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */



// Botão WhatsApp Agrocentro
function product_title_whatsapp_link_shortcode() {
    // Verifica se estamos em uma página de produto WooCommerce
    global $product;

    if ( ! is_a( $product, 'WC_Product' ) ) {
        return ''; // Retorna vazio se não for um objeto válido de produto
    }    

    // Obtém o título do produto
    $product_title = $product->get_title();
    $product_price = $product->get_price();
    
    // URL base do link do WhatsApp
    $whatsapp_base_url = 'https://api.whatsapp.com/send?phone=558184900495&text=';
    
    // Constrói o texto da mensagem com o título do produto
    $message_text = "Oi, gostaria de mais informações.\n *Produto:* " . $product_title . ".\n *Valor:* " . $product_price;
    
    // URL final do link do WhatsApp com o texto da mensagem codificado
    $whatsapp_url = $whatsapp_base_url . urlencode($message_text);
    
 $styles = '
    <style>
        .muitobem {
              background-color: #0FA80F!important;
			  color: #FFFFFF;
			  text-decoration: none;
			  padding: 10px 20px;
			  border-radius: 5px;
			  font-family: "Red Hat Display";
			  transition: background-color 0.3s ease;
			  width: 100%; 
			  box-sizing: border-box;
        }
        .muitobem:hover {
		 	color: #FFFFFF;
            background-color: #055E05!important;
        }
	.seila{
		color: "red"!important;
		background-color: "blue"!important;
		margin-right: 5px;
		width: 14px;
		height: 14px;
        color: #FFFFFF;

	}
    </style>
    ';

    // Retorna o link do WhatsApp
return $styles . '<a target="_blank" href="' . $whatsapp_url . '" class="muitobem" style="display: flex; align-items: center;"> 
				<svg aria-hidden="true" class="seila" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg" style="fill: white; margin-right: 10px;">
                    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                </svg>
                Comprar no Whatsapp
            </a>';
}
add_shortcode('whatsapp_product', 'product_title_whatsapp_link_shortcode');