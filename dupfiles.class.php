<?php

class dupFiles {
	function findDup($folderName, $show_original) {
		$cleanFiles = array();
		$duplicateFiles = array();
		$filesNotFound = array();

		if (!is_dir($folderName) && !file_exists($folderName)) {
			echo 'Folder doesn\'t exist <br />';
			echo dirname(__FILE__) . '/' . $folderName;
			return false;
		}

		if(is_readable($folderName)) {
			$files = scandir($folderName);
			foreach($files as $file) {
				$fileName = $folderName. '/'. $file;
				if(!is_dir($fileName) && file_exists($fileName)) {
					$hash = md5_file($fileName);
					if(isset($cleanFiles[$hash]) && !empty($cleanFiles[$hash])) {
						$duplicateFiles[$cleanFiles[$hash]][] = $file;
					} else {
						$cleanFiles[$hash] = $file;
					}
				} else {
					$filesNotFound[] = $file;
				}
			}
		}

		if(isset($show_original) && !empty($show_original)) {
			if(!empty($cleanFiles)) {
				echo 'Original Files <br />';
				foreach($cleanFiles as $files) {
					echo $files . '<br />';
				}
			}
		}

		if(!empty($duplicateFiles)) {
			echo '<br /><br />Duplicate Files <br />';
			foreach($duplicateFiles as $key => $dupFiles) {
				foreach($dupFiles as $fileName) {
					echo $key . ' : ' . $fileName . '<br />';
				}
			}
		}

		/*if(!empty($filesNotFound)) {
			echo 'files not found <br />';
			foreach($filesNotFound as $files) {
				echo $files . '<br />';
			}
		}*/
	}
}

?>