<?php
	session_start();
	echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
                  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Whiteboard</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>

<script>
	$(document).ready(function(e) {
		
		var available = false;
		$("#joinButton").click(function(e) {
			$("#createGroup").hide("slow");
			$("#joinGroup").toggle("slow");
			$("#groupName").focus();
        });
		$("#createButton").click(function(e) {
			$("#joinGroup").hide("slow");
            $("#createGroup").toggle("slow");
			$("#newGroup").focus();
        });
		
		$("#joinGroup").submit(function(e) {
            e.preventDefault();
			$.ajax({
				url: "include/check.php",
				type: "POST",
				data: "mode=0&group="+ $("#groupName").val()+"&password="+ $("#password").val(),
				success: function(data){
					if (data == "ok"){
						$("#joinGroup #error").text("Joined group successfully").addClass("green").removeClass("red").show("slow").delay(1000).hide("slow");	
						setTimeout( function () {window.location.href = "whiteboard.php";}, 1500);
					}else {
						$("#joinGroup #error").text("Wrong group name or password").addClass("red").removeClass("green").show("slow").delay(1000).hide("slow");
					}
				}
			});
        });
		
		
		$("#newGroup").keyup(function(e) {
			if (e.which == 13) return;
			if ($("#newGroup").val() == ""){
				$("#createGroup #error").hide("fast");	
				return;
			}
			$.ajax({
				type: "POST",
				url: "include/check.php",
				data: "mode=1&group="+ $("#newGroup").val(),
				success: function(data){
					if (data == "ok"){
						available = true;
						$("#createGroup #error").text("Name Available").addClass("green").removeClass("red").show("fast");	
					}else {
						available = false;
						$("#createGroup #error").text("Name not Available").addClass("red").removeClass("green").show("fast");
					}	
				}
			});
        });
		
		$("#createGroup").submit(function(e) {
            e.preventDefault();
			if (!available) return;
			if ($("#pass").val() != $("#passConf").val()){
				$("#createGroup #error").text("Passwords doesn't match").addClass("red").removeClass("green").show("fast").delay(2000).hide("fast");
				return;	
			}
			$.ajax({
				type: "POST",
				url: "include/check.php",
				data: "mode=2&group="+ $("#newGroup").val()+"&password="+ $("#pass").val(),
				success: function(data) {
					$("#createGroup #error").text("Created Successfully").addClass("green").removeClass("red").show("fast").delay(1000).hide("fast");
					setTimeout( function () {window.location.href = "whiteboard.php";}, 1500);					
				}
			});
        });
		
    });
</script>
</head>
<body>
	<div class="logo"></div>
    <hr />
	<div class="page">
    	<div class="text">
        	<span class="head">Share ideas together</span>
            <div class="body">
            	WhiteBoard offers free online collaboration tool for your team to brainstorm and share new ideas. Processing happens in real time, synchronizing all whiteboards of the team. WhiteBoard stays minimalistic, and keeps unnecessary features away. Great Ideas need only a marker and an eraser . 
            </div>
        </div>
        <div class="login">
        	<div class="signin">
            	Ready to go? 
                <div class="body"><a href="#"  id="joinButton" >join</a> a group or <a href="#" id="createButton">create</a> your own</div>
            </div>
            
        	<form method="post" id="joinGroup" action="#">
            	<li>
                    <input type="text" id="groupName" name="groupName" placeholder="Enter Group Name" required="required" autocomplete="off" maxlength="25"/>
                </li>
                <li>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required="required"  maxlength="25"/>
                </li>
               	<div id="error"></div>
                <li>
                	<input type="submit" value="Join" />
                </li>
            </form>
            
            <form method="post" id="createGroup" action="#">
            	<li>
                    <input type="text" id="newGroup" name="newGroup" placeholder="New Group Name" required="required"  maxlength="25" />
                </li>
                <li>
                    <input type="password" id="pass" name="pass" placeholder="Enter Password" required="required"  maxlength="25"/>
                </li>
                 <li>
                    <input type="password" id="passConf" name="passConf" placeholder="Re-enter Password" required="required"  maxlength="25"/>
                </li>
                <div id="error"></div>
                <li>
                	<input type="submit" value="Create"/>
                </li>
            </form>
        </div>
    </div>
    <hr />
</body>
</html>
