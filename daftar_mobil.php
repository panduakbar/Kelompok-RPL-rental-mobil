<?php
  include('config.php'); //agar index terhubung dengan database, maka conn sebagai penghubung harus di include
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
       
    </style>

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>rent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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

    <div class="col-sm-9" style="padding: 50px; width:100%">
    <form action="daftar_mobil.php"method="get" >
    <div class="input-group" >
    <div class="form-outline">
        <input class="form-control " type="search" name="cari" placeholder="Cari Nama Mobil" aria-label="Search">
    </div>
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
    </form><br><br>

    <a href="cetak_brosur.php">
        <button type="button" class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
            </svg> Cetak Brosur
        </button>
    </a>
    <br><br>

        <div class="row">
            <?php 
                if($_GET)
                {
                    $cari = strip_tags($_GET['cari']);
                    $query =  $conn -> query('SELECT * FROM mobil WHERE nama_mobil LIKE "%'.$cari.'%" ORDER BY id_mobil DESC');
                }else{
                    $query =  $conn -> query('SELECT * FROM mobil ORDER BY id_mobil DESC');
                }

                if($_GET)
                {
                    echo '<h4> Hasil Pencarian : '.$cari.'</h4>';
                }else{
                    echo '<h4> Semua Mobil</h4>';
                }
            ?>
            <div class="row mt-3">
            <?php 
                $no =1;
                foreach($query as $isi)
                {
            ?>
            <div class="col-sm-4">
                <div class="card">
                    <img src="admingambar<?php echo $isi['gambar_mobil'];?>" class="card-img-top" style="height:300px">
                    <div class="card-body" style="background:#ddd">
                        <h5 class="card-title"><?php echo $isi['nama_mobil'];?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if($isi['statuss'] == 'Tersedia'){?>
                            <li class="list-group-item bg-primary text-white">
                                <i class="fa fa-check"></i> Available
                            </li>
                        <?php }else{?>
                            <li class="list-group-item bg-danger text-white">
                                <i class="fa fa-close"></i> Not Available
                            </li>
                        <?php }?>
                        <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> <?php echo ($isi['no_polisi']);?></li>
                        <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> <?php echo ($isi['type_bb']);?></li>
                        <li class="list-group-item bg-dark text-white">
                            <i class="fa fa-money" aria-hidden="true"></i> Rp. <?php echo number_format($isi['harga']);?>/ day
                        </li>
                    </ul>
                    <div class="card-body">
                    <center><a href="booking.php?id=<?php echo $isi['id_mobil'];?>" class="btn btn-success">Booking now!</a></center>
                    </div>
                    </div><br><br>
                </div>
                <?php $no++;}?>
            </div>
        </div>
    </div><br><br><br>

    <footer class="bg-primary text-center text-lg-end">
        <div class="text-center p-3 text-white"  >
            © 2023 Copyright: AutoRent
        </div>
    </footer>

  </body>
</html>