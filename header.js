
var user = "";
var role = "";
var conf = "";
var name = "";
var loca = "";

// $(document).ready(function() {
    let loginfo = getLocalStorage('info');
    if (loginfo) {
        user = loginfo['user'];
        role = loginfo['role'];
        conf = loginfo['conf'];
        name = loginfo['name'];
        loca = loginfo['loca'];
    }
// })