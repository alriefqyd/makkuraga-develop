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
          <?php
          $access = 'disabled';
          if($level_user == 'Master Admin'           ||
            $level_user == 'Mekanik Admin All Area' ||
            $level_user == 'Admin All Area'         ||
            $level_user == 'Admin Kodal'            ||
            $level_user == 'Admin Asera'            ){
            $access = ''
            ?>
            <button type="button" class="btn btn-success add_backlog" data-toggle="modal" data-target=".bs-example-modal-lg">Input Backlog</button><hr/>
            <?php
          }
          ?>
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
                                      <option value="<?php echo $alat['id'] ?>"><?php echo $alat['ID_alat'] . " - " . $alat['lokasi'] ?></option>
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
                                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Reminder Hours Meter <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
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
            foreach($backlog as $backlog)
            {
              ?>
              <tr id="<?php echo $backlog['id_backlog']?>">
                <td><?php echo $num++ ?></td>
                <td><fieldset>
                  <div class="control-group">
                    <div class="controls">
                      <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                        <input type="text" data-page="backlog"  value="<?php echo $backlog['down_date'] ?>" autocomplete="off" <?php echo $access ?> data-id="<?php echo $backlog['id_backlog']?>" class="form-control has-feedback-left js-down_date" id="date" placeholder="Down Date" name="down_date" aria-describedby="inputSuccess2Status3" style="width:160px" >
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                      </div>
                    </div>
                  </div>
                </fieldset></td>
                <td><?php echo $backlog['up_date'] ?></td>
                <td><?php echo $backlog['ID_alat'] ?></td>
                <td><?php echo $backlog['model'] ?></td>
                <td><?php echo $backlog['hours_meter'] ?></td>
                <td><?php echo $backlog['indication'] ?></td>
                <td><select id="prioritas" <?php echo $access ?> data-id="<?php echo $backlog['id_backlog']?>" class="form-control js-prioritas" style="width:80%;" required>
                  <option <?php echo (($backlog['priority']) == "P1" ? "selected=selected" : "") ?>value="P1">P1</option>
                  <option <?php echo (($backlog['priority']) == "P2" ? "selected=selected" : "") ?> value="P2">P2</option>
                  <option <?php echo (($backlog['priority']) == "P3" ? "selected=selected" : "") ?>value="P3">P3</option>
                </select>
                <p class="num"></p>
              </td>
              <td><?php echo $backlog['status'] ?></td>
              <td><?php echo $backlog['lokasi'] ?></td>

              <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $backlog['id_backlog'] ?>">Details</button>
              </td>
              <?php
              if($level == "Master Admin"){ ?>
                <td><a href="#" class="delete_backlog"
                  data-id="<?php echo $backlog['id_backlog']?>">
                  <i class="fa fa-trash"></i> Delete</a></td>
                  <?php
                }
                ?>
                <div id="myModal<?php echo $backlog['id_backlog'] ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Backlog - Data Details</h4>
                      </div>
                      <div class="modal-body">
                        <h3>ID Alat     : <?php echo $backlog['ID']; ?></h3>
                        <h3>Model Alat  : <?php echo $backlog['model']; ?></h3>
                        <h3>Down Date   : <?php echo $backlog['down_date']; ?></h3>
                        <h3>Hours Meter : <?php echo $backlog['hours_meter']; ?></h3>
                        <h3>Indication  : <?php echo $backlog['indication']; ?></h3>
                        <h3>Status      : <?php echo $backlog['status']; ?></h3>
                        <h3>Priority    : <?php echo $backlog['priority']; ?></h3>
                        <h3>Reminder KM : <?php echo $backlog['reminder_km']; ?></h3>
                        <h3>Reminder HM : <?php echo $backlog['reminder_hours_meter']; ?></h3>
                        <h3>Location : <?php echo $backlog['location']; ?></h3>
                      </div>
                    </div>
                  </div>
                </div>

              </tr>
              <?php
            }
            ?>


          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
