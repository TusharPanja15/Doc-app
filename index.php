<?php

$title = "";

include('functions.php');
include('views/header.php');

if ($_GET['view'] == "findDoctorsNearMe") {

    $title = "Find Doctors | Doc App";
    include('views/doctors.php');

} else if ($_GET['view'] == "about") { 

    $title = "About us | Doc App";
    include('views/about.php'); 

} else if ($_GET['view'] == "contacts") { 

    $title = "Contact us | Doc App";
    include('views/contact.php'); 

} else if ($_GET['view'] == "myProfile") { 

    $title = "My Profile - ". $_SESSION['id'] ." | Doc App";
    include('views/profiles.php'); 

} else if ($_GET['view'] == "dashboard") { 

    $title = "My Dashboard - ". $_SESSION['id'] ." | Doc App";
    include('views/dashboard.php'); 

} else {

    $title = "Doc App | Search, Consult with doctors and more.";
    include('views/home.php');

}

include('views/footer.php');

?>