<?php 










/////////////////////////////////////// 17-jun-2025   (Running)
function af_health_restricted_category_product($price, $product) {
    // Ensure the product is a valid object
    if (empty($product) || !is_a($product, 'WC_Product')) {
        return $price;
    }

    // Check if the user is logged in and get the current user
    $user = is_user_logged_in() ? wp_get_current_user() : null;

    // Check if the user is admin, has the 'AF Patient' role, or 'Full Access Patients' role
    if ($user && (in_array('administrator', (array) $user->roles) || 
                  in_array('af_patient', (array) $user->roles) || 
                  in_array('pms_subscription_plan_5031', (array) $user->roles))) {
        return $price; // Allow to see the price
    }

    // Check if the product belongs to the restricted category
    if (has_term('restricted-category', 'product_cat', $product->get_id())) {
        // If the request is AJAX, return an empty price to avoid showing the message
        if (wp_doing_ajax()) {
            return ''; // Hide the restricted message in AJAX requests (e.g., FiboSearch results)
        }

        // If user has "Inactive patients (12+ months)" role, show a specific message
        if ($user && in_array('pms_subscription_plan_4890', (array) $user->roles)) {
            if (is_product()) {
                return '
                    <div class="restricted-message">
						<img src="https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/11/Status.svg">
                        <span>
							Prescription supplement regulations require an appointment within the <b>last 12 months.</b>
							<a href="https://alexfisherhealth.com.au/book">Please Book an Appointment</a> with your practitioner or
							<a href="https://alexfisherhealth.com.au/contact/">Contact Us</a> for more information.
						</span>
                    </div>';
            } else {
                return '<a href="' . esc_url(get_permalink($product->get_id())) . '" class="button restricted-product-link">Read More</a>';
            }
        }

        // Return different content based on whether it's a single product page
        if (is_product()) {
            return '<div class="restricted-message">
                        <span>
							<a href="' . esc_url('https://shop.alexfisherhealth.com.au/login/?redirect_to=' . urlencode(get_permalink())) . '">Login</a>
							as an AF Health patient to purchase, or 
							<a href="https://alexfisherhealth.com.au/contact">Contact us.</a>
						</span>
                    </div>';
        } else {
            return '<a href="' . esc_url(get_permalink($product->get_id())) . '" class="button restricted-product-link">Read More</a>';
        }
    }

    return $price; // Return normal price for other products
}
add_filter('woocommerce_get_price_html', 'af_health_restricted_category_product', 10, 2);







function af_health_hide_add_to_cart_for_restricted_category() {
    global $product;

    // Ensure the product is valid
    if (empty($product) || !is_a($product, 'WC_Product')) {
        return;
    }

    // Check if the user is logged in and get the current user
    $user = is_user_logged_in() ? wp_get_current_user() : null;

    // Allow admin, AF Patient, or Full Access Patients to see the "Add to Cart" button
    if ($user && (in_array('administrator', (array) $user->roles) || 
                  in_array('af_patient', (array) $user->roles) || 
                  in_array('pms_subscription_plan_5031', (array) $user->roles))) {
        return;
    }

    // Check if the product belongs to the restricted category
    if (has_term('restricted-category', 'product_cat', $product->get_id())) {
        // Hide "Add to Cart" button by removing actions
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    }
}
add_action('wp', 'af_health_hide_add_to_cart_for_restricted_category');

function af_health_add_body_class_if_not_logged_in($classes) {
    // Check if the user is logged in and get the current user
    $user = is_user_logged_in() ? wp_get_current_user() : null;

    // If the user is NOT an admin, AF Patient, or Full Access Patients, add custom class
    if (!$user || 
        (!in_array('administrator', (array) $user->roles) && 
         !in_array('af_patient', (array) $user->roles) && 
         !in_array('pms_subscription_plan_5031', (array) $user->roles))) {
        $classes[] = 'restricted-category-no-access';
    }

    return $classes;
}
add_filter('body_class', 'af_health_add_body_class_if_not_logged_in');




















/////////////////////////////////////// 19-feb-2025   (Running)

function af_health_restricted_category_product($price, $product) {
    // Ensure the product is a valid object
    if (empty($product) || !is_a($product, 'WC_Product')) {
        return $price;
    }

    // Check if the user is logged in and get the current user
    $user = is_user_logged_in() ? wp_get_current_user() : null;

    // Check if the user is admin, has the 'AF Patient' role, or 'Full Access Patients' role
    if ($user && (in_array('administrator', (array) $user->roles) || 
                  in_array('af_patient', (array) $user->roles) || 
                  in_array('pms_subscription_plan_5031', (array) $user->roles))) {
        return $price; // Allow to see the price
    }

    // Check if the product belongs to the restricted category
    if (has_term('restricted-category', 'product_cat', $product->get_id())) {
        // If the request is AJAX, return an empty price to avoid showing the message
        if (wp_doing_ajax()) {
            return ''; // Hide the restricted message in AJAX requests (e.g., FiboSearch results)
        }

        // If user has "Inactive patients (12+ months)" role, show a specific message
        if ($user && in_array('pms_subscription_plan_4890', (array) $user->roles)) {
            if (is_product()) {
                return '
                    <div class="restricted-message">
						<img src="https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/11/Status.svg">
                        <span>
							Prescription supplement regulations require an appointment within the <b>last 12 months.</b>
							<a href="https://alexfisherhealth.com.au/book">Please Book an Appointment</a> with your practitioner or
							<a href="https://alexfisherhealth.com.au/contact/">Contact Us</a> for more information.
						</span>
                    </div>';
            } else {
                return '<a href="' . esc_url(get_permalink($product->get_id())) . '" class="button restricted-product-link">Read More</a>';
            }
        }

        // Return different content based on whether it's a single product page
        if (is_product()) {
            return '<div class="restricted-message">
                        <span>
							<a href="' . esc_url('https://shop.alexfisherhealth.com.au/login/?redirect_to=' . urlencode(get_permalink())) . '">Login</a>
							as an AF Health patient to purchase, or 
							<a href="https://alexfisherhealth.com.au/contact">Contact us.</a>
						</span>
                    </div>';
        } else {
            return '<a href="' . esc_url(get_permalink($product->get_id())) . '" class="button restricted-product-link">Read More</a>';
        }
    }

    return $price; // Return normal price for other products
}
add_filter('woocommerce_get_price_html', 'af_health_restricted_category_product', 10, 2);




function af_health_hide_add_to_cart_for_restricted_category() {
    global $product;

    // Ensure the product is valid
    if (empty($product) || !is_a($product, 'WC_Product')) {
        return;
    }

    // Check if the user is logged in and get the current user
    $user = is_user_logged_in() ? wp_get_current_user() : null;

    // Allow admin, AF Patient, or Full Access Patients to see the "Add to Cart" button
    if ($user && (in_array('administrator', (array) $user->roles) || 
                  in_array('af_patient', (array) $user->roles) || 
                  in_array('pms_subscription_plan_5031', (array) $user->roles))) {
        return;
    }

    // Check if the product belongs to the restricted category
    if (has_term('restricted-category', 'product_cat', $product->get_id())) {
        // Hide "Add to Cart" button by removing actions
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    }
}
add_action('wp', 'af_health_hide_add_to_cart_for_restricted_category');

function af_health_add_body_class_if_not_logged_in($classes) {
    // Check if the user is logged in and get the current user
    $user = is_user_logged_in() ? wp_get_current_user() : null;

    // If the user is NOT an admin, AF Patient, or Full Access Patients, add custom class
    if (!$user || 
        (!in_array('administrator', (array) $user->roles) && 
         !in_array('af_patient', (array) $user->roles) && 
         !in_array('pms_subscription_plan_5031', (array) $user->roles))) {
        $classes[] = 'restricted-category-no-access';
    }

    return $classes;
}
add_filter('body_class', 'af_health_add_body_class_if_not_logged_in');





















/////////////////////////////////////// 18-dec-2024   10:52am

function af_health_restricted_category_product($price, $product) {
    // Ensure the product is a valid object
    if (empty($product) || !is_a($product, 'WC_Product')) {
        return $price;
    }

    // Check if the user is logged in and get the current user
    $user = is_user_logged_in() ? wp_get_current_user() : null;

    // Check if the user is admin, has the 'AF Patient' role, or 'Full Access Patients' role
    if ($user && (in_array('administrator', (array) $user->roles) || 
                  in_array('af_patient', (array) $user->roles) || 
                  in_array('pms_subscription_plan_5031', (array) $user->roles))) {
        return $price; // Allow to see the price
    }

    // Check if the product belongs to the restricted category
    if (has_term('restricted-category', 'product_cat', $product->get_id())) {
        // If the request is AJAX, return an empty price to avoid showing the message
        if (wp_doing_ajax()) {
            return ''; // Hide the restricted message in AJAX requests (e.g., FiboSearch results)
        }

        // If user has "Inactive patients (12+ months)" role, show a specific message
        if ($user && in_array('pms_subscription_plan_4890', (array) $user->roles)) {
            if (is_product()) {
                return '
                    <div class="restricted-message">
						<img src="https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/11/Status.svg">
                        <span>
							Prescription supplement regulations require an appointment within the <b>last 12 months.</b>
							<a href="https://alexfisherhealth.com.au/book">Please Book an Appointment</a> with your practitioner or
							<a href="https://alexfisherhealth.com.au/contact/">Contact Us</a> for more information.
						</span>
                    </div>';
            } else {
                return '<a href="' . esc_url(get_permalink($product->get_id())) . '" class="button restricted-product-link">Read More</a>';
            }
        }

        // Return different content based on whether it's a single product page
        if (is_product()) {
            return '<div class="restricted-message">
                        <span>
							<a href="' . esc_url('https://shop.alexfisherhealth.com.au/login/?redirect_to=' . urlencode(get_permalink())) . '">Login</a>
							as an AF Health patient to view prices, or 
							<a href="https://alexfisherhealth.com.au/contact">Contact us.</a>
						</span>
                    </div>';
        } else {
            return '<a href="' . esc_url(get_permalink($product->get_id())) . '" class="button restricted-product-link">Read More</a>';
        }
    }

    return $price; // Return normal price for other products
}
add_filter('woocommerce_get_price_html', 'af_health_restricted_category_product', 10, 2);







function af_health_hide_add_to_cart_for_restricted_category() {
    global $product;

    // Ensure the product is valid
    if (empty($product) || !is_a($product, 'WC_Product')) {
        return;
    }

    // Check if the user is logged in and get the current user
    $user = is_user_logged_in() ? wp_get_current_user() : null;

    // Allow admin, AF Patient, or Full Access Patients to see the "Add to Cart" button
    if ($user && (in_array('administrator', (array) $user->roles) || 
                  in_array('af_patient', (array) $user->roles) || 
                  in_array('pms_subscription_plan_5031', (array) $user->roles))) {
        return;
    }

    // Check if the product belongs to the restricted category
    if (has_term('restricted-category', 'product_cat', $product->get_id())) {
        // Hide "Add to Cart" button by removing actions
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    }
}
add_action('wp', 'af_health_hide_add_to_cart_for_restricted_category');

function af_health_add_body_class_if_not_logged_in($classes) {
    // Check if the user is logged in and get the current user
    $user = is_user_logged_in() ? wp_get_current_user() : null;

    // If the user is NOT an admin, AF Patient, or Full Access Patients, add custom class
    if (!$user || 
        (!in_array('administrator', (array) $user->roles) && 
         !in_array('af_patient', (array) $user->roles) && 
         !in_array('pms_subscription_plan_5031', (array) $user->roles))) {
        $classes[] = 'restricted-category-no-access';
    }

    return $classes;
}
add_filter('body_class', 'af_health_add_body_class_if_not_logged_in');















