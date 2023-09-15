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
    <h1>UTF-8 Decoder</h1>
    <form method="post" action="decode.php">
        <label for="utf8_string">Enter UTF-8 Encoded String:</label>
        <textarea name="utf8_string" id="utf8_string" rows="5" required></textarea>
        <input type="submit" value="Decode">
    </form>
    <form method="post" action="decode.php" enctype="multipart/form-data">
        <label for="file">Upload UTF-8 Encoded File:</label>
        <input type="file" name="file" id="file" required>
        <input type="submit" value="Decode">
    </form>
</body>
</html>