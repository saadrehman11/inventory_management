function login(){
    $.ajax({
        url: "../../controller/account/php/login.php?type=100",
        type: "POST",
        data:  new FormData(document.getElementById("login_form")),
        contentType: false,
        processData:false,
        cache: false,
        success: function(dataResult){
            console.log(dataResult);
            var res= JSON.parse(dataResult)
            if(res.status_Code == 100){
                // window.location = ( window.location.host)+"/"+"dashboard/dashboard.php";
            }else{
                $('#msg').html('<p class="bg-danger text-white">Invalid Email or Password</p>');
            }
            
        }
    });




}