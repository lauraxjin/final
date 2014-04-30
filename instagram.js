// JavaScript Document


//Use this url below to get your access token
//https://instagram.com/oauth/authorize/?display=touch&client_id=681476f9f41249eda847f775abc87b93&redirect_uri=http://www.unc.edu/~xjin/586/final/instagram&response_type=token 

//if you need a user id for yourself or someone else use:
//http://jelled.com/instagram/lookup-user-id
	
						
$(function() {
	
	var apiurl = "https://api.instagram.com/v1/tags/yoga/media/recent?access_token=48625196.681476f.3827ac2c090b4829a0cabac0d0f0fe7b&callback=?"
	var access_token = location.hash.split('=')[1];
	var html = ""
	
		$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: apiurl,
			success: parseData
		});
				
		
		function parseData(json){
			console.log(json);
			$.each(json.data,function(i,data){
				//html += '<p>Filter:"'+ data.filter+'"</p>';
				//html += '<p>Filter:"'+ data.username+'"</p>';
				html += '<img class="instapic" src ="' + data.images.low_resolution.url + '">'
			});
			
			console.log(html);
			$("#results").append(html);
			
		}
		
		
                
               
 });
		
		
		
		
	

		
