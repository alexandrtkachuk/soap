App.config(function($stateProvider, $urlRouterProvider) {

	$urlRouterProvider.otherwise("/");
	  
	$stateProvider
		.state('index', {
		  url: "/",
		  controller: "cIndex as cI",
		  templateUrl: "partials/index.html"
		})
	.state('product', {
		  url: "/product/{id}",
		  controller: "cProduct as cP",
		  templateUrl: "partials/product.html"
		})
	
	.state('user', {
		  url: "/user",
		  controller: "cUser as cU",
		  template: "{{cU.test}}"
		  
		})
		
		.state('search', {
		  url: "/search",
		  controller: "cSearch as cS",
		  templateUrl: "partials/search.html"
		  
		}) 

  });