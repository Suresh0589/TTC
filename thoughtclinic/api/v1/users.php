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
					$from = date('H:i', strtotime($from)+3600);
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
$app->get('/users/:vid', function($vid) {
    $response = array();
    $db = new DbHandler();
    $vendor = $db->getOneRecord("select uid,name,email,phone,uimg from customers_auth where uid='$vid'");
    if ($vendor != NULL) {
        $response['status'] = "success";
        $response['message'] = 'Records in successfully.';
        
        $rows = array();
		array_push($rows, $vendor);
		if($rows['0']['uimg']==""){
			$rows['0']['uimg']='counsellor.jpg';
		}		
        $response['users'] = $rows;       
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
$app->post('/users/update/:did', function($did) use ($app) {
    $response = array();
    $db = new DbHandler();
	$session = $db->getSession();
	if(isset($session['uid']) && $session['uid']==$did && isset($session['utype']) && $session['utype']=='patient' ){
		$query='';
		/*print_r($_POST);
		print_r($_FILES); *exit;*/
		$profile = $_POST['profile'];	
		$query ="update customers_auth set ";
		$query.="name='".addslashes($profile['name'])."',";
		if(isset($_FILES['file']) && $_FILES['file']['name']!=""){
			$fileinfo = pathinfo($_FILES['file']['name']);
			$uimg = time().'.'.$fileinfo['extension'];
			move_uploaded_file($_FILES['file']['tmp_name'],'../../admin/assets/users/'.$uimg);
			$query.="uimg='$uimg',";
		}
		$query.="phone='".addslashes($profile['phone'])."' ";
		$query.="where uid=$did";
		
		$result = $db->updateRecord($query);
		
		
		if ($result != NULL) {
			$response["status"] = "success";
			$response["message"] = "Profile Updated successfully";
			if($uimg!=""){
				$_SESSION['uimg']='admin/assets/users/'.$uimg;
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