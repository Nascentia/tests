<!DOCTYPE html>
<html>
    <head>
        <title>Mon Minichat !</title>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="post" action="chat.php">
            <table>
                <tr>
                    <td>Pseudo :</td>
                    <td><input type="text" name="pseudo" id="pseudo"></td>
                </tr>
                <tr>
                    <td>Message :</td>
                    <td><input type="text" name="message" id='message'></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Envoyer"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php 
                            try
                            {
                                $bdd=new PDO('mysql:host=localhost;dbname=test','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                            }
                            catch(Exception $e)
                            {
                                die('Error : '.$e->getMessage());
                            }
                            $req=$bdd->query('SELECT pseudo,message FROM chat ORDER BY id DESC LIMIT 0,10');
                            while ($data = $req->fetch()) {
                                
                                echo " <b>".$data['pseudo']."</b> : ";
                                echo $data['message']."<br/>";
                            }
                            $req->closeCursor();
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>