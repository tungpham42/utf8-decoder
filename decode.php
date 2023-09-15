<?php
$currentURL = "http" . (isset($_SERVER['HTTPS']) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta property="og:image" content="utf8_200x200.png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:url" content="<?php echo $currentURL; ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Online FREE UTF-8 Decoder">
    <meta property="og:description" content="Convert Unicode characters and symbols to human-readable text instantly. Simple and easy-to-use UTF-8 decoder for your encoding needs.">
    <meta name="description" content="Convert Unicode characters and symbols to human-readable text instantly. Simple and easy-to-use UTF-8 decoder for your encoding needs.">
    <title>Online FREE UTF-8 Decoder</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/png" href="utf8_favicon.png" sizes="64x64">
</head>
<body>
    <h1>UTF-8 Decoder Result</h1>
    <?php
    if (isset($_POST['utf8_string'])) {
        $utf8String = $_POST["utf8_string"];
        $decodedString = mb_convert_encoding($utf8String, "windows-1252", "UTF-8");
        // $decodedString = utf8_decode($utf8String);
        echo "<p>Decoded String: $decodedString</p>";
    } else {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["file"])) {
            $file = $_FILES["file"];
            
            if ($file["error"] === UPLOAD_ERR_OK) {
                $fileContent = file_get_contents($file["tmp_name"]);
                $decodedContent = mb_convert_encoding($fileContent, "windows-1252", "UTF-8");
                // Save the decoded content to a temporary file
                $tempFileName = tempnam(sys_get_temp_dir(), 'decoded_file_');
                file_put_contents($tempFileName, $decodedContent);
                
                // Provide a link to download the decoded file
                echo "<p>Decoded content: <a href='download.php?file=" . urlencode($tempFileName) . "'>Download</a></p>";
                echo "<pre>$decodedContent</pre>";
            } else {
                echo "<p>Error uploading file. Please try again.</p>";
            }
        } else {
            echo "<p>No file received.</p>";
        }
    }
    ?>
    <p><a href="index.php">Go Back</a></p>
</body>
</html>