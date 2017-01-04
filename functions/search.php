<?php
/**
 * Search Functions
 *
 * @package Bulmapress
 */

function bulmapress_search_form( $form ) {
    $form = '
    <form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
      <h2 class="widget-title is-bold">Search</h2>
      <div class="control has-addons">
        <label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
        <input class="input" type="text" value="' . get_search_query() . '" name="s" id="s" />
        <input class="button" type="submit" id="searchsubmit" value="'. esc_attr__( 'Submit' ) .'" />
      </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'bulmapress_search_form', 100 );
