<?php 
include("Include/ConnexionBaseDeDonnees.php");
session_start();
if(isset($_SESSION['Login'])){
    $NomUtilisateur=$_SESSION['Login'];
}else{}
$Recherche=$_GET['item'];
?>
<div class="page">
        <div class="header">
            <?php include("Include/MenuHeader.php"); ?>
        </div>
        <div class="RechercheGeneral">
            <div class="contenu">
                <div class="TitreRecherche"><h1 style="color: #b47f2a;"><?php echo "Resultats de la recherche pour : ".$Recherche;?></h1></div>
                <div class="ResultatRecherche" align=center>
                <?php
                    $requete="SELECT * FROM `playlist`,`music`,`artist` WHERE 'NamePlaylist' LIKE '%$Recherche%' OR WHERE 'NameOfMusic' LIKE '%$Recherche%'";
                    $resultat=bdConnect($requete, 'select');
                    while ($ligne=$resultat->fetch()){
                        echo"<div style=' width:200px; height:50px; background-color: #b47f2a;float: left;' align=center>";
                        echo $ligne['NamePlaylist'];
                        echo"</div>";
                    }
                ?>
                </div>
            </div>
        </div>
</div> 