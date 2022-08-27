<?php
function theme_features() {
	register_nav_menu('header-menu', 'Header Menu');
}

add_action('after_setup_theme', 'theme_features');
?>