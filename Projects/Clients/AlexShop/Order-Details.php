



<?php 
// Running code with Practitioner

add_action('woocommerce_order_details_after_order_table', 'custom_order_details', 10, 1);
function custom_order_details($order) {
    // Ensure $order is a WC_Order object
    if (!is_a($order, 'WC_Order')) {
        return;
    }

    // Get Order Data
    $order_id = $order->get_id();
    $created_date = wc_format_datetime($order->get_date_created());
    $billing_address = $order->get_formatted_billing_address();
    $contact_email = $order->get_billing_email();
    $contact_phone = $order->get_billing_phone();
    $order_again_url = wc_get_endpoint_url('cart', '', wc_get_page_permalink('cart')) . '?order_again=' . $order_id . '&_wpnonce=' . wp_create_nonce('woocommerce-order_again');

    // Get customer ID from the order
    $customer_id = $order->get_user_id();

	// Retrieve practitioner name and photo using ACF
	$practitioner_name = get_field('primary_practitioner', 'user_' . $customer_id); // ACF key: field_675cb285bcab6
	$practitioner_photo_id = get_field('practitioner_photo', 'user_' . $customer_id); // ACF key: field_6791d8ff55e2a

	// Get image URL from the photo ID
	$practitioner_photo_url = $practitioner_photo_id ? wp_get_attachment_url($practitioner_photo_id) : '';

    // Start Outputting Custom HTML
    ?>
    <div class="custom-order-details">
        <div class="back-to-my-orders">
            <a href="<?php echo esc_url(wc_get_endpoint_url('orders', '', wc_get_page_permalink('myaccount'))); ?>">
                <img src="https://shop.alexfisherhealth.com.au/wp-content/uploads/2025/01/Left-Angle.svg" alt="Left Angle Icon">
                My Orders
            </a>
        </div>
        
        <span class="order-text-number">
            <span class="order-text">Order </span><span class="order-number">#<?php echo $order_id; ?></span>
        </span>
        <span class="order-status"><?php echo ucfirst($order->get_status()); ?></span>
        
        <div class="order-actions">
            <a class="btn btn-download-invoice" href="<?php echo do_shortcode('[wcpdf_document_link]')?>" target="_blank">Download Invoice</a>
            <?php
                if ($order->get_status() === 'completed') {
                    $nonce = wp_create_nonce('woocommerce-order_again');
                    echo '<a href="' . esc_url($order_again_url) . '" class="btn btn-order-again">Order Again</a>';
                }
            ?>
        </div>

        <div class="user-and-products-info">
            <div class="user-info">
                <div class="created-date">
                    <h4 class="created-date-heading">Created Date:</h4>
                    <span class="created-date-value"><?php echo esc_html($created_date); ?></span>
                </div>
                <div class="practitioner-info">
                    <h4 class="practitioner-info-heading">Practitioner</h4>
                    <?php if ($practitioner_name || $practitioner_photo_url): ?>
                        <div class="practitioner-details">
                            <?php if ($practitioner_photo_url): ?>
                                <div class="practitioner-photo">
                                    <img src="<?php echo esc_url($practitioner_photo_url); ?>" 
                                         alt="<?php echo esc_attr($practitioner_name); ?>" >
                                </div>
                            <?php endif; ?>
                            <?php if ($practitioner_name): ?>
                                <div class="practitioner-name"><?php echo esc_html($practitioner_name); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <p>No Practitioner Information Available.</p>
                    <?php endif; ?>
                </div>
                <div class="billing-address">
                    <h4 class="billing-address-heading">Billing Address</h4>
                    <div class="billing-address-content"><?php echo wp_kses_post($billing_address); ?></div>
                </div>
                <div class="contact-info">
                    <h4 class="contact-info-heading">Contact Information</h4>
                    <div class="contact-phone"><?php echo esc_html($contact_phone); ?></div>
                    <div class="contact-email"><?php echo esc_html($contact_email); ?></div>
                </div>
            </div>
            <div class="products-info">
                <div class="products-table-wrapper">
                    <table class="products-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Units</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order->get_items() as $item_id => $item): 
                                $product = $item->get_product();
                                ?>
                                <tr>
                                    <td>
                                        <div class="product-image-and-name">
                                            <?php if ($product): ?>
                                                <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" 
                                                     alt="<?php echo esc_html($item->get_name()); ?>" >
                                            <?php endif; ?>
                                            <span class="product-name"><?php echo esc_html($item->get_name()); ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo $item->get_quantity(); ?></td>
                                    <td><?php echo wc_price($item->get_total()); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="order-totals">
                    <div><span class="subtotal-heading">Subtotal</span> <?php echo wc_price($order->get_subtotal());?></div>
                    <div><span class="shipping-heading">Shipping</span><?php echo wc_price($order->get_shipping_total());?></div>
                    <div><span class="total-heading">Total</span> <?php echo wc_price($order->get_total());?></div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .woocommerce-MyAccount-content-wrapper > p,
        .woocommerce-order-details .woocommerce-order-details__title,
        .woocommerce-order-details .woocommerce-table--order-details,
        .woocommerce-order-details .order-again,
        .woocommerce-MyAccount-content-wrapper .woocommerce-customer-details {
            display: none !important;
        }
    </style>
    <?php
}




?>


















<?php 

// Previous code without Practitioner

add_action('woocommerce_order_details_after_order_table', 'custom_order_details', 10, 1);
function custom_order_details($order) {
    // Ensure $order is a WC_Order object
    if (!is_a($order, 'WC_Order')) {
        return;
    }

    // Get Order Data
    $order_id = $order->get_id();
    $created_date = wc_format_datetime($order->get_date_created());
    $billing_address = $order->get_formatted_billing_address();
    $contact_email = $order->get_billing_email();
    $contact_phone = $order->get_billing_phone();
    $order_again_url = wc_get_endpoint_url('cart', '', wc_get_page_permalink('cart')) . '?order_again=' . $order_id . '&_wpnonce=' . wp_create_nonce('woocommerce-order_again');

    // Start Outputting Custom HTML
    ?>
    <div class="custom-order-details">
        <div class="back-to-my-orders">
            <a href="<?php echo esc_url(wc_get_endpoint_url('orders', '', wc_get_page_permalink('myaccount'))); ?>">
                <img src="https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/11/Left-Angle-Icon-for-AF-Health-Shop-Naturopath-Adelaide-Clinic.svg" alt="Left Angle Icon">
                My Orders
            </a>
        </div>
		
		<span class="order-text-number">
			<span class="order-text">Order </span><span class="order-number">#<?php echo $order_id; ?></span>
		</span>
		<span class="order-status"><?php echo ucfirst($order->get_status()); ?></span>
		
        <div class="order-actions">
            <a class="btn btn-download-invoice" href="<?php echo do_shortcode('[wcpdf_document_link]')?>" target="_blank">Download Invoice</a>
			<?php
				if ($order->get_status() === 'completed') {
					$order_id = $order->get_id();
					$nonce = wp_create_nonce('woocommerce-order_again');

					echo '<a href="' . esc_url(wc_get_endpoint_url('cart', '', wc_get_page_permalink('myaccount')) . '?order_again=' . $order_id . '&_wpnonce=' . $nonce) . '" class="btn btn-order-again">Order Again</a>';
				}
			?>
        </div>

        <div class="user-and-products-info">
            <div class="user-info">
                <div class="created-date">
                    <h4 class="created-date-heading">Created Date:</h4>
                    <span class="created-date-value"><?php echo esc_html($created_date); ?></span>
                </div>
                <div class="practitioner-info">
                    <h4 class="practitioner-info-heading">Practitioner</h4>
                    <p><?php echo esc_html($practitioner); ?></p>
                </div>
                <div class="billing-address">
                    <h4 class="billing-address-heading">Billing Address</h4>
                    <div class="billing-address-content"><?php echo wp_kses_post($billing_address); ?></div>
                </div>
                <div class="contact-info">
                    <h4 class="contact-info-heading">Contact Information</h4>
                    <div class="contact-phone"><?php echo esc_html($contact_phone); ?></div>
                    <div class="contact-email"><?php echo esc_html($contact_email); ?></div>
                </div>
            </div>
            <div class="products-info">
                <div class="products-table-wrapper">
                    <table class="products-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Units</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($order->get_items() as $item_id => $item): 
                                $product = $item->get_product();
                                ?>
                                <tr>
                                    <td>
										<div class="product-image-and-name">
											<?php if ($product): ?>
												<img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" 
													 alt="<?php echo esc_html($item->get_name()); ?>" >
											<?php endif; ?>
											<span class="product-name"><?php echo esc_html($item->get_name()); ?></span>
										</div>
                                    </td>
                                    <td><?php echo $item->get_quantity(); ?></td>
                                    <td><?php echo wc_price($item->get_total()); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="order-totals">
                    <div><span class="subtotal-heading">Subtotal</span> <?php echo wc_price($order->get_subtotal());?></div>
                    <div><span class="shipping-heading">Shipping</span><?php echo wc_price($order->get_shipping_total());?></div>
                    <div><span class="total-heading">Total</span> <?php echo wc_price($order->get_total());?></div>
                </div>
            </div>
        </div>

        
    </div>



	<style>
		.woocommerce-MyAccount-content-wrapper > p,
		.woocommerce-order-details .woocommerce-order-details__title,
		.woocommerce-order-details .woocommerce-table--order-details,
		.woocommerce-order-details .order-again,
		.woocommerce-MyAccount-content-wrapper .woocommerce-customer-details{
			display: none !important;
		}
	</style>
    <?php
}







?>