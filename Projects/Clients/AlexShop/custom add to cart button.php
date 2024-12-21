<?php 




























/////////////////////////////////////// 18-dec-2024   10:00am
//////////// Add class "woocommerce" in body in Front Page
function add_custom_body_class($classes) {
    if (is_front_page()) {
        $classes[] = 'woocommerce';
    }
    return $classes;
}
add_filter('body_class', 'add_custom_body_class');





// Custom buttons inside the quantity div only for in-stock products
add_action('woocommerce_after_quantity_input_field', 'add_custom_buttons_to_quantity_div');
function add_custom_buttons_to_quantity_div() {
    global $product;

	if (is_shop() || is_product_category() || is_product_tag() || is_home() || is_front_page() || is_product() || is_search()) {
	// if (is_product_category('antibacterial')) { }
		if ($product->is_in_stock()) {
			echo "
				<span class='custom-atc-btn check'><img src='https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Check.svg'> ADDED</span>
				<span class='custom-atc-btn delete'><img src='https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Delete.svg'></span>
				<span class='custom-atc-btn minus'><img src='https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Minus.svg'></span>
				<span class='custom-atc-btn plus'><img src='https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Plus.svg'></span>
			";
		}

	}
}



// For Stock out products show text - "Out of stock"
// /*
add_action('wp_enqueue_scripts', function () {
    // Only load the script on the loop pages (replace 'your-loop-page' with the actual condition if needed)
    if (is_shop() || is_product_category() || is_product_tag() || is_home() || is_front_page() || is_product()) {
        wp_add_inline_script('jquery-core', "
            jQuery(document).ready(function ($) {
                // Loop through each Add to Cart form
                $('.e-loop-add-to-cart-form').each(function () {
                    // Check if the product is out of stock
                    var form = $(this);
                    var button = form.find('.add_to_cart_button');
                    var maxQuantity = form.find('input.qty').attr('max');

                    // If the product is out of stock, replace the form
                    if (maxQuantity === '' || parseInt(maxQuantity, 10) <= 0) {
                        // form.replaceWith('<div class=\"out-of-stock-message\">Out of stock</div>');
						form.addClass('stock-out-product-form');
                    }
                });
            });
        ");
    }
});
// */



////// Custom Add to Cart
// Handle WooCommerce Update Cart Quantity
add_action('wp_ajax_woocommerce_update_cart_item_quantity', 'update_cart_item_quantity');
add_action('wp_ajax_nopriv_woocommerce_update_cart_item_quantity', 'update_cart_item_quantity');
function update_cart_item_quantity() {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if ($cart_item['product_id'] == $product_id) {
            WC()->cart->set_quantity($cart_item_key, $quantity, true);
            WC()->cart->calculate_totals();
            wp_send_json_success();
        }
    }

    wp_send_json_error();
}

// Handle WooCommerce Remove Cart Item
add_action('wp_ajax_woocommerce_remove_cart_item', 'remove_cart_item');
add_action('wp_ajax_nopriv_woocommerce_remove_cart_item', 'remove_cart_item');
function remove_cart_item() {
    $product_id = intval($_POST['product_id']);

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if ($cart_item['product_id'] == $product_id) {
            WC()->cart->remove_cart_item($cart_item_key);
            wp_send_json_success();
        }
    }

    wp_send_json_error();
}


// Add script in footer
add_action('wp_footer', function () {
?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const cartForms = document.querySelectorAll("form.cart");

    cartForms.forEach(form => {
        const quantityInput = form.querySelector(".qty");
        const quantityDiv = form.querySelector(".quantity");
        const addToCartButton = form.querySelector(".add_to_cart_button, .single_add_to_cart_button");
        const plusButton = form.querySelector(".custom-atc-btn.plus");
        const minusButton = form.querySelector(".custom-atc-btn.minus");
        const deleteButton = form.querySelector(".custom-atc-btn.delete");

        if (!quantityDiv || !addToCartButton || !plusButton || !minusButton || !deleteButton) {
            return;
        }

        quantityDiv.style.display = "none";
        minusButton.style.display = "none";

        const productId = form.querySelector("[name='add-to-cart']")?.value || 
                          form.querySelector("[data-product_id]")?.dataset.product_id;
        if (!productId) {
            console.warn("Product ID not found. Skipping this form:", form.innerHTML);
            return;
        }

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

        // Intercept Add to Cart Button
        addToCartButton.addEventListener("click", function (event) {
            event.preventDefault();

            // Add loading indicator
            form.classList.add("loading");
			addToCartButton.style.display = "none";
			form.style.height = "33px";

            const quantity = parseInt(quantityInput?.value) || 1;

            jQuery.ajax({
                url: woocommerce_params.ajax_url,
                type: "POST",
                data: {
                    action: "woocommerce_add_to_cart",
                    product_id: productId,
                    quantity: quantity
                },
                success: function (response) {
                    if (response.error) {
                        console.error("Error adding to cart:", response.error);
                        return;
                    }

                    // Hide the Add to Cart button and show the quantity controls
                    form.style.height = "auto";
                    quantityDiv.style.display = "flex";
                    minusButton.style.display = "none";
                    deleteButton.style.display = "inline-flex";

                    // Update menu cart
                    updateMenuCart();

                    // Remove loading indicator
                    form.classList.remove("loading");
                },
                error: function (xhr, status, error) {
                    console.error("AJAX error:", error);
                }
            });
        });

        // Plus Button
        plusButton.addEventListener("click", function () {
            let currentValue = parseInt(quantityInput.value) || 1;
            let maxValue = parseInt(quantityInput.max) || 9999;

            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;

                // Toggle visibility of minus and delete buttons
                if (currentValue === 1) {
                    deleteButton.style.display = "none";
                    minusButton.style.display = "inline-flex";
                }

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

        // Minus Button
        minusButton.addEventListener("click", function () {
            let currentValue = parseInt(quantityInput.value) || 1;
            let minValue = parseInt(quantityInput.min) || 1;

            if (currentValue > minValue) {
                quantityInput.value = currentValue - 1;

                // Toggle visibility of minus and delete buttons
                if (quantityInput.value === "1") {
                    minusButton.style.display = "none";
                    deleteButton.style.display = "inline-flex";
                }

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

        // Delete Button
        deleteButton.addEventListener("click", function () {
            form.classList.add("loading");
            quantityDiv.style.display = "none";
			form.style.height = "33px";

            jQuery.ajax({
                url: woocommerce_params.ajax_url,
                type: "POST",
                data: {
                    action: "woocommerce_remove_cart_item",
                    product_id: productId
                },
                success: function () {
                    updateMenuCart();
                    setTimeout(() => {
                        addToCartButton.style.display = "inline-flex";
                        form.classList.remove("loading");
						form.style.height = "auto";
                    }, 500);
                }
            });
        });
    });
});

</script>

<?php 
});

























/////////////////////////////////////// 17-dec-2024   6:55pm
//////////// Add class "woocommerce" in body in Front Page
function add_custom_body_class($classes) {
    if (is_front_page()) {
        $classes[] = 'woocommerce';
    }
    return $classes;
}
add_filter('body_class', 'add_custom_body_class');





// Custom buttons inside the quantity div only for in-stock products
add_action('woocommerce_after_quantity_input_field', 'add_custom_buttons_to_quantity_div');
function add_custom_buttons_to_quantity_div() {
    global $product;

	if (is_shop() || is_product_category() || is_product_tag() || is_home() || is_front_page() || is_product() || is_search()) {
		// if (is_product_category('antibacterial')) { }
		if ($product->is_in_stock()) {
			echo "
				<span class='custom-atc-btn check'><img src='https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Check.svg'> ADDED</span>
				<span class='custom-atc-btn delete'><img src='https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Delete.svg'></span>
				<span class='custom-atc-btn minus'><img src='https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Minus.svg'></span>
				<span class='custom-atc-btn plus'><img src='https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Plus.svg'></span>
			";
		}
	}
}



// For Stock out products show text - "Out of stock"
// /*
add_action('wp_enqueue_scripts', function () {
    // Only load the script on the loop pages (replace 'your-loop-page' with the actual condition if needed)
    if (is_shop() || is_product_category() || is_product_tag() || is_home() || is_front_page() || is_product() || is_search()) {
        wp_add_inline_script('jquery-core', "
            jQuery(document).ready(function ($) {
                // Loop through each Add to Cart form
                $('.e-loop-add-to-cart-form').each(function () {
                    // Check if the product is out of stock
                    var form = $(this);
                    var button = form.find('.add_to_cart_button');
                    var maxQuantity = form.find('input.qty').attr('max');

                    // If the product is out of stock, replace the form
                    if (maxQuantity === '' || parseInt(maxQuantity, 10) <= 0) {
                        // form.replaceWith('<div class=\"out-of-stock-message\">Out of stock</div>');
						form.addClass('stock-out-product-form');
                    }
                });
            });
        ");
    }
});
// */



////// Custom Add to Cart
// Handle WooCommerce Update Cart Quantity
add_action('wp_ajax_woocommerce_update_cart_item_quantity', 'update_cart_item_quantity');
add_action('wp_ajax_nopriv_woocommerce_update_cart_item_quantity', 'update_cart_item_quantity');
function update_cart_item_quantity() {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if ($cart_item['product_id'] == $product_id) {
            WC()->cart->set_quantity($cart_item_key, $quantity, true);
            WC()->cart->calculate_totals();
            wp_send_json_success();
        }
    }

    wp_send_json_error();
}

// Handle WooCommerce Remove Cart Item
add_action('wp_ajax_woocommerce_remove_cart_item', 'remove_cart_item');
add_action('wp_ajax_nopriv_woocommerce_remove_cart_item', 'remove_cart_item');
function remove_cart_item() {
    $product_id = intval($_POST['product_id']);

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if ($cart_item['product_id'] == $product_id) {
            WC()->cart->remove_cart_item($cart_item_key);
            wp_send_json_success();
        }
    }

    wp_send_json_error();
}


// Add script in footer
add_action('wp_footer', function () {
?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const cartForms = document.querySelectorAll("form.cart");

    cartForms.forEach(form => {
        const quantityInput = form.querySelector(".qty");
        const quantityDiv = form.querySelector(".quantity");
        const addToCartButton = form.querySelector(".add_to_cart_button"); // Shop Page Button
        const singleAddToCartButton = form.querySelector(".single_add_to_cart_button"); // Single Product Page Button
        const plusButton = form.querySelector(".custom-atc-btn.plus");
        const minusButton = form.querySelector(".custom-atc-btn.minus");
        const deleteButton = form.querySelector(".custom-atc-btn.delete");

        // Check for essential elements
        if (!quantityDiv || (!addToCartButton && !singleAddToCartButton) || !plusButton || !minusButton || !deleteButton) {
            return; // Skip this form if elements are missing
        }

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

        // Add functionality for BOTH buttons (Shop & Single Product Page)
        const handleAddToCartButtonClick = (button) => {
            button.addEventListener("click", function (event) {
                event.preventDefault();

                form.classList.add("loading");
				button.style.display = "none";
				form.style.height = "33px";
                setTimeout(() => {
                    quantityDiv.style.display = "flex";
                    form.classList.remove("loading");
					form.style.height = "auto";
                }, 500); // Wait for spinner
            });
        };

        // Apply to both buttons if they exist
        if (addToCartButton) handleAddToCartButtonClick(addToCartButton);
        if (singleAddToCartButton) handleAddToCartButtonClick(singleAddToCartButton);

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

                if (currentValue === 1) {
                    minusButton.style.display = "inline-flex";
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

                if (quantityInput.value === "1") {
                    minusButton.style.display = "none";
                    deleteButton.style.display = "inline-flex";
                }
            }
        });

        // Delete Product functionality
        deleteButton?.addEventListener("click", function () {
            form.classList.add("loading");
            form.style.height = "33px";
            quantityDiv.style.display = "none";

            jQuery.ajax({
                url: woocommerce_params.ajax_url,
                type: "POST",
                data: {
                    action: "woocommerce_remove_cart_item",
                    product_id: productId
                },
                success: function () {
                    updateMenuCart();

                    setTimeout(() => {
                        if (addToCartButton) addToCartButton.style.display = "inline-flex";
                        if (singleAddToCartButton) singleAddToCartButton.style.display = "inline-flex";
                        form.classList.remove("loading");
                        form.style.height = "auto";
                    }, 500);
                }
            });
        });
    });
});

</script>

<?php 
});






