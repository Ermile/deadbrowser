<?php
namespace content\home;

class view extends \mvc\view
{

	function config()
	{
		// Full browser_detection object
    // $this->data->browser = $this->browser_detection('full_assoc');
		$this->data->browser = \lib\utility\browserDetection::browser_detection('full_assoc');
		$this->data->name    = $this->data->browser['browser_name'];
		$this->data->version = $this->data->browser['browser_number'];
		$this->data->os      = $this->data->browser['os'];

		$this->data->logo    = '';

		// Check the browser's HTML 5 compatibility
		if ($this->data->browser['html_type'] == '' || $this->data->browser['html_type'] == 1 || $this->data->browser['browser_name'] == 'msie')
		{
			$this->data->old  = true;
			$this->data->exec = 'jpg';
			$this->data->site['title'] = T_("You are DEAD!");
			$this->data->page['desc']    = T_("Your browser is Dead! Please update it!");
		}
		else
		{
			$this->data->old  = false;
			$this->data->exec = 'png';
			$this->data->site['title'] = T_('NO! You are Alive!');
			$this->data->page['desc']    = T_("Your browser is up-to-date! Please enjoy using it!");
		}

		// By default for firefox "browser_name" is "gecko". We set it to "firefox"
		if ($this->data->browser['browser_name'] == 'gecko') {
			$this->data->browser['browser_name'] = 'firefox';
			$this->data->name = T_('Firefox');
		}

		// By default for chrome "browser_name" is "chrome". We set it to "google chrome"
		if ($this->data->browser['browser_name'] == 'chrome') {
			$this->data->name = T_('Google Chrome');
		}

		// By default for internet explorer "browser_name" is "msie". We set it to "internet explorer"
		if ($this->data->browser['browser_name'] == 'msie') {
			$this->data->name = T_('Internet Explorer');
		}

		if ($this->data->browser['browser_name'] == 'edge') {
			$this->data->name = T_('Edge');
		}

		if ($this->data->browser['browser_name'] == 'safari') {
			$this->data->name = T_('Safari');
		}

		if ($this->data->browser['os'] == 'nt') {
			$this->data->os = T_('windows');
		}

		if ($this->data->browser['os'] == 'lin') {
			if ($this->data->browser['ua_type'] == 'mobile') {
				$this->data->os = T_('android');
			} else {
				$this->data->os = T_('linux');
			}
		}

		// Message 1
		$this->data->message1 = ucwords(T_($this->data->name)) . " " . $this->data->version;

		$browsers = array(
			"chrome"  => 64.0,
			"firefox" => 58.0,
			"msie"    => 11.0,
			"edge"    => 13,
			"opera"	  => 50.0,
			"safari"  => 534.57
		);

		// Message 2
		if (isset($browsers[$this->data->browser['browser_name']]))
		{

			if ($this->data->browser['browser_math_number'] < $browsers[$this->data->browser['browser_name']])
			{
				$this->data->message2 = '<b>'.$browsers[$this->data->browser['browser_name']] . "</b> " . T_("is the latest version");
			}
			else
			{
				$this->data->message2 = T_("Hooray! You are using the latest version");
			}

			$this->data->logo = $this->data->browser['browser_name'];

		}
		else
		{
			$this->data->message2 = T_("Sorry! We have not enough information about your browser");
			$this->data->logo     = T_("undefined");
		}

		if($this->data->browser['browser_name'] == 'msie')
		{
			$this->data->message2 = T_("IE is DIE!");
		}

		// var_dump($this->data->browser);
	}
}
?>