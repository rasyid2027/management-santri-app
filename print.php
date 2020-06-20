<?php 

    require 'functions.php';
    $santri = query("SELECT * FROM santri AS s LEFT JOIN cabang AS c ON s.cabang_id = c.cid ORDER BY id DESC");
    if( !$conn )
    {
        echo "Koneksi gagal";
        die;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print</title>
    <style>
        @media print {
            button, .tambah, .form-cari, .aksi, .page, .space {
                display: none;
                
            }
        }

        h1 {
            margin-left: 20px;
            margin-top: 20px;
            margin-bottom:  30px;
        }

        table {
            margin: auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Daftar Santri</h1>

    <!-- <button onclick="window.print()">Print data</button> -->

    <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Cabang</th>
                <th>Asal</th>
                <!-- <th class='aksi'>Aksi</th> -->
            </tr>

            <?php $i = 1;?>
            <?php foreach ($santri as $row) {?>
            <tr>
                <td><?php echo $i + $awalData; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['nama_cabang']; ?></td>
                <td><?php echo $row['asal']; ?></td>
                <!-- <td class='aksi'>
                    <a href="edit.php?id=<?php echo $row['id']; ?>"><button>edit</button></a>
                    <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('yakin ingin menghapus?');"><button>hapus</button></a>
                </td> -->
            </tr>
            <?php $i++;?>
            <?php }?>
    </table>

<script>
    document.addEventListener("DOMContentLoaded", function(){
        window.print();
    });
</script>
</body>
</html>