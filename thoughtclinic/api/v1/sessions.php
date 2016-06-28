<?php 
$app->get('/sessions/', function() {
    $response = array();
    $db = new DbHandler();
	$session = $db->getSession();
	
	if(isset($session['uid']) && $session['uid']>0 && isset($session['utype']) && $session['utype']=='doctor' ){
		$did = $session['uid'];
		$messages = $db->getAllRecord("SELECT m.*,u.name as frm  FROM `slots` as m,customers_auth as u WHERE m.doc_id=$did and u.uid=m.uid");
		if ($messages != NULL) {
			$response['status'] = "success";
			$response['message'] = 'Records in successfully.';
			for($i=0;$i<count($messages);$i++){
				
				$messages[$i]['slot_time']=date('j M,Y h:i',strtotime($messages[$i]['slot_time']));
				
			}
			$response['sessions'] = $messages;
			 
		}else {
				$response['status'] = "error";
				$response['message'] = 'No Messages to display';
		}
		echoResponse(200, $response);
		
	}else if(isset($session['uid']) && $session['uid']>0 && isset($session['utype']) && $session['utype']=='patient' ){
		$uid = $session['uid'];
		
		$messages = $db->getAllRecord("SELECT m.*,d.doc_name as frm  FROM `slots` as m,doctors as d WHERE m.uid=$uid and m.doc_id=d.doc_id");
		
		if ($messages != NULL) {
			$response['status'] = "success";
			$response['message'] = 'Records in successfully.';
			for($i=0;$i<count($messages);$i++){
				
				$messages[$i]['slot_time']=date('j M,Y h:i',strtotime($messages[$i]['slot_time']));
				
			}
			$response['sessions'] = $messages;
			 
		}else {
				$response['status'] = "error";
				$response['message'] = 'No Messages to display';
		}
		echoResponse(200, $response);
		
	}else{
		$response["status"] = "error";
		$response["message"] = "You dont have right to access.";
		echoResponse(201, $response);
	}
});

$app->get('/sessions/:mid', function($mid) {
    $response = array();
    $db = new DbHandler();
	$session = $db->getSession();
	if(isset($session['uid']) && $session['uid']>0){
		$message = $db->getOneRecord("select m.*,d.doc_img,d.doc_name as doctor,u.name as patient from slots as m,doctors as d, customers_auth as u where u.uid=m.uid and d.doc_id=m.doc_id and  m.slot_id='$mid'");
		if ($message != NULL) {
			$response['status'] = "success";
			$response['message'] = 'Records in successfully.';
			
			$rows = array();
			array_push($rows, $message);
			
				$rows['0']['slot_time']=date('j M,Y h:i',strtotime($rows['0']['slot_time']));
			
			
			$response['sessions'] = $rows;
		   
		}else {
				$response['status'] = "error";
				$response['message'] = 'No such message';
			}
		echoResponse(200, $response);
	}else{
		$response["status"] = "error";
		$response["message"] = "You dont have right to access.";
		echoResponse(201, $response);
	}	
});


?>