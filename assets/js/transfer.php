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
          <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-add-inventory">Input Mechanic</button><hr/>
          <form action="transfer" method="GET">
          <div class="col-md-2 col-sm-2 col-xs-2">
              <select name="lokasi" data-placeholder="select" class="form-control select js-auto-submit" style="width:100%">
                <option value="All">Semua Lokasi</option>
                <option <?php if(isset($_GET['lokasi'])){if($_GET['lokasi'] == "Pusat"){echo "selected";}}?> value="Pusat">Pusat</option>
                <option <?php if(isset($_GET['lokasi'])){if($_GET['lokasi'] == "Asera"){echo "selected";}}?> value="Asera">Asera</option>
                <option <?php if(isset($_GET['lokasi'])){if($_GET['lokasi'] == "Kodal"){echo "selected";}}?> value="Kodal">Kodal</option>
              </select>
          </div>
          </form>
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
              foreach($inventory as $inventory)
              {
            ?>
            <tr id="<?php echo $inventory['id']?>">
              <td><?php echo $inventory['id'] ?></td>
              <td><?php echo $inventory['part_number'] ?></td>
              <td><?php echo $inventory['description'] ?></td>
              <td><?php echo $inventory['category'] ?></td>
              <td><?php echo $inventory['cost'] ?></td>
              <td><?php echo $inventory['price'] ?></td>
              <td><?php echo $inventory['location'] ?></td>
              <td><?php echo $inventory['quantity'] ?></td>
              <td><?php echo $inventory['account_code'] ?></td>
              <td><a href="" data-toggle="modal"
                data-id="<?php echo $inventory['id'] ?>"
                data-target=".modal_edit_inventory">
                <i class="fa fa-edit"></i> Edit</a> ||
                <a href="" data-toggle="modal"
                data-id="<?php echo $inventory['id'] ?>"
                data-target=".modal_transfer_inventory">
                <i class="fa fa-send"></i> Transfer</a>
              </td>

              </tr>
            <?php
            }
            ?>
            <!-- Modal for edit data -->

            <!--  -->

       </tbody>
   </table>
<div class="modal fade bs-example-modal-lg modal_transfer_inventory" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-lg">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
       </button>
       <h4 class="modal-title" id="myModalLabel">Transfer Inventory</h4>
     </div>
     <div class="modal-body">
       <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="x_panel">
             <div class="x_content">
               <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                <h3>Anda Akan melakukan transfer Item <p class="js-item-transfer"></p></h3>
                <div class="x_content">
                 <form name="mechanic" class="form-horizontal form-label-left" method="post" novalidate>
                 <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Masukkan Lokasi <span class="required">*</span>
                   </label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                       <select name="prioritas" data-placeholder="select" class="form-control select location_transfer" style="width:100%">
                         <option value="Pusat">Pusat</option>
                         <option value="Asera">Asera</option>
                         <option value="Kodal">Kodal</option>
                       </select>
                   </div>
                 </div>
                 <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Quantity <span class="required">*</span>
                   </label>
                   <div class="error" style="color:red">
                   </div>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                     <input class="form-control col-md-7 col-xs-12 quantity_transfer" name="quantity" required="required" type="number">
                   </div>
                 </div>
                 <div class="ln_solid"></div>
                 <input type="hidden" class="id_transfer">
                 <input type="hidden" class="quantity_compare">
                 <div class="form-group">
                   <div class="col-md-6 col-md-offset-3">
                    <input id="transfer_inventory" name="submit_all" type="submit" class="btn btn-success btn-transfer-inventory" value="Transfer Data">
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
	 <div class="modal fade bs-example-modal-lg modal_edit_inventory" tabindex="-1" role="dialog" aria-hidden="true">
 		<div class="modal-dialog modal-lg">
 			<div class="modal-content">
 				<div class="modal-header">
 					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
 					</button>
 					<h4 class="modal-title" id="myModalLabel">Edit Inventory</h4>
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Part Number <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12 part_number_edit" required="required" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Deskripsi <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-12 col-xs-12">
                            <textarea id="textarea" rows="6" required="required" class="form-control col-md-7 col-xs-12 description_edit"></textarea>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Masukkan Category <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select name="prioritas" class="form-control select category_edit" style="width:100%">
                                <option value="Filter">Filter</option>
                                <option value="Lubricant">Lubricant</option>
                              </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Cost <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12 cost_edit" required="required" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Price <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12 price__edit" required="required" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Masukkan Lokasi <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select name="prioritas" data-placeholder="select" class="form-control select location_edit" style="width:100%">
                                <option value="Pusat">Pusat</option>
                                <option value="Asera">Asera</option>
                                <option value="Kodal">Kodal</option>
                              </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Quantity <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12 quantity_edit" required="required" type="number">
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Account Code <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12 account_code_edit" required="required" type="text">
                          </div>
                        </div>
                        <input type="hidden" class="id_edit_inventory">
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-md-offset-3">
                           <input id="edit_inventory" name="submit_all" type="submit" class="btn btn-success" value="Edit Data">
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
