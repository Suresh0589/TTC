<div ng-init="loadResponse()">
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
					<th>Payment Id</th>
					<td align="left"> {{pdetails.payment_id}}</td>
					<th>Payment Status</th>
					<td align="left">{{pdetails.payment_status}}</td>
				</tr>
				<tr>
					<th>Counsellor</th>
					<td align="left"><img ng-src="admin/assets/doctors/{{pdetails.doc_img}}" width="75px"/> {{pdetails.doc_name}}</td>
					<th>Patient</th>
					<td align="left"><img ng-src="admin/assets/users/{{pdetails.uimg}}" width="75px"/> {{pdetails.name}}</td>
				</tr>
				<tr>
					<th>Constulting Type</th>
					<td align="left"> {{pdetails.consulting_type}}</td>
					<th>Fees</th>
					<td align="left"> <i class="fa fa-inr" aria-hidden="true"></i>{{pdetails.amount}}</td>
				</tr>
			</thead>
			
		</table>
		
    </div>
	
  </div>
</section>

</div>