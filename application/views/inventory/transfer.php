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
          <form action="transfer" method="GET">
            <div class="col-md-2 col-sm-2 col-xs-12">
             <select name="part_number" data-placeholder="Pilih Part Number" class="form-control select-search js-auto-submit" style="width:100%">
               <option value="">Semua Part Number</option>
               <?php foreach ($part_number as $part_number ) { ?>
                <option <?php if(isset($_GET['part_number'])){if($_GET['part_number'] == $part_number['part_number']){echo "selected";}}?> value="<?php echo $part_number['part_number'] ?>"><?php echo $part_number['part_number'] ?></option>
              <?php } ?>
            </select> 
          </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
              <select name="lokasi" data-placeholder="Lokasi" class="form-control select-search js-auto-submit" style="width:100%">
                <option value="">Semua Lokasi</option>
                <option <?php if(isset($_GET['lokasi'])){if($_GET['lokasi'] == "Pusat"){echo "selected";}}?> value="Pusat">Pusat</option>
                <option <?php if(isset($_GET['lokasi'])){if($_GET['lokasi'] == "Asera"){echo "selected";}}?> value="Asera">Asera</option>
                <option <?php if(isset($_GET['lokasi'])){if($_GET['lokasi'] == "Kodal"){echo "selected";}}?> value="Kodal">Kodal</option>
              </select>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12">
              <select name="account_code" data-placeholder="Pilih Account Code" class="form-control select-search js-auto-submit" style="width:100%">
               <option value="">Semua Account Code</option>
               <?php foreach ($account_code as $account_code ) { ?>
                <option <?php if(isset($_GET['account_code'])){if($_GET['account_code'] == $account_code['account_code']){echo "selected";}}?> value="<?php echo $account_code['account_code'] ?>"><?php echo $account_code['account_code'] ?></option>
              <?php } ?>
              </select> 
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
               <select name="category" data-placeholder="Category" class="form-control select-search js-auto-submit" style="width:100%">
                 <option value="">Semua Category</option>
                 <?php foreach ($category as $category ) { ?>
                  <option <?php if(isset($_GET['category'])){if($_GET['category'] == $category['category']){echo "selected";}}?> value="<?php echo $category['category'] ?>"><?php echo $category['category'] ?></option>
                <?php } ?>
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
                  <td>
                    <a href="" data-toggle="modal"
                    data-id="<?php echo $inventory['id'] ?>"
                    data-location="<?php echo $inventory['location'] ?>"
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
                               <div class="item form-group hidden hidden-form-transfer" style="color:red">
                                 <label class="col-md-12 col-sm-12 col-xs-12">Lokasi Tujuan Transfer Belum Memiliki Data Inventory, Silahkan Mengisi Data Inventory Dibawah <span class="required"></span>
                                 </label>
                               </div>
                               <div class="item form-group hidden hidden-form-transfer">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Deskripsi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                  <textarea id="textarea" rows="6" required="required" name="deskripsi" class="form-control col-md-7 col-xs-12 description"></textarea>
                                </div>
                              </div>
                              <div class="item form-group hidden hidden-form-transfer">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Masukkan Category <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select name="prioritas" class="form-control select category" style="width:100%">
                                    <option value="Filter">Filter</option>
                                    <option value="Lubricant">Lubricant</option>
                                  </select>
                                </div>
                              </div>
                              <div class="item form-group hidden hidden-form-transfer">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Cost <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input class="form-control col-md-7 col-xs-12 cost" name="name" required="required" type="text">
                                </div>
                              </div>
                              <div class="item form-group hidden hidden-form-transfer">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Price <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input class="form-control col-md-7 col-xs-12 price_" name="name" required="required" type="text">
                                </div>
                              </div>
                              <div class="item form-group hidden hidden-form-transfer">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Ideal Quantity <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input class="form-control col-md-7 col-xs-12 ideal_quantity" name="quantity" required="required" type="number">
                                </div>
                              </div>
                              <div class="item form-group hidden hidden-form-transfer">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Minimum Quantity <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input class="form-control col-md-7 col-xs-12 minimum_quantity" name="quantity" required="required" type="number">
                                </div>
                              </div>
                              <div class="item form-group hidden hidden-form-transfer">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Account Code <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input class="form-control col-md-7 col-xs-12 account_code" required="required" type="text">
                                </div>
                              </div>
                              <div class="item form-group hidden hidden-form-transfer">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Supplier <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input class="form-control col-md-7 col-xs-12 supplier" name="supplier" required="required" type="text">
                                </div>
                              </div>
                              <div class="item form-group hidden hidden-form-transfer">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Alokasi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input class="form-control col-md-7 col-xs-12 alokasi" name="alokasi" required="required" type="text">
                                </div>
                              </div>
                              <div class="ln_solid"></div>
                              <input type="hidden" class="id_transfer">
                              <input type="hidden" class="part_number_edit">
                              <input type="hidden" class="quantity_compare">
                              <input type="hidden" class="location_from">
                              <input type="hidden" class="location_to">
                              <input type="hidden" class="quantity_location_to">
                              <div class="form-group">
                               <div class="col-md-6 col-md-offset-3">
                                <input id="transfer_inventory" name="submit_all" type="submit" class="btn btn-success btn-transfer-inventory" value="Transfer Data"/>
                                <div class="btn-error-msg-account hidden" style="color: red; padding-top: 10px">Pastikan data account code terisi</div>
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
