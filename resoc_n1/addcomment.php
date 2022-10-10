<?php
$enCoursDeTraitement = isset($_POST['new_post']);
if ($enCoursDeTraitement)
{
    echo "<pre>" . print_r($_POST, 1) . "</pre>";
    $current_date = date('Y-m-d H:i:s');
    echo "<pre>" . print_r($current_date, 1) . "</pre>";
    
    $new_post = $_POST['new_post'];

    $new_post = $mysqli->real_escape_string($new_post);
    $lInstructionSql = "INSERT INTO posts (id, user_id, content, created) "
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
}
?>

<article>
    <form action="wall.php?user_id=<?php echo $_SESSION['connected_id']; ?>" method="post">
        <dl>
            <h4><dt><label for='new_post'>Écrire un nouveau message :</label></dt></h4>
            <dd><textarea style='width:100%; max-width:100%;' name='new_post'></textarea></dd>
        </dl>
        <input type='submit' value='Publier sur mon mur'>
    </form> 
</article>  