<div ng-init="loadbasics()">
<div style="height:92px;"></div>
<!--Counsellors-->
<section id="coun" class="auto-center sect-style">
  <div class="container" style="max-width:900px;">
    <div class="row">
      <h1 class="main-heading">Counsellors</h1>
      <div class="col-md-12">
	  
        <div class="col-md-4 text-center coun-sect" style="margin-top:0px;" ng-repeat="doctor in doctorList">
          <div><a class="coun-secn" ng-click="onViewc(doctor.doc_id)"><img class="coun-img" src="admin/assets/doctors/{{doctor.doc_img}}"/>
            <div class="coun-hov auto-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            </a></div>
          <div class="coun-heading">{{doctor.doc_name}}</div>
          <div class="coun-sub-heading">{{doctor.doc_spe}}</div>
          <div> <a href="special_friend.php" data-toggle="tooltip" data-placement="bottom" title="Chat" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/chat.png"></a> <a href="new_message.php" data-toggle="tooltip" data-placement="bottom" title="Message" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/message.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title=" Play Video" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/video.png"></a> <a href="" data-toggle="tooltip" data-placement="bottom" title="Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/call.png"></a> </div>
        </div>
       <!--<div class="col-md-12 text-center padding0" style="margin-top:10px;"> <a href=""><img class="arrow-btn" src="img/all/arrow-l.png"></a> <a href="#/counsellors">
          <button style="margin:0 20px;" class="btn btn-2" type="button">ALL COUNSELLORS</button>
          </a> <a href=""><img class="arrow-btn" src="img/all/arrow-r.png"></a> </div>-->
      </div>
    </div>
  </div>
</section>
<!--Articles-->
<section id="articles" class="auto-center sect-style">
  <div class="container">
    <div class="row">
      <h1 class="main-heading">Articles</h1>
      <div class="col-md-12 padding0">
        <div class="col-md-3 text-center art-sect" ng-repeat="article in articleList">
          <div><a class="art-sec-main"  ng-click="onViewa(article.art_id)"><img class="art-img" src="admin/assets/articles/{{article.art_img}}">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm" style="border-color:#d5d400 transparent transparent;"></div>
          <a href=""><div class="art-heading">{{article.art_title}}</div></a>
          <!--<div class="art-sub-heading">{{article.art_tags}}</div>-->
          <hr class="art-hr">
          <div class="art-days">10 days ago</div>
        </div>
	 </div>
      <!--<div class="col-md-12 text-center" style="margin-top:40px;"> <a href=""><img class="arrow-btn" src="img/all/arrow-l.png"></a> <a href="#/articles">
        <button style="margin:0 20px;" class="btn btn-2" type="button">ALL ARTICLES</button>
        </a> <a href=""><img class="arrow-btn" src="img/all/arrow-r.png"></a> </div>-->
    </div>
  </div>
</section>
</div>