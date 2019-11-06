<?php
ini_set("allow_url_fopen", 1);

if ( isset( $_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    echo $keyword;
    echo "<br>";
    $json = 'https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=28984d098e9946c2c42b87eac57a678b&tags='.$keyword.'&format=json&nojsoncallback=1';
    $contents = file_get_contents($json);
    $contents = utf8_encode($contents);
    $obj = json_decode($contents);

    $i = 0;
    $farm = [];
    $server = [];
    $id = [];
    $secret = [];
    $key = 1;

    while ($key < 50) {
        $results[$key]["farm"] = $obj->photos->photo[$key]->farm;
        $results[$key]["server"] = $obj->photos->photo[$key]->server;
        $results[$key]["id"] = $obj->photos->photo[$key]->id;
        $results[$key]["secret"] = $obj->photos->photo[$key]->secret;
        $key++;
    }
}

var_dump($results);
?>