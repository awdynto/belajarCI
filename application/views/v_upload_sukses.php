<html>
<head>
	<title>Upload foto</title>
</head>
<body>


	<ul>
		<?php echo "Upload sukses"; ?>
		<?php foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
		<?php endforeach; ?>
	</ul>	

</body>
</html>