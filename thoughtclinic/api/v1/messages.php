<?php 
$app->get('/messages/', function() {
    $response = array();
    $db = new DbHandler();
	$session = $db->getSession();
	$replies = "(select count(*) from replies as r where r.msg_id=m.message_id )";
	if(isset($session['uid']) && $session['uid']>0 && isset($session['utype']) && $session['utype']=='doctor' ){
		$did = $session['uid'];
		$messages = $db->getAllRecord("SELECT m.*,u.name as frm,$replies as replies FROM `messages` as m,customers_auth as u WHERE m.doc_id=$did and u.uid=m.uid");
		if ($messages != NULL) {
			$response['status'] = "success";
			$response['message'] = 'Records in successfully.';
			for($i=0;$i<count($messages);$i++){
				
				$messages[$i]['message_time']=date('j M,Y h:i',strtotime($messages[$i]['message_time']));
				
			}
			$response['messages'] = $messages;
			 
		}else {
				$response['status'] = "error";
				$response['message'] = 'No Messages to display';
		}
		echoResponse(200, $response);
		
	}else if(isset($session['uid']) && $session['uid']>0 && isset($session['utype']) && $session['utype']=='patient' ){
		$uid = $session['uid'];
		
		$messages = $db->getAllRecord("SELECT m.*,d.doc_name as frm,$replies as replies FROM `messages` as m,doctors as d WHERE m.uid=$uid and m.doc_id=d.doc_id");
		
		if ($messages != NULL) {
			$response['status'] = "success";
			$response['message'] = 'Records in successfully.';
			for($i=0;$i<count($messages);$i++){
				
				$messages[$i]['message_time']=date('j M,Y h:i',strtotime($messages[$i]['message_time']));
				
			}
			$response['messages'] = $messages;
			 
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

$app->get('/replies/:mid', function($mid) {
    $response = array();
    $db = new DbHandler();
	$session = $db->getSession();
	if(isset($session['uid']) && $session['uid']>0){
		$messages = $db->getAllRecord("select r.*,d.doc_name as name from replies as r, doctors as d where d.doc_id=r.mem_id and r.mem_type='DOC' and r.msg_id=$mid
		UNION
		select r.*,d.name as name from replies as r, customers_auth as d where d.uid=r.mem_id and r.mem_type='PAT' and r.msg_id=$mid
		
		order by reply_id desc");
		if ($messages != NULL) {
			$response['status'] = "success";
			$response['message'] = 'Records in successfully.';
			for($i=0;$i<count($messages);$i++){
				
				$messages[$i]['reply_time']=date('j M,Y h:i',strtotime($messages[$i]['reply_time']));
				
			}
			$response['replies'] = $messages;
			 
		}else {
				$response['status'] = "error";
				$response['message'] = 'No Replies to display';
		}
		echoResponse(200, $response);
		
	}else{
		$response["status"] = "error";
		$response["message"] = "You dont have right to access.";
		echoResponse(201, $response);
	}
});
$app->get('/messages/:mid', function($mid) {
    $response = array();
    $db = new DbHandler();
	$session = $db->getSession();
	if(isset($session['uid']) && $session['uid']>0){
		$message = $db->getOneRecord("select m.*,d.doc_img,d.doc_name as doctor,u.name as patient from messages as m,doctors as d, customers_auth as u where u.uid=m.uid and d.doc_id=m.doc_id and  m.message_id='$mid'");
		if ($message != NULL) {
			$response['status'] = "success";
			$response['message'] = 'Records in successfully.';
			
			$rows = array();
			array_push($rows, $message);
			
				$rows['0']['message_time']=date('j M,Y h:i',strtotime($rows['0']['message_time']));
			
			
			$response['message'] = $rows;
		   
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
$app->get('/doctors/limit/:num', function($num) {
    $response = array();
    $db = new DbHandler();
    $doctors = $db->getAllRecord("select * from doctors where doc_status='1' order by doc_id desc limit $num");
    if ($doctors != NULL) {
        $response['status'] = "success";
        $response['message'] = 'Records in successfully.';
		for($i=0;$i<count($doctors);$i++){
			if($doctors[$i]['doc_img']==""){
				$doctors[$i]['doc_img']='counsellor.jpg';
			}
		}
        $response['doctors'] = $doctors;
         
    }else {
            $response['status'] = "error";
            $response['message'] = 'No doctors to display';
	}
    echoResponse(200, $response);
});

$app->post('/messages/create/:did', function($did) use ($app) {
    $response = array();
	$db = new DbHandler();
	$session = $db->getSession();
	if(isset($session['uid']) && $session['uid']>0 && isset($session['utype']) && $session['utype']=='patient' ){
		$r = json_decode($app->request->getBody());	
		$r->message->doc_id=$did;
		$r->message->uid=$session['uid'];
		$r->message->message_time=date('Y-m-d H:i:s');
		verifyRequiredParams(array('doc_id','subject', 'txt'),$r->message);
		$tabble_name = "messages";
		$column_names = array('doc_id','uid','txt', 'subject','message_time');
		$result = $db->insertIntoTable($r->message, $column_names, $tabble_name);
		if ($result != NULL) {
			$response["status"] = "success";
			$response["message"] = "Message sent successfully";
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
$app->post('/messages/reply/:mid', function($mid) use ($app) {
    $response = array();
	$db = new DbHandler();
	$session = $db->getSession();
	if(isset($session['uid']) && $session['uid']>0){
		$message = $db->getOneRecord("select m.* from messages as m where  m.message_id='$mid'");
		if($message != NULL){
			$r = json_decode($app->request->getBody());			
			
			if($session['utype']=='doctor'){
				$r->msgrply->mem_type='DOC';		
			}else{
				$r->msgrply->mem_type='PAT';		
			}
			$r->msgrply->mem_id=$session['uid'];
			$r->msgrply->msg_id=$mid;
			$r->msgrply->reply_time=date('Y-m-d H:i:s');
			verifyRequiredParams(array('txt'),$r->msgrply);
			$tabble_name = "replies";
			$column_names = array('mem_id','msg_id','txt','mem_type','reply_time');
			$result = $db->insertIntoTable($r->msgrply, $column_names, $tabble_name);
			if ($result != NULL) {
				$response["status"] = "success";
				$response["message"] = "Reply sent successfully";
				echoResponse(200, $response);
			} else {
				$response["status"] = "error";
				$response["message"] = "Failed to send message. Please try again";
				echoResponse(201, $response);
			}            			
		}else{
			$response["status"] = "error";
			$response["message"] = "No message found, Invalid Request";
			echoResponse(201, $response);
		}
	}else{
		$response["status"] = "error";
		$response["message"] = "You dont have right to access.";
		echoResponse(201, $response);
	} 	
});
$app->post('/doctors/update/:did', function($did) use ($app) {
    $response = array();
    $db = new DbHandler();
	$session = $db->getSession();
	if(isset($session['uid']) && $session['uid']==$did && isset($session['utype']) && $session['utype']=='doctor' ){
		$query='';
		/*print_r($_POST);*/
		$profile = $_POST['profile'];	
		$doc_qua = implode(',',$profile['doc_qua']);
		$doc_lang = implode(',',$profile['doc_lang']);
		$doc_cat = implode(',',$profile['doc_cat']);
		$query ="update doctors set ";
		$query.="doc_name='".addslashes($profile['doc_name'])."',";
		$query.="doc_spe='".addslashes($profile['doc_spe'])."',";
		$query.="doc_qua='$doc_qua',";
		$query.="doc_lang='$doc_lang',";
		$query.="doc_cat='$doc_cat',";
		$query.="doc_exp='".addslashes($profile['doc_exp'])."',";
		$query.="doc_mobile='".addslashes($profile['doc_mobile'])."',";
		$query.="doc_add='".addslashes($profile['doc_add'])."',";
		$query.="doc_abt='".addslashes($profile['doc_abt'])."',";
		if(isset($_FILES['file']) && $_FILES['file']['name']!=""){
			$fileinfo = pathinfo($_FILES['file']['name']);
			$doc_img = time().'.'.$fileinfo['extension'];
			move_uploaded_file($_FILES['file']['tmp_name'],'../../admin/assets/doctors/'.$doc_img);
			$query.="doc_img='$doc_img',";
		}
		$query.="text_con='".addslashes($profile['text_con'])."',";
		$query.="msg_con='".addslashes($profile['msg_con'])."',";
		$query.="video_con='".addslashes($profile['video_con'])."',";
		$query.="phone_con='".addslashes($profile['phone_con'])."' ";
		$query.="where doc_id=$did";
		
		$result = $db->updateRecord($query);
		
		
		if ($result != NULL) {
			$response["status"] = "success";
			$response["message"] = "Profile Updated successfully";
			echoResponse(200, $response);
		} else {
			$response["status"] = "error";
			$response["message"] = "Failed to create vendor. Please try again";
			echoResponse(201, $response);
		}	
	}else{
		$response["status"] = "error";
		$response["message"] = "You dont have right to access.";
		echoResponse(201, $response);
	}                
});


?>