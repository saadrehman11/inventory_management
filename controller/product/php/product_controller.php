<?php
include '../../../includes/dbconnection.php';
$type= $_REQUEST['type'];

// add product type
if($type=='100'){
    print_r($_POST);
    date_default_timezone_set('Asia/Karachi');
    $date_and_time = date("Y-m-d H:i:s");
    try{
        $stmt = $pconn->prepare("INSERT INTO product_type (product_type_title,created_on)
        VALUES (:product_type_title, :created_on)");
        
        $stmt->bindParam(':product_type_title', $product_type_title);
        $stmt->bindParam(':created_on', $date_and_time);
      
        // insert a row
        $product_type_title = mysqli_escape_string($con,$_POST['product_type_title']);
        if($stmt->execute()){
            echo json_encode(['Status_Code'=>100,'msg'=>'Success']);
        }
    }
    catch(PDOException $e) {
        echo json_encode(['Status_Code'=>200,'msg'=>$e->getMessage()]);
    }

}

// add product
if($type=='101'){
    $msg = "";
    date_default_timezone_set('Asia/Karachi');
    $date_and_time = date("Y-m-d H:i:s");
    $date_time_file_name = date("Y_m_d_h_i_s");
    if(!empty($_FILES['product_image']['name'])){
        $target_dir = "../../../assets/images/products/";
        $product_img_path = "assets/images/products/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
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
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], ($target_dir.$date_time_file_name.'.'.$imageFileType))) {
            $file_Status_Code = 100;
            $msg .=  "The file ". htmlspecialchars( basename( $_FILES["product_image"]["name"])). " has been uploaded.";
        } else {
            $msg .=  "Sorry, there was an error uploading your file.";
            $file_Status_Code = 200;
        }
        }
    }
    try{
        $stmt = $pconn->prepare("INSERT INTO product ( `product_img_path`,`product_name`, `product_description`, `product_type`, `brand_id`, `created_on`)
        VALUES (:product_img_path,:product_name, :product_description, :product_type, :brand_id, :created_on)");
        
        $stmt->bindParam(':product_img_path', $img_path);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':product_description', $product_description);
        $stmt->bindParam(':product_type', $product_type);
        $stmt->bindParam(':brand_id', $brand_id);
        $stmt->bindParam(':created_on', $date_and_time);
      
        // insert a row
        $img_path = $product_img_path.$date_time_file_name.'.'.$imageFileType;
        $product_name = mysqli_escape_string($con,$_POST['product_name']);
        $product_description = mysqli_escape_string($con,$_POST['product_description']);
        $product_type = mysqli_escape_string($con,$_POST['product_type']);
        $brand_id = mysqli_escape_string($con,$_POST['brand_id']);
        if($stmt->execute()){
            echo json_encode(['Status_Code'=>100,'msg'=>'Success','file_Status_Code'=>$file_Status_Code,'file_msg'=>$msg]);
        }
    }
    catch(PDOException $e) {
        echo json_encode(['Status_Code'=>200,'msg'=>$e->getMessage(),'file_Status_Code'=>$file_Status_Code,'file_msg'=>$msg]);
    }

}
?>