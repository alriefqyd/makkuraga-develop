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
                  <td><?php echo $inventory['location_from'] ?></td>
                  <td><?php echo $inventory['location_to'] ?></td>
                  <td><?php echo $inventory['user'] ?></td>
                  <td><?php echo tgl_ind($inventory['date']) ?></td>
                  <td><?php echo $inventory['quantity_awal'] ?></td>
                  <td><?php echo $inventory['quantity_transfer'] ?></td>
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
                               <input type="hidden" class="part_number_edit">
                               <input type="hidden" class="quantity_compare">
                               <input type="hidden" class="location_from">
                               <input type="hidden" class="location_to">
                               <input type="hidden" class="quantity_location_to">
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
    </div>
  </div>
</div>
</div>
</div>
</div>
