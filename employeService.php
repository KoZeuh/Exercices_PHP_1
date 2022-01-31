<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employés par service</title>
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
                <?php 
                    if (isset($_POST['lst_service'])){
                        $service = $_POST['lst_service'];

                        $nameService = mysqli_query($db,"SELECT DesiServ FROM services WHERE CodeServ = '".$service."'");
                        $nameService = mysqli_fetch_row($nameService);

                        echo '<center><h1>Liste des employés du service '.$nameService[0].'</h1></center>';
                    }
                ?>
                <div class="content">
                    <table>
                        <tr>
                            <td><b>Matricule</td>
                            <td><b>Nom</td>
                            <td><b>Prénom</td>
                        </tr>
                        <?php 
                            if (isset($_POST['lst_service'])){
                                $service = $_POST['lst_service'];

                                $result = mysqli_query($db,"SELECT Matricule,PrenomEmpl,NomEmpl FROM employe WHERE ServEmpl = '". $service ."'");
                                $ligne;

                                while ($ligne = mysqli_fetch_assoc($result)){
                                    echo '<tr>
                                            <td>'.$ligne['Matricule'].'</td>
                                            <td>'.$ligne['PrenomEmpl'].'</td>
                                            <td>'.$ligne['NomEmpl'].'</td>
                                        </tr>';
                                }

                                mysqli_close($db);
                            }
                        ?>
                    </table>
                </div>
            </article>
        </div>
        <div class="footer">
            <p>© <a href="https://github.com/KoZeuh">Kozeuh</a></p> 
        </div>
    </div>
</body>
</html>