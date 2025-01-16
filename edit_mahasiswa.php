<?php
      
    $mysqli = new mysqli('localhost', 'root', '', 'mahasiswa');
    $NIM = $_GET['nim'];
    

    
    $mahasiswa = $mysqli->query("SELECT * FROM siswa WHERE NIM='$NIM'");
    $data = $mahasiswa->fetch_assoc();
 
    $program_studi = $mysqli->query("SELECT * FROM program_studi");

    if (isset($_POST['NAMA'])) {
        $nama = $_POST['NAMA'];
        $program_studi = $_POST['program_studi'];

        $update = $mysqli->query("UPDATE siswa SET NAMA='$nama', ID=$program_studi WHERE NIM='$NIM'");

        if($update) {
           
            header("Location: mahasiswa.php");
            exit();
        }
}      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class ="container">
    <h1 class="text-center">Form Edit mahasiswa</h1>
    <form method ="POST">
        <div class ="mb-3">
            <label for="NIM" class="form-label">NIM</label>
            <input type="text" class="form-control" id="NIM" name="NIM" value="<?= $data['NIM']?>" disabled>
        </div> 
        <div class ="mb-3">
            <label for="NAMA" class="form-label">Nama</label>
            <input type="text" class="form-control" id="NAMA" name="NAMA" value="<?= $data['NAMA']?>">
        </div>
        <div class ="mb-3">
            <label for="program_studi" class="form-label">Program Studi</label><br>
            <select class="form-select" id="program_studi" name="program_studi">
            <?php while ($row = $program_studi->fetch_assoc()) { ?>
                <option value="<?= $row['Nomor'] ?>" <?= $row['Nomor'] == $data['ID'] ? 'selected' : '' ?>><?= $row['Prodi']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mt-3">
                <button type="submit" class="btn btn-primary">Sumbit</button>
                <a href="mahasiswa.php" class="btn btn-warning">Cancel</a>
         </div>
    </form>   
</body>
</html>
