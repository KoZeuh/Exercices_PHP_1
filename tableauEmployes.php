<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des employés</title>
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
                <center><h1>Liste des employés dans un tableau</h1></center>
                <div class="content">
                    <table>
                        <tr>
                            <td><b>Matricule</td>
                            <td><b>Nom</td>
                            <td><b>Prénom</td>
                        </tr>
                        <?php
                            $result = mysqli_query($db,"SELECT Matricule,PrenomEmpl,NomEmpl FROM employe");
                            $ligne;
                            $nbr = 0;

                            while ($ligne = mysqli_fetch_assoc($result)){
                                $nbr++;
                                echo '<tr>
                                        <td>'.$ligne['Matricule'].'</td>
                                        <td>'.$ligne['PrenomEmpl'].'</td>
                                        <td>'.$ligne['NomEmpl'].'</td>
                                    </tr>';
                            }

                            echo "</table><br>Total : $nbr employé(s)";

                            mysqli_close($db);
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