<div ng-init="doctorLoad()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/counsellors/counsellors-bg.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600; text-transform:uppercase;">Counsellors Details</h1>
  <span class="arrow-top"></span> </section>
<div class="arrow-btm" style="border-width: 18px 18px 0;"></div>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12 text-center coun-sect">
        <div class="col-md-4 col-xs-12 col-sm-12">
          <div><img class="coun-img" ng-src="admin/assets/doctors/{{doctor.doc_img}}"/></div>
          <div class="coun-heading">{{doctor.doc_name}}</div>
          <div class="coun-sub-heading">{{doctor.doc_spe}}</div>
          <h5><i>{{doctor.doc_qua}}</i></h5>
            
        </div>
		<div class="col-md-8 col-xs-12 col-sm-12">
			<div class="form-group">				
				<div class="col-md-12">
				  <p ng-bind-html="abt_dr"  style="margin-bottom:0px; text-align:left;"></p>
				</div>
			</div>
			<div class="form-group" style="text-align:left;">
				<label class="col-md-4">Consulting Languages</label>
				<div class="col-md-8">{{doctor.doc_lang}}</div>
			</div>
		</div>
        <div class="col-md-12 col-xs-12 col-sm-12 text-center">
          <div class="col-md-3 col-xs-12" style="margin:20px 0;"> <img src="img/counsellors/chat.png">
            <div class="coun-sub-heading">Text Consult</div>
            <h5 class="margin0">{{doctor.doc_spe}}</h5>
            <div class="coun-cost"><i class="fa fa-inr" aria-hidden="true"></i> {{doctor.text_con}}</div>
            <button ng-click="onBooking(doctor.doc_id,'Text')" class="btn btn-2 coun-cons-btn" type="button">Consult Now</button>
          </div>
          <div class="col-md-3 col-xs-12" style="margin:20px 0;"> <img src="img/counsellors/message.png">
            <div class="coun-sub-heading">Message Consult</div>
            <h5 class="margin0">{{doctor.doc_spe}}</h5>
            <div class="coun-cost"><i class="fa fa-inr" aria-hidden="true"></i> {{doctor.msg_con}}</div>
            <button ng-click="bookMessageConsulting(doctor.doc_id)" class="btn btn-2 coun-cons-btn" type="button" ng-click="onMessage(doctor.doc_id)">Consult Now</button>
          </div>
          <div class="col-md-3 col-xs-12" style="margin:20px 0;"> <img src="img/counsellors/video.png">
            <div class="coun-sub-heading">Video Consult</div>
            <h5 class="margin0">{{doctor.doc_spe}}</h5>
            <div class="coun-cost"><i class="fa fa-inr" aria-hidden="true"></i> {{doctor.video_con}}</div>
            <button ng-click="onBooking(doctor.doc_id,'Video')" class="btn btn-2 coun-cons-btn" type="button">Consult Now</button>
          </div>
          <div class="col-md-3 col-xs-12" style="margin:20px 0;"> <img src="img/counsellors/call.png">
            <div class="coun-sub-heading">Phone Consult</div>
            <h5 class="margin0">{{doctor.doc_spe}}</h5>
            <div class="coun-cost"><i class="fa fa-inr" aria-hidden="true"></i> {{doctor.phone_con}}</div>
            <button ng-click="onBooking(doctor.doc_id,'Phone')" class="btn btn-2 coun-cons-btn" type="button">Consult Now</button>
          </div>
		  <!--div>
		   <button class="btn btn-3 coun-book-btn" ng-click="onBooking(doctor.doc_id)" type="button">Book an Appointment</button>
		   </div-->
        </div>
       
        <div class="col-md-12">
          <div class="col-md-1"></div>
          <div class="col-md-10" style="color:#d5d400; margin-bottom:20px;">{{doctor.doc_tags}}</div>
        </div>
        
       <!-- div class="col-md-12 col-sm-12">
        <ul class="coun-menu padding0" style=" border-right:none; margin-bottom:20px;">
          <li><a class="btn-outline btn-social" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a class="btn-outline btn-social" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a class="btn-outline btn-social" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
          <li><a class="btn-outline btn-social" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        </ul>
      </div -->
      <div class="col-md-12 text-center">
      <div style="border-top: 1px solid #aaa; width:50%; margin: 0 auto;"></div>
      </div>

      </div>
    </div>
  </div>
</section>
<!--<section>
<div class="container">
<div class="row">




      <div class="col-md-12">
        <div class="col-md-3 col-xs-12 col-sm-4 text-center coun-sect">
          <div><a class="coun-secn" href="counsellors_detailes.php"><img class="coun-img" src="img/counsellors/counsellors-1.jpg"/>
            <div class="coun-hov auto-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            </a></div>
          <div class="coun-heading">Lorem ipsum</div>
          <div class="coun-sub-heading">simply dummy text</div>
          <div> <a href="" data-toggle="tooltip" data-placement="bottom" title="Chat" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/chat.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Message" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/message.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title=" Play Video" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/video.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/call.png"></a> </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-4 text-center coun-sect">
          <div><a class="coun-secn" href="counsellors_detailes.php"><img class="coun-img" src="img/counsellors/counsellors-2.jpg"/>
            <div class="coun-hov auto-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            </a></div>
          <div class="coun-heading">Lorem ipsum</div>
          <div class="coun-sub-heading">simply dummy text</div>
          <div> <a href="" data-toggle="tooltip" data-placement="bottom" title="Chat" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/chat.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Message" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/message.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title=" Play Video" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/video.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/call.png"></a> </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-4 text-center coun-sect">
          <div><a class="coun-secn" href="counsellors_detailes.php"><img class="coun-img" src="img/counsellors/counsellors-3.jpg"/>
            <div class="coun-hov auto-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            </a></div>
          <div class="coun-heading">Lorem ipsum</div>
          <div class="coun-sub-heading">simply dummy text</div>
          <div> <a href="" data-toggle="tooltip" data-placement="bottom" title="Chat" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/chat.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Message" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/message.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title=" Play Video" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/video.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/call.png"></a> </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-4 text-center coun-sect">
          <div><a class="coun-secn" href="counsellors_detailes.php"><img class="coun-img" src="img/counsellors/counsellors-1.jpg"/>
            <div class="coun-hov auto-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            </a></div>
          <div class="coun-heading">Lorem ipsum</div>
          <div class="coun-sub-heading">simply dummy text</div>
          <div> <a href="" data-toggle="tooltip" data-placement="bottom" title="Chat" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/chat.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Message" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/message.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title=" Play Video" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/video.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/call.png"></a> </div>
        </div>
        
        <div class="col-md-3 col-xs-12 col-sm-4 text-center coun-sect">
          <div><a class="coun-secn" href="counsellors_detailes.php"><img class="coun-img" src="img/counsellors/counsellors-1.jpg"/>
            <div class="coun-hov auto-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            </a></div>
          <div class="coun-heading">Lorem ipsum</div>
          <div class="coun-sub-heading">simply dummy text</div>
          <div> <a href="" data-toggle="tooltip" data-placement="bottom" title="Chat" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/chat.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Message" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/message.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title=" Play Video" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/video.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/call.png"></a> </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-4 text-center coun-sect">
          <div><a class="coun-secn" href="counsellors_detailes.php"><img class="coun-img" src="img/counsellors/counsellors-2.jpg"/>
            <div class="coun-hov auto-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            </a></div>
          <div class="coun-heading">Lorem ipsum</div>
          <div class="coun-sub-heading">simply dummy text</div>
          <div> <a href="" data-toggle="tooltip" data-placement="bottom" title="Chat" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/chat.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Message" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/message.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title=" Play Video" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/video.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/call.png"></a> </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-4 text-center coun-sect">
          <div><a class="coun-secn" href="counsellors_detailes.php"><img class="coun-img" src="img/counsellors/counsellors-3.jpg"/>
            <div class="coun-hov auto-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            </a></div>
          <div class="coun-heading">Lorem ipsum</div>
          <div class="coun-sub-heading">simply dummy text</div>
          <div> <a href="" data-toggle="tooltip" data-placement="bottom" title="Chat" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/chat.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Message" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/message.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title=" Play Video" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/video.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/call.png"></a> </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-4 text-center coun-sect">
          <div><a class="coun-secn" href="counsellors_detailes.php"><img class="coun-img" src="img/counsellors/counsellors-1.jpg"/>
            <div class="coun-hov auto-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            </a></div>
          <div class="coun-heading">Lorem ipsum</div>
          <div class="coun-sub-heading">simply dummy text</div>
          <div> <a href="" data-toggle="tooltip" data-placement="bottom" title="Chat" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/chat.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Message" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/message.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title=" Play Video" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/video.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/call.png"></a> </div>
        </div>
        

      </div>


</div>
</div>
</section>
-->
</div>