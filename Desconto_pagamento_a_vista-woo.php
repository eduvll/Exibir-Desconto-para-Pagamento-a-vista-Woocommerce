<?php
/**
 * Plugin Name: Exibir Desconto para Pagamento à vista - Woocommerce
 * Plugin URI: http://www.evcode.com.br
 * Description: Display price in single product page with discount for cash payment.
 * Author: EVCODE
 * Author URI: http://evcode.com.br
 * Version: 1.0
 */

function price_discount () {
	global $product;
	$currency = get_woocommerce_currency_symbol();	
	$desc = 10 / 100;
	$price = $product->get_price_including_tax();
	$price_disc = $price * $desc;
	$final_price = $price - $price_disc;
	echo '<div class="price_disc_cash"><p>ou '.$currency.' '.number_format($final_price, 2, ',', '.').' para pagamento à vista</p></div>';
}

add_action ('ocean_after_single_product_price', 'price_discount');
