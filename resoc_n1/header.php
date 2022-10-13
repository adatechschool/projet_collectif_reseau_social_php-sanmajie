<?php
include('dbconnect.php');
?>
<header>
    <nav id="menu">
        <a href='admin.php'>Admin</a>
        <!-- <img src="resoc.jpg" alt="Logo de notre réseau social"/> -->
        <a href="news.php">Actualités</a>
        <a href="wall.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Mon mur</a>
        <a href="feed.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Mon feed</a>
            <select name="choose-a-tag" onchange="location = this.value;">
                <option selected="yes">Choisissez un mot-clé</option>
                <?php 
                $label_tags = $mysqli->query('SELECT * FROM socialnetwork.tags');
                while ($tags = $label_tags->fetch_assoc()){ 
                    $tag = $tags['label']; 
                    ?>
                    <option value="tags.php?tag_label=<?php echo $tag ?>">#<?php echo $tag ?></option>
                <?php } ?>
            </select>
    </nav>
    <nav id="user">
        <a href="#">▾ Profil</a>
        <ul>
            <li><a href="settings.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Paramètres</a></li>
            <li><a href="followers.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Mes suiveurs</a></li>
            <li><a href="subscriptions.php?user_id=<?php echo $_SESSION['connected_id']; ?>">Mes abonnements</a></li>
            <li style="background-color:red;"><a href="logout.php"><span style="color:white;">Se déconnecter</span></a></li>
        </ul>
    </nav>
</header>

