@extends('frontend.layouts.app')
@section('main')
<!-- Features Section -->
<div id="features" class="text-center">
	<div class="container">
	  	<div class="section-title">
			<h2>Our BLOG</h2>
	  	</div>
		<div class="row">
			
				<div class="col-xs-12">
					<div class="features-item text-center">
						<h3>No Blog Post</h3>
					</div>
				</div>
			
		</div>
		
	</div>
</div>
@endsection
@push('scripts')
	<script>
		$(document).on('click','.remove-from-wish',function(){
            var item = $(this).attr('data-item');
            var item_id = parseInt($(this).attr('data-item_id'));
            $.ajax({
                type:'POST',
                dataType: 'json',
                url: "{{route('user.bookmark.remove')}}",
                data:{
                    '_token' : $('meta[name="csrf-token"]').attr('content'),
                    'item_id': item_id,
                    'item': item
                },
                success:function(data) {
                  alert('success');
                    // $('#cart-notification').html(data.cart_count);
                    // $('#cart-notification,.shopping-cart').show();
                    // var cart_total = 0;
                    // var listing;
                    // $('#shopping_list').html('');
                    // $.each( data.cart, function( key, value ) {
                    //     listing =  `<li  id="cartlist`+key+`">
                    //                     <div class="media">
                    //                         <a href="#">
                    //                             <img alt="" class="mr-3"
                    //                                 src="/storage/media/image/`+value['image']+`">
                    //                         </a>
                    //                         <div class="media-body">
                    //                             <a href="#">
                    //                                 <h4>`+value['name']+`</h4>
                    //                             </a>
                    //                             <h4><span>`+value['quantity']+` x `+value['amount']+`</span></h4>
                    //                         </div>
                    //                     </div>
                    //                     <div class="close-circle">
                    //                         <a href="javascript:void(0)" class="remove-from-cart" data-product="`+key+`product"><i class="fa fa-times" aria-hidden="true"></i></a>
                    //                     </div>
                    //                 </li>`;
                    //     cart_total += parseInt(value['quantity']) * parseInt(value['amount']);
                    //     $('#shopping_list').prepend(listing);
                    // });
                    // $('#cart_total').html(cart_total);
                },
                error: function (data, textStatus, errorThrown) {
                console.log(data);
                },
            });
        });
	</script>
@endpush