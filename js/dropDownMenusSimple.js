$(document).ready(function(){
    $(".droppDownMainContainer").hover(function(){
        
       $(".menuContainer").stop(true, true).slideDown('fast');
       $("a#dropDownTriggerProiect").css({"color" : "#69d6e6"});
    },function(){
       $(".menuContainer").slideUp('fast');
       $("a#dropDownTriggerProiect").css({"color" : "#666"});
    });
});


