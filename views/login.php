<?php
    include_once 'Header.php';
    include_once '..\includes\db.inc.php';

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $pwd   = $_POST['password'];

        require_once "../includes/Function.inc.php";

        if (loginFormEmpty($email, $pwd) !== false) {
            header("location ../views/login?error=emptyfields");
            exit();
        }

        loginManager($connect, $email, $pwd);
    }

?>


<div class="container my-5">
    <form method="post">
        <h1 class="text-center">Login</h1>
        <?php
         $po = '<p class="text-center text-primary font-weight-bold">';
         $pc = '</p>';

         if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields"){
                echo $po."Fill in all fields".$pc;
            }elseif ($_GET['error'] == "wronglogin"){
                echo $po."Wrong login please retry".$pc;
            }elseif ($_GET['error'] == "incorrectpassword"){
                echo $po."Incorrect password please retry".$pc;
            }elseif ($_GET['error'] == "none"){
                header("location: ../views/index.php");
            }
         }
        ?>
        <div class="form-group">
        <label for="exampleInputEmail1"><b>Email address</b></label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter your email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1"><b>Password</b></label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your password">
    </div>
    <div class="text-center">
        <p >You don't have an account yet? <a href="../views/signup.php" class="text-primary">Signup</a></p>
        <button type="submit" class="btn btn-primary " name="submit">Login</button>
    </div>
    
    </form>

</div>
