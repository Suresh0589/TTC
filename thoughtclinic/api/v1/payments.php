<?php 
$app->get('/payments/:did/:ctype/:slot', function($did,$ctype,$slot) use ($app) {
	$response = array();
	$db = new DbHandler();
	$session = $db->getSession();
	if(isset($session['uid']) && $session['uid']>0 && isset($session['utype']) && $session['utype']=='patient' ){
		   $vendor = $db->getOneRecord("select * from doctors where doc_id='$did'");
		   $user = $db->getOneRecord("select * from customers_auth where uid='".$session['uid']."'");
			if ($user!=  NULL && $vendor != NULL) {
				$fee=0;
				$consulting_type='';
				if($ctype=='messaging'){
					$fee = $vendor['msg_con'];
					$consulting_type='MESSAGING';
				}else if($ctype=='Text'){
					$fee = $vendor['text_con'];
					$consulting_type='TEXT';
				}else if($ctype=='Video'){
					$fee = $vendor['video_con'];
					$consulting_type='VIDEO';
				}else if($ctype=='Phone'){
					$fee = $vendor['phone_con'];
					$consulting_type='PHONE';
				}	
				$doc_email = $vendor['doc_email'];
				$doc_name = $vendor['doc_name'];
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $db->payment_url.'payment-requests/');
				curl_setopt($ch, CURLOPT_HEADER, FALSE);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
				curl_setopt($ch, CURLOPT_HTTPHEADER,
							array("X-Api-Key:$db->API_KEY",
								  "X-Auth-Token:$db->API_TOKEN"));
				$purpose = $did.'-'.$ctype;				  
				$payload = Array(
					'purpose' => $purpose,
					'amount' => $fee,
					'phone' => $user['phone'],
					'buyer_name' =>$user['name'],
					'redirect_url' => $db->site_url.'response/',
					'send_email' => true,
					'webhook' => $db->webhook_url,
					'send_sms' => true,
					'email' => $user['email'],
					'allow_repeated_payments' => false
				);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
				$chresponse = curl_exec($ch);
				curl_close($ch); 

				$chresponse = json_decode($chresponse);	
				if($chresponse->success){
					$pd = $chresponse->payment_request;
					$query = "Insert into payments (uid,doc_id,payment_request_id,longurl,pay_requested,amount,consulting_type,slot_id) values(".$session['uid'].",$did,'$pd->id','$pd->longurl','".date('Y-m-d H:i:s')."','$fee','$consulting_type','$slot')";
					$db->insertByQuery($query);
					$response['status'] = "success";
					$response['url'] = $pd->longurl;
					$response['message'] = 'Payment Requested successfully';
					echoResponse(200, $response);
				}else{
					$response['status'] = "error";
					$response['message'] = 'Payment Request Failed Please Try again';	
					echoResponse(201, $response);
				}			   
			}else {
				$response['status'] = "error";
				$response['message'] = 'Invalid Requests';
				echoResponse(201, $response);
			}      
	}else{
		$response["status"] = "error";
		$response["message"] = "You dont have right to access.";
		echoResponse(201, $response);
	} 	
});

$app->get('/response/details/:payment_request_id/:payment_id', function($payment_request_id,$payment_id) use ($app) {
	
	$response = array();
	$db = new DbHandler();
	$session = $db->getSession();
	if(isset($session['uid']) && $session['uid']>0 && isset($session['utype']) && $session['utype']=='patient' ){
		
		   $pr = $db->getOneRecord("select * from payments where payment_request_id='$payment_request_id'");
		   
			if ($pr != NULL) {
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL, $db->payment_url."payment-requests/$payment_request_id/$payment_id/");
				curl_setopt($ch, CURLOPT_HEADER, FALSE);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
				curl_setopt($ch, CURLOPT_HTTPHEADER,
							array("X-Api-Key:$db->API_KEY",
								  "X-Auth-Token:$db->API_TOKEN"));
				
				$chresponse = curl_exec($ch);
				curl_close($ch); 
				$chresponse = json_decode($chresponse);
				
				if($chresponse->success){
					$pd = $chresponse->payment_request;
					if($pd->id==$payment_request_id && $payment_id == $pd->payment->payment_id){
						$query = "update payments set payment_id='".$pd->payment->payment_id."',payment_status='".$pd->payment->status."' where payment_request_id='".$pd->id."'";
						$db->updateRecord($query);
						$query = "update slots set status=1 where slot_id='".$$pr->slot_id."'";
						$db->updateRecord($query);
						$pr = $db->getOneRecord("select p.*,d.doc_name,d.doc_img,u.name,u.uimg from payments as p,doctors as d,customers_auth as u where p.payment_request_id='$payment_request_id' and d.doc_id=p.doc_id and u.uid=p.uid");
						$rows = array();
						array_push($rows, $pr);
						if($rows['0']['payment_status']=="Credit"){
							$rows['0']['payment_status']='Success';
						}
						if($rows['0']['uimg']==""){
							$rows['0']['uimg']='counsellor.jpg';
						}
						if($rows['0']['doc_img']==""){
							$rows['0']['doc_img']='counsellor.jpg';
						}
						$response['payment']=$rows;
						$response['status'] = "success";
						$response['message'] = 'Payment Done Successfully';
						echoResponse(200, $response);						
					}else{
						$response['status'] = "error";
						$response['message'] = 'Token mismatch please check in your payments history';	
						echoResponse(201, $response);	
					}
				}else{
					$response['status'] = "error";
					$response['message'] = 'Payment Request Failed Please Try again';	
					echoResponse(201, $response);
				}
						   
			}else {
				$response['status'] = "error";
				$response['message'] = 'Invalid Request';
				echoResponse(201, $response);
			}      
	}else{
		$response["status"] = "error";
		$response["message"] = "You dont have right to access.";
		echoResponse(201, $response);
	} 	
});


?>