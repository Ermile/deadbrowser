<?php
namespace content;

class view
{
	public static function config()
	{
		\dash\data::site_title(T_("DeadBrowser"));
		\dash\data::site_desc(T_("We check your browser and say you are alive or dead! It's real"));
		\dash\data::site_slogan(T_("use up-to-date browser"));

		\dash\data::bodyclass('unselectable');

		\dash\data::include_js(false);
	}
}
?>