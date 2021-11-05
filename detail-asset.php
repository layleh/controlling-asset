<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['stat_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $nip_data = $_GET['nip'];
    $data_karyawan = mysqli_query($conn, "SELECT * FROM tb_pendataan WHERE nip = '".$nip_data."' ");

    $p = mysqli_fetch_object($data_karyawan);

    if(isset($_POST['update'])){
        $query = "UPDATE `tb_pendataan` SET nama='$_POST[nama]', jabatan='$_POST[jabatan]', alamat='$_POST[alamat]', no_hp='$_POST[no_hp]', email='$_POST[email]' WHERE nip='$nip_data'";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            echo '<script type="text/javascript"> alert("Data Update") </script>';
            echo '<script>window.location="data-asset.php"</script>';
        }
        else{
            echo '<script type="text/javascript"> alert("Data Not Update") </script>';
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Form Controlling Asset | Administrator </title>
        <link rel="stylesheet" type="text/css" href="css/editPage.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
    </head>
    <body>
        <!-- bagian header -->
        <header>
            <h1><a href="beranda.php"> Admin Controlling Asset </a></h1>
            <ul>
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="data-karyawan.php">Data Asset</a></li>
                <li<a href="#input-data.php">Input Data Baru</a></li>
                <li><a href="keluar.php">Keluar</a></li>
                
            </ul>
        </header>

        <!-- bagian content -->
        <section class="content">
            <h2>Edit Data Alat</h2>
            <div class="box">
                <table class ="table-data" borde="0">
                    <tr>
                        <td>Nama Alat</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->nama ?></td>
                    </tr><br>
                    <tr>
                        <td>Jenis Alat</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->nip ?></td>
                    </tr>
                    <tr>
                        <td>Kalibrasi Terakhir</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->jabatan ?></td>
                    <tr>
                        <td>Kalibrasi Selanjutnya</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->alamat ?></td>
                    </tr>
                </table>
                <br>
                <center>
                    <form action="" method="POST">
                        <input type="text" name="nama" placeholder="Masukkan Nama Alat"/><br>
                        <input type="text" name="jabatan" placeholder="Masukkan Jenis Alat"/><br>
                        <input type="text" name="alamat" placeholder="Masukkan Kalibrasi Terakhir"/><br>
                        <input type="text" name="no_hp" placeholder="Masukkan Kalibrasi Selanjutnya"/><br>

                        <input type="submit" name="update" value="UPDATE DATA" class="button"/>
                    </form>
                </center>
            </div>
        </section>
    </body>
</html>