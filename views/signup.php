<?php
  include_once 'Header.php';
  

  if (isset($_POST['submit'])) {
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $pwd        = $_POST['pwd'];
    $pwdRepeat  = $_POST['cfrm-pwd'];
    $tel        = $_POST['tel'];
    $address    = $_POST['address'];

    include_once '..\includes\db.inc.php';
    include_once "..\includes\Function.inc.php";

    if (signupFormEmpty($name, $email, $tel, $address, $pwd, $pwdRepeat) !== false) {
        header("location: ../views/signup.php?error=emptyinput");
        exit();
    }

    if (invaidEmail($email) !== false){
      header("location: ../views/signup.php?error=invalidemail");
      exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
      header("location: ../views/signup.php?error=password-don't-match");
      exit();
    }

    if (emailExist($connect, $email) !== false) {
      header("location: ../views/signup.php?error=emailExist");
      exit();
    }

    addManager($connect, $name, $email, $pwd, $tel, $address);

  }

?>
<div class="container my-5">
    <form method="post">
    <div class="form-group">
    <label for="exampleInputEmail1"><b>Name</b></label>
    <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Enter your name" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><b>Email address</b></label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter your email" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><b>Telephone</b></label>
    <input type="number" class="form-control" id="exampleInputTel1"  name="tel" placeholder="Enter your phone number" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><b>Address</b></label>
    <input type="text" class="form-control" id="exampleInputAddress1" name="address" placeholder="Enter your address" autocomplete="off">
  </div>
 <div class="form-group">
    <label for="exampleInputPassword1"><b>Password</b></label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pwd" placeholder="Enter your password" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><b>Confirm password</b></label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cfrm-pwd" placeholder="Enter your password" autocomplete="off">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
