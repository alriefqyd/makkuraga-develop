$("#send_mechanic").on('click',function(event){
    event.preventDefault();
    var name = $('.name_mechanic').val();
    var location = $('.location_mechanic').val();

    console.log(name +" " +location)
    if(name != '' & location != '' )
    {
    $.confirm({
        title: '<div class="error">Konfirmasi</div>',
        content: '<p>Apakah anda yakin?</p>',
        buttons: {
          confirm: function () {
            $.ajax({
              type: "POST",
              url:"mechanic/save",
              data : {name:name,location:location},
              success: function(data){
                $(".modal-add_mechanic").modal('hide');
                $('.name_mechanic').val("");
                $('.location_mechanic').val("");
                showData();
                notifikasi("Data berhasil ditambahkan");
              }});
            },
            cancel: function () {
              $(".modal-add_mechanic").modal('hide');
              $(".error").hide();
              $('.name_mechanic').val("");
              $('.location_mechanic').val("");
            }

          }
        });
      }
      else
      {
        $(".error").html("<div class='alert alert-danger alert-dismissible fade in'>Pastikan anda mengisi semua inputan</div>");
      }
    });
    function showData(){
        $.ajax({
          type  : 'POST',
          url   : 'mechanic/show',
          async : true,
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          success : function(data){
            var t = $('#datatable').DataTable();
            var data_mechanic = data[(data.length)-1];
            //     var i;
            //     var counter = 1;
            //     for(i=0; i<data.length; i++){
            // console.log(data_backlog.id_backlog);
            t.row.add( [

              data_mechanic.id,
              data_mechanic.name,
              data_mechanic.location,
              '<a href="" data-toggle="modal" data-id="'+data_mechanic.id+'" data-target=".modal_edit_mechanic"><i class="fa fa-edit"></i> Edit</a> || <a href="#" class="delete_mechanic" data-id="'+data_mechanic.id+'"><i class="fa fa-trash"></i>Delete</a>',


            ] ).node().id = data_mechanic.id;
            t.draw( false );
            //    }
          }
        });
      }

      $('.modal_edit_mechanic').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $(e.currentTarget).find('.id_edit_mechanic').val(id);
        console.log(id);
        $.ajax({
          type: "POST",
          url:"mechanic/getMechanicById",
          dataType:"JSON",
          data : {id:id},
          success: function(data){
            // $(e.currentTarget).find('.description').val(data.id_backlog);
            var data_backlog = data[(data.length)];
            for(i=0; i<data.length; i++){
              $(e.currentTarget).find('.edit_name_mechanic').val(data[i].name);
              $(e.currentTarget).find('.edit_location_mechanic').val(data[i].location);
            }
            // $('#show_data').html(html);


          }
        })
      });

      $(".edit_mechanic").on("click",function(e){
        e.preventDefault();
        var name = $(".edit_name_mechanic").val();
        var location = $(".edit_location_mechanic").val();
        var id = $(".id_edit_mechanic").val();
        console.log(name + location + id);
        $.confirm({
          title: 'Tambah Deskripsi',
          content: 'Apakah anda yakin?',
          buttons: {
            confirm: function () {
              $.ajax({
                type: "POST",
                url:"mechanic/editMekanik",
                dataType:"JSON",
                data : {id:id,name:name,location:location},
                success: function(data,s){
                  $(".modal_edit_mechanic").modal('hide');
                   // $(this).html(s);

                  notifikasi("Mekanik berhasil di perbaharui");
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

      $(".delete_mechanic").on("click",function(e){
        // e.preventDefault();
        var id = $(this).data("id");
        var table = $('#datatable').DataTable();
        // var table = $('#example').DataTable();
        $.confirm({
          title: 'Hapus Mekanik',
          content: 'Apakah anda yakin?',
          buttons: {
            confirm: function () {
              $.ajax({
                type: "POST",
                url:"mechanic/deleteMekanik",
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
