
var user = "";
var role = "";
var conf = "";
var name = "";
var loca = "";
var id = "";
var owner = "";

// $(document).ready(function() {
    let loginfo = getLocalStorage('info');
    if (loginfo) {
        user = loginfo['user'];
        id = loginfo['user'];
        owner = loginfo['owner'];
        role = loginfo['role'];
        conf = loginfo['conf'];
        name = loginfo['name'];
        loca = loginfo['loca'];
    }
// })