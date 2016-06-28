

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
                            Add New Doctor
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
                                   <form id="doctor_form" role="form" action="<?=base_url('doctors/create')?>" method="post" enctype="multipart/form-data">
								   
								       <div class="form-group">
                                            <label>Doctor Name</label>
                                            <input class="form-control" placeholder="Enter text" name="doc_name" id="doc_name">
                                       </div>
									   
									   <div class="form-group">
                                            <label>Doctor Specilization</label>
                                            <input class="form-control" placeholder="Enter text" name="doc_spe" id="doc_spe">
                                       </div>


                                      <div class="form-group">
									  <label>Category</label>
									  <select  id="doc_cat[]"  name="doc_cat[]" style="width:485px;" multiple class="chosen-select" tabindex="8">
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
									  <label>Languages</label>
									  <select  id="doc_lang[]"  name="doc_lang[]" style="width:485px;" multiple class="chosen-select" tabindex="8">
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
									  <label>Doctor Qualification</label>
									  <select  id="doc_qua[]"  name="doc_qua[]" style="width:485px;" multiple class="chosen-select" tabindex="8">
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
                                            <label>Doctor Experience</label>
                                            <input class="form-control" placeholder="Enter text" name="doc_exp" id="doc_exp">
                                       </div>
									   
									   <div class="form-group">
                                            <label>Doctor Mobile No</label>
                                            <input class="form-control" placeholder="Enter text" name="doc_mobile" id="doc_mobile">
                                       </div>
									   
									   <div class="form-group">
                                            <label>Doctor Email-Id</label>
                                            <input class="form-control" placeholder="Enter text" name="doc_email" id="doc_email">
                                       </div>
									   
									   <div class="form-group">
									   
                                            <label>Doctor Address</label>
                                            <textarea class="form-control" placeholder="Enter text" name="doc_add" id="doc_add"></textarea>
											 
                                       </div>
									   
									    <div class="form-group">
                                            <label>About Doctor</label>
                                            <textarea class="form-control ckeditor" placeholder="Enter text" name="doc_abt" id="doc_abt"></textarea>
											<label for="doc_abt" generated="true" class="error"></label>
                                       </div>
									   
									    <div class="form-group">
                                            <label>Doctor Image</label>
											<input  type="file" name="up" id="doc_img" accept="Image/png,image/jpeg,image/gif" name= "doc_img" >
                                            
                                        </div>
									
								 </div>
									   
									     
										 
										 <div class="col-lg-6">
									  
									   
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
										<td id="datepairExample">Monday</td>
										<td><input type="text" name="mon"  id="mon"  class="form-control timepicker" value="" ></td>														
										<td><input type="text" name="mon_other"  id="mon1"  class="form-control timepicker" value="" ></td>														
									</tr>													
									<tr>
										<td>Tuesday</td>
										<td><input type="text" name="tue"  id="tue"   class="form-control timepicker" value="" ></td>														
										<td><input type="text" name="tue_other"  id="tue1"  class="form-control timepicker" value="" ></td>														
									</tr>													
									<tr>
										<td>Wedsday</td>
										<td><input type="text" name="wed"  id="wed"  class="form-control timepicker" value="" ></td>														
										<td><input type="text" name="wed_other"  id="wed1"  class="form-control timepicker"  value="" ></td>														
									</tr>													
									<tr>
										<td>Thursday</td>
										<td><input type="text" name="thu"  id="thur"  class="form-control timepicker" value="" ></td>														
										<td><input type="text" name="thu_other"   id="thur1"  class="form-control timepicker" value=""  ></td>														
									</tr>													
									<tr>
										<td>Friday</td>
										<td><input type="text" name="fri"  id="fri"  class="form-control timepicker" value="" ></td>														
										<td><input type="text" name="fri_other"  id="fri1"  class="form-control timepicker" value="" ></td>													
									</tr>													
									<tr>
										<td>Saturday</td>
										<td><input type="text" name="sat"  id="sat"  class="form-control timepicker" value="" ></td>														
										<td><input type="text" name="sat_other" id="sat1" class="form-control timepicker" value="" ></td>														
									</tr>										
									<tr>
										<td>Sunday</td>
										<td><input type="text" name="sun"  id="sun"  class="form-control timepicker"  value="" ></td>													
										<td><input type="text" name="sun_other"  id="mon1"  class="form-control timepicker" value="" ></td>														
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
														<td><input type="number" name="text_con"  id="text_con"  class="form-control" value="" ></td>																											
														</tr>													
														<tr>
														<td>Message Consult</td>
														<td><input type="number" name="msg_con"  id="msg_con"   class="form-control" value="" ></td>																																					
														</tr>													
														<tr>
														<td>Video Consult</td>
														<td><input type="number" name="video_con"  id="video_con"  class="form-control" value="" ></td>																														
														</tr>													
														<tr>
														<td>Phone Consult</td>
														<td><input type="number" name="phone_con"  id="phone_con"  class="form-control" value="" ></td>		
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
											<label>	Doctor-Tags</label>
											<div class="col-md-14">
											<input class="form-control" name="doc_tags" id="doc_tags"  type="text" data-role="tagsinput" >
											<label for="doc_tags" generated="true" class="error"></label>
											<p class="text-danger text-right xsmall">(*Type Tags name and hit enter)</p>
											</div>								
									    </div>			
                                       
								 
									  <button type="submit" style="padding: 6px 60px" class="btn btn-primary">Submit</button>	
                                      
										
		                                </div>								
										   
									
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
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
				up: 'required',
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
					up:{
                        required:"Please Upload Doctor Image",
                    }
                }
		});
	});

	</script>	
	