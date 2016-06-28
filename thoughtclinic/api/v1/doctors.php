<?php 
$app->get('/doctors/', function() {
    $response = array();
    $db = new DbHandler();
    $doctors = $db->getAllRecord("select * from doctors where doc_status='1' order by doc_id desc");
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
$app->get('/doctors/slots/:date', function($date) {
    $response = array();
    $db = new DbHandler();
	$session = $db->getSession();
	if(isset($session['uid']) && $session['uid']>0 && isset($session['utype']) && $session['utype']=='patient' ){
		if($date!=""){
			$date = explode('_',$date);
			$did = $date[0]; 
			$selected_day = strtolower(date('D',strtotime($date[1]))); 
			$doctors = $db->getAllRecord("select a.* from doctors as d,avaliability as a where d.doc_status='1' and d.doc_id=a.doc_id and d.doc_id=$did");
			if ($doctors != NULL && $doctors[0][$selected_day]!="" && $doctors[0][$selected_day.'_other']!="") {
				$from = date('H:i',strtotime($doctors[0][$selected_day]));
				$to = date('H:i',strtotime($doctors[0][$selected_day.'_other']));
				$time_diff = strtotime($to) - strtotime($from);
				$noof_hrs = ($time_diff/60)/60;
				$slots = array();
				for($i=1;$i<=$noof_hrs;$i++){
					if($i==1){
						$slots[]['slot']= $from;
						continue;
					}
					$from = date('H:i', strtotime($from)+1800);
					$slots[]['slot']=$from;
				}		
				$response['status'] = "success";
				$response['message'] = 'Records in successfully.';			
				$response['slots'] = $slots;
				 
			}else {
				$response['status'] = "error";
				$response['message'] = 'No slots to available';
			}
			
		}else{
			$response['status'] = "error";
			$response['message'] = 'Invalid request';	
		}
		echoResponse(200, $response);
	}else{
		$response["status"] = "error";
		$response["message"] = "You dont have right to access.";
		echoResponse(201, $response);	
	}	
});
$app->get('/doctors/:vid', function($vid) {
    $response = array();
    $db = new DbHandler();
    $vendor = $db->getOneRecord("select * from doctors where doc_id='$vid'");
    if ($vendor != NULL) {
        $response['status'] = "success";
        $response['message'] = 'Records in successfully.';
        
        $rows = array();
		array_push($rows, $vendor);
		if($rows['0']['doc_img']==""){
			$rows['0']['doc_img']='counsellor.jpg';
		}
		if($rows['0']['doc_tags']!=""){
			$tags = explode(',',$rows['0']['doc_tags']);
			
			for($i=0;$i<count($tags);$i++){
					$tags[$i]='#'.$tags[$i];
			}
			$tags = implode(";   ",$tags);
			$rows['0']['doc_tags'] = $tags;
		}
		
        $response['doctors'] = $rows;
       
    }else {
            $response['status'] = "error";
            $response['message'] = 'No such vendor is registered';
        }
    echoResponse(200, $response);
});
$app->post('/vendor/create', function() use ($app) {
    $response = array();
    $r = json_decode($app->request->getBody());
    $db = new DbHandler();
    $tabble_name = "vendor";
    $column_names = array('fullname', 'specialization','qualification','experience','mobile','email','address','about','availability','tags','profilepic');
    $result = $db->insertIntoTable($r->vendor, $column_names, $tabble_name);
    if ($result != NULL) {
        $response["status"] = "success";
        $response["message"] = "Vendor created successfully";
        $response["vid"] = $result;
        echoResponse(200, $response);
    } else {
        $response["status"] = "error";
        $response["message"] = "Failed to create vendor. Please try again";
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
			if($doc_img!=""){
				$_SESSION['uimg']='admin/assets/doctors/'.$doc_img;
			}
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