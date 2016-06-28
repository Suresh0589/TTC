<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image:url(img/signin-page/signin-bg.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">SIGN IN OR REGISTER</h1>
  <span class="arrow-top"></span></section>
<div class="arrow-btm"></div>
<section>
  <div class="container" style="width:350px;">
    <div class="row">
      <ul class="nav nav-tabs" style="margin-top:30px;">
        <li class="col-md-6 col-sm-6 col-xs-6 col-lg-6 active text-center" style="padding:0 5px;"><a class="btn-5" data-toggle="tab"  ng-click="changeTab()" >SIGN IN</a></li>
        <li class="col-md-6 col-sm-6 col-xs-6 col-lg-6 text-center" style="padding:0 5px;"><a class="btn-5" data-toggle="tab"   ng-click="changeTab1()" >REGISTER</a></li>
      </ul>
    </div>
	  <div ng-show="msgd" class="alert alert-danger alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
		</div>
		<div ng-show="msgs" class="alert alert-success alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
		</div>
  </div>
</section>
<section style="margin-top:20px;">
  <div class="container" style="max-width:500px; padding:0 40px;">
    <div class="row">
		
		<div class="tab-content">
        <section  ng-show="signinf" id="home" class="tab-pane fade in active">
          <div>
			<form name="loginForm" class="form-horizontal" role="form">
            <input type="email" placeholder="Email *" class="form-control" name="email" ng-model="login.email" required focus>
            <input type="password" name="password" placeholder="Password *" class="form-control" ng-model="login.password" required>
            <h5 class="text-center" style="margin:18px;"><a class=" sign-pass" href="">Forgot Password?</a></h5>
            <button class="btn btn-3" style="width:100% !important;" type="button" ng-click="doLogind(login)" data-ng-disabled="loginForm.$invalid">SIGN IN</button>
			</form>
          </div>
          
          
        </section>
        <section  ng-show="registerf" id="menu1" class="tab-pane fade in active">
          <div>
			<form name="signupForm" class="form-horizontal" role="form">
            <input type="text" name="doc_name" ng-model="signupd.doc_name" placeholder="User Name *" class="form-control" required>
            <input type="password" name="doc_pass" ng-model="signupd.doc_pass" placeholder="Password *" class="form-control" required>
            <input type="email" name="doc_email" ng-model="signupd.doc_email" placeholder="Email *" class="form-control" required>
            <button class="btn btn-3" style="width:100% !important; margin-top:15px;" type="button" ng-click="signUpd(signupd)" data-ng-disabled="signupForm.$invalid">REGISTER</button>
			</form>
          </div>
          
          
        </section>
      </div>
    </div>
  </div>
</section>


