<?php 
$app->post('/booking/create', function() use ($app) {
    $response = array();
	$db = new DbHandler();
	$session = $db->getSession();
	if(isset($session['uid']) && $session['uid']>0 && isset($session['utype']) && $session['utype']=='patient' ){
		$r = json_decode($app->request->getBody());	
		
		verifyRequiredParams(array('date','slot','reason','name','email', 'mobile'),$r->booking);
		$r->booking->uid=$session['uid'];
		$r->booking->doc_id=$r->booking->did;
		$r->booking->cdate=$r->booking->date;
		$r->booking->slot_time=date('Y-m-d H:i:s');
		
		$tabble_name = "slots";
		$column_names = array('doc_id','uid','cdate','slot','reason','name','email', 'mobile','slot_time');
		$result = $db->insertIntoTable($r->booking, $column_names, $tabble_name);
		if ($result != NULL) {
			$response["slot_id"] = $result;
			$response["status"] = "success";
			$response["message"] = "Slot booked successfully";
			echoResponse(200, $response);
		} else {
			$response["status"] = "error";
			$response["message"] = "Failed to send message. Please try again";
			echoResponse(201, $response);
		}            
	}else{
		$response["status"] = "error";
		$response["message"] = "You dont have right to access.";
		echoResponse(201, $response);
	} 	
});

?>