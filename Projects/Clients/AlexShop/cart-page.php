<?php 




/////////////////////////////////////// 29-dec-2024   10:45am  (All are Working...)


/////////////////  Open Popup when Clicking ".checkout-button" and ".elementor-button--checkout"  /////////////////
add_action('wp_footer', function () {
    if (!is_user_logged_in()) {
        ?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                const popupID = 6879; // Specify your Elementor popup ID

                // Function to handle checkout buttons
                function handleCheckoutButtons() {
                    const buttons = document.querySelectorAll('.checkout-button, .elementor-button--checkout');
                    buttons.forEach(button => {
                        if (!button.dataset.prevented) {
                            button.dataset.prevented = true;
                            button.addEventListener('click', function (event) {
                                event.preventDefault(); // Prevent navigation
                                if (typeof elementorProFrontend !== 'undefined') {
                                    elementorProFrontend.modules.popup.showPopup({
                                        id: popupID
                                    });
                                } else {
                                    console.error('Elementor Pro Frontend is not loaded.');
                                }
                            });
                        }
                    });
                }

                // Initial check for buttons
                handleCheckoutButtons();

                // Use MutationObserver to monitor DOM changes
                const observer = new MutationObserver(handleCheckoutButtons);
                observer.observe(document.body, { childList: true, subtree: true });
            });
        </script>
        <?php
    }
});

/////////////////  If Popup opening fails, redirect to Login page  /////////////////
// Backend restriction for added security
add_action('template_redirect', function () {
    if ( ! is_user_logged_in() && is_checkout() && ! is_cart() ) {
        wp_safe_redirect( 'https://shop.alexfisherhealth.com.au/login/' );
        exit;
    }
});







///////////////// Add Custom Links "Plus", "Minus", "Delete" inside Quntity Div /////////////////
function add_custom_buttons_to_cart_quantity() {
    global $product;

    // Check if the current page is the cart page
    if (is_cart()) {
			echo "
				<a href='' class='custom-atc-btn delete'><img src='https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Delete.svg'></a>
				<a href='' class='custom-atc-btn minus'><img src='https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Minus.svg'></a>
				<a href='' class='custom-atc-btn plus'><img src='https://shop.alexfisherhealth.com.au/wp-content/uploads/2024/12/Plus.svg'></a>
			";
    }
}
add_action('woocommerce_after_quantity_input_field', 'add_custom_buttons_to_cart_quantity');

/////////////////  Make Functional the "Plus", "Minus", "Delete"   /////////////////
add_action('wp_footer', function () {
	if (is_cart()) {
?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    //////////////////// Custom Delete Button ////////////////////
    function initializeCustomDeleteButtons() {
        document.querySelectorAll(".custom-atc-btn.delete").forEach(function (customDeleteButton) {
            customDeleteButton.addEventListener("click", function (e) {
                e.preventDefault(); // Prevent default link behavior

                const cartRow = this.closest("tr");
                const originalRemoveLink = cartRow.querySelector(".remove");

                if (originalRemoveLink) {
                    originalRemoveLink.click();
                }
            });
        });
    }

    //////////////////// Show-Hide Logic ////////////////////
    function updateButtonVisibility(input) {
        const cartRow = input.closest("tr");
        const deleteBtn = cartRow.querySelector(".custom-atc-btn.delete");
        const minusBtn = cartRow.querySelector(".custom-atc-btn.minus");
        const value = parseInt(input.value, 10) || 0;

        if (value === 1) {
            deleteBtn.style.display = "inline-flex";
            minusBtn.style.display = "none";
        } else if (value > 1) {
            deleteBtn.style.display = "none";
            minusBtn.style.display = "inline-flex";
        }
    }

    function initializeShowHideLogic() {
        document.querySelectorAll(".input-text.qty").forEach(function (input) {
            updateButtonVisibility(input);

            // Add event listener to monitor changes
            input.addEventListener("change", function () {
                updateButtonVisibility(input);
            });
        });
    }

    //////////////////// Custom Plus and Minus Buttons ////////////////////
    const updateCartWithQuantity = (input) => {
        input.dispatchEvent(new Event("change", { bubbles: true }));

        const form = input.closest("form.woocommerce-cart-form");
        if (form) {
            const updateButton = form.querySelector('button[name="update_cart"]');
            if (updateButton) {
                updateButton.removeAttribute("disabled");
                updateButton.click();
            }
        }
    };

    const updateQuantity = (input, increment) => {
        const currentValue = parseInt(input.value, 10) || 0;
        const step = parseInt(input.getAttribute("step"), 10) || 1;
        const min = parseInt(input.getAttribute("min"), 10) || 1;
        const max = parseInt(input.getAttribute("max"), 10) || Infinity;

        let newValue = currentValue + (increment ? step : -step);
        newValue = Math.max(min, Math.min(newValue, max));

        if (newValue !== currentValue) {
            input.value = newValue;
            updateCartWithQuantity(input);
        }
    };

    document.body.addEventListener("click", function (e) {
        const plusBtn = e.target.closest(".custom-atc-btn.plus");
        const minusBtn = e.target.closest(".custom-atc-btn.minus");

        if (plusBtn || minusBtn) {
            e.preventDefault();
            const input = (plusBtn || minusBtn)
                .closest(".quantity")
                .querySelector("input.qty");

            if (input) {
                updateQuantity(input, !!plusBtn);
                updateButtonVisibility(input);
            }
        }
    });

    // Initial setup
    initializeCustomDeleteButtons();
    initializeShowHideLogic();

    // Reinitialize after WooCommerce updates the cart via AJAX
    jQuery(document.body).on("updated_wc_div", function () {
        initializeCustomDeleteButtons();
        initializeShowHideLogic();
    });
});

</script>

<?php
	}
});