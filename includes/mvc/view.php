<?php
namespace mvc;

class view extends \lib\mvc\view
{
	function _construct()
	{
		// define default value for global
		// $this->include->css_main     = false;
		$this->data->site['title']   = T_("Your Browser is DEAD!");
		$this->data->site['desc']    = T_("We check your browser and say you are alive or dead! It's real");
		$this->data->site['slogan']  = T_("use up-to-date browser");

		$this->data->page['desc']    = T_("We check your browser and say you are alive or dead! It's real");

		// $this->include->js           = false;
		$this->data->bodyclass       = 'unselectable';

		// disable common.js
		$this->include->js      = false;
	}
}
?>