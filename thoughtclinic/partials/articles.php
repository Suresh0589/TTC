<div ng-init="getAllArticles()">
<div style="min-height:90px;" ></div>
<!--
<section class="text-in-center" style=" background-image:url(img/signin-page/signin-bg.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">SIGNIN OR REGISTER</h1>
  <span class="arrow-top"></span></section>
<div class="arrow-btm"></div>-->

<section >
  <div class=" container" style="width:100%;">
    <div class="row">
      <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
          <hr style="width: 40%;">
          <h1 style="color:#FFF; font-weight:700;">ARTICLES</h1>
          <span class="arrow-top" style="bottom: -28px;"></span>
        </ol>
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div ng-repeat="art in articleListLimit" ng-class="{active: $index == 0}" class="item" style="background-image:url(admin/assets/articles/{{art.art_img}}); background-size:cover; min-height:300px;">
            <div class="carousel-caption">
              <h2 class="carousel-caption-text">{{art.art_title}}</h2>
            </div>
          </div>
          
        </div>
        
        <!-- Left and right controls --> 
        <a class="left carousel-control auto-center"  role="button" data-slide="prev"> <span class="glyphicon" aria-hidden="true"><img src="img/articles/slid-arw-1.png"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control auto-center"  role="button" data-slide="next"> <span class="glyphicon" aria-hidden="true"><img src="img/articles/slid-arw-2.png"></span> <span class="sr-only">Next</span> </a> </div>
    </div>
  </div>
</section>

<div class="arrow-btm"></div>


<section>
<div class="container">
<div class="row" >

      <div class="col-md-12 padding0">
        <div class="col-md-3 text-center art-sect" ng-repeat="article in articleList">
          <div><a class="art-sec-main"  ng-click="onView(article.art_id)"><img class="art-img" ng-src="admin/assets/articles/{{article.art_img}}">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm" style="border-color:#d5d400 transparent transparent;"></div>
          <a ng-click="onView(article.art_id)"><div class="art-heading">{{article.art_title}}</div></a>
          <!-- div class="art-sub-heading">{{article.art_tags}}</div -->
          <hr class="art-hr">
          <div class="art-days">{{article.art_time}}</div>
        </div>
        <!--<div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-2.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">7 days ago</div>
        </div>
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-3.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">9 days ago</div>
        </div>
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-4.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">15 days ago</div>
        </div>
        
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-1.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm" style="border-color:#d5d400 transparent transparent;"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">10 days ago</div>
        </div>
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-2.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">7 days ago</div>
        </div>
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-3.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">9 days ago</div>
        </div>
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-4.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">15 days ago</div>
        </div>
        
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-1.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm" style="border-color:#d5d400 transparent transparent;"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">10 days ago</div>
        </div>
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-2.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">7 days ago</div>
        </div>
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-3.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">9 days ago</div>
        </div>
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-4.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">15 days ago</div>
        </div>
        
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-1.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm" style="border-color:#d5d400 transparent transparent;"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">10 days ago</div>
        </div>
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-2.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">7 days ago</div>
        </div>
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-3.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">9 days ago</div>
        </div>
        <div class="col-md-3 text-center art-sect">
          <div><a class="art-sec-main" href="articles_detailes.php"><img class="art-img" src="img/articles/art-bg-4.jpg">
            <div class="art-hov auto-center"> <i class="fa fa-plus-square" aria-hidden="true"></i></div>
          </a></div>
          <div class="art-arrow-btm"></div>
          <a href=""><div class="art-heading">Lorem ipsum is simply dummy text only</div></a>
          <div class="art-sub-heading">simply dummy text</div>
          <hr class="art-hr">
          <div class="art-days">15 days ago</div>
        </div>
        -->
        
      </div>

</div>


</div>

</section>

</div>




