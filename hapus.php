<?php 

    require 'functions.php';

    $id = $_GET['id'];

    if( hapus($id) )
    {
        echo "
            <script>
                alert('data BERHASIL dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data BERHASIL dihapus!');
                document.location.href = 'index.php';
            </script>
        ";
    }

?>