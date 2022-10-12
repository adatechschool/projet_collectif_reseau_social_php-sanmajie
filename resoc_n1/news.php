<?php
include_once('session.php');
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>ReSoC - Actualités</title> 
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
                    <p>Sur cette page vous trouverez les derniers messages de
                        tous les utilisatrices du site.</p>
                </section>
            </aside>
            <main>
                <?php include('dbconnect.php'); ?>
                
                <?php
                $laQuestionEnSql = "
                    SELECT posts.content,
                    posts.created,
                    users.alias AS author_name,
                    users.id AS user_id,  
                    count(likes.id) AS like_number,  
                    GROUP_CONCAT(DISTINCT tags.label) AS taglist 
                    FROM posts
                    JOIN users ON  users.id=posts.user_id
                    LEFT JOIN posts_tags ON posts.id = posts_tags.post_id  
                    LEFT JOIN tags       ON posts_tags.tag_id  = tags.id 
                    LEFT JOIN likes      ON likes.post_id  = posts.id 
                    GROUP BY posts.id
                    ORDER BY posts.created ASC  
                    LIMIT 20
                    ";

                //LA REQUÊTE SQL ÉXPLIQUÉE :

                // SELECT posts.content, posts.created -> dans la table "posts", on récupère les valeurs des colonnes "content" et "created"

                // users.alias as author_name -> dans la table "users", on stocke les valeurs de la colonne "alias" sous le nom temporaire "author_name" (ce nom temporaire n'est valable QUE dans la requête !)

                //count(likes.id) as like_number -> dans la table "users", on stocke l'addition des id sous le nom temporaire "like_number"

                //GROUP_CONCAT(DISTINCT tags.label) AS taglist -> regroupe les valeurs non nulles de la colonne "label" dans la table "tags" en une chaîne de caractère sous le nom temporaire taglist (DISTINCT supprime les doublons)

                //FROM posts 
                //JOIN users ON users.id=posts.user_id -> jointure entre la table "posts" et la table "users", lorsque les valeurs "user_id" dans "posts" et "id" dans  "users" sont identiques
                //LEFT JOIN posts_tags ON posts.id = posts_tags.post_id -> jointure entre la table "posts" et la table "posts_tag", lorsque les valeurs "post_id" dans "posts_tag" et "id" dans "posts" sont identiques
                //LEFT JOIN tags ON posts_tags.tag_id  = tags.id  -> jointure entre la table "posts" et la table "tags", lorsque les valeurs "tag_id" dans "posts_tags" et "id" dans "tags" sont identiques
                //LEFT JOIN likes ON likes.post_id  = posts.id  -> jointure entre la table "posts" et la table "likes", lorsque les valeurs "post_id" dans "likes" et "id" dans "posts" sont identiques

                //GROUP BY posts.id -> groupe le jeu de résultats (parce qu'on a du COUNT et du GROUP_CONCAT)

                //ORDER BY posts.created DESC -> trie le résultat selon la date de création du post ("post.created") par ordre décroissant (du dernier au premier)

                //LIMIT 5 -> dans une limite de 5 éléments

                $lesInformations = $mysqli->query($laQuestionEnSql);
                //On stocke dans $LesInformations le résultat de la requête SQL $laQuestionEnSql appliquée à l'objet $mysqli (connexion avec la base de donnée)
                
                // Vérification
                if ( ! $lesInformations)
                {
                    echo "<article>";
                    echo("Échec de la requete : " . $mysqli->error);
                    echo("<p>Indice: Vérifiez la requete  SQL suivante dans phpmyadmin<code>$laQuestionEnSql</code></p>");
                    echo "</article>";
                    exit();
                }

                while ($post = $lesInformations->fetch_assoc())
                {
                    $tagsArray = explode(",", $post['taglist']);
                    
                    ?>

                    <!-- 
                    La fonction fetch_assoc() lit une ligne de résultat (ici $lesInformations) sous forme de tableau associatif ; renvoie NULL s'il n'y a plus de lignes dans le jeu de résultat -> la boucle While parcourt le tableau ligne par ligne et s'arrête lorsque $post == NULL (la fin du tableau associatif) 
                    puis on split la string $post['taglist'] en un tableau $tagsArray
                    -->

                    <!-- la boucle While modifie le DOM de manière dynamique :  
                    on injecte la date de création du post, son auteur, son contenu, le nombre de likes et les tags
                    du premier élément du tableau associatif, puis du second... jusqu'au dernier
                    -->
                    <article>
                        <h3>
                            <time><?php echo $post['created'] ?></time>
                        </h3>
                        <address>par <a href="wall.php?user_id=<?php echo $post['user_id']; ?>"><?php echo $post['author_name'] ?></a></address>
                        <div>
                            <p><?php echo $post['content'] ?></p>
                        </div>
                        <footer>
                            <small>♥ <?php echo $post['like_number'] ?></small>
                            <?php include('tagLinks.php') ?>
                        </footer>
                    </article>
                    <?php } ?>
            </main>
        </div>
    </body>
</html>
