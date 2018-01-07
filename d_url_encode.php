<?php
//url encode

$front_tag = 'aaa=';
$url = 'http://php.net/manual/ja/function.urlencode.php#top';
$e_url = urlencode($url);
$sum_url = $front_tag.$e_url;

echo $sum_url;
?>
