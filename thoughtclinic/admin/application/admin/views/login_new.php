<!DOCTYPE html>
<html lang="en">
<!--yellesh-->
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title> Thought-Clinic Login</title>
<link rel="shortcut icon" href="<?=base_url('assets')?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?=base_url('assets')?>/favicon.ico" type="image/x-icon">

<link href="<?=base_url('assets')?>/font-icons/css/font-awesome.css" rel="stylesheet" type="text/css"/>

<link href="<?=base_url('assets')?>/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets')?>/css/grids.css" rel="stylesheet" type="text/css"/>

<!--Bootstrap-->
<link href="<?=base_url('assets')?>/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?=base_url('assets')?>/js/jquery.js"></script> 
<script type="text/javascript" src="<?=base_url('assets')?>/js/bootstrap.js"></script> 
<!--END Bootstrap-->

<!--NAV-->
<link rel="stylesheet" href="<?=base_url('assets')?>/css/nav.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<!--script src="<?=base_url('assets')?>/js/script.js"></script-->
<!--END NAV -->  
<!-- jQuery Validations -->

    <script src="<?=base_url('assets')?>/js/jquery.validate.min.js"></script> 

	<script src="<?=base_url('assets')?>/js/jquery.form.js"></script>


</head>
<body>

<!--SLIDER-->
<!--<div class="container-fluid slider">-->
   <div class="container">
   <h1>&nbsp;</h1>
   <div id="carousel-example-generic" class="carousel slide text-center" data-ride="carousel">
     <!-- Wrapper for slides -->
     <div class="carousel-inner img-rounded text-center" role="listbox">
       <div class="item active">
        <!--<div class="col-md-8 col-sm-8 text-left slider-text"><br><br>
          <h1 class="no-pm">Welcome To <strong>Mithai</strong> <br>
		  <strong></strong></h1>
          <p>
          
          </p>
         
        </div>-->
         <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>				
					
                    <div class="panel-body">
						<p id="rjres"></p>
                       <form id="new_acc" action="<?=base_url('login/validate')?>" method="post" novalidate="novalidate">
                            <fieldset>

                                <div class="form-group">
                                    <input class="form-control" placeholder="User Name" name="inputEmail" id="inputEmail" type="text" autofocus="">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="inputPassword" id="inputPassword" type="password" value="">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block">
                                <!--<a class="btn btn-lg btn-danger btn-block href="" data-toggle="modal" data-target="#myModal">Forgot Password</a>-->

                            </fieldset>

                        </form>

                    </div>

                </div>
        </div>
       </div>
      
       
     </div>
     <h1>&nbsp;</h1> 
     <h3>&nbsp;</h3> 
     
    </div>
     
 </div>
<!--</div>-->
<!--END SLIDER-->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
			</div>
			<div class="modal-body">
				<div id="fmsg"></div>
				<form id="fpass_frm" name="fpass_frm" method="post" action="">
				
				<div class="form-group row">
					<label class="col-md-4"> Email</label>
					<div class="col-md-8">		
						<input type="email" placeholder="Email" id="femail" name="femail"  class="form-control input-lg">
					</div>     
				</div>
				<div class="modal-footer">       
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){

		$('#new_acc').validate({

			rules:{

				inputEmail:{

					required:true,

				

				},

				inputPassword:{

					required:true,	

				}			

			},

			submitHandler:function(form){

			
				$('#new_acc').ajaxSubmit({

				

					complete: function(xhr) {

						// $('#rjres').html(xhr.responseText); return false;

						var j = JSON.parse(xhr.responseText);						

						if(j.success==1){								

							$('#rjres').html(j.msg);

							window.location.reload();									

						}else{							

							$('#rjres').html(j.msg);

						}

					}

				}); 

				return false;

			}

		});

	});

	

	

</script>
<script type="text/javascript">
	$(document).ready(function() {
			
			$("#fpass_frm").validate({
				rules: {					
					femail: {
						required: true,
						email: true
					},
					
				},
				submitHandler:function(form){
					var fdata = $(form).serialize();
					$.ajax({
						url:'<?=base_url('registerpass/checkuser')?>',
						data:fdata,
						type:'post',
						success:function(res){
							
							var j=JSON.parse(res);		
							if(j.status==1){						
								$("#fpass_frm").find("input[type=text],input[type=email],select").val("");
								$('.close').trigger('click');
								$("#lmsg").html(j.msg);
							}else if(j.status==2){						
								
								$("#fmsg").html(j.msg);
							}else if(j.status==0){							
								$("#fmsg").html(j.msg);
							}
						}
					});
 					
					return false;
				}
			});
			
		
		});
  </script>
</body>
</html>