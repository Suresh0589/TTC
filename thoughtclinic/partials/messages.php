<div ng-init="messagesLoad()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/all/newmessage.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">MESSAGES</h1>
  <span class="arrow-top"></span></section>
<div class="arrow-btm"></div>

<section style="margin:20px 0 70px 0;">
  <div class="container text-center" style=" padding:0 40px;">
    <div class="row">
		<table class="table table-responsive table-bordered table-striped table-hover table-bordered" align="center">
			<thead>
				<tr>
					<th>Name</th>
					<th>Subject</th>
					<th>Time</th>
					<th>Replies</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="msg in messageList">
					<td>{{msg.frm}}</td>
					<td>{{msg.subject}}</td>
					<td>{{msg.message_time}}</td>
					<td><span class="label label-warning" ng-click="doReply(msg.message_id)" >{{msg.replies}}</span></td>
					<td><span class="label label-info" ng-click="doReply(msg.message_id)" >Reply</span></td>
				</tr>
			</tbody>
		</table>
    </div>
  </div>
</section>

</div>