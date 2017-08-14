<?php

class bulmapress_navwalker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $link_classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $is_parent = in_array( 'menu-item-has-children', $link_classes, true );
        $link_classes[] = 'menu-item-' . $item->ID;

        if ($is_parent) {
            $link_classes[] = 'navbar-link';
        }
        else {
            $link_classes[] = 'navbar-item';
        }

        if ( in_array( 'current-menu-item', $link_classes, true ) ) {
            $link_classes[] = 'is-active';
        }
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $link_classes ), $item, $args ) );

        $id = esc_attr('menu-item-'. $item->ID);

        $attributes  = !empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= !empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= !empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= !empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= !empty( $class_names )      ? ' class="'  . esc_attr( $class_names      ) .'"' : '';
        $attributes .= !empty( $id )               ? ' id="'     . esc_attr( $id               ) .'"' : '';

        $item_output = $args->before;
        if ($is_parent) {
            $item_output .= '<div class="navbar-item has-dropdown is-hoverable"><a '. $attributes .'>';
        }
        else {
            $item_output .= '<a '. $attributes .'>';
        }
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= "</a>";
        if ($is_parent) {
            $item_output .= '<div class="navbar-dropdown ">';
        }
        $item_output .= $args->after;

        $output .= $item_output;
    }
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $is_parent = in_array( 'menu-item-has-children', $item->classes, true );
        if ($is_parent) {
            $output .= '</div></div>';
        }
    }
}
