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
                <li><a href="keluar.php">Keluar</a></li>
                
            </ul>
        </header>

        <!-- bagian content -->
        <section class="content">
            <h2>Data Asset</h2>
            <div class="box">
                <table class="table" border="10">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Alat</th>
                            <th>Vendor</th>
                            <th>Serial No.</th>
                            <th>Jenis Alat</th>
                            <th>Keterangan</th>
                            <th>Kalibrasi Terakhir</th>
                            <th>Status</th>
                            <th>Jadwal Selanjutnya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <a class="tombol" href="input-data.php">+ Tambah Data Baru</a>
                    <tbody>
                        <?php
                            function warna($a){
                              if ($a == "warning"){
                                return "style='background-color:rgba(253,238,73,0.3)'";
                              }
                              else if($a == "danger"){
                                return "style='background-color:rgba(214,3,9,0.3)'";
                              }
                              return "";
                            }
                            $no = 1;
                            $list_data = mysqli_query($conn, "SELECT * FROM 
                                tb_alat");
                            $status="";
                            $type="";
                            while ($row = mysqli_fetch_array($list_data)){
                              $berakhir = $row['berakhir'];
                              if ((strtotime(date("Y-m-d"))-strtotime($berakhir))/(3600*24) < 0){
                                $status= ((strtotime(date("Y-m-d"))-strtotime($berakhir))/(3600*24)*-1)." Day Remainings";
                                if(((strtotime(date("Y-m-d"))-strtotime($berakhir))/(3600*24)*-1)>90){
                                  $type="aman";
                                }
                                else{
                                  $type="warning";
                                }
                              }
                              else{
                                $status= ((strtotime(date("Y-m-d"))-strtotime($berakhir))/(3600*24))." Due Date";
                                $type="danger";
                              }
                        ?>
                        <tr >
                            <td ><?php echo $no++ ?></td>
                            <td <?= warna($type)?>><?php echo $row['nama'] ?></td>
                            <td <?= warna($type)?>><?php echo $row['vendor'] ?></td>
                            <td <?= warna($type)?>><?php echo $row['kode'] ?></td>
                            <td <?= warna($type)?>><?php echo $row['jenis'] ?></td>
                            <td <?= warna($type)?>><?php echo $row['keterangan'] ?></td>
                            <td <?= warna($type)?>><?php echo $row['berakhir'] ?></td>
                            <td <?= warna($type)?>><?php echo $status?></td>
                            <td <?= warna($type)?>><?php echo $row['baru'] ?></td>
                            <td id="bebas">
                                <a href="detail-asset.php?kode=<?php echo $row['kode'] ?>" id="dtl"> Detail </a>
                                <a href="edit-data.php?kode=<?php echo $row['kode'] ?>" id="edt"> Edit </a> 
                                <a href="hapus-data.php?kode=<?php echo $row['kode']
                                ?>" onclick="return confirm('Yakin data akan dihapus?')" id="hps"> Hapus </a>
                                
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        
        </section>
    </body>
</html>
