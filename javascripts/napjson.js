// JavaScript Document

    var itemId = "";
	var itemTitle  = "";
	var itemDate = "";
	var itemDesc = "";
	var itemAuthor = "";
	var itemContributor = "";
	var itemSub = "";
	var itemImg = "";
	var itemSource = "";
	var itemRights = "";
	var itemRelated = "";
	//var dateNow = new Date();
	var dateOneWeek = new Date();
	var itemLong = "";
	var itemLat = "";
	var itemZoom = "";
	var mapCanvas = "";
	var mapOptions= "";
	var map = "";
	var dateString = "";
	var weekSummary = "";
	var weekName = "";
	var relatedLinks = "";
	var objTitles = [];
	var objLinks = [];
	var objCol = [];
	var weeklyTitles = [];
	var weeklyDescription = [];
	var weeklyTitles = [];
	var weeklyID = [];
	var i = 0;
	var j = 0;

	dateOneWeek.setDate(dateNow.getDate() - 7);
	var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

	function clearVariables() {
		itemTitle  = "";
		itemDate = "";
		itemDesc = "";
		itemAuthor = "";
		itemContributor = "";
		itemSub = "";
	    itemImg = "";
		itemSource = "";
		itemRights = "";
		itemRelated = "";
		weekSummary = "";
		weekName = "";
	}
	
   function loadHomePage() {
   	var filesObject = $.getJSON("/api/files", function(result){
   		var files = result;

		var jsonObject = $.getJSON("/api/items", function(result) {
		$.each(result, function(index,field){
			itemId = field["id"];
	    	$.each(field["element_texts"], function(index, value){
				   var elementName = value["element"]["name"];
				   
				   switch(elementName){
				  	 case "Title":itemTitle = value["text"];
					 break;
				  	 case "Date":dateString = value["text"]; 
					 itemDate = value["text"].split("/");
					 break;
				  	 case "Subject":itemSub = value["text"];
					 break;
				   	 case "Description":itemDesc = value["text"];
					 break;
				   }
			})
				   
			itemDate[0] *= 1;
			itemDate[1] *= 1;

			var objectDate = new Date(dateNow.getFullYear() , itemDate[1] - 1 , itemDate[0]);

			if(objectDate <= dateNow){ 
				var currentTab = "";

				if((itemDate[0] == dateNow.getDate()) && (itemDate[1] == dateNow.getMonth() + 1)){
					currentTab = "selected-object";
				}
			
				var img = $.grep(files, function(e){
					return e.item.id == itemId;
				});

				dateString = itemDate[0] + " " + months[itemDate[1] - 1] + " " + itemDate[2];

				if(img.length > 0) {
					itemImg = img[0]["file_urls"]["thumbnail"];
					   
					$("#slider").append('<div id="slide' + itemId + '" ' + 'class="slides ' + currentTab + ' "><img src="' + itemImg +'">' + 
						'<a href="items/show/' + itemId + '" class="link" ><h2 	class="object-date">' + dateString + "</h2>" + "<h3>" + itemTitle + "</h3></a></div>");
							i++;
							currentTab = "";
					}		  
				}
			}); //end each item result


		});	 // end jsonObject fetch

		jsonObject.done(function(data){
			var sliderStartIndex = $('#slider').children().length - 1;
			if($(".selected-object").index() >= 0){sliderStartIndex = $(".selected-object").index();}
			 var slider = $('#slider').leanSlider({
				 	 startSlide: sliderStartIndex,
		            directionNav: '#slider-direction-nav',
		            controlNav: '#slider-control-nav'
					
		        });
				$("#slider-loading-wrapper").css("display","none");
		});
   	});


	}
	
	
	function loadObjectPage(objectIndex) {
	var jsonObject = $.getJSON("/api/items", function(result) {
	$.each(result, function(index,field){
		itemId = field["id"];
    	$.each(field["element_texts"], function(index, value){
			   var elementName = value["element"]["name"];
			   
			   switch(elementName){
			  	 case "Title":itemTitle = value["text"];
				 break;
			  	 case "Date":dateString = value["text"]; 
				 itemDate = value["text"].split("/");
				 break;
			  	 case "Subject":itemSub = value["text"];
				 break;
			   	 case "Description":itemDesc = value["text"];
				 break;
				 case "Contributor":itemContributor = value["text"];
				 break;
				 case "Source":itemSource = value["text"];
				 break;
				 case "Relation":itemRelated = value["text"];
				 break;
				 case "Rights":itemRights = value["text"];
				 break;
			   }
		})
		
		if(itemRelated.length > 0)itemRelated = itemRelated.split(";");
		$.each(itemRelated,function(index,value){
			relatedLinks+= '<li><a href="http://' + value + '" >'+ value + '</a></li>';
		});

		itemDate[0] *= 1;
		itemDate[1] *= 1;
		var tempDate = new Date(dateNow.getFullYear() , itemDate[1] - 1 , itemDate[0]);
		
		if(tempDate <= dateNow){
		//if(((itemDate[1] == dateOneWeek.getMonth() + 1) && (itemDate[0] >= dateOneWeek.getDate())) || ((itemDate[1] >dateNow.getMonth() + 1) && (itemDate[0] >= dateOneWeek.getDate()))){
		//if(itemDate[0] <= dateNow.getDate()   &&  itemDate[1] <= dateNow.getMonth() + 1){	
			var currentTab = "";
			if((itemDate[0] == dateNow.getDate() &&  itemDate[1] <= dateNow.getMonth() + 1) || objectIndex == itemId){
				currentTab = "selected-object";
			}
			   
		$.getJSON(field["files"]["url"] , function(imgResult) {
			var img = imgResult[0];
			itemImg = img["file_urls"]["thumbnail"];
			j = img["item"]["id"];
			$("#slide" + j + " .object-img-wrapper").append('<img src="' + itemImg +'"' + '>' );
			});
		
		
		if(field["extended_resources"]["geolocations"]){
		$.getJSON(field["extended_resources"]["geolocations"]["url"] , function(geoResult) {
			itemLong = geoResult["longitude"];
			itemLat = geoResult["latitude"];
			itemZoom = geoResult["zoom_level"];
			j = geoResult["item"]["id"];
			
			mapCanvas = $("#map-wrapper" + j);
            mapOptions = {
            center: new google.maps.LatLng(itemLat, itemLong),
            zoom: itemZoom,
            mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
          map = new google.maps.Map(mapCanvas[0], mapOptions);
		  
			});
	}	
				
		dateString = itemDate[0] + " " + months[itemDate[1] - 1] + " " + itemDate[2];
		
		$("#slider").append('<div id="slide' + itemId + '" ' + 'class="object-slides ' + currentTab + ' ">' + 
		
		'<div class="object-slide1">' + 
		'<h2 class="object-date">' + dateString + "</h2>" + '<div class="object-img-wrapper">' + '</div>' + 
		'<p class="object-contributor">Source: ' + itemSource + '</p>' + 
		'<p class="object-contributor">Permission: ' + itemRights + '</p>' + '<a href="/www/napoleon/timeline/#timeline-summary-wrapper">Go to weekly summary' + '</a>' +
		'<h2 class="object-date">Location</h2>' + '<div id="map-wrapper' + itemId + '" class = "map-wrapper">' + '</div>' +
		'<h2 class="object-date">Related Links</h2><ul>' +	relatedLinks +	
		
		'</ul></div>' +
			
		'<div class="object-slide2">' + 
		'<h2 class="object-date">' + itemTitle + "</h2>" + 
		'<p class="object-contributor">Contributed by: ' + itemContributor + '</p>' + '<p class="object-description">' + itemDesc  + '<button class="more-info">For further information, click here</button>' + '</p>'+
		'</div>' +
			
				
		'</div>');
		 i++;
		 currentTab = "";
		 clearVariables();
	}
			  
			  
	});
});


jsonObject.done(function(data){
	var sliderStartIndex = $('#slider').children().length - 1;
	if($(".selected-object").index() >= 0){sliderStartIndex = $(".selected-object").index();}
	 var slider = $('#slider').leanSlider({
		     pauseTime: false,
            startSlide: sliderStartIndex,
            directionNav: '#slider-direction-nav',
            controlNav: '#slider-control-nav'
        });
		$("#slider-loading-wrapper").css("display","none");
	});
	}
	
	



function loadTimeline(){
	 var objectIndex = 0;
	 var typeId = "";
	var stringObject = "";
    var flag = "";
	var loadingString = "";
	var objectList = "";
	var colId = "";
	var colUrl  = "";
	var colDesc = "";
	var colDate = "";
	var colTitle = "";
	var colSub = "";

	var jsonObject = $.getJSON("/api/collections", function(result) {

		$.each(result, function(index,field){
			colId = field["id"];
			colUrl = field["items"]["url"];

    		$.each(field["element_texts"], function(index, value){
			   	var elementName = value["element"]["name"];
			   	switch(elementName){
			  	 case "Title":colTitle = value["text"];
				 break;
			  	 case "Date":dateString = value["text"]; 
				 colDate = value["text"].split("/");
				 break;
			  	 case "Subject":colSub = value["text"];
				 break;
			   	 case "Description":colDesc = value["text"];
				 break;
			   }
			});

			colDate[0] *= 1;
			colDate[1] *= 1;
			colDesc = JSON.stringify(colDesc);
			colDesc = colDesc.substr(1,colDesc.length - 2);
			//alert(colDesc);
			var tempDate = new Date(dateNow.getFullYear() , colDate[1] - 1 , colDate[0]);
			
			if(tempDate <= dateNow){
			stringObject += flag + '{' + '"startDate":' + '"' + colDate[2] + ',' + colDate[1] + ',' + colDate[0] +	 '"' + ',' + '"endDate":' + '"' + colDate[2] + ',' + colDate[1] + ',' + colDate[0] + '"' + ',' + '"headline":'+ '"' + colTitle + '"' + ',' + '"text":'+ '"<div class=\'timeline-summary-wrapper' + colId + '\' ><article class=\'weekly-summary clearfix\'><h2 class=\'weekly-summary-title' + colId + '\'>Summary for this week</h2><div class=\'summary-text\'><p class=\'summary' + colId + '\'>'+colDesc+'</p></div>' + '</article>' + '</div><div class=\'timeline-weekly-objects-wrapper' + colId + '\' ><h2>Objects for this Week</h2><br /><br /><ul class=\'timeline-weekly-objects' + colId + '\'></ul></div>"' + '}';
			flag = ","; 
			objectList += '<li><a href="items/show/' +itemId + '" >' + itemTitle + '</a></li>';  
			itemId = colId;
				var timelineJsonObject = $.getJSON(colUrl , function(sumResult) {
					$.each(sumResult, function(index, value){
						var temp_title = value["element_texts"][0];
						itemDate = dateNow + 1;
						for(var i = 1; i < value["element_texts"].length;i++)
						{
								var temp_element = 	value["element_texts"][i];
								if(temp_element["element"]["name"] == "Date"){itemDate = temp_element["text"].split("/"); i =value["element_texts"].length; break;}			
						}
						
					var tempDate = new Date(dateNow.getFullYear() , itemDate[1] - 1 , itemDate[0]);
					if(tempDate <= dateNow){
					
					objTitles[objectIndex] = temp_title["text"];
					//alert(objTitles[objectIndex] + "s:" + objectIndex);
					objLinks[objectIndex] = value["id"];
					objCol[objectIndex] = value["collection"]["id"];
					//alert(objCol[objectIndex]);
						objectIndex++;
					}
					});
				typeId = "";
				loadingString="";
				});  
			
			}

			  
		});
	});
 
	jsonObject.done(function(data){
	var jsonText = '{"timeline": {"headline":"Napoleon Wars", "type":"default","text":"", "date": [' + stringObject + ']' + '}}'; 
	
	var dataObject = jQuery.parseJSON(jsonText);
	var timelineJson =  createStoryJS({
                    type:       'timeline',
					 source:     dataObject,
					 start_at_end: true,
                    embed_id:   'embed-timeline'
                });
				
				//$(".weekly-objects-list").append(objectList);
				$("#slider-loading-wrapper").css("display","none");
				timelineTimer();
				
	});

}

var timeIndex = 0;
var objIndex = 0;
function timelineTimer(){
var timeOut = setInterval(function()
	{
		//alert(itemId);
		if($(".timeline-summary-wrapper" + itemId).length > 0){
			if(objIndex < objTitles.length && $(".timeline-weekly-objects" + objCol[objIndex])) {
				$(".timeline-weekly-objects" + objCol[objIndex]).append("<li><a href='items/show/" + objLinks[objIndex] + "'>" + objTitles[objIndex]+ "</a></li>");
				//$(".summary" + weeklyID[weeklyIndex]).html(weeklyDescription[weeklyIndex]);
				objIndex++
			}
			
			if(objIndex >= objTitles.length){
			clearInterval(timeOut);
			}
		  }
		},500
	);
}