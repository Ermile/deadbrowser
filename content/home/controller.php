<?php
namespace content\home;
use \lib\saloos;

class controller extends \mvc\controller{
	public function config(){
		$len = 3;
	}

	function _route(){
		$this->get('gourl')->ALL("/^([a-zA-Z0-9]*)$/");
		$this->post('url')->ALL("");
	}
}
?>