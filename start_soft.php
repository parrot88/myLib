<?php
//プログラム起動テスト
//非同期実行する
// https://qiita.com/_Cierra_Neko_/items/d43114eae4db8d0bf8c4

$str = 'start "" "C:\Program Files (x86)\ConEmu\ConEmu.exe"';
$fp = popen($str, 'r');	//非同期実行
pclose($fp);

//echo exec($str);		//同期実行　実行結果を待つ
?>


