<?php
if (isset($_GET['file'])) {
    $tempFileName = $_GET['file'];
    
    // Set the appropriate headers for downloading
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($tempFileName) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($tempFileName));
    
    // Output the file
    readfile($tempFileName);
    
    // Delete the temporary file
    unlink($tempFileName);
} else {
    echo "File not found.";
}