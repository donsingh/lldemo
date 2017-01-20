var nodes = [];
var ctr = 0;
var c = 1;
$(document).ready(function(){

    $(".btn-primary").on("click", function(){
        $(".media").show();
    });

    $(".btn-success").on("click", function(){
        insertNode(ctr++);
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

function insertNode(step)
{
    switch(step){
        case 0:
            $(".subtitle").text("We are now going to insert a new node in the list!");
            $(".code-text").html("<span class='strong'>void insertNode(struct node **head)</span><br>{<br>");
            break;

        case 1:
            var obj = "<div class='wrapper' id='trav'><div class='ptr'></div><p>TRAV</p></div>";
            $(".subtitle").html("First We Create Variable <code>trav</code>");
            $(".code-text").children().removeClass("strong");
            $(".code-text").append("&nbsp;&nbsp;&nbsp;<span class='strong'>struct node *trav;</span>");
            $(".stage").prepend(obj);
            break;

        case 2:
            $("#trav").prepend("<div class='arrow2'></div>");
            $(".subtitle").html("<code>trav</code> will be given address of <code>head</code>");
            $(".code-text").children().removeClass("strong");
            $(".code-text").append("<br>&nbsp;&nbsp;&nbsp;<span class='strong'>trav = &head;</span>");
            $("#trav > .ptr").text("&head");
            break;

        case 3:
            $(".subtitle").html("Is <code>trav</code> pointing to an empty pointer?<br><small>Empty pointers signify the end of the list</small>");
            $(".code-text").children().removeClass("strong");
            $(".code-text").append("<br>&nbsp;&nbsp;&nbsp;<span class='strong'>while(*trav != NULL){}</span>");
            $("#trav > .ptr").text("&head");
            break;

        case 4:
            $(".subtitle").html("Now that we know <code>trav</code> is at the end of the list...");
            $(".code-text").children().removeClass("strong");
            break;

        case 5:
            $(".subtitle").html("Let's create a new node-type structure!");
            $(".code-text").append("<br>&nbsp;&nbsp;&nbsp;<span class='strong'>struct node *link = (struct node*) malloc(sizeof(struct node));</span>");
            insert(1);
            break;

        case 6:
            $(".subtitle").html("Let's assign that newly created structure to the last part of the list!");
            $("#head").children(".list").text("node1");
            connect();
            break;
    }

}

function insert(step)
{
    var obj = "<div class='node' id='node"+step+"'><p class='float:left; text-align:center'>0x0A1</p><div class='data'></div><div class='ptr next'></div></div>";
    $(".stage").append(obj);
}

function connect()
{
    $(".list").parent().append("<div class='arrow'></div>");
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
