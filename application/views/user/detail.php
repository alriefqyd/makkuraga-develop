<div class="right_col" role="main" style="min-height: 1164px;">
          <div class="">
            <?php
            if(isset($_GET['success'])=="true"){
              ?><div data-var="<?php echo $_GET['success'] ?>" class="notif"></div>
              <?php
            }
             ?>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Profile</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <?php
                    foreach ($user as $user) {

                    ?>
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="<?php echo site_url() ?>assets/images/<?php echo $user['foto'] ?>" alt="Avatar" title="<?php echo base_url() ?>assets/user/user.png">
                        </div>
                      </div>
                      <h3><?php echo $user['nama'] ?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $user['lokasi'] ?>
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $user['level'] ?>
                        </li>
                      </ul>

                      <a class="btn btn-success js-edit-foto" data-toggle="modal" data-target=".modal_edit_foto"><i class="fa fa-edit m-right-xs"></i>Edit Foto</a>
                      <br>
                      <div class="modal fade bs-example-modal-lg modal_edit_foto" tabindex="-1" role="dialog" aria-hidden="true">
                    		<div class="modal-dialog modal-lg">
                    			<div class="modal-content">
                    				<div class="modal-header">
                    					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    					</button>
                    					<h4 class="modal-title" id="myModalLabel">Edit Foto <?php echo $user['nama'] ?></h4>
                    				</div>
                    				<div class="modal-body">
                    					<div class="row">
                    						<div class="col-md-12 col-sm-12 col-xs-12">
                    							<div class="x_panel">
                    								<div class="x_content">
                    									<div class="row">
                    										<div class="col-md-12 col-sm-12 col-xs-12">
                    											<div class="error"></div>
                    										<div class="x_content">
                                        <form action="<?php echo base_url() ?>user/edit-user" method="post" enctype="multipart/form-data" class="form-horizontal">
                    											<div class="item form-group">
                    												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Foto <span class="required">*</span>
                    												</label>
                    												<div class="col-md-6 col-sm-6 col-xs-12 js-input-foto">
                                             <input type="file" name="foto_baru" class="foto form-control"/>
                                             <input type="hidden" name="foto_lama" value="<?php echo $user['foto'] ?>" class="foto form-control"/>
                                           </div>
                                           <div class="error" style="color:red"></div>

                    											</div>
                   											<input type="hidden" name="id" value="<?php echo $user['id'] ?>" class="id_edit_mechanic">
                                        <input type="hidden" name="name" value="<?php echo $user['nama'] ?>" class="id_edit_mechanic">

                                          <div class="ln_solid"></div>
                    											<div class="form-group">
                    												<div class="col-md-6 col-md-offset-3">
                    												 <input name="edit_foto" disabled type="submit" class="btn btn-success btn-edit-foto" value="Edit Foto">
                    											 </div>
                    										 </div>
                    									 </form>
                    									</div>
                    							 </div>
                    						 </div>
                    					 </div>
                    				 </div>
                    			 </div>
                    		 </div>
                    	 </div>
                     </div>
                   </div>
                   </div>
                      <?php
                      }
                      ?>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="" role="" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data Operation <?php echo $this->session->userdata("nama") ?></a>
                          </li>
                        </ul>
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                          <table id="datatable" class="data table table-striped no-margin">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>ID</th>
                              <th>Tanggal</th>
                              <th class="hidden-phone">Model</th>
                              <th>Start HM</th>
                              <th>Stop HM</th>
                              <th>Status</th>
                              <th>Lokasi</th>
                              <th>Shift</th>
                              <th>Tanggal Input</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                              foreach ($operation as $operation) {
                              ?>
                                <tr>
                                  <td><?php echo $no++ ?></td>
                                  <td><?php echo $operation['ID'] ?></td>
                                  <td><?php echo date_indo($operation['tanggal']) ?></td>
                                  <td><?php echo $operation['model'] ?></td>
                                  <td><?php echo $operation['start_hm'] ?></td>
                                  <td><?php echo $operation['stop_hm'] ?></td>
                                  <td><?php echo $operation['status'] ?></td>
                                  <td><?php echo $operation['lokasi'] ?></td>
                                  <td><?php echo $operation['shift'] ?></td>
                                  <td><?php echo date_indo($operation['dateCreated']) ?></td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>
                            <!-- end recent activity -->
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
