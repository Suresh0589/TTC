<div id="page-wrapper">
    <div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Article</h1>
		</div>
		<!-- /.col-lg-12 -->
    </div>
            <!-- /.row -->
    <div class="row">
       <div class="col-lg-8">
            <div class="panel panel-default">
				<div class="panel-heading">
				   Edit Article
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
                         <div class="col-lg-8">
                                   <form id="article_form" role="form" action="<?=base_url('articles/modify/'.$this->uri->segment('3'))?>" method="post" enctype="multipart/form-data">
								   
								   
									<div class="form-group">
                                            <label>Article Title</label>
                                            <input class="form-control" placeholder="Enter text" name="art_title" id="art_title" value="<?=$record['art_title']?>">
                                       </div>
									
									   <div class="form-group">
                                            <label>Article Content</label>
                                            <textarea class="form-control ckeditor" placeholder="Enter text" name="art_content" id="art_content"><?=$record['art_content']?></textarea>
											<label for="art_content" generated="true" class="error"></label>
                                       </div>
									   
									   <div class="form-group">
											<label>	Article-Tags</label>
											<div class="col-md-14">
											<input class="form-control" name="art_tags" id="art_tags"  type="text" data-role="tagsinput" value="<?=$record['art_tags']?>" >
											<label for="art_tags" generated="true" class="error"></label>
											<p class="text-danger text-right xsmall">(*Type Tag name and hit enter)</p>
											</div>								
									    </div>		
									    <div class="form-group">
                                            <label>Article Image</label>
											<input  type="file" name="up" id="art_img" accept="Image/png,image/jpeg,image/gif" name= "art_img" >
                                            
                                        </div>	
									   <div class="form-group">
											<label>Status</label>
											<select class="form-control" name="art_status"  id="art_status" >
												<option value="1" <?=($record['art_status']==1)?'selected':''?> >Active</option>
												<option value="0" <?=($record['art_status']==0)?'selected':''?>>In-Active</option>
											</select>
				                      </div>
				
									<button type="submit" class="btn btn-primary">Submit</button>
                                       
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
		
		$("#article_form").validate({
			  ignore: [],
              debug: false,
			rules: {		
				art_title: 'required',
				art_content:{
                         required: function() 
                        {
                         CKEDITOR.instances.art_content.updateElement();
                        },

                         minlength:10
                    },
				art_tags: 'required',
			},
			messages:
                    {
                    art_content:{
                        required:"Please Enter About Aricle ",
                        minlength:"Please enter 10 characters"
                    }
                }
		});
	});

</script>	