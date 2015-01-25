<?php
namespace content\home;
use \lib\utility;
use \lib\debug;

class model extends \mvc\model{
	public function post_url($object){
		$chars = array(
			str_split("xcCtfmwJ3T5HDjPVmRzy72hTJAMmF8LBLHpymaJt5PCYa5vc"),
			str_split("w4vf2TFNP8Blhr4aYpVcFb96EAvyMEBBj5nefxvXntK7RNAE"),
			str_split("YFMDcnd4kPw9dHYN6ymBTd62y4nALpZDjZmVBDa8zVXeHDZx")
			);

		$base    = 3;
		$last    = $this->sql("url")->tableUrl()->field("#max(id)")->limit(0,1)->select();
		$last    = $last->assoc()['max(id)'];
		$current = (string)((int)$last + 1);
		$short   = str_split($current);
		$count   = sizeof($short);

		if ($count < $base) {
			for ($i = 0; $i < $base - $count; $i++) {
				array_unshift($short, '0');
			}
		}

		foreach ($short as $key => $value) {
			$short[$key] = $chars[$key][(int)$value];
		}

		$short = implode("", $short);

		if (utility::post('url') == '') {
			debug::warn(T_("Please enter the link!"));
		} else {
			$query = $this->sql('url')->tableUrl()->setUrl(utility::post('url'))
			->setShort($short)->setCounter(1);

			$result = $query->insert();

			$this->commit(function($_parm1 = null) {
				debug::true(T_("Your link is: ") . "linkbor.dev/" . $_parm1);
			}, $short);

			$this->rollback(function() {
				debug::warn(T_("Try again!"));
			});	
		}
	}

	function get_gourl($o){
		$shortUrl = $o->match->url[0][0];
		$myQuery = $this->sql('get')->tableUrl()
		->whereShort($shortUrl)
		->limit(0, 1)
		->select();

		$url     = $myQuery->assoc()['url'];
		$counter = $myQuery->assoc()['counter'] + 1;

		if ($url != null) {
			$host = parse_url($url)['host'];
			$path = parse_url($url)['path'];

			$this->redirector()->set_domain($host)->set_url($path);	
		}
	}
}
?>