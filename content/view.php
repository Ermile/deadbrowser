<?php
namespace content;

class view
{
	public static function config()
	{
		\lib\data::site_title(T_("DeadBrowser"));
		\lib\data::site_desc(T_("We check your browser and say you are alive or dead! It's real"));
		\lib\data::site_slogan(T_("use up-to-date browser"));

		\lib\data::bodyclass('unselectable');

		\lib\data::include_js(false);
	}
}
?>