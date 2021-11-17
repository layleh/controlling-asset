<?php
include('koneksi.php');
//cek jika benar
if($cek==true){

    //menyiapkan validasi gambar yang akan di upload
    $file=$_FILES['foto']['name'];
    $tmp_dir=$_FILES['foto']['tmp_name'];
    $ukuran=$_FILES['foto']['size'];

    //
    $direktori='gambar/'; //path tempat simpan
    $ektensi=strtolower(pathinfo($file, PATHINFO_EXTENSION)); //dapatkan info gambar
    $valid_ektensi=array('jpeg','jpg','png','gif'); //ektensi yang dibolehin
    $gambar=rand(1000,1000000).".".$ektensi;
 
    //mulai validasi
    //cek ektensi gambar
    if(in_array($ektensi, $valid_ektensi)){
        //cek ukuran gambar
        if(!$ukuran < 1000000) { //jika lebih
            move_uploaded_file($tmp_dir, $direktori.$gambar);

            //simpan dan buat query
            $perintah=sprintf("INSERT INTO namasiswa VALUES('null','%s','$gambar')",
            $_POST['nama'],'$gambar');
            $query=@mysql_query($perintah,$koneksi);

            //validasi query
            if(!$query){
                echo "Gagal menyimpan:".mysql_error();
            }else{
                echo "Berhasil disimpan<br/>";
                echo "Nama $aran <br/> <img src='$direktori$gambar' height='200'> 
                <br/>berhasil disimpan
                <br><a href='tampil_foto.php'>Lihat Halaman Berikutnya</a>";
            }
        }else{
            echo "Gambar kegedean <br/>
            <a href='input_foto.php'>Kembali</a>";
        }
    }else{
        echo "Gambar yang koe upload ora sesuai<br/>
        <a href='input_foto.php'>Kembali</a>";
    }
}
?>
