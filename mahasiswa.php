<?php
     

    $mysqli = new mysqli('localhost', 'root', '', 'mahasiswa');
    $result = $mysqli->query("SELECT siswa.NIM, siswa.NAMA, program_studi.Prodi
    FROM siswa INNER JOIN program_studi ON siswa.ID = program_studi.Nomor");

   $siswa = [];

    while ($row = $result->fetch_assoc()) {
        array_push($siswa, $row);
    }

    $Nomor = 1
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta Prodi="viewport" content="wIDth=device-wIDth, initial-scale=1.0">
    <title>siswa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="aNomornymous">

    <style>
    table {
        font-family: 'Times New Roman', Times, serif;
    }
    </style>
    
</head>
<body>
    <div class="container"> 
    <h1 class="text-center">Data siswa KA 2021</h1> 
    
    <a href="Tambah_mahasiswa.php" class="btn btn-primary">Tambah</a>
 

    <table class="table table-bordered table-hover">
        <tr>
            <th class="text-center">Nomor</th>
            <th class="text-center">NAMA</th>
            <th class="text-center">NIM</th>
            <th class="text-center">Program Studi</th>
            <th class="text-center">Edit</th>
        </tr>
        <?php foreach ($siswa as $row ) { ?>
            <tr>
                <td><?= $Nomor++; ?></td>
                <td><?= $row['NIM']; ?></td>
                <td><?= $row['NAMA']; ?></td>
                <td><?= $row['Prodi']; ?></td>   
                <td> 
                    <a href="edit_mahasiswa.php?nim=<?= $row['NIM']?>" class="btn btn-success">Edit</a>
                    <a href="hapus_mahasiswa.php?nim=<?= $row['NIM']?>" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda Yakin akan menghapus data ini?');">Hapus</a>
                </td>
            </tr>
    <?php } ?>
    </table>  
    </div>  
</body>
</html>



