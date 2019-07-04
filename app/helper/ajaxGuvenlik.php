<?php
	function ajax_encode($dir=null)
	{
		return encrypt($dir, md5("z1x2c3v4ŞifreAjax58+"));
	}
	
	function ajax_decode($dir=null)
	{
		return decrypt($dir, md5("z1x2c3v4ŞifreAjax58+"));
	}
	