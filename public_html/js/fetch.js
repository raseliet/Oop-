'use strict';
//
//const formData = new FormData();
//
//formData.append('name', 'Jupi');
//formData.append('acount_ml', '500');
//formData.append('abarot', '10');
//formData.append('image', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSy2PTApJFV_PpksjHSxJMaSkcnAfJgL0Ldn2SMhhqlafVa4--s');
//formData.append('action', 'insert');
//


//
//console.log('prisijunge');
//
//fetch('api.php')
//        .then(response => response.json())
//        .then(data => console.log(data));
//
// 
//console.log(FormData);
//
//fetch('index.php', {
//    method: 'POST',
//    body: formData
//
//})
//        .then(response => response.text());
//      

fetch('index.php', {
   method: 'POST',
   body: formData
})
       .then(response => response.text());