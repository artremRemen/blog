<?php 
function ReadData($filename, $dir){
    $filename = '623ad2ee744b8';
    $filename = $filename.'.json';
    $files = scandir($dir);
    $file = in_array($filename , $files);
    if ($file) {
        $content = file_get_contents($dir.'/'.$filename);
        $content = json_decode($content, true);
        return $content;
    }
    header("Location: /404.php");
}
function listCat($dir){
    $cats= array();
    $files = scandir($dir);
    foreach ($files as $file) {
        if (str_ends_with($file, '.json')) {
            $content = file_get_contents($dir.'/'.$file);
            $content = json_decode($content, true);
            if (isset($cats[$content['category']])) {
                $cats[$content['category']] ++;
            }
            else{
                $cats[$content['category']] = 1;
            }
        }
    }
    return $cats;
}
function ReadAllFiles($dir){
    $cats= array();
    $files = scandir($dir);
    foreach ($files as $file) {
        if (str_ends_with($file, '.json')) {
            $content = file_get_contents($dir.'/'.$file);
            $content = json_decode($content, true);
        }
    }
    return $content;
}