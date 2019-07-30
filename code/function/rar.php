<?php

function createZipAndDownload($files, $filesPath, $zipFileName)
{
    // Create instance of ZipArchive. and open the zip folder.
    $zip = new \ZipArchive();
    if ($zip->open($zipFileName, \ZipArchive::CREATE) !== TRUE) {
        exit("cannot open <$zipFileName>\n");
    }
    // Adding every attachments files into the ZIP.
    foreach ($files as $file) {
        $zip->addFile($filesPath . $file, $file);
    }
    $zip->close();
    // Download the created zip file
    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename = $zipFileName");
    header("Pragma: no-cache");
    header("Expires: 0");
    readfile("$zipFileName");
    exit;
}
// Files which need to be added into zip
$files = array('sample.php', 'sample.jpg', 'sample.pdf', 'sample.doc');
// Directory of files
$filesPath = '$current_path.'/'.$item';
// Name of creating zip file
$zipName = 'document.zip';
echo createZipAndDownload($files, $filesPath, $zipName);
