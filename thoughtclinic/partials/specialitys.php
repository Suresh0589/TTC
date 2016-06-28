<div ng-init="getAllSpecialitys()">
<div style="min-height:90px;" ></div>
<section class="text-in-center" style=" background-image: url(img/all/newmessage.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">SPECIALITY CLINICS</h1>
  <span class="arrow-top"></span></section>


<div class="arrow-btm"></div>


<section>
<div class="container">
<div class="row" >

      <div class="col-md-12 padding0">
        <div class="col-md-3 text-center art-sect" ng-repeat="spe in specialityList">
          <div><a class="art-sec-main"  ng-click="onView(spe.spe_id)"><img class="art-img" ng-src="admin/assets/speciality/{{spe.spe_img}}">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm" style="border-color:#d5d400 transparent transparent;"></div>
          <a href=""><div class="art-heading">{{spe.spe_title}}</div></a>
          <div class="art-sub-heading">{{article.art_tags}}</div>
          <hr class="art-hr">
          <div class="art-days">{{spe.spe_time}}</div>
        </div>
        
        
      </div>

</div>


</div>

</section>

</div>




