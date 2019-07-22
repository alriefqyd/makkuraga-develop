//  fungsi load data backload
//  $(document).ready(function(){
//   showData();
//  })

//  datepicker form datatable backlog
$(document).on('focus', '#date',function(){
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
            data : {ID: ID,model:model,hours_meter:hours_meter,indication:indication,status:status,prioritas:prioritas,history:history,reminder_km:reminder_km,reminder_hours_meter:reminder_hours_meter},
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
              showDataBacklog();
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
      type  : 'ajax',
      url   : 'show',
      async : true,
      dataType : 'json',
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
  
  $(".submit_description").on("click",function(){
    var description = $(".description").val();  
    var id_backlog = $(".id_description").val();
    // console.log(id_backlog + desc); 
    $.confirm({
      title: 'Tambah Deskripsi',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"editDeskripsi",
            dataType:"JSON",
            data : {id_backlog:id_backlog,description:description},
            success: function(data){
              $(".modal_add").modal('hide');
              $(".description").val("");
              notifikasi("Deskripsi berhasil di perbaharui");
            }
          });
        },
        cancel: function () {
          $.alert('Canceled!');
        },
        
      }
    });
  });
  
  $('.modal_add').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('.id_description').val(id);
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
    })
  })

   
  $(document).ready(function() {
    // $('select').select2().data('select2').$dropdown.addClass('my-container');
    $('.status').select2({
      allowClear:true,
      placeholder:"Select Status",
      
    })
    $('.select').select2({
      minimumResultsForSearch: Infinity
    });
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
});

$(".js-save_mechanic").on('click',function(){
  var mechanic = $(".js-mechanic").val();
  var id_backlog = $(".js-mechanic").data("id");
  console.log(mechanic + "" + id_backlog)
  $.confirm({
    title: 'Tambah Deskripsi',
    content: 'Apakah anda yakin?',
    buttons: {
      confirm: function () {
        $.ajax({
          type: "POST",
          url:"editMechanic",
          dataType:"JSON",
          data : {id_backlog:id_backlog,mechanic:mechanic},
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

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  