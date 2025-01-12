<?php
$file = isset($_GET['file']) ? $_GET['file'] : '';

// Base directory for the files
$baseDir = './files/';

// Resolve the full path to the requested file
$fullPath = realpath($baseDir . $file);

// Debugging output
echo "Requested file: " . $file . "<br>";
echo "Full path: " . $fullPath . "<br>";

// Check if the file exists and is within the allowed directory
if ($fullPath && strpos($fullPath, realpath($baseDir)) === 0 && file_exists($fullPath)) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . basename($file) . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    readfile($fullPath);
} else {
    echo 'The file does not exist or access is denied.';
}
?>
