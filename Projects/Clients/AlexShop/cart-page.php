<?php 





// Show Popup when click the "Proceed to Checkout" button
// Add custom class and trigger Elementor popup for logged-out users
function custom_checkout_button_for_logged_out_users() {
	// Check if the user is logged out
    if ( ! is_user_logged_in() ) { 
        ?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                // Get the "Proceed to Checkout" button
                var checkoutButton = document.querySelector('.checkout-button');

                // Check if the button exists
                if (checkoutButton) {
                    // Add custom class for Elementor popup
                    checkoutButton.classList.add('checkout-button-for-popup');

                    // Prevent default action and trigger Elementor popup
                    checkoutButton.addEventListener('click', function(event) {
                        event.preventDefault(); // Prevent navigation to the checkout page

                        // Trigger Elementor popup using the class selector
                        if (typeof elementorProFrontend !== 'undefined') {
                            elementorProFrontend.modules.popup.showPopup({
                                id: 6879, // Optional: Specify popup ID if needed
                                selector: '.checkout-button-for-popup' // Use the same selector set in Elementor
                            });
                        } else {
                            console.error('Elementor Pro Frontend is not loaded.');
                        }
                    });
                }
            });
        </script>
        <?php
    }
}
add_action( 'wp_footer', 'custom_checkout_button_for_logged_out_users' );







