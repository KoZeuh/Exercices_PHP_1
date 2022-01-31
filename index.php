<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Exercices</title>
    <link rel="stylesheet" href="CSS/style.css">
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
                <center><h1>Réalisation d'un TP de 5 exercices en PHP</h1></center>
                <div class="content">

                </div>
            </article>
        </div>
        <div class="footer">
            <p>© <a href="https://github.com/KoZeuh">Kozeuh</a></p> 
        </div>
    </div>
</body>
</html>