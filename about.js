$(document).ready(function() {
    var audioPlayer = document.getElementById('audio-player');
    var stopButton = document.getElementById('stop-button');
  
    stopButton.addEventListener('click', function() {
      audioPlayer.pause();
      audioPlayer.currentTime = 0;
    });
  });
  