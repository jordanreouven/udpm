<?php 
    session_start();
    $NomUtilisateur=$_SESSION['Login'];
?>
<div class="page">
    <div class="header">
        <?php include("Include/MenuHeader.php");?>
    </div>
    <div class="Profil">
        <div class="contenu">
            <div class="Profile">
                <div id="PhotoArriere" style="background-image: url(utilisateur/jordy/Img/ImgProfile/Img_PhotoArriere.jpeg);">
                    <div id="PhotoDeProfile" style="background-image: url('utilisateur/<?php echo $NomUtilisateur;?>/Img/ImgProfile/Img_Profile.jpg');">
                    </div>
                </div>
            </div>
            <div class="ContenuProfile">
                <nav>
                    <ul style="top:30px;position: relative;" id="ListeMenu">
                        <li><a href="">Tout</a><div id="flechdroite"></div></li>
                        <li><a href="">Musiques</a><div id="flechdroite"></div></li>
                        <li><a href="">Playlist</a><div id="flechdroite"></div></li>
                    </ul>
                </nav> 
            </div>
        </div>
    </div>
</div> 