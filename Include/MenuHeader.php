<nav>   
    <ul>
        <li style="color:#b47f2a;font-size: 36pt;width: auto; float:left;">
            <a href="<?php 
            if(isset($_SESSION['Login'])) {
                echo "?page=Accueil";
            }else{
                echo "index.php";
            } ?>" 
            style="text-decoration:none;color:#b47f2a;position:relative;top:30px;left:10px;">
                UD&amp;PM
            </a>
        </li>
        <!--Permet de rajouter la barre recherche partout sauf sur la page index.-->
        <?php if(@$_GET['page']!=""){ ?>
        <li id="BarreDeRechercheInclu">
            
        </li>
        <?php } ?>
        
        <?php if(isset($_SESSION['Login'])){ ?>
        <li style="color:#b47f2a;font-size: 20pt;" id="User">
            <p align=center id="IdUser">
                <a style="position:relative;top:40px;">
                    <?php echo $NomUtilisateur; ?>
                </a>
            </p>
            <ul id="OptionUser">
                <a href="?page=Profil"><li>Profil</li></a>
                <a href="?page=Music"><li>Like</li></a>
                <a onclick="AfficherUpload();"><li>Upload</li></a>
                <a href="pages/Deconnexion.php"><li>Deconnexion</li></a>
            </ul>
        </li>
        
        <?php }else{ ?>
        <li style="color:#b47f2a;font-size: 20pt; right:30px; top: 30px; position:absolute;">
            <a href="index.php" style="text-decoration:none;color:#b47f2a">Accueil</a>
        </li>
        <?php } ?>
    </ul>
</nav>