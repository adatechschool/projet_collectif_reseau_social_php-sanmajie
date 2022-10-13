<?php
include_once('session.php');
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>ReSoC - Mes abonnements</title> 
        <meta name="author" content="Julien Falconnet">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <?php include_once('header.php'); ?>
        <div id="wrapper">
            <aside>
                <img src="user.jpg" alt="Portrait de l'utilisatrice"/>
                <section>
                    <h3>Présentation</h3>
                    <p>Sur cette page vous trouverez la liste des personnes dont
                        l'utilisatrice
                    <?php 
                    $currentUserId = $_SESSION['connected_id'];
                
                    $currentUser = $mysqli->query("SELECT alias FROM users WHERE users.id = '$currentUserId'")->fetch_assoc();
                    echo $currentUser['alias'];
                    ?>
                        (dont l'id est le n° <?php echo $_SESSION['connected_id'] ?>)
                        suit les messages
                    </p>

                </section>
            </aside>
            <main class='contacts'>
                <?php
                // Etape 1: récupérer l'id de l'utilisateur
                $userId = $_SESSION['connected_id'];
                // Etape 2: se connecter à la base de donnée
            
                // Etape 3: récupérer le nom de l'utilisateur
                $laQuestionEnSql = "
                    SELECT users.* 
                    FROM followers 
                    LEFT JOIN users ON users.id=followers.followed_user_id 
                    WHERE followers.following_user_id='$userId'
                    GROUP BY users.id
                    ";
                $lesInformations = $mysqli->query($laQuestionEnSql); 
                while ($user = $lesInformations->fetch_assoc())
                {
                ?>
                <article>
                    <img src="user.jpg" alt="blason"/>
                    <h3><?php echo $user['alias'] ?></h3>
                    <p>id:<?php echo $user['id'] ?></p>                 
                </article>
                <?php } ?>
            </main>
        </div>
    </body>
</html>
