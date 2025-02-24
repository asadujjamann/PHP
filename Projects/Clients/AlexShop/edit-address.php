<?php 



// Running Codes

add_action( 'woocommerce_account_edit-address_endpoint', function() {
    if ( ! is_wc_endpoint_url( 'edit-address' ) ) {
        return;
    }
    ?>
    <form class="wc-shipping-address-form" method="post">
        <div class="wc-shipping-address-fields">
			<h2 class="wc-address-fields-heading">Address</h2>
            <div class="wc-address-fields-wrapper">
				<div class="wc-address-field-item personal-info-wrapper">
					<h4 class="address-heading personal-info-heading">Personal Information</h4>
					<?php
						// First Name
						woocommerce_form_field( 'shipping_first_name', array(
							'type'        => 'text',
							'required'    => true,
							'placeholder' => 'First name*',
						), WC()->customer->get_shipping_first_name() );

						// Last Name
						woocommerce_form_field( 'shipping_last_name', array(
							'type'        => 'text',
							'required'    => true,
							'placeholder' => 'Last name*',
						), WC()->customer->get_shipping_last_name() );

						// Company Name
						woocommerce_form_field( 'shipping_company', array(
							'type'        => 'text',
							'required'    => false,
							'placeholder' => 'Company Name',
						), WC()->customer->get_shipping_company() );
					?>
				</div>
				<div class="wc-address-field-item shipping-address-wrapper">
					<h4 class="address-heading shipping-address-heading">Shipping Address</h4>
					<?php
						// Country
						$shipping_country = WC()->customer->get_shipping_country();
						woocommerce_form_field( 'shipping_country', array(
							'type'        => 'country',
							'required'    => true,
							'placeholder' => 'Select a country / region…',
							'default'     => $shipping_country ?: '',
						), $shipping_country ?: '' );

						// State - Fetch states dynamically based on country
						$shipping_state   = WC()->customer->get_shipping_state();
						$states = WC()->countries->get_states( $shipping_country );
						if ( ! empty( $states ) ) {
							woocommerce_form_field( 'shipping_state', array(
								'type'        => 'select',
								'required'    => true,
								'placeholder' => 'Select a State',
								'options'     => ['' => 'Select a State'] + $states, // Adding placeholder option
								'default'     => $shipping_state ?: '',
							), $shipping_state ?: '' );
						} else {
							woocommerce_form_field( 'shipping_state', array(
								'type'        => 'text',
								'required'    => true,
								'placeholder' => 'Select a State',
							), $shipping_state ?: '' );
						}

						// Address 1
						woocommerce_form_field( 'shipping_address_1', array(
							'type'        => 'text',
							'required'    => true,
							'placeholder' => 'Street Address*',
						), WC()->customer->get_shipping_address_1() );

						// City
						woocommerce_form_field( 'shipping_city', array(
							'type'        => 'text',
							'required'    => true,
							'placeholder' => 'Shipping City*',
						), WC()->customer->get_shipping_city() );

						// Postcode
						woocommerce_form_field( 'shipping_postcode', array(
							'type'        => 'text',
							'required'    => true,
							'placeholder' => 'Postcode*',
						), WC()->customer->get_shipping_postcode() );
					?>
				</div>
				<div class="wc-address-field-item contact-info-wrapper">
					<h4 class="address-heading contact-info-heading">Contact Information</h4>
					<?php
						// Phone Number (Required)
						woocommerce_form_field( 'shipping_phone', array(
							'type'        => 'tel',
							'required'    => true,
							'placeholder' => 'Phone Number*',
						), WC()->customer->get_shipping_phone() ); // Fetch existing phone number if available

						// Email (Required)
						woocommerce_form_field( 'billing_email', array(
							'type'        => 'email',
							'required'    => true,
							'placeholder' => 'Email Address*',
						), WC()->customer->get_billing_email() ); // Fetch existing Billing Email if available
					?>
				</div>
				<div class="wc-address-fields-requested">* Requested</div>
            </div>
            <div class="submit-btn-wrapper">
                <button type="submit" class="submit-button" name="save_shipping_address" value="Save Address">Save</button>
                <input type="hidden" name="action" value="edit_shipping_address">
            </div>
        </div>
    </form>
    <?php
}, 15 );



add_action( 'template_redirect', function() {
	
	// Remove Default Elements from Address Page
	if ( is_account_page() ) {
		remove_action( 'woocommerce_account_edit-address_endpoint', 'woocommerce_account_edit_address' );
	}
	
	// Save Shipping Address
    if ( isset( $_POST['save_shipping_address'] ) ) {
        $customer_id = get_current_user_id();
        
        if ( $customer_id ) {
            $errors = [];

            // Check Required Fields
            if ( empty( $_POST['shipping_first_name'] ) ) {
                $errors[] = __( 'First name is a required field.', 'woocommerce' );
            }
            if ( empty( $_POST['shipping_last_name'] ) ) {
                $errors[] = __( 'Last name is a required field.', 'woocommerce' );
            }
            if ( empty( $_POST['shipping_address_1'] ) ) {
                $errors[] = __( 'Street address is a required field.', 'woocommerce' );
            }
            if ( empty( $_POST['shipping_city'] ) ) {
                $errors[] = __( 'Town / City is a required field.', 'woocommerce' );
            }
            if ( empty( $_POST['shipping_state'] ) ) {
                $errors[] = __( 'District is a required field.', 'woocommerce' );
            }
            if ( empty( $_POST['shipping_postcode'] ) ) {
                $errors[] = __( 'Postcode / ZIP is a required field.', 'woocommerce' );
            }
			if ( empty( $_POST['shipping_phone'] ) ) {
                $errors[] = __( 'Phone Number is a required field.', 'woocommerce' );
            }
			
			if ( empty( $_POST['billing_email'] ) ) {
                $errors[] = __( 'Email is a required field.', 'woocommerce' );
            }

            // Show Errors & Stop Process If There Are Errors
            if ( ! empty( $errors ) ) {
                foreach ( $errors as $error ) {
                    wc_add_notice( $error, 'error' );
                }
                return; // Stop execution, don't update or redirect
            }

            // Save Shipping Address After Validation Passes
            update_user_meta( $customer_id, 'shipping_first_name', sanitize_text_field( $_POST['shipping_first_name'] ) );
            update_user_meta( $customer_id, 'shipping_last_name', sanitize_text_field( $_POST['shipping_last_name'] ) );
            update_user_meta( $customer_id, 'shipping_company', sanitize_text_field( $_POST['shipping_company'] ) );
            update_user_meta( $customer_id, 'shipping_country', sanitize_text_field( $_POST['shipping_country'] ) );
            update_user_meta( $customer_id, 'shipping_address_1', sanitize_text_field( $_POST['shipping_address_1'] ) );
            update_user_meta( $customer_id, 'shipping_address_2', sanitize_text_field( $_POST['shipping_address_2'] ) );
            update_user_meta( $customer_id, 'shipping_city', sanitize_text_field( $_POST['shipping_city'] ) );
            update_user_meta( $customer_id, 'shipping_state', sanitize_text_field( $_POST['shipping_state'] ) );
            update_user_meta( $customer_id, 'shipping_postcode', sanitize_text_field( $_POST['shipping_postcode'] ) );
			update_user_meta( $customer_id, 'shipping_phone', sanitize_text_field( $_POST['shipping_phone'] ) );
			update_user_meta( $customer_id, 'billing_email', sanitize_text_field( $_POST['billing_email'] ) );

            // Success Message
            wc_add_notice( 'Address updated successfully.', 'success' );

            // Redirect to the same page
            wp_safe_redirect( wc_get_account_endpoint_url( 'edit-address' ) );
            exit;
        }
    }
});

// Dynamically Load States on Country Change
add_action( 'wp_footer', function() {
    if ( ! is_account_page() ) {
        return;
    }
    ?>
    <script>
        jQuery(document).ready(function($) {
			$('select#shipping_country').change(function() {
				let country = $(this).val();
				let stateField = $('#shipping_state');

				if (country) {
					$.ajax({
						url: woocommerce_params.ajax_url, // Ensure this is correctly loaded
						type: 'POST',
						data: {
							action: 'get_wc_states',
							country: country
						},
						success: function(response) {
							if (response.success) {
								if (stateField.is('input')) {
									stateField.replaceWith('<select id="shipping_state" name="shipping_state"></select>');
									stateField = $('#shipping_state'); // Reassign after replacing
								}
								stateField.empty().append('<option value="">Select a State</option>');
								$.each(response.data, function(index, value) {
									stateField.append('<option value="' + index + '">' + value + '</option>');
								});
							} else {
								if (stateField.is('select')) {
									stateField.replaceWith('<input type="text" id="shipping_state" name="shipping_state" placeholder="Enter State" required />');
								}
							}
						}
					});
				}
			});
		});
    </script>
    <?php
}, 20 );


// Register the AJAX handler 
add_action( 'wp_ajax_get_wc_states', 'get_wc_states_callback' );
add_action( 'wp_ajax_nopriv_get_wc_states', 'get_wc_states_callback' ); // For non-logged-in users

function get_wc_states_callback() {
    if ( isset( $_POST['country'] ) ) {
        $country = sanitize_text_field( $_POST['country'] );
        $states  = WC()->countries->get_states( $country );

        if ( ! empty( $states ) ) {
            wp_send_json_success( $states );
        } else {
            wp_send_json_error();
        }
    }
    wp_die();
}






?>


















<?php 




?>