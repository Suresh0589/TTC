
<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>Mithai </title>



    <!-- Bootstrap Core CSS -->

    <link href="<?=base_url('assets')?>/css/bootstrap.min.css" rel="stylesheet">



    <!-- MetisMenu CSS -->

    <link href="<?=base_url('assets')?>/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">



    <!-- Custom CSS -->

    <link href="<?=base_url('assets')?>/css/sb-admin-2.css" rel="stylesheet">



    <!-- Custom Fonts -->

    <link href="<?=base_url('assets')?>/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

	<!-- jQuery Version 1.11.0 -->

    <script src="<?=base_url('assets')?>/js/jquery-1.11.0.js"></script>	

	<!-- jQuery Validations -->

    <script src="<?=base_url('assets')?>/js/jquery.validate.min.js"></script> 

	<script src="<?=base_url('assets')?>/js/jquery.form.js"></script>

	<!-- Bootstrap Core JavaScript -->

    <script src="<?=base_url('assets')?>/js/bootstrap.min.js"></script>



</head>



<body>



    <div class="container">

        <div class="row">

            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-default">

                    <div class="panel-heading">

                        <h3 class="panel-title">Please Sign In</h3>

                    </div>

					

                    <div class="panel-body">

						<p id="rjres"></p>

                       <form id="new_acc" action="<?=base_url('login/validate')?>" method="post">

                            <fieldset>

                                <div class="form-group">

                                    <input class="form-control" placeholder="User Name" name="inputEmail" id="inputEmail" type="text" autofocus>

                                </div>

                                <div class="form-group">

                                    <input class="form-control" placeholder="Password" name="inputPassword" id="inputPassword" type="password" value="">

                                </div>

                               

                               

                                <input type="submit" class="btn btn-lg btn-success btn-block" />
								

                            </fieldset>

                        </form>

                    </div>

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

					// email:true,	

				},

				inputPassword:{

					required:true,	

				}			

			},

			submitHandler:function(form){

				// alert(); 

					// var bar = $('.bar');

					// var percent = $('.percent');

					// var status = $('#status');

				$('#new_acc').ajaxSubmit({

					 // beforeSend: function() {

						// status.empty();

						// var percentVal = '0%';

						// bar.width(percentVal)

						// percent.html(percentVal);

					// },

					// uploadProgress: function(event, position, total, percentComplete) {

						// var percentVal = percentComplete + '%';

						// bar.width(percentVal)

						// percent.html(percentVal);

						// console.log(percentVal, position, total);

					// },

					// success: function() {

						// var percentVal = '100%';

						// bar.width(percentVal)

						// percent.html(percentVal);

					// },

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

    



 



</body>



</html>
