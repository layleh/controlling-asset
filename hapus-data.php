<?php
    include 'koneksi.php';

    if(isset($_GET['kode_sn'])){
        $kode_alat = $_GET['kode_sn'];
        $delete = mysqli_query($conn, "DELETE FROM tb_alat WHERE nip = '".$kode_alat."' ");

        echo '<script>window.location="data-asset.php"</script>';
    }
?>
