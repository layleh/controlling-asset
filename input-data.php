<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['stat_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    if(isset($_POST['submit'])){
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $vendor = $_POST['vendor'];
        $jenis = $_POST['jenis'];
        $keterangan = $_POST['keterangan'];
        $berakhir = $_POST['berakhir'];
        $baru = $_POST['baru'];

        

        

        if(empty($nama)){
            echo '<script type="text/javascript"> alert("Nama Tidak Boleh Kosong") </script>';
        }
        elseif(empty($kode)){
            echo '<script type="text/javascript"> alert("Kode Tidak Boleh Kosong") </script>';
        }
        elseif(empty($vendor)){
            echo '<script type="text/javascript"> alert("Vendor Tidak Boleh Kosong") </script>';
        }
        elseif(empty($jenis)){
            echo '<script type="text/javascript"> alert("Jenis Tidak Boleh Kosong") </script>';
        }
        elseif(empty($keterangan)){
            echo '<script type="text/javascript"> alert("Keterangan Tidak Boleh Kosong") </script>';
        }
        elseif(empty($berakhir)){
            echo '<script type="text/javascript"> alert("Tanggal Berakhir Tidak Boleh Kosong") </script>';
        }
        elseif(empty($baru)){
            echo '<script type="text/javascript"> alert("Tanggal Baru Tidak Boleh Kosong") </script>';
        }
        
        else{
            $namaGambar = $_FILES['file']['name'];
            //tempat folder
            $path = $_FILES['file']['tmp_name'];
            //proses upload
            move_uploaded_file($path, 'uploads/'.$namaGambar);

            $query = "INSERT INTO tb_alat (kode, nama, vendor, keterangan, jenis, berakhir, baru, foto) VALUES ('$kode', '$nama', '$vendor', '$keterangan', '$jenis', 
                    '$berakhir', '$baru', '$namaGambar')";

            $check = mysqli_query($conn, $query);

            if($check){
                echo '<script type="text/javascript"> alert("Data Berhasil Di Input") </script>';
                echo '<script>window.location="data-asset.php"</script>';
            }
            else{
                echo '<script type="text/javascript"> alert("Data Gagal Di Input") </script>';
            }
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
                <li><a href="keluar.php">Keluar</a></li>
                
            </ul>
        </header>

        <!-- bagian content -->
        <section class="content">
            <h2>Input Data Alat Baru</h2>
            <div class="box">
                <center>
                    <form action="" method="POST" enctype="multipart/form-data">
                        
                        <td>Nama Alat :</td>
                        <input type="text" name="nama" placeholder="Masukkan Nama Alat" /><br>
                        <td>Vendor :</td>
                        <input type="text" name="vendor" placeholder="Masukkan Nama Vendor" /><br>
                        <td>Serial No :</td>
                        <input type="text" name="kode" placeholder="Masukkan Serial No" /><br>
                        <td>Jenis Alat :</td>
                        <input type="text" name="jenis" placeholder="Masukkan Jenis Alat"/><br>
                        <td>Keterangan Alat :</td>
                        <input type="text" name="keterangan" placeholder="Masukkan Keterangan Alat" /><br>
                        <td>Kalibrasi Berakhir :</td>
                        <input type="date" name="berakhir" placeholder="Masukkan Tanggal Kalibrasi Berakhir" class="input-control"><br>
                        <td>Kalibrasi Selanjutnya :</td>
                        <input type="date" name="baru" placeholder="Masukkan Tanggal Kalibrasi Baru" class="input-control"><br>
                        <td>Upload foto :</td>
                        <input type="file" name="file" placeholder="Masukkan foto" class="input-control"><br>
                        
                        <input type="submit" name="submit" value="INPUT DATA" class="button-input"/>
                    </form>
                </center>
            </div>
        </section>
    </body>
</html>
