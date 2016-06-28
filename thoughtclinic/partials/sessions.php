<div ng-init="sessionsLoad()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/all/newmessage.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">Sessions</h1>
  <span class="arrow-top"></span></section>
<div class="arrow-btm"></div>

<section style="margin:20px 0 70px 0;">
  <div class="container text-center" style=" padding:0 40px;">
    <div class="row">
		<table class="table table-responsive table-bordered table-striped table-hover table-bordered" align="center">
			<thead>
				<tr>
					<th ng-show="docth">Doctor</th>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Slot</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="msg in sessionsList">
					<td ng-show="doctd">{{msg.frm}}</td>
					<td>{{msg.name}}</td>
					<td>{{msg.email}}</td>
					<td>{{msg.mobile}}</td>
					<td>{{msg.cdate}}( {{msg.slot}} )</td>
					<td><span class="label label-info" ng-click="doViewS(msg.slot_id)" >View</span></td>
				</tr>
			</tbody>
		</table>
    </div>
  </div>
</section>

</div>