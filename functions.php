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

    function userProfile() {
        global $link;
        $query = "SELECT * FROM users WHERE id = ". $_SESSION['id'] ." LIMIT 1";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        echo '<p class="card-text text-muted">CONTACT INFORMATION</p>
        <p class="info"><b>Phone:</b> '. $row['phone'] .'</p>
        <p class="info"><b>Address:</b></p>
        <p class="info"><b>Email:</b> <a href="#">'. $row['email'] .'</a></p>

        <p class="card-text text-muted">BASIC INFORMATION</p>
        <p class="info"><b>Birthday:</b> '. $row['birthday'] .'</p>
        <p class="info"><b>Gender:</b> '. $row['gender'] .'</p>';
    }

    function userName() {
        global $link;
        $query = "SELECT * FROM users WHERE id = ". $_SESSION['id'] ." LIMIT 1";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row['is_doctor'] == true) {
            $salutaion = "Dr.";
        } 

        echo '<h1>' .$salutaion. ' ' .$row['username']. '</h1>
        <small>
            <p><img id="locIcon" src="public/img/icons/location2.svg" alt="">New York ,NY</p>
        </small>';
    }

    function userProfileEditForm() {
        global $link;
        $query = "SELECT * FROM users WHERE id = ". $_SESSION['id'] ." LIMIT 1";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);

        echo '<div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" disabled value = "'. $row['email'] .'">
        <div id="emailHelp" class="form-text">Well never share your email with anyone else.</div>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="username" value = "'. $row['username'] .'">
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" value = "'. $row['phone'] .'">
      </div>

      <div class="col-12 mb-3">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
      </div>
      <div class="col-12 mb-3">
        <label for="inputAddress2" class="form-label">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-6">
          <label for="inputState" class="form-label">State</label>
          <input type="text" class="form-control" id="inputState">
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <label for="inputZip" class="form-label">Zip</label>
        <input type="text" class="form-control" id="inputZip">
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
    }

    function headerBar() {
        echo '<p class="font-1">Goodbye doubts,</p>
        <h1 class="display-4"><u>Say Hello Doctor.</u></h1>
        <p class="font-1">24/7 Video consultations.</p>';
    }

    function aboutUs() {
        echo ' <div class="card mb-5 pb-5">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="public/img/IMG-20210718-WA0000.jpg" class="img-fluid rounded-start image--cover" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title display-4 mb-4">Guru ji</h5>
                    <p class="card-text ms-5">Dont oversmart with our Guru ji A.K.A. <b>Analyst</b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-5 pb-5">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title display-4 mb-4">The Maker</h5>
                    <p class="card-text ms-5">Our Maker A.K.A. <b>Designer</b></p>
                </div>
            </div>
            <div class="col-md-4">
                <img src="public/img/IMG-20210718-WA0000.jpg" class="img-fluid rounded-start image--cover" alt="...">
            </div>
        </div>
    </div>

    <div class="card mb-5 pb-5">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="public/img/IMG-20210718-WA0000.jpg" class="img-fluid rounded-start image--cover" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title display-4 mb-4">Bugger</h5>
                    <p class="card-text ms-5">Meet the DieHard Bugger or <b>Coder</b></p>
                </div>
            </div>
        </div>
    </div>';
    }

?>