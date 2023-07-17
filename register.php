<?php 
 
include 'config.php';
error_reporting(0);

 

 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>















<!doctype html>
<html lang="en">
    <style>
        /* .container{
            background-color: #2196f3;
            height: 500px;
            margin: 0px;
            margin-bottom: 50px;
            width: 100%;
            min-height: 500px;
            margin-top: 100px;
        } */
        .banner{
            float: left;
            width: 50%;
            padding: 100px;
            min-height: 500px;
        }
        .clearfix{
            background-color: #2196f3;
        }
        
       
    </style>



  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

  <body> 
    

    <nav class="navbar bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="logo.png" alt="Logo" width="70" height="50" class="d-inline-block align-text-top">
        Rent Car AutoRent
        </a>
    </div>
    </nav>

    <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid ">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="daftar_mobil.php">Daftar Mobil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="faq.php">FAQS</a>
        </li>
        </ul>
        </div>
    </div>
    </nav>


    <div class="container ">
        <form action="" method="POST" class="register">
            <br><p class="login-text" style="font-size: 2rem; ">Register</p>
            
            <div class="input-group mb-3 w-75">
                <span class="input-group-text w-25" id="basic-addon1">Email</span>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3 w-75">
                <span class="input-group-text w-25" id="basic-addon1">Username</span>
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Username" aria-label="username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3 w-75">
                <span class="input-group-text w-25" id="basic-addon1">Password</span>
                <input type="password" class="form-control" name="password" value="<?php echo $_POST['password']; ?>" placeholder="Password" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3 w-75">
                <span class="input-group-text w-25" id="basic-addon1">Confirm Password</span>
                <input type="password" class="form-control" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" placeholder="Confirm Password" aria-describedby="basic-addon1">
            </div>
            
            <br><div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button class="btn btn-secondary me-md-2 w-25" type="reset">Batal</button>
                <button name="submit" class="btn btn-primary w-25" type="submit">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>

        </form>
    </div>

    <br><br><br><br><br><br><br>

    



    
    <footer class="bg-primary text-center text-lg-start">
        <div class="text-center p-3 text-white"  >
            © 2023 Copyright: AutoRent
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>