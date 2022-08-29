<?php

function theme_features() {
	register_nav_menu('header-menu', 'Header Menu');
}

add_action('after_setup_theme', 'theme_features');

class bootstrap_walker extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
			$li_class[] = 'nav-item';
			$a_class[] = 'nav-link';
			$aria = '';
			$a_dropdown = '';
			
			if($item->current || $item->current_item_ancestor) {
				$a_class[] = 'active';
				if($item->current) {
					$aria = ' aria-current="page"';
				}
			}
			
			if($item->menu_order != 1 && !$item->menu_item_parent) {
				$li_class[] = 'ms-lg-5';
			}
			
			if($args->walker->has_children && $depth == 0) {
				$li_class[] = 'dropdown';
				$a_class[] = 'dropdown-toggle';
				$item->url = '#';
				$a_dropdown = ' id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"';
			}
			
			$link_tag = '<a class="' . implode(' ', $a_class) . $a_dropdown . $aria . '" href="' . $item->url . '">';
			
			$output .= '<li class="' . implode(' ', $li_class) . '">' . $link_tag . $item->title . '</a>';
		}
		
		function start_lvl(&$output, $depth = 0, $args = null) {
			if(!$depth) {
				$output .= '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
			} else {
				$output .= '<ul>';
			}
		}
}

?>