var nodes = [];
var ctr = 0;
$(document).ready(function(){
    $(".btn-primary").on("click", function(){
        insert(ctr);
    });
});


function insert(step)
{
    var data;
    switch(step){
        case 0:
              $("#head").append("<div class='arrow'></div>");
              ctr++;
              break;
        case 1:
              // var data = prompt("Insert what number?");
              data = 5;
              create_node(ctr,data);
              ctr++;
              break;
        case 2:
              data = 15;
              create_node(ctr,data);
              ctr++;
              break;
    }
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
