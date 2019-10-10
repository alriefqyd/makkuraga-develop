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
          <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-add_alat">Input Alat</button><hr/>
          <div class="modal fade bs-example-modal-lg modal-add_alat" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel">Input Alat</h4>
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
                              <form name="alat" class="form-horizontal form-label-left js-add-alat" method="post" novalidate>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan ID Alat <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="ID_alat" class="form-control col-md-7 col-xs-12 ID_alat" name="name" required="required" type="text">
                                </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Serial Number <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="ID_alat" class="form-control col-md-7 col-xs-12 serial_number" name="name" required="required" type="text">
                                </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Model<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="model" class="form-control col-md-7 col-xs-12 model" name="name" required="required" type="text">
                                </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Masukkan Lokasi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="lokasi" id="heard" class="form-control select location" style="width:100%">
                                  <option value="">Pilih Lokasi</option>
                                  <option value="Pusat">Pusat</option>
                                  <option value="Asera">Asera</option>
                                  <option value="Kodal">Kodal</option>
                                </select>
                                </div>
                              </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                 <input id="send_alat" name="submit_all" type="submit" class="btn btn-success" value="Tambah Data">
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
       <table id="datatable" class="table table-striped table-bordered table-alat">
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
              foreach($alat as $alat)
              {
            ?>
            <tr id="<?php echo $alat['id']?>">

              <td><?php echo $alat['id'] ?></td>
              <td><?php echo $alat['ID_alat'] ?></td>
              <td><?php echo $alat['serial_number'] ?></td>
              <td><?php echo $alat['model'] ?></td>
              <td><?php echo $alat['lokasi'] ?></td>
              <td><a href="" data-toggle="modal"
                data-id="<?php echo $alat['id'] ?>"
                data-target=".modal_edit_alat">
                <i class="fa fa-edit"></i> Edit</a> ||
                <a href="#" class="delete_alat"
                data-id="<?php echo $alat['id']?>">
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
	 <div class="modal fade bs-example-modal-lg modal_edit_alat" tabindex="-1" role="dialog" aria-hidden="true">
 		<div class="modal-dialog modal-lg">
 			<div class="modal-content">
 				<div class="modal-header">
 					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
 					</button>
 					<h4 class="modal-title" id="myModalLabel">Input Mechanic</h4>
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
 											<form name="mechanic_edit" class="form-horizontal form-label-left js-edit-mechanic" method="post" novalidate>
 											<div class="item form-group">
 												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan ID Alat <span class="required">*</span>
 												</label>
 												<div class="col-md-6 col-sm-6 col-xs-12">
 													<input id="name" class="form-control col-md-7 col-xs-12 edit_ID_alat" name="name" required="required" type="text">
 												</div>
 											</div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Serial Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 edit_serial_number" name="name" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Model <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 edit_model" name="name" required="required" type="text">
                        </div>
                      </div>
 											<div class="item form-group">
 												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Lokasi <span class="required">*</span>
 												</label>
 												<div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="mechanic" data-id="" name="mechanic_name" class="form-control select edit_lokasi" value="" required style="width:100%">
                            <option class="Pusat" value="Pusat">Pusat</option>
                            <option class="Asera" value="Asera">Asera</option>
                            <option class="Kodal" value="Kodal">Kodal</option>
                          </select>
                        </div>

 											</div>
											<input type="hidden" class="id_edit_alat">
 											<div class="ln_solid"></div>
 											<div class="form-group">
 												<div class="col-md-6 col-md-offset-3">
 												 <input name="edit_alat" type="submit" class="btn btn-success edit_alat" value="Edit Data">
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
