$(document).ready(function() {
	
//  flypaper Bob bee test animation:
		
	var canvas = document.getElementById('ctx');
	paper.setup(canvas);
	fly.init({width:610,height:377});
	fly.debug = true;
	
	paper.view.onFrame = function(event) {
		fly.eventCtrlr.publish("frame",event);
		paper.view.draw();
	};
	
	var myFly = new fly.BobBee(
		{	name:"my Green Bee",handle:[300,150,200,120],
			selectable:true,
			dragable: true,
		});
});


