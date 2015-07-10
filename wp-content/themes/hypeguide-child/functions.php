<?php 


add_filter( 'woocommerce_loop_add_to_cart_link', 'change_add_to_cart_loop' );
function change_add_to_cart_loop( $product ) {
    global $product; // this may not be necessary as it should have pulled the object in already
    return '<a href="'. esc_url( $product->get_permalink( $product->id ) ) . '">View Product</a>';
}

?>