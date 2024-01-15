<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabulator.js Disable Row Hover</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tabulator/5.0.7/css/tabulator.min.css" rel="stylesheet">
</head>

<body>

    <div id="example-table"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tabulator/5.0.7/js/tabulator.min.js"></script>
    <script>
    // Example data
    var tableData = [{
            id: 1,
            name: "John Doe",
            age: 30
        },
        {
            id: 2,
            name: "Jane Doe",
            age: 25
        },
        // Add more data as needed
    ];

    // Create Tabulator instance
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
            },
        ],
        rowMouseEnter: function(e, row) {
            // Remove hover effect on mouse enter
            row.getElement().style.backgroundColor = 'initial';
        },
        rowMouseLeave: function(e, row) {
            // Remove hover effect on mouse leave
            row.getElement().style.backgroundColor = 'initial';
        },
    });
    </script>

</body>

</html>