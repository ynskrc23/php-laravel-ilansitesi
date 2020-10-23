	// INSTAGRAM
	function getPhotos() {
	  var token = "17283874885.8f4c5bf.f9202a2b707b4d3fbfd01e685c004f82",
		/* YOU WILL NEED YOUR INSTAGRAM ACCESS TOKEN HERE. You will need to register and application here first using your account: https://www.instagram.com/developer/.

	Then go here:
	https://api.instagram.com/oauth/authorize/?client_id=[clientID]&redirect_uri=[redirectURI]&response_type=code
	BE SURE TO PASTE IN YOUR clientID - you can find that ID in the instagram developer tools - and your Redirect URI you set up when you created the application.

	 According to instagram docs the token does not expire so you should only need it once
	 */
		num_photos = 6;

	  return $.ajax({
		url:
		  "https://api.instagram.com/v1/users/17283874885/media/recent/?access_token=17283874885.8f4c5bf.f9202a2b707b4d3fbfd01e685c004f82" +
		  token,
		dataType: "jsonp",
		type: "GET",
		data: {
		  access_token: token,
		  count: num_photos
		},
		success: function(data) {
		  console.log("getPhotos, here is the data: ", data);
		},
		error: function(data) {
		  console.log("data: ", data);
		}
	  });
	}

	function addImages(data) {
	  console.log("addImages: ", data.data);
	  var array = data.data;
	  if (typeof array !== "undefined") {
		for (var i = 0, len = array.length; i < len; i++) {
		  $(".insta-grid").append(
			'<div class="insta-slide"> <a target="_blank" href="' + data.data[i].link + '"> <img src="' +
			  data.data[i].images.low_resolution.url +  
			   '" style="height:120px; width:33.33%; margin:auto; padding:5px 8px; float:left; "></a> </div>'
		  );
		}
	  } else {
		$(".insta-grid").append(
		  '<div class="insta-error"><h1> No Photos Available - Please add your Instagram token </h1></div>'
		);
	  }
	}

	function fireSlick() {
	  console.log("made it to fireSlick");
	  return $(".insta-grid").slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 700
	  });
	}

	function insta() {
	  getPhotos()
		.then(addImages)
		.then(fireSlick);
	}

	document.getElementById("demo").innerHTML = insta();

