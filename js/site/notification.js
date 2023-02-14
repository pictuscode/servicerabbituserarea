setInterval(function(){

				$.ajax(

						{

							type: "POST",

							url: baseurl+'site/user/get_notification',

							dataType: "json",
							
							success: function(data)

							{ 

								if (data['success'] =='1')

								{

								 $.each(data['result'],function(key,val){

									  notifyBrowser(val.title,val.message,baseurl+'dashboard',val.img,val.id);

								 });

								 

								}

							}

						});

}, 8000);





document.addEventListener('DOMContentLoaded', function () 

{

    

if (Notification.permission !== "granted")

{

Notification.requestPermission();

}

});



function notifyBrowser(title,desc,url,img,id) 

{

if (!Notification) {

console.log('Desktop notifications not available in your browser..'); 

return;

}

if (Notification.permission !== "granted")

{

Notification.requestPermission();

}

else {

var notification = new Notification(title, {

icon:img,

body: desc,

});



$.ajax({

		type: "POST",

		url: baseurl+'site/user/update_notification_status',

		dataType: "json",

		data:{'id':id},

		success: function(data)

		{ 

			

		}

	});





notification.onclick = function () {

window.open(url);      

};



notification.onclose = function () {

console.log('Notification closed');

};



}

}

