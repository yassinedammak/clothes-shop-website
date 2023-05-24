
$(document).ready(function() {
  var audioPlayer = document.getElementById('audio-player');
  var stopButton = document.getElementById('stop-button');
  var playButton = document.getElementById('play-button'); 

  stopButton.addEventListener('click', function() {
      audioPlayer.pause();
      audioPlayer.currentTime = 0;
  });

  playButton.addEventListener('click', function() {
      audioPlayer.play();
  });
});
