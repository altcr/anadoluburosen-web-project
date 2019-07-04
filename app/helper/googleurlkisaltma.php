<?php
	function gkisalt($uzunadres)
	{

		$GoogleApiKey = 'AIzaSyANdjCAeG7a4SaufjXAnPHn2Cis0wm77gk';
        $curl = curl_init();
        $veri = array("longUrl" => $uzunadres);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.googleapis.com/urlshortener/v1/url?key=".$GoogleApiKey,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($veri),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json",
            ),
			CURLOPT_REFERER => url,
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        return json_decode($response)->id;
    
	}