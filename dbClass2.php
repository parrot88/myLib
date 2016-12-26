<?php
//************************************************
//  データベース接続機能(PDO version)
//  ver 1.1.0
//************************************************
// http://php.net/manual/ja/class.pdo.php
// 定数ファイル読み込み
require_once("/home/doitsugoland/www/conf.php");


class DBClass extends PDO{

    var $handle = DSN;		//デフォルト
//	var $handle = DSN_SHOP;	//ec cube用テーブル
    var $dbh = null;        //DBハンドラー

    //----------------------------------------------------------------------
    public function __construct(){
		parent::__construct($this->handle, DB_USER, DB_PASSWORD);
    }

    //----------------------------------------------------------------------
    /*
	//************************************************
	// dbアクセスをec cubeに切り替える
	public function init_shop(){
		$this->handle = DSN_SHOP;
	}
    */
    //************************************************
    // dbアクセスをマネジメントシステムに切り替える
    public function init_management(){
        $this->handle = DSN;
    }

    //----------------------------------------------------------------------

    //************************************************
    // sql文を実行 bind分追加
    // $sql : select * from `test_word` where ID = :ID
    // $bind: array(":ID"=>$id)
    function excute_sql_bind($sql,$bind){
        if( (strlen($sql) < 1) && $sql == "" )
            return false;

        try{
            $stmt = $this->prepare($sql);
            $res = $stmt->execute($bind);
        }catch (PDOException $e){
            print('Error:'.$e->getMessage());
            die();
        }
        $dbh = null;
        return $stmt->fetchAll();
    }

    //************************************************
    // sql文を実行
    function excute_sql($sql){
		return $this->excute_sql_bind($sql,array());
    }

    //************************************************
    // クエリの結果を配列にして返す
    function get_result_arr($arr){

        $all_list = array();
        foreach($arr as $feed){
            foreach ($feed as $key=>$row) {
                $new_list = array();
                $new_list['$key'] = $row;
            }
            $all_list[] = $new_list;
        }
        return $all_list;
    }

    //************************************************
    // insert prepareを使用したもの
    // SQLインジェクションのためこちらを推奨
    function InsertP($table,$query){

        $sql1 = 'INSERT INTO '.$table.' (';
        $sql2 = ') VALUES( ';
        $sql3 = ')';

        $size = sizeof($query);
        $key_sum = $val_sum = "";
        foreach($query as $key=>$val){

            $arr_vals[] = $val;
            $key = '`'.$key.'`';

            if($size>1){
                $key_sum = $key_sum.$key.", ";
                $val_sum = $val_sum.$this->quote($val).", ";
                $size--;
            }else{
                $key_sum = $key_sum.$key." ";
                $val_sum = $val_sum.$this->quote($val)." ";
            }
        }
        $sql = $sql1.$key_sum.$sql2.$val_sum.$sql3;

        //print $sql;

        $res = false;
        $dbh = $this->dbh;
        try{
            $stmt = $dbh->prepare($sql);
            $res = $stmt->execute($arr_vals);
        }catch (PDOException $e){
            print('Error:'.$e->getMessage());
            die();
        }
        $dbh = null;
        return $res;
    }

    //************************************************
    //データベースから取得した日本単語をUTF形式へなおす

    function toUTF($word){
        return mb_convert_encoding($word,'UTF-8','EUC-JP');
    }

    //************************************************
    //UTF形式をデータベースのEUC形式へなおす

    function toEUC($word){
        return mb_convert_encoding($word,'EUC-JP','UTF-8');
    }

    //************************************************
    //日時を取得
    function get_nowDate(){
        return date("Y-m-d H:i:s");
    }

    //************************************************
    //HTML特殊文字のエンコード  DBからの参照時に使用
    function h($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

}
?>
