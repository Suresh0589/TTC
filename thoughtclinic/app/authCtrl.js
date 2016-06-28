app.controller('authCtrl', function ($scope, $rootScope, $routeParams, $location, $http, Data) {
    //initially set those objects to null to avoid undefined error
    $scope.login = {};
    $scope.signup = {};
    $scope.signupd = {};
	$scope.signinf=true;
	$scope.registerf=false;
	$scope.subfrm=true;
	$scope.articleList = [];
	$scope.specialityList = [];
	$scope.doctorList = [];
	
	$scope.profile= function(){
		if($rootScope.utype=='patient'){
			$location.path('profilep');	
		}else if($rootScope.utype =='doctor'){
			$location.path('profile');				
		}
	}
	
	$scope.loadbasics = function(){		
		
		
		Data.get("specialitys/limit/4").then(function (results) {
            $scope.specialityList = results.specialitys;
        });
		Data.get("articles/limit/4").then(function (results) {
            $scope.articleList = results.articles;
        });
		Data.get("doctors/limit/3").then(function (results) {
            $scope.doctorList = results.doctors;
        });	
	}	
	$scope.doSubscribe= function(subinfo){
		
	};
    $scope.doLogind = function (customer) {
        Data.post('logind', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('home');
            }else{
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
        });
    };
	$scope.doLogin = function (customer) {
        Data.post('login', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('home');
            }else{
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
        });
    };
    $scope.signup = {email:'',password:'',name:''};
    $scope.signUp = function (customer) {
        Data.post('signUp', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('home');
            }else{
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
        });
    };
	$scope.signUpd = function (customer) {
        Data.post('signUpd', {
            customer: customer
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $location.path('profile');
            }else{
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
        });
    };
	$scope.subscribe = {email:''};
    $scope.dosubscribe = function (sub) {
		//alert();
        Data.post('subscribe', {
            sub: sub
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
                $scope.subfrm= false;				
				$scope.msgs= true;
				$scope.reg_msg= results.message;
            }else{
				$scope.subfrm= false;				
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
        });
    };
	
    $rootScope.logout = function () {
		Data.get('logout').then(function (results) {
            Data.toast(results);
			$rootScope.usrtabs = false;
			$rootScope.logbtns = true;
			$rootScope.unavstyles ="";
            $location.path('home');
        });
    };
	
	$scope.changeTab =function(){
		$scope.signinf=true;
		$scope.registerf=false;
	};
	
	$scope.changeTab1 =function(){
		
		$scope.signinf=false;
		$scope.registerf=true;
	};
	$scope.onViewa = function (aid) {
		$location.path("articles/"+aid);
    };
	$scope.onMessage = function (cid) {
		
		$location.path("counsellors/message/"+cid);
    };
	$scope.onViewc = function (cid) {
		
		$location.path("counsellors/"+cid);
    };
	$scope.onViews = function (cid) {
		
		$location.path("speciality/"+cid);
    };
	
});