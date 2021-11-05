<?php
    session_start();
    include 'koneksi.php';
    
    if(isset($_POST['login'])){
        // membuat variabel
        $user = $_POST['user'];
        $passwd = $_POST['passwd'];

        if(empty($user)){
            echo '<script>alert("Username Tidak Boleh Kosong")</script>';
        }
        else if(empty($passwd)){
            echo '<script>alert("Password Tidak Boleh Kosong")</script>';
        }
        else {
            // cek akun di database
            $cek = mysqli_query($conn, "SELECT * FROM tb_admin 
                WHERE username = '".$user."' AND password = '".MD5($passwd)."' ");

            if(mysqli_num_rows($cek) >0){
                $a = mysqli_fetch_object($cek);

                $_SESSION['stat_login'] = true;
                $_SESSION['id'] = $a->id_admin;
                $_SESSION['nama'] = $a->nama_admin;
                echo '<script>window.location="beranda.php"</script>';
            }
            else{
                echo '<script>alert("Gagal, username atau password salah")</script>';
                echo '<script>window.location="login.php"</script>';
            }
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Website pendataan Karyawan - Login </title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap"
    rel="stylesheet">
</head>
<body>
        <div class="login-box">
            <img src="user.png" class="avatar">
            <h1>Login Admin</h1>
            <form action="" method="post">
                <p>Username</p>
                <td>
                    <input type="text" name="user" class="input-control" placeholder="Masukkan Username">
                </td>

                <p>Password</p>
                <td>
                    <input type="password" name="passwd" class="input-control" placeholder="Masukkan Password">
                </td>
                <td>
                    <input type="submit" name="login" value="Login" class="button">
                </td>
            </form>
        </div>
    
</body>
</html>