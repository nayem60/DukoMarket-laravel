function size(sizeId) {
  $("#variant_id").val(sizeId);
  $('.choose-color').hide();
  $('.choose-size').show();
  $('.sizes_'+sizeId).show();
  $('.choose-size').css('color','black');
  $('#size_'+sizeId).css('color','red');
  var price = $("#size_"+sizeId).data('price');
  $('.price').html('<span>$'+price.toFixed(2)+'</span>');

}


function color(colorId) {
  $("#variant_id").val(colorId);
  $('.choose-size').hide();
  $('.choose-color').show();
  $('.colors_'+colorId).show();
  $('.choose-color').css('color','black');
  $('#color_'+colorId).css('color','red');
  var price = $("#color_"+colorId).data('price');
  $('.price').html('<span>$'+price.toFixed(2)+'</span>');


}
function cartWithVariant(productId,variant_id){
    var variant=$("#variant_id").val();
    var quantity=$("#quantity").val();
    if(variant==""){
       const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
             toast.addEventListener('mouseenter', Swal.stopTimer)
             toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
       })

        Toast.fire({
            icon: 'error',
            title: 'Please select size or color'
        })
    }else{
    $.ajax({
      url:"/add-cart/"+productId,
      type:"POST",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
      data:{variant:variant,quantity:quantity},
      success:function(data){
         const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
             toast.addEventListener('mouseenter', Swal.stopTimer)
             toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
       })

        Toast.fire({
            icon: 'success',
            title: 'Add Cart Successful!'
        })
      }
    });
  }
}
function add_cart(productId){
    var variant=$("#variant_id").val();
    var quantity=$("#quantity").val();
    $.ajax({
      url:"/add-cart/"+productId,
      type:"POST",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
      data:{variant:variant,quantity:quantity},
      success:function(data){
          const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
             toast.addEventListener('mouseenter', Swal.stopTimer)
             toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
       })

        Toast.fire({
            icon: 'success',
            title: 'Add Cart Successful!'
        })
      }
      
      
    });
  }
    


