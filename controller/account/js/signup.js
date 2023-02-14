function signup(){
    $.ajax({
        url: "../../controller/account/php/signup.php?type=100",
        type: "POST",
        data:  new FormData(document.getElementById("signup_form")),
        contentType: false,
        processData:false,
        cache: false,
        success: function(dataResult){
            console.log(dataResult);
            var res  = JSON.parse(dataResult)
            if(res.status_Code == 100){

            }
            
        }
    });




}