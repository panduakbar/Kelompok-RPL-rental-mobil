<?php
  include('config.php'); 
  error_reporting(0);
  session_start();
  if (isset($_POST['submit'])) {

    
 
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
      $result = mysqli_query($conn, $sql);
      
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);  
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
          echo "<script>alert('Login Berhasil')</script>";
          
      } else {
          echo "<script>alert('NISN atau password Anda salah. Silahkan coba lagi!')</script>";
      }
    }
  
?>

<!doctype html>
<html lang="en">
    <style>
        .atas{
            background-color: #2196f3;
            height: 200px;
            margin: 0px;
            margin-bottom: 50px;
        }
        .kiri{
            float: left;
            width: 50%;
            padding: 100px;
            padding-left: 150px;
            padding-right: 150px;
            /* border: 2px solid black; */
        }
        .col{
            width: 50px;
        }

    @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");

    body {
        background: #fff;
        font-family: "Roboto", sans-serif;
    }

    .main-content {
        padding-top: 100px;
        padding-bottom: 100px;
    }

    .flex-center {
        align-items: center;
    }

    .accordion-button {
        margin-bottom: 10px;
    }

    .accordion-body {
        margin-top: 15px;
        padding: 25px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 25px -3px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
    }

    .circle-icon {
        height: 50px;
        width: 50px;
        border-radius: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #2b4eff;
        border: 5px solid #b2bfff;
        color: #fff;
        margin-left: -20px;
        margin-right: 10px;
        transform: scale(1.2);
    }

    .accordion-item {
        border: 0px !important;
    }

    .accordion-button:not(.collapsed) {
        border: 0px !important;
        color: #0c63e4;
        background-color: #ffffff;
        box-shadow: inset 0 0px 0 rgb(0 0 0 / 13%);
    }
    body {
            background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(234, 249, 251, 0.63) 0.1%, rgba(239, 249, 251, 0.63) 90.1%);
        }
    </style>

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
       
        
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

    <?php if(strlen($_SESSION['email'])==0){?>
      
        
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Login</button>
     
  
  <?php }
  else{ ?>
    <div class="btn-group">
      <button class="btn btn-primary dropdown-toggle " type="button" data-bs-toggle="dropdown" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </svg>    
      <?php echo $_SESSION['username']?></a></li> 
      </button>
      <ul class="dropdown-menu dropdown-menu-lg-end">
        
        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
      </ul>
    </div>
  <?php } ?> 

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Silahkan Login</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

      <form action="" method="POST" class="login-email">
      <div class="modal-body">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" placeholder="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
        </div>
        
        <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button name="submit" type="submit" class="btn btn-primary" value="submit">Login</button>
        </div>
      </form>
      </div>
    </nav>

    <br><br><br>
    
    <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <div class="circle-icon"> <i class="fa fa-question"></i> </div> 
      <b>Apa Keuntungan Rental Mobil di AutoRent dibandingkan dengan Menyewa Langsung di Rental?</b>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Anda akan mendapatkan banyak keuntungan jika memutuskan untuk menyewa mobil di AutoRent, Keuntungan yang akan Anda dapatkan antara lain adalah sebagai berikut :</strong>
      <table class="table">
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Antarmuka Informatif</td>
            </tr>
            <tr>
            <th scope="row"></th>
                <td>Anda dapat mengetahui kondisi mobil sebenar-benarnya.Setiap rental mobil dan entri mobil disajikan sedetail mungkin. Ulasan-ulasan pengunjung lain juga dapat membantu Anda memilih mobil terbaik.</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Sesuai Pilihan</td>
            <tr>
            <th scope="row"></th>
                <td>Mobil yang Anda dapatkan adalah mobil yang telah Anda pilih. Keuntungan ini tidak bisa Anda dapatkan jika menyewa langsung ke rental. Mereka mungkin bisa menyewakan mobil sesuai kriteria Anda tetapi tidak tepat sesuai pilihan Anda. Sistem AutoRent membantu Anda mendapatkan mobil sesuai pilihan bahkan menyediakan detail plat nomor kendaraan sebagai sarana identifikasi.</td>
            </tr>
            <tr>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Harga Sewa Termurah</td>
            </tr>
            <tr>
            <th scope="row"></th>
                <td>Anda dapat membandingkan biaya mobil dari rental satu dengan rental lainnya sehingga menjamin Anda mendapatkan harga termurah dari jenis mobil yang sama. AutoRent menyediakan promo-promo yang akan membuat Anda bisa mendapatkan mobil dengan harga lebih murah lagi..</td>
            </tr>
            <tr>
        </tbody>
    </table>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <div class="circle-icon"> <i class="fa fa-question"></i> </div>
      <b>Mobil jenis apa saja yang disewakan?</b>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <strong>Untuk Melayani Rental Mobil Kami Menyediakan Hampir Semua Jenis Mobil, dari Mobil Jenis City Car Hingga Mobil Mewah.</strong><br> Kami mempunyai mobil-mobil bermerek : Avanza, Xenia, Grand Innova, civic, Pajero Sport, Ertiga, Honda Brio, dan Xpander. </br>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
      <div class="circle-icon"> <i class="fa fa-question"></i> </div> 
      <b>Apakah menyewa mobil di AutoRent diperbolehkan lepas kunci (tidak menggunakan driver)?</b>
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      Saat ini, Rental Mobil di AutoRent Harus Menggunakan Driver dengan Pertimbangan Sulitnya Persyaratan Administrasi yang Diperlukan Untuk Menyewa tanpa Driver Lepas Kunci.
      </div>
    </div>
  </div>
</div>
    <br><br><br><br><br><br><br><br>

    <footer class="bg-primary text-center text-lg-end">
        <div class="text-center p-3 text-white"  >
            © 2023 Copyright: AutoRent
        </div>
    </footer>

  </body>
</html>