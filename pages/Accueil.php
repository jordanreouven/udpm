<?php

include("Include/ConnexionBaseDeDonnees.php");
session_start();
<<<<<<< HEAD
$NomUtilisateur=$_SESSION['Login'];

=======

if(isset($_SESSION['Login'])){
    $NomUtilisateur=$_SESSION['Login'];
}else{
    header("Location:index.php");  
}
>>>>>>> origin/master
?>
<div class="page">
    <div class="header">
        <?php include("Include/MenuHeader.php");?>
    </div>
    <div class="accueil">
        <div class="contenu">
<<<<<<< HEAD
            <div id="TopPlaylist" hidden>
=======
            <div id="TopPlaylist">
>>>>>>> origin/master
                <p>Top Playlist</p>
                <?php
                $requete="SELECT * FROM `playlist` ORDER BY `Like` DESC LIMIT 5 ";
                $resultat=bdConnect($requete, 'select');
                while ($ligne=$resultat->fetch()){
                    echo"<div style=' width:200px; height:150px; background-color:white; float:left;'align=center>";
                    echo $ligne['NamePlaylist'];
                    echo"</div>";
                 }
                ?>
            </div>
            <div id="TopMusique">
                <p>Top Musique</p>
                <?php
                $requete="SELECT * FROM `music` ORDER BY `Like` DESC LIMIT 5 ";
                $resultat=bdConnect($requete, 'select');
                while ($ligne=$resultat->fetch()){
                            echo"<div style=' width:200px; height:150px; float:left;'align=center>";
<<<<<<< HEAD
                            echo $ligne['Name'];
=======
                            echo $ligne['NameOfMusic'];
>>>>>>> origin/master
                            echo"</div>";
                        }
                ?>
            </div>
            <div id="TopArtiste">
                <p>Top Artiste</p>
                <?php
                $requete="SELECT * FROM `artist` ORDER BY `Like` DESC LIMIT 5 ";
                $resultat=bdConnect($requete, 'select');
                while ($ligne=$resultat->fetch()){
                    echo"<div style=' width:200px; height:150px; background-color:white; float:left;'align=center>";
                    echo $ligne['NameArtist'];
                    echo"</div>";
                }
                ?>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <div id="Upload" hidden>
        <div id="EffetFondNoir">
            <?php include("pages/Upload.php");?>
        </div>
=======
</div>
<div id="Upload" hidden>
    <div id="EffetFondNoir">
        <?php include("pages/Upload.php");?>
>>>>>>> origin/master
    </div>
</div>