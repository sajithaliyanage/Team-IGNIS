<?php
include('../config/connect.php');
include('../controller/siteController.php');
$pdo = connect();

$applyLeaveID = $_POST['apply_leave_id'];
$uploadDate = date("d/m/Y");

try{
        if(!empty($_FILES["fileToUpload"]["name"]) && !empty($applyLeaveID)){

            mkdir('../uploads/medicalReport/' . $applyLeaveID . '/', 0777, true);
            $target_dir = "../uploads/medicalReport/". $applyLeaveID ."/";

            if(!empty($_FILES["fileToUpload"]["name"])){
                $target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    //            if (file_exists($target_file)) {
    //                header( 'Location:../seekerprofile.php?upload=danger' ) ;
    //                echo "Sorry, file already exists.";
    //                $uploadOk = 0;
    //            }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 3*1024*1024) {
                    header( 'Location:../view/site/medicalUpload.php?fileLarge' ) ;
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" && $imageFileType !="pdf" ) {
                    header( 'Location:../view/site/medicalUpload.php?fileType' ) ;
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    header( 'Location:../view/site/medicalUpload.php?uploadError' ) ;
                    // if everything is ok, try to upload fil
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

                        $sql="INSERT INTO medical_report(comp_id,apply_leave_id,uploaded_date,status) VALUES (:comp_id,:apply_leave_id,:uploaded_date,:status)";
                        $query =$pdo->prepare($sql);
                        $query->execute(array('comp_id'=>$empID ,'apply_leave_id'=>$applyLeaveID,'uploaded_date'=>$uploadDate,'status'=>"waiting"));

                        $medicalID = $pdo->lastInsertId();

                        $sql="UPDATE medical_report SET medical_report=:location WHERE med_id=:log";
                        $query =$pdo->prepare($sql);
                        $query->execute(array('location'=>$target_file,'log'=>$medicalID));

                        $sql="UPDATE apply_leave SET medical_status=:state WHERE apply_leave_id=:log";
                        $query =$pdo->prepare($sql);
                        $query->execute(array('state'=>"pending",'log'=>$applyLeaveID));

                        header( 'Location:../view/site/medicalUpload.php?success' ) ;
                    }
                }
            }
    }else{
            header( 'Location:../view/site/medicalUpload.php?fail' ) ;
        }

    }catch(PDOException $e){
        echo $e;
        //header("Location:../view/layouts/error.php");
}
