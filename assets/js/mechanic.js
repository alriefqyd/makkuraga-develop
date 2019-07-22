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
                // location.reload(true);
                
                
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
          type  : 'ajax',
          url   : 'mechanic/show',
          async : true,
          dataType : 'json',
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
              '<a href="mechanic/edit"><i class="fa fa-edit"></i> Edit</a>  <a href="Delete"><i class="fa fa-trash"></i>Delete</a>',
              
              
            ] ).node().id = data_mechanic.id;
            t.draw( false ); 
            //    }
          }
        });
      }