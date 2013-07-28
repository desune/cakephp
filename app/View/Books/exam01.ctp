<html>
<head>
	<title></title>
</head>
<body>
	<?php
	if($results == null){
		echo "<h1>No Database</h1>";
	}else{
		echo "<table><tr><td>id</td><td>Title</td></tr>";
		foreach($results as $item){
			echo "<tr><td>".$item['Book']['id']."</td><td><a href='books/view/".$item['Book']['id']."'>".$item['Book']['title']."</a></td></tr>";
		}
		echo "</table>";
	}
	?>
</body>
</html>