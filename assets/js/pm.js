
$("#send_pm").on('click',function(event){
  event.preventDefault();
  var ID = $('.ID').val();
  var model = $('.model').val();
  var sn = $('.sn').val();
  var location = $('.location').val();
  console.log()
  if(ID != '' & model != '' & sn != '' & location != '' )
  {
    $.confirm({
      title: '<div class="error">Konfirmasi</div>',
      content: '<p>Apakah anda yakin?</p>',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"pm/save",
            data : {ID: ID,model:model,sn:sn,location:location},
            success: function(data){
              $(".modal-add").modal('hide');
              $(".error").hide();
              $(".ID").val("");
              $(".model").val("");
              $(".sn").val("");
              $(".location").val("");
              showDataPM();
              notifikasi("Data berhasil ditambahkan");
              // location.reload(true);
            }});
          },
          cancel: function () {
            $(".modal-add").modal('hide');
            $(".modal-add").modal('hide');
            $(".error").hide();
            $(".ID").val("");
            $(".model").val("");
            $(".sn").val("");
            $(".location").val("");
          }

        }
      });
    }
    else
    {
      $(".error").html("<div class='alert alert-danger alert-dismissible fade in'>Pastikan anda mengisi semua inputan</div>");
    }
  });



  // fungsi load data
  function showDataPM(){
    $.ajax({
      type  : 'POST',
      url   : 'pm/show',
      async : true,
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success : function(data){
        var t = $('#datatable').DataTable();
        var data_pm = data[(data.length)-1];
        //     var i;
        //     var counter = 1;
        //     for(i=0; i<data.length; i++){
        // console.log(data_backlog.id_backlog);
        t.row.add( [
          data_pm.id_pm,
          '<select id="pm" onchange="pm_state($(this))" data-id="'+data_pm.id_pm+'" class="form-control select js-pm" required style="width:100px">'+
              '<option value="">Select PM</option>'+
              '<option value="PM 5000">PM 5000</option>'+
              '<option value="PM 1000">PM 1000</option>'+
          '</select>',
          data_pm.ID,
          data_pm.model,
          data_pm.sn,
          data_pm.location,
          data_pm.to_run,
          '<fieldset>'+
          '<div class="control-group">'+
            '<div class="controls">'+
              '<div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">'+
                '<input type="text" onchange="pm_date_js($(this))" autocomplete="off" data-id="'+data_pm.id_pm+'" class="form-control has-feedback-left js-pm-date"'+
                       'data-link="pm/editActualHoursDate" id="date" placeholder="Actual Housr Date"'+
                       'data-table="actual_hours_date"'+
                       'name="actual_hours_date" aria-describedby="inputSuccess2Status3" style="width:170px" >'+
                '<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>'+
                '<span id="inputSuccess2Status3" class="sr-only">(success)</span>'+
              '</div>'+
            '</div>'+
          '</div>'+
          '</fieldset>',
          '<div class="input-hm" onclick="add_hm_form($(this))">'+
            '<a href="#" class="hm_value">'+data_pm.actual_hours_meter+'</a>'+
          '</div>'+
          '<div class="col-md-6 col-sm-6 col-xs-12 hidden input-hours-meter">'+
          '<input  id="hours_meter"'+
                  'data-table="actual_hours_meter"'+
                  'data-id="'+data_pm.id_pm+'"'+
                  'onkeypress="add_hm($(this))"'+
                  'class="form-control col-md-7 col-xs-12 js-hours-meter" required="required" type="number">'+
          '</div>',
          '<fieldset>'+
          '<div class="control-group">'+
            '<div class="controls">'+
              '<div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">'+
                '<input type="text" onchange="pm_date_js($(this))" autocomplete="off" data-id="'+data_pm.id_pm+'" class="form-control has-feedback-left js-pm-date"'+
                       'data-link="pm/editLastServiceDate" id="date" placeholder="Actual Housr Date"'+
                       'data-table="last_hours_date"'+
                       'name="last_hours_date" aria-describedby="inputSuccess2Status3" style="width:170px" >'+
                '<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>'+
                '<span id="inputSuccess2Status3" class="sr-only">(success)</span>'+
              '</div>'+
            '</div>'+
          '</div>'+
          '</fieldset>',
          '<div class="input-hm" onclick="add_hm_form($(this))">'+
            '<a href="#" class="hm_value">'+data_pm.last_service_meter+'</a>'+
          '</div>'+
          '<div class="col-md-6 col-sm-6 col-xs-12 hidden input-hours-meter">'+
          '<input  id="hours_meter"'+
                  'data-table="last_service_meter"'+
                  'data-id="'+data_pm.id_pm+'"'+
                  'onkeypress="add_hm($(this))"'+
                  'class="form-control col-md-7 col-xs-12 js-hours-meter" required="required" type="number">'+
          '</div>',
          '<fieldset>'+
          '<div class="control-group">'+
            '<div class="controls">'+
              '<div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">'+
                '<input type="text" onchange="pm_date_js($(this))" autocomplete="off" data-id="'+data_pm.id_pm+'" class="form-control has-feedback-left js-pm-date"'+
                       'data-link="pm/editNextServiceDate" id="date" placeholder="Actual Housr Date"'+
                       'data-table="last_hours_date"'+
                       'name="last_hours_date" aria-describedby="inputSuccess2Status3" style="width:170px" >'+
                '<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>'+
                '<span id="inputSuccess2Status3" class="sr-only">(success)</span>'+
              '</div>'+
            '</div>'+
          '</div>'+
          '</fieldset>',
          '<div class="input-hm" onclick="add_hm_form($(this))">'+
            '<a href="#" class="hm_value">'+data_pm.next_service_meter+'</a>'+
          '</div>'+
          '<div class="col-md-6 col-sm-6 col-xs-12 hidden input-hours-meter">'+
          '<input  id="hours_meter"'+
                  'data-table="next_service_meter"'+
                  'data-id="'+data_pm.id_pm+'"'+
                  'onkeypress="add_hm($(this))"'+
                  'class="form-control col-md-7 col-xs-12 js-hours-meter" required="required" type="number">'+
          '</div>',

        ] ).node().id = data_pm.id_pm;
        t.draw( false );
        //    }
      }
    });
  }

   $(".js-pm").on("change",function(){
    var id_pm = $(this).data('id');
    var pm_state = $(this).val();
    $.confirm({
      title: 'Update PM',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"pm/editPm",
            dataType:"JSON",
            data : {id_pm:id_pm,pm_state:pm_state},
            success: function(data){
              notifikasi("Prioritas berhasil di perbaharui");
            }
          });
        },
        cancel: function () {
          $.alert('Canceled!');
        },

      }
    });

  });

  function pm_state(e){
   var id_pm = e.data('id');
   var pm_state = e.val();
   $.confirm({
     title: 'Update PM',
     content: 'Apakah anda yakin?',
     buttons: {
       confirm: function () {
         $.ajax({
           type: "POST",
           url:"pm/editPm",
           dataType:"JSON",
           data : {id_pm:id_pm,pm_state:pm_state},
           success: function(data){
             notifikasi("Prioritas berhasil di perbaharui");
           }
         });
       },
       cancel: function () {
         $.alert('Canceled!');
       },

     }
   });

 }
 // edit date PM
  var pm_date = $(".js-pm-date")
  pm_date.on('change', function(e){
    console.log($(this).data('table'));
    console.log($(this).val());
    var link = $(this).data('link');
    var id_pm = $(this).data('id');
    var date = $(this).val();
    var table = $(this).data('table');
    $.confirm({
      title: 'Update Actual Hourse Date',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url: link,
            dataType:"JSON",
            data : {id_pm:id_pm,date:date},
            success: function(data){
              // var table = $('#example').DataTable();
              notifikasi("Down date berhasil di perbaharui");
            }
          });
        },
        cancel: function () {
          $.alert('Canceled!');
        },

      }
    });

  });

function pm_date_js(e){
    console.log(e.data('table'));
    console.log(e.val());
    var link = e.data('link');
    var id_pm = e.data('id');
    var date = e.val();
    var table = e.data('table');
    $.confirm({
      title: 'Update Actual Hourse Date',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url: link,
            dataType:"JSON",
            data : {id_pm:id_pm,date:date},
            success: function(data){
              // var table = $('#example').DataTable();
            notifikasi("Down date berhasil di perbaharui");
            }
          });
        },
        cancel: function () {
          $.alert('Canceled!');
        },

      }
    });
  }


  $('.input-hm').on('click',function(e){
    $(this).siblings('.input-hours-meter').removeClass('hidden');
    $(this).addClass('hidden');
  });
  $('.js-hours-meter').keypress(function(e) {
    var key = e.which;
    var table = $(this).data('table');
    var id_pm = $(this).data('id');
    var hm = $(this).val();
    if(key == 13){
    $.ajax({
      type: "POST",
      url:"pm/editHm",
      dataType:"JSON",
      data : {id_pm:id_pm,table:table,hm:hm},
      success:function(data){
        console.log(data);
        notifikasi("HM berhasil di perbaharui");
      }
    })
      $(this).closest('.input-hours-meter').siblings('.input-hm').find('.hm_value').html(hm);
      $(this).closest('.input-hours-meter').addClass('hidden');
      $(this).closest('.input-hours-meter').siblings('.input-hm').removeClass('hidden');
    }
  });

  function add_hm_form(_this){
    _this.siblings('.input-hours-meter').removeClass('hidden');
    _this.addClass('hidden');
  }
  function add_hm(e) {
    var key = event.which;
    var table = e.data('table');
    var id_pm = e.data('id');
    console.log(key);
    console.log(id_pm);
    var hm = e.val();
    if(key == 13){
    $.ajax({
      type: "POST",
      url:"pm/editHm",
      dataType:"JSON",
      data : {id_pm:id_pm,table:table,hm:hm},
      success: function(data){
        notifikasi("Prioritas berhasil di perbaharui");
      }
    })
      e.closest('.input-hours-meter').siblings('.input-hm').find('.hm_value').html(hm);
      e.closest('.input-hours-meter').addClass('hidden');
      // munculkan input hm
      e.closest('.input-hours-meter').siblings('.input-hm').removeClass('hidden');
    }
  }
  function showHM(id_pm){
    // $.ajax({
    //   type  : 'POST',
    //   url   : 'pm/show',
    //   async : true,
    //   contentType: "application/json; charset=utf-8",
    //   dataType: "json",
    //   success : function(data){
    //     var t = $('#datatable').DataTable();
    //     var data_pm = data[(data.length)-1];
    //     //     var i;
    //     //     var counter = 1;
    //     console.log(data);
    //   //   for(i=0; i<data.length; i++){
    //   //   console.log(data.data[i].id_backlog);
    //   //   // console.log(data_pm);
    //   // }
    //   }
    // });
    // var id=$(this).data('id');
            $.ajax({
                type : "GET",
                url  : "pm/showById",
                dataType : "JSON",
                data : {id_pm:id_pm},
                success: function(data){
                    $.each(data,function(actual_hours_meter){
                        console.log(data)
                    });
                }
            });
            return false;
            console.log(id_pm);
  }
