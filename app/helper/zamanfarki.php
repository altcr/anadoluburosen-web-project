<?php

	function zamanf($tarih){
		$b = getdate();			
		$d = getdate($tarih);	

		if (($b['year']-$d['year']) > 0 )
			return ($b['year']-$d['year']) .' Yıl';
		elseif (($b['mon']-$d['mon']) > 0 )
			return ($b['mon']-$d['mon']) .' Ay';
		elseif (($b['mday']-$d['mday']) > 0 )
			return ($b['mday']-$d['mday']) .' Gün';
		elseif (($b['hours']-$d['hours']) > 0 )
			return ($b['hours']-$d['hours']) .' Saat';
		elseif (($b['minutes']-$d['minutes']) > 0 )
			return ($b['minutes']-$d['minutes']) .' Dakika';
		elseif (($b['seconds']-$d['seconds']) > 0 )
			return ($b['seconds']-$d['seconds']) .' Saniye';
	}

	
	