<?php
    
    if(!empty($_GET)){
        // récupération des variables
        $selectedmonth = (int)$_GET['month'];
        $selectedyear = (int)$_GET['year'];

    } else{
        // renvoi le mois en chiffre sans le 0 initial
        $selectedmonth = date('n');
        // renvoi l'année en 4 chiffres
        $selectedyear = date('Y');    
    }

    // Création des fonctions
    //récupération du nombre de jours du mois
    $nb_days_in_selectedmonth = cal_days_in_month(CAL_GREGORIAN, $selectedmonth, $selectedyear);

    // récupération du premier jour du mois en chiffre pour le réutiliser ensuite potentiellement regarder mktime
    // strtotime est au format YY/mm/dd (format américain année/mois/jour)
    $first_day_of_selectedmonth = date('N', strtotime($selectedyear.'/'. $selectedmonth .'/'. 1));

    // récupération du dernier jour du mois en chiffre pour case vide fin de tableau
    $last_day_of_selectedmonth = date('N', strtotime($selectedyear.'/'. $selectedmonth .'/'. $nb_days_in_selectedmonth));


    // création de case vide début calendrier
    function create_start_cells(
        $empty_cells=1;

        while($empty_cells < $first_day_of_selectedmonth){
            // on créé une cellule vide
            echo '<td class="bg-secondary"></td>';

            $empty_cells++;
        }
    )

    // création des cases du mois
    function create_calendar_cells(
        $days = 1;

        for($days; $days <= $nb_days_in_selectedmonth; $days++){
            // ajout de la condition pour les retours à la ligne en fin de semaine
            if(($empty_cells + $days) %7 ==0 || $days % 7 == 0 ){
                echo '<td>' . $days . '</td> </tr> <tr>';
            } else{
                echo '<td>' . $days . '</td>';
            }
        }
    )
    
    // création des case vide de fin de mois
    function create_end_cells(
        // je prend le numero de la semaine du dernier jours du mois +1
        $empty_cells = $last_day_of_selectedmonth + 1;

        while($empty_cells <= 7){
            echo '<td class="bg-secondary"></td>';

            $empty_cells++;
        }
    )
    
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
<body>
    <!--création des champs de select-->
    <form action="" method="get" class="my-5">
        <label for="month">Mois :</label>
        <select name="month" id="month">
            <option value="1">Janvier</option>
            <option value="2">Février</option>
            <option value="3">Mars</option>
            <option value="4">Avril</option>
            <option value="5">Mai</option>
            <option value="6">Juin</option>
            <option value="7">Juillet</option>
            <option value="8">Août</option>
            <option value="9">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>    
        </select>
        <label for="year">Année :</label>
        <select name="year" id="year">
            <option value=""></option>            
        </select>
        <!-- possibilité d'enlever le bouton en mettant un listener JS -->
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
            <?php
                if()

            ?>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>


    </table>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/2.2.1/mdb.min.js"></script>
</body>
</html>