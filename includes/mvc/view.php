<?php
namespace mvc;

class view extends \lib\mvc\view
{
	function _construct()
	{
		// define default value for global
		// $this->include->css_main     = false;
		$this->data->site['title']   = T_("Your Browser Is DEAD!");
		$this->data->site['desc']    = T_("the place for show your browser is dead! please update it!");
		$this->data->site['slogan']  = T_("use up-to-date browser");

		$this->data->page['desc']    = T_("the place for show your browser is dead! please update it!");

		// add language list for use in display
		$this->global->langlist		= array(
												'fa_IR' => 'فارسی',
												'en_US' => 'English'
												);

		// $this->include->js           = false;
		$this->data->bodyclass       = 'unselectable';

		if(method_exists($this, 'options')){
			$this->options();
		}
		$this->data->display['account'] = "content/home/layout.html";

		// disable common.js
		$this->include->js_main = false;
	}
}
?>