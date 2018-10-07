<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=my_todo;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT content FROM tasks');

while ($donnees = $reponse->fetch())
{
    echo $donnees['content'] . '<br />';
}

$reponse->closeCursor();

$req = $bdd->prepare('INSERT INTO tasks(content) VALUES(:content)');
$req->execute(array(
    'content' => $content
));


?>