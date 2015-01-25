<?php
namespace cls\form;

class account extends \lib\form
{
	public function __construct($function=null)
	{
		if ($function and method_exists($this, $function))
		{
			$this->$function();
		}
		else
		{
			return;
		}
	}

	private function login()
	{
		$this->mobile	 = $this->make('#mobile')->label(null)->desc(T_("Enter your registered mobile"))
							 ->value(((isset($_GET["mobile"]))?htmlspecialchars('+'.$_GET["mobile"]):null));
		$this->password = $this->make('#password')->name('password')->label(null)->pl(T_('Password'))->desc(T_("Enter your password"));
		$this->submit	 = $this->make('submit')->title(T_('Login'));
	}
}
?>