<div ng-init="getAlldoctors()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/counsellors/counsellors-bg.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600; text-transform:uppercase;">Counsellors</h1>
  <span class="arrow-top"></span> </section>
<section style="background-color: #f8f8f8;display:none;" >
  <div class="container">
    <div class="row" >
      <div class="col-md-15">
        <div ng-dropdown-multiselect="" options="example1data" selected-model="example1model">
          <div class="dropdown">
            <button class="dropdown-toggle-btn dropdown-toggle" type="button" data-toggle="dropdown">Dummy text <span class="dropdown-toggle-caret"></span></button>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Lorem ipsum</li>
              <li><a href="#">Dummy text</a></li>
              <li><a href="#">Dummy text</a></li>
              <li><a href="#">Dummy text</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Dropdown header 2</li>
              <li><a href="#">Dummy text</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-15">
        <div ng-dropdown-multiselect="" options="example1data" selected-model="example1model">
          <div class="dropdown">
            <button class="dropdown-toggle-btn dropdown-toggle" type="button" data-toggle="dropdown">Dummy text <span class="dropdown-toggle-caret"></span></button>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Lorem ipsum</li>
              <li><a href="#">Dummy text</a></li>
              <li><a href="#">Dummy text</a></li>
              <li><a href="#">Dummy text</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Dropdown header 2</li>
              <li><a href="#">Dummy text</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-15">
        <div ng-dropdown-multiselect="" options="example1data" selected-model="example1model">
          <div class="dropdown">
            <button class="dropdown-toggle-btn dropdown-toggle" type="button" data-toggle="dropdown">Dummy text <span class="dropdown-toggle-caret"></span></button>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Lorem ipsum</li>
              <li><a href="#">Dummy text</a></li>
              <li><a href="#">Dummy text</a></li>
              <li><a href="#">Dummy text</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Dropdown header 2</li>
              <li><a href="#">Dummy text</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-15">
        <div ng-dropdown-multiselect="" options="example1data" selected-model="example1model">
          <div class="dropdown">
            <button class="dropdown-toggle-btn dropdown-toggle" type="button" data-toggle="dropdown">Dummy text <span class="dropdown-toggle-caret"></span></button>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Lorem ipsum</li>
              <li><a href="#">Dummy text</a></li>
              <li><a href="#">Dummy text</a></li>
              <li><a href="#">Dummy text</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Dropdown header 2</li>
              <li><a href="#">Dummy text</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-15">
        <div ng-dropdown-multiselect="" options="example1data" selected-model="example1model">
          <div class="dropdown">
            <button class="dropdown-toggle-btn dropdown-toggle" type="button" data-toggle="dropdown">Dummy text <span class="dropdown-toggle-caret"></span></button>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Lorem ipsum</li>
              <li><a href="#">Dummy text</a></li>
              <li><a href="#">Dummy text</a></li>
              <li><a href="#">Dummy text</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Dropdown header 2</li>
              <li><a href="#">Dummy text</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</section>
<div class="arrow-btm" style="border-width: 18px 18px 0;"></div>
<section>
<div class="container">
<div class="row">




      <div class="col-md-12">
        <div class="col-md-3 col-xs-12 col-sm-4 text-center coun-sect" ng-repeat="doctor in doctorList">
          <div><a class="coun-secn" ng-click="onView(doctor.doc_id)"><img class="coun-img" ng-src="admin/assets/doctors/{{doctor.doc_img}}"/>
            <div class="coun-hov auto-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            </a></div>
          <div class="coun-heading">{{doctor.doc_name}}</div>
          <div class="coun-sub-heading">{{doctor.doc_spe}}</div>
          <div> <a href="special_friend.php" data-toggle="tooltip" data-placement="bottom" title="Chat" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/chat.png"></a> <a ng-click="onMessage(doctor.doc_id)" data-toggle="tooltip" data-placement="bottom" title="Message" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/message.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title=" Video Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/video.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/call.png"></a> </div>
        </div>
       
      </div>


</div>
</div>
</section>
</div>
