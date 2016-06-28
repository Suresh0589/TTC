<div ng-init="doctorLoad()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/all/newmessage.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">NEW MESSAGE</h1>
  <span class="arrow-top"></span></section>
<div class="arrow-btm"></div>

<section style="margin:20px 0 70px 0;">
  <div class="container text-center" style=" padding:0 40px;">
    <div class="row">
		<div class="col-md-4 panel panel-default">
			<div class="panel-heading">Select Date</div>
			<div class="panel-body">
				<div style="display:inline-block; min-height:290px;">
				  <uib-datepicker ng-model="dt" class="well well-sm" datepicker-options="options"></uib-datepicker>
				</div>
			</div>
		</div>
		<div class="col-md-4 panel panel-default">
			<div class="panel-heading">Select Slot</div>
			<div class="panel-body"></div>
		</div>
		<div class="col-md-4 panel panel-default">
			<div class="panel-heading">Enetr Details</div>
			<div class="panel-body"></div>
			<div class="panel-footer"></div>
		</div>
    </div>
  </div>
</section>

</div>