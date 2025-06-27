<?php



// Apply coupon automatically for specific user roles (e.g., af_patient)
add_action('woocommerce_before_cart', 'af_health_auto_apply_coupon');
add_action('woocommerce_before_checkout_form', 'af_health_auto_apply_coupon');

function af_health_auto_apply_coupon() {
    // Return if user is not logged in
    if (!is_user_logged_in()) return;

    // Get current user
    $user = wp_get_current_user();

    // Set the coupon code to auto-apply
    $coupon_code = '2YAAQFP9';

    // Check if user has the 'af_patient' role
    if (in_array('af_patient', (array) $user->roles)) {

        // If coupon already applied, do nothing
        if (WC()->cart->has_discount($coupon_code)) return;

        // Apply coupon
        WC()->cart->apply_coupon($coupon_code);
    }
}

/*
Administrator (administrator)
Editor (editor)
Author (author)
Contributor (contributor)
Subscriber (subscriber)
Customer (customer)
Shop manager (shop_manager)
Prescription Products (prescription_products)
Registered Patients (pms_subscription_plan_4787)
AF Health Patients (af_patient)
Inactive patients (12+ months) (pms_subscription_plan_4890)
Full Access Patients (pms_subscription_plan_5031)
*/



