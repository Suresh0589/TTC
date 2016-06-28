 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Users </h1>
					
                </div>
                <!-- /.col-lg-12 -->
				
			
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
									
                    <div class="panel panel-default">

                        <div class="panel-heading">
                           Users View
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
                                            <th> Name </th>
                                            <th> Email-ID </th>
                                            <th> Phone No </th>
                                           
                                            <th> Address </th>
                                            <th> City </th>
                                            <th> Registered-On </th>                              
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
												<td><?php echo $row->name; ?></td>
												<td><?php echo $row->email; ?></td>
												<td><?php echo $row->phone; ?></td>
												
												<td><?php echo $row->address; ?></td>
												<td><?php echo $row->city; ?></td>
												<td><?php echo $row->created; ?></td>																								
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