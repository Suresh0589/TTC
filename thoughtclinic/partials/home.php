<style>
@media(min-width:1200px){
	.col-lg-2 {
		width: 20%;
	}
}
</style>
<div ng-init="loadbasics()">
<div style="height:92px;"></div>
<!--slider-->
<section id="slider" class=" sect-style auto-center" style="background-image:url(img/home-page/slider-bg.jpg); background-size:cover; position: relative;background-position: 20% 0; background-color: #91a1a1;")>
  <div class="container">
    <div class="row">
      <div class="tab-content">
        <div class="col-md-12" style="height:70px;"></div>
        <section id="menu2" class="tab-pane fade in active auto-center">
          <div class="col-md-12 text-center" style=" margin-bottom:20px;">
            <!-- h1 class="slid-text-1">Avoid traffic jams and awkward stares !</h1 -->
            <h1 class="slid-text-2">Consult best Psychologists, from the comfort of your home </h1>
          </div>
          <div class="col-md-12 text-center">
			<form action="#/search" >
            <div  style="max-width: 950px !important; margin: 0 auto; position:relative;">
              <div class="col-md-11 padding0">
                <input class="form-control"  style="border: medium none;" type="text" placeholder="Search by Speciality / Symptom *" name="name">
              </div>
              <div class="col-md-1 padding0">
				
					<button  class="slid-ser-btn-2" type="submit"><img src="img/home-page/search.png"/></button>
				
              </div>
            </div>
			</form>
          </div>
          <div class="col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-2 text-center" style="margin:0 0 10px 0;">
              <div><img src="img/home-page/sli-1-icon-1.png"/></div>
              <h4 style="color: #fff;margin: 0;">Choose your <br>
                Counselor</h4>
            </div>
            <div class="col-md-2 text-center" style="margin:0 0 10px 0;">
              <div><img src="img/home-page/sli-1-icon-2.png"/></div>
              <h4 style="color: #fff;margin: 0;">Pay Consultation<br>
                Fee</h4>
            </div>
            <div class="col-md-2 text-center" style="margin:0 0 10px 0;">
              <div><img src="img/home-page/sli-1-icon-3.png"/></div>
              <h4 style="color: #fff;margin: 0;">Talk to the<br>
                Counselor </h4>
            </div>
          </div>
        </section>
        <section id="menu3" class="tab-pane fade auto-center">
          <div class="col-md-12 text-center" style=" margin-bottom:20px;"">
            <h1 class="slid-text-1">Why wait in queues at the clinic!</h1>
            <h1 class="slid-text-2">Book instant appointments with doctors.</h1>
          </div>
          <div class="col-md-12 text-center">
            <div  style="max-width: 950px !important; margin: 0 auto; position:relative;">
              <div class="col-md-11 padding0">
                <div class="col-md-4" style="padding:0 5px;">
                  <form action="action_page.php">
                    <select class="form-control" name="cars">
                      <option value="volvo">Hyderabad</option>
                      <option value="saab">2</option>
                      <option value="fiat">3</option>
                      <option value="audi">4</option>
                    </select>
                  </form>
                </div>
                <div class="col-md-4" style="padding:0 5px;">
                  <form action="action_page.php">
                    <select class="form-control" name="cars">
                      <option value="volvo">Please authorize and wait...</option>
                      <option value="saab">2</option>
                      <option value="fiat">3</option>
                      <option value="audi">4</option>
                    </select>
                  </form>
                </div>
                <div class="col-md-4" style="padding:0 5px;">
                  <input type="text" name="name" placeholder="User Name *" class="form-control" style="border:medium none;">
                </div>
              </div>
              <div class="col-md-1" style="padding:0 5px;">
                <button class="slid-ser-btn-2" type="button"><img src="img/home-page/search.png"/></button>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-2 text-center" style="margin:0 0 10px 0;">
              <div><img src="img/home-page/sli-2-icon-1.png"/></div>
              <h4 style="color: #fff;margin: 0;">Doctors across<br>
                30 cities</h4>
            </div>
            <div class="col-md-2 text-center" style="margin:0 0 10px 0;">
              <div><img src="img/home-page/sli-2-icon-2.png"/></div>
              <h4 style="color: #fff;margin: 0;">Verified patient<br>
                reviews</h4>
            </div>
            <div class="col-md-2 text-center" style="margin:0 0 10px 0;">
              <div><img src="img/home-page/sli-2-icon-3.png"/></div>
              <h4 style="color: #fff;margin: 0;">Appointments without<br>
                hassle</h4>
            </div>
          </div>
        </section>
        <section id="menu4" class="tab-pane fade auto-center">
          <div class="col-md-12 text-center">
            
            <h1 class="slid-text-2">Specialty Clinics for a focused approach to issues!</h1>
          </div>
          <div class="col-md-12 text-center" style="color:#FFF;">
           
			<div class="col-md-3 text-center art-sect" ng-repeat="spe in specialityList">
			  <div><a class="art-sec-main"  ng-click="onViews(spe.spe_id)"><img class="art-img" ng-src="admin/assets/speciality/{{spe.spe_img}}">
				<div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
			  </a></div>
			  <div class="art-arrow-btm" style="border-color:#d5d400 transparent transparent;"></div>
			  <a ng-click="onViews(spe.spe_id)"><div class="art-heading">{{spe.spe_title}}</div></a>
			  
			</div>
          </div>
        </section>
        <div class="col-md-12" style="height:70px;"></div>
      </div>
      <div>
        <div>
          <ul class="col-md-12 col-xs-12 col-sm-12 col-lg-12 nav nav-tabs" style="padding:0px;">
            <li class="col-md-6 col-sm-4 col-xs-12 col-lg-6 active text-center" style="padding:5px 5px;"><a class="sld-btn" data-toggle="tab" href="#menu2"><img src="img/home-page/sli-btn-chat.png"/> Consult Privately </a></li>
            <!--li class="col-md-4 col-sm-4 col-xs-12 col-lg-4 text-center" style="padding:5px 5px;"><a class="sld-btn" data-toggle="tab" href="#menu3"><img src="img/home-page/sli-btn-book.png"/> Book Appointments</a></li-->
            <li class="col-md-6 col-sm-4 col-xs-12 col-lg-6 text-center auto-center" style="padding:5px 5px;"><a class="sld-btn" data-toggle="tab" href="#menu4"><img src="img/home-page/sli-btn-clinic.png"/> Speciality Clinic</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!--What we do-->
<section id="wwd" class="auto-center sect-style">
  <div class="container">
    <div class="row">
      <h1 class="main-heading">Conditions We Treat</h1>
      <div class="col-md-12 padding0">
      
        <div class="col-md-2 col-xs-12 col-sm-4 col-lg-2 text-center wwd-sec" style="padding: 10px;">
          <div class="col-md-12 wwd-sec-bg" href=""> <img src="img/wwd/Angry.png"/>
            <h4>Anger</h4>
          </div>
          <div class="wwd-sec-hov auto-center">
            <p style=" margin:0px;"> 
              <span> When you feel out of control … </span></p>
          </div>
        </div>
        <div class="col-md-2 col-xs-12 col-sm-4 col-lg-2 text-center wwd-sec" style="padding: 10px;">
          <div class="col-md-12 wwd-sec-bg" href=""> <img src="img/wwd/Depression.png"/>
            <h4>Depression</h4>
          </div>
          <div class="wwd-sec-hov auto-center">
            <p style=" margin:0px;"> 
              <span> When everything feels impossible … </span></p>
          </div>
        </div>
        <div class="col-md-2 col-xs-12 col-sm-4 col-lg-2 text-center wwd-sec" style="padding: 10px;">
          <div class="col-md-12 wwd-sec-bg" href=""> <img src="img/wwd/Mood Swings.png"/>
            <h4>Mood Swings</h4>
          </div>
          <div class="wwd-sec-hov auto-center">
            <p style=" margin:0px;">
              <span>When highs and lows get in the way... </span></p>
          </div>
        </div>
        <div class="col-md-2 col-xs-12 col-sm-4 col-lg-2 text-center wwd-sec" style="padding: 10px;">
          <div class="col-md-12 wwd-sec-bg" href=""> <img src="img/wwd/Grief.png"/>
            <h4>Grief</h4>
          </div>
          <div class="wwd-sec-hov auto-center">
            <p style=" margin:0px;"> 
              <span> When you lose a loved one … </span></p>
          </div>
        </div>
        <div class="col-md-2 col-xs-12 col-sm-4 col-lg-2 text-center wwd-sec" style="padding: 10px;">
          <div class="col-md-12 wwd-sec-bg" href=""> <img src="img/wwd/Obsession.png"/>
            <h4>Obsessions</h4>
          </div>
          <div class="wwd-sec-hov auto-center">
            <p style=" margin:0px;"> 
              <span> When urges or repetitive thoughts don’t stop … </span></p>
          </div>
        </div>
        <div class="col-md-2 col-xs-12 col-sm-4 col-lg-2 text-center wwd-sec" style="padding: 10px;">
          <div class="col-md-12 wwd-sec-bg" href=""> <img src="img/wwd/Concentration.png"/>
            <h4>Concentration</h4>
          </div>
          <div class="wwd-sec-hov auto-center">
            <p style=" margin:0px;"> 
              <span> When everything feels like a distraction... </span></p>
          </div>
        </div>
        
        <div class="col-md-2 col-xs-12 col-sm-4 col-lg-2 text-center wwd-sec" style="padding: 10px;">
          <div class="col-md-12 wwd-sec-bg" href=""> <img src="img/wwd/Stress.png"/>
            <h4>Stress</h4>
          </div>
          <div class="wwd-sec-hov auto-center">
            <p style=" margin:0px;"> 
              <span> When it seems like too much ... </span></p>
          </div>
        </div>
        <div class="col-md-2 col-xs-12 col-sm-4 col-lg-2 text-center wwd-sec" style="padding: 10px;">
          <div class="col-md-12 wwd-sec-bg" href=""> <img src="img/wwd/Relationship.png"/>
            <h4>Relationship</h4>
          </div>
          <div class="wwd-sec-hov auto-center">
            <p style=" margin:0px;">
              <span> When you want to get along... </span></p>
          </div>
        </div>
		<div class="col-md-2 col-xs-12 col-sm-4 col-lg-2 text-center wwd-sec" style="padding: 10px;">
          <div class="col-md-12 wwd-sec-bg" href=""> <img src="img/wwd/Panic.png"/>
            <h4>Panic</h4>
          </div>
          <div class="wwd-sec-hov auto-center">
            <p style=" margin:0px;"> 
              <span> When anxiety overwhelms you ... </span></p>
          </div>
        </div>
        <div class="col-md-2 col-xs-12 col-sm-4 col-lg-2 text-center wwd-sec" style="padding: 10px;">
          <div class="col-md-12 wwd-sec-bg" href=""> <img src="img/wwd/Trauma.png"/>
            <h4>Trauma</h4>
          </div>
          <div class="wwd-sec-hov auto-center">
            <p style=" margin:0px;">
              <span> When you seek healing… </span></p>
          </div>
        </div>
       
        
        
        
      </div>
    </div>
  </div>
</section>
<!--Counsellors-->
<section id="coun" class="auto-center sect-style">
  <div class="container" style="max-width:900px;">
    <div class="row">
      <h1 class="main-heading">Counsellors</h1>
      <div class="col-md-12">
	  
        <div class="col-md-4 text-center coun-sect" style="margin-top:0px;" ng-repeat="doctor in doctorList">
          <div><a class="coun-secn" ng-click="onViewc(doctor.doc_id)"><img class="coun-img" ng-src="admin/assets/doctors/{{doctor.doc_img}}"/>
            <div class="coun-hov auto-center"> <i class="fa fa-plus-circle" aria-hidden="true"></i></div>
            </a></div>
          <div class="coun-heading">{{doctor.doc_name}}</div>
          <div class="coun-sub-heading">{{doctor.doc_spe}}</div>
          <div> <a href="special_friend.php" data-toggle="tooltip" data-placement="bottom" title="Chat" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/chat.png"></a> <a ng-click="onMessage(doctor.doc_id)" data-toggle="tooltip" data-placement="bottom" title="Message" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/message.png"></a> <a  data-toggle="tooltip" data-placement="bottom" title=" Video Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/video.png"></a> <a  data-toggle="tooltip" data-placement="bottom" title="Call" data-original-title="Tooltip on bottom"
   class="red-tooltip"><img class="coun-btm-icon" src="img/counsellors/call.png"></a> </div>
        </div>
       <div class="col-md-12 text-center padding0" style="margin-top:10px;"> <!--a ><img class="arrow-btn" src="img/all/arrow-l.png"></a--> <a href="#/counsellors">
          <button style="margin:0 20px;background-color:#00cccc;" class="btn btn-2" type="button">ALL COUNSELLORS</button>
          </a> <!--a ><img class="arrow-btn" src="img/all/arrow-r.png"></a--> </div>
      </div>
    </div>
  </div>
</section>
<!--Why us-->
<section id="whyus" class="auto-center sect-style">
  <div class="container">
    <div class="row">
      <h1 class="main-heading">why us</h1>
      <div class="col-md-12 padding0">
        <div class="col-md-3 text-center" >
          <div class="why-img"><img src="img/home-page/confidentioal.png"></div>
          <div class="why-arrow-btm"></div>
          <div class="why-heading">Confidential</div>
          <div class=" read-text">Any communication you have with your Thought Clinic counselors is never shared with anyone else</div>
        
        </div>
        <div class="col-md-3 text-center" >
          <div class="why-img"><img src="img/home-page/convinience.png"></div>
          <div class="why-arrow-btm"></div>
          <div class="why-heading">Convenience </div>
          <div class=" read-text">Chat with a counselor of your choice, from the convenience of your home or office 
</div>
         
        </div>
        <div class="col-md-3 text-center" >
          <div class="why-img"><img src="img/home-page/variety.png"></div>
          <div class="why-arrow-btm"></div>
          <div class="why-heading">Variety</div>
          <div class=" read-text">Choose from a wide variety of life coaches, clinical psychologists, psychiatrists etc. from across the country</div>
         
        </div>
        <div class="col-md-3 text-center">
          <div class="why-img"><img src="img/home-page/multiple-channel.png"></div>
          <div class="why-arrow-btm"></div>
          <div class="why-heading">Multiple channels</div>
          <div class=" read-text">You can chat with counselors, message them, talk to them on phone or Video chat with them
</div>
         
        </div>
      </div>
    </div>
  </div>
</section>
<!--Are you a Doctor?-->
<!-- section id="a-doctor" class="auto-center sect-style")>
  <div class="container text-center" style="max-width:600px;">
    <div class="row">
      <h1 class="main-heading" style="color:#00cccc;">Are you a Doctor?</h1>
      <p class="read-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium odio, iure labore nam mollitia nulla porro quis, pariatur optio atque aliquam, enim maiores sint numquam corrupti repellendus! Atque, maxime, dolorem.</p>
      <button style="margin:0 20px;" class="btn btn-2" type="button">more</button>
    </div>
  </div>
</section -->
<!--Articles-->
<section id="articles" class="auto-center sect-style">
  <div class="container">
    <div class="row">
      <h1 class="main-heading">Articles</h1>
      <div class="col-md-12 padding0">
        <div class="col-md-3 text-center art-sect" ng-repeat="article in articleList">
          <div><a class="art-sec-main"  ng-click="onViewa(article.art_id)"><img class="art-img" ng-src="admin/assets/articles/{{article.art_img}}">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm" style="border-color:#d5d400 transparent transparent;"></div>
          <a ng-click="onViewa(article.art_id)"><div class="art-heading">{{article.art_title}}</div></a>
          <!--<div class="art-sub-heading">{{article.art_tags}}</div>-->
          <hr class="art-hr">
          <div class="art-days">{{article.art_time}}</div>
        </div>
	 </div>
      <div class="col-md-12 text-center" style="margin-top:40px;"> 
		<!--a href=""><img class="arrow-btn" src="img/all/arrow-l.png"></a--> <a href="#/articles">
        <button style="margin:0 20px;background-color:#00cccc;" class="btn btn-2" type="button">ALL ARTICLES</button>
        </a> <!--a href=""><img class="arrow-btn" src="img/all/arrow-r.png"></a--> 
		</div>
    </div>
  </div>
</section>

</div>