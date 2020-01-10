<?php
if(isset($_SESSION["logged_in"]) && $_SESSION["type"]=="user" && $_SESSION["rol"] == 2){
    $userID = $_SESSION["user_id"];
    $spital = $_SESSION["id_spital"];
}else{
    header('Location: ./dashboard?mesaj='.urlencode('Nu e utilizator'));
    exit();
}

// incarca fisa pe server

$ds = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads';   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3
    //
    $allowed = array('txt');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        http_response_code(400);
        echo 'Invalid file format. Please use .txt files';
        exit();
    }
    $targetPath = dirname( __FILE__ ) . $ds. 'public' .$ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6

    // 7. citesti continutul fisierului $targetFile
    $file = file_get_contents($targetFile);
    // 8. incluzi fisierul import.php unde ai codul de importat fisa medicala
    require_once('./import.php');
     
}
include("./header.php");
?>
<div class="container-fluid">
    <form action="./import_file" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data">
    </form>
</div>

<script src="./public/js/dropzone.js"></script>
<?php 
  include("./footer.php");
 ?>
