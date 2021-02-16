$(function($){
	'use strict';

	$('body').on('click','.changeLocationStatus',function(){
		let id=$(this).attr('locaId');
		$.ajax({
			url:$(this).attr('data-action'),
			method:'POST',
			data:{id:id},
			success:function(response){
				let data=JSON.parse(response)
				if (data.status=="success") {
				  	toastr.success(data.message);
				}else{
				   	toastr.error(data.message);
				}
			},
			error:function(){

			}
		});
	})


	$('body').on('click','.changeQueestStatus',function(){
		let id=$(this).data('target');
		$.ajax({
			url:$(this).attr('data-action'),
			method:'POST',
			data:{id:id},
			success:function(response){
				let data=JSON.parse(response)
				if (data.status=="success") {
				  	toastr.success(data.message);
				}else{
				   	toastr.error(data.message);
				}
			},
			error:function(){

			}
		});
	})


		$('body').on('click','.changeQueestFeature',function(){
		let id=$(this).data('target');
		$.ajax({
			url:$(this).attr('data-action'),
			method:'POST',
			data:{id:id},
			success:function(response){
				let data=JSON.parse(response)
				if (data.status=="success") {
				  	toastr.success(data.message);
				}else{
				   	toastr.error(data.message);
				}
			},
			error:function(){

			}
		});
	  })


		$('body').on('click','.changebadgeStatus',function(){
		let id=$(this).data('target');
		$.ajax({
			url:$(this).attr('data-action'),
			method:'POST',
			data:{id:id},
			success:function(response){
				let data=JSON.parse(response)
				if (data.status=="success") {
				  	toastr.success(data.message);
				}else{
				   	toastr.error(data.message);
				}
			},
			error:function(error){

			}
		});
	  })


			$('body').on('click','.changePostStatus',function(){
			let id=$(this).data('target');
			$.ajax({
				url:$(this).attr('data-action'),
				method:'POST',
				data:{id:id},
				success:function(response){
					let data=JSON.parse(response)
					if (data.status=="success") {
					  	toastr.success(data.message);
					}else{
					   	toastr.error(data.message);
					}
				},
				error:function(error){

				}
			});
		  })




});