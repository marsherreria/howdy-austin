var interval;
var curr_index = 0;

var slideShow = ["photos/acl.jpg",
                "photos/alfred.jpg",
                "photos/architecturelib.jpg",
                "photos/austinbouldering.jpg",
                "photos/barbarella.jpg",
                "photos/bartonsprings.jpg",
                "photos/bastrop.jpg",
                "photos/bennu.jpg",
                "photos/billie.jpg",
                "photos/bluehole.jpg",
                "photos/bubbleegg.jpg",
                "photos/buffaloexchange.jpg",
                "photos/cainandabels.jpg",
                "photos/cherrywood.jpg",
                "photos/chuys.jpg",
                "photos/cocos.jpg",
                "photos/cruxclimbing.jpg",
                "photos/csbuilding.jpg",
                "photos/eer.jpg",
                "photos/fengcha.jpg",
                "photos/flamingovintage.jpg",
                "photos/flats.jpg",
                "photos/gdc.jpg",
                "photos/gongcha.jpg",
                "photos/greenbelt.jpg",
                "photos/hamiltonpool.jpg",
                "photos/hippiehollow.jpg",
                "photos/homeslice.jpg",
                "photos/hopdoddy.jpg",
                "photos/jacobswell.jpg",
                "photos/jos.jpg",
                "photos/krausesprings.jpg",
                "photos/lakegeorgetown.jpg",
                "photos/lifesci.jpg",
                "photos/livelovepaddle.jpg",
                "photos/lonestarkayak.jpg",
                "photos/mckinneyfalls.jpg",
                "photos/medici.jpg",
                "photos/nhb.jpg",
                "photos/pavement.jpg",
                "photos/q2.jpg",
                "photos/ranch.jpg",
                "photos/riverplace.jpg",
                "photos/rositas.jpg",
                "photos/roundrockexpress.jpg",
                "photos/sculpturefalls.jpg",
                "photos/sxsw.jpg",
                "photos/teapioca.jpg",
                "photos/terryblacks.jpg",
                "photos/texasrowingcenter.jpg",
                "photos/thunderbird.jpg",
                "photos/unbarlievable.jpg",
                "photos/uptowncheapskate.jpg",
                "photos/utsports.jpg",
                "photos/velvetTaco.jpg",
                "photos/vicandals.jpeg"]


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
