$(document).ready(function(){
    console.log("jquery is enable");
    $(document).on("click", ".butt_signup", function(){

        $.ajax({
            url: "/pages/register.html",
            success: function(html) {
                $(".login_area").html(html);
            },
            error: function(html) {
                console.log("error ajax");
            }
        });
    });
});