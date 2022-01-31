<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un service</title>
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
                <center><h1>Liste des services</h1></center>
                <div class="content">
                    <table>
                        <tr>
                            <td><b>Code</td>
                            <td><b>Désignation</td>
                        </tr>
                        <?php
                            $result = mysqli_query($db,"SELECT * FROM services ORDER BY DesiServ ASC");
                            $ligne;

                            while ($ligne = mysqli_fetch_assoc($result)){
                                echo '<tr>
                                    <td>'.$ligne['CodeServ'].'</td>
                                    <td>'.$ligne['DesiServ'].'</td>
                                </tr>';
                            }
                        ?>
                        </table><center><h1> Ajout d'un service </h1></center>

                    
                    <form action="ajoutService.php" method="post">
                        <label for="txt_code">Code : </label>
                        <input type="text" name="txt_code" required><br><br>

                        <label for="txt_design">Désignation : </label>
                        <input type="text" name="txt_design" required>

                        <br><br><input type="submit" value="Valider">
                    </form>

                    <?php
                        if (isset($_POST['txt_code']) && isset($_POST['txt_design'])){
                            $code = strtoupper($_POST['txt_code']);
                            $design = $_POST['txt_design'];

                            $array_carac_code = str_split($code);
                            $array_count = count($array_carac_code);
                            $startedAdd = 1;

                            if ($array_count >= 3){
                                for ($i = 0; $i <= $array_count-1; $i++){
                                    if (ord($array_carac_code[0]) == 83){
                                        if ($i > 0){
                                            if (ord($array_carac_code[$i]) >= 48 && ord($array_carac_code[$i]) <= 57){
                                            }else {
                                                $startedAdd = 0;
                                                echo '<p style="color:red">Les caractères après le "S" doivent être des chiffres !</p>';
                                                break;
                                            }
                                        }             
                                    }else {
                                        $startedAdd = 0;
                                        echo '<p style="color:red">Le premier caractère doit être un "S"</p>';
                                        break;
                                    }
                                }
                                
                                if ($startedAdd === 1){
                                    $requete = mysqli_query($db, "INSERT INTO services(CodeServ,DesiServ) VALUES ('". $code ."','". $design ."')");

                                    if ($requete){
                                        header("Location: ajoutService.php");
                                    }else {
                                        echo '<p style="color:red">Une erreur est survenu lors de l\'ajout ! </p>';
                                    }
    
                                }
                            }else {
                                echo '<p style="color:red">Le service ne possède pas assez de caractères !</p>';
                            }
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