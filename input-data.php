<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['stat_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Controlling Asset | Administrator </title>
        <link rel="stylesheet" type="text/css" href="css/beranda.css">
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
                <li><a href="input-data.php">Input Data Baru</a></li>
                <li><a href="keluar.php">Keluar</a></li>
                
            </ul>
        </header>
<?php
    include 'koneksi.php';
    
    // cek jika input kosong

    if(isset($_POST['submit'])){
        // membuat variabel
        $kode = $_POST['kode_data'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $berakhir = $_POST['berakhir'];
        $baru = $_POST['baru'];

        // cek jika input kosong, maka muncul error
        if(empty($nama)){
            header("location:index.php?errnama= * Nama Belum di Input");
        }
        elseif(empty($kode)){
            header("location:index.php?errkode_data= * Serial No. Belum di Input");
        }
        elseif(empty($jenis)){
            header("location:index.php?errjenis= * Jenis Alat Belum di Input");
        }
        elseif(empty($berakhir)){
            header("location:index.php?errberakhir= * Kalibrasi Berakhir Belum di Input");
        }
        elseif(empty($baru)){
            header("location:index.php?errbaru= * Silahkan Pilih");
        }
        else{
            // proses insert
            $insert = mysqli_query($conn, "INSERT INTO tb_alat VALUES (
                '".$kode."',
                '".$nama."',
                '".$jenis."',
                '".$berakhir."',
                '".$baru."',
            )");
            $insert=mysqli_query($conn);

//Kondisi apakah berhasil atau tidak
  if ($insert) {
    echo "Berhasil Input";
  }
else {
    echo "Gagal Input";
}
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Input Data Baru </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
    </head>
    <body>
    <header>
        
    </header>
        <!-- Bagian box formulir -->
        <section class="box-formulir">
        <div class="box-title">
            <br>
            <h1>
                <p align="center">
                    Input Data Baru 
                </p>
            </h1>
        </div>
        <br>

            <!-- bagian form -->
            <form action="" method="post">
                <div class="box">
                    
                    <table border="0" class="table-form">
                        <h4 class="error">
                         
                        </h4>
                        <br>
                        
                        <tr>
                            <td>Nama Alat</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="text" name="nama" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errnama"])){
                                    $err = $_GET["errnama"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <tr></tr>
                        <tr></tr>

                        <tr>
                            <td>Serial No</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="text" name="kode_data" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errkode_data"])){
                                    $err = $_GET["errkode_data"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>

                        <tr></tr>
                        <tr></tr>

                        <tr>
                            <td>Jenis Alat</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="text" name="jenis" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errjenis"])){
                                    $err = $_GET["errjenis"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>

                        <tr></tr>
                        <tr></tr>
                        
                        <tr>
                            <td>Kalibrasi Alat Berakhir</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="date" name="berkahir" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errberakhir"])){
                                    $err = $_GET["errberakhir"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <tr></tr>
                        <tr></tr>
                        
                        <tr>
                            <td>Kalibrasi Selanjutnya</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="date" name="baru" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errbaru"])){
                                    $err = $_GET["errbaru"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>

                        <tr></tr>
                        <tr></tr>                        
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        <tr></tr>
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" class="btn-daftar" value="Upload Data">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        
        </section>

    </body>
</html>
