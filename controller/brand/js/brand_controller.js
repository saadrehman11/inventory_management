function add_brand_db() {
    var brand_name=$('#brand_name').val();
    var brand_description=$('#brand_description').val();
    var formData = new FormData(document.getElementById("new_brand_form"));
    formData.append('brand_name', brand_name);
    formData.append('brand_description', brand_description);
    $.ajax({
        url: "../../controller/brand/php/brand_controller.php?type=100",
        type: "POST",
        data:  formData,
        contentType: false,
        processData:false,
        cache: false,
        success: function(dataResult){
            console.log(dataResult);
            document.getElementById("new_brand_form").reset();
        }
    });
}