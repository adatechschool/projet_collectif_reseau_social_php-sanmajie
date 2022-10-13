<?php
$is_following = false;
$clicked = false;
if(isset($_POST['followed_user_id']) AND isset($_POST['following_user_id'])){
    $current_followed = $_POST['followed_user_id'];
    $current_following = $_POST['following_user_id'];
    $verif_following = "SELECT * FROM followers WHERE followers.followed_user_id = '$current_followed' AND followers.following_user_id = '$current_following' ";
    $res = $mysqli->query($verif_following)->fetch_all();
    if($res == []){
        $followers_sql = "INSERT INTO socialnetwork.followers (id, followed_user_id, following_user_id) VALUES (NULL, '$current_followed', '$current_following');";
        $ok_new_follower = $mysqli->query($followers_sql);
        if($ok_new_follower){
            echo "<h4> Vous vous êtes abonné(e) avec succès à cette personne ! </h4>";
        } else {
            echo "L'ajout du suivi a échoué : " . $mysqli->error;
        }
    } else {
        $is_following = true;
    } ?>
<?php } ?>
<?php if($_SESSION['connected_id']!=$_GET['user_id']){ ?>
    <form action="wall.php?user_id=<?php echo $_GET['user_id'] ?>" method="post">
        <input type='hidden' name='followed_user_id' value="<?php echo $_GET['user_id'] ?>">
        <input type='hidden' name='following_user_id' value="<?php echo $_SESSION['connected_id'] ?>">   
        <input type='submit' value="S'abonner">
    </form>
<?php } ?>
<?php
if($is_following){
    echo "<h4> Vous êtes déjà abonné(e) à cette personne. </h4>";
    $verif_following = "SELECT * FROM followers WHERE followers.followed_user_id = '$current_followed' AND followers.following_user_id = '$current_following' ";
    $res = $mysqli->query($verif_following)->fetch_all();
    $follow_id = intval($res[0][0]);
    echo print_r($follow_id);?>
    <button onclick="<?php $clicked = true ?>">Se désabonner</button>
    <?php if($clicked){
        echo "coucou";
        $delete_follower_sql = "DELETE FROM socialnetwork.followers WHERE followers.id = '$follow_id' ;";
        $delete_follower = $mysqli->query($delete_follower_sql);
        if($delete_follower){
            echo "<h4> Vous vous êtes désabonné(e) avec succès de cette personne ! </h4>";
        } else {
            echo "Le désabonnement a échoué : " . $mysqli->error;
        } 
    } ?>
<?php } ?>
