/*image upload function*/
	var canvas = document.getElementById("canvas"),
			context = canvas.getContext("2d"),
			image=document.getElementById("imageurl"),
			snap=document.getElementById("snap"),
			video = document.getElementById("video"),
			videoObj = { "video": true },
			Stream=null,
			track=null,
			errBack = function(error) {
				console.log("Video capture error: ", error.code); 
			};
	document.getElementById("cam_img").addEventListener("click", function() {
			
			video.style.visibility = 'visible';
			snap.style.display = 'block';
				
				
			navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||  navigator.mozGetUserMedia;
			if (navigator.getUserMedia) {
				navigator.getUserMedia({ video: videoObj },
					function(stream) {		
						video.src = window.URL.createObjectURL(stream);
						Stream=stream.getTracks()[0];
						video.onloadedmetadata = function(e) {
						video.play();
						};
						track=stream.getTracks()[0];
					},
					function(err) {
						console.log("The following error occurred: " + err.name);
					}
				);
			} else {
				console.log("getUserMedia not supported");
			}
	}, false);

	document.getElementById("snap").addEventListener("click", function() {
			
			context.drawImage(video, 0, 0, 266, 200);
			var dataURL = canvas.toDataURL();
			image.value=dataURL;
			if(Stream.enabled){
				video.pause();
				Stream.stop();
				snap.style.display = 'none';
				video.style.visibility = 'hidden';
				}

		});


