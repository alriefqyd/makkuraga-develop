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
          $access = '';
          $hide = '';
          if($level_user == 'Inventory Admin All Area' || $level_user == 'Inventory Admin Kodal' || $level_user == 'User Kodal' || $level_user === "User Asera" || $level_user === "User All Area"){
            $access = 'disabled';
            $hide = 'hidden';
            ?>
            <!-- <button type="button" class="btn btn-success add_backlog" data-toggle="modal" data-target=".bs-example-modal-lg">Input Daily Monitoring</button><hr/> -->
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
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Start HM <span class="required">*</span>
                                 </label>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                   <input id="name" class="form-control col-md-7 col-xs-12 start_hm" name="hm" data-rule-required="true" type="text">
                                 </div>
                               </div>
                               <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Stop HM <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="name" class="form-control col-md-7 col-xs-12 stop_hm" name="stop_hm" data-rule-required="true" type="text">
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Shift <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select name="shift" id="heard" class="form-control shift" style="width:100%">
                                    <option value="Pagi">Pagi</option>
                                    <option value="Malam">Malam</option>
                                  </select>
                                </div>
                              </div>
                              <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Lokasi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select name="shift" id="heard" class="form-control lokasi" style="width:100%">
                                    <option value="Pusat">Pusat</option>
                                    <option value="Asera">Asera</option>
                                    <option value="kodal">Kodal</option>
                                  </select>
                                </div>
                              </div>


                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                 <input id="send_op" name="submit_all" type="submit" class="btn btn-success" value="Tambah Data">
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
            <td rowspan="2">Tanggal</td>
            <td rowspan="2">ID</td>
            <td rowspan="2">Model</td>
            <td colspan="4"><center>Actual Hours/KM</center></td>
            <td rowspan="2">Status</td>
            <td rowspan="2">Lokasi</td>
            <td rowspan="2">Shift</td>
            <td rowspan="2">Komentar</td>
            <td class="<?php echo $hide ?>" rowspan="2">Action</td>

          </tr>
          <tr>
            <td>Start</td>
            <td>Stop</td>
            <td>Total</td>
            <td>Working</td>
          </tr>



        </thead>
        <tbody class="body-backlog">

          <?php
          $num=1;
          foreach($operation as $monitoring)
          {
            ?>
            <tr id="<?php echo $monitoring['id_operation']?>">
              <td><?php echo $num++ ?></td>
              <td>
                <div class="hidden"><?php echo $monitoring['tanggal'] ?></div>
                <fieldset>
                  <?php echo date_indo($monitoring['tanggal']) ?>
                  <div class="control-group">
                    <div class="controls">
                      <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                        <input type="text" value="<?php echo $monitoring['tanggal'] ?>" autocomplete="off" <?php echo $access ?> data-id="<?php echo $monitoring['id_operation']?>" class="form-control date has-feedback-left js-tanggal" id="date" placeholder="Down Date" name="tanggal" aria-describedby="inputSuccess2Status3" style="width:190px" >
                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                      </div>
                    </div>
                  </div>
                </fieldset>
              </td>
              <td><?php echo $monitoring['ID'] ?></td>
              <td><?php echo $monitoring['model'] ?></td>
              <td><?php echo $monitoring['start_hm'] ?></td>
              <td><?php echo $monitoring['stop_hm'] ?></td>
              <td><?php echo $monitoring['total'] ?></td>
              <td><?php echo $monitoring['working'] ?></td>
              <td><?php echo $monitoring['status'] ?></td>
              <td><?php echo $monitoring['lokasi'] ?></td>
              <td><?php echo $monitoring['shift'] ?></td>
              <td>
                <a href="" class="js-komentar-button">Input Komentar</a>
                <div class="hidden col-md-12 col-sm-12 col-xs-12 js-komentar-field">
                 <textarea rows="5" id="textarea" data-id="<?php echo $monitoring['id_operation']?>" <?php echo $access ?> required="required" name="komentar" class="form-control komentar"><?php echo $monitoring['komentar']?></textarea>
               </div>
             </td>
             <td class="<?php echo $hide ?>"><a href="" data-toggle="modal"
              data-id="<?php echo $monitoring['id_operation'] ?>"
              data-target=".modal_edit_operation">
              <i class="fa fa-edit"></i> Edit</a>
            </td>

          </tr>
          <?php
        }
        ?>

      </tbody>
    </table>
 <!--   <div class="modal fade bs-example-modal-lg modal_edit_operation" role="dialog" aria-hidden="true">
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
                             <input id="name" class="form-control col-md-7 col-xs-12 ID_edit" name="ID" data-rule-required="true" type="text">
                           </div>
                         </div>
                         <div class="item form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Model <span class="required">*</span>
                           </label>
                           <div class="col-md-6 col-sm-6 col-xs-12">
                             <input id="name" class="form-control col-md-7 col-xs-12 model_edit" name="model" required="required" type="text">
                           </div>
                         </div>
                         <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Start HM <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12 start_hm_edit" name="hm" data-rule-required="true" type="text">
                          </div>
                        </div>
                        <div class="item form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan Stop HM <span class="required">*</span>
                         </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <input id="name" class="form-control col-md-7 col-xs-12 stop_hm_edit" name="stop_hm" data-rule-required="true" type="text">
                         </div>
                       </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Masukkan  Working Hours <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12 working_edit" name="stop_hm" data-rule-required="true" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Status <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="status" id="heard" class="form-control status_edit" style="width:100%">
                           <option value="Waiting Part">Waiting Part</option>
                           <option value="Breakdown">Breakdown</option>
                           <option value="Waiting Schedule">Waiting Schedule</option>
                           <option value="Waiting Part and Schedule">Waiting Part and Schedule</option>
                         </select>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Shift <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="shift" id="heard" class="form-control shift_edit" style="width:100%">
                           <option value="Pagi">Pagi</option>
                           <option value="Malam">Malam</option>
                         </select>
                       </div>
                     </div>
                     <div class="item form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Lokasi <span class="required">*</span>
                       </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="lokasi_edit" id="heard" class="form-control lokasi_edit" style="width:100%">
                           <option value="Pusat">Pusat</option>
                           <option value="Asera">Asera</option>
                           <option value="kodal">Kodal</option>
                         </select>
                       </div>
                     </div>
                     <div class="ln_solid"></div>
                     <div class="form-group">
                       <div class="col-md-6 col-md-offset-3">
                        <input id="send_op_edit" name="submit_all" type="submit" class="btn btn-success" value="Edit Data">
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
</div> -->

</div>
</div>
</div>
</div>
</div>
</div>
