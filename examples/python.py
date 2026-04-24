# [START: LOGIC]
# ######################################################################
# || Title: FINAL PRICE CALCULATION                                   ||
# || Date: 2026-04-24                                                 ||
# ||                                                                  ||
# || Applies discounts before returning the payable total.             ||
# ######################################################################
# [END: LOGIC]
def calculate_final_price(subtotal: float, discount: float) -> float:
    return max(0, subtotal - discount)
