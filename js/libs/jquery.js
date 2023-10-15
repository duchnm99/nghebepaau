$(document).ready(function(){
	alert("hello world");
	$("#para2").css("border","1px solid red")
	$("li").css("list-style","none")
	$("li").css("float","right")
	$(".container").css("background-color","blue")
		$(".doimau").bind("click",function()
		{
			$(".container").hide(4000);
			$(".container").show(4000);
			$(".container").show("normal");
			$(".container").css("background-color","red");
		});
		$(".chentext").bind("click",function()
		{
			//alert("Hello:  " + $("#test").val());
			//$("p.b").append("Hello:  " + ("#test").val())
			var value = $("#test").val();
			$(".hienthi p").text(value);
			
		});
	
});
