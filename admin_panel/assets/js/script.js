function openNav() {
    document.getElementById("mySidebar").style.transform = "translateX(0)";
    document.getElementById("main-content").style.paddingLeft = "210px";
    document.getElementById("main").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidebar").style.transform = "translateX(-100%)";
    document.getElementById("main-content").style.paddingLeft = "15px";
    document.getElementById("main").style.display = "block";
}

// Show / hide password
const password = document.getElementById('password');
const eyeIcon = document.getElementById('eyeIcon');
if (eyeIcon) {
    eyeIcon.onclick = () => {
        if (password.type == "password") {
            password.type = "text";
            eyeIcon.classList.remove("fi-rr-eye-crossed");
            eyeIcon.classList.add("fi-rr-eye");
        } else {
            password.type = "password";
            eyeIcon.classList.remove("fi-rr-eye");
            eyeIcon.classList.add("fi-rr-eye-crossed");
        }
    }
} else {

}


// Play Song Feature (Trang Admin có sử dụng AJAX nên có thể nghe nhạc mà không bị gián đoạn bởi reload trang)
const song = document.getElementById('song');
const btnSong = document.getElementById('btn_song');
var isPlaying = false;

btnSong.onclick = () => {
    if (!isPlaying) {
        btnSong.classList.remove('fi-rr-volume-mute');
        btnSong.classList.add('fi-rr-volume');
        song.play();
        isPlaying = true;
    } else {
        btnSong.classList.remove('fi-rr-volume');
        btnSong.classList.add('fi-rr-volume-mute');
        song.pause();
        isPlaying = false;
    }
}