App.controller('cOrder',function(sResource, md5, fCart, fUser){
    this.cart = fCart;
    this.payment =1;
    
    
    this.byu = function()
    {
        console.log('item id='+ this.cart.id );
        console.log('payment id='+ this.payment);
        
        sResource.oreder.get( {idp:this.payment , idt:this.cart.id} ).$promise.then( function(todo){
            console.log(todo);
            
            $('#myModalPay').modal('toggle');
            alert("Спасибо за заказ, в ближайшее время с Вами свяжуться наши сотрудники!");
            });
    }
});