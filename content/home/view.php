<?php
namespace content\home;

class view
{
	public static function config()
	{
		// Full browser_detection object
		$my_browser       = \dash\utility\browserDetection::browser_detection('full_assoc');
		$myBrowserName    = $my_browser['browser_name'];
		$myBrowserVersion = $my_browser['browser_number'];
		$myBrowserOs      = $my_browser['os'];

		$myBrowserLogo    = '';

		// Check the browser's HTML 5 compatibility
		if ($my_browser['html_type'] == '' || $my_browser['html_type'] == 1 || $my_browser['browser_name'] == 'msie')
		{

			$myPageDesc  = T_("Your browser is Dead! Please update it!");

			if(isset($my_browser['browser_name']))
			{
				$myPageDesc .= ' | '. $my_browser['browser_name'];
			}

			if(isset($my_browser['browser_math_number']))
			{
				$myPageDesc .= '-'. $my_browser['browser_math_number'];
			}

			if(isset($my_browser['os']))
			{
				$myPageDesc .= ' @'. $my_browser['os'];
			}

			\dash\data::old(true);
			\dash\data::page_title(T_("You are DEAD!"));
			\dash\data::page_desc($myPageDesc);
		}
		else
		{
			\dash\data::old(false);
			\dash\data::page_title(T_('NO! You are Alive!'));
			\dash\data::page_desc(T_("Your browser is up-to-date! Please enjoy using it!"));
			\dash\data::page_special(true);
		}

		// By default for firefox "browser_name" is "gecko". We set it to "firefox"
		if ($my_browser['browser_name'] == 'gecko')
		{
			$my_browser['browser_name'] = 'firefox';
			$myBrowserName = T_('Firefox');
		}

		// By default for chrome "browser_name" is "chrome". We set it to "google chrome"
		if ($my_browser['browser_name'] == 'chrome')
		{
			$myBrowserName = T_('Google Chrome');
		}

		// By default for internet explorer "browser_name" is "msie". We set it to "internet explorer"
		if ($my_browser['browser_name'] == 'msie')
		{
			$myBrowserName = T_('Internet Explorer');
		}

		if ($my_browser['browser_name'] == 'edge')
		{
			$myBrowserName = T_('Edge');
		}

		if ($my_browser['browser_name'] == 'safari')
		{
			$myBrowserName = T_('Safari');
		}

		if ($my_browser['os'] == 'nt')
		{
			$myBrowserOs = T_('windows');
		}

		if ($my_browser['os'] == 'lin')
		{
			if ($my_browser['ua_type'] == 'mobile')
			{
				$myBrowserOs = T_('android');
			}
			else
			{
				$myBrowserOs = T_('linux');
			}
		}

		// Message 1
		$myMsg1 = ucwords(T_($myBrowserName)) . " " . $myBrowserVersion;

		$browsers = array(
			"chrome"  => 64.0,
			"firefox" => 58.0,
			"msie"    => 11.0,
			"edge"    => 13,
			"opera"	  => 50.0,
			"safari"  => 534.57
		);

		// Message 2
		if (isset($browsers[$my_browser['browser_name']]))
		{

			if ($my_browser['browser_math_number'] < $browsers[$my_browser['browser_name']])
			{
				$myMsg2 = '<b>'.$browsers[$my_browser['browser_name']] . "</b> " . T_("is the latest version");
			}
			else
			{
				$myMsg2 = T_("Hooray! You are using the latest version");
			}

			$myBrowserLogo = $my_browser['browser_name'];

		}
		else
		{
			$myMsg2 = T_("Sorry! We have not enough information about your browser");
			$myBrowserLogo     = 'undefined';
		}

		if($my_browser['browser_name'] == 'msie')
		{
			$myMsg2 = T_("IE is DIE!");
		}

		\dash\data::browser($my_browser);
		\dash\data::name($myBrowserName);
		\dash\data::version($myBrowserVersion);
		\dash\data::os($myBrowserOs);
		\dash\data::logo($myBrowserLogo);
		\dash\data::message1($myMsg1);
		\dash\data::message2($myMsg2);


		// var_dump($my_browser);
	}
}
?>