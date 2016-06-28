 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Doctors </h1>
					
                </div>
                <!-- /.col-lg-12 -->
				
			
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
									<a style=" text-decoration: none; color:white" href="<?= base_url('doctors/add') ?>"><button  type="button" class="btn btn-primary"> Add Doctors </a></button>
					                <br></br>
                    <div class="panel panel-default">

                        <div class="panel-heading">
                           Doctors View
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th> Doctor-Name </th>
                                            <th> Doctor-Specilization </th>
                                            <th> Doctor-Email </th>
                                            <th> Doctor-Password </th>
                                            <th> Contact-Mobile </th>                               
                                            <th> Image</th>                                
                                            <th> status</th>
                                            <th> Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									if ($get_data == NULL) {
									?>
										<tr align="center"> <td colspan="9">No Data to display</td></tr>
									<?php
									} else {
										foreach ($get_data as $row) {
										?>
											<tr>
												<td><?php echo $row->doc_name; ?></td>
												<td><?php echo $row->doc_spe; ?></td>
												<td><?php echo $row->doc_email; ?></td>
												<td><?php echo $row->doc_pass; ?></td>
												<td><?php echo $row->doc_mobile; ?></td>
												<td><img src="<?=($row->doc_img=="")?base_url('assets/doctors/default_shop.png'):base_url('/assets/doctors/'.$row->doc_img); ?>" class="img-responsive" /></td>
												<td><?=($row->doc_status=='1')?'<span class="label label-success">Active</span>':'<span class="label label-warning">In-Active</span>'?></td>          
												         
												<td>
													
													<a href="<?= base_url('doctors/edit/'.$row->doc_id) ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
													<a href="<?= base_url('doctors/del/'.$row->doc_id) ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
												</td>
											</tr>
										<?php
										}
									}
									?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
					
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<style>
	table tr td img{
		max-width:150px !important;
	}
</style>			