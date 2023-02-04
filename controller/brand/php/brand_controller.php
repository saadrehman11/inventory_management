<?php
include '../../../includes/dbconnection.php';
$type= $_REQUEST['type'];

if($type=='100'){
    print_r($_POST);
    date_default_timezone_set('Asia/Karachi');
    $date_and_time = date("Y-m-d H:i:s");
    try{
        $stmt = $pconn->prepare("INSERT INTO brand (brand_name, brand_description,created_on)
        VALUES (:brand_name, :brand_description, :created_on)");
        
        $stmt->bindParam(':brand_name', $brand_name);
        $stmt->bindParam(':brand_description', $brand_description);
        $stmt->bindParam(':created_on', $date_and_time);
      
        // insert a row
        $brand_name = mysqli_escape_string($con,$_POST['brand_name']);
        $brand_description =  mysqli_escape_string($con,$_POST['brand_description']);
        if($stmt->execute()){
            echo json_encode(['Status_Code'=>100,'msg'=>'Success']);
        }
    }
    catch(PDOException $e) {
        echo json_encode(['Status_Code'=>200,'msg'=>$e->getMessage()]);
    }

}
?>