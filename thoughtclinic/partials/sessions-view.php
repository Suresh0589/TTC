<div ng-init="loadSession()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/all/newmessage.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">{{session.name}}</h1>
  <span class="arrow-top"></span></section>
<div class="arrow-btm"></div>

<section style="margin:20px 0 70px 0;">
  <div class="container text-center" style=" padding:0 40px;">
    <div class="row">
		<table class="table table-striped table-hover table-responsive col-md-12 table-bordered"  >
			<thead>
				<tr>
					<th>Counsellor</th>
					<td align="left"><!--img ng-src="admin/assets/doctors/{{message.doc_img}}" width="75px"/--> {{session.doctor}}</td>
					<th>Slot Date</th>
					<td class="left" align="left">{{session.cdate}}  </td>
					<th>Slot Time</th>
					<td class="left" align="left">{{session.slot}}  </td>
				</tr>
				<tr>
					<th>Name</th>
					<td align="left"> {{session.name}}</td>
					<th>Email</th>
					<td class="left" align="left">{{session.email}}  </td>
					<th>Mobile</th>
					<td class="left" align="left">{{session.mobile}} </td>
				</tr>
				<tr>
					<th>Reason</th>
					<td colspan="5" align="left">{{session.reason}}</td>
				</tr>
			</thead>
		</table>
		
    </div>
	
  </div>
</section>

</div>