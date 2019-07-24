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
          <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-add_mechanic">Input Mechanic</button><hr/>
          <div class="modal fade bs-example-modal-lg modal-add_mechanic" tabindex="-1" role="dialog" aria-hidden="true">
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
                              <form name="mechanic" class="form-horizontal form-label-left js-add-mechanic" method="post" novalidate>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Nama Mechanic <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="name" class="form-control col-md-7 col-xs-12 name_mechanic" name="name" required="required" type="text">
                                </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Lokasi Mechanic <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="name" class="form-control col-md-7 col-xs-12 location_mechanic" name="location" required="required" type="text">
                                </div>
                              </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                 <input id="send_mechanic" name="submit_all" type="submit" class="btn btn-success" value="Tambah Data">
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
              foreach($mechanic as $mechanic)
              {
            ?>
            <tr id="<?php echo $mechanic['id']?>">

              <td><?php echo $mechanic['id'] ?></td>
              <td><?php echo $mechanic['name'] ?></td>
              <td><?php echo $mechanic['location'] ?></td>
              <td><a href="" data-toggle="modal"
                data-id="<?php echo $mechanic['id'] ?>"
                data-target=".modal_edit_mechanic">
                <i class="fa fa-edit"></i> Edit</a> ||
                <a href="#" class="delete_mechanic"
                data-id="<?php echo $mechanic['id']?>">
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
	 <div class="modal fade bs-example-modal-lg modal_edit_mechanic" tabindex="-1" role="dialog" aria-hidden="true">
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
 												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Nama Mechanic <span class="required">*</span>
 												</label>
 												<div class="col-md-6 col-sm-6 col-xs-12">
 													<input id="name" class="form-control col-md-7 col-xs-12 edit_name_mechanic" name="name" required="required" type="text">
 												</div>
 											</div>
 											<div class="item form-group">
 												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Lokasi Mechanic <span class="required">*</span>
 												</label>
 												<div class="col-md-6 col-sm-6 col-xs-12">
 													<input id="name" class="form-control col-md-7 col-xs-12 edit_location_mechanic" name="location" required="required" type="text">
 												</div>
 											</div>
											<input type="hidden" class="id_edit_mechanic">
 											<div class="ln_solid"></div>
 											<div class="form-group">
 												<div class="col-md-6 col-md-offset-3">
 												 <input name="edit_mechanic" type="submit" class="btn btn-success edit_mechanic" value="Edit Data">
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
