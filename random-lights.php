#!/usr/bin/php
<?php

$i=1;
while (true)
{
	$a=1;
	while ($a < 4)
	{
			$json_url = 'http://192.168.10.181/api/e1271e594ea53336c212f2febc2ccdd6/lights/'.$a.'/state';
			$json_string = '{"transitiontime":30,"xy":['.(rand(1,900)/1000).','.(rand(1,900)/1000).'],"bri":'.rand(1,255).',"ct":'.rand(1,400).'}';                        
			$ch = curl_init( $json_url );
					
			// Configuring curl options
			$options = array(
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_CUSTOMREQUEST => 'PUT', // -X
							CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
							CURLOPT_POSTFIELDS => $json_string
							);


			// Setting curl options
			curl_setopt_array( $ch, $options );

			// Getting results
			$result =  curl_exec($ch);


			print $result."\n";
			$a++;
	}
	$i++;
	sleep(5);
}

?>