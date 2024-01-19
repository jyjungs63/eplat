function formatDate() {
    
    const date = new Date(); // Get current date
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Adding leading zero if needed
    const day = String(date.getDate()).padStart(2, '0'); // Adding leading zero if needed

    return `${year}-${month}-${day}`;
}
function formatDate2() {
    
    const date = new Date(); // Get current date
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Adding leading zero if needed
    const day = String(date.getDate()).padStart(2, '0'); // Adding leading zero if needed

    return `${year}-${month}-${day}`;
}

function cvtCurrency(amount) {
    return amount.toLocaleString("ko-KR");
}

function execDaumPostcode(zip="idZip", addrs = "idAddr") {
    new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                let addr = ''; // 주소 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') {
                    // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else {
                    // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }
                $("#"+zip).val(data.zonecode);
                $("#"+addrs).val(addr);
                $("#"+addrs).focus();
                // $("#idZip").val(data.zonecode);
                // $("#idAddr").val(addr);
                // $("#idAddr").focus();
            }
        }

    ).open();
}

CallAjax = ( fucName, fntype="POST", options, retFn, errFn) => {
    var host = window.location.host;
    var url = "http://localhost:3000/Server/"
    if ( host.includes('eplat'))
        url = "https://eplat.co.kr/Server/";
    var status = true;
    $.ajax({
        url: url + fucName, //
        type: fntype,
        dataType: "json",
        data: options,
        // processData: false,
        // contentType: false,
        success: function(resp) {
            retFn(resp);
        },
        error: function(xhr, status, error) {
            errFn ( xhr )
        }
    });
}

CallAjax1 = ( fucName, fntype="POST", options, retFn, errFn) => {
    var status = true;
    var host = window.location.host;
    var url = "http://localhost:3000/Server/"
    if ( host.includes('eplat'))
        url = "https://eplat.co.kr/Server/";
    $.ajax({
        url: url + fucName, //
        type: fntype,
        dataType: "json",
        data: options,
        processData: false,
        contentType: false,
        success: function(resp) {
            retFn(resp);
        },
        error: function(xhr, status, error) {
            errFn ( xhr )
        }
    });
}

CallToast = (message, stat ) => {
    if (stat == "success") {
        toastr.success(message, 'Success', {
            positionClass: 'toast-buttom-right',
            timeout: 2000,
            closeButton: true,
            progressBar: true
        });
    }
    else if ( stat == "error")
    {
        toastr.error(message, 'Error', {
            positionClass: 'toast-buttom-right',
            timeout: 2000,
            closeButton: true,
            progressBar: true
        });
    }

}

saveLocalStorage = ( name, jsstr ) => {
    localStorage.setItem(name, JSON.stringify(jsstr));
}

getLocalStorage = ( name ) => {
    return  JSON.parse( localStorage.getItem(name) );
}

deleteLocalStorage = ( name ) => {
    localStorage.removeItem(name);
}

getUser = () => {
    var sto = getLocalStorage('info');

    return sto != undefined ? sto['user'] : undefined;
}

getName = () => {
    var sto = getLocalStorage('info');

    return sto != undefined ? sto['name'] : undefined;
}

getRole = () => {
    var sto = getLocalStorage('info');

    return sto != undefined ? sto['role'] : undefined;
}

cardWidgetManage = ( widget , button ) => {

    widget.on('collapsed.lte.cardwidget', function() {
        button.html("펴기");
    });

    widget.on('expanded.lte.cardwidget', function() {
        button.html("접기");
    });
}

function generatePassword(length) {
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=";
    let password = '';

    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        password += charset[randomIndex];
    }

    return password;
}

function getRandomColor() {
    // Generate random values for red, green, and blue
    const red = Math.floor(Math.random() * 256);
    const green = Math.floor(Math.random() * 256);
    const blue = Math.floor(Math.random() * 256);
  
    // Create the RGB color string
    const color = `rgba(${red},${green},${blue},1)`;
  
    return color;
  }


window.addEventListener('beforeunload', function(e) {
    deleteLocalStorage('info')
});