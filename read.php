<?php
// 読込ファイル


class Read{

    public $code;

    //ファイル読み込み
    function set($path){
        $this->code = $this->get_html($path);
//        $this->code = file_get_contents($path, true);
    }

    function get_html($path){
        return file_get_contents($path, true);
    }


    //ファイル内の文字列を変換
    function change($key, $str){
        $this->code = str_replace( $key, $str, $this->code );
    }

    //ファイル内の文字列を変換
    function change_add($key, $str){
        $this->code += str_replace( $key, $str, $this->code );
    }

    //
    function change_html($key, $str, $body){
        return str_replace( $key, $str, $body );
    }


}
?>
