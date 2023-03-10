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
            // console.log(dataResult);
            document.getElementById("new_product_form").reset();
        }
    });
}

function show_brand_products(brand_id){
    $.ajax({
        url: "../../controller/product/php/product_controller.php?type=102",
        type: "POST",
        data:  {
            brand_id:brand_id,
        },
        success: function(dataResult){
            // console.log(dataResult);
            $('#products_div').html(dataResult);
        }
    });
}

function add_purchase_db(){
    var select_manufacturer = $('#select_manufacturer').val();
    var purchasing_product_id = $('#purchasing_product_id').val();
    var product_quantity = $('#product_quantity').val();
    var per_item_price = $('#per_item_price').val();
    if(select_manufacturer == '' || purchasing_product_id == '' || product_quantity == '' || per_item_price == '' ){
        alert('Please fill all fields');
    }else{
        $.ajax({
            url: "../../controller/product/php/product_controller.php?type=103",
            type: "POST",
            data:  new FormData(document.getElementById("product_purchase_form")),
            contentType: false,
            processData:false,
            cache: false,
            success: function(dataResult){
                console.log(dataResult);
                var resp = JSON.parse(dataResult);
                if(resp.Status_Code == 100){
                    alert(resp.msg);
                }
                document.getElementById("product_purchase_form").reset();
                $('#products_div').html('');
                $('#total_price').html('Grand Total: 0.00');
            }
        });
    }

}

function calculate_total_purchase(){
    var per_item_price = parseInt($('#per_item_price').val());
    var total_quantity = parseInt($('#product_quantity').val());
    
    if(per_item_price !='' && total_quantity !=''){
        $('#total_price').html("Grand Total: "+(per_item_price*total_quantity)+"/-");
    }
    

}


function payment_type_view(value){
    // console.log("value ",value);
    var per_item_price = parseInt($('#per_item_price').val());
    var total_quantity = parseInt($('#product_quantity').val());
    
    if (value == 'installment') {
        $('#total_price').hide();
        $.ajax({
            url: "../../controller/product/php/product_controller.php?type=104",
            type: "POST",
            data:  {
                sale_type:value,
                per_item_price:per_item_price,
                total_quantity:total_quantity,
            },
            async:false,
            success: function(dataResult){
                if(value == 'installment'){
                    $('#installment_plan_div').html(dataResult);
                }
            }
        });
    } 
    else if(value == 'cash'){
        $('#total_price').show();
        $('#installment_plan_div').html('');
    }
}


function add_sale_db(){
    var select_manufacturer = $('#select_manufacturer').val();
    var purchasing_product_id = $('#purchasing_product_id').val();
    var product_quantity = $('#product_quantity').val();
    var per_item_price = $('#per_item_price').val();
    if(select_manufacturer == '' || purchasing_product_id == '' || product_quantity == '' || per_item_price == '' ){
        alert('Please fill all fields');
    }else{
        $.ajax({
            url: "../../controller/product/php/product_controller.php?type=105",
            type: "POST",
            data:  new FormData(document.getElementById("product_sale_form")),
            contentType: false,
            processData:false,
            cache: false,
            success: function(dataResult){
                console.log(dataResult);
                var resp = JSON.parse(dataResult);
                alert(resp.msg);
                if (resp.Status_Code == 100) {
                    document.getElementById("product_sale_form").reset();
                    $('#products_div').html('');
                    $('#total_price').html('Grand Total: 0.00');
                    location.reload();
                }

            }
        });
    }
}

function load_all_installments(sale_id){
    $.ajax({
        url: "../../controller/product/php/product_controller.php?",
        type: "POST",
        data:  {
            sale_id:sale_id,
            type:106,
        },
        async:false,
        success: function(dataResult){
            $('#installment_modal_div').html(dataResult);
        }
    });
}

function update_status(installment_id,status){
    $.ajax({
        url: "../../controller/product/php/product_controller.php?",
        type: "POST",
        data:  {
            installment_id:installment_id,
            status:status,
            type:107,
        },
        async:false,
        success: function(dataResult){
            console.log(dataResult)
            if(status==1){
                $('#inst_status'+installment_id).html('<p class="text-success" >Paid</p>');
                $('#btn_div'+installment_id).html('<button class="btn btn-sm btn-danger" onclick="update_status('+installment_id+',0)">Mark UnPaid</button>');
            }else{
                $('#inst_status'+installment_id).html('<p class="text-danger" >UnPaid</p>');
                $('#btn_div'+installment_id).html('<button class="btn btn-sm btn-success" onclick="update_status('+installment_id+',1)">Mark Paid</button>');
            }
        }
    });
}