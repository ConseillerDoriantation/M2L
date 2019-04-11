<?php
include('header.php');
    $messagesParPage=7; //Nous allons afficher x messages par page.
     
    $reqSQL='SELECT COUNT(*) AS total FROM lignes_frais';   //Ecriture de la requete SQL
    $retour_total=$connexion->query($reqSQL);               //On récupére le contenu de la requête dans $retour_total
    $donnees_total=$retour_total->fetch();                  //On range $retour_total sous la forme d'un tableau.
    $total=$donnees_total['total'];                         //On récupère le total pour le placer dans la variable $total.
     
    //Nous allons maintenant compter le nombre de pages.
    $nombreDePages=ceil($total/$messagesParPage);
     
    if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
    {
         $pageActuelle=intval($_GET['page']);
     
         if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
         {
              $pageActuelle=$nombreDePages;
         }
    }
    else // Sinon
    {
         $pageActuelle=1; // La page actuelle est la n°1    
    }
     
    $premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire 

            
?>
        <!--Affiche les produits-->
        <br />   
        <h3 align="center" >Vos Frais</h3><br />  
        <?php  

            $query = 'SELECT * FROM lignes_frais  ORDER BY ADRESSE_MAIL DESC LIMIT '.$premiereEntree.', '.$messagesParPage.''; 
            $result=$connexion->query($query);        
?>

    <table class="srctable" align="center">   
        <tr class="srctr">
            <th class="thprod"  rowspan=2>Adresse Mail</th>
            <th class="thprod"  rowspan=2>Date</th>
            <th class="thprod"  rowspan=2>Type Motif</th>
            <th class="thprod"  rowspan=2>Trajet</th>
            <th class="thprod"  rowspan=2>KM</th>
            <th class="thprod"  colspan=3> Coût</th>
            
        </tr><br>

        <tr>
            <th>Péage</th>
            <th>Repas</th>
            <th>Hebergement</th>

        </tr>
    <?php
        while($row=$result->fetch())  
        {  
    ?>  
            <form method="post" action="<modifie_frais.php">  
                          
                <td class="tdprod"><strong><?php echo $row['ADRESSE_MAIL'] ?></strong></td>
                <td class="tdprod"><?php echo $row["DATEFRAIS"]; ?></td> 
                <td class="tdprod"><?php echo $row['TYPE_MOTIF']?></td>
                <td class="tdprod"><?php echo $row['TRAJET']?></td>
                <td class="tdprod"><?php echo $row['KM']?></td>
                <td class="tdprod"><?php echo $row['COUT_PEAGE']?></td>
                <td class="tdprod"><?php echo $row['COUT_REPAS']?></td>
                <td class="tdprod"><?php echo $row['COUT_HEBERGEMENT']?></td>

                <input type="hidden" name="hidden_mail" value="<?php echo $row["ADRESSE_MAIL"]; ?>" /> 

                <td><input type="submit" name="modifier" style="margin-top:5px;" class="btn_modifier" value="Modifier" /> </td> 
            </form>
        </tr>


    <?php  
        }

        //Permet l'utilisation des pages       
        echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
        for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
        {
            //On va faire notre condition
            if($i==$pageActuelle) //Si il s'agit de la page actuelle...
            {
                echo ' [ '.$i.' ] '; 
            } 
            else //Sinon...
            {
                echo ' <a href="produits.php?page='.$i.'">'.$i.'</a> ';
            }
        }
        echo '</p>';            
    ?>  
                   
