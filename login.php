<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="Website Icon" type="jpg" href="assets/randoms.jpg">
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="./registerStyles.css" />
    <meta charset="UTF-8" />
    <title>Student's E-portfolio</title>
</head>
  <body>
    <div id="form">
      <div class="container">
        <p
          style="
            margin-top: 5%;
            text-align: center;
            color: rgb(18, 237, 245);
            font-size: 520%;
            font-family: impact;
            text-shadow: 3px 1px #034e73;
          "
        >
          WELCOME TO STUDENT'S E-PORTFOLIO
        </p>

        <div
          class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8 col-md-offset-2"
        >
          <div id="userform">
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active">
                <a href="#login" role="tab" data-toggle="tab">Log in</a>
              </li>
              <li>
                <a href="#signup" role="tab" data-toggle="tab">Signup</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade active in" id="login">
                <h2 class="text-uppercase text-center">Log in</h2>
                  <form action="index.php" method="post" id="login_form">
                    <div class="form-group">
                      <input
                        type="email"
                        class="form-control"
                        placeholder="Email*"
                        id="login_email"
                        name="login_email"
                        required
                        autocomplete="off"
                      />
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                      <input
                        type="password"
                        class="form-control"
                        placeholder="Password*"
                        id="login_password"
                        name="login_password"
                        required
                        autocomplete="off"
                      />
                      <p class="help-block text-danger"></p>
                    </div>
                    <div class="mrgn-30-top">
                      <button
                        type="button"
                        class="btn btn-larger btn-block"
                        id="submit_btn"
                        onClick="login()"
                        name="submit_btn"
                      >
                        Log in
                      </button>
                      <p id="login_error" style="color: red"></p>
                    </div>
                  </form>
              </div>

              <div class="tab-pane fade in" id="signup">
                <h2 class="text-uppercase text-center">Sign Up</h2>
                <form action="index.php" method="post" id="form_signup">
                  <div class="row">
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="First Name *"
                          id="first_name"
                          name="first_name"
                          autocomplete="off"
                        />
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Last Name *"
                          id="last_name"
                          name="last_name"
                          autocomplete="off"
                        />
                        <p class="help-block text-danger"></p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input
                      type="email"
                      class="form-control"
                      placeholder="Your Email *"
                      id="signup_email"
                      name="signup_email"
                      autocomplete="off"
                    />
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input
                      type="tel"
                      class="form-control"
                      placeholder="Phone # *"
                      id="phone"
                      name="phone"
                      autocomplete="off"
                    />
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input
                      type="password"
                      class="form-control"
                      placeholder="Password *"
                      id="signup_password"
                      name="signup_password"
                      autocomplete="off"
                    />
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="mrgn-30-top">
                    <button
                      id="signup_submit"
                      name="signup_submit"
                      type="button"
                      onClick="register()"
                      class="btn btn-larger btn-block"
                    >
                      Sign up
                    </button>
                    <p id="signup-error" style="color: red"></p>
                    <p id="signup-success" style="color: green"></p>
                  </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
      function register() {
        const fname = document.getElementById('first_name').value;
        const lname = document.getElementById('last_name').value;
        const email = document.getElementById('signup_email').value;
        const phone = document.getElementById('phone').value;
        const password = document.getElementById('signup_password').value;


        $.ajax({
          method: "POST",
          url: "functions.php",
          data: {
            type: "register",
            fname: fname,
            lname: lname,
            phone: phone,
            email: email,
            password: password,
          },
          success: function (data) {
            var signup = {};
            signup = JSON.parse(data);

            const signup_success = document.getElementById("signup-success");
            const signup_error = document.getElementById("signup-error");

            var err = signup.error;

            if(!err) {
              signup_success.innerHTML = signup.message;
              signup_error.innerHTML = "";
            }

            else {
              signup_error.innerHTML = signup.message;
              signup_success.innerHTML = "";
            }
          },
        });
      }

      function login() {
        const email = document.getElementById('login_email').value;
        const password = document.getElementById('login_password').value;

        $.ajax({
          method: "POST",
          url: "functions.php",
          data: {
            type: "login",
            email: email,
            password: password,
          },
          success: function (data) {
            var logging_in = {};
            logging_in = JSON.parse(data);

            document.getElementById("login_error").innerHTML = logging_in.message;

            var err = logging_in.error;

            if(!err) {
              window.location.href = "homepage.php";
            }
          },
        });
      }
    </script>
  </body>
</html>
