<?php namespace D3Catalyst\Exchangerate;

/**
*  Class Exchangerate.
*
*
*  @author Ricardo Madrigal <soporte@d3catalyst.com>
*/
class Exchangerate {

	/*
	* Exchange rate information
	*/
	private $exchange_data 		= NULL;

	/*
	* Url of google exchange rate
	*/
	private $exchange_url 		= NULL;

	/*
	* Country currency from
	* Example : UDS (Dollar)
	*/
	private $currency_from 		= NULL;

	/*
	* Country currency to
	* Example : MXN (Mexican Peso)
	*/
	private $currency_to 		= NULL;

	/*
	* Amount of calculate exchange
	*/
	private $currency_amount 	= 1;

	/*
	* Constructor
	* @return void
	*/
	public function __construct() {
		$this->exchange_url = "http://rate-exchange.appspot.com/currency?";
	}

	/*
	* Set country currency's config
	* User Country codes
	* Example $currency_from=USD , $currency_to=MXN
	*
	* @return void
	*/
	public function setCurrency($currency_from,$currency_to) {
		$this->currency_from 	= strtoupper($currency_from);
		$this->currency_to 		= strtoupper($currency_to);
	}

	/*
	* Set country currency from
	* Example $currency=USD
	* @return void
	*/
	public function setCurrencyFrom($currency) {
		$this->currency_from = strtoupper($currency);
	}

	/*
	* Get country currency from
	* @return string
	*/
	public function getCurrencyFrom () {
		return $this->currency_from;	
	}

	/*
	* Set country currency to
	* Example $currency=MXN
	* @return void
	*/
	public function setCurrencyTo($currency) {
		$this->currency_to = strtoupper($currency);
	}

	/*
	* Get country currency to
	* @return string
	*/
	public function getCurrencyTo () {
		return $this->currency_to;	
	}

	/*
	* Set currency amount
	* @return void
	*/
	public function setAmount($amount) {

		if(!is_numeric($amount))
			throw new \Exception('Only numbers.');

		$this->currency_amount = $amount;
	}

	/*
	* Get currency exchange infor
	* @return array currency info
	*/
	public function getExchangeRateInfo() {

		if($this->exchange_data == NULL)
			$this->exchange_data = $this->resolve();

		$exchangerateinfo["to"] 			= $this->exchange_data->to;
		$exchangerateinfo["from"] 			= $this->exchange_data->from;
		$exchangerateinfo["rate"] 			= $this->exchange_data->rate;
		$exchangerateinfo["exchange_value"] = $this->exchange_data->v;

		return $exchangerateinfo;

	}

	/*
	* Get currency exchange value
	* @return int exchange value
	*/
	public function getExchangeValue() {

		if($this->exchange_data == NULL)
			$this->exchange_data = $this->resolve();

		return $this->exchange_data->v;
	}

	/*
	* Get currency exchange from google finance
	* @return json currency info
	*/
	private function resolve(){

		$url = $this->makeGetUrl();

		$timeout = 30; // Timeout

		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);

		$data_content = curl_exec($ch);    
		curl_close($ch);

		$data = json_decode($data_content);

		if($data == NULL)
			throw new \Exception("Problems in retrieving data from http://rate-exchange.appspot.com");

		return $data;
	}

	/*
	* Make url for get currency exchange
	* @return string $url
	*/
	private function makeGetUrl() {

		$params = array();

		if(!is_null($this->currency_from))
			$params["from"] = $this->currency_from;
		if(!is_null($this->currency_to))
			$params["to"] = $this->currency_to;
		if(is_numeric($this->currency_amount))
			$params["q"] = $this->currency_amount;

		return $this->exchange_url . http_build_query($params);
	}
}