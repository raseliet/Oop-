'use strict';

fetch('api/drinks/get.php')
	.then(response => response.json())
	.then(data => console.log(data));

