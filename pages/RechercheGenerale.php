<?php
include("Include/ConnexionBaseDeDonnees.php"); //Fonction de cnnexion à la base de données.
$Recherche=$_GET['item']; //Nom de la recherche.
$Type=$_GET['Type']; //Nom du type de recherche.
$i=0; //variable d'incrémentation pour calculer le nombre de div générées.
?>
<div class="page">
    <div class="header">
        <?php include("Include/MenuHeader.php");?>
    </div>
    <div class="RechercheGenerale">
        <div class="contenu">
            <h1 style="text-align: center; float: left; width: 100%;">Resultats pour la recherche "<?php echo $Recherche; ?>" pour les <?php echo $Type;?></h1>
            <div id="LigneHr"></div> <!--Ligne hr avec une couleur.-->
            <nav id="MenuRechercheGenerale">
                <ul>
                    <a href="?page=RechercheGenerale&item=<?php echo $Recherche?>&Type=musiques"><li>Musiques</li></a>
                    <a href="?page=RechercheGenerale&item=<?php echo $Recherche?>&Type=artistes"><li>Artistes</li></a>
                    <a href="?page=RechercheGenerale&item=<?php echo $Recherche?>&Type=playlistes"><li>Playlistes</li></a>
                </ul>
            </nav>
            <!--Va afficher tous les resultats pour une recherche particulière.-->
            <div id="ResultatsRechercheGenerale">
                <?php 
                if($Type=="musiques"){
                /*- Requête qui va permettre de recherche certain champ pour la musique -*/
                /*-----------------------------------------------------------------------*/
                    $requete="SELECT * 
                    FROM music 
                    WHERE NameOfMusic LIKE '%$Recherche%' 
                    OR Featuring LIKE '%$Recherche%' 
                    OR AlbumName LIKE '%$Recherche%'
                    OR SingleName LIKE '%$Recherche%'";
                /*-----------------------------------------------------------------------*/
                /*-----------------------------------------------------------------------*/
                    
                /*----------------- On inscrit le resultat dans une array ---------------*/
                /*-----------------------------------------------------------------------*/
                    $resultat=bdConnect($requete, 'select');
                /*-----------------------------------------------------------------------*/
                /*-----------------------------------------------------------------------*/
                    
                /*------- Boucle qui va afficher tous les reultats en format CSS --------*/
                /*-----------------------------------------------------------------------*/
                    while ($ligne=$resultat->fetch()){
                        $i++;
                        for($j=0;$j<20;$j++){ ?>
                        <div id="music" >
                        <?php
                        echo str_replace(
                            $Recherche,
                            '<b><u>'.$Recherche.'</u></b>',
                            $ligne['NameOfMusic']." ".$ligne['Featuring']." ".$ligne['AlbumName']." ".$ligne['SingleName']
                        );
                        echo"</div>";}
                    }
                /*-----------------------------------------------------------------------*/
                /*-----------------------------------------------------------------------*/
                } // Génère le code pour afficher tous les rsultats sortant de la table music.
                if($Type=="playlistes"){
                /*- Requête qui va permettre de recherche certain champ pour la musique -*/
                /*-----------------------------------------------------------------------*/
                    $requete="SELECT * 
                    FROM playlist 
                    WHERE NamePlaylist LIKE '%$Recherche%'";
                /*-----------------------------------------------------------------------*/
                /*-----------------------------------------------------------------------*/
                    
                /*----------------- On inscrit le resultat dans une array ---------------*/
                /*-----------------------------------------------------------------------*/
                    $resultat=bdConnect($requete, 'select');
                /*-----------------------------------------------------------------------*/
                /*-----------------------------------------------------------------------*/
                    
                /*------- Boucle qui va afficher tous les reultats en format CSS --------*/
                /*-----------------------------------------------------------------------*/
                    while ($ligne=$resultat->fetch()){
                        $i++; ?>
                        <div id="playlist" >
                        <?php
                        echo str_replace(
                            $Recherche,
                            '<b><u>'.$Recherche.'</u></b>',
                            $ligne['NameOfMusic']." ".$ligne['Featuring']." ".$ligne['AlbumName']." ".$ligne['SingleName']
                        );
                        echo"</div>";
                    }
                /*-----------------------------------------------------------------------*/
                /*-----------------------------------------------------------------------*/
                } // Génère le code pour afficher tous les rsultats sortant de la table playlist.
                if($Type=="artistes"){
                /*- Requête qui va permettre de recherche certain champ pour la musique -*/
                /*-----------------------------------------------------------------------*/
                    $requete="SELECT * 
                    FROM artist 
                    WHERE NameArtist LIKE '%$Recherche%";
                /*-----------------------------------------------------------------------*/
                /*-----------------------------------------------------------------------*/
                    
                /*----------------- On inscrit le resultat dans une array ---------------*/
                /*-----------------------------------------------------------------------*/
                    $resultat=bdConnect($requete, 'select');
                /*-----------------------------------------------------------------------*/
                /*-----------------------------------------------------------------------*/
                    
                /*------- Boucle qui va afficher tous les reultats en format CSS --------*/
                /*-----------------------------------------------------------------------*/
                    while ($ligne=$resultat->fetch()){
                        $i++; ?>
                        <div id="artist">
                        <?php
                        echo str_replace($Recherche,'<b><u>'.$Recherche.'</u></b>',$ligne['NameArtist']);
                        echo"</div>";
                    }
                /*-----------------------------------------------------------------------*/
                /*-----------------------------------------------------------------------*/
                } // Génère le code pour afficher tous les rsultats sortant de la table artist.
                ?>
            </div>
        </div>
    </div>
</div>