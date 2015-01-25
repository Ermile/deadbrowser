<?php
namespace content\home;

class view extends \mvc\view{
	public function config(){
		$form = $this->createform('@linkbor.url');
		$form->add('submit', 'submit')->value("Go");
	}


	public function view_query($object){
		// var_dump($object->api_callback); 
		// or var_dump($this->controller()->api_callback); 
	}
}
?>