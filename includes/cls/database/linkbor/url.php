<?php
namespace database\linkbor;
class url
{
	public $id      = array('type' => 'int@10', 'null'=>'NO', 'show'=>'NO', 'label'=>'ID');
	public $url     = array('type' => 'varchar@999', 'null'=>'YES', 'show'=>'YES', 'label'=>'URL');
	public $short   = array('type' => 'varchar@10', 'null'=>'YES', 'show'=>'YES', 'label'=>'Short');
	public $counter = array('type' => 'int@10', 'null'=>'YES', 'show'=>'NO', 'label'=>'Counter');

	//------------------------------------------------------------------ id - primary key
	public function id(){$this->validate()->id();}

	function url(){
		$this->form('text')->name('url')->pl('url')->label('')->class('linkbor-input');
	}
}
?>