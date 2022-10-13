<?php
include_once('session.php');
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>ReSoC - Les message par mot-clé</title> 
        <meta name="author" content="Julien Falconnet">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <?php include_once('header.php'); ?>
        <div id="wrapper">
            <?php $tagLabel = $_GET['tag_label']; ?>
            <aside>
                <?php
                $laQuestionEnSql = "SELECT * FROM tags WHERE label= '$tagLabel' ";
                $lesInformations = $mysqli->query($laQuestionEnSql);
                $tag = $lesInformations->fetch_assoc();
                ?>
                <img src="user.jpg" alt="Portrait de l'utilisatrice"/>
                <section>
                    <h3>Présentation</h3>
                    <p>Sur cette page vous trouverez les derniers messages comportant
                        le mot-clé <?php echo $tag['label'] ?>
                        (n° <?php echo $tag['id'] ?>)
                    </p>

                </section>
            </aside>
            <main>
                <?php include('addlike.php'); ?>
                <?php
                $currentTagId = $tag['id'];
                $laQuestionEnSql = "
                    SELECT posts.content,
                    posts.created,
                    posts.id as post_id,
<<<<<<< HEAD
                    users.id as user_id,
=======
                    users.id as user_id, 
>>>>>>> master
                    users.alias as author_name,  
                    count(likes.id) as like_number,  
                    GROUP_CONCAT(DISTINCT tags.label) AS taglist
                    FROM posts_tags as filter 
                    JOIN posts ON posts.id=filter.post_id
                    JOIN users ON users.id=posts.user_id
                    LEFT JOIN posts_tags ON posts.id = posts_tags.post_id  
                    LEFT JOIN tags       ON posts_tags.tag_id  = tags.id 
                    LEFT JOIN likes      ON likes.post_id  = posts.id 
                    WHERE filter.tag_id = '$currentTagId' 
                    GROUP BY posts.id
                    ORDER BY posts.created DESC  
                    ";
                $lesInformations = $mysqli->query($laQuestionEnSql);
                if ( ! $lesInformations)
                {
                    echo("Échec de la requete : " . $mysqli->error);
                }

                while ($post = $lesInformations->fetch_assoc())
                {
                    ?>                
                    <article>
                        <h3>
                            <time datetime='<?php echo $post['created'] ?>' ><?php echo $post['created'] ?></time>
                        </h3>
                        <address>par <a href="wall.php?user_id=<?php echo $post['user_id']; ?>"><?php echo $post['author_name'] ?></a></address>
                        <div>
                            <p><?php echo $post['content'] ?></p>
                        </div>                                            
                        <footer>
                            <small>
                                <form action="tags.php?tag_label=<?php echo $_GET['tag_label'] ?>" method="post">
                                    <input type='hidden' name='post_id' value="<?php echo $post['post_id'] ?>">   
                                    <input type='submit' value="♥ <?php echo $post['like_number'] ?>">
                                </form>
                            </small>
                            <?php include('tagLinks.php') ?>
                        </footer>
                    </article>
                <?php } ?>


            </main>
        </div>
    </body>
</html>