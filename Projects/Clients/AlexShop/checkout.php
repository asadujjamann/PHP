<?php












/////////////////////////////////////// 04-Jan-2025   07:22am

// Code to Insert Elementor Shortcode Before Billing Fields
add_action('woocommerce_checkout_billing', function () {
    // Check if the Elementor plugin is active and shortcode function exists
    if (class_exists('Elementor\Plugin') && shortcode_exists('elementor-template')) {
        echo do_shortcode('[elementor-template id="7211"]');
    } else {
        echo '<p>Elementor plugin or shortcode is not available.</p>';
    }
}, 5); // Priority set to 5 to ensure it runs before the billing fields





// Custom WooCommerce checkout order table
add_action('woocommerce_checkout_before_order_review', function () {
    // Remove the default WooCommerce order review table
    remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);
});

add_action('woocommerce_checkout_order_review', function () {
    // Get cart items
    $cart_items = WC()->cart->get_cart();
    $total_quantity = array_sum(array_column($cart_items, 'quantity'));
    $cart_subtotal = WC()->cart->get_cart_subtotal();
    $shipping_total = wc_price(WC()->cart->get_shipping_total());
    $order_total = WC()->cart->get_total();
?>
    <div class="products-detail-wrapper">
        <h3 class="total-quantity">Products <span>(<?= esc_html($total_quantity); ?>)</span></h3>
        <div class="products-detail">
            <?php foreach ($cart_items as $cart_item):
                $product = $cart_item['data'];
                $quantity = $cart_item['quantity'];
                $image = $product->get_image();
                $name = $product->get_name();
            ?>
                <div class="cart_item">
                    <div class="product-image"><?= $image; ?></div>
                    <div class="product-name">
                        <?= esc_html($name); ?>
                        <strong class="product-quantity"> ×&nbsp;<?= esc_html($quantity); ?></strong>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="order-totals-wrapper">
        <h3 class="order-totals-text">Order Totals</h3>
        <div class="order-totals-details">
            <div class="cart-subtotal order-totals-item">
                <span class="subtotal-text">Subtotal</span>
                <?= $cart_subtotal; ?>
            </div>
            <div class="woocommerce-shipping-totals order-totals-item">
                <span class="shipping-text">Shipping</span>
                <?= $shipping_total; ?>
            </div>
            <div class="order-total order-totals-item">
                <span class="order-total-text">Total</span>
                <?= $order_total; ?>
            </div>
        </div>
    </div>
<?php
});




/*
// Custom Woocommerce checkout order table
add_action('woocommerce_checkout_before_order_review', function () {
    // Remove the default WooCommerce order review table
    remove_action('woocommerce_checkout_order_review', 'woocommerce_order_review', 10);
});

add_action('woocommerce_checkout_order_review', function () {
    // Get cart items
    $cart_items = WC()->cart->get_cart();
    $total_quantity = array_sum(array_column($cart_items, 'quantity'));

    // Start custom table
    echo '<div class="products-detail-wrapper">';
    echo '<h3 class="total-quantity">Products <span>(' . esc_html($total_quantity) . ')</span></h3>';
    echo '<div class="products-detail">';

    // Loop through cart items
    foreach ($cart_items as $cart_item) {
        $product = $cart_item['data'];
        $quantity = $cart_item['quantity'];
        $image = $product->get_image();
        $name = $product->get_name();

        echo '<div class="cart_item">';
        echo '<div class="product-image">' . $image . '</div>';
        echo '<div class="product-name">' . esc_html($name) . '<strong class="product-quantity"> ×&nbsp;' . esc_html($quantity) . '</strong></div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';

    // Order totals section
    echo '<div class="order-totals-wrapper">';
    echo '<h3 class="order-totals-text">Order Totals</h3>';
	echo '<div class="order-totals-detials">';

    // Subtotal
    echo '<div class="cart-subtotal order-totals-item">';
    echo '<span class="subtotal-text">Subtotal</span>';
    echo WC()->cart->get_cart_subtotal();
    echo '</div>';

    // Shipping
    $shipping_total = WC()->cart->get_shipping_total();
    echo '<div class="woocommerce-shipping-totals order-totals-item">';
    echo '<span class="shipping-text">Shipping</span>';
    echo wc_price($shipping_total);
    echo '</div>';

    // Total
    $total = WC()->cart->get_total();
    echo '<div class="order-total order-totals-item">';
    echo '<span class="order-total-text">Total</span>';
    echo $total;
    echo '</div>';

    echo '</div>';
	echo '</div>';
});
*/











?>






<?php
add_action('wp_footer', function () {
    if (is_checkout()) {
    ?>
	<script>

	</script>
	<?php
    }
});
?>

