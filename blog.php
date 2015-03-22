<!DOCTYPE html>
<html>
	<head>
		<title>Mon super blog</title>
		<meta charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body align="center">
		<h1>Le Braselog 1.0</h1>
		<p>Dernier billets : </p>
		<?php
			try {
			 	$bdd=new PDO('mysql:host=localhost;dbname=test','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			 } 
			 catch (Exception $e) {
			 	die('Erreur : ').$e->getMessage();
			 } 
			 $request=$bdd->query('SELECT id,titre,content,DATE_FORMAT(date_creation,"%d-%m-%Y %H:%i:%s")AS datac FROM billet ORDER BY id DESC LIMIT 0,10');
			 while ($donnee=$request->fetch()) 
			 {
		?>
			 	<table>
			 		<tr class="titre"><td><?php echo $donnee['titre']." | ".$donnee['datac'];?></td></tr>
			 		<tr class="content"><td><?php echo $donnee['content'];?></td></tr>
			 		<tr><td><a href="comment.php?billet=<?php echo $donnee['id'];?>">Commentaires</a></td></tr>
			 	</table>
		<?php
			 }
		?>
	</body>
</html>