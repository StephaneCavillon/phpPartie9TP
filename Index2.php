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


    $tab_month = array();

    for($i=0; $i<$first_day_of_selected_month-1; $i++){
        $tab_month [$i]=null;
    }

    $d = 1;
    for($i; $i<($nb_days_in_selected_month + $first_day_of_selected_month-1); $i++){
        $tab_month [$i]= $d;
        $d++;
    }

    for($j=$last_day_of_selected_month; $j <7 ; $j++){
        $tab_month [$i]= null;
        $i++;
    }

    var_dump($tab_month);
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
    <!-- CSS perso -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <title>PHP - partie 9 - TP - méthode tableau</title>
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
            for($i=-5; $i <= 5; $i++){
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
            <?php
                foreach($tab_month as $key => $value){
                    if($key % 7 == 0){
                        ?>
                            <tr>
                                <td><?=$value?></td>

                        <?php
                    } else if(($key + 1) % 7 == 0){
                        ?>
                                <td class="bg-grey"><?=$value?></td>
                            </tr>
                    
                        <?php
                    } else if (($key + 2 ) % 7 ==0){
                        ?>
                                <td class="bg-grey"><?=$value?></td>    
                        <?php
                    } else{
                        ?>
                                <td><?=$value?></td>
                        <?php
                    }
                }
            ?>
        </tbody>




    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/2.2.1/mdb.min.js"></script>
</body>
</html>