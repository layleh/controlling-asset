<?php
    include 'koneksi.php';
    session_start();
    
    // cek jika input kosong

    if(isset($_POST['submit'])){
        // membuat variabel
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tanggal_lahir'];
        $jk = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];
        $asal_sekolah = $_POST['asal_sekolah'];
        $fakultas_jurusan = $_POST['fakultas_jurusan'];
        $no_hp = $_POST['no_hp'];
        $email = $_POST['email'];

        // cek jika input kosong, maka muncul error
        if(empty($nama)){
            header("location:index.php?errnama= * Nama Belum di Input");
        }
        elseif(empty($nim)){
            header("location:index.php?errnim= * NIM Belum di Input");
        }
        elseif(empty($tempat_lahir)){
            header("location:index.php?errtempat-lahir= * Tempat Lahir Belum di Input");
        }
        elseif(empty($tgl_lahir)){
            header("location:index.php?errtgl-lahir= * Tanggal Lahir Belum di Input");
        }
        elseif(empty($jk)){
            header("location:index.php?errjenis-kelamin= * Silahkan Pilih");
        }
        elseif(empty($agama)){
            header("location:index.php?erragama= * Silahkan Pilih");
        }
        elseif(empty($alamat)){
            header("location:index.php?erralamat= * Alamat Belum di Input");
        }
        elseif(empty($asal_sekolah)){
            header("location:index.php?errasal-sekolah= * Asal Sekolah Belum di Input");
        }
        elseif(empty($fakultas_jurusan)){
            header("location:index.php?errfakultas-jurusan= * Fakultas/Jurusan Belum di Input");
        }
        elseif(empty($no_hp)){
            header("location:index.php?errNumber-phone= * Nomor HP Belum di Input");
        }
        elseif(empty($email)){
            header("location:index.php?errEmail= * Email Belum di Input");
        }
        else{
            // proses insert
            $insert = mysqli_query($conn, "INSERT INTO tb_pendaftaran VALUES (
                '".$nim."',
                '".$nama."',
                '".$tempat_lahir."',
                '".$tgl_lahir."',
                '".$jk."',
                '".$agama."',
                '".$alamat."',
                '".$asal_sekolah."',
                '".$fakultas_jurusan."',
                '".$no_hp."',
                '".$email."'
            )");
            if($insert){
                echo '<script>window.location="berhasil.php"</script>';
            }
            elseif(!$insert){
                echo '<script>window.location="gagal.php"</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Form Pendaftaran Mahasiswa Baru </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
    </head>
    <body>
    <header>
        <ul align="right">
            <li><a href="login.php" class="fun-login">Login Admin</a></li>
        </ul>
    </header>
        <!-- Bagian box formulir -->
        <section class="box-formulir">
        <div class="box-title">
            <br>
            <h1>
                <p align="center">
                    Form Pendaftaran Mahasiswa Baru 
                </p>
            </h1>
        </div>
        <br>

            <!-- bagian form -->
            <form action="" method="post">
                <div class="box">
                    
                    <table border="0" class="table-form">
                        <h4 class="error">
                        * Pengisian data hanya satu kali
                         
                        </h4>
                        <br>
                        
                        <tr>
                            <td>Nama Lengkap</td>
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
                            <td>NIM</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="text" name="nim" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errnim"])){
                                    $err = $_GET["errnim"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>

                        <tr></tr>
                        <tr></tr>

                        <tr>
                            <td>Tempat Lahir</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="text" name="tempat_lahir" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errtempat-lahir"])){
                                    $err = $_GET["errtempat-lahir"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>

                        <tr></tr>
                        <tr></tr>
                        
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="date" name="tanggal_lahir" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errtgl-lahir"])){
                                    $err = $_GET["errtgl-lahir"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <tr></tr>
                        <tr></tr>
                        
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="radio" name="jenis_kelamin" class="input-control" value="Laki-laki"> Laki-laki
                                &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="jenis_kelamin" class="input-control" value="Perempuan"> Perempuan
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errjenis-kelamin"])){
                                    $err = $_GET["errjenis-kelamin"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>

                        <tr></tr>
                        <tr></tr>
                        
                        <tr>
                            <td>Agama</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <select class="input-control" name="agama">
                                    <option value="">--Pilih--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Khonghucu">Khonghucu</option>
                                </select>
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["erragama"])){
                                    $err = $_GET["erragama"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>
                        
                        <tr></tr>
                        <tr></tr>
                        
                        <tr>
                            <td>Alamat Lengkap</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <textarea class="input-control" name="alamat"></textarea>
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["erralamat"])){
                                    $err = $_GET["erralamat"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>

                        <tr></tr>
                        <tr></tr>
                        
                        <tr>
                            <td>Asal Sekolah</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="text" name="asal_sekolah" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errasal-sekolah"])){
                                    $err = $_GET["errasal-sekolah"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>

                        <tr></tr>
                        <tr></tr>
                        
                        <tr>
                            <td>Fakultas/Jurusan</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="text" name="fakultas_jurusan" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errfakultas-jurusan"])){
                                    $err = $_GET["errfakultas-jurusan"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>

                        <tr></tr>
                        <tr></tr>
                        
                        <tr>
                            <td>Nomor HP/WA</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="text" name="no_hp" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errNumber-phone"])){
                                    $err = $_GET["errNumber-phone"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>

                        <tr></tr>
                        <tr></tr>
                        
                        <tr>
                            <td>Email</td>
                            <td>
                                <p align="left">: </p> 
                            </td>
                            <td>
                                <input type="text" name="email" class="input-control">
                            </td>
                            <td class="error">
                                <?php
                                if(isset($_GET["errEmail"])){
                                    $err = $_GET["errEmail"];
                                    echo $err;
                                }
                                ?>
                            </td>
                        </tr>
                        
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
