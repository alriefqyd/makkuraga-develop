
$(document).on('focus', '#date_tanggal',function(){
  var h = date.getHours()
  var m = date.getMinutes()
  var s = date.getSeconds()
  if(s<10)
  {
    s = "0"+s;
  }
  $(this).datepicker({
    todayHighlight:true,
    format:'yyyy-mm-dd'+' '+h+':'+m+':'+s,
    autoclose:true
  })
});

$("#send_op").on('click',function(event){
  event.preventDefault();
  var ID = $('.ID').val();
  var model = $('.model').val();
  var start_hm = $('.start_hm').val();
  var stop_hm = $('.stop_hm').val();
  var working = $('.working').val();
  var status = $('.status').val();
  var shift = $('.shift').val();
  var lokasi = $('.lokasi').val();
  var user = $('.user').val();
  console.log(user);
  if(ID != '' & model != '' & start_hm != '' & lokasi != '' )
  {
    $.confirm({
      title: '<div class="error">Konfirmasi</div>',
      content: '<p>Apakah anda yakin?</p>',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"save",
            data : {ID: ID,model:model,start_hm:start_hm,stop_hm:stop_hm,working:working,status:status,shift:shift,lokasi:lokasi,user:user},
            success: function(data){
              $(".modal-add").modal('hide');
              $(".error").hide();
              $(".ID").val("");
              $(".model").val("");
              $(".start_hm").val("");
              $(".stop_hm").val("");
              notifikasi("Data berhasil ditambahkan");
              setTimeout(function(){
                window.location.reload()}
                ,1000);
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
  function showDataOp(){
    $.ajax({
      type  : 'POST',
      url   : 'show',
      async : true,
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success : function(data){
        var t = $('#datatable').DataTable();
        var data = data[(data.length)-1];
        //     var i;
        //     var counter = 1;
        //     for(i=0; i<data.length; i++){
        // console.log(data_backlog.id_backlog);
        t.row.add( [
          data.id_operation,
          '<fieldset>'+
          '<div class="control-group">'+
          '<div class="controls">'+
          '<div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">'+
          '<input type="text" onchange="update_up(this,'+data.id_operation+')" class="form-control has-feedback-left js__down" autocomplete="off" id="date" placeholder="Down Date" name="down_date" aria-describedby="inputSuccess2Status3" style="width:220px">'+
          '<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>'+
          '<span id="inputSuccess2Status3" class="sr-only">(success)</span>'+
          '</div>'+
          '</div>'+
          '</div>'+
          '</fieldset>',
          data.ID,
          data.model,
          data.start_hm,
          data.stop_hm,
          data.total,
          data.working,
          data.status,
          data.lokasi,
          data.shift,
          '<div class="input-hm" onclick="add_hm_form($(this))">'+
          '<a href="#" class="hm_value">'+data.komentar+'</a>'+
          '</div>'+
          '<div class="col-md-6 col-sm-6 col-xs-12 hidden input-hours-meter">'+
          '<input  id="hours_meter"'+
          'data-table="next_service_meter"'+
          'data-id="'+data.id_operation+'"'+
          'onkeypress="add_hm($(this))"'+
          'class="form-control col-md-7 col-xs-12 js-hours-meter" required="required" type="number">'+
          '</div>',
          ] ).node().id = data.id_operation;
        t.draw( false );
        //    }
      }
    });
  }

  //  $(".js-pm").on("change",function(){
  //   var id_pm = $(this).data('id');
  //   var pm_state = $(this).val();
  //   $.confirm({
  //     title: 'Update PM',
  //     content: 'Apakah anda yakin?',
  //     buttons: {
  //       confirm: function () {
  //         $.ajax({
  //           type: "POST",
  //           url:"pm/editPm",
  //           dataType:"JSON",
  //           data : {id_pm:id_pm,pm_state:pm_state},
  //           success: function(data){
  //             notifikasi("Prioritas berhasil di perbaharui");
  //           }
  //         });
  //       },
  //       cancel: function () {
  //         $.alert('Canceled!');
  //       },
  //
  //     }
  //   });
  //
  // });

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
 var js_date = $(".js-tanggal")
 js_date.on('change', function(e){
   var id_operation = $(this).data('id');
   var tanggal = $(this).val();
   console.log(id_operation+ ' ' + tanggal)
   var history = "onprogress";
   $.confirm({
     title: 'Update Tanggal',
     content: 'Apakah anda yakin?',
     buttons: {
       confirm: function () {
         $.ajax({
           type: "POST",
           url:"editTanggal",
           dataType:"JSON",
           data : {id_operation:id_operation,tanggal:tanggal},
           success: function(data){
             notifikasi("Tanggal berhasil di perbaharui");
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


$('.js-komentar-button').on('click',function(e){
  e.preventDefault();
  var _this_siblings = $(this).siblings('.js-komentar-field')
  _this_siblings.removeClass('hidden');
  $(this).addClass('hidden');
    // console.log(_this_siblings.find('.komentar').data('id'))
    _this_siblings.find('.komentar').keypress(function(e){
      var key = e.which;
      var id_operation = $(this).data('id');
      var komentar = $(this).val();
      if(key == 13){
        $.ajax({
          type: "POST",
          url: "editKomentar",
          dataType:"JSON",
          data:{id_operation:id_operation,komentar:komentar},
          success:function(data){
            setTimeout(function(){
              window.location.reload()}
              ,1000);
            notifikasi("komentar berhasil di perbaharui");
          }
        })
        $(this).addClass('hidden');
        $(this).closest('.js-komentar-field').siblings('.js-komentar-button').removeClass('hidden');
      }
    })


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
        setTimeout(function(){
          window.location.reload()}
          ,1000);
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

  $('.modal_edit_operation').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('.id_edit_mechanic').val(id);
    console.log(id);
    $.ajax({
      type: "POST",
      url:"getOperationById",
      dataType:"JSON",
      data : {id_operation:id},
      success: function(data){
        // $(e.currentTarget).find('.description').val(data.id_backlog);
        var data_backlog = data[(data.length)];
        for(i=0; i<data.length; i++){
          $(e.currentTarget).find('.ID_edit').val(data[i].ID);
          $(e.currentTarget).find('.model_edit').val(data[i].model);
          $(e.currentTarget).find('.start_hm_edit').val(data[i].start_hm);
          $(e.currentTarget).find('.stop_hm_edit').val(data[i].stop_hm);
          $(e.currentTarget).find('.working_edit').val(data[i].working);
        }
        // $('#show_data').html(html);


      }
    })
    $("#send_op_edit").on("click",function(e){
      e.preventDefault();
      console.log(id)
      var ID_ = $('.ID_edit').val();
      var model = $('.model_edit').val();
      var start_hm = $('.start_hm_edit').val();
      var stop_hm = $('.stop_hm_edit').val();
      var working = $('.working_edit').val();
      var status = $('.status_edit').val();
      var shift = $('.shift_edit').val();
      var lokasi = $('.lokasi_edit').val();
      console.log(lokasi);
      $.confirm({
        title: '<div class="error">Konfirmasi</div>',
        content: '<p>Apakah anda yakin?</p>',
        buttons: {
          confirm: function () {
            $.ajax({
              type: "POST",
              url:"edit",
              data : {ID_: ID_,model:model,start_hm:start_hm,stop_hm:stop_hm,working:working,status:status,shift:shift,lokasi:lokasi,id:id},
              success: function(data){
                $(".modal-modal_edit_operation").modal('hide');
                $(".error").hide();
                $(".ID").val("");
                $(".model").val("");
                $(".start_hm").val("");
                $(".stop_hm").val("");
                notifikasi("Data berhasil diubah");
                setTimeout(function(){
                  window.location.reload()}
                  ,1000);
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
    });
  });
