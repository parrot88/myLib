<?php
/**************************************************/
//  初期の動作
/**************************************************/
<<<<<<< HEAD

// 定数の読み込み
require_once("/home/doitsugoland/www/conf.php");
require_once(__FUNC__."db.php");

//緊急メンテナンス用処理---------------------------------------------------------------------------

// 緊急メンテナンス時はtrueへ、
$MaintenanceFlag = false;


// 「只今、メンテナンス中です」エラーページを表示処理
//    header("Location: ".DOMAIN."page/error.php?error=98");
//    exit();


//ユーザーエージェントによる振り分け---------------------------------------------------------------

// ユーザエージェント取得
$useragent = $_SERVER['HTTP_USER_AGENT'];

=======
// 定数の読み込み
require_once("/home/doitsugoland/www/conf.php");
require_once(__FUNC__."db.php");
//緊急メンテナンス用処理---------------------------------------------------------------------------
// 緊急メンテナンス時はtrueへ、
$MaintenanceFlag = false;
// 「只今、メンテナンス中です」エラーページを表示処理
//    header("Location: ".DOMAIN."page/error.php?error=98");
//    exit();
//ユーザーエージェントによる振り分け---------------------------------------------------------------
// ユーザエージェント取得
$useragent = $_SERVER['HTTP_USER_AGENT'];
>>>>>>> 00ed09cf1735367bd5ff5c2a8372957a2c379c1c
//iPhone
if( preg_match("/iPhone/", $useragent) ) {
    $agentchk = "OK";
    // iPad
} else if ( preg_match("/iPad/", $useragent) ) {
    $agentchk = "OK";
    // Androidスマホ
} else if ( preg_match("/Android.*Mobile/", $useragent) ) {
    $agentchk = "OK";
    // Androidタブレット
} else if ( preg_match("/(?!(Android.*Mobile)+)Android/", $useragent) ) {
    $agentchk = "OK";
    // その他
} else {
    // パソコンはパソコントップページ(page/pc_top.php)へリダイレクト
//        $agentchk = "PC";
    $agentchk = "OK";
    // パソコントップページへリダイレクト処理(開発時はオフにしておく)
//        header('Location:'.DOMAIN."page/pc_top.php");
}
<<<<<<< HEAD

//セッション管理---------------------------------------------------------------------------------

session_start();
//セッション持続時間設定10年設定
session_set_cookie_params( 10 * 365 * 24 * 60 * 60 );

=======
//セッション管理---------------------------------------------------------------------------------
//セッション持続時間設定10年設定
session_set_cookie_params( 10 * 365 * 24 * 60 * 60 );
session_start();
>>>>>>> 00ed09cf1735367bd5ff5c2a8372957a2c379c1c

//セッションの内容を取得
$is_login = $is_loign_free = $member_id = null;
if( (isset($_SESSION['LOGIN']) || isset($_SESSION['LOGIN_FREE']) ) && isset($_SESSION['MEMBER_ID']) ){
    $is_login       = $_SESSION['LOGIN'];       //有料会員
    $is_login_free  = $_SESSION['LOGIN_FREE'];  //無料会員
    $is_member_id   = $_SESSION['MEMBER_ID'];   //メンバーID
}
<<<<<<< HEAD

//ログイン中判定
if(($is_login || $is_login_free) && ( isset($is_member_id) && ($is_member_id != "") )){
    //会員情報読み込み $member_infoに格納

    //退会してないかチェック、退会ならトップへリダイレクト

}

//*****************************************************************************//
//  関数定義
//*****************************************************************************//


=======
//ログイン中判定
if(($is_login || $is_login_free) && ( isset($is_member_id) && ($is_member_id != "") )){
    //会員情報読み込み $member_infoに格納
    //退会してないかチェック、退会ならトップへリダイレクト
}
//*****************************************************************************//
//  関数定義
//*****************************************************************************//
>>>>>>> 00ed09cf1735367bd5ff5c2a8372957a2c379c1c
?>