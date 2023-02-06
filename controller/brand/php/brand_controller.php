<?php
include '../../../includes/dbconnection.php';
$type= $_REQUEST['type'];

if($type=='100'){
    $msg = "";
    date_default_timezone_set('Asia/Karachi');
    $date_and_time = date("Y-m-d H:i:s");
    $date_time_file_name = date("Y_m_d_h_i_s");
    if(!empty($_FILES['brand_image']['name'])){
        $target_dir = "../../../assets/images/brands/";
        $brand_img_path = "assets/images/brands/";
        $target_file = $target_dir . basename($_FILES["brand_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $msg =  "Sorry, your file was not uploaded.";
            $file_Status_Code = 200;
        } else {
        if (move_uploaded_file($_FILES["brand_image"]["tmp_name"], ($target_dir.$date_time_file_name.'.'.$imageFileType))) {
            $file_Status_Code = 100;
            $msg .=  "The file ". htmlspecialchars( basename( $_FILES["brand_image"]["name"])). " has been uploaded.";
        } else {
            $msg .=  "Sorry, there was an error uploading your file.";
            $file_Status_Code = 200;
        }
        }
    }
    try{
        $stmt = $pconn->prepare("INSERT INTO brand (brand_img_path,brand_name, brand_description,created_on)
        VALUES (:brand_img_path,:brand_name, :brand_description, :created_on)");
        
        $stmt->bindParam(':brand_img_path', $img_path);
        $stmt->bindParam(':brand_name', $brand_name);
        $stmt->bindParam(':brand_description', $brand_description);
        $stmt->bindParam(':created_on', $date_and_time);
      
        // insert a row
        $img_path = $brand_img_path.$date_time_file_name.'.'.$imageFileType;;
        $brand_name = mysqli_escape_string($con,$_POST['brand_name']);
        $brand_description =  mysqli_escape_string($con,$_POST['brand_description']);
        if($stmt->execute()){
            echo json_encode(['Status_Code'=>100,'msg'=>'Success','file_Status_Code'=>$file_Status_Code,'file_msg'=>$msg]);
        }
    }
    catch(PDOException $e) {
        echo json_encode(['Status_Code'=>200,'msg'=>$e->getMessage(),'file_Status_Code'=>$file_Status_Code,'file_msg'=>$msg]);
    }

}
?>