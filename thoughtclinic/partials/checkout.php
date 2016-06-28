<div ng-init="loadBookingDetails()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/all/newmessage.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">{{session.name}}</h1>
  <span class="arrow-top"></span></section>
<div class="arrow-btm"></div>

<section style="margin:20px 0 70px 0;">
  <div class="container text-center" style=" padding:0 40px;">
    <div class="row">
		<div ng-show="msgd" class="alert alert-danger alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
		</div>
		<div ng-show="msgs" class="alert alert-success alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
		</div>
		<table class="table table-striped table-hover table-responsive col-md-12 table-bordered"  >
			<thead>
				<tr>
					<th>Counsellor</th>
					<td align="left"><img ng-src="admin/assets/doctors/{{doctor.doc_img}}" width="75px"/> {{doctor.doc_name}}</td>
				</tr>
				<tr>
					<th>Consulting Type</th>
					<td align="left"> {{consulting_type}}</td>
				</tr>
				<tr ng-show="sdate">
					<th>Slot date</th>
					<td align="left"> {{slot_date}}</td>
				</tr>
				<tr ng-show="slot">
					<th>Slot Time</th>
					<td align="left"> {{slot_time}}</td>
				</tr>
				
				<tr>
					<th>Fees</th>
					<td align="left"> <i class="fa fa-inr" aria-hidden="true"></i> {{con_fee}}</td>
				</tr>
				<tr>
					<td colspan="2"><button class="btn btn-info" ng-click="doPayment(doctor.doc_id,consulting_type,slot_id)">Proceed To Pay</button></td>
				</tr>	
			</thead>
			
		</table>
		
    </div>
	
  </div>
</section>

</div>