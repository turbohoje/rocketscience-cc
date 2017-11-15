<?php

#print "Received request on post $_POST[addr] \n";
#error_reporting(E_NONE);

$res = array_merge($_GET, $_POST);

$res[addr] = "944 w 96th pl, thornton, co, 80260, us";
print googleQuery($res['addr']);







function googleQuery($string){ 
	$string = str_replace (" ", "+", urlencode($string));
	#$details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false";
 	#$details_url = signUrl("http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false&", "AIzaSyDfq9Lzs1AYmvL7F9eVf71AOkx2H6OXRCs");
 	$details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false&key=AIzaSyD0zaOD3j4APjsi0SZ5QQPHkmETwKH5ODE";
	
   	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $details_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_PROXY, "proxy:80");
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
	
	$response = curl_exec($ch);
	$response_json = json_decode($response, true);
 
   // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
	if($response_json['status'] == 'OVER_QUERY_LIMIT'){
		print "OH SNAP!  over limit\n\n";
		return -1;
		#exit;
	}
	
	if($response_json['status'] != 'OK') {
		print "STATUS failed: $response[status]\n";
		print "URL: $details_url\n";
		print "response";
		print_r($response);
		print "responseJson";
		print_r($response_json);
		
		return null;
   }
 
	#print_r($response);
	$geometry = $response_json['results'][0]['geometry'];
 	$addr = $response_json['results'][0][formatted_address];
 	
	$lat = $geometry['location']['lat'];
	$lon = $geometry['location']['lng'];
 
    $array = array(
        'lat' => $geometry['location']['lat'],
        'lng' => $geometry['location']['lng'],
        'loc_type' => $geometry['location_type'],
    	'addr' => $addr
    );
 
    return $array; 
}


?>
