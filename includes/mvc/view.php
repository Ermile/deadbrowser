<?php
namespace mvc;

class view extends \lib\view
{
	function _construct()
	{
		// define default value for global
		$this->data->site['title']   = T_("Your Browser is DEAD!");
		$this->data->site['desc']    = T_("We check your browser and say you are alive or dead! It's real");
		$this->data->site['slogan']  = T_("use up-to-date browser");

		$this->data->page['desc']    = T_("We check your browser and say you are alive or dead! It's real");

		$this->data->bodyclass       = 'unselectable';

		// disable common.js
		$this->include->js      = false;
	}
}
?>