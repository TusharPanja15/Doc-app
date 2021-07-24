<div class="modal fade" id="loginSignUpModal" tabindex="-1" aria-labelledby="loginSignUpModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalTitle">Welcome Back! Login to continue.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col">
              <img src="public/img/login.gif" id="loginGif">
            </div>
            <div class="col">
              <form>
                <input type="hidden" name="loginActive" id="loginActive" value="1">
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="text" class="form-control" id="email" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="pasword" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password">
                </div>
                <div class="mb-3 form-check" id="checkDoctorDiv">
                  <input class="form-check-input" type="checkbox" id="checkDoctor" value="0">
                  <label class="form-check-label">Register as Doctor</label>
                </div>
              </form>
              <div id="toogle">
                <button class="btn btn-primary loginBtns" id="loginSignupButton">Login</button>
                <a id="toogleLogin" class="btn btn-outline-secondary loginBtns">Signup</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer" id="login-modal-footer">
        <div class="container">
          <div class="row">
            <div class="col"></div>
            <div class="col-6">
              <div class="alert alert-danger" id="loginAlert"></div>
            </div>
            <div class="col"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">
      <small"><img class="mx-3" src="public/img/icons/edit.svg" alt=""></small>Edit your details.
    </h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="container">
      <div class="row">
        <div class="col">
          <form>
            <?php userProfileEditForm(); ?>
            <button type="submit" id="saveDetails" class="btn btn-primary">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="offcanvas offcanvas-end" tabindex="-1" id="mapsOverview" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">
      <small"><img class="mx-3" src="public/img/icons/location.svg" alt=""></small>Your location.
    </h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="container">
      <div class="row">
        <div class="col">
          <div id="map"></div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasChat" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Offcanvas right</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Email address</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
  </div>
</div>





<footer>
  <div class="footer-padding"></div>
  <div class="container mx-auto px-5">
    <img src="public/img/footer img.png" alt="">
  </div>
  <div class="footer">
    <div class="container p-5">
      <div class="row px-3">
        <div class="col-8">
          <section id="footer">
            <div class="container px-5">
              <div class="footer-top">
                <p id="p1" class="">BE BETTER</p>
                <p id="p2" class="">EVERYDAY</p>
              </div>
            </div>
          </section>
        </div>
        <div class="col-4"><img src="public/img/development.gif" alt=""></div>
      </div>
    </div>
  </div>
  </div>
</footer>

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKE9giRdAF9YnX9vEaaBnmdFmW3W4F_vI&callback=initMap&libraries=&v=weekly" async></script> -->

<script>
  $(document).ready(function() {
    $(this).attr("title", "<?= $title; ?>");
  })

  $("#confirmation").click(function() {
    $("#alertInfo").css({
      "display": "inline"
    }).fadeOut(9000);
  });

  $(function() {
    var pickerOpts = {
      changeMonth: true,
      changeYear: true,
      maxDate: "+0D",
      dateFormat: "yy-mm-dd"
    };
    $("#birth").datepicker(pickerOpts);
  })

  $("#checkDoctor").click(function() {
    if ($("#checkDoctor").val() != "1") {
      $("#checkDoctor").val("1")
    } else {
      $("#checkDoctor").val("0")
    }
  })

  $("#toogleLogin").click(function() {

    if ($("#loginActive").val() == "1") {

      $("#loginActive").val("0")
      $("#loginModalTitle").html("Welcome New User! Sign up yourself.")
      $("#loginSignupButton").html("Sign up")
      $("#toogleLogin").html("Login")
      $("#checkDoctorDiv").css({
        "display": "block"
      })
      $("#toogle").css({
        "margin-top": "-5px"
      })

    } else {

      $("#loginActive").val("1")
      $("#loginModalTitle").html("Welcome Back! Login to continue.")
      $("#loginSignupButton").html("Login")
      $("#toogleLogin").html("Sign up")
      $("#checkDoctorDiv").hide()
      $("#toogle").css({
        "margin-top": "50px"
      })

    }
  })


  $("#loginSignupButton").click(function() {

    $.ajax({
      type: "POST",
      url: "actions.php?action=loginSignup",
      data: "email=" + $("#email").val() +
        "&password=" + $("#password").val() +
        "&checkDoctor=" + $("#checkDoctor").val() +
        "&loginActive=" + $("#loginActive").val(),
      success: function(result) {
        if ($("#checkDoctor").val() == true) {
          window.location.assign("index.php?view=myProfile")
        } else {

          if (result == "1") {
            window.location.assign("index.php")
          } else {
            $("#loginAlert").html(result).css({
              "display": "inline"
            }).fadeOut(10000)
          }
        }
      }
    })
  })



  $("#saveDetails").click(function() {

    $.ajax({
      type: "POST",
      url: "actions.php?action=saveDetails",
      data: "username=" + $("#username").val() +
        "&specialization=" + $("#specialization").val() +
        "&experience=" + $("#experience").val() +
        "&phone=" + $("#phone").val() +
        "&address=" + $("#address").val() +
        "&street_address=" + $("#street_address").val() +
        "&city=" + $("#city").val() +
        "&state=" + $("#state").val() +
        "&pincode=" + $("#pincode").val() +
        "&country=" + $("#country").val() +
        "&gender=" + $("#gender").val() +
        "&birth=" + $("#birth").val(),
      success: function(result) {
        if (result == "1") {
          window.location.assign("index.php?view=myProfile")
        } else {
          window.location.assign("index.php?view=myProfile")
        }
      }
    })
  })



  $(document).ready(function() {

    fetch_user()

    setInterval(function() {
      update_last_activity()
      fetch_user()
    }, 5000)

    function update_last_activity() {

      $.ajax({
        url: "actions.php?action=last_activity",
        success: function() {

        }
      })
    }

  })
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>