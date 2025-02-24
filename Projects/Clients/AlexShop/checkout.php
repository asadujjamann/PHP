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















<?php
/////////////////////////////////// Checkout Page full codes (14-Jan-2025) /////////////////////////////

// Code to Insert Elementor Shortcode Before Billing Fields
add_action('woocommerce_checkout_shipping', function () {
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
				<?php
					// echo $shipping_total;
					// Use preg_replace to wrap the numeric value in a <span class="value"> tag
					$shipping_total = preg_replace(
						'/(<bdi>.*?<span class="woocommerce-Price-currencySymbol">.*?<\/span>)([\d.,]+)/',
						'$1<span class="shipping-value">$2</span>',
						$shipping_total
					);
					echo $shipping_total;
                ?>
			</div>

			<div class="order-total order-totals-item">
				<span class="order-total-text">Total</span>
				<?php
					// echo $order_total;
					// Apply the same logic to the order total if needed
					$order_total = preg_replace(
						'/(<bdi>.*?<span class="woocommerce-Price-currencySymbol">.*?<\/span>)([\d.,]+)/',
						'$1<span class="order-total-value">$2</span>',
						$order_total
					);
					echo $order_total;
                ?>
			</div>
			
        </div>
    </div>
    <?php
});





add_action('woocommerce_after_checkout_billing_form', 'add_bill_to_different_address_checkbox');
function add_bill_to_different_address_checkbox($checkout) {
    echo '<div id="bill-to-different-address-wrapper">';
    woocommerce_form_field('bill_to_different_address', [
        'type'    => 'checkbox',
        'class'   => ['form-row-wide'],
        'label'   => 'Bill to a different address?',
        'default' => false,
    ], $checkout->get_value('bill_to_different_address'));
    echo '</div>';
}


add_action('wp_footer', function () {
    if (is_checkout()) {
        ?>
    <script>
        jQuery(document).ready(function ($) {

			// Select the element to move
			var orderReview2 = $(".custom-checkout .e-checkout__order_review-2");

			// Select the target container where it should be moved
			var customerDetails = $(".custom-checkout #customer_details");

			// Move the element
			if (orderReview2.length && customerDetails.length) {
				orderReview2.insertAfter(customerDetails);
			}
			
			
			// In Screen Resolution <= 767px, move the Order Totals After Shipping Address
			function moveAndStyleOrderTotals() {
				if ($(window).width() <= 767) {
					var orderTotals = $(".order-totals-wrapper");
					var shippingAddress = $(".shipping_address");

					// Move the element only if both exist and it's not already moved
					if (orderTotals.length && shippingAddress.length && !orderTotals.next(".order-totals-wrapper").length) {
						orderTotals.insertAfter(shippingAddress);

						// Add CSS styles
						orderTotals.css({
							"margin-top": "10px",
							"margin-bottom": "40px",
							"padding-left": "20px",
							"padding-right": "20px",
						});
					}
				}
			}
			// Run on page load
			moveAndStyleOrderTotals();
			
			// Run on window resize
			$(window).on("resize", function () {
				moveAndStyleOrderTotals();
			});

			

			
            const billingFields = $('.woocommerce-billing-fields__field-wrapper');
            const billToCheckbox = $('input[name="bill_to_different_address"]');

            // Initially hide billing fields if the checkbox is unchecked
            if (!billToCheckbox.is(':checked')) {
                billingFields.hide();
            }

            // Toggle visibility on checkbox change
            billToCheckbox.on('change', function () {
                if ($(this).is(':checked')) {
                    billingFields.show();
                } else {
                    billingFields.hide();
                }
            });

			
			// Function to update order totals
			function updateOrderTotals() {
				// Get the selected shipping price
				const selectedShippingLabel = $('.woocommerce-shipping-methods input[type="radio"]:checked')
					.siblings('label');

				let selectedShipping = selectedShippingLabel.find('.shipping-price-value').text();

				// Check if the selectedShipping is a valid number, otherwise default to 0
				const shippingValue = parseFloat(selectedShipping) || 0;

				// Update the shipping value in the Order Totals section
				$('.shipping-value').text(shippingValue.toFixed(2));

				// Get the subtotal value
				const subtotal = parseFloat($('.cart-subtotal .woocommerce-Price-amount .woocommerce-Price-currencySymbol').parent().text().replace('$', '').trim());

				// Calculate and update the total
				const totalValue = subtotal + shippingValue;
				$('.order-total-value').text(totalValue.toFixed(2));
			}

			// Listen for changes in the shipping method
			$(document).on('change', '.woocommerce-shipping-methods input[type="radio"]', function () {
				updateOrderTotals();
			});

			// Initial update (if needed on page load)
			updateOrderTotals();


			


			
        });
    </script>
        <?php
    }
});




add_filter('woocommerce_checkout_fields', 'customize_checkout_fields');
function customize_checkout_fields($fields) {
	// Define the personal information heading
    $fields['shipping']['personal_information_heading'] = [
        'type'     => 'heading',
        'label'    => '<h4 class="personal-info-heading">Personal Information</h4>',
        'priority' => 5,
    ];
	
    // Add First Name
    $fields['shipping']['shipping_first_name'] = [
        'type'        => 'text',
        'label'       => '',
        'placeholder' => 'First Name',
        'required'    => true,
        'priority'    => 6,
    ];

    // Add Last Name
    $fields['shipping']['shipping_last_name'] = [
        'type'        => 'text',
        'label'       => '',
        'placeholder' => 'Last Name',
        'required'    => true,
        'priority'    => 7,
    ];

    // Add heading for Contact Information
    $fields['shipping']['contact_information_heading'] = [
        'type'     => 'heading',
        'label'    => '<h4 class="contact-info-heading">Contact Information</h4>',
        'priority' => 25,
    ];

    // Add Phone
    $fields['shipping']['shipping_phone'] = [
        'type'        => 'text',
        'label'       => '',
        'placeholder' => 'Phone',
        'required'    => true,
        'priority'    => 26,
    ];

    // Add Email
    $fields['shipping']['shipping_email'] = [
        'type'        => 'email',
        'placeholder' => 'Email',
        'required'    => true,
        'priority'    => 27,
    ];

	// Contact Information Note
    $fields['shipping']['contact_information_note'] = [
        'type'     => 'heading',
        'label'    => '<div class="contact-info-note">You will receive a notification when your order has been processed.</div>',
        'priority' => 28,
    ];
	
	// Add a new heading for Practitioner Information
    $fields['shipping']['practitioner_information'] = [
        'type'     => 'heading',
        'priority' => 29, // Adjust the position before Shipping Method
    ];
	
	// Add a placeholder field for shipping methods
    $fields['shipping']['custom_shipping_methods'] = [
        'type'     => 'heading',
        'label'    => '',
        'class'    => ['form-row', 'custom-shipping-methods'],
        'priority' => 30,
    ];
	
    // Add heading for Shipping Address
    $fields['shipping']['shipping_address_heading'] = [
        'type'     => 'heading',
        'label'    => '<h4 class="shipping-address-heading">Shipping Address</h4>',
        'priority' => 35,
    ];

	

	// List of fields to remove labels from
    $fields_to_remove_labels = [
        'billing_country', 
		'billing_state', 
		'billing_address_1', 
		'billing_address_2', 
        'billing_city', 
		'billing_postcode',
        'shipping_country',
		'shipping_state', 
		'shipping_address_1', 
		'shipping_address_2', 
        'shipping_city', 
		'shipping_postcode'
	];
    // Loop through each field type (billing, shipping, etc.)
    foreach ($fields as $section => &$section_fields) {
        foreach ($fields_to_remove_labels as $field_key) {
            // Check if the field exists in the current section and remove its label
            if (isset($section_fields[$field_key])) {
                $section_fields[$field_key]['label'] = '';
            }
        }
    }
	
	// Remove Billing Address 2
    if (isset($fields['billing']['billing_address_2'])) {
        unset($fields['billing']['billing_address_2']);
    }
	// Remove Billing First Name
	if (isset($fields['billing']['billing_first_name'])) {
        unset($fields['billing']['billing_first_name']);
    }
	// Remove Billing Last Name
	if (isset($fields['billing']['billing_last_name'])) {
        unset($fields['billing']['billing_last_name']);
    }
	// Remove Billing Phone
	if (isset($fields['billing']['billing_phone'])) {
        unset($fields['billing']['billing_phone']);
    }
	// Remove Billing Email
	if (isset($fields['billing']['billing_email'])) {
        unset($fields['billing']['billing_email']);
    }

    // Remove Shipping Address 2
    if (isset($fields['shipping']['shipping_address_2'])) {
        unset($fields['shipping']['shipping_address_2']);
    }


    return $fields;
}


// Render Custom Headings
add_filter('woocommerce_form_field_heading', 'render_heading_field', 10, 4);
function render_heading_field($field, $key, $args, $value) {
    if (!empty($args['label'])) {
        // Generate the class dynamically based on the field key
        $custom_class = 'custom-' . sanitize_html_class($key);
        
        // Add the custom class to the heading
        $field = '<div class="form-row custom-heading ' . $custom_class . '">' . $args['label'] . '</div>';
    }
	
	if ($key === 'custom_shipping_methods') { // Adjust to match the correct key
        // Check if the shipping section is visible
        if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) {
            echo '<div class="form-row custom-shipping-methods">';
            do_action('woocommerce_review_order_before_shipping');
            wc_cart_totals_shipping_html();
            do_action('woocommerce_review_order_after_shipping');
            echo '</div>';
        }
    }
	
	if ($key === 'practitioner_information') {
        // Get Current User ID
        $user_id = get_current_user_id();

        // Get Practitioner Name & Photo using ACF
        $practitioner_name = get_field('primary_practitioner', 'user_' . $user_id);
        $practitioner_photo = get_field('practitioner_photo', 'user_' . $user_id);

        // Set default name if empty
        if (!$practitioner_name) {
            $practitioner_name = 'No Practitioner Assigned';
        }

        // ACF Image Field (Handles ID, Array, or URL)
        if (is_array($practitioner_photo) && isset($practitioner_photo['url'])) {
            $practitioner_photo_url = $practitioner_photo['url']; // Image Array
        } elseif (is_numeric($practitioner_photo)) {
            $practitioner_photo_url = wp_get_attachment_url($practitioner_photo); // Image ID
        } else {
            $practitioner_photo_url = $practitioner_photo; // Direct URL
        }

        // Create Practitioner Info HTML
        $field = '<div class="form-row custom-practitioner-info">';
        $field .= '<h4 class="practitioner-heading">Practitioner Information</h4>';
        $field .= '<div class="practitioner-details">';
		// Show image only if set
        if ($practitioner_photo_url) {
			$field .= '<div class="practitioner-photo"> <img src="' . esc_url($practitioner_photo_url) . '" alt="' . esc_attr($practitioner_name) . '" class="practitioner-photo" style="max-height:64px;"> </div>';
		}
        
        $field .= '<div class="practitioner-name">' . esc_html($practitioner_name) . '</div>';
        $field .= '</div>';
        $field .= '</div>';
    }
	
    return $field;
}


// Change the heading 'Shipping' to 'Shipping Method'
add_filter('woocommerce_shipping_package_name', 'custom_shipping_package_name', 10, 3);
function custom_shipping_package_name($package_name, $i, $package) {
    return 'Shipping Method';
}



add_filter('woocommerce_cart_shipping_method_full_label', 'customize_shipping_method_label', 10, 2);
function customize_shipping_method_label($label, $method) {
    // Use regex to find and wrap the price part in a <span> tag with a class
    $label = preg_replace(
        '/(<span class="woocommerce-Price-amount amount">.*?<bdi>.*?<span class="woocommerce-Price-currencySymbol">.*?<\/span>)([\d.,]+)(<\/bdi><\/span>)/',
        '$1<span class="shipping-price-value">$2</span>$3',
        $label
    );

    return $label;
}







?>





























<!-- For Testing .................. -->

<div class="custom-checkout">
    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="https://shop.alexfisherhealth.com.au/checkout/" enctype="multipart/form-data" aria-label="Checkout" novalidate="novalidate">
        <div class="e-checkout__container">
            <div class="e-checkout__column e-checkout__column-start">
                <div class="col2-set" id="customer_details">
                    <div class="col-1"></div>
                    <div class="col-2">
                        <div data-elementor-type="container" data-elementor-id="7211" class="elementor elementor-7211" data-elementor-post-type="elementor_library"></div>
                        <div class="woocommerce-shipping-fields"></div>
                    </div>
                </div>
            </div>
            <div class="e-checkout__column e-checkout__column-end">
                <div class="e-checkout__column-inner e-sticky-right-column">
                    <div class="e-checkout__order_review"></div>
                </div>
            </div>
        </div>
    </form>
</div>



<!-- For Testing ...................... -->
<?php 


add_filter('woocommerce_checkout_fields', 'customize_checkout_fields');
function customize_checkout_fields($fields) {
	
	// Add a new heading for Practitioner Information
    $fields['shipping']['practitioner_information'] = [
        'type'     => 'heading',
        'priority' => 29, // Adjust the position before Shipping Method
    ];

    return $fields;
}


// Render Custom Headings
add_filter('woocommerce_form_field_heading', 'render_heading_field', 10, 4);
function render_heading_field($field, $key, $args, $value) {

	if ($key === 'practitioner_information') {
        // Get Current User ID
        $user_id = get_current_user_id();

        // Get Practitioner Name & Photo using ACF
        $practitioner_name = get_field('primary_practitioner', 'user_' . $user_id);
        $practitioner_photo = get_field('practitioner_photo', 'user_' . $user_id);

        // Set default name if empty
        if (!$practitioner_name) {
            $practitioner_name = 'No Practitioner Assigned';
        }

        // ACF Image Field (Handles ID, Array, or URL)
        if (is_array($practitioner_photo) && isset($practitioner_photo['url'])) {
            $practitioner_photo_url = $practitioner_photo['url']; // Image Array
        } elseif (is_numeric($practitioner_photo)) {
            $practitioner_photo_url = wp_get_attachment_url($practitioner_photo); // Image ID
        } else {
            $practitioner_photo_url = $practitioner_photo; // Direct URL
        }

        // Create Practitioner Info HTML
        $field = '<div class="form-row custom-practitioner-info">';
        $field .= '<h4 class="practitioner-heading">Practitioner Information</h4>';
        $field .= '<div class="practitioner-details">';
		// Show image only if set
        if ($practitioner_photo_url) {
			$field .= '<div class="practitioner-photo"> <img src="' . esc_url($practitioner_photo_url) . '" alt="' . esc_attr($practitioner_name) . '" class="practitioner-photo" style="max-height:64px;"> </div>';
		}
        
        $field .= '<div class="practitioner-name">' . esc_html($practitioner_name) . '</div>';
        $field .= '</div>';
        $field .= '</div>';
    }
	
    return $field;
}


?>
























