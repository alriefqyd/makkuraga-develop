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
           <h5 style="padding-left: 10px">Filter By :</h5>
          <form action="sell" method="GET">
          <div class="col-md-2 col-sm-2 col-xs-12">
              <select name="lokasi" data-placeholder="select" class="form-control select js-auto-submit" style="width:100%">
                <option value="All">Semua Lokasi</option>

                <option <?php if(isset($_GET['lokasi'])){if($_GET['lokasi'] == "Pusat"){echo "selected";}}?> value="Pusat">Pusat</option>
                <option <?php if(isset($_GET['lokasi'])){if($_GET['lokasi'] == "Asera"){echo "selected";}}?> value="Asera">Asera</option>
                <option <?php if(isset($_GET['lokasi'])){if($_GET['lokasi'] == "Kodal"){echo "selected";}}?> value="Kodal">Kodal</option>
                <option <?php if(isset($_GET['lokasi'])){if($_GET['lokasi'] == "low_stock"){echo "selected";}}?> value="low_stock">Low Stock</option>
              </select>
          </div>
          </form>

          <div class="x_content data-backlog">
           <table id="datatable" class="table table-striped table-bordered table-mechanic">
            <thead>
              <tr>
                <?php
                $num=1;
                foreach($table_head as $th)
                {
                  ?>
                  <th><?php echo $th ?></th>
                  <?php
                }
                ?>
              </tr>
            </thead>
            <tbody class="body-backlog">

              <?php
              $num=1;
              foreach($inventory as $inventory)
              {
                ?>
                <tr id="<?php echo $inventory['id_sell']?>">
                  <td><?php echo $num++ ?></td>
                  <td><?php echo date_indo($inventory['tanggal']) ?></td>
                  <td><?php echo $inventory['ID'] ?></td>
                  <td><?php echo $inventory['model'] ?></td>
                  <td><?php echo $inventory['part_number'] ?></td>
                  <td><?php echo $inventory['location'] ?></td>
                  <td><?php echo $inventory['quantity'] ?></td>
                  <td><?php echo $inventory['harga'] ?></td>
                  <td><?php echo $inventory['total'] ?></td>
                </tr>
                <?php
              }
              ?>
              <!-- Modal for edit data -->

              <!--  -->

            </tbody>
          </table>
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Actual Quantity <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input class="form-control col-md-7 col-xs-12 quantity_edit" name="quantity" required="required" type="number">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Ideal Quantity <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input class="form-control col-md-7 col-xs-12 ideal_quantity_edit" name="quantity" required="required" type="number">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Minimum Quantity <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input class="form-control col-md-7 col-xs-12 minimum_quantity_edit" name="quantity" required="required" type="number">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Account Code <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input class="form-control col-md-7 col-xs-12 account_code_edit" required="required" type="text">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Supplier <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input class="form-control col-md-7 col-xs-12 supplier_edit" name="quantity" required="required" type="text">
                                    </div>
                                  </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Alokasi <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input class="form-control col-md-7 col-xs-12 alokasi_edit" name="quantity" required="required" type="number">
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
