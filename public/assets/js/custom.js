

$(document).ready(function(){
  $(document).on('click', '.disabled_field', function(){
    // Find the closest numberField in the same row
    $(this).closest('tr').find('.numberField').prop('disabled', !$(this).is(':checked'));
  });

  $("#example-basic").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true,
    
});
});


let stream; // To store the camera stream

// Open Camera button
document.getElementById('openCameraButton').addEventListener('click', function() {
  // Request access to the front camera
  navigator.mediaDevices.getUserMedia({ video: { facingMode: 'user' } })
    .then(function(cameraStream) {
      // Save the stream to stop later
      stream = cameraStream;

      // Attach the camera stream to the video element
      const video = document.getElementById('camera');
      video.srcObject = stream;

      // Show the video and capture/cancel buttons
      video.style.display = 'block';
      document.getElementById('captureButton').style.display = 'inline';
      document.getElementById('cancelCameraButton').style.display = 'inline';

      // Hide the open camera button
      document.getElementById('openCameraButton').style.display = 'none';
    })
    .catch(function(err) {
      console.error("Error accessing the camera: ", err);
    });
});

// Capture button
document.getElementById('captureButton').addEventListener('click', function() {
  const video = document.getElementById('camera');
  const canvas = document.getElementById('previewCanvas');
  const context = canvas.getContext('2d');

  // Draw the current frame from the video onto the canvas
  context.drawImage(video, 0, 0, canvas.width, canvas.height);

  // Stop the video stream to freeze the preview and hide the video
  stream.getTracks().forEach(track => track.stop());
  video.style.display = 'none';

  // Show the canvas with the captured image
  canvas.style.display = 'block';

  // Hide the capture button (since the image is captured)
  document.getElementById('captureButton').style.display = 'none';
});

// Cancel button to reset everything
document.getElementById('cancelCameraButton').addEventListener('click', function() {
  const video = document.getElementById('camera');
  const canvas = document.getElementById('previewCanvas');

  // Hide the canvas and stop any video stream
  canvas.style.display = 'none';
  if (stream) {
    stream.getTracks().forEach(track => track.stop());
  }

  // Hide all buttons except the open camera button
  document.getElementById('captureButton').style.display = 'none';
  document.getElementById('cancelCameraButton').style.display = 'none';
  document.getElementById('openCameraButton').style.display = 'inline';
});

document.querySelector('.dropdown-menu').addEventListener('click', function(event) {
  event.stopPropagation();
});

// mobile menu
const mediaQuery = window.matchMedia("(max-width: 991px)");
if (mediaQuery.matches) {
  let elmnt = document.querySelector(".navbar");
  let hdr = document.querySelector(".site-header");
  hdr.insertAdjacentElement("afterend", elmnt);
}
 
const header = document.querySelector(".main_head");
const main_hldr = document.querySelector(".main_hldr");
const toggle_button = document.querySelector(".toggle_btn");
const tags = document.querySelector(".tags");
const left_part = document.querySelector(".left_part");
const dropdown_div = document.querySelector(".dropdown_div");

toggle_button.addEventListener("click", function () {
  main_hldr.classList.toggle("hide");
  header.classList.toggle("hide");
  dropdown_div.style.display = "none";
});

// tags.addEventListener("wheel", function (event) {
//   event.preventDefault();
//   this.scrollLeft += event.deltaY;
// });

left_part.addEventListener('click', function(){
  if(main_hldr.classList.contains('hide') || header.classList.contains('hide')){
    main_hldr.classList.remove('hide');
    header.classList.remove('hide');
  };
});

document.querySelector('.inhouse_form').style.display = 'block';
document.querySelector('.outsourced_form').style.display = 'none';

document.querySelector(".switching").addEventListener('click', function(event) {
if (event.target.checked) {
 console.log('Check');
 document.querySelector('.inhouse_form').style.display = 'none';
   document.querySelector('.outsourced_form').style.display = 'block';
   document.querySelector('.drow_title').innerHTML = "Outsourced Drawing";
}
else{
  document.querySelector('.outsourced_form').style.display = 'none';
  document.querySelector('.inhouse_form').style.display = 'block';
  document.querySelector('.drow_title').innerHTML = "Inhouse Drawing";
}
});


const submenu = document.querySelector('.sumenuList');
submenu.addEventListener('click', function(){
  this.parentNode.classList.toggle('submenuopen');
})
