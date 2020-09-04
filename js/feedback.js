$(document).ready(function(){
    $(".subm").click(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../application/core/mailValidate.php',
            data: $("#formNewMsg").serialize(),
            success: function(res){
                if (res){
                    $(".validResponse").html("");
                    $(".blockcentr").slideToggle("500");

                    if($("div").hasClass("blockall"))
                        $(".blockall").remove();
                    else
                        $(".tytoknoall").append('<div class="blockall"></div>');

                    setTimeout(function(){
                        $(".blockcentr").slideToggle("1000");

                        if($("div").hasClass("blockall"))
                            $(".blockall").remove();
                        else
                            $(".tytoknoall").append('<div class="blockall"></div>');
                    }, 2000);

                    $(".tytoknoall").click(function(){
                        $(".blockcentr").slideToggle("2000");
                    });


                    setTimeout(function(){
                        $("#formNewMsg").submit();
                    },2000);
                }
                else{
                    $(".validResponse").html("Введите корректный e-mail");
                }
            }
        });
    });
});