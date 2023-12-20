function formatDate() {
    
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
    var status = true;
    $.ajax({
        url: "http://localhost:3000/Server/" + fucName, //
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

CallToast = (stat, message) => {
    if (stat == "success") {
        toastr.success(message, 'Info', {
            positionClass: 'toast-top-right',
            timeout: 3000,
            closeButton: true,
            progressBar: true
        });
    }
    else if ( stat == "error")
    {
        toastr.error(message, 'Info', {
            positionClass: 'toast-top-right',
            timeout: 3000,
            closeButton: true,
            progressBar: true
        });
    }

}