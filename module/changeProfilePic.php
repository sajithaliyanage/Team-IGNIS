<?php
include('../config/connect.php');
include('../controller/siteController.php');
$pdo = connect();

try{
    if(!empty($_FILES["fileToUpload"]["name"])){
//        make folder named employee id
        mkdir('../uploads/profilePicture/' . $empID . '/', 0777, true);
        $target_dir = "../uploads/profilePicture/". $empID ."/";

        if(!empty($_FILES["fileToUpload"]["name"])){
            $target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            if ($_FILES["fileToUpload"]["size"] > 3*1024*1024) {
                header( 'Location:../view/site/profile.php?fileLarge' ) ;
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                header( 'Location:../view/site/profile.php?fileType' ) ;
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                header( 'Location:../view/site/profile.php?uploadError' ) ;
                // if everything is ok, try to upload fil
            } else {
                $temp = explode(".", $_FILES["fileToUpload.3"]["name"]);
                $newfilename = "profile" . '.' . $imageFileType;
                $target_file = $target_dir.$newfilename;
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//                    update employee image column
                    $sql="UPDATE employee SET image=:target_file WHERE comp_id=:empID";
                    $query =$pdo->prepare($sql);
                    $query->execute(array('target_file'=>$target_file,'empID'=>$empID));

                    header( 'Location:../view/site/profile.php?success' ) ;
                }
            }
        }
    }else{
        header( 'Location:../view/site/profile.php?fail' ) ;
    }

}catch(PDOException $e){
    //echo $e;
    header("Location:../view/layouts/error.php");
}
