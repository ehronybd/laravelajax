
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function(){

     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        //add products
        $(document).on('click','.add_product',function(e){
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            //console.log(name+price);

            $.ajax({

                url :"{{ route ('add.product')}}",
                method : 'POST',

                data : {name:name,price:price},
                success:function(res){
                    if(res.status=='success'){
                        $('#addeModal').modal('hide');
                        $('#AddProductForm')[0].reset();
                        $('.table').load(location.href+' .table');
                    }


                },



                error:function(err){
                    let error = err.responseJSON;
                    $.each(error.errors,function(index ,value){
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');

                    });
                }

            });

        });
        //show product on update modal
        $(document).on('click','.update_product_form',function(){

            let id = $(this).data('id');
            let name = $(this).data('name');
            let price = $(this).data('price');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_price').val(price);

        });

        //Update products
        $(document).on('click','.update_product',function(e){
            e.preventDefault();
            let name = $('#up_name').val();
            let id = $('#up_id').val();
            let price = $('#up_price').val();
            //console.log(name+price);

            $.ajax({

                url :"{{ route ('update.product')}}",
                method : 'post',

                data : {up_id:id,up_name:name,up_price:price},
                success:function(res){
                    if(res.status=='Success'){
                        $('#updateModal').modal('hide');
                        // $('#updateProductForm')[0].reset();
                        $('.table').load(location.href+' .table');

                        Command: toastr["success"]("Update Successfully", "Success")

                        toastr.options = {
                          "closeButton": false,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": true,
                          "positionClass": "toast-top-right",
                          "preventDuplicates": false,
                          "onclick": null,
                          "showDuration": "300",
                          "hideDuration": "1000",
                          "timeOut": "5000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        }

                }

            },
                error:function(err){
                let error = err.responseJSON;
                $.each(error.errors,function(index ,value){
                    $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');

                });
            }

        });

    });

    //Delete products
    $(document).on('click','.delete_product',function(e){
        e.preventDefault();
        let product_id = $(this).data('id');
        if(confirm('are you sure you want delete???')){
            //console.log(name+price);


            $.ajax({

                url :"{{ route ('delete.product')}}",
                method : 'post',

                data : {product_id:product_id},
                success:function(res){
                    if(res.status=='Success'){
                        // $('#updateModal').modal('hide');
                        // $('#updateProductForm')[0].reset();
                        $('.table').load(location.href+' .table');

                        Command: toastr["success"]("Delete Successfully", "Success")

                            toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                            }



                    }

                },

            });

        }

    });



    //pagination

    $(document).on('click','.pagination a' ,function(e){

    e.preventDefault();
    let page =$(this).attr('href').split('page=')[1]
    product(page)

    })

    function product(page){

              $.ajaxSetup({

            headers: {

    	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
    }
    //Serach

    $(document).on('keyup',function(e){

        e.preventDefault();

        let search_product = $('#search').val();
      // console.log(search_product);

      $.ajax({

      url : "{{ route('search.product')}}",
      method : 'get',
      data : {search_product:search_product},
       dataType: 'json', 
        encode  : true,
      success:function(res){
          $('.table-data').html(res);
      }

      });

    })

    });
</script>
