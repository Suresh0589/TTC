app.controller('articleCtrl', function ($scope, $rootScope, $routeParams, $location, $http, Data) {
    
    var articleUrl = 'articles';
	
	$scope.comments = {};
	$scope.article = {};
	
    $scope.articleList = [];
    $scope.articleListLimit = [];
    $scope.commentList = [];
	$scope.comnts=false;
	
	$scope.showComnts=function(){
		$scope.comnts=!$scope.comnts;
		
	}
	
	$scope.doComment = function (aid) {
		$scope.comments.art_id = aid;
        Data.post('comment/create/'+aid, {
            comment: $scope.comments
        }).then(function (results) {
            Data.toast(results);
            if (results.status == "success") {
				Data.get('comment/'+$routeParams.aid).then(function (results) {
					if(results.status=="success"){
						$scope.commentList = results.comments[0];
						
					}
				});
                $scope.msgs= true;
				$scope.reg_msg= results.message;
            }else{
				$scope.msgd= true;
				$scope.reg_msg= results.message;
			}
        });
    };
	
	$scope.articleLoad = function () {
		
        if ($routeParams.aid) {			
			$scope.getSinglearticle($routeParams.aid).then(function (data) {
				$scope.article = data;
				$scope.art_content=data.art_content;
				var img = art_img_url+data.art_img;
				var content = strip(data.art_content);
				$rootScope.metadata={'title':data.art_title,'content':content,'url':$location.absUrl(),'image':img};
			});
        }
		Data.get('comment/'+$routeParams.aid).then(function (results) {
			if(results.status=="success"){
				$scope.commentList = results.comments[0];
			}
        });
		Data.get(articleUrl).then(function (results) {
            $scope.articleList = results.articles;
        });
    }
	
	$scope.abc = function(x){
		alert("abc : "+x);
	}
	
    $scope.getAllArticles = function () {
		Data.get(articleUrl).then(function (results) {
            $scope.articleList = results.articles;
        });
		Data.get(articleUrl+"/limit/4").then(function (results) {
            $scope.articleListLimit = results.articles;
        });
    };

	$scope.onView = function (aid) {
		$location.path("articles/"+aid);
    };
	
	$scope.getSinglearticle = function (id) {
	    return Data.get(articleUrl + '/' + id).then(function (results) {
            return results.articles[0];
        });
    }
});