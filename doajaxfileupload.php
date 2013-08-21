<?php
	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;
			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else 
	{
			$msg .= " File Name: " . $_FILES['fileToUpload']['name'] . ", ";
			$msg .= " File Size: " . @filesize($_FILES['fileToUpload']['tmp_name']);
			//for security reason, we force to remove all uploaded file
			//@unlink($_FILES['fileToUpload']);
			include ("simpleimage.php");
			
			$archivo["name"] = $_FILES['fileToUpload']['name'];
			$archivo["tmp_name"] = $_FILES['fileToUpload']['tmp_name'];

			$ext = explode(".", $archivo["name"]);
		    $nuevoarchivo = md5(time()) . "." . $ext[count($ext) - 1];
		    move_uploaded_file($archivo["tmp_name"], "uploads/$nuevoarchivo");
			  $image = new SimpleImage();
		    $image -> load("uploads/$nuevoarchivo");
        $ancho = $image -> getWidth();
        $alto = $image -> getHeight();
		    $image -> save("uploads/$nuevoarchivo");
		    $nuevoarchivo_array = explode(".", $nuevoarchivo);
		    $nuevoarchivo_ext = $nuevoarchivo_array[count($nuevoarchivo_array) - 1];
		    $nuevoarchivo_nom = array_slice($nuevoarchivo_array, 0, -1);
		    $nuevoarchivo_nom = implode(" ", $nuevoarchivo_nom);
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
  echo				"alto: '" . $alto . "',\n";
  echo				"ancho: '" . $ancho . "',\n";
	echo				"msg: '" . $nuevoarchivo . "'\n";
	echo "}";
?>