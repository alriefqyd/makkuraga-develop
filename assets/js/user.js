// add data user
$("#send_user").on('click',function(event){
  event.preventDefault();
  var user_name = $('.user_name').val();
  var nama = $('.nama').val();
  var password = $('.password').val();
  var level = $('.level').val();
  var lokasi = $('.lokasi').val();
  console.log()
  if(user_name != '' & nama != '' & password != '' & level != '' & lokasi != '')
  {
    $.confirm({
      title: '<div class="error">Konfirmasi</div>',
      content: '<p>Apakah anda yakin?</p>',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"user/save",
            data : {nama: nama,user_name:user_name,password:password,level:level,lokasi:lokasi},
            success: function(data){
              $(".modal-add").modal('hide');
              $(".error").hide();
              $(".nama").val("");
              $(".user_name").val("");
              $(".password").val("");
              $(".level").val("");
              $(".lokasi").val("");
              // showDataUser();
              notifikasi("Data berhasil ditambahkan");
              // location.reload(true);
            }});
          },
          cancel: function () {
            $(".modal-add").modal('hide');
            $(".modal-add").modal('hide');
            $(".error").hide();
            $(".nama").val("");
            $(".user_name").val("");
            $(".password").val("");
            $(".level").val("");
            $(".lokasi").val("");
          }

        }
      });
    }
    else
    {
      $(".error").html("<div class='alert alert-danger alert-dismissible fade in'>Pastikan anda mengisi semua inputan</div>");
    }
  });
