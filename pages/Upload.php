
<script type="text/javascript">
    function afficher(){
        if((document.getElementById('radio').checked==true) && (document.getElementById('radio').value="single")){
            document.getElementById('TrNomAlbum').style.display="none";
        }
        else{
            document.getElementById('TrNomAlbum').style.display="";
        }
    }
</script>
<div class="FormUpload" align=center hidden>
    <form enctype="multipart/form-data" action="" method="post" style="position:relative;z-index:4;"><br>
        <table style="width:100%; text-align:center;">
            <tr style="height:40px;">
                <td>Nom de la musique:</td><td><input type="text" name="Nom_Music" required></td>
            </tr>

            <tr  style="height:40px;">
                <td>  Artiste:</td><td><input type="text" name="Nom_Artist" required></td>
            </tr>

            <tr  style="height:40px;">
                <td> Featuring: </td><td><input type="text" name="Featuring"></td>
            </tr>

            <tr  style="height:40px;">
                <td> Single</td><td><input type="radio" id="radio" name="radio" value="single" onclick="afficher();"></td>
            </tr>

            <tr  style="height:40px;">
               <td>  Album </td><td><input type="radio" id="radio" name="radio" value="album" onclick="afficher();"></td>
            </tr>

            <tr  style="height:40px;display:none;" id="TrNomAlbum">
               <td>Nom de l'album</td><td><input type="text" name="NomAlbum" id="NomAlbum" ></td>
            </tr>

            <tr  style="height:40px;">
              <td> Image de l'album </td><td><input type="hidden" name="MAX_FILE_SIZE" value="100000000000" />  <input id="pic" name="files[]" type="file" /></td>
            </tr>

            <tr  style="height:40px;">
               <td>Musique </td><td><input type="hidden" name="MAX_FILE_SIZE" value="100000000000" />  <input name="files[]" type="file" required/></td>
            </tr>

            <tr  style="height:40px;">
              <td><input id="UploadMusic"type="submit" value="Envoyer ces fichiers" /></td>
            </tr>
        </table>
    </form>
</div>
            
<?php

    $NomMusic=htmlspecialchars(@$_POST['Nom_Music']);
    $NomArtist=htmlspecialchars(@$_POST['Nom_Artist']);
    $NomAlbum=htmlspecialchars(@$_POST['NomAlbum']);
    $Featuring=htmlspecialchars(@$_POST['Featuring']);
    $Radio=htmlspecialchars(@$_POST['radio']);
    $Radio=htmlspecialchars(@$_POST['radio']);
    $SingleName="";
    $NomPhoto="";
    $Envoie="";
    $DestinationMusic='utilisateur/'.$NomUtilisateur.'/Music/';
    $DestinationImg='utilisateur/'.$NomUtilisateur.'/Img/ImgMusic/';


    if($Radio=="single"){
        $NomAlbum=null;
        $SingleName=$NomMusic;
    }

    if(($NomMusic=="")or($NomArtist=="")){ $erreur=1;}

    

    if(!empty($_FILES)){
        foreach ($_FILES['files']['name'] as $f => $src) {
            $Extension = strtolower(substr($_FILES['files']['name'][$f],-4));
            
            if($Extension==".jpg")$Extension="jpg";
            if($Extension==".gif")$Extension="gif";
            if($Extension==".png")$Extension="png";
            
            if($Extension==".mp3")$Extension="mp3";
            if($Extension==".ogg")$Extension="ogg";
            if($Extension==".wav")$Extension="wav";
            
            $ExtensionAutoriserPhoto= array("jpeg","jpg","png");
            $ExtensionAutoriserMusic= array("mp3","ogg","flac","wav");
            if(in_array($Extension,$ExtensionAutoriserPhoto)){
                move_uploaded_file($_FILES['files']['tmp_name'][$f],$DestinationImg.$_FILES['files']['name'][$f]);
                $NomPhoto=$_FILES['files']['name'][$f];
                $Envoie="OK";
            }
            else if(in_array($Extension,$ExtensionAutoriserMusic)){
                move_uploaded_file($_FILES['files']['tmp_name'][$f],$DestinationMusic.$NomMusic.".".$Extension);
            }
            else{
                $erreur = "Votre fichier n'est pas une image ou une musique.";   
                $Envoie="";
            }
        }
    }
    
    if($Envoie=="OK"){
        /*------------------------------------------------ Insère dans la base de données la musique et ses informations ---------------------------------------------------------------------------*/
        $requete="INSERT INTO music(`NameOfMusic`,`Artist`,`Featuring`,`AlbumName`,`SingleName`,`NameOfPicture`) VALUES('$NomMusic','$NomArtist','$Featuring','$NomAlbum','$SingleName','$NomPhoto')";
        bdConnect($requete, 'insert');
        /*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
        /*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
        
        /*--------------------------------------------------------------------- Insère dans la base de données l'artist  ---------------------------------------------------------------------------*/
        $requete="INSERT INTO artist(`NameArtist`) VALUES('$NomArtist')";
        bdConnect($requete, 'insert');
        /*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
        /*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    }
?>

