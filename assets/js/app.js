var address = [0, 8, 16, 24, 32, 40, 48];
var data = [5,15,25,35,50,65];
var ctr = 0;
var nodes = 0;
$(document).ready(function(){

	init();
	// for(var i=0;i<12;i++){
		// insertNode(ctr++);
	// }
	
	
    $(".btn-primary").on("click", function(){
        $(".media").show();
    });

    $(".btn-success").on("click", function(){
		if(nodes == 5 && ctr === 0){
			alert("Maximum size for this example is 5!");
		}else{
			insertNode(ctr++);
		}
    });
	
	$(".back").on("click", function(){
		init();
		var x = ctr - 1;
		ctr = 0;
		while(x-- > 0){
			insertNode(ctr++);
		}
	});

});

function insertNode(step)
{
    switch(step){
        case 0:
			$(".code-text").empty();
            $(".subtitle").text("We are now going to insert a new node in the list!");
			showCode("void insertNode(struct node **temp)<br>{");
            break;

        case 1:
            createPtr('temp');
            $(".subtitle").html("First We Create Variable <code>temp</code>");
            break;

        case 2:
            $("#trav").prepend("<div class='arrow2'></div>");
            $(".subtitle").html("<code>temp</code> will be given address of <code>head</code>");
            $("#temp > .var").text("0x1AA");
			$("#temp").append("<div class='arrow2'></div>");
            break;

        case 3:
            $(".subtitle").html("Is <code>temp</code> pointing to an empty pointer?<br><small>Empty pointers signify the end of the list</small>");
			showCode("<br>&nbsp;&nbsp;&nbsp;while(*temp != NULL){<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;temp = &(*temp)->next;<br>&nbsp;&nbsp;&nbsp;}");
			moveTemp();
            break;

        case 4:
            $(".subtitle").html("Now that we know <code>temp</code> is at the end of the list...");
            $(".code-text").children().removeClass("strong");
            break;

        case 5:
            $(".subtitle").html("Let's create a new node-type structure!");
			createNode(nodes);
			createPtr('newNode');
            $(".code-text").append("<br>&nbsp;&nbsp;&nbsp;<span class='strong'>struct node *newNode = (struct node*) malloc(sizeof(struct node));</span>");
            break;

        case 6:
            $(".subtitle").html("Give that new structure's data a value...");
            showCode("<br>&nbsp;&nbsp;&nbsp;newNode->data = "+data[nodes]+";");
            $("#node"+nodes).children(".data").children(".int").text(data[nodes]);
            break;
			
		case 7:
            $(".subtitle").html("Set this new struct's next to NULL (since it is the last!)");
            showCode("<br>&nbsp;&nbsp;&nbsp;newNode->next = NULL");
            $("#node"+nodes).children(".next").children(".var").text("NULL");
            break;
			
		case 8:
			$(".subtitle").html("Give the newly created structure's address to <code>head</code> using <code>temp</code>.");
            showCode("<br>&nbsp;&nbsp;&nbsp;*temp = newNode;");
			break;
			
		case 9:
			move();
			break;
		
		case 10:
			$(".subtitle").html("Done! Once we exit this function, the two dbl pointers will be free'd.");
			showCode("<br>}");
			$("#newNode").remove();
			$("#temp").remove();
			break;
		case 11: 
			ctr=0;
			break;
    }

}

function init()
{
	//Initialize the entire stage
	nodes=0;
	$(".code-text").html("");
	$(".subtitle").html("");
	var obj = "<div class='ptr' id='head'><div class='addr'>0x1AA</div><div class='var'></div><p>head</p></div>";
	$(".stage").html(obj);
}

function createNode(number)
{
	//Creates a new node
	//@param1 is for the node count
	//This should be optimized to use with var nodes
	
	var obj = "<div class='node' id='node"+(number+1)+"'>";
	obj += "<span class='node_label'>0d0"+address[number].pad(2)+"</span>";
	obj += "<div class='data'><div class='int'></div><span>data</span></div>";
	obj += "<div class='ptr next'><div class='var'></div><p>next</p></div></div>";
	$(".stage").append(obj);
	nodes++;
}

function createPtr(type)
{
	var obj = "<div class='ptr' id='"+type+"'>";
	obj += "<div class='var'></div><p>"+type+"</p></div>";
	$(".stage").append(obj);
	
	//if the type of pointer is for a new node;
	//opposite of temp, start this under the newly created node
	if(type == "newNode"){
		$("#newNode").append("<div class='arrow2'></div>");
		$("#newNode").children(".var").text("0d0"+address[nodes-1].pad(2));
		var x = $(".node").last().offset().left + 60;
		$("#newNode").css("left",x);
	}
}

function showCode(codeLine)
{
	$(".code-text").children().removeClass("strong");
    $(".code-text").append("<span class='strong'>"+codeLine+"</span>");
}

function move()
{
	var x = $("#newNode").children(".var").offset().left + 5;
	var y = $("#newNode").children(".var").offset().top;
	var val = $("#newNode").children(".var").text();
	var obj = "<div class='var' style='position:absolute; left:"+x+"px; top:"+y+"px;' id='galaw'>"+val+"</div>";
	$(".stage").append(obj);
	if(nodes===1){
		x = $("#head").children(".var").offset().left + 5;
		y = $("#head").children(".var").offset().top;
	}else{
		x = $("#node"+(nodes-1)+" > .next").children(".var").offset().left + 5;
		y = $("#node"+(nodes-1)+" > .next").children(".var").offset().top;
	}
	$("#galaw").animate({
		"left": x,
		"top":y
	},2000, function(){
		$("#galaw").remove();
		if(nodes===1){
			$("#head").children(".var").text(val);
			$("#head").append("<div class='arrow'></div>");
		}else{
			$("#node"+(nodes-1)+" > .next").children(".var").text(val);
			$("#node"+(nodes-1)+" > .next").append("<div class='arrow'></div>");
		}
		
	});
}

function moveTemp()
{
	if(nodes === 0 ){
		return false;
	}
	var x = $(".node").last().children(".next").offset().left + 5;
	$("#temp").animate({
		"left": x
	},1000);
	var nn = address[nodes] - 2;
	$("#temp .var").text( "0d0" + nn.pad(2) );
	$("#temp").children(".arrow2").animate({
		"height" : "45px",
		"top" : "-95%"
	});
}

Number.prototype.pad = function(size) {
  var s = String(this);
  while (s.length < (size || 2)) {s = "0" + s;}
  return s;
};