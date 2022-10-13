<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>ReSoC - Inscription</title> 
        <meta name="author" content="Julien Falconnet">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <?php include('dbconnect.php'); ?>
        <div id="wrapper" >

            <aside>
                <h2>Présentation</h2>
                <p>Bienvenu sur notre réseau social.</p>
            </aside>
            <main>
                <article>
                    <h2>Inscription</h2>
                    <?php
                    /**
                     * TRAITEMENT DU FORMULAIRE
                     */
                    // Etape 1 : vérifier si on est en train d'afficher ou de traiter le formulaire
                    // si on recoit un champs email rempli il y a une chance que ce soit un traitement
                    $enCoursDeTraitement = isset($_POST['email'], $_POST['pseudo'], $_POST['motpasse']);
                    if ($enCoursDeTraitement)
                    {
                        // on ne fait ce qui suit que si un formulaire a été soumis.
                        // Etape 2: récupérer ce qu'il y a dans le formulaire 
                        //echo "<pre>" . print_r($_POST, 1) . "</pre>";
                        
                        $new_email = $_POST['email'];
                        $new_alias = $_POST['pseudo'];
                        $new_passwd = $_POST['motpasse'];
<<<<<<< HEAD
                        if($new_email=="" OR $new_alias=="" OR $new_passwd==""){
                            echo "<h4> Vous devez remplir tous les champs. </h4>";
                        } else {
                            //Etape 3 : Ouvrir une connexion avec la base de donnée.
                            include_once('dbconnect.php');
                            //Etape 4 : Petite sécurité
                            // pour éviter les injection sql : https://www.w3schools.com/sql/sql_injection.asp
                            $new_email = $mysqli->real_escape_string($new_email);
                            $new_alias = $mysqli->real_escape_string($new_alias);
                            $new_passwd = $mysqli->real_escape_string($new_passwd);
                            // on crypte le mot de passe pour éviter d'exposer notre utilisatrice en cas d'intrusion dans nos systèmes
                            $new_passwd = md5($new_passwd);
                            // NB: md5 est pédagogique mais n'est pas recommandée pour une vraies sécurité
                            //Etape 5 : construction de la requete
                            $lInstructionSql = "INSERT INTO users (id, email, password, alias) "
                                    . "VALUES (NULL, "
                                    . "'" . $new_email . "', "
                                    . "'" . $new_passwd . "', "
                                    . "'" . $new_alias . "'"
                                    . ");";
                            // Etape 6: exécution de la requete
                            $ok = $mysqli->query($lInstructionSql);
                            if ( ! $ok)
                            {
                                echo "L'inscription a échouée : " . $mysqli->error;
                            } else
                            {
                                echo "Votre inscription est un succès : " . $new_alias;
                                echo " <a href='login.php'>Connectez-vous.</a>";
                            }
=======

                        //Etape 4 : Petite sécurité
                        // pour éviter les injection sql : https://www.w3schools.com/sql/sql_injection.asp
                        $new_email = $mysqli->real_escape_string($new_email);
                        $new_alias = $mysqli->real_escape_string($new_alias);
                        $new_passwd = $mysqli->real_escape_string($new_passwd);
                        // on crypte le mot de passe pour éviter d'exposer notre utilisatrice en cas d'intrusion dans nos systèmes
                        $new_passwd = md5($new_passwd);
                        // NB: md5 est pédagogique mais n'est pas recommandée pour une vraies sécurité
                        //Etape 5 : construction de la requete
                        $lInstructionSql = "INSERT INTO users (id, email, password, alias) "
                                . "VALUES (NULL, "
                                . "'" . $new_email . "', "
                                . "'" . $new_passwd . "', "
                                . "'" . $new_alias . "'"
                                . ");";
                        // Etape 6: exécution de la requete
                        $ok = $mysqli->query($lInstructionSql);
                        if ( ! $ok){
                            echo "<strong><p style='color:red;'>L'inscription a échouée : " . $mysqli->error . ".</p></strong>";
                        } else {
                            echo "<strong><p style='color:green;'> Votre inscription est un succès : " . $new_alias . ".</p></strong>";
                            echo "<h4><a href='login.php'>👉 <u>Connectez-vous</u>.</a></h4>";
>>>>>>> master
                        }
                    }
                    ?>                     

                    <form action="registration.php" method="post">
                        <dl>
                            <dt><label for='pseudo'>Pseudo</label></dt>
                            <dd><input type='text'name='pseudo'></dd>
                            <dt><label for='email'>E-Mail</label></dt>
                            <dd><input type='email'name='email'></dd>
                            <dt><label for='motpasse'>Mot de passe</label></dt>
                            <dd><input type='password'name='motpasse'></dd>
                        </dl>
                        <input type='submit'>
                    </form>
                    <h4>Déjà inscrit(e) ? <u><a href='login.php'>Connectez-vous</a></u>.
                    </h4>
                </article>
            </main>
        </div>
    </body>
</html>
