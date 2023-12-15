window.onload = function() {
    var audioContainers = document.getElementsByClassName('audio-container');
    console.log('audio count: ', audioContainers.length)
    for (let i = 0; i < audioContainers.length; i++) {
        let audio = audioContainers[i].getElementsByClassName('audio')[0];
        let playPauseButton = audioContainers[i].getElementsByClassName('play-pause-button')[0];
        let seekSlider = audioContainers[i].getElementsByClassName('seek-slider')[0];
        let currentTime = audioContainers[i].getElementsByClassName('current-time')[0];

        seekSlider.max = Math.floor(audio.duration);
        console.log('audio.duration: ', audio.duration);
    
        playPauseButton.addEventListener('click', function() {
            if (audio.paused) {
                audio.play();
                playPauseButton.classList.remove('play');
                playPauseButton.classList.add('pause');
            } else {
                audio.pause();
                playPauseButton.classList.remove('pause');
                playPauseButton.classList.add('play');
            }
        });

        audio.addEventListener('timeupdate', function() {
            seekSlider.value = audio.currentTime;
            currentTime.textContent = formatTime(audio.currentTime);
        });

        seekSlider.addEventListener('input', function() {
            audio.currentTime = seekSlider.value;
        });
    }
    
    function formatTime(seconds) {
        var minutes = Math.floor(seconds / 60);
        seconds = Math.floor(seconds % 60);
        return minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
    }
}