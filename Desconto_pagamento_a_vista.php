<?php
/**
 * Plugin Name: Exibir Desconto para Pagamento à vista - Woocommerce
 * Plugin URI: http://www.evcode.com.br
 * Description: Display price in single product page with discount for cash payment.
 * Author: EVCODE
 * Author URI: http://evcode.com.br
 * Version: 1.0
 */

global $woocommerce;

function price_discount () {
	$currency = get_woocommerce_currency_symbol();	
	$desc = 0.10;
	$price = get_post_meta( get_the_ID(), '_regular_price', true);
	$price_disc = $price * $desc;
	$final_price = $price - $price_disc;
	echo '<div class="price_disc_cash"><p>ou '.$currency.' '.$final_price.' para pagamento à vista</p></div>';
}

add_action ('ocean_after_single_product_price', 'price_discount');