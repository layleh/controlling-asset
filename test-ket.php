<?php
    include 'koneksi.php';
    $gettime = date("Y-m-d");

    $data_alat = mysqli_query($conn, "SELECT * FROM tb_alat");
    while($cek = mysqli_fetch_array($data_alat)){
        if($cek['keterangan'] == 'Ya'){
            $expire = mysqli_query($conn, "SELECT * FROM tb_alat WHERE berakhir <= '$gettime' AND keterangan='Ya'");
            while($ls = mysqli_fetch_array($expire)){
                $berakhir = new DateTime($ls['berakhir']);
                $lambat = new DateTime($gettime);
                $diff = $lambat->diff($berakhir);

                //echo $ls['berakhir'];

                echo $diff->d;
            }

        }
    }
    
    /*
    $tgl_alat = mysqli_query($conn, "SELECT * FROM tb_alat WHERE berakhir > $gettime");

    while($ls = mysqli_fetch_array($tgl_alat)){
        echo $ls['berakhir'];
    }

    
    while($ls = mysqli_fetch_object($data_alat)){
        echo "\n";
        echo " ";
        $h = $ls-> berakhir;
        //echo $h;

        if($gettime == $h){
            echo "Notif";
        }

    }
    */
?>
