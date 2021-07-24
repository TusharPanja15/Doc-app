<?php

ini_set("display_errors", "off");

    session_start();

    $link = mysqli_connect("localhost", "root", "", "doc-app");

    if (mysqli_connect_errno()) {
        print_r(mysqli_connect_error());
        exit();
    }

    if ($_GET['function'] == "logout") {
        session_unset();
    }

    

    function user($type) {
      global $link;

      if ($type == 'profileName') {

        $query = "SELECT * FROM users_data WHERE user_id = ". $_SESSION['id'] ." LIMIT 1";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row['is_doctor'] == true) {
            echo '<h1>Dr. ' .$row['username']. '</h1>
            <small>
            <p class="ms-5">' . $row['specialization'] . ' Speclist</p>
            <p class="ms-5">' . $row['experience'] . ' Years of experience</p>
                <a data-bs-toggle="offcanvas" data-bs-target="#mapsOverview" aria-controls="offcanvasRight">
                  <p><img id="locIcon" src="public/img/icons/location2.svg" alt="">' . $row['city'] . ', ' . $row['state'] . '</p>
                </a>
            </small>';
        } else {

        echo '<h1>' .$row['username']. '</h1>
        <small>
            <a data-bs-toggle="offcanvas" data-bs-target="#mapsOverview" aria-controls="offcanvasRight">
              <p><img id="locIcon" src="public/img/icons/location2.svg" alt="">' . $row['city'] . ', ' . $row['state'] . '</p>
            </a>
        </small>';
        }

      } else if ($type == 'profileDetails') {

        $query = "SELECT *
                    FROM users_data
                    INNER JOIN users
                    ON users.id = users_data.user_id
                    WHERE users_data.user_id = ". $_SESSION['id'] ." LIMIT 1";

        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        $dateOfBirth = $row['birthday'];
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));

        echo '<p class="card-text text-muted">CONTACT INFORMATION</p>
        <p class="info"><b>Phone:</b> '. $row['phone'] .'</p>
        <p class="info"><b>Address:</b> '. $row['address'] .', '. $row['street_address'] .', '. $row['city']. ', '. $row['state'] .'</p>
        <p class="info"><b>Email:</b> <a href="#">'. $row['email'] .'</a></p>

        <p class="card-text text-muted">BASIC INFORMATION</p>
        <p class="info"><b>Birthday:</b> '. $row['birthday'] .'</p>
        <p class="info"><b>Age:</b> '. $diff->format('%y') .' years & '. $diff->format('%m') .' months</p>
        <p class="info"><b>Gender:</b> '. $row['gender'] .'</p>';
      }
    }


    function userProfileEditForm() {
        global $link;

        $query = "SELECT * 
                    FROM users_data
                    INNER JOIN users
                    ON users.id = users_data.user_id
                    WHERE users_data.user_id = ". $_SESSION['id'] ." LIMIT 1";

        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        $echo = '<div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" disabled value = "'. $row['email'] .'">
        <div id="emailHelp" class="form-text">Well never share your email with anyone else.</div>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="username" value = "'. $row['username'] .'">
      </div>';

      if ($row['is_doctor'] == true) {

      $echo .= '<div class="row mb-3">
      <div class="col-md-6">
        <label for="specialization" class="form-label">Specialization</label>
        <input type="text" class="form-control" id="specialization" value = "'. $row['specialization'] .'">
        </div>
        <div class="col-md-6">
          <label for="experience" class="form-label">Experience (in Years)</label>
          <input type="text" class="form-control" id="experience" value = "'. $row['experience'] .'">
        </div>
      </div>';

      } 

      $echo .= '<div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" value = "'. $row['phone'] .'">
      </div>

      <div class="col-12 mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" placeholder="1234 Main St" value = "'. $row['address'] .'">
      </div>
      <div class="col-12 mb-3">
        <label for="street_address" class="form-label">Address 2</label>
        <input type="text" class="form-control" id="street_address" placeholder="Apartment, studio, or floor" value = "'. $row['street_address'] .'">
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="city" class="form-label">City</label>
          <input type="text" class="form-control" id="city" value = "'. $row['city'] .'">
        </div>
        <div class="col-md-6">
          <label for="state" class="form-label">State</label>
          <input type="text" class="form-control" id="state" value = "'. $row['state'] .'">
        </div>
      </div>

      <div class="row mb-3">
      <div class="col-md-6">
        <label for="pincode" class="form-label">Zip</label>
        <input type="text" class="form-control" id="pincode" value = "'. $row['pincode'] .'">
        </div>
        <div class="col-md-6">
          <label for="country" class="form-label">Country</label>
          <input type="text" class="form-control" id="country" value = "'. $row['country'] .'">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="gender" class="form-label">Gender</label>
          <select id="gender" class="form-select">
            <option selected>'. $row['gender'] .'</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="birth" class="form-label">Birthday</label>
          <input type="text" class="form-control" id="birth" value = "'. $row['birthday'] .'">
        </div>
      </div>';

      echo $echo;
    }


    function getDoctors() {

      global $link;

        $query = "SELECT * 
                    FROM users_data
                    INNER JOIN users
                    ON users.id = users_data.user_id
                    WHERE users_data.is_doctor = true
                    ORDER BY users_data.user_id DESC";

        $result = mysqli_query($link, $query);

        $i=0;
        while($row = mysqli_fetch_assoc($result)) {

        $echo = '<div class="card mb-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="public/img/icons/person.svg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">Dr. '. $row['username'] .'</h3>
                    <p><b>Specialization: </b>'. $row['specialization'] .'</p>
                    <p><b>Experience:</b> '. $row['experience'] .' Years approx.</p>
                    <p><b>Locaton: </b>Delhi</p>
                    <div class="col">';

                    if ($_SESSION['id'] == true) {
                      $echo .='<a class="btn btn-outline-primary loginBtns" data-bs-toggle="offcanvas" href="#offcanvasChat" role="button" aria-controls="offcanvasExample">Chat</a>';
                    } else {
                      $echo .='<a class="btn btn-outline-primary loginBtns" id="confirmation" data-bs-toggle="modal" data-bs-target="#loginSignUpModal">Chat</a>';
                    }
                      $echo .= '<a class="btn btn-info ms-1" data-bs-toggle="offcanvas" href="#user_id_'. $row['user_id'] .'" role="button" aria-controls="offcanvasExample">Doctor Info!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>';



    $echo .= '<div class="offcanvas offcanvas-start" tabindex="-1" id="user_id_'. $row['user_id'] .'" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Doctor Info!</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="col">
  
        <div class="row profileInfo">
          <img class="mx-3 " src="public/img/icons/person.svg" alt="">
        </div>
  
        <div class="col m-5">
          <h2>Dr. '. $row['username'] .'</h2>
        </div>
  
        <table class="table table-hover" id="general">
          <thead>
            <tr>
              <th><img id="icons" src="public/img/icons/newspaper.svg"></th>
              <th>General</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="feature">Specialization</td>
              <td>'. $row['specialization'] .'</td>
            </tr>
            <tr>
              <td class="feature">Experience</td>
              <td>'. $row['experience'] .' Years approx.</td>
            </tr>
            <tr>
              <td class="feature">Clinic Address</td>
              <td>'. $row['address'] .', '. $row['street_address'] .', '. $row['city'] .', '. $row['pincode'] .', '. $row['state'] .'.</td>
            </tr>
          </tbody>
        </table>
  
      </div>
    </div>
  </div>';

    echo $echo;

    $i++;
    }

    }

?>