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
              $(".modal-add_user").modal('hide');
              $(".error").hide();
              $(".nama").val("");
              $(".user_name").val("");
              $(".password").val("");
              $(".level").val("");
              $(".lokasi").val("");
              showDataUser();
              notifikasi("Data berhasil ditambahkan");
              // location.reload(true);
            }});
          },
          cancel: function () {
            $(".modal-add_user").modal('hide');
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

  function showDataUser(){
    $.ajax({
      type  : 'POST',
      url   : 'user/show',
      async : true,
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      success : function(data){
        var t = $('#datatable').DataTable();
        var data = data[(data.length)-1];
        t.row.add( [
          data.id,
          data.nama,
          data.user_name,
          data.password,
          data.level,
          data.lokasi,
          '<a href="" data-toggle="modal"'+
            'data-id="'+data.id+'"'+
            'data-target=".modal_edit_user">'+
            '<i class="fa fa-edit"></i> Edit</a> || '+
            '<a onclick="delete_user($(this))" href="#" class="delete_user"'+
            'data-id="'+data.id+'">'+
            '<i class="fa fa-trash"></i>Delete</a>'
        ] ).node().id = data.id;
        t.draw( false );
        //    }
      }
    });
  }


  $('.modal_edit_user').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('.id_edit_user').val(id);
    $(e.currentTarget).find('.user_name').val("");
    $(e.currentTarget).find('.password').val("");
    $(e.currentTarget).find('.newpassword').val("");
    console.log(id);

    $.ajax({
      type: "POST",
      url:"user/getUserById",
      dataType:"JSON",
      data : {id:id},
      success: function(data){
        // $(e.currentTarget).find('.description').val(data.id_backlog);
        var data_backlog = data[(data.length)];
        for(i=0; i<data.length; i++){
          var currentPasword = data[i].password;
          $(e.currentTarget).find('.password').on('keyup',function(){
            var _this = $(this);
            var newPassword = CryptoJS.MD5(_this.val()).toString();
            if(newPassword == currentPasword){
              console.log("benar")
              $('#send_user_edit').removeAttr('disabled');
              $('.password_error').hide();
            }
            else{
              console.log("salah");
              $('.password_error').html("<div class=alert alert-danger>password lama salah</div>");
            }
          });
          $(e.currentTarget).find('.nama_edit').val(data[i].nama);
          $(e.currentTarget).find('.user_name_edit').val(data[i].user_name);
        }
        // $('#show_data').html(html);
      }
    })
  });

  $("#send_user_edit").on("click",function(e){
    e.preventDefault();
    var id = $('.id_edit_user').val();
    var nama = $(".nama_edit").val();
    var user_name = $(".user_name_edit").val();
    var password = $(".newpassword").val();
    var level = $(".level_edit").val();
    var lokasi = $(".lokasi_edit").val();
    $.confirm({
      title: 'Edit User',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"user/editUserDetail",
            dataType:"JSON",
            data : {id:id,nama:nama,user_name:user_name,password:password,level:level,lokasi:lokasi},
            success: function(data){
              $(".modal_edit_user").modal('hide');
              notifikasi("User berhasil di perbaharui");
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

  $(".delete_user").on("click",function(e){
    // e.preventDefault();
    var id = $(this).data("id");
    var table = $('#datatable').DataTable();
    // var table = $('#example').DataTable();
    $.confirm({
      title: 'Hapus User',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"user/deleteUser",
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

  function delete_user(_this){
    // e.preventDefault();
    var id = _this.data("id");
    var table = $('#datatable').DataTable();
    // var table = $('#example').DataTable();
    $.confirm({
      title: 'Hapus User',
      content: 'Apakah anda yakin?',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            url:"user/deleteUser",
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
  }

  $(".notif").ready(function () {
    if($(".notif").data("var")){
      console.log($(".notif").data("var"))
      notifikasi("Foto berhasil di update")
    } else if ($(".notif").data("var") == false) {
      new PNotify({
        title: 'Error',
        text: 'Gagal update foto',
        type: 'error',
        styling: 'bootstrap3'
      });
    }
  });

  $('.foto').bind('change', function() {

  //this.files[0].size gets the size of your file.
  var size_image = this.files[0].size;
  var type = this.files[0].type;
  if(size_image > 2048000){
    $(this).closest('.js-input-foto').siblings('.error').html('Ukuran file yang dimasukkan tidak lebih dari 2MB');
    $('.btn-edit-foto').attr('disabled','disabled');
  } else if (type !== "image/png" && type !== "image/jpeg" ) {
    $(this).closest('.js-input-foto').siblings('.error').html('Pastikan file yang dimasukkan adalah jpg/png');
    $('.btn-edit-foto').attr('disabled','disabled');
  } else {
    $(this).closest('.js-input-foto').siblings('.error').html('');
    $('.btn-edit-foto').removeAttr('disabled','disabled');
  }

});
