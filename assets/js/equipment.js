//  fungsi load data backload
//  $(document).ready(function(){
//   showData();
//  })
$(document).ready(function() {
  // $('select').select2().data('select2').$dropdown.addClass('my-container');
  $('.status').select2({
    allowClear:true,
    placeholder:"Select Status",

  })
  $('.select').each(function(){
    $(this).select2({
      minimumResultsForSearch: Infinity,
      placeholder:"Pilih Data",
      allowClear:true,
    });
  });

  $('.select_ID').each(function(){
    $(this).select2({
      allowClear:true,
      placeholder:"Select Status",
    });
  });


  
  // $(".select").each(function(){
  //         var placeholder = $(this).data('placeholder');
  //         $(this).select2({
  //             placeholder: placeholder,
  //             allowClear: true,
  //             minimumResultsForSearch: -1,
  //         });
  //
  //         var inputSm = $(this).hasClass('input-sm');
  //         if(inputSm){
  //             $(this).wrap('<div class="wrap-select-sm"></div>')
  //         }
  //     });

  $('.js-mechanic').select2({
    placeholder:"Pilih Mekanik",
    allowClear:true,
    language: {
      "noResults": function(){
        return "Data mekanik tidak ditemukan";
      }
    },
    // minimumInputLength:1
  });
  $('.js-sell').select2({
    placeholder:"Pilih Data",
    allowClear:true,
    language: {
      "noResults": function(){
        return "Data tidak ditemukan";
      }
    },
    // minimumInputLength:1
  });
});

//  datepicker form datatable backlog
$(document).on('focus', '#date',function(){
  $(this).datepicker({
    todayHighlight:true,
    format:'yyyy-mm-dd',
    autoclose:true
  })
});

$(document).on('focus', '.js-date',function(){
  $(this).datepicker({
    todayHighlight:true,
    format:'yyyy-mm-dd',
    autoclose:true
  })
});

// var t = $('#datatable').DataTable({
//   ajax:"show"
// });
// setInterval(function(){
//   t.ajax.reload;
// },3000)
function notifikasi($message)
{
  new PNotify({
    title: 'Sukses',
    text: $message,
    type: 'success',
    styling: 'bootstrap3'
  });
}

$('.modal_edit_status').on('show.bs.modal', function(e) {
  var id = $(e.relatedTarget).data('id');
  $(e.currentTarget).find('.js-status').data("id");
  console.log(id);
  $('.js-status').on('change', function(e){
    var id_backlog = $(this).data('id');
    var status = $(this).val();
    console.log(id_backlog + status);
    $.confirm({
      title: 'Update Status',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"editStatus",
            dataType:"JSON",
            data : {id_backlog:id,status:status},
            success: function(data){
              $(".modal_edit_status").modal('hide');
              notifikasi("Down date berhasil di perbaharui");
              setTimeout(function(){
                window.location.reload()}
                ,1000);
            }
          });
        },
        cancel: function () {
          $.alert('Canceled!');
        },

      }
    });

  });

})

// add data backlog
$("#send").on('click',function(event){
  event.preventDefault();
  var ID = $('.ID').val();
  var model = $('.model').val();
  var hours_meter = $('.hours_meter').val();
  var indication = $('.indication').val();
  var status = $('.status').val();
  var prioritas = $('.prioritas').val();
  var history = 'backlog';
  var reminder_km = $('.reminder_km').val();
  var down_date = $('.js-down-date').val();
  console.log(down_date);
  var reminder_hours_meter = $('.reminder_hours_meter').val();
  console.log()
  if(ID != '' & model != '' & hours_meter != '' & indication != '' & status != '')
  {
    console.log(reminder_hours_meter + reminder_km)
    $.confirm({
      title: '<div class="error">Konfirmasi</div>',
      content: '<p>Apakah anda yakin?</p>',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"save",
            data : {ID: ID,model:model,hours_meter:hours_meter,indication:indication,status:status,prioritas:prioritas,history:history,reminder_km:reminder_km,reminder_hours_meter:reminder_hours_meter,down_date:down_date},
            success: function(data){
              $(".modal-add").modal('hide');
              $(".error").hide();
              $(".ID").val("");
              $(".model").val("");
              $(".hours_meter").val("");
              $(".indication").val("");
              $(".status").val("");
              $(".prioritas").val("");
              $('.reminder_hours_meter').val("");
              $('.reminder_km').val("");
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
          $(".hours_meter").val("");
          $(".indication").val("");
          $(".status").val("");
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
  function showDataBacklog(){
    $.ajax({
      type  : 'POST',
      url   : 'show',
      async : true,
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success : function(data){
        var t = $('#datatable').DataTable();
        var data_backlog = data[(data.length)-1];
        //     var i;
        //     var counter = 1;
        //     for(i=0; i<data.length; i++){
        // console.log(data_backlog.id_backlog);
        t.row.add( [

          data_backlog.id_backlog,
          '<fieldset>'+
          '<div class="control-group">'+
          '<div class="controls">'+
          '<div class="col-md-6 col-sm-6 col-xs-12 xdisplay_inputx form-group has-feedback">'+
          '<input type="text" onchange="update_up(this,'+data_backlog.id_backlog+')" class="form-control has-feedback-left js__down" autocomplete="off" id="date" placeholder="Down Date" name="down_date" aria-describedby="inputSuccess2Status3" style="width:160px">'+
          '<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>'+
          '<span id="inputSuccess2Status3" class="sr-only">(success)</span>'+
          '</div>'+
          '</div>'+
          '</div>'+
          '</fieldset>',
          data_backlog.up_date,
          data_backlog.ID,
          data_backlog.model,
          data_backlog.hours_meter,
          data_backlog.indication,
          '<select id="prioritas" onchange="update_priority(this,'+data_backlog.id_backlog+')" data-id="'+data_backlog.id_backlog+'" class="form-control select js-prioritas" required>'+
          '<option>Pilih prioritas</option>'+
          '<option '+((data_backlog.priority) == "P1" ? "selected=selected" : "")+' value="P1">P1</option>'+
          '<option '+((data_backlog.priority) == "P2" ? "selected=selected" : "")+'value="P2">P2</option>'+
          '<option '+((data_backlog.priority) == "P3" ? "selected=selected" : "")+'value="P3">P3</option>'+
          '</select>',
          data_backlog.status,
          '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal'+data_backlog.id_backlog+'">Details</button>'+
          '<div id="myModal'+data_backlog.id_backlog+'" class="modal fade" role="dialog">'+
          '<div class="modal-dialog">'+
          '<div class="modal-content">'+
          '<div class="modal-header">'+
          '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
          '<h4 class="modal-title">Backlog - Data Details</h4>'+
          '</div>'+
          '<div class="modal-body">'+
          '<h3>ID Alat     : '+data_backlog.ID+'</h3>'+
          '<h3>Model Alat  : '+data_backlog.model+'</h3>'+
          '<h3>Down Date   : '+data_backlog.down_date+'</h3>'+
          '<h3>Hours Meter : '+data_backlog.hours_meter+'</h3>'+
          '<h3>Indication  : '+data_backlog.indication+'</h3>'+
          '<h3>Status      : '+data_backlog.status+'</h3>'+
          '<h3>Priority    : '+data_backlog.priority+'</h3>'+
          '<h3>Reminder KM : '+data_backlog.reminder_km+'</h3>'+
          '<h3>Reminder HM : '+data_backlog.reminder_hours_meter+'</h3>'+
          '</div>'+
          '</div>'+
          '</div>'+
          '</div>',
          '<a href="#" class="delete_backlog"'+
          'data-id="'+data_backlog.id_backlog+'"'+
          '<i class="fa fa-trash"></i> Delete'+
          '</a>'
          ] ).node().id = data_backlog.id_backlog;
        t.draw( false );
        //    }
      }
    });
  }

  // add priority
  $(".js-prioritas").on("change",function(){
    var id_backlog = $(this).data('id');
    var prioritas = $(this).val();
    $.confirm({
      title: 'Update prioritas',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"editPrioritas",
            dataType:"JSON",
            data : {id_backlog:id_backlog,priority:prioritas},
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

  function update_priority(e,id){
    var id_backlog = id;
    var prioritas = e.value;
    $.confirm({
      title: 'Update prioritas',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"editPrioritas",
            dataType:"JSON",
            data : {id_backlog:id_backlog,priority:prioritas},
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


  var js_date = $(".js-down_date")
  js_date.on('change', function(e){
    var id_backlog = $(this).data('id');
    var down_date = $(this).val();
    var page = $(this).data("page");
    var history = "onprogress"
    console.log(id_backlog + " "+ down_date);
    $.confirm({
      title: 'Update down date',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"editDownDate",
            dataType:"JSON",
            data : {id_backlog:id_backlog,down_date:down_date,history:history},
            success: function(data){
              var table = $('#datatable').DataTable();
              // var table = $('#example').DataTable();
              if(page == "backlog"){
                var rows = table
                .rows( "#"+id_backlog )
                .remove()
                .draw();
              }
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

  function update_up(e,id){
    var id_backlog = id;
    var down_date = e.value;
    var history = "onprogress";
    $.confirm({
      title: 'Update down date',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"editDownDate",
            dataType:"JSON",
            data : {id_backlog:id_backlog,down_date:down_date,history:history},
            success: function(data){
              var table = $('#datatable').DataTable();
              // var table = $('#example').DataTable();
              var rows = table
              .rows( "#"+id_backlog )
              .remove()
              .draw();
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

  // });

  var js_up_date = $(".js-up_date")
  js_up_date.on('change', function(e){
    var id_backlog = $(this).data('id');
    var up_date = $(this).val();
    var history = "onprogress";
    console.log(id_backlog + up_date);
    $.confirm({
      title: 'Update up date',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"editUpDate",
            dataType:"JSON",
            data : {id_backlog:id_backlog,up_date:up_date,history:history},
            success: function(data){
              var table = $('#datatable').DataTable();
              var rows = table
              .rows( "#"+id_backlog )
              .remove()
              .draw();
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

  // function update(e){
  //   var js_date = $(".js-down_date")
  //   var id_backlog = js_date.data('id');
  //   var down_date = js_date.val();
  //   console.log(id_backlog + down_date);
  //   $.ajax({
  //     type: "POST",
  //     url:"editDownDate",
  //     dataType:"JSON",
  //     data : {id_backlog:id_backlog,down_date:down_date},
  //     success: function(data){
  //       notifikasi("Down date berhasil di perbaharui");
  //     }
  //   });
  // }


  $('.sell-progress').on('show.bs.modal', function(e) {
    var _this = $(this);
    var id = $(e.relatedTarget).data('id');
    var model = $(e.relatedTarget).data('model');
    var key = $(e.relatedTarget).data('key');
    var quantity = $(e.relatedTarget).data('quantity');
    var compare_qty = $(e.currentTarget).find('.quantity_awal').val();
    var button = $(e.currentTarget).find('.sell_log_progress')
    $(e.currentTarget).find('.ID_alat').val(id);
    $(e.currentTarget).find('.model_hidden').val(model);


    var qty_awal = ""
    $('.part_number').change(function(){
      qty_awal = $( ".js-sell option:selected" ).data('quantity');
      _this.find('.quantity_awal').val(qty_awal);
      _this.find('.quantity').val("");
      _this.find('js-lokasi').append();
    });

    $('.price_sell, .quantity').on("change keyup",function(){
      console.log(compare_qty)
      var form = $(this).closest('.js-sell-progress');
      var qty = form.find('.quantity');
      var price = $(this).val();
      var total = form.find('.total');
      var error_text = _this.find('.js-error-text');
      if(qty.val() > qty_awal) {
        button.attr('disabled',true)
        error_text.removeClass('hidden');
      } else {
        button.attr('disabled',false)
        error_text.addClass('hidden');
      }
      total.val(qty.val() * price);

    });

    // $.ajax({
    //   type: "POST",
    //   url:"getDescription",
    //   dataType:"JSON",
    //   data : {id_backlog:id},
    //   success: function(data){
    //     $(e.currentTarget).find('.description').val(data.id_backlog);
    //     var data_backlog = data[(data.length)];
    //     for(i=0; i<data.length; i++){
    //       $(e.currentTarget).find('.description').val(data[i].description);
    //     }
    //     // $('#show_data').html(html);


    //   }
    // });
  })


  $(".submit_description").on("click",function(){
    var description = $(".description").val();
    var id_backlog = $(".id_description").val();
    // console.log(id_backlog + desc);

    $.ajax({
      type: "POST",
      url:"editDeskripsi",
      dataType:"JSON",
      data : {id_backlog:id_backlog,description:description},
      success: function(data){
        $(".modal_add_description").modal('hide');
        $(".description").val("");
        notifikasi("Deskripsi berhasil di perbaharui");
      }
    });
  });

  $('.modal_add_description').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('.id_description').val(id);
    console.log("modal_add_description");
    $.ajax({
      type: "POST",
      url:"getDescription",
      dataType:"JSON",
      data : {id_backlog:id},
      success: function(data){
        $(e.currentTarget).find('.description').val(data.id_backlog);
        var data_backlog = data[(data.length)];
        for(i=0; i<data.length; i++){
          $(e.currentTarget).find('.description').val(data[i].description);
        }
        // $('#show_data').html(html);


      }
    });
  })

  $('.mechanic').on('show.bs.modal', function(e) {
    // console.log($(".mechanic").data("id"));
    var id = $(e.relatedTarget).data('id');
    console.log(id);
    var dataid = $(e.currentTarget).find('.id_add_mechanic').val(id);

    $(".js-save_mechanic").on('click',function(){
      var mechanic = $(".js-mechanic").val();
      // var id_backlog = $(".js-mechanic").data("id");
      console.log(mechanic + "" )
      $.confirm({
        title: 'Tambah Deskripsi',
        content: 'Apakah anda yakin?',
        buttons: {
          confirm: function () {
            $.ajax({
              type: "POST",
              url:"editMechanic",
              dataType:"JSON",
              data : {id_backlog:id,mechanic:mechanic},
              success: function(data){
                $(".mechanic").modal('hide');
                notifikasi("Mekanik berhasil di tambahkan");
              }
            });
          },
          cancel: function () {
            $.alert('Canceled!');
          },

        }
      });
    })
  })

  $(".delete_backlog").on("click",function(e){
    // e.preventDefault();
    var id = $(this).data("id");
    var table = $('#datatable').DataTable();
    // var table = $('#example').DataTable();
    $.confirm({
      title: 'Hapus Data',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"delete",
            dataType:"JSON",
            data : {id_backlog:id},
            success:
            setTimeout(function(){
              table.rows( "#"+id ).remove().draw();
              notifikasi("Data berhasil dihapus");
            },300)
          });
        },
        cancel: function () {
          $.alert('Canceled!');
        },

      }
    });

  });


  $('#send_sell').on("click",function(){
    var _this = $(this);
    event.preventDefault();
    var ID = $('.ID_alat').val();
    var url = $(this).data('url');
    var date = $('.js-date-sell').val();
    var part_number = $('.part_number').val();
    var lokasi = $('.location').val();
    var quantity = $('.quantity').val();
    var quantity_awal = $('.quantity_awal').val()
    var price_sell = $('.price_sell').val();
    var model = $('.model_hidden').val();
    var total = $('.total').val();
    console.log(date);
    if(ID != '')
    {
      $.confirm({
        title: '<div class="error">Konfirmasi</div>',
        content: '<p>Apakah anda yakin?</p>',
        buttons: {
          confirm: function () {
            $.ajax({
              type: "POST",
              url: url,
              data : {ID:ID,date:date,part_number:part_number,lokasi:lokasi,quantity:quantity,quantity_awal:quantity_awal,price_sell:price_sell,total:total,model:model},
              success: function(data){
                $(".sell-progress").modal('hide');
                var ID = $('.ID').val("");
                var part_number = $('.part_number').val("");
                var lokasi = $('.lokasi').val("");
                var quantity = $('.quantity').val("");
                var price_sell = $('.price_sell').val("");
                var total = $('.total').val("");
                notifikasi("Data berhasil ditambahkan");
                setTimeout(function(){
                 window.location.href = _this.data('redirect');
               },1000)
                // location.reload(true);


              }});
          },
          cancel: function () {
            $(".modal-add").modal('hide');
            $(".modal-add").modal('hide');
            $(".error").hide();
            $(".ID").val("");
            $(".model").val("");
            $(".hours_meter").val("");
            $(".indication").val("");
            $(".status").val("");
          }

        }
      });
    }
    else
    {
      $(".error").html("<div class='alert alert-danger alert-dismissible fade in'>Pastikan anda mengisi semua inputan</div>");
    }
  });
