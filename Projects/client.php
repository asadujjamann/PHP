
<?php





add_action('woocommerce_thankyou', 'custom_thank_you_page', 1);

function custom_thank_you_page($order_id) {
    // Remove default thank you content
    remove_action('woocommerce_thankyou', 'woocommerce_order_details_table', 10);
    remove_action('woocommerce_thankyou', 'woocommerce_thankyou_order_received_text', 10);

    if (!$order_id) return;

    $order = wc_get_order($order_id);	
    $items = $order->get_items();
    $totals = $order->get_order_item_totals();

    $billing_first_name = $order->get_billing_first_name();
    $billing_last_name = $order->get_billing_last_name();
    $billing_address_1 = $order->get_billing_address_1();
    $billing_address_2 = $order->get_billing_address_2();
    $billing_city = $order->get_billing_city();
    $billing_state = $order->get_billing_state();
    $billing_postcode = $order->get_billing_postcode();
    $billing_country = $order->get_billing_country();
    $billing_email = $order->get_billing_email();
    $billing_phone = $order->get_billing_phone();

    // Inject JS early to hide the section immediately
    echo '<script>
        (function() {
            // Hide both sections immediately
            var style = document.createElement("style");
            style.innerHTML = `
                .woocommerce-thankyou-order-details,
                .woocommerce-thankyou-order-received {
                    display: none !important;
                }
            `;
            document.head.appendChild(style);

            // Remove them from the DOM when available
            var interval = setInterval(function() {
                var details = document.querySelector(".woocommerce-thankyou-order-details");
                var received = document.querySelector(".woocommerce-thankyou-order-received");
                if (details) details.remove();
                if (received) received.remove();
                if (details || received) clearInterval(interval);
            }, 10);
        })();
    </script>';
?>
	<div class="custom-thank-you-wrapper">
        <div class="cty-order-status-section">
            <h5 class="cty-subtitle">Thank you for your purchase!</h5>
            <h1 class="cty-order-status">
                <img class="cty-order-status-icon" src="https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Check.svg" alt="Checked Icon">
                <span class="cty-order-status-text">Order Placed</span>
            </h1>
            <p class="cty-order-message">Your order has been successfully placed. You’ll receive a confirmation email shortly.</p>
        </div>

        <h3 class="cty-order-details-heading">Order Details</h3>

        <div class="cty-order-details-section">
            <div class="cty-product-list">
                <strong>Products (<?= count($items); ?>)</strong>

                <?php foreach ($items as $item):
                    $product = $item->get_product();
                    if (!$product) continue;
                    $product_image = $product->get_image([60, 60]);
                    $product_name = $item->get_name();
                    ?>
                    <div class="cty-product-item">
                        <div class="cty-product-image"><?= $product_image; ?></div>
                        <div class="cty-product-name"><?= esc_html($product_name); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <h3 class="cty-order-totals-heading">Order Totals</h3>
            <div class="cty-order-totals">
                <?php foreach ($totals as $key => $total):
                    $is_total = strtolower($key) === 'order_total';
                    $row_class = 'cty-total-row' . ($is_total ? ' total' : '');
                    ?>
                    <div class="<?= esc_attr($row_class); ?>">
                        <span><?= esc_html($total['label']); ?></span>
                        <span><?= wp_kses_post($total['value']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="cty-info-box">
                <div class="cty-info-section cty-billing-info-section">
                    <h4 class="cty-info-heading">Billing Address</h4>
                    <div class="cty-address-box">
                        <strong><?= esc_html($billing_first_name . ' ' . $billing_last_name); ?></strong><br>
                        <?= esc_html($billing_address_1); ?><br>
                        <?php if ($billing_address_2): ?><?= esc_html($billing_address_2); ?><br><?php endif; ?>
                        <?= esc_html($billing_city . ', ' . $billing_state); ?><br>
                        <?= esc_html($billing_postcode . ', ' . WC()->countries->countries[$billing_country]); ?><br>
                    </div>
                </div>

                <div class="cty-info-section cty-contact-info-section">
                    <h4 class="cty-info-contact-heading">Contact Information</h4>
                    <div class="cty-contact-detail cty-contact-phone"><?= esc_html($billing_phone); ?></div>
                    <div class="cty-contact-detail cty-contact-email"><?= esc_html($billing_email); ?></div>
                </div>
            </div>
        </div>

        <a class="cty-shop-button" href="<?= esc_url(wc_get_page_permalink('shop')); ?>">Continue Shopping</a>
    </div>

<?php
}







