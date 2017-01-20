var nodes = [];
var ctr = 0;
var c = 1;
$(document).ready(function(){

    insert(ctr);
    insert(ctr);
    insert(ctr);
    insert(ctr);
    insert(ctr);

    $(".btn-primary").on("click", function(){
        move_trav(c++);
    });

    $(".stage").on("mouseenter", "div", function(){
        $(this).addClass("light");
    });

    $(".stage").on("mouseleave", "div", function(){
        $(this).removeClass("light");
    });

    $(".stage").on("click", ".node", function(){
          $(".step h2").text( $(this).attr("id") );
    });

    $(".stage").on("click", ".data", function(){
          $(".step h2").text( "DATA = "+ $(this).text() );
    });
});


function insert(step)
{
    var data;
    if(step === 0){
        $("#head").append("<div class='arrow'></div>");
    }else{
        data = 15;
        create_node(ctr,data);
    }
    ctr++;
}

function move_trav(step)
{
    var tarLeft = $("#node"+step).children(".ptr").offset().left;
    $("#trav").animate({
        "left" : tarLeft
    });
}

function create_node(count, data)
{
    if(count > 0){
        var test = $("#node"+(count-1)).children(".ptr").append("<div class='arrow'></div>");
    }
    var obj = "<div class='node' id='node"+count+"'><div class='data'>"+data+"<span class='label'>data</span></div><div class='ptr next'></div></div>";
    // obj += "<div class='arrow'></div>";
    $(".stage").append(obj);
}
