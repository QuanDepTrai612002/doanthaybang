<?php
class Utils
{
	static function getIndex($index, $val = null)
	{
		if (isset($_GET[$index]))
			return $_GET[$index];
		else
			return $val;
	}

	static function postIndex($index)
	{
		if (isset($_POST[$index]))
			return $_POST[$index];
		else
			return null;
	}

	static function isEmail($email)
	{
		$pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';

		// Kiểm tra xem email có phù hợp với pattern không
		if (preg_match($pattern, $email))
		{
			return true; // Email hợp lệ
		} else
		{
			return false; // Email không hợp lệ
		}
	}

	static function isWebsite($s)
	{

	}
	static function isStrongPassword($s)
	{

	}
	static function isPhone($phone)
	{
		$pattern = '/^\+?[0-9]{1,4}-?[0-9]+$/';

		// Kiểm tra xem số điện thoại có phù hợp với pattern không
		if (preg_match($pattern, $phone))
		{
			return true; // Số điện thoại hợp lệ
		} else
		{
			return false; // Số điện thoại không hợp lệ
		}
	}
	static function uploads($file)
	{
		$target_dir = ROOT."/image/uploads/";
		$target_file = $target_dir . basename($file["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		// Check if file already exists
		if (file_exists($target_file))
		{
			$uploadOk = 0;
		}

		// Check file size
		if ($file["size"] > 500000)
		{
			$uploadOk = 0;
		}

		// Allow certain file formats
		if (
			$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif"
		)
		{
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0)
		{
			return false;
		} else
		{
			if (move_uploaded_file($file["tmp_name"], $target_file))
			{
				return true;
			} else
			{
				return false;
				
			}
		}
	}
	static function filesIndex($index)
	{
	
		if (isset($_FILES[$index]))
			return $_FILES[$index];
		else
			return null;
	}
	static function checkFullName($name) {
		$pattern = '/^[^\d\s]+(?:\s+[^\d\s]+)+$/';
		return preg_match($pattern, $name);
	}
}

?>