<?php


unlink('C:/xampp/htdocs/fms/'.$_GET["name"]);

header("Location: " . $_SERVER["HTTP_REFERER"]);
function emptyDir($dir) {
    if (is_dir($dir)) {
        $scn = scandir($dir);
        foreach ($scn as $files) {
            if ($files !== '.') {
                if ($files !== '..') {
                    if (!is_dir($dir . '/' . $files)) {
                        unlink($dir . '/' . $files);
                    } else {
                        emptyDir($dir . '/' . $files);
                        rmdir($dir . '/' . $files);
                    }
                }
            }
        }
    }
}
$dir = 'C:/xampp/htdocs/fms/'.$_GET["name"];
emptyDir($dir);
rmdir($dir);
