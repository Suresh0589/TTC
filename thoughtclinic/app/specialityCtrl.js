app.controller('specialityCtrl', function ($scope, $rootScope, $routeParams, $location, $http, Data) {
    
    var specialityUrl = 'specialitys';
    var doctorUrl = 'doctors';
	
	$scope.speciality = {};
    $scope.specialityList = [];

	$scope.doctorList = [];

	
	
	$scope.specialityLoad = function () {
		
        if ($routeParams.aid) {			
			$scope.getSinglespeciality($routeParams.aid).then(function (data) {
				$scope.speciality = data;
				$scope.spe_content=data.spe_content;
			});
        }
		Data.get(specialityUrl).then(function (results) {
            $scope.specialityList = results.specialitys;
        });
		Data.get(doctorUrl).then(function (results) {           
            $scope.doctorList = results.doctors;
        });
    }
	
	$scope.specialityLimit = function(){
		
		Data.get(specialityUrl+"/limit/4").then(function (results) {
            $scope.specialityList = results.specialitys;
        });
	}
	
    $scope.getAllSpecialitys = function () {
		Data.get(specialityUrl).then(function (results) {
            $scope.specialityList = results.specialitys;
        });
    };

	$scope.onView = function (aid) {
		$location.path("speciality/"+aid);
    };
	$scope.onViewc = function (cid) {
		
		$location.path("counsellors/"+cid);
    };
	$scope.getSinglespeciality = function (id) {
	    return Data.get(specialityUrl + '/' + id).then(function (results) {
            return results.specialitys[0];
        });
    }
});