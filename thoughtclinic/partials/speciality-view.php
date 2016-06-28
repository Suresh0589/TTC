<div ng-init="specialityLoad()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/articles/art-slid-bg-1.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;background-position: 0 11%;">
  <h1 class="text-center" style="color:#fff; font-weight: 600; text-transform:uppercase;">{{speciality.spe_title}}</h1>
  <span class="arrow-top"></span> </section>
<div class="arrow-btm" style="border-width: 18px 18px 0;"></div>
<section>
  <div class=" container">
    <div class="row">
      <div class="col-md-8">
        <h1 >{{speciality.spe_title}}</h1>
        <h5 class="art-sub-heading2">{{speciality.spe_tags}}</h5>
        <h5><i>{{speciality.spe_time}}</i></h5>
        <img style="margin:20px 0;" ng-src="admin/assets/speciality/{{speciality.spe_img}}"  width="100%"/>
        <p ng-bind-html="spe_content"></p>
        
      </div>
      <div class="col-md-4">
        <h3 style="font-weight:700;">Counselors</h3>
        <div class="col-md-12 padding0 side-ari-sct"  ng-repeat="doc in doctorList">
          <div class="col-md-4 padding0"><img ng-src="admin/assets/doctors/{{doc.doc_img}}" width="100%"/></div>
          <div class="col-md-8">
            <a ng-click="onViewc(doc.doc_id)"><div class="art-heading" style="margin-top:0px;">{{doc.doc_name}}</div></a>
            <div class="art-sub-heading">{{doc.doc_spe}}</div>
          </div>
          <div class="col-md-8"></div>
        </div>
       </div>
    </div>
  </div>
</section>




</div>
