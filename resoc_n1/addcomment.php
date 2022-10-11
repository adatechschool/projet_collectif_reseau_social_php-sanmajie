<?php
$enCoursDeTraitement = isset($_POST['new_post']);
$label_tags = $mysqli->query('SELECT * FROM socialnetwork.tags');

if ($enCoursDeTraitement)
{
    echo "<pre>" . print_r($_POST, 1) . "</pre>";
    $current_date = date('Y-m-d H:i:s');
    echo "<pre>" . print_r($current_date, 1) . "</pre>";
    
    $new_post = $_POST['new_post'];

    $new_post = $mysqli->real_escape_string($new_post);
    $lInstructionSql = "INSERT INTO socialnetwork.posts (id, user_id, content, created) "
            . "VALUES (NULL, "
            . "'" . $_SESSION['connected_id'] . "', "
            . "'" . $new_post . "', "
            . "'" . $current_date . "'"
            . ");";

    $ok = $mysqli->query($lInstructionSql);
    if ( ! $ok)
    {
        echo "La publication du message a échouée : " . $mysqli->error;
    } else
    {
        echo "<article> Message publié ! </article>";
        $new_post = NULL;
    }

    $last_post_id = intval($mysqli->insert_id);
    echo "<pre>" . print_r($last_post_id, 1) . "</pre>";

    $tags = $_POST['tag'];
    foreach($tags as $tag){
        $tag_id = $mysqli->query("SELECT * FROM socialnetwork.tags WHERE tags.label ='$tag'")->fetch_assoc()['id'];
        echo "<pre>" . print_r($tag_id, 1) . "</pre>";

        $ok_tags = $mysqli->query("INSERT INTO socialnetwork.posts_tags (id, post_id, tag_id) "
        . "VALUES (NULL, "
        . "'" . $last_post_id . "', "
        . "'" . $tag_id . "'"
        . ");" );

        if ( ! $ok_tags)
        {
            echo "L'ajout du ou des mots-clés a échoué : " . $mysqli->error;
        } else
        {
            echo "<article> Mots-clés ajoutés ! </article>";
        }
    }   
}
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
        </dl>
        <input type='submit' value='Publier sur mon mur'>
    </form> 
</article>  