<?php 

// Add headings to the Edit Account form
add_action( 'woocommerce_edit_account_form_start', function() {
    echo '<h4 class="personal-info-heading">Personal Information</h4>';
}, 25 );


add_action( 'woocommerce_edit_account_form', 'add_placeholders_to_edit_account_form' );
function add_placeholders_to_edit_account_form() {
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Define placeholders for specific fields in the edit account form
            const placeholders = {
                account_first_name: 'First Name*',
                account_last_name: 'Last Name*',
                account_display_name: 'Display Name*',
                account_email: 'Email Address*',
                password_current: 'Current Password*',
                password_1: 'New Password*',
                password_2: 'Confirm New Password*',
            };

            // Loop through the placeholders and add them to the fields
            for (const [fieldId, placeholder] of Object.entries(placeholders)) {
                const field = document.getElementById(fieldId);
                if (field) {
                    field.setAttribute('placeholder', placeholder);
                }
            }
			
			// Define custom classes for specific form fields
            const fieldClasses = {
                account_first_name: 'form-row-first_name',
                account_last_name: 'form-row-last_name',
                account_display_name: 'form-row-display_name',
                account_email: 'form-row-email',
                password_current: 'form-row-password_current',
                password_1: 'form-row-password_1',
                password_2: 'form-row-password_2',
            };
			// Add the custom classes to the parent `<p>` of each field
            for (const [fieldId, customClass] of Object.entries(fieldClasses)) {
                const field = document.getElementById(fieldId);
                if (field) {
                    const parent = field.closest('.form-row'); // Find the parent form-row
                    if (parent) {
                        parent.classList.add(customClass); // Add the custom class
                    }
                }
            }
			
			// Select the button inside the <p> tag
			const button = document.querySelector('button[name="save_account_details"]');
			if (button) {
				// Get the parent <p> tag of the button
				const parentParagraph = button.closest('p');
				if (parentParagraph) {
					// Add your desired class to the <p> tag
					parentParagraph.classList.add('form-row-submit');
				}
				button.textContent = "Save"; // Change button text
			}

			
        });
    </script>
    <?php
}









?>