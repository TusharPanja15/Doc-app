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
        <p class="info"><b>Email:</b> '. $row['email'] .'</p>

        <p class="card-text text-muted">BASIC INFORMATION</p>
        <p class="info"><b>Birthday:</b> '. $row['birthday'] .'</p>
        <p class="info"><b>Gender:</b> '. $row['gender'] .'</p>';

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