document.addEventListener('DOMContentLoaded', function () {
    const audioElements = [
        document.getElementById('song1'),
        document.getElementById('song2'),
        document.getElementById('song3')
    ];

    const playPauseBtns = [
        document.getElementById('playPauseBtn1'),
        document.getElementById('playPauseBtn2'),
        document.getElementById('playPauseBtn3')
    ];

    const volumeSliders = [
        document.getElementById('volume1'),
        document.getElementById('volume2'),
        document.getElementById('volume3')
    ];

    const songInfoElements = [
        document.getElementById('songInfo1'),
        document.getElementById('songInfo2'),
        document.getElementById('songInfo3')
    ];

    audioElements.forEach((audio, index) => {
		let title = 'Song'
		switch (index) {
			case 0:
				title = 'Menu Theme'
				break
			case 1:
				title = 'Reina\'s Hut'
				break
			case 2:
				title = 'Mountain Forest Path'
				break
			default:
				title = 'Song'
		}
        audio.addEventListener('loadedmetadata', function () {
            const duration = formatTime(audio.duration);
            songInfoElements[index].textContent = `${title} - ${duration}`;
        });
    });

    function togglePlayPause(index) {
        const audio = audioElements[index];
        const playPauseBtn = playPauseBtns[index];

        if (audio.paused) {
            audio.play();
            playPauseBtn.textContent = 'Pause';
        } else {
            audio.pause();
            playPauseBtn.textContent = 'Play';
        }
    }

    function adjustVolume(index) {
        const audio = audioElements[index];
        const volumeSlider = volumeSliders[index];

        audio.volume = volumeSlider.value;
    }

    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = Math.floor(seconds % 60);
        return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
    }
});
