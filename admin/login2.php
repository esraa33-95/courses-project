<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$fullname, $username, $email, $password]);
            header('Location: login2.php');
            exit();
        } catch (PDOException $e) {
            $msg = "Error: " . $e->getMessage();
            
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            $sql = "SELECT * FROM `users` WHERE `username`=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
            $result = $stmt->fetch();

            if ($result && password_verify($password, $user['password'])) {
                $_SESSION['logged'] = true;

                $_SESSION['username']= $result['username'];
                header('Location: addUser.php');
                exit();
            } else {
                $msg = "Incorrect username or password.";
                
            }
        } catch (PDOException $e) {
            $msg = "Error: " . $e->getMessage();
            
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once('components/headlogin.php');?>
  </head>

  <body class="login">
  <?php
              include_once('include/alert.php');
              ?>
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          
          
            <form action="addUser.php" method="POST">
            
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
              </div>
              <div>
                <button type="submit" href="addUser.php" name="login" >Log in</a>
                
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <!-- registration  -->

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i></i> Education Admin</h1>
                  <p>©2016 All Rights Reserved. Education Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

<!-- register  -->

<div id="register" class="animate form registration_form">
          <section class="login_content">

            <form  action="../login2.php" method ="post" >
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Fullname" required="" name="fullname" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" required=""  name="username"/>
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required=""  name="email" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required=""  name="password"/>
              </div>
              <div>
                <a class="btn btn-default submit" href="login2.php" type="button" name="submit">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="login1.php" class="to_register" > Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i></i> Education Admin</h1>
                  <p>©2016 All Rights Reserved. Education Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        
      </div>
    </div>



       
  </body>
</html>