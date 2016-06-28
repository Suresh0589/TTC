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
            <button class="btn btn-3" style="width:100% !important;" type="button" ng-click="doLogin(login)" data-ng-disabled="loginForm.$invalid">SIGN IN</button>
			</form>
          </div>
          <!--div style=" min-height:120px;align-items: center; display: flex; justify-content: center; position:relative;">
            <h4 style="background: #e1e1e1 none repeat scroll 0 0; border-radius: 100px; padding: 21px; width: 60px; margin:0 auto;">or</h4>
            <hr style="bottom: 0;left: 0; position: absolute; right: 0; top: 41px; width: 80%; z-index: -1; border-color:#666;">
          </div>
          <div>
            <h3 class="text-center" style=" font-weight: 600; margin:0px;">SIGN IN IN WITH</h3>
            <div class="col-md-12 padding0" style="margin-top:10px;">
              <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 text-center" style="padding:5px;"><a href="" class="sign-soc-main">
                <div class="col-md-12 sign-soc-top sign-soc-top-face"><i class="fa fa-facebook-official" aria-hidden="true"></i></div>
                <div class="col-md-12 sign-soc-btm sign-soc-btm-face">facebook</div>
                </a></div>
              <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 text-center" style="padding:5px;"><a href="" class="sign-soc-main">
                <div class="col-md-12 sign-soc-top sign-soc-top-twi"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                <div class="col-md-12 sign-soc-btm sign-soc-btm-twi">Twitter</div>
                </a></div>
              <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 text-center" style="padding:5px;"><a href="" class="sign-soc-main">
                <div class="col-md-12 sign-soc-top sign-soc-top-gp"><i class="fa fa-google-plus" aria-hidden="true"></i></div>
                <div class="col-md-12 sign-soc-btm sign-soc-btm-gp">Google pluse</div>
                </a></div>
            </div>
          </div-->
        </section>
        <section  ng-show="registerf" id="menu1" class="tab-pane fade in active">
          <div>
			<form name="signupForm" class="form-horizontal" role="form">
            <input type="text" name="name" ng-model="signup.name" placeholder="User Name *" class="form-control" required>
            <input type="password" name="password" ng-model="signup.password" placeholder="Password *" class="form-control" required>
            <input type="email" name="email" ng-model="signup.email" placeholder="Email *" class="form-control" required>
            <button class="btn btn-3" style="width:100% !important; margin-top:15px;" type="button" ng-click="signUp(signup)" data-ng-disabled="signupForm.$invalid">REGISTER</button>
			</form>
          </div>
          <!--div style=" min-height:120px;align-items: center; display: flex; justify-content: center; position:relative;">
            <h4 style="background: #e1e1e1 none repeat scroll 0 0; border-radius: 100px; padding: 21px; width: 60px; margin:0 auto;">or</h4>
            <hr style="bottom: 0;left: 0; position: absolute; right: 0; top: 41px; width: 80%; z-index: -1; border-color:#666;">
          </div>
          <div>
            <h3 class="text-center" style=" font-weight: 600; margin:0px;">SIGNIN IN WITH</h3>
            <div class="col-md-12 padding0" style="margin-top:10px;">
              <div class="col-md-4 text-center" style="padding:5px;"><a href="" class="sign-soc-main">
                <div class="col-md-12 sign-soc-top sign-soc-top-face"><i class="fa fa-facebook-official" aria-hidden="true"></i></div>
                <div class="col-md-12 sign-soc-btm sign-soc-btm-face">facebook</div>
                </a></div>
              <div class="col-md-4 text-center" style="padding:5px;"><a href="" class="sign-soc-main">
                <div class="col-md-12 sign-soc-top sign-soc-top-twi"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                <div class="col-md-12 sign-soc-btm sign-soc-btm-twi">Twitter</div>
                </a></div>
              <div class="col-md-4 text-center" style="padding:5px;"><a href="" class="sign-soc-main">
                <div class="col-md-12 sign-soc-top sign-soc-top-gp"><i class="fa fa-google-plus" aria-hidden="true"></i></div>
                <div class="col-md-12 sign-soc-btm sign-soc-btm-gp">Google pluse</div>
                </a></div>
            </div-->
          </div>
        </section>
      </div>
    </div>
  </div>
</section>


