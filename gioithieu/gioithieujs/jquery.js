$(document).ready(function(){
 	$('.next').click(function()
 	{
 		var list = $(this).parent().prev();
 		var last = list.find('li').last();
 		list.prepend(last);		
 	});

 	$('.prev').click(function()
 	{
 		var list = $(this).parent().prev();
 		var first = list.find('li').first();
 		list.append(first);	
 	});
 });