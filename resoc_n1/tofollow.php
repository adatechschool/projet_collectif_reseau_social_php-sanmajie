<?php
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
        echo "<h4> Vous êtes déjà abonné(e) à cette personne. </h4>";
    }
}
?>
<?php if($_SESSION['connected_id']!=$_GET['user_id']){ ?>
    <form action="wall.php?user_id=<?php echo $_GET['user_id'] ?>" method="post">
        <input type='hidden' name='followed_user_id' value="<?php echo $_GET['user_id'] ?>">
        <input type='hidden' name='following_user_id' value="<?php echo $_SESSION['connected_id'] ?>">   
        <input type='submit' value="S'abonner">
    </form>
<?php } ?>
