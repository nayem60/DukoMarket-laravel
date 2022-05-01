$(document).ready(function(){
  $('#payment').on('change',function(){
       var payment=$(this).val()
       if(payment=='razorpay'){
          $('.razorpay').show()
          $('.place_order').hide();
          $('.sslcommerz').hide()
           $('.aamrpay').hide();
       }else if(payment=='sslcommerz'){
           $('.sslcommerz').show()
           $('.place_order').hide();
           $('.razorpay').hide()
           $('.aamrpay').hide();
       }else if(payment=='aamrpay'){
           $('.aamrpay').show();
           $('.sslcommerz').hide()
           $('.place_order').hide();
           $('.razorpay').hide()
       }else if(payment=='paypal'){
           $('.paypal').show();
           $('.aamrpay').hide();
           $('.sslcommerz').hide()
           $('.place_order').hide();
           $('.razorpay').hide()
         
       }else{
         $('.paypal').hide();
         $('.razorpay').hide();
         $('.sslcommerz').hide();
         $('.place_order').show();
         $('.aamrpay').hide();
         
         
       }
  });
  
//////===========Razorpay===========  
 
  $('.razorpay').click(function(e){
    var first_name=$('#first_name').val();
    var last_name=$('#last_name').val();
    var country=$('#country').val();
    var city=$('#city').val();
    var address=$('#address').val();
    var zipcode=$('#zipcode').val();
    var email=$('#email').val();
    var mobile=$('#mobile').val();
    var order_note=$('#order_note').val();
   if(!first_name){
     var error="field is required";
     $("#error").html(error);
   }else{
     $("#error").html('');
   }
   var data={
     'first_name':first_name,
     'last_name':last_name,
     'country':country,
     'city':city,
     'address':address,
     'zipcode':zipcode,
     'email':email,
     'mobile':mobile,
     'order_note':order_note
   }
   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
   
   $.ajax({
     url:'/razorpay',
     type:'post',
     data:data,"_token": "{{ csrf_token() }}",
     success:function(response){
       var options = {
         "key": "rzp_test_az3MVXF1akwD8Y", // Enter the Key ID generated from the Dashboard
         "amount": response.totals*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
         "currency": "INR",
         "name":response.first_name+""+response.last_name,
         "description": "Thank you sir",
         "image": "https://example.com/your_logo",
        // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (razorpay){
        //alert(response.razorpay_payment_id);
        //alert(response.razorpay_order_id);
    var data={
     'first_name':response.first_name,
     'last_name':response.last_name,
     'country':response.country,
     'city':response.city,
     'address':response.address,
     'zipcode':response.zipcode,
     'email':response.email,
     'mobile':response.mobile,
     'order_note':response.order_note,
     'payment_id':razorpay.razorpay_payment_id,
     'orderid':razorpay.razorpay_order_id
     
   }
          $.ajax({
            url:'/success-razorpay',
            type:'post',
            data:data,
            success:function(data){
              alert(data);
            }
          });
        
    },
    "prefill": {
        "name": response.first_name+""+response.last_name,
        "email": response.email,
        "contact": response.mobile
    },
    "notes": {
        "address": response.address
    },
    "theme": {
        "color": "#3399cc"
     }
  };
    var rzp1 = new Razorpay(options);
    rzp1.open();
     }
   });
  });
  
//=================SSLcommerz=======
  
$('.aamrpay').click(function(){
    var first_name=$('#first_name').val();
    var last_name=$('#last_name').val();
    var country=$('#country').val();
    var city=$('#city').val();
    var address=$('#address').val();
    var zipcode=$('#zipcode').val();
    var email=$('#email').val();
    var mobile=$('#mobile').val();
    var order_note=$('#order_note').val();
    
    var data={
     'first_name':first_name,
     'last_name':last_name,
     'country':country,
     'city':city,
     'address':address,
     'zipcode':zipcode,
     'email':email,
     'mobile':mobile,
     'order_note':order_note
   }
   
    $.ajax({
      url:'/aamrpay',
      type:'post',
      data:data,
      success:function(response){
        console.log(response);
      }
    });
});  
  
  
});