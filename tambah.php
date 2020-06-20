<?php 

    require 'functions.php';
    if( isset($_POST['submit']) )
    {
        // var_dump($_POST);
        // die;
        if( tambah($_POST) > 0 )
        {
            echo "
                <script>
                    alert('data BERHASIL ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            var_dump($_POST);
            die;
            echo "
                <script>
                    alert('data GAGAL ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }

    $rows = cabang();
    // foreach( $rows as $row )
    // {
    //     var_dump($row);
    // }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambah.css">
    <title>Tambah</title>
</head>
<body>
    <div class="topbar">
        <h1>Tambah Data Santri</h1>
    </div>

    <div class="container">
        <form action="" method="post">
        <table cellspacing="5">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>: <input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td><label for="cabang_id">Cabang</label></td>
                <td>: 
                    <select name="cabang_id" id="cabang_id">
                        <?php foreach( $rows as $row ){ ?>
                            <option value="<?php echo $row['cid']; ?>"><?php echo $row['cid'] . ". " . $row['nama_cabang']; ?></option>
                        <!-- <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option> -->
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="asal">Asal</label></td>
                <td>: <input type="text" name="asal" id="asal" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="submit" name="submit" id="submit">Kirim data!</button>
                </td>
            </tr>
        </table>
        </form>
    </div>

    <div class="botbar">
        <div class="copy">&copy; Copyright 2020. halimurrasyid.</div>
    </div>
</body>
</html>