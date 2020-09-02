<?php
function message($content, $type = 'success')
{
    return '<div class="alert alert-' . $type . '">' . $content . '</div>';

}
function xemmang($mang)
{
    echo '<pre>', print_r($mang), '</pre>';
}

function RandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function loaddata($path)
{
    $f = fopen($path, 'r');
    $array = array();

    while (!feof($f)) {

        $str = fgets($f);
        $ar = explode('-=-', $str);
        if (count($ar) == 2) {
            $array[trim($ar[0])] = [
                'url' => (string) $ar[1]
            ];
        }
    }

    fclose($f);
    return $array;
}
function save($path, $array)
{
    $f = fopen($path, 'w');
    $content = '';
    foreach ($array as $string => $urls) {
        $content .= $string . '-=-'. $urls['url'] . "\n";
    }
    fwrite($f, $content);
    fclose($f);
    return loaddata($path);
}

function them($url, &$array, &$urls)
{
    if (!isset($array[$url])) {
        $urls = 'https://hideurl.herokuapp.com/server.php?url=' . RandomString();
        $array[$urls] = array('url' => $url);
        return true;
    } else {
        return false;
    }
}
function xoa($url, &$array)
{
    if (isset($array[$url])) {
        unset($array[$url]);
        return true;
    } else {
        return false;
    }
}
