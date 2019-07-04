<?php 
	session_destroy();
		
	setcookie("admingiris", "", -1 , $admincookieurl);
	setcookie("adminsafe1", "", -1 , $admincookieurl);
	exit(header("Location:".aurl));