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

  <script>
    let map, infoWindow;

    function initMap() {
      // Styles a map in night mode.
      map = new google.maps.Map(document.getElementById("map"), {
        center: {
          lat: 40.674,
          lng: -73.945
        },
        zoom: 12,
        styles: [{
            elementType: "geometry",
            stylers: [{
              color: "#242f3e"
            }]
          },
          {
            elementType: "labels.text.stroke",
            stylers: [{
              color: "#242f3e"
            }]
          },
          {
            elementType: "labels.text.fill",
            stylers: [{
              color: "#746855"
            }]
          },
          {
            featureType: "administrative.locality",
            elementType: "labels.text.fill",
            stylers: [{
              color: "#d59563"
            }],
          },
          {
            featureType: "poi",
            elementType: "labels.text.fill",
            stylers: [{
              color: "#d59563"
            }],
          },
          {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [{
              color: "#263c3f"
            }],
          },
          {
            featureType: "poi.park",
            elementType: "labels.text.fill",
            stylers: [{
              color: "#6b9a76"
            }],
          },
          {
            featureType: "road",
            elementType: "geometry",
            stylers: [{
              color: "#38414e"
            }],
          },
          {
            featureType: "road",
            elementType: "geometry.stroke",
            stylers: [{
              color: "#212a37"
            }],
          },
          {
            featureType: "road",
            elementType: "labels.text.fill",
            stylers: [{
              color: "#9ca5b3"
            }],
          },
          {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{
              color: "#746855"
            }],
          },
          {
            featureType: "road.highway",
            elementType: "geometry.stroke",
            stylers: [{
              color: "#1f2835"
            }],
          },
          {
            featureType: "road.highway",
            elementType: "labels.text.fill",
            stylers: [{
              color: "#f3d19c"
            }],
          },
          {
            featureType: "transit",
            elementType: "geometry",
            stylers: [{
              color: "#2f3948"
            }],
          },
          {
            featureType: "transit.station",
            elementType: "labels.text.fill",
            stylers: [{
              color: "#d59563"
            }],
          },
          {
            featureType: "water",
            elementType: "geometry",
            stylers: [{
              color: "#17263c"
            }],
          },
          {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{
              color: "#515c6d"
            }],
          },
          {
            featureType: "water",
            elementType: "labels.text.stroke",
            stylers: [{
              color: "#17263c"
            }],
          },
        ],
      });
      infoWindow = new google.maps.InfoWindow();
      const locationButton = document.createElement("button");
      locationButton.textContent = "Pan to Current Location";
      locationButton.classList.add("custom-map-control-button");
      map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
      locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
            (position) => {
              const pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
              };
              infoWindow.setPosition(pos);
              infoWindow.setContent("Location found.");
              infoWindow.open(map);
              map.setCenter(pos);
            },
            () => {
              handleLocationError(true, infoWindow, map.getCenter());
            }
          );
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      });
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(
        browserHasGeolocation ?
        "Error: The Geolocation service failed." :
        "Error: Your browser doesn't support geolocation."
      );
      infoWindow.open(map);
    }
  </script>
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
          <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
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

  <div class="alert alert-success" id="alertInfo" role="alert">Successfully login!</div>