<?php
	try 
	{
		$bdd=new PDO('mysql:host=localhost;dbname=test','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	} 
		catch (Exception $e) 
	{
		die('Erreur : ').$e->getMessage();
	}
	$req=$bdd->prepare('SELECT titre,content,DATE_FORMAT(date_creation,"%d-%m-%Y %H:%i:%s")AS datac FROM billet WHERE id=?');
	$req->execute(array($_GET['billet']));
	$donnee=$req->fetch();
?>
<html>
	<head>
		<title><?php echo $donnee['titre'];?></title>
		<meta charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<table>
	 		<tr class="titre"><td><?php echo $donnee['titre']." | ".$donnee['datac'];?></td></tr>
	 		<tr class="content"><td><?php echo $donnee['content'];?></td></tr>
		</table>
		<h1>Commentaires</h1>
	<?php $req->closeCursor();
		$req=$bdd->prepare('SELECT auteur,comment,DATE_FORMAT(date_creation,"%d-%m-%Y %H:%i:%s")AS datac FROM commentaires WHERE id_billet=?');
		$req->execute(array($_GET['billet']));
		while ($donnee=$req->fetch()) {
			echo $donnee['auteur']." ".$donnee['datac']."<br/>";
			echo $donnee['comment']."<br>";
		}
	?>
	</body>
</html>