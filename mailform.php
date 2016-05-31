//-----------------------------------
//  Mail form functions
//
//


Class MailForm{



    //文字列の空チェック 空:true
    public function check_empty($str){
        if(strlen($str) > 0 ){
            return false;
        }
        return true;
    }

}
