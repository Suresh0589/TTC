<div ng-init="doctorLoad()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/all/newmessage.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">NEW MESSAGE</h1>
  <span class="arrow-top"></span></section>
<div class="arrow-btm"></div>

<section style="margin:20px 0 70px 0;">
  <div class="container text-center" style="max-width:500px; padding:0 40px;">
    <div class="row">
		<div ng-show="msgd" class="alert alert-danger alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
		</div>
		<div ng-show="msgs" class="alert alert-success alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
		</div>
		<form name="msgForm">
			<h4>To : {{doctor.doc_name}}</h4>
			  <label for="comment">Subject</label>
						<input type="text" name="subject" ng-model="message.subject" placeholder="Enter Subject *" class="form-control" required>
						
						
			 <label for="comment">Your Message</label>           
			<textarea class="form-control" maxlength="2000" data-validation-required-message="Please enter a message." required="" name="txt" ng-model="message.txt" placeholder="Your Message *" style="height: 115px; margin-bottom: 15px; padding: 15px;"></textarea>    
				
			<button class="btn btn-3" type="submit" style="width:100% !important;" data-ng-disabled="msgForm.$invalid" ng-click="sendMessage(doctor.doc_id)">SEND NOW</button>      
		</form>
    </div>
  </div>
</section>

</div>