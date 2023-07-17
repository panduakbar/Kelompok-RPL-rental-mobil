<?php 
  
  include 'config.php';

  error_reporting(0);
  session_start();

  if (!strlen($_SESSION['email'])==0) {
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);  
      $_SESSION['username'] = $row['username'];
      $_SESSION['email'] = $row['email'];
    }
    else {
      
  }
  }else{
    echo '<script>alert("Harap login !");window.location="index.php"</script>';
  }

    $produk = mysqli_query($conn,"SELECT * FROM mobil WHERE id_mobil = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>rent</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      
  </head>


  <body>

  <nav class="navbar bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="srclogo.png" alt="Logo" width="70" height="50" class="d-inline-block align-text-top">
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
      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Login
      </button>
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
    
  </nav>


    <br>
    <br>
    <div class="container">
      <div class="row">
              <div class="col-sm-4">
              <div class="card">
              <img src="admingambar<?php echo $p->gambar_mobil ?>" class="card-img-top" style="height:200px;">
              <div class="card-body" style="background:#ddd">
                  <h5 class="card-title"><?php echo $p->nama_mobil ?></h5>
              </div>
              <ul class="list-group list-group-flush">

              <?php if($p->statuss == 'Tersedia'){?>
                <li class="list-group-item bg-primary text-white">
                <i class="fa fa-check"></i> Available
                </li>
              <?php }else{?>
                <li class="list-group-item bg-danger text-white">
                <i class="fa fa-close"></i> Not Available
                </li>
              <?php }?>
              <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> <?php echo ($p->no_polisi);?></li>
              <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> <?php echo ($p->type_bb);?></li>
              <li class="list-group-item bg-dark text-white">
                  <i class="fa fa-money" aria-hidden="true"></i> Rp. <?php echo number_format($p->harga);?>/ day
              </li>
              </ul>
              </div>
              </div>
            
            
            
        <div class="col-sm-8">
            <div class="card">
              <div class="card-body">
                  <form method="post" action="cetak.php?" target="_blank">
                        <div class="form-group">
                          <label for="">KTP</label>
                          <input type="text" name="ktp" id="" required class="form-control" placeholder="KTP / NIK Anda">
                        </div> 
                        <div class="form-group">
                          <label for="">Nama</label>
                          <input type="text" name="nama" id="" required class="form-control" placeholder="Nama Anda">
                        </div> 
                        <div class="form-group">
                          <label for="">Alamat</label>
                          <input type="text" name="alamat" id="" required class="form-control" placeholder="Alamat">
                        </div> 
                        <div class="form-group">
                          <label for="">Telepon</label>
                          <input type="text" name="no_tlp" id="" required class="form-control" placeholder="Telepon">
                        </div> 
                        <div class="form-group">
                          <label for="">Tanggal Sewa</label>
                          <input type="date" name="tanggal" id="" required class="form-control" placeholder="Nama Anda">
                        </div> 
                        <div class="form-group">
                          <label for="">Lama Sewa</label>
                          <input type="number" name="lama_sewa" id="" required class="form-control" placeholder="Lama Sewa">
                        </div> 
                        <input type="hidden" value="<?php echo $_SESSION['USER']['id_login'];?>" name="id_login">
                        <input type="hidden" value="<?php echo $p->id_mobil?>" name="id">
                        <input type="hidden" value="<?php echo $p->harga?>" name="total_harga">
                        <hr/>
                        <?php if($p->statuss == 'Tersedia'){?>
                            <button type="submit" class="btn btn-primary float-right">Booking Now</button>
                        <?php }else{?>
                            <button type="submit" class="btn btn-danger float-right" disabled>Booking Now</button>
                        <?php }?>
                  </form>
              </div>
            </div> 
        </div>
    </div>

    </div>

    <br><br><br><br><br><br>

      <footer class="bg-primary text-center text-lg-start">
        <div class="text-center p-3 text-white"  >
            © 2023 Copyright: AutoRent
        </div>
      </footer>

        
  </body>
</html>