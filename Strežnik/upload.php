<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="upload_skupni">
    <?php
    $imeDatoteke = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];

    $naslov = "C:/xampp/htdocs/uploads(projekt)/"; 
    $cilj = $naslov . $imeDatoteke;

    if (move_uploaded_file($temp, $cilj)) {
        $kljuc = '2/VR9p8fyhe7fcB6Xlu/pw==';
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        
        //prebere vsebino datoteke
        $vsebinaDatoteke = file_get_contents($cilj);
        
        //šifrira vsebino
        $encrypted = openssl_encrypt($vsebinaDatoteke, 'aes-256-cbc', $kljuc, 0, $iv);
        
        //shrani šifrirano vsebino nazaj v datoteko
        file_put_contents($cilj, $iv . $encrypted);
        
        echo "<h2>Nalaganje uspešno</h2></br></br> <a class='datoteke_text' href='main.php'>Nadaljuj</a>";
    } else {
        echo "<h2>Napaka pri nalaganju</h2></br></br> <a class='datoteke_text' href='main.php'>Nadaljuj</a>";
    }
    ?>
    </div>
</body>
</html>