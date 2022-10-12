<?php
// vérifie que mon formulaire a été submit
$enCoursDeTraitement = isset($_POST['new_post']);

//stocke tous mes tags
$label_tags = $mysqli->query('SELECT * FROM socialnetwork.tags');

//EN COURS pour ajouter un nouveau mot-clé
// $label_tags_in_array = $label_tags->fetch_all();
// echo "<pre>" . print_r($label_tags_in_array, 1) . "</pre>";

//si le formulaire est submit, lance tout ce qui suit
if ($enCoursDeTraitement)
{
    $current_date = date('Y-m-d H:i:s');
    // echo "<pre>" . print_r($_POST, 1) . "</pre>";
    // echo "<pre>" . print_r($current_date, 1) . "</pre>";
    
    //le contenu du message créé
    $new_post = $_POST['new_post'];

    //évite les injections SQL
    $new_post = $mysqli->real_escape_string($new_post);

    //ajoute le nouveau post à la table posts dans la database
    $lInstructionSql = "INSERT INTO socialnetwork.posts (id, user_id, content, created) "
            . "VALUES (NULL, "
            . "'" . $_SESSION['connected_id'] . "', "
            . "'" . $new_post . "', "
            . "'" . $current_date . "'"
            . ");";

    //affiche un message si l'insertion en base de données a échoué
    $ok = $mysqli->query($lInstructionSql);
    if ( ! $ok)
    {
        echo "La publication du message a échouée : " . $mysqli->error;
    }

    //récupère l'id du post créé
    $last_post_id = intval($mysqli->insert_id);
    // echo "<pre>" . print_r($last_post_id, 1) . "</pre>";

    //stocke dans $tags tous les tags sélectionnés
    $tags = $_POST['tag'];
    foreach($tags as $tag){
        //récupère l'id de chaque tag sélectionné
        $tag_id = $mysqli->query("SELECT * FROM socialnetwork.tags WHERE tags.label ='$tag'")->fetch_assoc()['id'];
        // echo "<pre>" . print_r($tag_id, 1) . "</pre>";

        //ajoute le ou les nouveaux tags à la table posts_tags dans la database
        $ok_tags = $mysqli->query("INSERT INTO socialnetwork.posts_tags (id, post_id, tag_id) "
        . "VALUES (NULL, "
        . "'" . $last_post_id . "', "
        . "'" . $tag_id . "'"
        . ");" );

        //affiche un message si l'insertion en base de données a échoué
        if ( ! $ok_tags)
        {
            echo "L'ajout du ou des mots-clés a échoué : " . $mysqli->error;
        }
    }   

    //EN COURS pour ajouter un nouveau mot-clé
    // $new_tag = $_POST['new_tag'];
    // if(!in_array($new_tag, $label_tags->fetch_all())){
    //     echo "<pre>" . print_r($new_tag, 1) . "</pre>";
    // }
}
?>
<?php
if($_GET['user_id']==$_SESSION['connected_id']){
?>
    <article>
        <form action="wall.php?user_id=<?php echo $_SESSION['connected_id']; ?>" method="post">
            <dl>
                <h4><dt><label for='new_post'>Écrire un nouveau message :</label></dt></h4>
                <dd><textarea style='width:100%; max-width:100%;' name='new_post'></textarea></dd>
                <dt><h5><legend>Sélectionner un ou plusieurs mots-clés :</legend></h5></dt>
                <?php 
                $i=0;
                while ($tags = $label_tags->fetch_assoc())
                { 
                    $tag = $tags['label'];
                    ?>
                    <small><span><input type="checkbox" id="<?php echo $tag ?>" name="tag[]" value="<?php echo $tag ?>"><label for="tag">#<?php echo $tag ?></label></span></small>
                <?php } ?>
                <!-- <h5><dt><label for='new_tag'>...ou saisissez un nouveau mot-clé : </label><input name='new_tag'></input></dt></h5> -->
            </dl>
            <input type='submit' value='Publier sur mon mur'>
        </form> 
    </article>
<?php } ?>