<?php
//************************************************
//  コマンドライン入力機能クラス
//************************************************

class InputClass{
    //-----------------------------------------------------------------------------------------

    const ANSWER_YES    = 1;    //回答yes
    const ANSWER_NO     = 2;    //回答no
    const STR_LINE = "//-------------------------------------------------------------------";

    public $line_str = "//-------------------------------------------------------------------";
    public $eof = PHP_EOL;

    //-----------------------------------------------------------------------------------------

    //入力文字列取得
    function get_input(){
        return trim(fgets(STDIN));
    }

    //数字入力確認関数
    function get_num(){
        $num = $this->get_input();
        if(ctype_digit($num)){
            return $num;
        }
        echo "unexpected input.", PHP_EOL;
        exit();
    }

    //数字入力確認関数(Enterで入力スキップ可能)
    //Enter: true
    function get_num_skip_enter(){
        $num = $this->get_input();
        if(ctype_digit($num)){
            return $num;
        }else if(strlen(str_replace(array("\n","\r"),"",$num)) === 0){
            return true;
        }
        echo str_replace(array("\n","\r"),"",$num),PHP_EOL;
        echo strlen(str_replace(array("\n","\r"),"",$num)),PHP_EOL;
        echo "unexpected input.", PHP_EOL;
        exit();
    }

    //yes or no 入力を取得する
    //y:1, n:2
    function get_yes_no(){
        $str = $this->get_input();
        if(strpos($str, "y") !== false ){
            return self::ANSWER_YES;
        }else if(strpos($str, "n" ) !== false ){
            return self::ANSWER_NO;
        }
        echo "unexpected input.", PHP_EOL;
        exit();
    }

    //ラインを描画する
    function draw_line(){
        echo $this->STR_LINE,PHP_EOL;
        //echo $this->eof;
    }


}
?>
