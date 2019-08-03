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
          $hide = 'hidden';
           if($level_user == 'Master Admin'           ||
              $level_user == 'Mekanik Admin All Area' ||
              $level_user == 'Admin All Area'         ||
              $level_user == 'Admin Kodal'            ||
              $level_user == 'Admin Asera'            ){
                $access = '';
                $hide = '';
                ?>
                <button type="button" class="btn btn-success add_backlog" data-toggle="modal" data-target=".bs-example-modal-lg">Input PM</button><hr/>
        <?php
      }?>
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
                                  <input id="name" class="form-control col-md-7 col-xs-12 ID" name="ID" data-rule-required="true" type="text">
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
                               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan SN <span class="required">*</span>
                               </label>
                               <div class="col-md-6 col-sm-6 col-xs-12">
                                 <input id="name" class="form-control col-md-7 col-xs-12 sn" name="sn" data-rule-required="true" type="text">
                               </div>
                             </div>
                             <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Lokasi <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12 location" name="location" data-rule-required="true" type="text">
                              </div>
                            </div>


                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                 <input id="send_pm" name="submit_all" type="submit" class="btn btn-success" value="Tambah Data">
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
            <td rowspan="2">No</td>
            <td rowspan="2">PM State</td>
            <td rowspan="2">ID</td>
            <td rowspan="2">Model</td>
            <td rowspan="2">SN</td>
            <td rowspan="2">Location</td>
            <td rowspan="2">To Run</td>
            <td colspan="2">Actual Hours</td>
            <td colspan="2">Last Service</td>
            <td colspan="2">Next Service</td>
          </tr>
          <tr>
            <td>Input date</td>
            <td>Hours meter</td>
            <td>Input date</td>
            <td>Hours meter</td>
            <td>Input date</td>
            <td>Hours meter</td>

          </tr>


       </thead>
       <tbody class="body-backlog">

            <?php
              $num=1;
              foreach($pm as $pm)
              {
            ?>
            <tr id="<?php echo $pm['id_pm']?>">
              <td><?php echo $num++ ?></td>
              <td>
                <select id="pm" data-id="<?php echo $pm['id_pm']?>" <?php echo $access ?> class="form-control select js-pm" required style="width:100px">
                  <option value="">Select PM</option>
                  <option <?php echo (($pm['pm_state']) == "PM 500" ? "selected=selected" : "") ?> value="PM 500">PM 500</option>
                  <option <?php echo (($pm['pm_state']) == "PM 1000" ? "selected=selected" : "") ?> value="PM 1000">PM 1000</option>
                  <option <?php echo (($pm['pm_state']) == "PM 2000" ? "selected=selected" : "") ?> value="PM 2000">PM 2000</option>
                  <option <?php echo (($pm['pm_state']) == "PM 4000" ? "selected=selected" : "") ?> value="PM 4000">PM 4000</option>
                  <option <?php echo (($pm['pm_state']) == "PM 6000" ? "selected=selected" : "") ?> value="PM 6000">PM 6000</option>
                </select>
              </td>
              <td><?php echo $pm['ID'] ?></td>
              <td><?php echo $pm['model'] ?></td>
              <td><?php echo $pm['sn'] ?></td>
              <td><?php echo $pm['location'] ?></td>
              <td>
                <?php echo $pm['to_run'] ?></td>
              <td><fieldset>
              <div class="control-group">
                <div class="controls">
                  <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                    <input type="text" autocomplete="off" data-id="<?php echo $pm['id_pm']?>" class="form-control has-feedback-left js-pm-date"
                           <?php echo $access ?>
                           data-link="pm/editActualHoursDate" id="date" placeholder="Actual Housr Date"
                           data-table='actual_hours_date'
                            value="<?php echo ($pm['actual_hours_date'] == '0000-00-00' ? '' : date_indo($pm['actual_hours_date']))?>"
                           name="actual_hours_date" aria-describedby="inputSuccess2Status3" style="width:170px" >
                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                    <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                  </div>
                </div>
              </div>
              </fieldset></td>
              <td>
                <div class="input-hm">
                  <a href="#" class="hm_value"><?php echo ($pm['actual_hours_meter'] = 0 ? 'Input HM' : $pm['actual_hours_meter'])?></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 hidden input-hours-meter">
                <input  id="hours_meter"
                        <?php echo $access ?>
                        data-table='actual_hours_meter'
                        data-id="<?php echo $pm['id_pm'] ?>"
                        value="<?php echo $pm['actual_hours_meter'] ?>"
                        class="form-control col-md-7 col-xs-12 js-hours-meter" required="required" type="number">
                </div>
              </td>
              <td><fieldset>
              <div class="control-group">
                <div class="controls">
                  <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                    <input type="text" autocomplete="off" data-id="<?php echo $pm['id_pm']?>" class="form-control has-feedback-left js-pm-date"
                          <?php echo $access ?>
                           data-link="pm/editLastServiceDate" id="date" placeholder="Last Service Date"
                           data-table='last_service_date'
                           value="<?php echo ($pm['last_service_date'] == '0000-00-00' ? '' : date_indo($pm['last_service_date']))?>"
                           name="last_service_date" aria-describedby="inputSuccess2Status3" style="width:170px" >
                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                    <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                  </div>
                </div>
              </div>
              </fieldset></td>
              <td>
                <div class="input-hm">
                  <a href="#" class="hm_value"><?php echo $pm['last_service_meter'] ?></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 hidden input-hours-meter">
                <input  id="hours_meter"
                        <?php echo $access ?>
                        data-table='last_service_meter'
                        data-id="<?php echo $pm['id_pm'] ?>"
                        value="<?php echo $pm['last_service_meter'] ?>"
                        class="form-control col-md-7 col-xs-12 js-hours-meter" required="required" type="number">
                </div>
              </td>
              <td><fieldset>
              <div class="control-group">
                <div class="controls">
                  <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                    <input type="text" autocomplete="off" data-id="<?php echo $pm['id_pm']?>" class="form-control has-feedback-left js-pm-date"
                          <?php echo $access ?>
                           data-link="pm/editNextServiceDate" id="date" placeholder="Next Service Date"
                           data-table='next_service_date'
                           value="<?php echo ($pm['next_service_date'] == '0000-00-00' ? '' : date_indo($pm['next_service_date']))?>"
                           name="next_service_date" aria-describedby="inputSuccess2Status3" style="width:170px" >
                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                    <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                  </div>
                </div>
              </div>
              </fieldset></td>
              <td>
                <div class="input-hm">
                  <a href="#" class="hm_value"><?php echo $pm['next_service_meter'] ?></a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 hidden input-hours-meter">
                  <input id="hours_meter"
                        <?php echo $access ?>
                        data-table='next_service_meter'
                        data-id="<?php echo $pm['id_pm'] ?>"
                        value="<?php echo $pm['next_service_meter'] ?>"
                        class="form-control col-md-7 col-xs-12 js-hours-meter" required="required" type="number">
                </div>
              </td>
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
