<html>
<head>
	<title>malasngoding.com</title>
</head>
<body>
	
	<?php echo $error;?>

	<?php echo form_open_multipart('index.php/upload/aksi_upload');?>

	<input type="file" name="berkas" />

	<br /><br />

	<input type="submit" value="upload" />

</form>

</body>
</html>