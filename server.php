<?php
if (isset($_GET['url']) && $_GET['url']) {
    include 'data/libs.php';
    $f = loaddata('data/urls.txt');
    $url = $f[$_GET['url']];
    xemmang($url);
    // if ($url) {
    //     header('location:' . $url['url']);
    // } else {
    //     header('location:./');
    // }
}