<div ng-controller="profileCtrl" ng-init="profileLoad()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/all/newmessage.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">Profile</h1>
  <span class="arrow-top"></span></section>
<div class="arrow-btm"></div>

<section style="margin:20px 0 70px 0;">
  <div class="container text-center" >
    <div class="row" >
		<div ng-show="msgd" class="alert alert-danger alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
	  </div>
	  <div ng-show="msgs" class="alert alert-success alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
		</div>
		<form name="profileForm">
		<div class="col-md-6" style="margin:0 16.666%">
			<div class="form-group">
				<label class="col-md-4" for="name">Email</label>
				<input type="email" readonly name="email" ng-model="profile.email" placeholder="Email *" class="form-control col-md-8" required>
			</div>
			<div class="form-group">
				<label class="col-md-4" for="name">Name</label>
				<input type="text" name="name" ng-model="profile.name" placeholder="Name *" class="form-control col-md-8" required>
			</div>
			<div class="form-group">
				<label class="col-md-4" for="name">Mobile</label>
				<input type="text" name="phone" ng-model="profile.phone" placeholder="Mobile *" class="form-control col-md-8" maxlength="10" ng-pattern="/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/" required>
				<p ng-show="profile.phone.$invalid && !profile.phone.$pristine" class="help-block"> Mobile no. is required.</p>
			</div>
			
			<div class="form-group">
				<label class="col-md-4" for="photo">Photo</label>
				<div class="col-md-8">
					<input type="file" ngf-select ng-model="picFile" name="file"    
				 accept="image/*" ngf-max-size="2MB" 
				 ngf-model-invalid="errorFile">
				  <i ng-show="myForm.file.$error.required">*required</i><br>
				  <i ng-show="myForm.file.$error.maxSize">File too large 
					  {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
				  <img   ng-src="admin/assets/users/{{profile.uimg}}" ngf-thumbnail="picFile" class="thumb" style="visibility:visible !important;display:block !important;">
				  <button ng-click="picFile = null" ng-show="picFile">Remove</button>
		  
				</div>
			</div>
			<div class="form-group">	
				<div class="col-md-12">
				<br><br><br>
					<button  class="btn btn-3" type="submit" ng-click="updateProfileP(picFile)" data-ng-disabled=	"profileForm.$invalid" >Update</button> 
				</div>
			</div>
		</div>
		
		</form>  
    </div>
  </div>
</section>

</div>
  <style type="text/css">
    .thumb {
    width: 150px;
    height: 150px;
    float: none;
    position: relative;
    top: 7px;
}

form .progress {
    line-height: 15px;
}
}

.progress {
    display: inline-block;
    width: 100px;
    border: 3px groove #CCC;
}

.progress div {
    font-size: smaller;
    background: orange;
    width: 0;
}
  </style>
