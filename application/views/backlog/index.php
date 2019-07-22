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
          <button type="button" class="btn btn-success add_backlog" data-toggle="modal" data-target=".bs-example-modal-lg">Input Backlog</button><hr/>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Masukkan Prioritas <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="status" id="heard" class="form-control status" style="width:100%">
                                <option value="Waiting Part">Waiting Part</option>
                                <option value="Breakdown">Breakdown</option>
                                <option value="P3">P3</option>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Reminder Km <span class="required">*</span>
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
            <?php } ?>
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
                    <input type="text" autocomplete="off" data-id="<?php echo $backlog['id_backlog']?>" class="form-control has-feedback-left js-down_date" id="date" placeholder="Down Date" name="down_date" aria-describedby="inputSuccess2Status3" style="width:160px" >
                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                    <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                  </div>
                </div>
              </div>
              </fieldset></td>
              <td><?php echo $backlog['up_date'] ?></td>
              <td><?php echo $backlog['ID'] ?></td>
              <td><?php echo $backlog['model'] ?></td>
              <td><?php echo $backlog['hours_meter'] ?></td>
              <td><?php echo $backlog['indication'] ?></td>
              <td><select id="prioritas" data-id="<?php echo $backlog['id_backlog']?>" class="form-control select js-prioritas" required>
                  <option>Pilih Mechanic</option>
                  <option <?php echo (($backlog['priority']) == "P1" ? "selected=selected" : "") ?>value="P1">P1</option>
                  <option <?php echo (($backlog['priority']) == "P2" ? "selected=selected" : "") ?> value="P2">P2</option>
                  <option <?php echo (($backlog['priority']) == "P3" ? "selected=selected" : "") ?>value="P3">P3</option>
                  </select>
                  <p class="num"></p>
              </td>
              <td><?php echo $backlog['status'] ?></td>
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

 