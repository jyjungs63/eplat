var deleteIcon = function(cell, formatterParams) { //plain text value
    return "<i class='fa fa-trash'></i>";
};

table = new Tabulator("#idTable", {
    height: "700px",
    layout: "fitColumns",
    //autoColumns: true,
    selectable: true,
    columns: [
        {
            title: "권한",
            field: "role",
            width: "9%",
            editor: "input",
            editorParams: {
                autocomplete: "true",
                allowEmpty: true,
                listOnEmpty: true,
                valuesLookup: true
            }
        },
        {
            title: "지사/유치원명",
            field: "owner",
            width: "10%",
            editor: "input",
            editorParams: {
                autocomplete: "true",
                allowEmpty: true,
                listOnEmpty: true,
                valuesLookup: true
            }
        },
        {
            title: "이름",
            field: "name",
            width: "10%",
            editor: "input",
            editorParams: {
                autocomplete: "true",
                allowEmpty: true,
                listOnEmpty: true,
                valuesLookup: true
            }
        },
        {
            title: "전화번호",
            field: "mobile",
            width: "10%",
            editor: "input",
            editorParams: {
                autocomplete: "true",
                allowEmpty: true,
                listOnEmpty: true,
                valuesLookup: true
            }
        },
        {
            title: "아이디",
            field: "id",
            width: "7%",
            editor: "false",
            editorParams: {
                autocomplete: "true",
                allowEmpty: true,
                listOnEmpty: true,
                valuesLookup: true
            }
        },
        {
            title: "비밀번호",
            field: "password",
            width: "7%",
            editor: "input",
            editorParams: {
                autocomplete: "true",
                allowEmpty: true,
                listOnEmpty: true,
                valuesLookup: true
            }
        },
        {
            title: "우편번호",
            field: "zipcode",
            width: "5%",
            editor: "input",
            editorParams: {
                autocomplete: "true",
                allowEmpty: true,
                listOnEmpty: true,
                valuesLookup: true
            }
        },
        {
            title: "주소",
            field: "addr",
            width: "30%",
            editor: "input",
            editorParams: {
                autocomplete: "true",
                allowEmpty: true,
                listOnEmpty: true,
                valuesLookup: true
            }
        },

        {
            title: "등록일",
            field: "rdate",
            width: "7%",
            editor: "input",
            editorParams: {
                autocomplete: "true",
                allowEmpty: true,
                listOnEmpty: true,
                valuesLookup: true
            }
        },
        {
            formatter: deleteIcon,
            width: "5%",
            hozAlign: "center",
            cellClick: function(e, cell) {
                BranchDelete(cell.getRow())
            }
        },
    ],
});
