<?php
namespace mvc;

class view extends \lib\view
{
	function _construct()
	{
		$this->include->css_main            = false;
		// define default value for global

		$this->data->site['title']   = T_("Browser Dead");
		$this->data->site['desc']    = T_("the place for show your browser is dead! please update it!");
		$this->data->site['slogan']  = T_("use up-to-date browser");

		$this->data->page['desc']    = T_("the place for show your browser is dead! please update it!");

		// add language list for use in display
		$this->global->langlist		= array(
												'fa_IR' => 'فارسی',
												'en_US' => 'English',
												'de_DE' => 'Deutsch'
												);

		// if you need to set a class for body element in html add in this value
		// $this->data->bodyclass      = null;

		if (!locale_emulation()) {
			$this->include->gettext  = 'Translation use native gettext dll';
		}
		else {
			$this->include->gettext  = 'Translation use PHP gettext class';
		}

		if(method_exists($this, 'options')){
			$this->options();
		}
	}
}
?>