App.factory('fCart', function(sResource, fUser) {

	var cart = {id:null,
		payment:{result:null}
		};
	
	cart.buy = function(id)
	{
		
		
		
		sResource.payment( function (todo){
							  console.log(todo);
							
				cart.id = id;
				cart.payment =   todo;
				$('#myModalPay').modal('show');
					  
		});
		
		console.log(id);
		
	}
	
	return cart;

});