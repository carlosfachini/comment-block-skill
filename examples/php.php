<?php
/* [START: LOGIC]
########################################################################
|| Title: FINAL PRICE CALCULATION                                     ||
|| Date: 2026-04-24                                                   ||
||                                                                    ||
|| Applies discounts before formatting the order total.                ||
########################################################################
[END: LOGIC] */
function calculate_final_price(float $subtotal, float $discount): float {
    return max(0, $subtotal - $discount);
}
?>

<!-- [START: SECTION]
########################################################################
|| Title: CHECKOUT SUMMARY                                            ||
|| Date: 2026-04-24                                                   ||
||                                                                    ||
|| Displays the calculated order total to the customer.                ||
########################################################################
[END: SECTION] -->
<section class="checkout-summary">
  <?= calculate_final_price(120, 15) ?>
</section>
