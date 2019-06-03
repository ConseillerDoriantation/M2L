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
<div id="wrapper">
	<div class="row justify-content-center">
		<div class="card col col-sm-10 col-md-6 col-lg-5" style="margin-top : 200px;">
			<!-- Card -->
			<div class="card-body">
				<h4 class="card-title mb-4">Vos ligne de frais</h4>
                    <!-- Formulaire -->

                            
                                    <?php  

                                        $query = "SELECT * FROM lignes_frais WHERE ADRESSE_MAIL = '".$_SESSION['connecte']."' ORDER BY ADRESSE_MAIL DESC LIMIT ".$premiereEntree.", ".$messagesParPage.""; 
                                        $result=$connexion->query($query);       
                                        
                                        while($row=$result->fetch())  
                                        { 
                                        ?>
                                     
                                            <input type="text" class="form-control" id="adherent" readonly="readonly" Value="<?php echo $row['DATEFRAIS'].' '.$row['TYPE_MOTIF'].' '.$row['KM'].' '.$row['COUT_PEAGE'].' '.$row['COUT_REPAS'].' '.$row['COUT_HEBERGEMENT'] ?>">
                                       
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
                 
                </div>
			</div><!-- Fin Card -->
		</div>
	</div>
</div> <!-- end wrapper -->
           
</body>
</html>
