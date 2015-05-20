App.controller('cSearch',function(sResource, fCart){
    this.cart = fCart;
    var el = {
        display:"none",
        items: null
        };
        
    this.el = el;
    
    
    this.items ='';
    this.year =2010;
    this.value = null;
    this.color = null;
    this.speed = null;
    this.price = null;
    
    
    this.search = function()
    {
        me ={year:this.year};
        
        if (!this.speed) {
           me.speed = 'null';
        }
        else{me.speed = this.speed; }
        
        if (!this.value) {
           me.value = 'null';
        }else{me.value= this.value; }
        
        if (!this.color) {
           me.color = 'null';
        }else{me.color = this.color; }
        
        if (!this.price) {
           me.price = 'null';
        }else{me.price = this.price; }
        
        el.display="none";
        
       this.items = sResource.search.get({
        year:me.year,
        vol:me.value,
        color:me.color,
        speed:me.speed,
        price:me.price
        }).$promise.then(function(todo){
        
            //console.log(todo);
            if (todo.result && !todo.result.errors) {
                //code
                el.items = todo.result;
                el.display="block";
            }
            
            console.log(el);
        
        })
       
    }
});