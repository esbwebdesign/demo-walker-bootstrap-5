<?php

// Register a custom navigation menu which can be managed in WordPress admin
function theme_features() {
	register_nav_menu('header-menu', 'Header Menu');
}

// Adds that custom navigation menu as soon as the theme is setup
add_action('after_setup_theme', 'theme_features');

// Create a walker
class bootstrap_walker extends Walker_Nav_Menu {
		// Acts at the start of each element (in this case, each menu item)
		function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
			// Create an array for list item classes and anchor classes, and adds the default class to each
			$li_class[] = 'nav-item';
			$a_class[] = 'nav-link';
			// Create some variables that will be empty strings by default
			$aria = '';
			$a_dropdown = '';
			$code_spacer = '';
			
			// Apply a class if the current item is active or one of its children is active
			if($item->current || $item->current_item_ancestor) {
				$a_class[] = 'active';
				// Apply screen reader information if the current item is active
				if($item->current) {
					$aria = ' aria-current="page"';
				}
			}
			
			// If the current item isn't the first in the menu, and it has no parents, then apply a spacng class
			if($item->menu_order != 1) {
				if(!$item->menu_item_parent) {
					$li_class[] = 'ms-lg-5';
				}
			// If the item is the first in the menu, add a new line to the code
			} else {
				$code_spacer = "\r\n";
			}
			// Add tab indentation to the code
			$code_spacer .= str_repeat("\t", $args->tab_depth + $depth);
			
			// If the current menu item has children and is a top-level menu item, add some classes, remove any href it has,
			// and give it some anchor properties
			if($args->walker->has_children && !$depth) {
				$li_class[] = 'dropdown';
				$a_class[] = 'dropdown-toggle';
				$item->url = '#';
				$a_dropdown = ' id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"';
			}
			
			// If the current item has a parent, then give it an anchor class
			if($item->menu_item_parent) {
				$a_class = ['dropdown-item'];
				// If it's also the first level below the top level, remove any list item classes
				if($depth == 1) {
					$li_class = [];
				// If it's deeper than the first level below the top level, then give it a class of list-unstyled
				} else {
					$li_class = ['list-unstyled'];
				}
			}
			
			// Now that all other code has been run, if there are list item classes, prepare a wrapper to hold them
			if(count($li_class)) {
				$class_wrap = [' class="', '"'];
			// If there are no list item classes, just create an empty wrapper (to prevent any items from ending up as <li class="">)
			} else {
				$class_wrap = ['', ''];
			}
			
			// Prepare the link tag, including turning the array of anchor classes into a space-separated list, adding any dropdown properties,
			// any screenreader properties, and the current menu item's URL as set in WordPress admin.
			$link_tag = '<a class="' . implode(' ', $a_class) . $a_dropdown . $aria . '" href="' . $item->url . '">';
			
			// Output the beginning of each menu item with: 1) An opening li tag containing the class wrapper and a list of any list item classes inside it, 2) the link tag 
			// created in the line above, 3) the current menu item title as set in WordPress admin, and 4) a closing anchor tag.
			$output .= $code_spacer . '<li' . $class_wrap[0] . implode(' ', $li_class) . $class_wrap[1]. '>' . $link_tag . $item->title . '</a>';
		}
		
		// Acts at the start of each level below the first (in this case, each sub-menu)
		function start_lvl(&$output, $depth = 0, $args = null) {
			// Set a code spacer to contain a new line and tab indentation equal to the default tab depth, plus the depth of the current sub-menu
			$code_spacer = "\r\n" . str_repeat("\t", $args->tab_depth + $depth);
			// Create a variable that will be an empty string by default
			$ul_add = '';
			// If this is top level of sub-menus, then prepare some additional content to go into the ul tag
			if(!$depth) {
				$ul_add = ' class="dropdown-menu" aria-labelledby="navbarDropdown"';
			}
			// Output the beginning of each submenu with: 1) An opening ul tag containing the $ul_add content (if any) and 2) a new line.
			$output .= $code_spacer . '<ul' . $ul_add . '>' . "\r\n";
		}
		
		// Acts at the end of each level below the first (in this case, each sub-menu)
		function end_lvl(&$output, $depth = 0, $args = null) {
			// Set the tab depth to contain tab indentation equal to the default tab depth, plus the depth of the current sub-menu
			$tab_depth = str_repeat("\t", $args->tab_depth + $depth);
			// Output the end of each submenu with: 1) Tab indentation, 2) a closing ul tag, 3) a new line, and 4) tab indentation.
			$output .= $tab_depth . '</ul>' . "\r\n" . $tab_depth;
		}
		
}

?>