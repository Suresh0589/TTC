<div ng-init="articleLoad()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/articles/art-slid-bg-1.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;background-position: 0 11%;">
  <h1 class="text-center" style="color:#fff; font-weight: 600; text-transform:uppercase;">{{article.art_title}}</h1>
  <span class="arrow-top"></span> </section>
<div class="arrow-btm" style="border-width: 18px 18px 0;"></div>
<section>
  <div class=" container">
    <div class="row">
      <div class="col-md-8">
        <h1 >{{article.art_title}}</h1>
        <h5 class="art-sub-heading2">{{article.art_tags}}</h5>
        <h5><i>{{article.art_time}}</i></h5>
        <img style="margin:20px 0;" ng-src="admin/assets/articles/{{article.art_img}}"  width="100%">
        <p ng-bind-html="art_content"></p>
        <div class="col-md-12 col-sm-12 padding0">
          <!--ul class="coun-menu padding0 margin0" style=" border-right:none;">
            <li style="padding-left:0px;"><a class="btn-outline btn-social  href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a class="btn-outline btn-social" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a class="btn-outline btn-social" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            <li><a class="btn-outline btn-social" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
          </ul-->
			<span class='st_sharethis_large' displayText='ShareThis'></span>
			<span class='st_facebook_large' displayText='Facebook'></span>
			<span class='st_twitter_large' displayText='Tweet'></span>
			<span class='st_linkedin_large' displayText='LinkedIn'></span>
			<span class='st_pinterest_large' displayText='Pinterest'></span>
			<span class='st_email_large' displayText='Email'></span>
			<div share-square="true" share-links="Facebook, Twitter, LinkedIn, Google-Plus" share-title="Article Title"></div>
        </div>
      </div>
      <div class="col-md-4">
        <h3 style="font-weight:700;">MORE ARTICLES</h3>
        <div class="col-md-12 padding0 side-ari-sct"  ng-repeat="articles in articleList">
          <div class="col-md-4 padding0"><img ng-src="admin/assets/articles/{{articles.art_img}}" width="100%"/></div>
          <div class="col-md-8">
            <a ng-click="onView(articles.art_id)"><div class="art-heading" style="margin-top:0px;">{{articles.art_title}}</div></a>
            <!--div class="art-sub-heading">{{articles.art_tags}}</div-->
          </div>
          <div class="col-md-8"></div>
        </div>
       </div>
    </div>
  </div>
</section>


<section style="margin:30px 0 50px 0;">
<div class="container">
<div class="row">
<div class="col-md-12" style="color:#d5d400;"><h2>COMMENTS</h2> <a style="float:left" ng-click="showComnts()">Show Comments</a></div>

<div ng-show="comnts" class="comments-list">
	<div class="col-md-12 padding0 side-ari-sct"  ng-repeat="comment in commentList">
	  
	  <div class="col-md-1 col-sm-1" style="width:5% !important">
		<i class="fa fa-comments fa-3" style="color:#00cccc;font-size:40px;" aria-hidden="true"></i>
	  </div>
	  <div class="col-md-11 col-sm-11">
		
		<div class="art-heading" style="margin-top:0px;">{{comment.txt}}</div>
		<div class="art-days">{{comment.name}}</div>
	  </div>          
	</div>
</div>
<div class="comments-form col-md-6" >
	<form name="commentForm" class="form-horizontal" role="form">
		<div ng-show="msgd" class="alert alert-danger alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
		</div>
		<div ng-show="msgs" class="alert alert-success alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
		</div>	
		<input type="email" placeholder="Email *" class="form-control" name="email" ng-model="comments.email" required focus>
		<input type="text" placeholder="Name *" maxlength="75" class="form-control" name="name" ng-model="comments.name" required focus>
		<textarea placeholder="Comment here *" maxlength="250"  class="form-control" name="txt" ng-model="comments.txt" required focus></textarea>
		
		
		<button class="btn btn-3" style="width:100% !important;" type="button" ng-click="doComment(article.art_id)" data-ng-disabled="commentForm.$invalid">Post</button>
	</form>
</div>

</div>

</div>

</section>

</div>
