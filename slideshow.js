var interval;
var curr_index = 0;

var slideShow = ["photos/velvetTaco.jpg",
                "photos/chuys.jpg",
                "photos/rositas.jpg",
                "photos/crux.jpeg",
                "photos/greenbelt.jpeg",
                "photos/ABP.jpeg"]


function next_image() {
    return slideShow[curr_index]

}

function change_image() {
    document.getElementById("image").setAttribute("src", next_image());
    curr_index += 1;
    if (curr_index >= slideShow.length) {
        curr_index = 0;
    }
}

function start_slideshow() {
    interval = setInterval(change_image, 2000);
    change_image()

}

function stop_slideshow() {
    clearInterval(interval);

}

start_slideshow()
document.getElementById("start").addEventListener("click", start_slideshow);
document.getElementById("end").addEventListener("click", stop_slideshow);