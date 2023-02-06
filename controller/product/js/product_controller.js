function add_producttype_db() {
    var product_type_title=$('#product_type_title').val();
    var formData = new FormData(document.getElementById("new_productType_form"));
    formData.append('product_type_title', product_type_title);
    $.ajax({
        url: "../../controller/product/php/product_controller.php?type=100",
        type: "POST",
        data:  formData,
        contentType: false,
        processData:false,
        cache: false,
        success: function(dataResult){
            console.log(dataResult);
            document.getElementById("new_productType_form").reset();
        }
    });
}
function add_product_db() {
    var product_name=$('#product_name').val();
    var product_description=$('#product_description').val();
    var product_type=$('#product_type').val();
    var product_company=$('#product_company').val();
    var formData2 = new FormData(document.getElementById("new_product_form"));
    formData2.append('product_name', product_name);
    formData2.append('product_description', product_description);
    formData2.append('product_type', product_type);
    formData2.append('brand_id', product_company);
    $.ajax({
        url: "../../controller/product/php/product_controller.php?type=101",
        type: "POST",
        data:  formData2,
        contentType: false,
        processData:false,
        cache: false,
        success: function(dataResult){
            console.log(dataResult);
            document.getElementById("new_product_form").reset();
        }
    });
}