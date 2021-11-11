<?php
    include 'koneksi.php';

    if(isset($_GET['kode'])){
        $kode_alat = $_GET['kode'];
        $delete = mysqli_query($conn, "DELETE FROM tb_alat WHERE kode = '".$kode_alat."' ");

        echo '<script>window.location="data-asset.php"</script>';
    }
?>
