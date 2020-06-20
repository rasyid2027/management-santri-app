<?php 

    require 'functions.php';

    $id = $_GET['id'];
    $stri = query("SELECT * FROM santri WHERE id = $id")[0] ;

    if( isset($_POST['submit']) )
    {
        if( edit($_POST) > 0 )
        {
            echo "
                <script>
                    alert('data BERHASIL ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data GAGAL ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }

    $cb = cabang();
    // var_dump($cb);

    // var_dump($stri);
    // var_dump($cabang);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tambah.css">
    <title>Edit</title>
</head>
<body>
    <div class="topbar">
        <h1>Edit Data Santri</h1>
    </div>

    <div class="container">
        <form action="" method="post">

            <table cellspacing="5">
                <tr>
                <td>
                    <input type="hidden" name='id' value='<?php echo $stri['id']; ?>'>
                </td>
                </tr>
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td>: 
                        <input type="text" name='nama' id='nama' required value='<?php echo $stri['nama']; ?>'>
                    </td>
                </tr>
                <tr>
                    <td><label for="cabang_id">Cabang</label></td>
                    <td>: 
                        <select name="cabang_id" id="cabang_id">
                            <?php foreach( $cb as $v ){ ?>
                                <option value="<?php echo $v['cid']; ?>" <?php if( $v['cid'] == $stri['cabang_id'] )
                                { ?> selected <?php } ?> ><?php echo $v['cid'] . ". " . $v['nama_cabang'];  ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="asal">Asal</label></td>
                    <td>: 
                        <input type="text" name='asal' id='asal' required value='<?php echo $stri['asal']; ?>'>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type='submit' class="submit" name='submit'>Edit data</button></td>
                </tr>
            </table>

        </form>
    </div>

    <div class="botbar">
        <div class="copy">&copy; Copyright 2020. halimurrasyid.</div>
    </div>
</body>
</html>