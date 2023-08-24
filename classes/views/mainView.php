<?php
	namespace Views;

	class mainView
	{
		public static function render($fileName,$arr = [],$header = BASE_DIR . '/pages/includes/header.php' ,$footer = BASE_DIR . '/pages/includes/footer.php'){
			include($header);
			include('pages/'.$fileName);
			include($footer);
			die();
		}
	}
?>


