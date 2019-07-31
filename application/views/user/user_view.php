<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?php echo $title_bar ?><small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-add_user">Input User</button><hr/>
          <div class="modal fade bs-example-modal-lg modal-add_user" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Input User</h4>
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
                              <form name="user" class="form-horizontal form-label-left js-add-user" method="post" novalidate>
                               <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Nama <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="name" class="form-control col-md-7 col-xs-12 nama" name="nama" data-rule-required="true" type="text">
                                </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">Masukkan User Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="name" class="form-control col-md-7 col-xs-12 user_name" name="user_name" required="required" type="text">
                                </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Masukkan Password <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="password" name="password" class="form-control col-md-7 col-xs-12 password" required="required">
                                </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Level <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="status" id="heard" class="form-control level" style="width:100%">
                                <option value="Master Admin">Master Admin</option>
                                <option value="Inventory Admin All Area">Inventory Admin All Area</option>
                                <option value="Mekanik Admin All Area">Mekanik Admin All Area</option>
                                <option value="Admin All Area">Admin All Area</option>
                                <option value="Admin Kodal">Admin Kodal</option>
                                <option value="Inventory Admin Kodal">Inventory Admin Kodal</option>
                                <option value="Admin Asera">Admin Asera</option>
                                <option value="Inventory Admin Asera">Inventory Admin Asera</option>
                                <option value="User Asera">User Asera</option>
                                <option value="User Kodal">User Kodal</option>
                                <option value="User All Area">User All Area</option>

                               </select>
                                 </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Masukkan Lokasi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="prioritas" id="heard" class="form-control lokasi" style="width:100%">
                                <option value="Asera">Asera</option>
                                <option value="Kodal">Kodal</option>
                               </select>
                                 </div>
                              </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                 <input id="send_user" name="submit_all" type="submit" class="btn btn-success" value="Tambah Data">
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
     <div class="x_content data-backlog">
       <table id="datatable" class="table table-striped table-bordered table-mechanic">
        <thead>
          <tr>
            <?php foreach($table_head as $data_head){ ?>
              <th><?php echo $data_head ?></th>
            <?php } ?>
          </tr>
       </thead>
       <tbody class="body-backlog">

            <?php
              $num=1;
              foreach($user as $user)
              {
            ?>
            <tr id="<?php echo $user['id']?>">

              <td><?php echo $user['id'] ?></td>
              <td><?php echo $user['nama'] ?></td>
              <td><?php echo $user['user_name'] ?></td>
              <td><?php echo $user['password'] ?></td>
              <td><?php echo $user['level'] ?></td>
              <td><?php echo $user['lokasi'] ?></td>
              <td><a href="" data-toggle="modal"
                data-id="<?php echo $user['id'] ?>"
                data-target=".modal_edit_user">
                <i class="fa fa-edit"></i> Edit</a> ||
                <a href="#" class="delete_mechanic"
                data-id="<?php echo $user['id']?>">
                <i class="fa fa-trash"></i>Delete</a>
              </td>

              </tr>
            <?php
            }
            ?>
            <!-- Modal for edit data -->

            <!--  -->

       </tbody>
   </table>
   <?php
      $a = $editUser
   ?>
   <div class="modal fade bs-example-modal-lg modal_edit_user" tabindex="-1" role="dialog" aria-hidden="true">
 		<div class="modal-dialog modal-lg">
 			<div class="modal-content">
 				<div class="modal-header">
 					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
 					</button>
 					<h4 class="modal-title" id="myModalLabel">Edit User</h4>
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
                      <form name="user" class="form-horizontal form-label-left js-edit-user" autocomplete="off" method="post" novalidate>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 nama" name="nama" data-rule-required="true" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">Masukkan User Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 user_name" autocomplete="off" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Masukkan Password Lama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" data-validate-length="6,8" autocomplete="off" class="form-control col-md-7 col-xs-12 password" required="required">
                        </div>
                        <div class="password_error"></div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Masukkan Password Baru <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" name="password" class="form-control col-md-7 col-xs-12 newpassword" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Level <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="status" id="heard" class="form-control level" style="width:100%">
                        <option value="Master Admin">Master Admin</option>
                        <option value="Inventory Admin All Area">Inventory Admin All Area</option>
                        <option value="Mekanik Admin All Area">Mekanik Admin All Area</option>
                        <option value="Admin All Area">Admin All Area</option>
                        <option value="Admin Kodal">Admin Kodal</option>
                        <option value="Inventory Admin Kodal">Inventory Admin Kodal</option>
                        <option value="Admin Asera">Admin Asera</option>
                        <option value="Inventory Admin Asera">Inventory Admin Asera</option>
                        <option value="User Asera">User Asera</option>
                        <option value="User Kodal">User Kodal</option>
                        <option value="User All Area">User All Area</option>
                       </select>
                         </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Masukkan Lokasi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="prioritas" id="heard" class="form-control lokasi" style="width:100%">
                        <option value="Asera">Asera</option>
                        <option value="Kodal">Kodal</option>
                       </select>
                         </div>
                      </div>
                      <input type="text" class="id_edit_user">
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                         <input id="send_user_edit" name="submit_all" disabled type="submit" class="btn btn-success" value="Tambah Data">
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

</div>
</div>
</div>
</div>
</div>
</div>
