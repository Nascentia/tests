<?php 
	try
	{
		$bdd=new PDO('mysql:host=localhost;dbname=test','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
		$request=$bdd->prepare('INSERT INTO chat(pseudo,message,dateactu) VALUES(?,?,NOw())');
		$request->execute(array($_POST['pseudo'],$_POST['message']));
		echo 'Message envoyé !';
		header('Location:chaton.php');
?>