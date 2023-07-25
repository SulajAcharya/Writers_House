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
      <a class="navbar-brand writershouse-title font-weight-bold" href="#" style="color: #2091F9;">WritersHouse</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto"> <!-- Right align the navigation links -->
          <li class="nav-item">
            <form class="d-flex">
              <div class="input-group rounded">
                <input class="form-control border-end-0 border rounded-start" type="search" placeholder="search" id="example-search-input">
                <span class="input-group-append">
                  <button class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border rounded-end" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#"><span class="font-weight-bold">Explore Now</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#"><span class="font-weight-bold">Sign In</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#"><span class="font-weight-bold">Register</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
