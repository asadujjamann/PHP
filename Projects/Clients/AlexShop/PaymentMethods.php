<?php 










///////////////////////////// Running Codes 
/**
 * Add Custom Content in "Add Payment Method" Page
 */
add_action('woocommerce_account_add-payment-method_endpoint', function() {
    if (is_add_payment_method_page()) {
        ?>
        <div class="add-payment-method-heading">
            <span>New Credit/Debit Card</span>
            <img src="https://shop.alexfisherhealth.com.au/wp-content/uploads/2025/02/Cards-Logos.webp">
        </div>
        <script>
            jQuery(document).ready(function($) {
                var button = $('#place_order');
                if (button.length > 0) {
                    button.val('Save Card').text('Save Card');
                }
            });

        </script>
        <?php
    }
}, 5);


/**
 * Remove Default Payment Methods Table & Replace with Custom in "Payment Methods" Page
 */
function custom_replace_payment_methods_section() {
    // Remove the default WooCommerce payment methods table
    remove_action('woocommerce_account_payment-methods_endpoint', 'woocommerce_account_payment_methods');

    // Add a custom payment methods section
    add_action('woocommerce_account_payment-methods_endpoint', 'custom_payment_methods_table');
}
add_action('init', 'custom_replace_payment_methods_section', 10);


function custom_payment_methods_table() {
    if (!class_exists('WC_Payment_Tokens')) {
        return;
    }

    $user_id = get_current_user_id();
    $tokens = WC_Payment_Tokens::get_customer_tokens($user_id);

    // Fetch customer billing details
    $billing_country_code = get_user_meta($user_id, 'billing_country', true);
    $billing_state_code = get_user_meta($user_id, 'billing_state', true);
	$billing_address = get_user_meta($user_id, 'billing_address_1', true);
    $billing_city = get_user_meta($user_id, 'billing_city', true);
    $billing_postcode = get_user_meta($user_id, 'billing_postcode', true);
	
	// Get country and state names
	$woocommerce_countries = WC()->countries->get_countries();
	$billing_country_name = !empty($billing_country_code) && 
							isset($woocommerce_countries[$billing_country_code]) ? 
							$woocommerce_countries[$billing_country_code] : '-';
	
	$woocommerce_states = WC()->countries->get_states($billing_country_code);
	$billing_state_name = !empty($billing_state_code) && 
						isset($woocommerce_states[$billing_state_code]) ? 
						$woocommerce_states[$billing_state_code] : '-';
	
    echo '<div class="payment-methods-heading">My Payment Methods</div>';

    // If no payment methods exist, show an empty message
    if (empty($tokens)) {
        ?>
        <div class="empty-payment-methods-wrapper">
            <div class="empty-payment-heading">You haven’t added any payment methods yet.</div>
            <div class="empty-payment-info">Once you add your payment details, they’ll be saved here for a faster checkout next time.</div>
            <div class="empty-payment-short-info">Only credit/debit cards.</div>
            <a href="<?php echo esc_url(wc_get_endpoint_url('add-payment-method', '', wc_get_page_permalink('myaccount'))); ?>" 
			   class="btn-add-payment">
                Add Payment Method
            </a>
        </div>
        <?php
        return;
    }

    ?>
    <!-- Display Payment Methods Table -->
    <div class="custom-payment-methods-table-wrapper">
        <table class="custom-payment-methods-table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Card Ending</th>
                    <th>Expiration Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Card Brand Logos Mapping
                $image_base_url = 'https://shop.alexfisherhealth.com.au/wp-content/uploads/2025/02/';
				$brand_logos = [
					'visa'       => $image_base_url . 'Visa.webp',
					'mastercard' => $image_base_url . 'Mastercard.webp',
					'american_express' => $image_base_url . 'AMEX.webp',
					'union_pay'   => $image_base_url . 'UnionPay.webp',
					'discover'   => $image_base_url . 'discover.webp',
					'jcb'        => $image_base_url . 'jcb.webp',
					'diners'     => $image_base_url . 'diners.webp',
				];

                foreach ($tokens as $token) {
					$token_id = $token->get_id(); // Get the token ID
                    $brand = strtolower($token->get_card_type()); // Convert to lowercase for matching
					$last4 = $token->get_last4();
                    $exp_month = $token->get_expiry_month();
                    $exp_year = $token->get_expiry_year();
					
                    $set_default_url = wp_nonce_url(
                        add_query_arg(['set-default-payment-method' => $token_id], wc_get_account_endpoint_url('payment-methods')),
                        'set-default-payment-method-' . $token_id
                    );
					
                    $delete_url = wp_nonce_url(
                        add_query_arg(['delete-payment-method' => $token_id], wc_get_account_endpoint_url('payment-methods')),
                        'delete-payment-method-' . $token_id
                    );

					
                    // Get the brand logo, use a default if not found
                    $brand_logo = isset($brand_logos[$brand]) ? '<img class="card-logo" src="' . esc_url($brand_logos[$brand]) . '" alt="' . esc_attr(ucfirst($brand)) . '" >' : '<img src="https://via.placeholder.com/30" alt="Card">';

                    ?>
                    <tr>
                        <td class="cell-brand-logo"><?php echo $brand_logo; ?></td>
                        <td class="cell-card-number">XXXX XXXX XXXX <span class="last-digits"><?php echo esc_html($last4); ?></span></td>
                        <td class="cell-exp-date"><?php echo esc_html($exp_month . '/' . $exp_year); ?></td>
						<td class="cell-actions">
							<a href="<?php echo esc_url($set_default_url); ?>" 
								   class="btn-make-default set-default-payment-method">Make Default</a>
                            <a href="<?php echo esc_url($delete_url); ?>" class="btn-delete delete-payment-method">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <a class="new-payment-method-button" href="<?php echo esc_url(wc_get_account_endpoint_url('add-payment-method')); ?>">
			NEW PAYMENT METHOD
		</a>
    </div>


	<div class="billing-address-wrapper">
		<div class="billing-address-heading">Billing Address</div>
		<table class="custom-billing-address-table">
            <thead>
                <tr>
                    <th>Country</th>
                    <th>State</th>
                    <th>Stress Address</th>
                    <th>City</th>
                    <th>PostCode</th>
                </tr>
            </thead>
			<tbody>
                <tr>
					<td><?php echo esc_html($billing_country_name); ?></td>
					<td><?php echo esc_html($billing_state_name);?></td>
					<td class='td-billing-address'><?php echo esc_html(!empty($billing_address) ? $billing_address : '-'); ?></td>
					<td><?php echo esc_html(!empty($billing_city) ? $billing_city : '-');?></td>
					<td><?php echo esc_html(!empty($billing_postcode) ? $billing_postcode : '-');?></td>
				</tr>
            </tbody>
		</table>
		<a href="<?php echo esc_url(wc_get_account_endpoint_url('add-payment-method')); ?>" class="edit-billing-address-btn">
			Edit Address
		</a>
	</div>

    <?php
}



/**
 * Handle Deleting Payment Methods
 */
function custom_handle_delete_payment_method() {
    if (!is_user_logged_in() || empty($_GET['delete-payment-method']) || !wp_verify_nonce($_GET['_wpnonce'], 'delete-payment-method-' . $_GET['delete-payment-method'])) {
        return;
    }

    $token_id = absint($_GET['delete-payment-method']);
    $token = WC_Payment_Tokens::get($token_id);

    if ($token && $token->get_user_id() === get_current_user_id()) {
        WC_Payment_Tokens::delete($token_id);
        wc_add_notice(__('Payment method removed successfully.', 'woocommerce'), 'success');
    } else {
        wc_add_notice(__('Invalid payment method.', 'woocommerce'), 'error');
    }

    wp_redirect(wc_get_account_endpoint_url('payment-methods'));
    exit;
}
add_action('template_redirect', 'custom_handle_delete_payment_method');

/**
 * Handle Setting Default Payment Method
 */
function custom_handle_set_default_payment_method() {
    if (!is_user_logged_in() || empty($_GET['set-default-payment-method']) || !wp_verify_nonce($_GET['_wpnonce'], 'set-default-payment-method-' . $_GET['set-default-payment-method'])) {
        return;
    }
	
	
    $token_id = absint($_GET['set-default-payment-method']);
    $token = WC_Payment_Tokens::get($token_id);

    if ($token && $token->get_user_id() === get_current_user_id()) {
        WC_Payment_Tokens::set_users_default(get_current_user_id(), $token_id);
        wc_add_notice(__('Default payment method updated successfully.', 'woocommerce'), 'success');
    } else {
        wc_add_notice(__('Invalid payment method.', 'woocommerce'), 'error');
    }

    wp_redirect(wc_get_account_endpoint_url('payment-methods'));
    exit;
}
add_action('template_redirect', 'custom_handle_set_default_payment_method');


function custom_payment_methods_script() {
    if (is_wc_endpoint_url('payment-methods')) {
        ?>
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            let defaultMethod = localStorage.getItem("default_payment_method");

            // Function to update the UI based on stored default
            function updateDefaultUI() {
                document.querySelectorAll(".set-default-payment-method").forEach(link => {
                    let methodId = link.getAttribute("data-method-id");
                    
                    if (methodId === defaultMethod) {
                        link.textContent = "Default"; // Change text
						link.classList.add("btn-default"); // Add class
                        link.style.pointerEvents = "none"; // Disable clicking
                    } else {
                        link.textContent = "Make Default"; // Reset text
						link.classList.remove("btn-default"); // Remove class
                        link.style.pointerEvents = "auto"; // Enable clicking
                    }
                });
            }

            // Add data-method-id attribute to each link
            document.querySelectorAll(".set-default-payment-method").forEach(link => {
                let url = new URL(link.href);
                let methodId = url.searchParams.get("set-default-payment-method");
                if (methodId) {
                    link.setAttribute("data-method-id", methodId);
                }
            });

            // Run UI update on page load
            updateDefaultUI();

            // Handle clicks on "Make Default" links
            document.querySelectorAll(".set-default-payment-method").forEach(link => {
                link.addEventListener("click", function () {
                    let methodId = this.getAttribute("data-method-id");

                    if (methodId) {
                        localStorage.setItem("default_payment_method", methodId); // Store the selected method
                    }
                    // Allow normal navigation so WooCommerce updates the default method
                });
            });
			
			// Confirmation alert before deleting a payment method
            document.querySelectorAll(".delete-payment-method").forEach(link => {
                link.addEventListener("click", function (event) {
                    event.preventDefault(); // Stop the default action initially
                    let confirmDelete = confirm("Are you sure you want to delete this payment method?");
                    if (confirmDelete) {
                        window.location.href = this.href; // Proceed with deletion if confirmed
                    }
                });
            });
			
        });
        </script>
        <?php
    }
}
add_action('wp_footer', 'custom_payment_methods_script');








// Add Custom Billing Address Form Below the Payment Method Form in "Add Payment Method" Page
add_action('woocommerce_account_add-payment-method_endpoint', 'add_custom_billing_address_form', 20);

function add_custom_billing_address_form() {
    // Get the current user ID
    $user_id = get_current_user_id();

    // Output the Billing Address form
    echo '
		<div class="wc-billing-address-form-wrapper">
		<h4 class="wc-billing-address-heading">Billing Address</h4>
		<form method="post" id="wc-billing-address-form"  class="wc-billing-address-form">
		<div class="wc-billing-address-form-inner">
	';

    // Billing Country
    woocommerce_form_field('billing_country', array(
        'type'        => 'country',
        'required'    => true,
        'default'     => get_user_meta($user_id, 'billing_country', true),
    ));

    // Billing State
    woocommerce_form_field('billing_state', array(
        'type'        => 'state',
        'placeholder' => 'State',
        'required'    => true,
        'default'     => get_user_meta($user_id, 'billing_state', true),
    ));
	
    // Billing Address 1
    woocommerce_form_field('billing_address_1', array(
        'type'        => 'text',
        'placeholder' => 'Street Address',
        'required'    => true,
        'default'     => get_user_meta($user_id, 'billing_address_1', true),
    ));

    // Billing City
    woocommerce_form_field('billing_city', array(
        'type'        => 'text',
        'placeholder' => 'City',
        'required'    => true,
        'default'     => get_user_meta($user_id, 'billing_city', true),
    ));

    // Billing Postcode
    woocommerce_form_field('billing_postcode', array(
        'type'        => 'text',
        'placeholder' => 'Postcode',
        'required'    => true,
        'default'     => get_user_meta($user_id, 'billing_postcode', true),
    ));

    // Add a submit button for the Billing Address Form
    echo '
		</div>
		<div class="submit-btn-wrapper">
			<button type="submit" name="save_billing_address" class="btn-billing-submit">Save Address</button>
		</div>
		</form>
		</div>
	';
}


// Save Billing Address Data When the Form is Submitted
add_action('template_redirect', 'save_custom_billing_address_data');

function save_custom_billing_address_data() {
    if (isset($_POST['save_billing_address'])) {
        $user_id = get_current_user_id();

        if ($user_id) {
            // Save Billing Address Fields
            update_user_meta($user_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
            update_user_meta($user_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
            update_user_meta($user_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']));
            update_user_meta($user_id, 'billing_city', sanitize_text_field($_POST['billing_city']));
            update_user_meta($user_id, 'billing_state', sanitize_text_field($_POST['billing_state']));
            update_user_meta($user_id, 'billing_postcode', sanitize_text_field($_POST['billing_postcode']));
            update_user_meta($user_id, 'billing_country', sanitize_text_field($_POST['billing_country']));

            // Add a success message
            wc_add_notice('Billing address saved successfully.', 'success');

            // Redirect to the same page
            wp_safe_redirect(wc_get_account_endpoint_url('add-payment-method'));
            exit;
        }
    }
}





















/////////////////////////////// Previous Codes 

// Empty Payment Method Area and Remove the Default
function custom_replace_payment_methods_section() {
    // Remove the default payment methods table
    remove_action('woocommerce_account_payment-methods_endpoint', 'woocommerce_account_payment_methods');

	// Add custom message only if no payment methods are available
    add_action('woocommerce_account_payment-methods_endpoint', function () {
		
		echo '<div class="payment-methods-heading">My Payment Methods</div>';
		
        $user_id = get_current_user_id();
        $tokens = WC_Payment_Tokens::get_customer_tokens($user_id);

        if (empty($tokens)) {
		?>
		<div class="empty-payment-methods-wrapper">
			<div class="empty-payment-heading">You haven’t added any payment methods yet.</div>
			<div class="empty-payment-info">Once you add your payment details, they’ll be saved here for a faster checkout next time.</div>
			<div class="empty-payment-short-info">Only credit/debit cards.</div>
			<a href="<?php 
			echo esc_url(wc_get_endpoint_url('add-payment-method', '', wc_get_page_permalink('myaccount'))); 
					 ?>" class="btn-add-payment">
				Add Payment Method
			</a>
		</div>
		<?php
        } else {
            // woocommerce_account_payment_methods(); // Display the default table if methods exist
        }
    });
}
add_action('init', 'custom_replace_payment_methods_section');



// Add Payment Method Area
/* Add a Text and Image before the form(add_payment_method)
 * Change the Submit Button text to "Save"
 */
add_action('woocommerce_account_add-payment-method_endpoint', function() {
	if (is_add_payment_method_page()) {
	?>
	<div class="add-payment-method-heading">
		<span>New Credit/Debit Card</span>
		<img src="https://shop.alexfisherhealth.com.au/wp-content/uploads/2025/02/Cards-Logos.webp">
	</div>
	<script>
		jQuery(document).ready(function($) {
			var button = $('#place_order');
			if (button.length > 0) {
				button.val('Save').text('Save');
			}
		});
	</script>
	<?php
	}
}, 5);








// /* 
add_action('woocommerce_account_payment-methods_endpoint', 'custom_payment_methods_table');

function custom_payment_methods_table() {
    if (!class_exists('WC_Payment_Tokens')) {
        return;
    }

    $tokens = WC_Payment_Tokens::get_customer_tokens(get_current_user_id());
    
    if (empty($tokens)) {
        echo '<p>You have no saved payment methods.</p>';
        return;
    }

    echo '<div class="custom-payment-methods-container">';
    
    echo '<h2>My Payment Methods</h2>';
    
    echo '<table class="custom-payment-methods-table">';
    echo '<thead>
            <tr>
                <th>Type</th>
                <th>Card Ending</th>
                <th>Expiration Date</th>
                <th>Billing Address</th>
                <th>Country</th>
                <th>Edit</th>
            </tr>
          </thead>';
    echo '<tbody>';
    
    foreach ($tokens as $token) {
        $brand = $token->get_card_type();
        $last4 = $token->get_last4();
        $exp_month = $token->get_expiry_month();
        $exp_year = $token->get_expiry_year();
        $billing_address = '88941 Wendy Points, North Grayson'; // Replace with actual billing address logic
        $country = 'Australia'; // Replace with actual country logic
        
        // Get card brand logo
        $brand_logo = '';
        if ($brand === 'visa') {
            $brand_logo = '<img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" width="40">';
        } elseif ($brand === 'mastercard') {
            $brand_logo = '<img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="MasterCard" width="40">';
        }

        echo '<tr>';
        echo '<td>' . $brand_logo . '</td>';
        echo '<td>XXXX XXXX XXXX <strong>' . esc_html($last4) . '</strong></td>';
        echo '<td>' . esc_html($exp_month . '/' . $exp_year) . '</td>';
        echo '<td>' . esc_html($billing_address) . '</td>';
        echo '<td>' . esc_html($country) . '</td>';
        echo '<td><a href="#" class="edit-payment-method"><span>&#9998;</span></a></td>';
        echo '</tr>';
    }
    
    echo '</tbody></table>';
    
    echo '<a class="new-payment-method-button" href="' . esc_url(wc_get_account_endpoint_url('add-payment-method')) . '">NEW PAYMENT METHOD</a>';
    
    echo '</div>';
}
// */



?>








