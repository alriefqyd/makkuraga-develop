
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
            url:"save",
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
      url   : 'show',
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
          "",
          data_pm.ID,
          data_pm.model,
          data_pm.sn,
          data_pm.location,
          "",
          "",
          "",
          "",
        ] ).node().id = data_pm.id_pm;
        t.draw( false );
        //    }
      }
    });
  }