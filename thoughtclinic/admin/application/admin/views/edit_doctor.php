<div id="page-wrapper">
    <div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Doctor</h1>
		</div>
		<!-- /.col-lg-12 -->
    </div>
            <!-- /.row -->
    <div class="row">
       <div class="col-lg-12">
            <div class="panel panel-default">
				<div class="panel-heading">
				   Edit Doctor
				</div>
					<div class="panel-body">
	<div class="row">
				<?php
					if($this->session->flashdata('success')){
				?>
					<div class="alert alert-success alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					  <strong><?=$this->session->flashdata('success')?></strong>
					</div>
				<?php
					}
					if($this->session->flashdata('invalid')){
				?>
					<div class="alert alert-danger alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					  <strong><?=$this->session->flashdata('invalid')?></strong>
					</div>
				<?php
					}
				?>
                         <div class="col-lg-6">
                                   <form id="doctor_form" role="form" action="<?=base_url('doctors/modify/'.$this->uri->segment('3'))?>" method="post" enctype="multipart/form-data">
								   
								   
									<div class="form-group">
                                            <label>Doctor Name</label>
                                            <input class="form-control" placeholder="Enter text" name="doc_name" id="doc_name" value="<?=$record['doc_name']?>">
                                       </div>
									   
									   <div class="form-group">
                                            <label>Doctor Specilization</label>
                                            <input class="form-control" placeholder="Enter text" name="doc_spe" id="doc_spe" value="<?=$record['doc_spe']?>">
                                       </div>
									   
									     <?php 
									   $cat = explode(',',$record['doc_cat']);
									   //print_r($lang); exit;
									   
									   ?>
									   
                                        <div class="form-group">
									  <label>Category</label>
									  <select  id="doc_cat"  name="doc_cat[]" style="width:485px;" multiple class="chosen-select" tabindex="8">
										<option value=""></option>
										<option value="Psychology" <?=(in_array("Love & Relationship",$cat))?'selected':''?>>Love & Relationship</option>
										<option value="Self Esteem" <?=(in_array("Self Esteem",$cat))?'selected':''?>>Self Esteem</option>
										<option value="Family issues" <?=(in_array("Family issues",$cat))?'selected':''?>>Family issues</option>
										<option value="Anger Management" <?=(in_array("Anger Management",$cat))?'selected':''?>>Anger Management</option>
										<option value="Social Anxiety" <?=(in_array("Social Anxiety",$cat))?'selected':''?>>Social Anxiety</option>
										<option value="Loneliness" <?=(in_array("Loneliness",$cat))?'selected':''?>>Loneliness</option>
										<option value="Office Stress" <?=(in_array("Office Stress",$cat))?'selected':''?>>Office Stress</option>
										<option value="Marital Issues" <?=(in_array("Marital Issues",$cat))?'selected':''?>>Marital Issues</option>
										<option value="Body image" <?=(in_array("Body image",$cat))?'selected':''?>>Body image</option>
										<option value="Career Confusion" <?=(in_array("Career Confusion",$cat))?'selected':''?>>Career Confusion</option>
										<option value="Grief" <?=(in_array("Grief",$cat))?'selected':''?>>Grief</option>
										<option value="Child Psychology & Parenting" <?=(in_array("Child Psychology & Parenting",$cat))?'selected':''?>>Child Psychology & Parenting</option>
										<option value="Addiction" <?=(in_array("Addiction",$cat))?'selected':''?>>Addiction</option>
										<option value="Exam support & Motivation" <?=(in_array("Exam support & Motivation",$cat))?'selected':''?>>Exam support & Motivation</option>
										<option value="Sexuality" <?=(in_array("Sexuality",$cat))?'selected':''?>>Sexuality</option>
										<option value="LGBT" <?=(in_array("LGBT",$cat))?'selected':''?>>LGBT</option>
										<option value="Masturbation" <?=(in_array("Masturbation",$cat))?'selected':''?>>Masturbation </option>
										<option value="Porn addiction & related" <?=(in_array("Porn addiction & related",$cat))?'selected':''?>>Porn addiction & related</option>
										<option value="Others" <?=(in_array("Others",$cat))?'selected':''?>>Others</option>
										
									  </select>
								      </div>
									   
									    <?php 
									   $qua = explode(',',$record['doc_qua']);
									   //print_r($lang); exit;
									   
									   ?>

				                 <div class="form-group">
									  <label>Doctor Qualification</label>
									  <select  id="doc_qua"  name="doc_qua[]" value="" style="width:485px;" multiple class="chosen-select" tabindex="8">
										<option value=""></option>
										<option value="Psychology" <?=(in_array("Psychology",$qua))?'selected':''?> >Psychology</option>
										<option value="Counseling Psychology" <?=(in_array("Counseling Psychology",$qua))?'selected':''?> >Counseling Psychology</option>
										<option value="Clinical Psychology" <?=(in_array("Clinical Psychology",$qua))?'selected':''?> >Clinical Psychology</option>
										<option value="Life Coach" <?=(in_array("Life Coach",$qua))?'selected':''?> >Life Coach</option>
										<option value="Career Coach" <?=(in_array("Career Coach",$qua))?'selected':''?> >Career Coach</option>
										<option value="Engineer" <?=(in_array("Engineer",$qua))?'selected':''?> >Engineer</option>
										<option value="MBBS" <?=(in_array("MBBS",$qua))?'selected':''?> >MBBS</option>
										<option value="Organization Psychology" <?=(in_array("Organization Psychology",$qua))?'selected':''?> >Organization Psychology</option>
										<option value="Psychotherapist" <?=(in_array("Psychotherapist",$qua))?'selected':''?> >Psychotherapist</option>
										
									  </select>
								  </div>
									   <?php 
									   $lang = explode(',',$record['doc_lang']);
									   //print_r($lang); exit;
									   
									   ?>
									   
									    <div class="form-group">
									  <label>Languages</label>
									  <select  id="doc_lang"  name="doc_lang[]" value="" style="width:485px;" multiple class="chosen-select" tabindex="8">
										<option value=""></option>
										<option value="English" <?=(in_array("English",$lang))?'selected':''?> >English</option>
										<option value="Hindi" <?=(in_array("Hindi",$lang))?'selected':''?> >Hindi</option>
										<option value="Telugu" <?=(in_array("Telugu",$lang))?'selected':''?> >Telugu</option>
										<option value="Marathi" <?=(in_array("Marathi",$lang))?'selected':''?> >Marathi</option>
										<option value="Tamil" <?=(in_array("Tamil",$lang))?'selected':''?> >Tamil</option>
										<option value="Kannada" <?=(in_array("Kannada",$lang))?'selected':''?> >Kannada</option>
										<option value="Malayalam" <?=(in_array("Malayalam",$lang))?'selected':''?> >Malayalam</option>
										
									  </select>
								  </div>
									   
									   <div class="form-group">
                                            <label>Doctor Experience</label>
                                            <input class="form-control" placeholder="Enter text" name="doc_exp" id="doc_exp" value="<?=$record['doc_exp']?>">
                                       </div>
									   
									   <div class="form-group">
                                            <label>Doctor Mobile No</label>
                                            <input class="form-control" placeholder="Enter text" name="doc_mobile" id="doc_mobile" value="<?=$record['doc_mobile']?>">
                                       </div>
									   
									   <div class="form-group">
                                            <label>Doctor Email-Id</label>
                                            <input class="form-control" placeholder="Enter text" name="doc_email" id="doc_email" value="<?=$record['doc_email']?>">
                                       </div>
									   
									   <div class="form-group">
                                            <label>Doctor Address</label>
                                            <textarea class="form-control" placeholder="Enter text" name="doc_add" id="doc_add"><?=$record['doc_add']?></textarea>
                                       </div>
									   
									   
									   
										<div class="form-group">
                                            <label>About Doctor</label>
                                            <textarea class="form-control ckeditor" placeholder="Enter text" name="doc_abt" id="doc_abt"><?=$record['doc_abt']?></textarea>
												<label for="doc_tags" generated="true" class="error"></label>
                                       </div>
										<?php
											if($record['doc_img']!=""){
										?>	
											<img src="<?=base_url('assets/doctors/'.$record['doc_img'])?>" style="max-height:275px !important;overflow:hidden;min-height:275px !important;min-width:275px;max-width:275px;"  />
										<?php			
											}
										?>									   
									   
									  
                              </div>
                                <!-- /.col-lg-6 (nested) -->
							<div class="col-lg-6">
									
										
										 <div class="form-group">
											<label>	Doctor-Tags</label>
											<div class="col-md-14">
											<input class="form-control" name="doc_tags" id="doc_tags"  type="text" data-role="tagsinput" value="<?=$record['doc_tags']?>" >
												<label for="doc_tags" generated="true" class="error"></label>
											<p class="text-danger text-right xsmall">(*Type Tag name and hit enter)</p>
											</div>								
									    </div>	

									    <div class="col-lg-20">
										<div class="panel panel-default">
											<div class="panel-heading">
												Avaliability
											</div>
											<!-- /.panel-heading -->
											<div id="err"></div>
											<div class="panel-body">
												<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
									<tr>
										<th>#</th>
										<th>From</th>
										<th>To</th>														
									</tr>
									</thead>
									<tbody>
									<tr>
										<td>Monday</td>
										<td><input type="text" name="mon"  id="mon"  class="form-control timepicker"  value="<?=$ava['mon']?>" ></td>														
										<td><input type="text" name="mon_other"  id="mon1"  class="form-control timepicker"  value="<?=$ava['mon_other']?>" ></td>														
									</tr>													
									<tr>
										<td>Tuesday</td>
										<td><input type="text" name="tue"  id="tue"   class="form-control timepicker"  value="<?=$ava['tue']?>" ></td>														
										<td><input type="text" name="tue_other"  id="tue1"  class="form-control timepicker"  value="<?=$ava['tue_other']?>" ></td>														
									</tr>													
									<tr>
										<td>Wedsday</td>
										<td><input type="text" name="wed"  id="wed"  class="form-control timepicker"  value="<?=$ava['wed']?>" ></td>														
										<td><input type="text" name="wed_other"  id="wed1"  class="form-control timepicker"   value="<?=$ava['wed_other']?>" ></td>														
									</tr>													
									<tr>
										<td>Thursday</td>
										<td><input type="text" name="thu"  id="thur"  class="form-control timepicker"  value="<?=$ava['thu']?>" ></td>														
										<td><input type="text" name="thu_other"   id="thur1"  class="form-control timepicker"  value="<?=$ava['thu_other']?>"  ></td>														
									</tr>													
									<tr>
										<td>Friday</td>
										<td><input type="text" name="fri"  id="fri"  class="form-control timepicker"  value="<?=$ava['fri']?>" ></td>														
										<td><input type="text" name="fri_other"  id="fri1"  class="form-control timepicker"  value="<?=$ava['fri_other']?>" ></td>													
									</tr>													
									<tr>
										<td>Saturday</td>
										<td><input type="text" name="sat"  id="sat"  class="form-control timepicker"  value="<?=$ava['sat']?>" ></td>														
										<td><input type="text" name="sat_other" id="sat1"    class="form-control timepicker"  value="<?=$ava['sat_other']?>" ></td>														
									</tr>										
									<tr>
										<td>Sunday</td>
										<td><input type="text" name="sun"  id="sun"  class="form-control timepicker"   value="<?=$ava['sun']?>" ></td>													
										<td><input type="text" name="sun_other"  id="mon1"  class="form-control timepicker"  value="<?=$ava['sun_other']?>" ></td>														
									</tr>																
								</tbody>
										</table>
													</div>
													<!-- /.table-responsive -->
												</div>
												<!-- /.panel-body -->
											</div>
										</div>	
	<div class="col-lg-20">
					<div class="panel panel-default">
					<div class="panel-heading">
					Consulting Fee
					</div>
					<!-- /.panel-heading -->
					<div id="err"></div>
					<div class="panel-body">
					<div class="table-responsive">
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
				<td><input type="number" name="text_con"  id="text_con"  class="form-control" value="<?=$record['text_con']?>" ></td>																											
								</tr>													
								<tr>
								<td>Message Consult</td>
								<td><input type="number" name="msg_con"  id="msg_con"   class="form-control" value="<?=$record['msg_con']?>" ></td>																																					
								</tr>													
								<tr>
								<td>Video Consult</td>
								<td><input type="number" name="video_con"  id="video_con"  class="form-control" value="<?=$record['video_con']?>" ></td>																														
								</tr>													
								<tr>
								<td>Phone Consult</td>
								<td><input type="number" name="phone_con"  id="phone_con"  class="form-control" value="<?=$record['phone_con']?>" ></td>		
								</tr>													
							</tbody>
						</table>
					</div>
					<!-- /.table-responsive -->
					</div>
					<!-- /.panel-body -->
					</div>
					</div>	

 <div class="form-group">
											<label>Status</label>
											<select class="form-control" name="doc_status"  id="doc_status" >
												<option value="1" <?=($record['doc_status']==1)?'selected':''?> >Active</option>
												<option value="0" <?=($record['doc_status']==0)?'selected':''?>>In-Active</option>
											</select>
				                      </div>
									  
									   <div class="form-group">
                                            <label>Doctor Image</label>
											<input  type="file" name="up" id="doc_img" accept="Image/png,image/jpeg,image/gif" name= "doc_img" >
                                            
                                        </div>	
														
<button type="submit" style="padding: 6px 60px" class="btn btn-primary">Submit</button>
                                       
                                    </form>					
									   
						   </div>
                               
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                     </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
       </div>
                    <!-- /.panel -->
    </div>
                <!-- /.col-lg-12 -->
</div>
            <!-- /.row -->
</div>
		
<script>
	$(document).ready(function() {
		
		$("#doctor_form").validate({
			  ignore: [],
              debug: false,
			rules: {
				doc_name:{
						required:true,
						minlength:3
				},				
				doc_spe: 'required',
				doc_qua: 'required',
				doc_exp: 'required',
				doc_add: 'required',
				doc_abt:{
                         required: function() 
                        {
                         CKEDITOR.instances.doc_abt.updateElement();
                        },

                         minlength:10
                    },
				doc_tags: 'required',
				doc_email: {
						 required: true,
						  email: true
				},
				doc_mobile: {
						  required: true,
						  number: true,
						  minlength:10,
						  maxlength:12
				},
				
			},
			 messages:
                    {

                    doc_abt:{
                        required:"Please Enter About Doctor ",
                        minlength:"Please enter 10 characters"
                    },
                }
		});
	});

	</script>	
	