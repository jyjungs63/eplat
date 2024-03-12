<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Video Iframe with JavaScript</title>
</head>

<body>

    <iframe id="videoIframe" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>

    <script>
    // JavaScript to control the video
    var videoIframe = document.getElementById('videoIframe');

    $("#videoIframe").attr('src', "https://www.eplat.co.kr/assets/img/online_study_room/v1/7-v1_s1_Aa_chant.mp4");

    // function playVideo() {
    //     videoIframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
    // }

    // function pauseVideo() {
    //     videoIframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    // }
    </script>

    <!-- Example buttons to control the video -->
    <!-- <button onclick="playVideo()">Play Video</button>
    <button onclick="pauseVideo()">Pause Video</button> -->

</body>

</html>