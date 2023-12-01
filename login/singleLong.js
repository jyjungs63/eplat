var vidSources = [
];
const loc = ""
//const loc = "https://www.eplat.co.kr/assets/img/online_study_room/v3/"
const searchParams = new URLSearchParams(location.search);

for (const param of searchParams) {
  console.log(param);
  vidSources.push(loc + param[1])
}
var vidElement = document.getElementById('video');

var activeVideo = Math.floor((Math.random() * vidSources.length));
vidElement.src = vidSources[activeVideo];
vidElement.addEventListener('ended', function (e) {
  // update the active video index
  activeVideo = (++activeVideo) % vidSources.length;
  if (activeVideo === vidSources.length) {
    activeVideo = 0;
  }

  // update the video source and play
  vidElement.src = vidSources[0];
  vidElement.play();
});