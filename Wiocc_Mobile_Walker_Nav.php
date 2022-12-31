<?php
/**
 * Created by PhpStorm.
 * User: komu
 * Date: 3/12/18
 * Time: 6:31 AM
 */

class Wiocc_Mobile_Walker_Nav  extends Walker_Nav_Menu{
	/**
	 * Filter used to remove built in WordPress-generated classes
	 * @param  mixed $var The array item to verify
	 * @return boolean      Whether or not the item matches the filter
	 */
	public $menu_side='menu-left';
	function filter_builtin_classes( $var ) {
		return ( FALSE === strpos( $var, 'item' ) ) ? $var : '';
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {

		if($depth==1){
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul class='inner-sub-menu'>\n";
		}
		else {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul class='sub-menu'>\n";
		}
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		if($args->walker->has_children)
		{
			if($depth==1){
				if($this->menu_side=='menu-left'){
					$item->classes[] = ' inner has-dropdown level-' . $depth . ' type-' . sanitize_title( $item->title );
					//$this->menu_side='menu-right';
				}
				else{
					$item->classes[] = 'menu-right';
					$this->menu_side='menu-left';
				}


			}
			else {
				$item->classes[] = 'has-dropdown level-' . $depth . ' type-' . sanitize_title( $item->title );
			}
		}

		$unfiltered_classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes = array_filter( $unfiltered_classes, array( $this, 'filter_builtin_classes' ) );


		if ( preg_grep("/^current/", $unfiltered_classes) ) {
			$classes[] = 'active';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $value . $class_names .'>';

		$atts = array();
		if($depth==1){
			$atts['class'] = 'hide';
		}
		else {
			$atts['class'] = 'ajax-menu';
		}

		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';

		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		if($depth==0){
			$atts['href'] = 'javascript:void(0);';
		}
		else {
			$atts['href'] = ! empty( $item->url ) ? $item->url : '';
		}

		$atts['data-hovermenu']   = ! empty( $item->title )        ? $item->title        : '';
		$atts['data-menu-id']   = ! empty( $item->ID )        ? $item->ID        : '';
		$atts['data-menu-slug']   = sanitize_title( $item->title );
		$atts['id']   = sanitize_title( $item->title );
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {

				if('href' === $attr ){
					if($depth==0){
						$value = $item->url;
					}
					elseif ($depth==1){
					    if($atts['id']=='our-solutions' || $atts['id']=='our-clients') {
                            $value = 'javascript:void(0)';
                        }

                    }
					else{
						$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					}
				}
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}


		$item_output = $args->before;

		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element ) {
			return;
		}

		$id_field = $this->db_fields['id'];
		$id  = $element->$id_field;

		//display this element
		$this->has_children = ! empty( $children_elements[ $id ] );
		if ( isset( $args[0] ) && is_array( $args[0] ) ) {
			$args[0]['has_children'] = $this->has_children; // Back-compat.
		}

		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'start_el'), $cb_args);

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach ( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array($this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array($this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array($this, 'end_el'), $cb_args);
	}


}
