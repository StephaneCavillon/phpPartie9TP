<?php
    setlocale(LC_TIME, 'fra.UTF-8');
    if(!empty($_GET)){
        // récupération des variables
        $selected_month = (int)$_GET['month'];
        $selected_year = (int)$_GET['year'];

    } else{
        // renvoi le mois en chiffre sans le 0 initial
        $selected_month = date('n');
        // renvoi l'année en 4 chiffres
        $selected_year = date('Y');    
    }

    //récupération du nombre de jours du mois
    $nb_days_in_selected_month = cal_days_in_month(CAL_GREGORIAN, $selected_month, $selected_year);

    // récupération du premier jour du mois en chiffre pour le réutiliser ensuite potentiellement regarder mktime
    // strtotime est au format YY/mm/dd (format américain année/mois/jour)
    $first_day_of_selected_month = date('N', strtotime($selected_year.'/'. $selected_month .'/'. 1));

    // récupération du dernier jour du mois en chiffre pour case vide fin de tableau
    $last_day_of_selected_month = date('N', strtotime($selected_year.'/'. $selected_month .'/'. $nb_days_in_selected_month));

    //nombre de case vide au début du tableau
    $empty_start_cells = $first_day_of_selected_month - 1;

    //nmobre de case vide en fin de tableau
    $empty_end_cells = $last_day_of_selected_month + 1;

    $nb_cells_in_line = 1;

     
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/2.2.1/mdb.min.css" rel="stylesheet"/>
    <title>PHP - partie 9 - TP</title>
</head>
<body class="container">
    <!--création des champs de select-->
    <form action="" method="get" class="my-5">
        <label for="month">Mois :</label>
        <select name="month" id="month">
        <?php
            for($i=1; $i<=12; $i++){
                if($i == $selected_month){
        ?>
                    <option value="<?=$i?>" selected><?=strftime('%B', strtotime('2000/'. $i .'/1'));?></option>
        <?php
                } else{
        ?>

                    <option value="<?=$i?>"><?=strftime('%B', strtotime('2000/'. $i .'/1'));?></option>

        <?php
                }
            }

        ?>
        </select>
        <label for="year">Année :</label>
        <select name="year" id="year">
        <?php
            for($i=-10; $i <= 10; $i++){
                // La condition est vrai uniquement pour $i=0
                if($i + $selected_year == $selected_year){
        ?>
                    <option value="<?=$i + $selected_year?>" selected><?=$i + $selected_year?></option>
        <?php
                }else{
        ?>
                    <option value="<?=$i + $selected_year?>"><?=$i + $selected_year?></option>
        <?php        
                }
            }
        ?>
        </select>
        <button type="submit" class="btn btn-link" data-mdb-ripple-color="dark">Afficher</button>
    </form>


    <!-- Création du tableau de base -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
                <th>Samedi</th>
                <th>Dimanche</th>         
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php

            // Création des cases vides du calendrier
            for($i=0; $i < $empty_start_cells; $i++){
            ?>
                 <!-- on créé une cellule vide -->
                <td class="bg-secondary"></td>
            <?php 
                $nb_cells_in_line++;
            }
            // Fin création des cases vides
            
            // Début de création des cases du mois en cours
            for($days=1; $days <= $nb_days_in_selected_month; $days++){
                // ajout de la condition pour les retours à la ligne en fin de semaine
                if($nb_cells_in_line % 7 == 0){
            ?>
                    <td> <?= $days; ?> </td> 
                </tr>
                <tr>
            <?php
                    $nb_cells_in_line++;

                } else{
            ?>
                    <td><?= $days; ?></td>
            <?php
                    $nb_cells_in_line++;
                }                
            }
            // Fin de création des cases du mois en cours

            //début création des cases vides fin de mois
            for($empty_end_cells; $empty_end_cells <= 7; $empty_end_cells++){

            ?>
                <td class="bg-secondary"></td>
            <?php
            }
            //fin création des cases vides fin de mois
    
            ?>
            </tr>
        </tbody>
    </table>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/2.2.1/mdb.min.js"></script>
</body>
</html>