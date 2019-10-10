<?php
$access = 'disabled';
$hide = 'hidden';
if($level_user == 'Master Admin'           ||
  $level_user == 'Mekanik Admin All Area'  ||
  $level_user == 'Admin All Area'          ||
  $level_user == 'Admin Kodal'             ||
  $level_user == 'Admin Asera'             ){
  $access = '';
$hide = '';
}
?>
<div class="right_col js-progress-page" role="main">
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
          <button type="button" class="btn btn-success <?php echo $hide ?> add_backlog" data-toggle="modal" data-target=".modal-add">Input Backlog</button><hr/>
          <div class="x_content data-backlog">
            <table id="datatable" class="table table-striped table-bordered table-backlog">
              <thead>
                <tr>
                  <?php foreach($table_head as $data_head){ ?>
                    <th><?php echo $data_head ?></th>
                    <?php
                  }
                  if($level == "Master Admin"){ ?>
                    <th>Action</th>
                    <?php
                  }
                  ?>
                </tr>
              </thead>
              <tbody class="body-backlog">

                <?php
                $num=1;
                foreach($progress as $backlog)
                {
                  ?>
                  <tr id="<?php echo $backlog['id_backlog']?>">
                    <td><?php echo $num++ ?></td>
                    <td><fieldset>
                      <div class="hidden"><?php echo $backlog['down_date']?></div>
                      <div class="control-group">
                        <div class="controls">
                          <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                            <input type="text" data-page="progress" value="<?php echo $backlog['down_date'] ?>" autocomplete="off" data-id="<?php echo $backlog['id_backlog']?>" class="form-control has-feedback-left js-down_date" <?php echo $level_user == "Inventory Admin All Area" || $level_user == "User Asera" || $level_user == "User Kodal" || $level_user == "User All Area" || $level_user == "Inventory Admin Kodal"  ? "disabled" : "" ?> id="date" placeholder="Down Date" name="down_date" aria-describedby="inputSuccess2Status3" style="width:165px" >
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                          </div>
                        </div>
                      </div>
                    </fieldset></td>
                    <td><fieldset>
                      <div class="control-group">
                        <div class="controls">
                          <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                            <input type="text" <?php echo $access ?> autocomplete="off" data-id="<?php echo $backlog['id_backlog']?>" class="form-control has-feedback-left js-up_date" id="date" placeholder="Up Date" name="up_date" aria-describedby="inputSuccess2Status3" style="width:160px">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                          </div>
                        </div>
                      </div>
                    </fieldset></td>
                    <td><?php echo $backlog['ID'] ?></td>
                    <td><?php echo $backlog['model'] ?></td>
                    <td><?php echo $backlog['hours_meter'] ?></td>
                    <td><?php echo $backlog['indication'] ?></td>
                    <td>
                      <!-- <label id="description" data-toggle="modal"  data-target=".bs-example-modal-lg" class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><a>Masukkan Description</a><span class="required"></span></label> -->
                      <h5><a href="" data-toggle="modal" data-id="<?php echo $backlog['id_backlog'] ?>"  data-target=".modal_add_description">
                        <i class="fa fa-edit"></i> Edit</a></h5>

                      </td>
                      <td><select id="prioritas" <?php echo $access ?> data-id="<?php echo $backlog['id_backlog']?>" class="form-control select js-prioritas" required style="width:100px">
                        <option <?php echo (($backlog['priority']) == "P1" ? "selected=selected" : "") ?>value="P1">P1</option>
                        <option <?php echo (($backlog['priority']) == "P2" ? "selected=selected" : "") ?> value="P2">P2</option>
                        <option <?php echo (($backlog['priority']) == "P3" ? "selected=selected" : "") ?>value="P3">P3</option>
                      </select>
                      <p class="num"></p>
                    </td>
                    <td>
                      <?php echo $backlog['status'] ?>
                      <h5 class="<?php echo $level_user == "Inventory Admin All Area" || $level_user == "User Asera" || $level_user == "User Kodal" || $level_user == "User All Area" || $level_user == "Inventory Admin Kodal"  ? "hidden" : "" ?>"><a href="" data-toggle="modal" data-id="<?php echo $backlog['id_backlog'] ?>"  data-target=".modal_edit_status">
                        <i class="fa fa-edit"></i> Edit Status</a></h5>
                      </td>
                      <td><?php echo $backlog['lokasi'] ?></td>
                      <td>
                        <?php echo $backlog['name'] ?>
                        <h5 class="<?php echo $level_user == "Inventory Admin All Area" || $level_user == "User Asera" || $level_user == "User Kodal" || $level_user == "User All Area"  ? "hidden" : "" ?>"><a href="" data-toggle="modal" data-id="<?php echo $backlog['id_backlog'] ?>" data-target=".mechanic"><i class="fa fa-edit"></i> Edit</a></h5>
                      </td>
                      <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $backlog['id_backlog'] ?>">Details</button></td>
                      <td class=""><button type="button" data-key="<?php echo $backlog['id_backlog'] ?>" data-id="<?php echo $backlog['ID'] ?>" data-model="<?php echo $backlog['model'] ?>" class="btn btn-success <?php echo $level_user == "Mekanik Admin All Area" || $level_user == "User All Area" || $level_user == "User Asera" || $level_user == "User Kodal" ? "disabled" : "" ?>" data-toggle="<?php echo $level_user == "Mekanik Admin All Area" || $level_user == "User All Area" || $level_user == "User Asera" || $level_user == "User Kodal" ? "" : "modal" ?>" data-target=".sell-progress">Sell</button></td>
                      <?php
                      if($level == "Master Admin"){ ?>
                        <td><a href="#" class="delete_backlog"
                          data-id="<?php echo $backlog['id_backlog']?>">
                          <i class="fa fa-trash"></i> Delete</a></td>
                          <?php
                        }
                        ?>
                      </tr>
                      <div id="myModal<?php echo $backlog['id_backlog'] ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">On Progress - Data Details</h4>
                            </div>
                            <div class="modal-body">
                              <h3>ID Alat     : <?php echo $backlog['ID']; ?></h3>
                              <h3>Model Alat  : <?php echo $backlog['model']; ?></h3>
                              <h3>Down Date   : <?php echo $backlog['down_date']; ?></h3>
                              <h3>Hours Meter : <?php echo $backlog['hours_meter']; ?></h3>
                              <h3>Indication  : <?php echo $backlog['indication']; ?></h3>
                              <h3>Description : <?php echo $backlog['description']; ?></h3>
                              <h3>Priority    : <?php echo $backlog['priority']; ?></h3>
                              <h3>Status      : <?php echo $backlog['status']; ?></h3>
                              <h3>Mekanik     : <?php echo $backlog['name']; ?></h3>
                              <h3>Reminder KM : <?php echo $backlog['reminder_km']; ?></h3>
                              <h3>Reminder HM : <?php echo $backlog['reminder_hours_meter']; ?></h3>
                              <h3>Location : <?php echo $backlog['location']; ?></h3>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
                <div class="modal fade bs-example-modal-lg mechanic" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Input Mekanik</h4>
                      </div>
                      <div class="modal-body">
                        <center>
                          <select id="mechanic" <?php echo $access ?> data-id="" name="mechanic_name" class="form-control js-mechanic" required style="width:100%">
                            <?php foreach($mechanic as $mechanic){ ?>
                              <option <?php echo (($backlog['mechanic']) == $mechanic['id'] ? "selected=selected" : "") ?> value=<?php echo $mechanic['id']?>><?php echo $mechanic['name']?></option>
                            <?php } ?>
                          </select>
                          <input type="hidden" class="id_add_mechanic" name="id_add_mechanic"/>
                        </center>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" <?php echo $access  ?> class="btn btn-primary js-save_mechanic <?php echo $hide ?>">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade bs-example-modal-lg modal_add_description" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Masukkan Deskripsi</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_content">
                              <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="error"></div>
                                  <div class="x_content">
                                    <div class="item form-group">
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea id="textarea"  data-id="" <?php echo $access ?> rows="6" required="required" name="status" class="form-control col-md-7 col-xs-12 description"></textarea>
                                      </div>
                                      <input type="hidden" class="id_description" name="id_description"/>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <input name="submit_description" <?php echo $access ?>  type="submit" class="btn btn-success submit_description <?php echo $hide ?>" value="Tambah Data">
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
                <!-- modal status -->
                <div class="modal fade bs-example-modal-lg modal_edit_status" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Input Mekanik</h4>
                      </div>
                      <div class="modal-body">
                        <center>
                          <select name="status" data-id="" id="heard" class="form-control js-status" style="width:100%">
                            <option value="Waiting Part">Waiting Part</option>
                            <option value="Breakdown">Breakdown</option>
                            <option value="Waiting Schedule">Waiting Schedule</option>
                            <option value="Waiting Part and Schedule">Waiting Part and Schedule</option>
                          </select>
                          <input type="hidden" class="id_add_mechanic" name="id_add_mechanic"/>
                        </center>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" <?php echo $access  ?> class="btn btn-primary js-save_mechanic <?php echo $hide ?>">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--End Modal-->

                <!-- modal Sell -->
                <div class="modal fade bs-example-modal-lg sell-progress" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel2">Sell</h4>
                      </div>
                      <div class="modal-body">
                        <form name="backlog" class="form-horizontal form-label-left js-sell-progress" method="post" novalidate>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ID Alat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="name" class="form-control col-md-7 col-xs-12 ID_alat" disabled name="indication" required="required" type="text">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Date <span class="required">*</span>
                            </label>
                            <fieldset>
                              <div class="control-group">
                                <div class="controls">
                                  <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left js-down-date js-date-sell col-md-7 col-xs-12" id="single_cal3" placeholder="Pick a date" aria-describedby="inputSuccess2Status3">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                                  </div>
                                </div>
                              </div>
                            </fieldset>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Part Number <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 js-part-number">
                              <select data-id="" class="form-control js-sell part_number" required style="width:100%">
                                <option></option>
                                <?php foreach($part_number as $part_number){ ?>
                                  <option data-quantity="<?php echo $part_number['quantity'] ?>" value=<?php echo $part_number['id']?>><?php echo $part_number['part_number'] . " - " . $part_number['location'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jumlah quantity 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="name" disabled class="form-control col-md-7 col-xs-12 quantity_awal" name="quantity" required="required" type="number">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan quantity yang akan dijual <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="name" class="form-control col-md-7 col-xs-12 quantity" name="quantity" required="required" type="number">
                            </div>
                            <div class="js-error-text hidden" style="color:red">Jumlah quantity yang dimasukkan melebihi quantity yang ada</div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Harga (Rp) <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control col-md-7 col-xs-12 price_sell" required="required" type="number">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Rp
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="name" class="form-control col-md-7 col-xs-12 total" disabled required="required" type="number">
                            </div>
                          </div>
                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <!--  <input type="hidden" name="quantity_awal" value="" class="quantity_awal" /> -->
                              <input type="hidden" class="model_hidden">
                              <input id="send_sell" data-url="<?php echo base_url() ?>inventory/save_sell" data-redirect="<?php echo base_url() ?>inventory/sell-log" name="submit_all" type="submit" class="btn btn-success sell_log_progress" value="Tambah Data">
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--End Modal-->
                <!-- Start Add Modal -->

                <div class="modal fade bs-example-modal-lg modal-add" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Input Backlog</h4>
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
                                      <form name="backlog" class="form-horizontal form-label-left js-add-backlog" method="post" novalidate>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan ID <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="shift" id="heard" class="form-control select_ID ID" style="width:100%">
                                              <option></option>
                                              <?php
                                              foreach($alat as $alat) 
                                              {
                                                ?>
                                                <option value="<?php echo $alat['ID_alat'] ?>"><?php echo $alat['ID_alat'] . " - " . $alat['lokasi'] ?></option>
                                                <?php 
                                              }
                                              ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Model <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12 model" name="model" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Masukkan Hours Meter <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="number" id="number" name="hours_meter" required="required" class="form-control col-md-7 col-xs-12 hours_meter">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Indication <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12 indication" name="indication" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Status <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="status" id="heard" class="form-control status" style="width:100%">
                                              <option value="Waiting Part">Waiting Part</option>
                                              <option value="Breakdown">Breakdown</option>
                                              <option value="Waiting Schedule">Waiting Schedule</option>
                                              <option value="Waiting Part and Schedule">Waiting Part and Schedule</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Masukkan Prioritas <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="prioritas" id="heard" class="form-control prioritas" style="width:100%">
                                              <option value="P1">P1</option>
                                              <option value="P2">P2</option>
                                              <option value="P3">P3</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Reminder KM <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12 reminder_km" name="reminder_km" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Reminder Hours Meter <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="name" class="form-control col-md-7 col-xs-12 reminder_hours_meter" name="reminder_hours_meter" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Down Date <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <fieldset>
                                              <div class="control-group">
                                                <div class="controls">
                                                  <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                                                    <input type="text" class="form-control has-feedback-left js-down-date js-date-sell" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                  </div>
                                                </div>
                                              </div>
                                            </fieldset>
                                          </div>
                                        </div>
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                          <div class="col-md-6 col-md-offset-3">
                                            <input id="send" name="submit_all" type="submit" class="btn btn-success" value="Tambah Data">
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


                <!-- End Modal -->



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
