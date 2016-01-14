<?php 
include("Include/ConnexionBaseDeDonnees.php");
session_start();
if(isset($_SESSION['Login'])){
    $NomUtilisateur=$_SESSION['Login'];
}else{}
$Recherche=$_GET['item'];
if(!isset(@$_GET['Type'])){
    $TypeDeRecherche="Playlist";
}else{
    $TypeDeRecherche=@$_GET['Type'];
}
?>
<div class="page">
        <div class="header">
            <?php include("Include/MenuHeader.php"); ?>
        </div>
        <div class="RechercheGeneral">
            <div class="contenu">
                <div class="TitreRecherche"><h1 style="color: #b47f2a;"><?php echo "Resultats de la recherche pour \"".$Recherche."\"";?></h1></div>
                <div class="ResultatRecherche">
                <section id="Menu">
                    <ul>
                        <a href="?page=RechercheGeneral&item=<?php echo $Recherche?>&Type=Music"><li id="liMusic">Musiques</li><div id="flechdroite1"></div></a>
                        <a href="?page=RechercheGeneral&item=<?php echo $Recherche?>&Type=Playlist"><li id="liPlaylist">Playlist</li><div id="flechdroite2"></div></a>
                        <a href="?page=RechercheGeneral&item=<?php echo $Recherche?>&Type=Artist"><li id="liArtist">Artist</li><div id="flechdroite3"></div></a>
                    </ul>
                </section>
                <section id="Resultat">
                <?php
                    $requete="
                    SELECT NameArtist FROM artist WHERE NameArtist LIKE  '%$Recherche%'
                    UNION
                    SELECT NamePlaylist FROM playlist WHERE NamePlaylist LIKE  '%$Recherche%'
                    UNION 
                    SELECT NameOfMusic FROM music WHERE NameOfMusic LIKE  '%$Recherche%'
                    UNION
                    SELECT AlbumName FROM music WHERE AlbumName LIKE  '%$Recherche%'
                    UNION
                    SELECT SingleName FROM music WHERE SingleName LIKE  '%$Recherche%'
                    UNION
                    SELECT Featuring FROM music WHERE Featuring LIKE  '%$Recherche%'";
                    $resultat=bdConnect($requete, 'select');
                    
                    if($TypeDeRecherche=="Playlist"){
                        while ($ligne=$resultat->fetch()){
                            echo"<div style=' width:200px; height:50px; background-color: #b47f2a;float: left;' align=center>";
                            echo $ligne['NameArtist'];
                            echo"</div>";
                        }
                    }
                ?>
                </section>
                </div>
            </div>
        </div>
</div> 