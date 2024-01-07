<?php
$fileDirectory = "C:/xampp/htdocs/uploads(projekt)/"; 
$fileName = $_POST['file'];
$desKljuc = $_POST['key'];

if (!empty($fileName) && !empty($desKljuc)) {
    $fileLocation = $fileDirectory . $fileName;

    if (file_exists($fileLocation)) {
        $fileContent = file_get_contents($fileLocation);

        // pridobi iv in šifrirano vsebino
        $iv = substr($fileContent, 0, openssl_cipher_iv_length('aes-256-cbc'));
        $encryptedData = substr($fileContent, openssl_cipher_iv_length('aes-256-cbc'));

        // poskusi dešifriranje
        $decrypted = openssl_decrypt($encryptedData, 'aes-256-cbc', $desKljuc, 0, $iv);

        if ($decrypted !== false) {
            // pošlje dešifrirane podatke
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            echo $decrypted;
            exit;
        } else {
            echo "<h2>Napačen ključ</h2></br></br> <a class='datoteke_text' href='main.php'>Nazaj</a>";
        }
    } else {
        echo "<h2>Datoteka ne obstaja</h2></br></br> <a class='datoteke_text' href='main.php'>Nazaj</a>";
    }
} else {
    echo "<h2>???</h2></br></br> <a class='datoteke_text' href='main.php'>Nazaj</a>";
}
?>


