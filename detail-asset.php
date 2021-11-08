<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['stat_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $kode = $_GET['kode'];
    $data_alat = mysqli_query($conn, "SELECT * FROM tb_alat WHERE kode = '".$kode."' ");

    $p = mysqli_fetch_object($data_alat);

    if(isset($_POST['update'])){
        $query = "UPDATE `tb_alat` SET nama='$_POST[nama]', jenis='$_POST[jenis]', berakhir='$_POST[berakhir]', baru='$_POST[baru]', WHERE kode_data='$kode'";
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
                <li><a href="data-asset.php">Data Asset</a></li>
                <li<a href="#input-data.php">Input Data Baru</a></li>
                <li><a href="keluar.php">Keluar</a></li>
                
            </ul>
        </header>

        <!-- bagian content -->
        <section class="content">
            <h2>Detail Data Alat</h2>
            <div class="box">
                <table class ="table-data" border="0">
                    <tr>
                        <td>Nama Alat</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->nama ?></td>
                    </tr><br>
                    <tr>
                        <td>Serial No.</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->kode ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Alat</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->jenis ?></td>
                    </tr>
                    <tr>
                        <td>Kalibrasi Terakhir</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->berakhir ?></td>
                    <tr>
                        <td>Kalibrasi Selanjutnya</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->baru ?></td>
                    </tr>
                </table>
                <br>
            </div>
        </section>
    </body>
</html>
