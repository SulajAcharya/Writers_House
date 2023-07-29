<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if (isset($page_title) && !empty($page_title)): ?>
		<title>
			<?php echo trim($page_title); ?> | WritersHouse
		</title>
	<?php else: ?>
		<title>WritersHouse</title>
	<?php endif; ?>
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow navbar-custom">
    <div class="container">
      <a class="navbar-brand writershouse-title fw-bold text-primary" href="#">WritersHouse</a>
      <form class="col-md-5 offset-md-1">
        <div class="input-group">
          <input class="form-control border-end-0 border-secondary tedt-dark" type="search" placeholder="Search" id="example-search-input">
          <span class="input-group-append">
            <button class="btn bg-white border-start-0 border-secondary rounded-end" type="button">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#"><span>Explore Now</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><span>Sign In</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><span>Register</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>