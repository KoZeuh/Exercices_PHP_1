<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix d'un service</title>
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
                <center><h1>Choix d'un service</h1></center>
                <div class="content">
                    <form action="./employeService.php" method="post">
                        <label for="lst_service">Quel est ton service ? :</label><br>
                        <select id="lst_service" name="lst_service">
                            <?php 
                                $result = mysqli_query($db,"SELECT * FROM services ORDER BY DesiServ ASC");
                                $ligne;

                                while ($ligne = mysqli_fetch_assoc($result)){
                                    echo '<option value="'.$ligne['CodeServ'].'">'.$ligne['DesiServ'].'</option>';
                                }

                                echo '</select>';

                                mysqli_close($db);
                            ?>
                        <br><br><input type="submit" value="Selectionner">
                    </form>
                </div>
            </article>
        </div>
        <div class="footer">
            <p>© <a href="https://github.com/KoZeuh">Kozeuh</a></p>  
        </div>
    </div>
</body>
</html>