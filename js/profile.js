$(function(){
    $("#change").on("click",function(){
        $("#profile input").removeAttr("readonly").removeClass("readonly");
        $(this).hide();
        $("#update").show();
        $("#cancel").show();
    });        
    $("#cancel").on("click",function(){
        $("#profile input").attr("readonly","readonly").addClass("readonly");
        $(this).hide();
        $("#update").hide();
        $("#change").show();        
    });
});