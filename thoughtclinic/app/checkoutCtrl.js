app.controller('checkoutCtrl', function($scope,Upload, $timeout, $rootScope, $routeParams, $window, $location, $http, Data){
	
    var sessionsUrl = 'sessions';
    var paymentsUrl = 'payments';
    var messageUrl = 'messages';
    var doctorUrl = 'doctors';
	
	$scope.doctor = {};
	$scope.message = {};
	$scope.session = {};
	$scope.msgrply = {};
	$scope.booking = {};
	$scope.pdetails = {};
	$scope.sessionsList = [];
	$scope.messageList = [];
	$scope.repliesList = [];
	$scope.slotsList = [];
	$scope.msgs= false;
	$scope.msgd= false;
	$scope.sdate= false;
	$scope.slot= false;
	$scope.selectedDate='';
	
	
	    	
	
	$scope.loadResponse = function () {		
		Data.get('session').then(function(results) {
			if (results.uid){
				$rootScope.authenticated = true;							
				if(results.utype!='patient'){
					$location.path("/home");				
				}else{
					var payment_request_id = $location.search().payment_request_id; 
					var payment_id = $location.search().payment_id; 
					if (payment_request_id!="" && payment_id!="") {	
						$scope.getPaymentDetails(payment_request_id,payment_id).then(function(result){
							$scope.pdetails=result;
						});
					}
				}
			}else{	
				$location.path("/signup");				
			}
		});		
    }
	
	$scope.getPaymentDetails = function(x,y){
		return Data.get('response/details/'+x+'/'+y).then(function(result){
			return result.payment[0];
		});
	}
						
	$scope.loadBookingDetails = function () {		
		
		Data.get('session').then(function(results) {
			if (results.uid){
				if(results.utype!='patient'){
					$location.path("/home");				
				}else{
					$rootScope.authenticated = true;							
					if ($routeParams.did) {			
						$scope.getSingledoctor($routeParams.did).then(function (data) {
							$scope.doctor = data;
							if($routeParams.ctype=='messaging'){
								$scope.consulting_type = $routeParams.ctype;
								$scope.slot_id=0;
								$scope.con_fee=data.msg_con;
							}else{
								var ctype = $routeParams.ctype.split('_');
								if(ctype['0']=='Text' || ctype['0']=='Video' || ctype['0']=='Phone'){	
									if(ctype['0']=='Text'){										
										$scope.con_fee=data.text_con;
									}else if(ctype['0']=='Video'){										
										$scope.con_fee=data.video_con;
									}else if(ctype['0']=='Phone'){										
										$scope.con_fee=data.phone_con;
									}
									$scope.consulting_type = ctype['0'];
									$scope.sdate=true;
									$scope.slot=true;
									$scope.slot_date=ctype['1'];
									$scope.slot_time=ctype['2'];
									$scope.slot_id=ctype['3'];
								}
							}
						});
					}
				}
			}else{	
				$location.path("/signup");				
			}
		});		
    }
	
	$scope.doPayment=function(doctor,ctype,slot){
		Data.get(paymentsUrl+'/'+doctor+'/'+ctype+'/'+slot).then(function(results) {
			if(results.status== "success"){
				$window.location.href = results.url;		
			}else{
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
		});
	}
	
	$scope.sessionsLoad = function () {		
		Data.get('session').then(function(results) {
			if (results.uid){
				if(results.utype=='doctor'){
					$scope.docth=false;
					$scope.doctd=false;
				}
				$rootScope.authenticated = true;							
				Data.get(sessionsUrl).then(function (results) {           
					$scope.sessionsList = results.sessions;
				});
			} else {	
				$location.path("/home");				
			}
		});		
    }
	$scope.doViewS = function(mid){
		$location.path("sessions/"+mid);
	}
	
	$scope.loadSession = function(){
		if($routeParams.mid){
			Data.get(sessionsUrl + '/' +$routeParams.mid).then(function (results) {
				$scope.session = results.sessions[0];
			});	
			
		}
	}
	
	$scope.messagesLoad = function () {		
		Data.get('session').then(function(results) {
			if (results.uid){
				$rootScope.authenticated = true;							
				Data.get(messageUrl).then(function (results) {           
					$scope.messageList = results.messages;
				});
			} else {	
				$location.path("/home");				
			}
		});		
    }
	
	$scope.message = {subject:'',txt:''};
	$scope.sendMessage=function(did){
		Data.post(messageUrl+'/create/'+did,{message:$scope.message}).then(function (results) {
			Data.toast(results);
			if (results.status == "success") {
				$scope.message = {subject:'',txt:''};
                $scope.reg_msg= results.message;
				$scope.msgs= true;
            }else{
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
		});
	}
	
	$scope.doReply = function(mid){
		$location.path("messages/"+mid);
	}
		
	$scope.msgrply={reply:''};
	$scope.loadMessage = function(){
		if($routeParams.mid){
			Data.get(messageUrl + '/' +$routeParams.mid).then(function (results) {
				$scope.message = results.message[0];
			});	
			
			$scope.getAllReplies($routeParams.mid).then(function (data) {
				$scope.repliesList = data;
			});
		}
	}
	$scope.getAllReplies = function(x){
		return Data.get('replies/'+x).then(function (results) {           
			return results.replies;
		});		
	}
	$scope.reply = function (x) {			
        Data.post(messageUrl+'/reply/'+x,{msgrply: $scope.msgrply}).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
				$scope.getAllReplies(x).then(function (data) {
					$scope.repliesList = data;
				});
				$scope.msgrply={reply:''};
                $scope.msgs= true;
				$scope.reg_msg= results.message;
            }else{
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
        });
    };
		
	$scope.getSingledoctor = function (id) {
		
        return Data.get(doctorUrl + '/' + id).then(function (results) {
            return results.doctors[0];
        });
    }
	
	  

});