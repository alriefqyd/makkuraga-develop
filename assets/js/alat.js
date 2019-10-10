$("#send_alat").on('click',function(event){
  event.preventDefault();
  var ID_alat = $('.ID_alat').val();
  var serial = $('.serial_number').val();
  var model = $('.model').val();
  var lokasi = $('.location').val();
  if(ID_alat != '' && serial != '' && model != '' && lokasi != '' )
  {
    $.confirm({
      title: '<div class="error">Konfirmasi</div>',
      content: '<p>Apakah anda yakin?</p>',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"alat/save",
            data : {ID_alat:ID_alat,serial:serial,model:model,lokasi:lokasi},
            success: function(data){
              $(".modal-add_alat").modal('hide');
              notifikasi("Alat berhasil di tambahkan");
              setTimeout(function(){
                window.location.reload()}
                ,1000);
            }});
        },
        cancel: function () {
        }

      }
    });
  }
  else
  {
    $(".error").html("<div class='alert alert-danger alert-dismissible fade in'>Pastikan anda mengisi semua inputan</div>");
  }
});

$('.modal_edit_alat').on('show.bs.modal', function(e) {
  var id = $(e.relatedTarget).data('id');
  $(e.currentTarget).find('.id_edit_alat').val(id);
  console.log(id);
  $.ajax({
    type: "POST",
    url:"alat/getAlatById",
    dataType:"JSON",
    data : {id:id},
    success: function(data){
            // $(e.currentTarget).find('.description').val(data.id_backlog);
            var data_backlog = data[(data.length)];
            for(i=0; i<data.length; i++){
              $(e.currentTarget).find('.edit_ID_alat').val(data[i].ID_alat);
              $(e.currentTarget).find('.edit_model').val(data[i].model);
              $(e.currentTarget).find('.edit_serial_number').val(data[i].serial_number);
              $(e.currentTarget).find('.edit_lokasi').val(data[i].lokasi);
              $(e.currentTarget).find('.edit_lokasi').select2().val(data[i].lokasi).trigger("change");
            }
            // $('#show_data').html(html);


          }
        })
});

$(".edit_alat").on("click",function(e){
  e.preventDefault();
  var id = $('.id_edit_alat').val();
  var ID_alat = $('.edit_ID_alat').val();
  var serial = $('.edit_serial_number').val();
  var model = $('.edit_model').val();
  var lokasi = $('.edit_lokasi').val();
  $.confirm({
    title: 'Tambah Deskripsi',
    content: 'Apakah anda yakin?',
    buttons: {
      confirm: function () {
        $.ajax({
          type: "POST",
          url:"alat/editAlat",
          dataType:"JSON",
          data : {ID_alat:ID_alat,serial:serial,model:model,lokasi:lokasi,id:id},
          success: function(data,s){
            $(".modal_edit_alat").modal('hide');
                   // $(this).html(s);
               notifikasi("Alat berhasil di perbaharui");
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

$(".delete_alat").on("click",function(e){
        // e.preventDefault();
        var id = $(this).data("id");
        var table = $('#datatable').DataTable();
        // var table = $('#example').DataTable();
        $.confirm({
          title: 'Hapus Alat',
          content: 'Apakah anda yakin?',
          buttons: {
            confirm: function () {
              $.ajax({
                type: "POST",
                url:"alat/deleteAlat",
                dataType:"JSON",
                data : {id:id},
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

      })
