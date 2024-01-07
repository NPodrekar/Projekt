<!DOCTYPE html>
<html lang="en">
<head>
    
  
    <link rel="stylesheet" href="style.css">
    <script>
    function downloadFileWithKey(fileName) {
        var decryptionKey = prompt("Enter decryption key:");
        if (decryptionKey != null && decryptionKey !== "") {
            var form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("action", "download.php");
            form.style.display = "hidden";

            var fileInput = document.createElement("input");
            fileInput.setAttribute("type", "hidden");
            fileInput.setAttribute("name", "file");
            fileInput.setAttribute("value", fileName);
            form.appendChild(fileInput);

            var keyInput = document.createElement("input");
            keyInput.setAttribute("type", "hidden");
            keyInput.setAttribute("name", "key");
            keyInput.setAttribute("value", decryptionKey);
            form.appendChild(keyInput);

            document.body.appendChild(form);
            form.submit();
        } else {
            alert("Please enter a valid decryption key.");
        }
    }
</script>

</head>

<body >
   


<div class="skupni">
<h1>Dropboks</h1>
        <div class="naloži">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="file" multiple="multiple">
            <label  class="izberi" for="file">Izberi datoteko</label>
            
            <input type="submit" id="upload">
            <label class="upload_gumb" for="upload">Naloži</label>
        </form>
</div>

    <div class="kazalo">
        <h2 style="padding-left: 40px">Naložene datoteke</h2>
        <ul class="datoteke">
            <?php
            $directory = "uploads(projekt)/";
            $files = scandir($directory);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    
                    echo "<a href='javascript:void(0);' onclick='downloadFileWithKey(\"$file\")' class='datoteke_text'>$file</a><br>";                 
                }
                }
            ?>
        </ul>
        </div>
        </div>
</body>
</html>