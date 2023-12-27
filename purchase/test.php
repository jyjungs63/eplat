<?php 
include "../header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tabulator-tables@5.5.2/dist/css/tabulator.min.css" rel="stylesheet">
    <style>
    .tabulator .tabulator-header .tabulator-col {
        background-color: yellow;
    }

    .tabulator .tabulator-header {
        background-color: yellow;
        /* Change this to your preferred color */
    }
    </style>
</head>

<body>

    <div id="example-table"></div>

    <script src="https://cdn.jsdelivr.net/npm/tabulator-tables@5.5.2/dist/js/tabulator.min.js"></script>
    <script>
    const metaDescription = document.querySelector('meta[name="location"]').getAttribute('content');
    alert(location)
    var tableData = [{

            id: 1,
            name: "John",
            age: 30
        },
        {
            id: 2,
            name: "Alice",
            age: 25
        },
        // Add more data as needed
    ];

    var table = new Tabulator("#example-table", {
        data: tableData,
        columns: [{
                title: "ID",
                field: "id"
            },
            {
                title: "Name",
                field: "name"
            },
            {
                title: "Age",
                field: "age"
            }
            // Add more columns as needed
        ],
    });
    </script>

</body>

</html>