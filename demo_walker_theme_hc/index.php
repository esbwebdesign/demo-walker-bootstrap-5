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
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="#">Home</a>
							</li>
							<li class="nav-item ms-lg-5">
								<a class="nav-link" href="http://www.google.com">Google</a>
							</li>
							<li class="nav-item dropdown ms-lg-5">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">W3 Schools</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="https://www.w3schools.com/html/">HTML</a></li>
									<ul>
										<li class="list-unstyled"><a class="dropdown-item" href="https://www.w3schools.com/html/html5_semantic_elements.asp">Semantic HTML</a></li>
									</ul>
									<li><a class="dropdown-item" href="https://www.w3schools.com/php/">PHP</a></li>
								</ul>
							</li>
							<li class="nav-item ms-lg-5">
								<li><a class="nav-link" href="<?php echo site_url('/about-us'); ?>">About Us</a></li>
							</li>
						</ul>
					</div>
			</div>
		</nav>
		<script type='text/javascript' src='//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js' id='bootstrap-5-js'></script>
	</body>
</html>