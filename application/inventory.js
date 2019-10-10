$("#send_inventory").on('click',function(event){
  event.preventDefault();
  var part_number = $('.part_number').val();
  var description = $('.description').val();
  var category = $('.category').val();
  var cost = $('.cost').val();
  var price = $('.price_').val();
  var location = $('.location').val();
  var quantity = $('.quantity').val();
  var account_code = $('.account_code').val();
  if(part_number != '' & description != '' & category != '' & cost != '' & location != '')
  {
    $.confirm({
      title: '<div class="error">Konfirmasi</div>',
      content: '<p>Apakah anda yakin?</p>',
      buttons: {
        confirm: function () {
          $.ajax({
            type: "POST",
            // contentType: "application/json; charset=utf-8",
            url:"save",
            data :{part_number:part_number,description:description,category:category,cost:cost,price:price,location:location,quantity:quantity,account_code:account_code},
            success: function(data){
              $(".modal-add-inventory").modal('hide');
              $(".error").hide();
              $(".part_number").val("");
              $(".description").val("");
              $(".category").val("");
              $(".cost").val("");
              $(".price").val("");
              $(".location").val("");
              $('.quantity').val("");
              $('.account_code').val("");
              showDataInventory();
              notifikasi("Data berhasil ditambahkan");
              // location.reload(true);


            }});
          },
          cancel: function () {
            $(".modal-add-inventory").modal('hide');
            $(".error").hide();
            $(".part_number").val("");
            $(".description").val("");
            $(".category").val("");
            $(".cost").val("");
            $(".price").val("");
            $(".location").val("");
            $('.quantity').val("");
            $('.account_code').val("");
          }

        }
      });
    }
    else
    {
      $(".error").html("<div class='alert alert-danger alert-dismissible fade in'>Pastikan anda mengisi semua inputan</div>");
    }
});

  function showDataInventory(){
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

            data.id,
            data.part_number,
            data.description,
            data.category,
            data.cost,
            data.price,
            data.location,
            data.quantity,
            data.account_code,
            '<a href="" data-toggle="modal" data-id="'+data.id+'" data-target=".modal_edit_mechanic"><i class="fa fa-edit"></i> Edit</a> || <a href="#" class="delete_mechanic" data-id="'+data.id+'"><i class="fa fa-trash"></i>Delete</a>',


          ] ).node().id = data.id;
          t.draw( false );
          //    }
        }
      });
    }

    $('.modal_edit_inventory').on('show.bs.modal', function(e) {
      var id = $(e.relatedTarget).data('id');
      $(e.currentTarget).find('.id_edit_mechanic').val(id);
      $.ajax({
        type: "POST",
        url:"getDataById",
        dataType:"JSON",
        data : {id:id},
        success: function(data){
          // $(e.currentTarget).find('.description').val(data.id_backlog);
          // var data = data[(data.length)];
          for(i=0; i<data.length; i++){
            $(e.currentTarget).find('.part_number_edit').val(data[i].part_number);
            $(e.currentTarget).find('.description_edit').val(data[i].description);
            $(e.currentTarget).find('.category_edit').val(data[i].category);
            $(e.currentTarget).find('.cost_edit').val(data[i].cost);
            $(e.currentTarget).find('.price__edit').val(data[i].price);
            $(e.currentTarget).find('.location_edit').val(data[i].location);
            $(e.currentTarget).find('.quantity_edit').val(data[i].quantity);
            $(e.currentTarget).find('.account_code_edit').val(data[i].account_code);
            $(e.currentTarget).find('.id_edit_inventory').val(data[i].id);
          }
          // $('#show_data').html(html);


        }
      })
    });

    $("#edit_inventory").on("click",function(e){
      e.preventDefault();
      var part_number = $('.part_number_edit').val();
      var description = $('.description_edit').val();
      var category = $('.category_edit').val();
      var cost = $('.cost_edit').val();
      var price = $('.price__edit').val();
      var location = $('.location_edit').val();
      var quantity = $('.quantity_edit').val();
      var account_code = $('.account_code_edit').val();
      var id = $(".id_edit_inventory").val();
      $.confirm({
        title: 'Tambah Deskripsi',
        content: 'Apakah anda yakin?',
        buttons: {
          confirm: function () {
            $.ajax({
              type: "POST",
              url:"editInventory",
              dataType:"JSON",
              data :{id:id,part_number:part_number,description:description,category:category,cost:cost,price:price,location:location,quantity:quantity,account_code:account_code},
              success: function(data){
                $(".modal_edit_inventory").modal('hide');
                 // $(this).html(s);

                notifikasi("Inventory berhasil di perbaharui");
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

    $(".delete_inventory").on("click",function(e){
      // e.preventDefault();
      var id = $(this).data("id");
      var table = $('#datatable').DataTable();
      // var table = $('#example').DataTable();
      $.confirm({
        title: 'Hapus Inventory',
        content: 'Apakah anda yakin?',
        buttons: {
          confirm: function () {
            $.ajax({
              type: "POST",
              url:"deleteInventory",
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

    });

    $(".js-auto-submit").on("change", function () {
            $(this).closest("form").submit();
    });
    $(".js-auto-submit").on("click", function () {
            console.log("gasgahs")
            $(this).closest("form").submit();
    });

    $('.modal_transfer_inventory').on('show.bs.modal', function(e) {
      var id = $(e.relatedTarget).data('id');
      var a = $(this).find('.location_transfer');
      var b = $(e.relatedTarget).data('location');
      // $(".location_transfer option[value='"+b+"']") {
      //   $(this).remove();
      // });
      $('.location_transfer option').load(function() {
        if ( $(this).val() == b ) {
          $(this).remove();
        }
      });

      $(e.currentTarget).find('.id_transfer').val(id);
      $.ajax({
        type: "POST",
        url:"getDataById",
        dataType:"JSON",
        data : {id:id},
        success: function(data){
          // $(e.currentTarget).find('.description').val(data.id_backlog);
          // var data = data[(data.length)];
          for(i=0; i<data.length; i++){
            $(e.currentTarget).find('.part_number_edit').val(data[i].part_number);
            $(e.currentTarget).find('.description_edit').val(data[i].description);
            $(e.currentTarget).find('.category_edit').val(data[i].category);
            $(e.currentTarget).find('.cost_edit').val(data[i].cost);
            $(e.currentTarget).find('.price__edit').val(data[i].price);
            $(e.currentTarget).find('.location_transfer').val(data[i].location);
            $(e.currentTarget).find('.location_from').val(data[i].location);
            $(e.currentTarget).find('.quantity_transfer').val(data[i].quantity);
            $(e.currentTarget).find('.quantity_compare').val(data[i].quantity);
            $(e.currentTarget).find('.account_code_edit').val(data[i].account_code);
            $(e.currentTarget).find('.id_edit_inventory').val(data[i].id);
          } 
          // $('#show_data').html(html);
        }
      });

      $('.quantity_transfer').on('change',function(){
        var modal = $(this).closest('.modal_transfer_inventory');
        var error = modal.find('.error');
        var compare =  modal.find('.quantity_compare');
        console.log(parseInt(compare.val()));
        console.log($(this).val());

        if($(this).val() > parseInt(compare.val())){
          modal.find('.btn-transfer-inventory').attr("disabled",'true');
          error.html("Transfer tidak boleh lebih dari " + compare.val());
        } else {
          modal.find('.btn-transfer-inventory').removeAttr("disabled",'true');
          error.html("");
        }
      });

      $('.location_transfer').on('change',function(){
        var location_to_actual = $(this).val();
        var part_number = $('.part_number_edit').val();
        $.ajax({
          type: "POST",
          url:"getDataByLocationAndPartNumber",
          dataType:"JSON",
          data : {id:id,location_to_actual:location_to_actual,part_number:part_number},
          success: function(data){
            // $(e.currentTarget).find('.description').val(data.id_backlog);
            // var data = data[(data.length)];
            for(i=0; i<data.length; i++){
              console.log(data);
              $(e.currentTarget).find('.quantity_location_to').val(data[i].quantity);
              $(e.currentTarget).find('.location_to').val(data[i].location);
            }
            // $('#show_data').html(html);
          }
        });
      })
    });



    $('#transfer_inventory').on("click",function(e){
      e.preventDefault();
      var location_from = $('.location_from').val();
      var location_to = $('.location_transfer').val();
      var quantity = $('.quantity_transfer').val();
      var quantity_compare = $('.quantity_compare').val();
      var part_number = $('.part_number_edit').val();
      var quantity_location_to = $('.quantity_location_to').val();
      var id = $(".id_transfer").val();
      console.log(part_number);
      $.confirm({
        title: 'Transfer Item',
        content: 'Apakah anda yakin?',
        buttons: {
          confirm: function () {
            $.ajax({
              type: "POST",
              url:"transferInventory",
              dataType:"JSON",
              data :{id:id,part_number:part_number,location_from:location_from,location_to:location_to,quantity:quantity,quantity_compare:quantity_compare,quantity_location_to:quantity_location_to},
              success: function(data){
                $(".modal_transfer_inventory").modal('hide');
                 // $(this).html(s);
                 for(i=0; i<data.length; i++){
                  alert(data[i].part_number)
                 }

                notifikasi("Inventory berhasil di transfer");
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
