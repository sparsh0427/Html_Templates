<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

switch (wc_get_loop_prop( 'columns' )) {
  case '1':
    $item_col = "col-12";
    break;
  case '2':
    $item_col = "col-12 col-sm-6";
    break;
  case '3':
    $item_col = "col-12 col-sm-6 col-md-4";
    break;
  case '4':
    $item_col = "col-12 col-sm-4 col-md-4 col-lg-3";
    break;

  default:
    $item_col = "";
    break;
}
?>
<li <?php wc_product_class($item_col, $product); ?>>
  <div class="product-wrap">
    <?php
    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
    do_action( 'woocommerce_before_shop_loop_item_title' );
    ?>
  </div>
</li>
