<?php

$conf = include('config.php');
$hostname = $conf->hostname;
$username = $conf->username;
$password = $conf->password;
$db = $conf->db;

// Etape 1: Ouvrir une connexion avec la base de donnée.
$mysqli = new mysqli($hostname, $username, $password, $db);
//verification
if ($mysqli->connect_errno)
{
    echo "<article>";
    echo("Échec de la connexion : " . $mysqli->connect_error);
    echo("<p>Indice: Vérifiez les parametres de <code>new mysqli(...</code></p>");
    echo "</article>";
    exit();

    // echo("Échec de la connexion : " . $mysqli->connect_error);
    // exit();
}
?>