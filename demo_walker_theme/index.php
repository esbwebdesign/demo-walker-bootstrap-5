<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-light bg-light">
			<div class="container">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<?php
				// Baseline tab indentation for the menu's code
				$tab_depth = 6;
				wp_nav_menu(array(
					// Menu name
					'theme_location' => 'header-menu',
					// Type of container to wrap the menu in
					'container' => 'div',
					// Class to give that container
					'container_class' => 'collapse navbar-collapse',
					// ID to give that container
					'container_id' => 'navbarSupportedContent',
					// How to wrap the menu items within the container listed above
					'items_wrap' => '<ul class="navbar-nav ms-auto">%3$s' . str_repeat("\t", $tab_depth-2) . '</ul>',
					// References a wakler defined in functions.php
					'walker' => new bootstrap_walker(),
					// Passes a tab_depth argument into the walker
					'tab_depth' => $tab_depth
				));
				// Adds a new line after the menu code
				echo "\r\n";
				?>
			</div>
		</nav>
		<script type='text/javascript' src='//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js' id='bootstrap-5-js'></script>
	</body>
</html>