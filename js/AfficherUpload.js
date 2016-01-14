function AfficherUpload(){
    $("#Upload").show(function(){
        $("#EffetFondNoir").css("background-color","rgba(0,0,0,0.4)").css("transition","background-color 0.7s");
        $(".FormUpload").fadeIn(700);
        $(".page").css("-webkit-filter","blur(5px)").css("transition","-webkit-filter 0.7s");
    });
}