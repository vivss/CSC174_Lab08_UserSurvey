$("#table-q1").hover(
   function(e){
   		var position = $("#table-q1").position();
   		var boxtop = position.top -40;
   		console.log(position);
   		console.log(boxtop);
      	$("#tip-q1").css({
      		display: 'inline-block',
       		left: position.left,
       		top: boxtop
       }).stop().show(100);
   },
   function(e){
       $("#tip-q1").css("display", "none");
});

$("#table-q2").hover(
   function(e){
   		var position = $("#table-q2").position();
   		var boxtop = position.top -40;
   		console.log(position);
   		console.log(boxtop);
      	$("#tip-q2").css({
      		display: 'inline-block',
       		left: position.left,
       		top: boxtop
       }).stop().show(100);
   },
   function(e){
       $("#tip-q2").css("display", "none");
});

$("#table-q3").hover(
   function(e){
   		var position = $("#table-q3").position();
   		var boxtop = position.top -40;
   		console.log(position);
   		console.log(boxtop);
      	$("#tip-q3").css({
      		display: 'inline-block',
       		left: position.left,
       		top: boxtop
       }).stop().show(100);
   },
   function(e){
       $("#tip-q3").css("display", "none");
});