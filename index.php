<?php
// IF THE FORM IS SUBMITTED & FOUND THE REQUESTED FILE -
if(isset($_POST['submitUpload']) && isset($_FILES['targetFile'])){

    // THIS IS THE PATH OF THE FOLDER WHERE THE UPLOADED FILES WILL BE STORED.
    $upload_dir = './uploads/';

    /*
    Adding the name you want to save the file to the server

    in the following, adding the original name of the file.
    './uploads/CURRENT_FILE_NAME'

    EXAMPLE - './uploads/my-image.png'
    */
    $targetFile = $upload_dir.$_FILES['targetFile']['name'];


    /*
     When a request is sent to a server to upload files,
     first, the file or files are uploaded to the server temporary folder
     and after successfully uploading or canceling upload,
     the uploaded files will be automatically removed from the temporary folder.

     The following $tmpName is the path of the temporary file.
    */
    $tmpName = $_FILES["targetFile"]["tmp_name"];

    // UPLOADING THE FILE -
    $is_uploaded = move_uploaded_file($tmpName, $targetFile);

    // CHECKING WHETHER THE FILE HAS BEEN UPLOADED OR NOT
    if($is_uploaded){
        echo "The file uploaded successfully";
    }
    else{
        echo "The file not uploaded.";
    }

    //It will stop the execution of the following code.
    exit;

}
?>
<!DOCTYPE html>
<html>
<body>

<form action="./index.php" method="POST" enctype="multipart/form-data">
    <label for="myFile"><b>Select file to upload:</b></label><br>
    <input type="file" name="targetFile" id="myFile">
    <input type="submit" name="submitUpload" value="Upload">
</form>

</body>
</html>