<?phprequire_once('dupfiles.class.php');echo '<form id="form1" name="form1" method="post" action="">	<p><input name="folder_name" placeholder="Folder name" type="text" /></p>	<p>Show original files <input name="show_original" type="checkbox" /></p>	<p><input type="submit" name="submit" value="Submit" /></p></form>';if (isset($_POST['submit']) && ($_POST['submit'] === 'Submit')) {	$folderName = $_POST['folder_name'];	$show_original = $_POST['show_original'];	$findDup = new dupFiles;	$findDup -> findDup($folderName, $show_original);}?>