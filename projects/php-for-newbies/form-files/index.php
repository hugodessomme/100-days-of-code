<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Files</title>
</head>
<body>
	<h1>Send a file with a form, and save it locally</h1>
	<p>
		Size < 1Mo<br>
		Format: .jpg, .jpeg, .png, .gif
	</p>
	<form action="target.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit">
	</form>
</body>
</html>