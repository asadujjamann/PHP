<?php


// /**********

// **********/




/**********
fopen()
file_get_contents()
fclose()
fwrite()
file_put_contents()

FILE_APPEND
LOCK_EX
rewind()
fseek()
Good things take time
sprintf() *format specifier
csv (comma separated value)


search ---> serialized php


**********/



/**********

CLI_IC
print_r($argc);
print_r($argv);
readline();
file_exists();
**********/





















// /**********

// **********/


















// // Hook to display the restricted message at the top of the shop or product page
// add_action('woocommerce_before_main_content', 'display_restricted_message_at_top');

// function display_restricted_message_at_top() {
//     if (is_shop() || is_product_category() || is_product()) {
//         // Check if the user is not logged in or doesn't have the required role
//         if (!is_user_logged_in() || !(current_user_can('af_patient') || current_user_can('administrator'))) {
//             // Display the restricted message
//             echo '<p class="restricted-message" style="color: red; font-weight: bold; text-align: center;">You need to be logged in as an AF Health Patient or admin to view prices or purchase products.</p>';
//         }
//     }
// }

// // Hide price and add to cart button for non-logged-in users or non 'AF Patient' and 'admin' users
// add_filter('woocommerce_get_price_html', 'hide_price_for_non_af_patients');
// add_action('woocommerce_before_shop_loop_item', 'conditionally_hide_add_to_cart_button', 1);
// add_action('woocommerce_single_product_summary', 'conditionally_hide_add_to_cart_button', 1);

// function hide_price_for_non_af_patients($price) {
//     global $product;
//     $unrestricted_category = 'unrestricted_category'; // Replace with your unrestricted category slug

//     // Check if the product is in the unrestricted category
//     if (has_term($unrestricted_category, 'product_cat', $product->get_id())) {
//         return $price; // Show price for unrestricted category
//     }

//     // Check if the user is logged in and has 'AF Patient' or 'admin' role
//     if (is_user_logged_in() && (current_user_can('af_patient') || current_user_can('administrator'))) {
//         return $price; // Show price for AF Patients and admins
//     }

//     // Hide price and display custom message for others
//     return '<p class="restricted-message">You need to be logged in as an AF Health Patient or admin to view prices.</p>';
// }

// function conditionally_hide_add_to_cart_button() {
//     global $product;
//     $unrestricted_category = 'unrestricted_category'; // Replace with your unrestricted category slug

//     // Check if the product is in the unrestricted category
//     if (has_term($unrestricted_category, 'product_cat', $product->get_id())) {
//         return; // Allow add to cart button for unrestricted category
//     }

//     // Check if the user is logged in and has 'AF Patient' or 'admin' role
//     if (is_user_logged_in() && (current_user_can('af_patient') || current_user_can('administrator'))) {
//         return; // Show add to cart button for AF Patients and admins
//     }

//     // Remove add to cart button for others
//     remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
//     remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
// }

// // Register the custom 'AF Patient' user role
// add_action('init', 'add_af_patient_role');
// function add_af_patient_role() {
//     if (!get_role('af_patient')) {
//         add_role('af_patient', 'AF Patient', array('read' => true));
//     }
// }














/************* 

// Hide price and add to cart button for non-logged-in users or non 'AF Patient' and 'admin' users
add_filter('woocommerce_get_price_html', 'hide_price_for_non_af_patients');
add_action('woocommerce_before_shop_loop_item', 'conditionally_hide_add_to_cart_button', 1);
add_action('woocommerce_single_product_summary', 'conditionally_hide_add_to_cart_button', 1);

function hide_price_for_non_af_patients($price) {
    global $product;
    $unrestricted_category = 'unrestricted_category'; // Replace with your unrestricted category slug

    // Check if the product is in the unrestricted category
    if (has_term($unrestricted_category, 'product_cat', $product->get_id())) {
        return $price; // Show price for unrestricted category
    }

    // Check if the user is logged in and has 'AF Patient' or 'admin' role
    if (is_user_logged_in() && (current_user_can('af_patient') || current_user_can('administrator'))) {
        return $price; // Show price for AF Patients and admins
    }

    // Hide price and display custom message for others
    return '<p class="restricted-message">You need to be logged in as an AF Health Patient or admin to view prices.</p>';
}

function conditionally_hide_add_to_cart_button() {
    global $product;
    $unrestricted_category = 'unrestricted_category'; // Replace with your unrestricted category slug

    // Check if the product is in the unrestricted category
    if (has_term($unrestricted_category, 'product_cat', $product->get_id())) {
        return; // Allow add to cart button for unrestricted category
    }

    // Check if the user is logged in and has 'AF Patient' or 'admin' role
    if (is_user_logged_in() && (current_user_can('af_patient') || current_user_can('administrator'))) {
        return; // Show add to cart button for AF Patients and admins
    }

    // Remove add to cart button for others
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

    // Display custom message only once
    
    // if (is_shop() || is_product()) {
    //     echo '<p class="restricted-message">You need to be logged in as an AF Health Patient or admin to purchase this product.</p>';
    // }
}

function custom_message_for_no_access() {
    echo '<p class="restricted-message">You need to be logged in as an AF Health Patient or admin to purchase this product.</p>';
}

// Register the custom 'AF Patient' user role
add_action('init', 'add_af_patient_role');
function add_af_patient_role() {
    if (!get_role('af_patient')) {
        add_role('af_patient', 'AF Patient', array('read' => true));
    }
}

*************/





////////////  First Code
/*
function hide_price_add_to_cart_for_restricted_category() {
    if ( ! is_admin() && is_product_category( 'restricted-category' ) || has_term( 'restricted-category', 'product_cat' ) ) {
        if ( ! current_user_can( 'administrator' ) && ! current_user_can( 'af_patient' ) ) {
            // Hide price and add-to-cart button
            remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

            // Add custom message
            add_action( 'woocommerce_single_product_summary', 'custom_price_message', 10 );
            add_action( 'woocommerce_after_shop_loop_item_title', 'custom_price_message', 10 );
        }
    }
}
add_action( 'wp', 'hide_price_add_to_cart_for_restricted_category' );

// Display custom message for non-logged-in or unauthorized users
function custom_price_message() {
    echo '<p class="woocommerce-custom-message">You need to be logged in as an AF Health Patient or admin to view prices.</p>';
}
*/





////////////////////////////////////  Alex - 2nd Update
/*


function af_health_restricted_category_product($price, $product) {
    // Ensure the product is a valid object
    if (empty($product) || !is_a($product, 'WC_Product')) {
        return $price;
    }

    // Check if the user is logged in
    if (is_user_logged_in()) {
        // Get the current user
        $user = wp_get_current_user();

        // Check if the user is admin or has the 'AF Patient' role
        if (in_array('administrator', (array) $user->roles) || in_array('af_patient', (array) $user->roles)) {
            return $price; // Allow to see the price
        }
    }

    // Check if the product belongs to the restricted category
    if (has_term('restricted-category', 'product_cat', $product->get_id())) {
        // Return different messages based on whether it's a single product page
        if (is_product()) {
            return '<p class="restricted-message"> 
				<a href="https://shop.alexfisherhealth.com.au/login"><b>Login</b></a> 
				as an AF Health patient to view prices, or 
				<a href="https://alexfisherhealth.com.au/contact"><b>Contact us</b></a>. 
			</p>';
        } else {
            return '<p class="restricted-message">You need to be logged in as an AF Health Patient or Admin to view prices.</p>';
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

    // Check if the user is logged in
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        if (in_array('administrator', (array) $user->roles) || in_array('af_patient', (array) $user->roles)) {
            return; // Allow admin or AF Patient to see the "Add to Cart" button
        }
    }

    // Check if the product belongs to the restricted category
    if (has_term('restricted-category', 'product_cat', $product->get_id())) {
        // Add CSS class to hide the button via CSS (will hide all Add to Cart buttons for restricted-category)
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
        
        // Use CSS to target "Add to Cart" buttons in the frontend
        // add_action('wp_head', 'af_health_hide_add_to_cart_button_css');
    }
}
add_action('wp', 'af_health_hide_add_to_cart_for_restricted_category');

// function af_health_hide_add_to_cart_button_css() {
//     echo '<style>
//         .product_cat-restricted-category .button.product_type_simple.add_to_cart_button,
//         .product_cat-restricted-category .button.single_add_to_cart_button {
//             display: none !important;
//         }
//     </style>';
// }

function af_health_add_body_class_if_not_logged_in($classes) {
    // Check if the user is logged in
    if (is_user_logged_in()) {
        $user = wp_get_current_user();

        // If the user is NOT an admin or AF Patient, add custom class
        if (!in_array('administrator', (array) $user->roles) && !in_array('af_patient', (array) $user->roles)) {
            $classes[] = 'restricted-category-no-access';
        }
    } else {
        // If the user is not logged in, add the custom class
        $classes[] = 'restricted-category-no-access';
    }

    return $classes;
}
add_filter('body_class', 'af_health_add_body_class_if_not_logged_in');



*/





////////////////////////////////////  Alex - 3rd Update
/*


function af_health_restricted_category_product($price, $product) {
    // Ensure the product is a valid object
    if (empty($product) || !is_a($product, 'WC_Product')) {
        return $price;
    }

    // Check if the user is logged in
    if (is_user_logged_in()) {
        // Get the current user
        $user = wp_get_current_user();
		
        // Check if the user is admin or has the 'AF Patient' role
        if (in_array('administrator', (array) $user->roles) || in_array('af_patient', (array) $user->roles)) {
            return $price; // Allow to see the price
        }
    }

    // Check if the product belongs to the restricted category
    if (has_term('restricted-category', 'product_cat', $product->get_id())) {
		
            // Check if the user has the "Inactive patients (12+ months)" role
            if (in_array('pms_subscription_plan_4890', (array) $user->roles)) {
                return '<style>
					.restricted-message span,
					.restricted-message b,
					.restricted-message a{
						font-weight: 400;
						font-size: 15px;
						color: #525136 !important;
					}
					.restricted-message b{
						font-weight: 600 !important;
						color: red !important;
					}
				</style> 
				<div class="restricted-message">
					<span>Prescription supplement regulations require an appointment within the last 12 months. Please </span>
					<a href="https://alexfisherhealth.com.au/book"><b>Schedule a Visit</b></a> <span>with your practitioner or </span>
					<a href="https://alexfisherhealth.com.au/contact/"><b>Contact Us</b></a> <span>for more information. </span>
				</div>';
            }
		
        // Return different messages based on whether it's a single product page
        if (is_product()) {
            return '<p class="restricted-message"> 
				<a href="https://shop.alexfisherhealth.com.au/login"><b>Login</b></a> 
				as an AF Health patient to view prices, or 
				<a href="https://alexfisherhealth.com.au/contact"><b>Contact us</b></a>. 
			</p>';
        } else {
            return '<p class="restricted-message">You must be logged in as an AF Health patient to access prescription products.</p>';
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

    // Check if the user is logged in
    if (is_user_logged_in()) {
        $user = wp_get_current_user();
        if (in_array('administrator', (array) $user->roles) || in_array('af_patient', (array) $user->roles)) {
            return; // Allow admin or AF Patient to see the "Add to Cart" button
        }
    }

    // Check if the product belongs to the restricted category
    if (has_term('restricted-category', 'product_cat', $product->get_id())) {
        // Add CSS class to hide the button via CSS (will hide all Add to Cart buttons for restricted-category)
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
        
        // Use CSS to target "Add to Cart" buttons in the frontend
        // add_action('wp_head', 'af_health_hide_add_to_cart_button_css');
    }
}
add_action('wp', 'af_health_hide_add_to_cart_for_restricted_category');

// function af_health_hide_add_to_cart_button_css() {
//     echo '<style>
//         .product_cat-restricted-category .button.product_type_simple.add_to_cart_button,
//         .product_cat-restricted-category .button.single_add_to_cart_button {
//             display: none !important;
//         }
//     </style>';
// }

function af_health_add_body_class_if_not_logged_in($classes) {
    // Check if the user is logged in
    if (is_user_logged_in()) {
        $user = wp_get_current_user();

        // If the user is NOT an admin or AF Patient, add custom class
        if (!in_array('administrator', (array) $user->roles) && !in_array('af_patient', (array) $user->roles)) {
            $classes[] = 'restricted-category-no-access';
        }
    } else {
        // If the user is not logged in, add the custom class
        $classes[] = 'restricted-category-no-access';
    }

    return $classes;
}
add_filter('body_class', 'af_health_add_body_class_if_not_logged_in');
 


*/




/*
User:  Inactive_Patient_Test
Pass:  asad@123

*/