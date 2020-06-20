<?php 
    require 'functions.php';
    $santri = query("SELECT *, santri.id as siid FROM santri LEFT JOIN cabang ON santri.cabang_id = cabang.cid ORDER BY siid DESC LIMIT $awalData, $jmlDataPerHal");
    if( !$conn )
    {
        echo "Koneksi gagal";
        die;
    }
    if( isset($_POST['cari']) )
    {
        $santri = cari($_POST['keyword']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Santri</title>
    <style>
        @media print {
            button, .tambah, .form-cari, .aksi, .page, .space {
                display: none;
                
            }
        }
    </style>
</head>
<body>

    
    <div class="topbar">
        <h1>Daftar Santri</h1>
    </div>
    
    <div class="container">

        <button  class="button"><a href="tambah.php" class="tambah">Tambah data santri</a></button>
        <button  class="button" onclick="MyFunction()" class="print">Print Data</button>
        
        <br class='space'><br>

        <form action="" method="post" class='form-cari'>
            <input type="text" name="keyword" size="30" autofocus placeholder="Masukan keyword..." autocomplete="off">
            <button type="submit" name="cari">Cari</button>
        </form>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Cabang</th>
                <th>Asal</th>
                <th class='aksi'>Aksi</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach( $santri as $row ){ ?>
            <tr>
                <td><?php echo $i + $awalData; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['nama_cabang']; ?></td>
                <td><?php echo $row['asal']; ?></td>
                <td class='aksi'>
                    <a href="edit.php?id=<?php echo $row['id']; ?>"><button>edit</button></a>
                    <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('yakin ingin menghapus?');"><button>hapus</button></a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php } ?>
        </table>

        <div class="nav">
            <!-- navigasi -->
            <?php if( $halAktif > 1 ) { ?>
                <a href="?hal= <?php echo $halAktif - 1; ?>" class='page'>&laquo</a>
            <?php } ?>

            <?php for( $i = 1; $i <= $jmlHal; $i++ ) { ?>
                <?php if( $i == $halAktif ) { ?>
                    <a href="?hal= <?php echo $i; ?>"  class='page-fb'><?php echo $i; ?></a>
                <?php } else { ?>
                    <a href="?hal= <?php echo $i; ?>"  class='page'><?php echo $i; ?></a>
                <?php } ?>
            <?php } ?>

            <?php if( $halAktif < $jmlHal ) { ?>
                <a href="?hal= <?php echo $halAktif + 1; ?>" class='page'>&raquo</a>
            <?php } ?>
        </div>

    </div>

    <div class="botbar">
        <div class="copy">&copy; Copyright 2020. halimurrasyid.</div>
    </div>



<script>
    function MyFunction() {
        location.href = "print.php";
    }
</script>
</body>
</html>