<?php

trait FrogyCommon{

	function sanitizeInput($data){
		$data = trim($data);
		$data = addslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}


	public function uploadFile(){
		// check if global variable $_FILES has a value
		if($_FILES['frogimage']['error']== 0){

			// start file upload
			$filesize = $_FILES['frogimage']['size'];
			$filename = $_FILES['frogimage']['name'];
			$filetype = $_FILES['frogimage']['type'];
			$filetempname = $_FILES['frogimage']['tmp_name'];
			// specify the destination folder to upload files to
			$folder = "../assets/uploads/";

			// check the file size
			if($filesize > 4194304){
				$error[] = "File size must be exactly or less than 4 mb!";
			}

			// get the file extension
			$file_ext = explode('.',$filename); // convert string to array
			$file_ext = end($file_ext); // get last element of array
			$file_ext = strtolower($file_ext); // to lowercase

			// specify the extensions allowed
			$extensions = array('png', 'gif', 'jpg', 'jpeg', 'bmp');

			// check if the file extension is valid
			if(in_array($file_ext, $extensions) === false){

				$error[] = "Extension not allowed!";
			}

			// change the filename
			$filename = time()."_"."wakanow";
			$destination = $folder.$filename.".$file_ext";

			// now check if there is no any error and upload the file
			if(!empty($error)){
				return $error;
			}else{
				// otherwise, upload to destionation folder
				move_uploaded_file($filetempname, $destination);

				return $filename.".$file_ext";
				
			}

		}
		
	}
}


?>