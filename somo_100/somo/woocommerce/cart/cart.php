<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="row">
  <form class="woocommerce-cart-form col-12 col-md-7 col-lg-8" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <?php do_action( 'woocommerce_before_cart_table' ); ?>

    <table class="shop_product_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
      <tbody>
        <?php do_action( 'woocommerce_before_cart_contents' ); ?>

        <?php
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
          $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
          $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

          if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
            ?>
            <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

              <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'somo' ); ?>">
                <div class="d-flex">
                  <div class="img">
                    <?php
                      echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                        '<a href="%s" class="remove-button essential-set-multiply" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>',
                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                        esc_html__( 'Remove this item', 'somo' ),
                        esc_attr( $product_id ),
                        esc_attr( $_product->get_sku() )
                      ), $cart_item_key );
                    
                      $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                      echo wp_kses($thumbnail, 'post');
                    ?>
                  </div>
                  <div class="p-content">
                    <?php
                    if ( ! $product_permalink ) {
                      echo wp_kses( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;', 'post' );
                    } else {
                      echo wp_kses( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ), 'post' );
                    }

                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                    echo wc_get_product_category_list( $_product->get_id(), ', ', '<div class="categories"><span>#</span>', '</div>' );

                    // Backorder notification.
                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                      echo wp_kses( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'somo' ) . '</p>', $product_id ), 'post' );
                    }
                    ?>
                  </div>
                </div>
              </td>

              <td class="product-price" data-title="<?php esc_attr_e( 'Price', 'somo' ); ?>">
                <?php
                  echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                ?>
              </td>

              <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'somo' ); ?>">
              <?php
              if ( $_product->is_sold_individually() ) {
                $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
              } else {
                $product_quantity = woocommerce_quantity_input( array(
                  'input_name'   => "cart[{$cart_item_key}][qty]",
                  'input_value'  => $cart_item['quantity'],
                  'max_value'    => $_product->get_max_purchase_quantity(),
                  'min_value'    => '0',
                  'product_name' => $_product->get_name(),
                ), $_product, false );
              }

              echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
              ?>
              </td>

              <td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'somo' ); ?>">
                <?php
                  echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                ?>
              </td>
            </tr>
            <?php
          }
        }
        ?>

        <?php do_action( 'woocommerce_cart_contents' ); ?>

        <tr>
          <td colspan="6" class="actions">
            <div class="d-flex justify-content-between">
              <?php if ( wc_coupons_enabled() ) { ?>
                <div class="coupon">
                  <label for="coupon_code"><?php esc_html_e( 'Coupon:', 'somo' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" placeholder="<?php esc_attr_e( 'Enter Coupon...', 'somo' ); ?>" /> <button type="submit" name="apply_coupon"><i class="pointers-right-arrow"></i></button>
                  <?php do_action( 'woocommerce_cart_coupon' ); ?>
                </div>
              <?php } ?>

              <?php do_action( 'woocommerce_cart_actions' ); ?>

              <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

              <button type="submit" class="button-style1" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'somo' ); ?>"><i class="pointers-right-arrow"></i><span><?php esc_html_e( 'Update cart', 'somo' ); ?></span></button>
            </div>
          </td>
        </tr>

        <?php do_action( 'woocommerce_after_cart_contents' ); ?>
      </tbody>
    </table>
    <?php do_action( 'woocommerce_after_cart_table' ); ?>
  </form>
  
  <div class="col-12 col-md-5 col-lg-4">
    <div class="cart-collaterals">
      <?php
        /**
         * Cart collaterals hook.
         *
         * @hooked woocommerce_cross_sell_display
         * @hooked woocommerce_cart_totals - 10
         */
        do_action( 'woocommerce_cart_collaterals' );
      ?>
    </div>
  </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
