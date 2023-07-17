<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak</title>

    <style>
        .wrapper {
            width: 50%;
            margin: 0 auto;
            border: 1px solid black;
            padding: 1em;
        }

        .wrapper h3 {
            text-align: center;
            text-decoration: underline;
        }
    </style>

</head>

<body>
    <div class="wrapper">
    <h3>INVOICE BOOKING</h3>
    <table class="table table-striped">
                <tbody border="">
                  <tr>
                    <td ><b>KTP</b></td>
                    <td><b> :</b></td>
                    <td><?= $_POST['ktp'] ?></td>
                  </tr>
                  <tr >
                    <td ><b>Nama Penyewa</b></td>
                    <td><b> :</b></td>
                    <td><?= $_POST['nama'] ?></td>
                  </tr>
                  <tr>
                    <td ><b>Alamat</b></td>
                    <td><b> :</b></td>
                    <td><?= $_POST['alamat'] ?></td>
                  </tr>
                  <tr>
                    <td ><b>No Telepon</b></td>
                    <td><b> :</b></td>
                    <td><?= $_POST['no_tlp'] ?></td>
                  </tr>
                  <tr>
                    <td ><b>Tanggal</b></td>
                    <td><b> :</b></td>
                    <td><?= $_POST['tanggal'] ?></td>
                  </tr>
                  <tr>
                    <td ><b>Lama Sewa</b></td>
                    <td><b> :</b></td>
                    <td><?= $_POST['lama_sewa'] ?></td>
                  </tr>
                  <tr>
                    <td ><b>Total Harga</b></td>
                    <td><b> :</b></td>
                    <td><?= $_POST['total_harga'] ?></td>
                  </tr>
                </tbody>
        </table>
        <br><br><br>*Harap Bawa Kartu ini saat pengambilan Mobil!!
    </div>
    <script type="text/javascript">
        window.onload = function() {
            window.print();
        }
    </script>

</body>

</html>