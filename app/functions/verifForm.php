<?php
function verifData(){
    $error = 0;
    $errorList['title'] = 0;
    $errorList['exerpt'] = 0;
    $errorList['body'] = 0;
    $errorList['cat'] = 0;

    if ($_POST['post-title'] <= 0) {
        $error++;
        $errorList['title'] = 1;
    }
    if ($_POST['post-excerpt'] <=0) {
        $error++;
        $errorList['exerpt'] = 1;
    }
    if ($_POST['post-body'] <=0) {
        $error++;
        $errorList['body'] = 1;
    }
    if ($_POST['post-category']<= 0) {
        $error++;
        $errorList['cat'] = 1;
    }

    if ($error === 0) {
        $result['title'] = $_POST['post-title'];
        $result['exerpt'] = $_POST['post-excerpt'];
        $result['body'] = $_POST['post-body'];
        $result['cat'] = $_POST['post-category'];
    }
    else {
        return $errorList;
    }
}