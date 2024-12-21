






<?php 

// Running Codes

// /*
// For No Orders, this Elementor template will run
add_action('woocommerce_account_orders_endpoint', 'replace_orders_tab_with_elementor_templates');
function replace_orders_tab_with_elementor_templates() {
    // Get the current user orders
    $customer_orders = wc_get_orders(array(
        'customer_id' => get_current_user_id(),
        'status'      => array('wc-completed', 'wc-processing', 'wc-on-hold'),
        'limit'       => 1, // Only need to check if at least one order exists
    ));
	
    if (empty($customer_orders)) {
        // If no orders exist, display the template for no orders
        echo do_shortcode('[elementor-template id="6659"]'); // Replace 6659 with your actual template ID
    }
}
// */

/*
// This code also works.
// For No Orders, this Elementor template will run
add_action('woocommerce_account_orders_endpoint', function () {
    // Get current user orders
    $customer_orders = wc_get_orders([
        'customer' => get_current_user_id(),
        'limit'    => 1, // Check if at least one order exists
    ]);

    // If no orders exist, show the Elementor template
    if (empty($customer_orders)) {
        if (class_exists('Elementor\Plugin') && shortcode_exists('elementor-template')) {
            echo do_shortcode('[elementor-template id="6659"]');
        } else {
            echo '<p>No orders found, and Elementor template is unavailable.</p>';
        }
    }
}, 10);
*/




// /*
// Modify the orders table column headings and order
add_filter('woocommerce_my_account_my_orders_columns', function ($columns) {
    // Ensure the array keys and values are valid and properly assigned
    return [
        'order-date'      => __('Date', 'woocommerce'),
        'order-number'    => __('Order', 'woocommerce'),
        'order-status'    => __('Status', 'woocommerce'),
        'order-items'     => __('# of Items', 'woocommerce'),
        'order-total'     => __('Total', 'woocommerce'),
        'download-invoice'=> __('Invoice', 'woocommerce'),
        'actions'          => __('Actions', 'woocommerce'),
        'order-actions'   => __('View', 'woocommerce'),
    ];
});

// Customize the content of each column
add_action('woocommerce_my_account_my_orders_column_order-date', function ($order) {
    echo esc_html(date_i18n('M, j Y', strtotime($order->get_date_created())));
});

add_action('woocommerce_my_account_my_orders_column_order-number', function ($order) {
    // Display the order number without a link
    echo esc_html($order->get_order_number());
});

// add_action('woocommerce_my_account_my_orders_column_order-status', function ($order) {
//     // Shorten the status
//     $status = $order->get_status();
//     switch ($status) {
//         case 'pending-payment':
//             $status = 'Pending';
//             break;
//         case 'on-hold':
//             $status = 'On Hold';
//             break;
//         case 'completed':
//             $status = 'Completed';
//             break;
//         // Add more cases as needed
//     }
//     echo esc_html(ucwords($status));
// });

add_action('woocommerce_my_account_my_orders_column_order-items', function ($order) {
    // Get the number of items in the order
    echo esc_html($order->get_item_count());
});

add_action('woocommerce_my_account_my_orders_column_order-total', function ($order) {
    // Show only the total amount without "for X items"
    echo wp_kses_post($order->get_formatted_order_total());
});
// */




// /*
// Add "Download Invoice" and "Actions" columns to the orders table
add_filter('woocommerce_my_account_my_orders_columns', function ($columns) {
    $new_columns = [];
    foreach ($columns as $key => $column) {
        $new_columns[$key] = $column;
        if ($key === 'order-actions') {
            $new_columns['download-invoice'] = __('Invoice', 'woocommerce');
            $new_columns['actions'] = __('Actions', 'woocommerce');
        }
    }
    return $new_columns;
});

// Add content for "Invoice" column
add_action('woocommerce_my_account_my_orders_column_download-invoice', function ($order) {
    echo '<div class="custom-invoice-button-placeholder"></div>'; // Placeholder for the Invoice button
});

// Add content for "Actions" column
add_action('woocommerce_my_account_my_orders_column_actions', function ($order) {
    echo '<div class="custom-actions-button-placeholder"></div>'; // Placeholder for the Pay and Cancel buttons
});

// Enqueue JavaScript to move and rename the buttons
add_action('wp_enqueue_scripts', function () {
    if (is_account_page()) {
        wp_add_inline_script('jquery', "
            jQuery(document).ready(function ($) {
                // Move and rename the Invoice button
                $('.woocommerce-orders-table__cell-order-actions a.button.invoice').each(function () {
                    const button = $(this);
                    const row = button.closest('tr');
                    const placeholder = row.find('.custom-invoice-button-placeholder');

                    // Move the button
                    placeholder.append(button);

                    // Rename the button
                    button.text('Download');
                });

                // Move the Pay and Cancel buttons to the 'Actions' column
                $('.woocommerce-orders-table__cell-order-actions a.button.pay, .woocommerce-orders-table__cell-order-actions a.button.cancel').each(function () {
                    const button = $(this);
                    const row = button.closest('tr');
                    const placeholder = row.find('.custom-actions-button-placeholder');

                    // Move the button
                    placeholder.append(button);
                });
				
				// Insert '-' if placeholders are empty
				$('.custom-invoice-button-placeholder, .custom-actions-button-placeholder').each(function () {
                    if ($(this).is(':empty')) {
                        $(this).text('-');
                    }
                });
				
            });
        ");
    }
});
// */


?>



<?php 
// 

add_action('woocommerce_account_orders_endpoint', 'custom_orders_tab_with_elementor_templates', 5);
function custom_orders_tab_with_elementor_templates() {
    // Get the current user orders
    $customer_orders = wc_get_orders(array(
        'customer_id' => get_current_user_id(),
        'status'      => array('wc-completed', 'wc-processing', 'wc-on-hold'),
        'limit'       => 1, // Only need to check if at least one order exists
    ));

	// If no orders exist, display the "No Orders" template
// 	if (empty($customer_orders)) {
// 		echo do_shortcode('[elementor-template id="6659"]'); // Replace 6659 with your "No Orders" template ID
// 		return;
// 	}

	    // If orders exist, display the Elementor template before the order table
    if (!empty($customer_orders)) {
        // Insert the Elementor template before the order table
        echo do_shortcode('[elementor-template id="6664"]'); // Replace 6664 with your template ID
    } else {
        // If no orders exist, display the "No Orders" template
        echo do_shortcode('[elementor-template id="6659"]'); // Replace 6659 with your "No Orders" template ID
    }
	
}

?>



<!--
a.woocommerce-button.button.cancel,
a.woocommerce-button.button.pay 
{
    padding: 6px 12px 6px 12px !important;
    border-radius: 20px !important;
    color: #fff !important;
    text-decoration: none !important;

}
a.woocommerce-button.button.cancel{
    background: #F94144 !important;
}
a.woocommerce-button.button.pay {
    background: #81BD45 !important;
}
-->


<?php 


add_action('wp_enqueue_scripts', function() {
    if (is_product()) {
        // Enqueue WooCommerce add-to-cart script on single product pages
        wp_enqueue_script('wc-add-to-cart');

        // Inline JavaScript for AJAX functionality
        wp_add_inline_script(
            'wc-add-to-cart',
            '
            jQuery(document).ready(function ($) {
                $(".single_add_to_cart_button").on("click", function (e) {
                    e.preventDefault();

                    var $thisButton = $(this),
                        $form = $thisButton.closest("form.cart"),
                        product_id = $thisButton.attr("value"), // Retrieve product ID from button value
                        quantity = $form.find("input[name=\'quantity\']").val() || 1;

                    if (!product_id) {
                        alert("Product ID is missing!");
                        return;
                    }

                    $thisButton.addClass("loading");

                    $.ajax({
                        url: "' . admin_url('admin-ajax.php') . '",
                        type: "POST",
                        data: {
                            action: "custom_add_to_cart",
                            product_id: product_id,
                            quantity: quantity,
                        },
                        success: function (response) {
                            $thisButton.removeClass("loading");

                            if (response.success) {
                                alert(response.data.message);
                                $(document.body).trigger("added_to_cart", [response.data.fragments]);
                            } else {
                                alert(response.data.message);
                            }
                        },
                        error: function () {
                            alert("An error occurred. Please try again.");
                            $thisButton.removeClass("loading");
                        },
                    });
                });
            });
            '
        );
    }
});



add_action('wp_ajax_custom_add_to_cart', 'custom_woocommerce_add_to_cart');
add_action('wp_ajax_nopriv_custom_add_to_cart', 'custom_woocommerce_add_to_cart');

function custom_woocommerce_add_to_cart() {
    // Ensure all expected keys exist in the POST request
    $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;
    $quantity = isset($_POST['quantity']) ? absint($_POST['quantity']) : 1;

    if (!$product_id) {
        wp_send_json_error(['message' => 'Invalid product ID.']);
    }

    // Attempt to add the product to the cart
    $added = WC()->cart->add_to_cart($product_id, $quantity);

    if ($added) {
        wp_send_json_success([
            'message' => 'Product added to cart!',
            'fragments' => WC_AJAX::get_refreshed_fragments(),
        ]);
    } else {
        wp_send_json_error(['message' => 'Could not add product to cart.']);
    }

    wp_die();
}
?>





<?php 

function custom_add_remove_class_to_button_after_add_to_cart() {
    // Check if it's the front page, shop, or product category pages
    if (is_front_page() || is_shop() || is_product_category()) {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                // When the "Add to Cart" button is clicked and added to the cart
                $('body').on('added_to_cart', function(event, fragments, cart_hash){
                    // Remove the 'added' class from the button after 4 seconds for all "Add to Cart" buttons
                    setTimeout(function(){
                        $('a.add_to_cart_button.added').removeClass('added');
                    }, 4000); // 4000 milliseconds = 4 seconds
                });
            });
        </script>
        <?php
    }

    // Check if it's a single product page
    if (is_product()) {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                // When an "Add to Cart" button is clicked and a product is added to the cart
                $('body').on('added_to_cart', function(){
                    // Add the 'added' class to all buttons with class 'single_add_to_cart_button'
                    $('.single_add_to_cart_button').addClass('added');
                    
                    // Remove the 'added' class after 4 seconds for single product page button
                    setTimeout(function(){
                        $('.single_add_to_cart_button').removeClass('added');
                    }, 4000); // 4000 milliseconds = 4 seconds
                });
            });
        </script>
        <?php
    }
}
add_action('wp_footer', 'custom_add_remove_class_to_button_after_add_to_cart');

?>







<script>

document.addEventListener("DOMContentLoaded", function () {
    const cartForms = document.querySelectorAll(".e-loop-add-to-cart-form");

    cartForms.forEach(form => {
        const quantityInput = form.querySelector(".qty");
        const plusButton = form.querySelector(".custom-atc-btn.plus");
        const minusButton = form.querySelector(".custom-atc-btn.minus");
        const deleteButton = form.querySelector(".custom-atc-btn.delete");
        const productLink = form.querySelector("a.button.product_type_simple");

        // Identify the Product ID from the form
        const productId = form.querySelector("[data-product_id]")?.dataset.product_id;
        if (!productId) {
            console.warn("Product ID not found. Skipping this form:", form.innerHTML);
            return; // Skip if Product ID is missing
        }

        // Update the Elementor Menu Cart
        const updateMenuCart = () => {
            jQuery.ajax({
                url: woocommerce_params.ajax_url,
                type: "POST",
                data: {
                    action: "woocommerce_get_refreshed_fragments"
                },
                success: function (data) {
                    if (data && data.fragments) {
                        jQuery.each(data.fragments, function (key, value) {
                            jQuery(key).replaceWith(value);
                        });
                    }
                }
            });
        };


        // Increment Quantity
        plusButton?.addEventListener("click", function () {
            let currentValue = parseInt(quantityInput.value) || 1;
            let maxValue = parseInt(quantityInput.max) || 9999;

            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;

                // Update WooCommerce cart
                jQuery.ajax({
                    url: woocommerce_params.ajax_url,
                    type: "POST",
                    data: {
                        action: "woocommerce_update_cart_item_quantity",
                        product_id: productId,
                        quantity: quantityInput.value
                    },
                    success: updateMenuCart
                });
            }
        });

        // Decrement Quantity
        minusButton?.addEventListener("click", function () {
            let currentValue = parseInt(quantityInput.value) || 1;
            let minValue = parseInt(quantityInput.min) || 1;

            if (currentValue > minValue) {
                quantityInput.value = currentValue - 1;

                // Update WooCommerce cart
                jQuery.ajax({
                    url: woocommerce_params.ajax_url,
                    type: "POST",
                    data: {
                        action: "woocommerce_update_cart_item_quantity",
                        product_id: productId,
                        quantity: quantityInput.value
                    },
                    success: updateMenuCart
                });
            }
        });



		// Store the initial quantity value when the page is loaded
		const initialQuantity = quantityInput.value;

		// Remove Product from Cart
		deleteButton?.addEventListener("click", function () {
			// Reset quantity to initial value before removing
			quantityInput.value = initialQuantity;

			jQuery.ajax({
				url: woocommerce_params.ajax_url,
				type: "POST",
				data: {
					action: "woocommerce_remove_cart_item",
					product_id: productId
				},
				success: updateMenuCart
			});
		});


        // Remove Product from Cart
//         deleteButton?.addEventListener("click", function () {
//             jQuery.ajax({
//                 url: woocommerce_params.ajax_url,
//                 type: "POST",
//                 data: {
//                     action: "woocommerce_remove_cart_item",
//                     product_id: productId
//                 },
//                 success: updateMenuCart
//             });
//         });


    });
});

</script>






<script>
document.addEventListener("DOMContentLoaded", function () {
    const cartForms = document.querySelectorAll(".e-loop-add-to-cart-form");

    cartForms.forEach(form => {
        const quantityInput = form.querySelector(".qty");
        const plusButton = form.querySelector(".custom-atc-btn.plus");
        const minusButton = form.querySelector(".custom-atc-btn.minus");
        const deleteButton = form.querySelector(".custom-atc-btn.delete");
        // const readMoreLink = form.querySelector("a.button.product_type_simple");
		// const quantityDiv = form.querySelector(".quantity");

        // Identify the Product ID from the form
        const productId = form.querySelector("[data-product_id]")?.dataset.product_id;
        if (!productId) {
            console.warn("Product ID not found. Skipping this form:", form.innerHTML);
            return; // Skip if Product ID is missing
        }
		

        // Update the Elementor Menu Cart
        const updateMenuCart = () => {
            jQuery.ajax({
                url: woocommerce_params.ajax_url,
                type: "POST",
                data: {
                    action: "woocommerce_get_refreshed_fragments"
                },
                success: function (data) {
                    if (data && data.fragments) {
                        jQuery.each(data.fragments, function (key, value) {
                            jQuery(key).replaceWith(value);
                        });
                    }
                }
            });
        };


        // Increment Quantity
        plusButton?.addEventListener("click", function () {
            let currentValue = parseInt(quantityInput.value) || 1;
            let maxValue = parseInt(quantityInput.max) || 9999;

            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;

                // Update WooCommerce cart
                jQuery.ajax({
                    url: woocommerce_params.ajax_url,
                    type: "POST",
                    data: {
                        action: "woocommerce_update_cart_item_quantity",
                        product_id: productId,
                        quantity: quantityInput.value
                    },
                    success: updateMenuCart
                });
            }
        });

        // Decrement Quantity
        minusButton?.addEventListener("click", function () {
            let currentValue = parseInt(quantityInput.value) || 1;
            let minValue = parseInt(quantityInput.min) || 1;

            if (currentValue > minValue) {
                quantityInput.value = currentValue - 1;

                // Update WooCommerce cart
                jQuery.ajax({
                    url: woocommerce_params.ajax_url,
                    type: "POST",
                    data: {
                        action: "woocommerce_update_cart_item_quantity",
                        product_id: productId,
                        quantity: quantityInput.value
                    },
                    success: updateMenuCart
                });
            }
        });

		// Store the initial quantity value when the page is loaded
		const initialQuantity = quantityInput.value;
	
		// Remove Product from Cart
		deleteButton?.addEventListener("click", function () {
			// Reset quantity to initial value before removing
			quantityInput.value = initialQuantity;

			jQuery.ajax({
				url: woocommerce_params.ajax_url,
				type: "POST",
				data: {
					action: "woocommerce_remove_cart_item",
					product_id: productId
				},
				success: updateMenuCart
			});
		});


    });
});
</script>








<script>
document.addEventListener("DOMContentLoaded", function () {
    const cartForms = document.querySelectorAll(".e-loop-add-to-cart-form");

    cartForms.forEach(form => {
        const quantityInput = form.querySelector(".qty");
        const quantityDiv = form.querySelector(".quantity");
        const addToCartButton = form.querySelector(".add_to_cart_button");
        const plusButton = form.querySelector(".custom-atc-btn.plus");
        const minusButton = form.querySelector(".custom-atc-btn.minus");
        const deleteButton = form.querySelector(".custom-atc-btn.delete");

        // Initially hide quantity div and minus button
        quantityDiv.style.display = "none";
        minusButton.style.display = "none";

        // Product ID
        const productId = form.querySelector("[data-product_id]")?.dataset.product_id;
        if (!productId) {
            console.warn("Product ID not found. Skipping this form:", form.innerHTML);
            return; // Skip if Product ID is missing
        }

        // Update the Elementor Menu Cart
        const updateMenuCart = () => {
            jQuery.ajax({
                url: woocommerce_params.ajax_url,
                type: "POST",
                data: {
                    action: "woocommerce_get_refreshed_fragments"
                },
                success: function (data) {
                    if (data && data.fragments) {
                        jQuery.each(data.fragments, function (key, value) {
                            jQuery(key).replaceWith(value);
                        });
                    }
                }
            });
        };

        // Add to Cart button functionality
        addToCartButton?.addEventListener("click", function (event) {
            event.preventDefault();

            addToCartButton.classList.add("loading");
            setTimeout(() => {
                addToCartButton.classList.remove("loading");
                addToCartButton.style.display = "none";
                quantityDiv.style.display = "block";
            }, 700); // Wait for spinner and checkmark
        });

        // Increment Quantity
        plusButton?.addEventListener("click", function () {
            let currentValue = parseInt(quantityInput.value) || 1;
            let maxValue = parseInt(quantityInput.max) || 9999;

            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;

                // Update WooCommerce cart
                jQuery.ajax({
                    url: woocommerce_params.ajax_url,
                    type: "POST",
                    data: {
                        action: "woocommerce_update_cart_item_quantity",
                        product_id: productId,
                        quantity: quantityInput.value
                    },
                    success: updateMenuCart
                });

                // Show Minus button and hide Delete button on first increment
                if (currentValue === 1) {
                    minusButton.style.display = "inline-block";
                    deleteButton.style.display = "none";
                }
            }
        });

        // Decrement Quantity
        minusButton?.addEventListener("click", function () {
            let currentValue = parseInt(quantityInput.value) || 1;
            let minValue = parseInt(quantityInput.min) || 1;

            if (currentValue > minValue) {
                quantityInput.value = currentValue - 1;

                // Update WooCommerce cart
                jQuery.ajax({
                    url: woocommerce_params.ajax_url,
                    type: "POST",
                    data: {
                        action: "woocommerce_update_cart_item_quantity",
                        product_id: productId,
                        quantity: quantityInput.value
                    },
                    success: updateMenuCart
                });

                // If quantity drops to 1, show Delete button and hide Minus button
                if (quantityInput.value === "1") {
                    minusButton.style.display = "none";
                    deleteButton.style.display = "inline-block";
                }
            }
        });

        // Delete Product functionality
        deleteButton?.addEventListener("click", function () {
            quantityDiv.style.display = "none";
            addToCartButton.style.display = "inline-block";

            jQuery.ajax({
                url: woocommerce_params.ajax_url,
                type: "POST",
                data: {
                    action: "woocommerce_remove_cart_item",
                    product_id: productId
                },
                success: updateMenuCart
            });
        });
    });
});

</script>