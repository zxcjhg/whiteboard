<?php
	session_start();
	if (!isset($_SESSION["group"]))
		header("Location:index.php");
	$_SESSION["timestamp"] = "0";
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
                  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Whiteboard</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
	<div class="logo"> 
        <div class="signout"><a href="include/signout.php">Leave</a> (<?php echo $_SESSION["group"] ?>)</div>
        <div id="download" title="Download"></div>
   		<div id="clearAll" title="Clear"></div>
        <div id="eraser" title="Eraser"></div>
        <div id="insertText" title="Text"></div>
        <div id="marker"title="Marker"></div>
    </div>
    <hr />
    <div class="canvas">
      <canvas id="canvas1" width="1200" height="500"> </canvas>
    </div>
  	<hr />
    <textarea id="textarea" class="textarea" rows="1" cols="10"></textarea>
    
    
    
<script type="text/javascript" src="js/base64.js"></script>
<script type="text/javascript" src="js/canvas2image.js"></script>    
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>

<script>	
	
	function connect(){
		$.ajax( {
			url: "backend.php",
			type: "POST",
			success: function (data){
				var parsedData = JSON.parse(data);
				console.log(parsedData);
				if (!parsedData["none"]){
					
					handleResponse(parsedData);
				}
			},
			complete: setTimeout(function() { connect(); }, 2000),
		});
	}
	
	function handleResponse(data){
		
		for (var i = 0; i < data.length; i++){
			if (data[i]["lines"]){
				drawLine(data[i]["lines"]);	
			}else if (data[i]["eraser"]){
				drawEraser(data[i]["eraser"]);
			}else if (data[i]["text"]){
				drawText(data[i]["text"][0]["text"], data[i]["text"][0]["x"], data[i]["text"][0]["y"]);	
			}
		}
	}
	
	function sendDrawLine(lines)
	{
		$.ajax({				
			url: 'backend.php',
			type: 'POST',
			data: { lines : lines }
		});
	}
	
	function sendEraser(eraser)
	{
		$.ajax({				
			url: 'backend.php',
			type: 'POST',
			data: { eraser : eraser }
		});
	}
	
	function sendText(text, x, y){
		
		var array = new Array();
		array.push( { text : text, x : x, y : y});	
		$.ajax({				
			url: 'backend.php',
			type: 'POST',
			data: { text : array }
		});
	}
	
	var context;
	var lines = new Array();
	var eraser = new Array();
	var tool;
	
	function drawText(text, x, y){
		context.fillText(text, x, y);
	}
	
	function drawLine(data){
		
		context.strokeStyle = "Black";
		context.lineWidth = 1;  
		
		context.beginPath();
		context.arc(data[0]["x"], data[0]["y"], 1, 0, Math.PI*2, true); 
		context.closePath();
		context.fill();
		context.beginPath();
		context.moveTo(data[0]["x"], data[0]["y"]);
		for (var i = 1; i < data.length; i++){
			context.lineTo(data[i]["x"], data[i]["y"]);
			context.stroke();
			context.beginPath();
			context.moveTo(data[i]["x"], data[i]["y"]);			
		}		
		
		if (tool == "Eraser"){
			context.strokeStyle = "White";
			context.lineWidth = 10; 
		}
	}
	function drawEraser(data){
		
		context.strokeStyle = "White";
		context.lineWidth = 10;
		context.strokeRect(data[0]["x"], data[0]["y"], 1, 1);	
		context.beginPath();
		context.moveTo(data[0]["x"], data[0]["y"]);
		for (var i = 1; i < data.length; i++){
			context.lineTo(data[i]["x"], data[i]["y"]);
			context.stroke();
			context.beginPath();
			context.moveTo(data[i]["x"], data[i]["y"]);			
		}		
		if (tool == "Marker"){
			context.strokeStyle = "Black";
			context.lineWidth = 1; 
		}
	}
	
	$(document).ready(function(e) {
		var x, y;
		var clicked = false;
		tool = "Marker";
		var canvas = document.getElementById("canvas1");
		context = canvas.getContext("2d");
		context.font = "12px Verdana, Geneva, sans-serif";
		connect();
		$("#eraser").click(function(e) {
			tool = "Eraser";  
			$("#canvas1").css("cursor", "url(images/eraser_cursor.gif) 5 5, auto");  
			lines = new Array();
			context.strokeStyle = "White";
			context.lineWidth = 10; 	
			drawText();		
			setSelected("eraser");
		});
		
		$("#marker").click(function(e) {
			tool = "Marker"; 
			$("#canvas1").css("cursor", "url(images/marker_cursor.png) 0 19.9, auto");
			lines = new Array();
			context.strokeStyle = "Black";
			context.lineWidth = 1;  
			drawText();	
			setSelected("marker");
		});
		
		$("#insertText").click(function(e) {
			tool = "Text";
			$("#canvas1").css("cursor", "url(images/text_cursor.png), auto");
			drawText();  
			setSelected("insertText");            
		});
		
		function setSelected(text){
			$("#insertText").css("opacity", "0.6");
			$("#marker").css("opacity", "0.6");
			$("#eraser").css("opacity", "0.6");
			$("#"+text).css("opacity", "1");	
		}
		
		$("#clearAll").click(function(e) {
			e.preventDefault();
			context.clearRect(0, 0, canvas.width, canvas.height);
		});
		
		$("#download").click(function(e) {
            e.preventDefault();
			var temp = canvas.toDataURL();
    		Canvas2Image.saveAsPNG(canvas);
        });
		
		$("#canvas1").mousedown(function(e) {
			e.preventDefault();
			if (tool != "Text"){
				clicked = true;
				getCoor(e);
				if (tool == "Marker"){
					context.beginPath();
					context.arc(x, y, 1, 0, Math.PI*2, true); 
					context.closePath();
					context.fill();
				}else if (tool == "Eraser"){
					context.strokeRect(x, y, 1, 1);	
				}
				lines.push( { x : x, y : y } );
			}
		});
		
		$("#canvas1").mousemove(function(e) {
			e.preventDefault();
			if (clicked && tool != "Text"){
				context.beginPath();
				context.moveTo(x, y);
				getCoor(e);
				context.lineTo(x, y);
				context.stroke();
				lines.push( { x : x, y : y } );		
			}
		});
		$("#canvas1").mouseup(function(e) {
			e.preventDefault();
			if (tool == "Text"){
				if ($("#textarea").css("display") == "none"){
					$("#textarea").css("display", "block");
					$("#textarea").css("left", e.pageX);
					$("#textarea").css("top", e.pageY);
				}else {
					drawText();	
				}
				getCoor(e);
			}				
			
		});
		$("body").mouseup(function(e) {
			clicked = false;
			if (tool == "Marker"){
				sendDrawLine(lines);
				lines = new Array();
			}else if (tool == "Eraser"){
				sendEraser(lines);
				lines = new Array();	
			}
		});
		function getCoor(e){
			if (e.pageX || e.pageY) { 
				x = e.pageX;
				y = e.pageY;
			}
			else { 
				x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft; 
				y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop; 
			} 
			x -= canvas.offsetLeft;
			y -= canvas.offsetTop;
		}
		function drawText(){
			if ($("#textarea").css("display") != "none"){
				context.fillText($("#textarea").val(), x + 5, y + 17);
				sendText($("#textarea").val(), x + 5, y + 17);
				$("#textarea").val("");
				$("#textarea").css("display", "none");
			}
		}
		
	});
    </script>
</body>
</html>
