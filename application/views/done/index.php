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
              foreach($done as $backlog)
              {
                ?>
                <tr id="<?php echo $backlog['id_backlog']?>">
                  <td><?php echo $num++ ?></td>
                  <td><fieldset>
                    <div class="hidden"><?php echo $backlog['down_date']?></div>
                    <div class="control-group">
                      <div class="controls">
                        <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                          <input type="text" disabled value="<?php echo date_indo($backlog['down_date'])?>" autocomplete="off" data-id="<?php echo $backlog['id_backlog']?>" class="form-control has-feedback-left js-down_date" id="date" placeholder="Down Date" name="down_date" aria-describedby="inputSuccess2Status3" style="width:165px" >
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                        </div>
                      </div>
                    </div>
                  </fieldset></td>
                  <td><fieldset>
                    <div class="hidden"><?php echo $backlog['up_date']?></div>
                    <div class="control-group">
                      <div class="controls">
                        <div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">
                          <input type="text" disabled value="<?php echo date_indo($backlog['up_date'])?> autocomplete="off" data-id="<?php echo $backlog['id_backlog']?>" class="form-control has-feedback-left js-up_date" id="date" placeholder="Up Date" name="up_date" aria-describedby="inputSuccess2Status3" style="width:165px">
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
                    <?php echo $backlog['description'] ?>
                  </td>
                  <td>
                    <?php echo $backlog['priority'] ?>
                  </td>
                <td><?php echo $backlog['status'] ?></td>

              </tr>
              <?php
            }
            ?>


          </tbody>
        </table>

        <div class="modal fade bs-example-modal-lg modal_add_description" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Description</h4>
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
                             <div class="item form-group">
                             <label class="col-md-3">Masukkan description
                             </label>

                             <div class="col-md-12 col-sm-12 col-xs-12">
                              <textarea id="textarea" data-id="" rows="6" required="required" name="status" class="form-control col-md-7 col-xs-12 description"></textarea>
                            </div>
                            <input type="hidden" class="id_description" name="id_description"/>
                          </div>
                        </div>

                          <div class="col-md-5">
                            <input name="submit_description" type="submit" class="btn btn-success submit_description" value="Tambah Data">
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
