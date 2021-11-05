<?php
    include 'koneksi.php';

    if(isset($_GET['nip'])){
        $nip_data = $_GET['nip'];
        $delete = mysqli_query($conn, "DELETE FROM tb_pendataan WHERE nip = '".$nip_data."' ");

        echo '<script>window.location="data-karyawan.php"</script>';
    }
?>