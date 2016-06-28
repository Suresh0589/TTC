<div ng-controller="profileCtrl" ng-init="profileLoad()">
<div style="min-height:70px;"></div>
<section class="text-in-center" style=" background-image: url(img/all/newmessage.jpg);background-size: cover; min-height:120px; position:relative;background-color: #91a1a1;">
  <h1 class="text-center" style="color:#fff; font-weight: 600;">Profile</h1>
  <span class="arrow-top"></span></section>
<div class="arrow-btm"></div>

<section style="margin:20px 0 70px 0;">
  <div class="container text-center" >
    <div class="row" >
		<div ng-show="msgd" class="alert alert-danger alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
	  </div>
	  <div ng-show="msgs" class="alert alert-success alert-dismissible" role="alert">						 
			<strong >{{reg_msg}}</strong>
		</div>
		<form name="profileForm">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-4" for="name">Name</label>
				<input type="text" name="doc_name" ng-model="profile.doc_name" placeholder="Name *" class="form-control col-md-8" required>
			</div>
			<div class="form-group">
				<label class="col-md-4" for="name">Mobile</label>
				<input type="text" name="doc_mobile" ng-model="profile.doc_mobile" placeholder="Mobile *" class="form-control col-md-8" maxlength="10" ng-pattern="/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/" required>
				<p ng-show="profile.doc_mobile.$invalid && !profile.doc_mobile.$pristine" class="help-block"> Mobile no. is required.</p>
			</div>
			<div class="form-group">
				<label class="col-md-4" for="specialisation">Specialisation</label>
				<input type="text" name="doc_spe" ng-model="profile.doc_spe" placeholder="" class="col-md-8 form-control">
			</div>  
			
			<div class="form-group">
				<label class="col-md-4" for="experience">Experience</label>
				<input type="text" maxlength="2" name="doc_exp" ng-model="profile.doc_exp" placeholder="" class="col-md-8 form-control">
			</div>   
			<div class="form-group">
				<label class="col-md-4" for="category">Category</label>
				
				<select required name="doc_cat" ng-model="profile.doc_cat"  chosen multiple class="col-md-8 form-control">
					<option value=""></option>
					<option value="Love & Relationship">Love & Relationship</option>
					<option value="Self Esteem">Self Esteem</option>
					<option value="Family issues">Family issues</option>
					<option value="Anger Management">Anger Management</option>
					<option value="Social Anxiety">Social Anxiety</option>
					<option value="Loneliness">Loneliness</option>
					<option value="Office Stress">Office Stress</option>
					<option value="Marital Issues">Marital Issues</option>
					<option value="Body image">Body image</option>
					<option value="Career Confusion">Career Confusion</option>
					<option value="Grief">Grief</option>
					<option value="Child Psychology & Parenting">Child Psychology & Parenting</option>
					<option value="Addiction">Addiction</option>
					<option value="Exam support & Motivation">Exam support & Motivation</option>
					<option value="Sexuality">Sexuality</option>
					<option value="LGBT">LGBT</option>
					<option value="Masturbation ">Masturbation </option>
					<option value="Porn addiction & related">Porn addiction & related</option>
					<option value="Others">Others</option>
				</select>

			</div>
			<div class="form-group">
				<label class="col-md-4" for="languages">Languages</label>
				
				<select required name="doc_lang" ng-model="profile.doc_lang"  chosen multiple class="col-md-8 form-control">
					<option value=""></option>
					<option value="English">English</option>
					<option value="Hindi">Hindi</option>
					<option value="Telugu">Telugu</option>
					<option value="Marathi">Marathi</option>
					<option value="Tamil">Tamil</option>
					<option value="Kannada">Kannada</option>
					<option value="Malayalam">Malayalam</option>

				</select>

			</div>
			<div class="form-group">
				<label class="col-md-4" for="qualification">Qualification</label>
				
				<select required name="doc_qua" ng-model="profile.doc_qua"  chosen multiple class="col-md-8 form-control">
					<option value=""></option>
					<option value="Psychology">Psychology</option>
					<option value="Counseling Psychology">Counseling Psychology</option>
					<option value="Clinical Psychology">Clinical Psychology</option>
					<option value="Life Coach">Life Coach</option>
					<option value="Career Coach">Career Coach </option>
					<option value="Engineer">Engineer</option>
					<option value="MBBS">MBBS</option>
					<option value="Organization Psychology">Organization Psychology</option>
					<option value="Psychotherapist">Psychotherapist</option>
				</select>
			</div> 
			<div class="form-group">
				<label class="col-md-4" for="address">Address</label>
				<textarea type="text" name="doc_add" ng-model="profile.doc_add" placeholder="Address *" class="form-control col-md-8" required></textarea>
			</div>	
			<div class="form-group">
				<label class="col-md-4" for="photo">Photo</label>
				<div class="col-md-8">
					<input type="file" ngf-select ng-model="picFile" name="file"    
				 accept="image/*" ngf-max-size="2MB" 
				 ngf-model-invalid="errorFile">
				  <i ng-show="myForm.file.$error.required">*required</i><br>
				  <i ng-show="myForm.file.$error.maxSize">File too large 
					  {{errorFile.size / 1000000|number:1}}MB: max 2M</i>
				  <img   ng-src="admin/assets/doctors/{{profile.doc_img}}" ngf-thumbnail="picFile" class="thumb" style="visibility:visible !important;display:block !important;">
				  <button ng-click="picFile = null" ng-show="picFile">Remove</button>
		  
				</div>
			</div>	
		</div>
		<div class="col-md-6">
			
			<div class="form-group">
				<label  for="about">About Yourself</label>           
				<textarea data-ck-editor class="form-control ckeditor" data-validation-required-message="Please enter a message." required name="doc_abt" ng-model="profile.doc_abt" placeholder="Your Message *" style="height: 115px; margin-bottom: 15px; padding: 15px;"></textarea>     
			</div>
			
			<div class="form-group">
				<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr>
				<th>#</th>
				<th>Fee &nbsp;<i class="fa fa-inr"></i> </th>												
				</tr>
				</thead>
				<tbody>
					<tr>
					<td>Text Consult</td>
					<td><input type="number" name="text_con" ng-model="profile.text_con" required  class="form-control" ></td>																											
					</tr>													
					<tr>
					<td>Message Consult</td>
					<td><input type="number" name="msg_con" ng-model="profile.msg_con" required  class="form-control" ></td>																																					
					</tr>													
					<tr>
					<td>Video Consult</td>
					<td><input type="number" name="video_con"  ng-model="profile.video_con" required class="form-control" ></td>																														
					</tr>													
					<tr>
					<td>Phone Consult</td>
					<td><input type="number" name="phone_con" ng-model="profile.phone_con" required id="phone_con" class="form-control" ></td>		
					</tr>													
				</tbody>
			</table>     
			</div>
		</div>
				
	   
			
		<button  class="btn btn-3" type="submit" ng-click="updateProfile(picFile)" data-ng-disabled="profileForm.$invalid" >Update</button>    
		</form>  
    </div>
  </div>
</section>

</div>
  <style type="text/css">
    .thumb {
    width: 150px;
    height: 150px;
    float: none;
    position: relative;
    top: 7px;
}

form .progress {
    line-height: 15px;
}
}

.progress {
    display: inline-block;
    width: 100px;
    border: 3px groove #CCC;
}

.progress div {
    font-size: smaller;
    background: orange;
    width: 0;
}
  </style>
