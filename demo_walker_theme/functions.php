<?php

function theme_features() {
	register_nav_menu('header-menu', 'Header Menu');
}

add_action('after_setup_theme', 'theme_features');

class bootstrap_walker extends Walker_Nav_Menu {
		function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
			$li_class[] = 'nav-item';
			$a_class[] = 'nav-link';
			
			$link_tag = '<a class="' . implode(' ', $a_class) . '" href="' . $item->url . '">';
			
			$output .= '<li class="' . implode(' ', $li_class) . '">' . $link_tag . $item->title . '</a>';
		}
}

?>