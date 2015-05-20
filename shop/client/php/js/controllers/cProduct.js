App.controller('cProduct',function(sResource,$stateParams, fCart){
	console.log($stateParams);
	this.cart = fCart;
	this.item = sResource.getCar.get({id:$stateParams.id});
	
	console.log($stateParams.id);
	
});