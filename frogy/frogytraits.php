<?php

trait FrogyCommon{

	function sanitizeInput($data){
		$data = trim($data);
		$data = addslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}
}


?>