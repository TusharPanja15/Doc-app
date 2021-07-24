<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Harmattan&display=swap" rel="stylesheet">

  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link href="public/css/style.css" rel="stylesheet" type="text/css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <title></title>

  <script src="public/js/maps.js"></script>

</head>

<body>

  <header class="p-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap" />
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <?php 
              $query = "SELECT * FROM users_data WHERE user_id = ". $_SESSION['id'] ." LIMIT 1";
              $result = mysqli_query($link, $query);
              $row = mysqli_fetch_assoc($result);
                  if ($row['is_doctor'] == true) { ?>
                    <li><a href="?view=dashboard" class="nav-link px-2 text-secondary">Dashboard</a></li>
                  <?php } else { ?>
                    <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
                  <?php } ?>
          <li><a href="?view=about" class="nav-link px-2 text-secondary">About Us</a></li>
          <li><a href="?view=contacts" class="nav-link px-2 text-secondary">Contact Us</a></li>
        </ul>

        <div class="text-end">

          <?php if ($_SESSION['id']) { ?>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="?view=myProfile" class="nav-link px-2 me-4 text-secondary">My Profile</a></li>
              <a class="btn btn-outline-danger" href="?function=logout">
                Logout
              </a>
            </ul>
          <?php } else { ?>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loginSignUpModal">
              Login/Sign-up
            </button>
          <?php } ?>
        </div>
      </div>
    </div>
  </header>

  <div class="alert alert-danger" id="alertInfo">User Login is required!</div>