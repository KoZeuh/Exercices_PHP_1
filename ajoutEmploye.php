<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un employé</title>
    <link rel="stylesheet" href="CSS/style.css">

    <?php include 'bdd.php' ?>
</head>
<body>
    <div class="container">
        <div class="top">
            <ul>
                <a href="index.php" class="accueil">Accueil</a>
                <div class="employe">
                    <a href="#" class="elem_nav">Employés</a>
                    <div class="employe_dropdown">
                        <a href="listeEmployes.php">Liste</a>
                        <a href="tableauEmployes.php">Tableau</a>
                        <a href="services.php">Par service</a>
                    </div>
                </div>
                <div class="employe">
                    <a href="#" class="elem_nav" id="drop">Ajout</a>
                    <div class="employe_dropdown" id="employe_drop">
                        <a href="ajoutService.php">Service</a>
                        <a href="ajoutEmploye.php">Employe</a>
                    </div>
                </div>
                
            </ul>

        </div>
        <div class="body_container">
            <article>
                <center><h1>Ajout d'un employé</h1></center>
                <div class="content">
                    <form action="ajoutEmploye.php" method="post">
                        <label for="txt_matricule">Matricule : </label>
                        <input type="text" name="txt_matricule" required maxlength="4"><br><br>

                        <label for="txt_nom">Nom : </label>
                        <input type="text" name="txt_nom" required pattern="[A-Za-z]+" maxlength="25"><br><br>

                        <label for="txt_prenom">Prénom : </label>
                        <input type="text" name="txt_prenom" required pattern="[A-Za-z]+" maxlength="20"><br><br>

                        <label for="ch_cadre">Cadre : </label>
                        <input type="checkbox" name="ch_cadre"><br><br>

                        <label for="lst_service">Service :</label>
                        <select id="lst_service" name="lst_service" required>
                        <?php 
                            $result = mysqli_query($db,"SELECT * FROM services ORDER BY DesiServ ASC");
                            $ligne;

                            while ($ligne = mysqli_fetch_assoc($result)){
                            echo '<option value="'.$ligne['CodeServ'].'">'.$ligne['DesiServ'].'</option>';
                        }

                        echo '</select>';
                        mysqli_close($db);
                        ?>
                    <br><br><input type="submit" value="Ajouter">
                </form>

                    <?php
                    if (isset($_POST['txt_matricule']) && isset($_POST['txt_nom']) && isset($_POST['txt_prenom']) && isset($_POST['lst_service'])){
                        $matricule = $_POST['txt_matricule'];
                        $nom = $_POST['txt_nom'];
                        $prenom = $_POST['txt_prenom'];
                        $service = strtolower($_POST['lst_service']);
                        $cadre = isset($_POST['ch_cadre']) ? $_POST['ch_cadre'] : NULL;

                        if ($cadre == NULL){
                            $cadre = 'n';
                        }else {
                            $cadre = 'o';
                        }


                        $requete = mysqli_query($db, "INSERT INTO employe(Matricule,NomEmpl,PrenomEmpl,CodeCadre,ServEmpl) VALUES ('". $matricule ."','". $nom ."','". $prenom ."','". $cadre ."','". $service ."')");

                        if ($requete){
                            echo '<p style="color:green">L\'employé a bien été ajouté ! </p>';
                        }else {
                            echo '<p style="color:red">Une erreur est survenu lors de l\'ajout ! </p>';
                        }

                        mysqli_close($db);
                    }
                    ?>
                </div>
            </article>
        </div>
        <div class="footer">
           <p>© <a href="https://github.com/KoZeuh">Kozeuh</a></p> 
        </div>
    </div>
</body>
</html>