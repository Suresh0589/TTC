<div ng-init="loadMessage()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/all/newmessage.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">{{message.subject}}</h1>
  <span class="arrow-top"></span></section>
<div class="arrow-btm"></div>

<section style="margin:20px 0 70px 0;">
  <div class="container text-center" style=" padding:0 40px;">
    <div class="row">
		<table class="table table-striped table-hover table-responsive col-md-12 table-bordered"  >
			<thead>
				<tr>
					<th >Subject</th>
					<td colspan="3" align="left">{{message.subject}}</td>
				</tr>
				<tr>
					<th>Counsellor</th>
					<td align="left"><!--img ng-src="admin/assets/doctors/{{message.doc_img}}" width="75px"/--> {{message.doctor}}</td>
					<th>Patient</th>
					<td class="left" align="left">{{message.patient}}</td>
				</tr>
				<tr>
					<th>Message</th>
					<td colspan="3" align="left">{{message.txt}}</td>
				</tr>
			</thead>
		</table>
		<table class="table  table-bordered table-hover table-responsive col-md-12" valign="middle" align="left">
			<thead>
				<tr>
					<th class="table_labels" colspan="3" align="left">Replies</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="rep in repliesList">
					<td>{{rep.name}}</td>
					<td align="left" >{{rep.txt}}</td>
					<td>{{rep.reply_time}}</td>
				</tr>
			</tbody>
		<table>
    </div>
	<div class="row col-md-8" style="margin:0 15%">
			<div ng-show="msgd" class="alert alert-danger alert-dismissible" role="alert">						 
				<strong >{{reg_msg}}</strong>
			</div>
			<div ng-show="msgs" class="alert alert-success alert-dismissible" role="alert">						 
				<strong >{{reg_msg}}</strong>
			</div>	
			<form name="msgrplyForm">
				<textarea class="form-control" maxlength="2000" data-validation-required-message="Please enter a message." required="" name="txt" ng-model="msgrply.txt" placeholder="Your Message *" style="height: 115px; margin-bottom: 15px; padding: 15px;"></textarea>    
				<button type="submit" class="btn btn-3" ng-click="reply(message.message_id)" data-ng-disabled="msgrplyForm.$invalid" >Reply</button>
			</form>
	</div>
  </div>
</section>

</div>