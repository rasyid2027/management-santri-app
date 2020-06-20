<?php 

$host = 'localhost';
$usr = 'root';
$pass = 'password';
$dbname = 'learn';
$conn = mysqli_connect( $host, $usr, $pass, $dbname );

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) )
    {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars(ucwords($data['nama']));
    $cabang = htmlspecialchars(ucwords($data['cabang_id']));
    $asal = htmlspecialchars(ucwords($data['asal']));

    $query = "INSERT INTO santri
                VALUES
                (NULL, '$nama', '$cabang', '$asal')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM santri WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;

    $id = $data['id'];
    $nama = htmlspecialchars(ucwords($data['nama']));
    $cabang = htmlspecialchars(ucwords($data['cabang_id']));
    $asal = htmlspecialchars(ucwords($data['asal']));

    $query = "UPDATE santri SET
                nama = '$nama',
                cabang_id = '$cabang',
                asal = '$asal'
              WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cabang()
{
    global $conn;
    $query = "SELECT * FROM cabang";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) )
    {
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword)
{
    $query = "SELECT * FROM santri AS s LEFT JOIN cabang AS c ON s.cabang_id = c.cid
                WHERE
            s.nama LIKE '%$keyword%' OR
            c.nama_cabang LIKE '%$keyword%' OR
            s.asal LIKE '%$keyword%'
            ";

    return query($query);
}

//pagination
$jmlDataPerHal = 4;
$jmlData = count(query("SELECT * FROM santri"));
$jmlHal = ceil($jmlData / $jmlDataPerHal);
$halAktif = ( isset($_GET['hal']) ) ? $_GET['hal'] : 1;
$awalData = ( $jmlDataPerHal * $halAktif ) - $jmlDataPerHal;