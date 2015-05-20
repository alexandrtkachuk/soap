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
    
    this.getUser_old = $resource(myConfig.backend+'user/info/', null,
        {
    
            'get': {
                method:'GET'
                ,headers: {
                    "Authorization": "Basic " + btoa("test@mail.ru:"+md5.createHash('test'))
                   
                }
            
            } 
            
            
        });
    
    
    this.user =  $resource(myConfig.backend+'user/add/:name/:pass/:email',
        {
            email:'@email',
            name:'@name',
            pass:'@pass'
        },
        {
            'add': { method:'POST' }
        });
    
    
    this.getUser = function(temp, callback)
    {   
        var t =$resource(myConfig.backend+'user/info/', null,
        {
            'getme': {
                method:'GET'
                ,headers: temp
            }  
        });
        
        return t.getme()
        .$promise.then(callback);  
    }
    
    this.loginUser = function(temp, callback)
    {   
        var t =$resource(myConfig.backend+'user/login/', null,
        {
            'getme': {
                method:'Post'
                ,headers: temp
            }  
        });
        
        return t.getme()
        .$promise.then(callback);  
    }
    
    this.logoutUser = function(temp, callback)
    {   
        var t =$resource(myConfig.backend+'user/logout/', null,
        {
            'getme': {
                method:'PUT'
                ,headers: temp
            }  
        });
        
        return t.getme()
        .$promise.then(callback);  
    }
    
    
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
    
    this.oreder = function(idPayment, idItem, IdUser, callback)
    {
         var t = $resource(myConfig.backend+'order/order/:idp/:idu',
        {
            idp:'@idp',
            idt:'@idt'
        },
            {
                'add': {
                    method:'POST',
                    headers:{ "token" : window.localStorage.taicarshop}
                }
                
            });
            
            t.add({idp:idPayment , idt:idItem}).$promise.then(callback);
    }
    
    
    this.delete = function( idItem, callback)
    {
         var t = $resource(myConfig.backend+'car/car/:idI/',
        {
            idI:'@idI'
        },
            {
                'del': {
                    method:'DELETE',
                    headers:{ "token" : window.localStorage.taicarshop}
                }
                
            });
            
            t.del({idI:idItem }).$promise.then(callback);
    }
    
    
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
