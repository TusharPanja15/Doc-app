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
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" disabled>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
              <label for="username" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="username">
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone">
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
                  <option selected>Choose...</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="birth" class="form-label">Birthday</label>
                <input type="text" class="form-control" id="birth">
              </div>
            </div>

            <button type="submit" id="saveDetails" class="btn btn-primary">Save changes</button>
          </form>
        </div>
      </div>
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
        <div class="col-8">col-8</div>
        <div class="col-4">col-4</div>
      </div>
    </div>
  </div>
  </div>
</footer>


<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&libraries=&v=weekly" async></script>


<script>
  $(document).ready(function() {
    $(this).attr("title", "<?= $title; ?>");
  });

  $(function() {
    $("#birth").datepicker();
  });

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
      $("#checkDoctorDiv").css({"display": "block"})
      $("#toogle").css({"margin-top": "-5px"})

    } else {

      $("#loginActive").val("1")
      $("#loginModalTitle").html("Welcome Back! Login to continue.")
      $("#loginSignupButton").html("Login")
      $("#toogleLogin").html("Sign up")
      $("#checkDoctorDiv").hide()
      $("#toogle").css({"margin-top": "50px"})

    }

  })


  $("#loginSignupButton").click(function() {

    $.ajax({
      type: "POST",
      url: "actions.php?action=loginSignup",
      data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&checkDoctor=" + $("#checkDoctor").val() + "&loginActive=" + $("#loginActive").val(),
      success: function(result) {
        if (result == "1") {
          window.location.assign("index.php");
          $("#alertInfo").show();
        } else {
          $("#loginAlert").html(result).show();
        }
      }
    })

  })


  
  $("#saveDetails").click(function() {

    $.ajax({
      type: "POST",
      url: "actions.php?action=saveDetails",
      data: "username=" + $("#username").val() + "&phone=" + $("#phone").val() + "&gender=" + $("#gender").val() + "&birth=" + $("#birth").val(),
      success: function(result) {
        if (result == "1") {
          window.location.assign("index.php?view=myProfile");
          //$("#alertInfo").show();
        } else {
          //$("#loginAlert").html(result).show();
        }
      }
    })

  })

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>