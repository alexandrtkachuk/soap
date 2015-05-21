App.service('sResource', function($resource , myConfig, md5 ) {
    
    
    //var Todo = $resource(myConfig.backend+'/car/:id');
    
    //return true;
    
    this.getCar =  $resource(myConfig.backend+'car/info/:id', null,
        {
            'get': { method:'GET' }
        });
    this.getAllCars =  $resource(myConfig.backend+'car/info/', null,
        {
            'get': { method:'GET' }
        });
        
        this.payment = function(callback){
        
            var t = $resource(myConfig.backend+'order/payments/', null,
            {
                'get': {
                    method:'GET',
                    headers:{ "token" : window.localStorage.taicarshop}
                }
                
            });
            
            t.get().$promise.then(callback);
        }
    
    //oreder
    
    
    this.orederOld = function(idPayment, idItem, IdUser, callback)
    {
         var t = $resource(myConfig.backend+'order/order/:idp/:idu',
        {
            idp:'@idp',
            idt:'@idt'
        },
            {
                'add': { method:'GET'  }
                
            });
            
            t.add({idp:idPayment , idt:idItem}).$promise.then(callback);
    }
    
    this.oreder =  $resource(myConfig.backend+'order/order/:idp/:idu/', {
            idp:'@idp',
            idt:'@idt'
        });
       
    
    
    
    
    
    this.search =  $resource(myConfig.backend+
                             'car/search/year/:year/volume/:vol/color/:color/maxspeed/:speed/price/:price/');
    // console.log(md5.createHash('test'));
    /*
    
    Todo.get({id: 2} ,function(todo) {
        //todo.foo += '!';
        todo.$save();
        console.log('me');
        var test = todo;
        console.log(todo);
        //console.log(test.toString());
    });
    */
    
});
