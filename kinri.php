<?php
//金利の計算クラス
//参考url: https://www.bankrate.jp/dictionary/interest_rate/calculate/

$ir = new InterestRate();
$ir->init(300000, 18, 10000);
$ir->calc_all();
$ir->disp_log();


class InterestRate{

	public $ganpon;		//元本
	public $rate;		//金利
	public $monthly_back;	//月あたり返済額

	private $now_ganpon;	//現在の元本
	private $month_rate;	//月の利率

	public $log;		//支払いログ

	//各パラメータ設定
	//@ganpon:元本, @rate:年利(%), @mothly_back:毎月返済額
	public function init($ganpon, $rate, $monthly_back){
		$this->ganpon		= $this->now_ganpon	= $ganpon;
		$this->rate		= $rate;
		$this->monthly_back	= $monthly_back;
		$this->get_month_rate();	//年率から月の利率を計算
		$this->log		= array();
		//echo $this->monthly_back."\n";
	}

	//計算結果を出力
	public function calc_all(){
		$i = 1;
		while( $this->now_ganpon > 0 ){
			$this->monthly_pay();
		}
	}

	//年率から月の利率を計算
	public function get_month_rate(){
		$this->month_rate = $this->rate / 100 / 365 * 30;
		//echo $this->month_rate;
	}

	//一月の支払い
	public function monthly_pay(){
		$bill = $this->now_ganpon * $this->month_rate;	//現在の月の支払い額
		$this->now_ganpon = (($this->now_ganpon + $bill) - $this->monthly_back);

		//支払い記録を保存
		$this->save_log($bill,$this->now_ganpon,($this->monthly_back-$bill));
	}

	//支払い記録を保存
	public function save_log($bill,$now_ganpon,$back_ganpon){
		$log = array();
		$log["bill"]		= round($bill);
		$log["ganpon"]		= round($now_ganpon);
		$log["back_ganpon"]	= round($back_ganpon);
		$this->log[] = $log;
	}


	//ログを出力する
	public function disp_log(){

		$list = array("返済回数","利息","元本返済額","元本残高");
		foreach($list as $name){
			echo $name."\t";
		}
		echo "\n";

		$i = 1;	//返済回数
		foreach($this->log as $record){
			echo $i;
			echo "\t\t";
			echo $record["bill"];
			echo "\t";
			echo $record["back_ganpon"];
			echo "\t\t";
			echo $record["ganpon"];
			echo "\n";
			$i++;
		}
	}
}
?>
