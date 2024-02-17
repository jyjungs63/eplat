<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabulator.js Multi-line Cell</title>
    <link rel="stylesheet" href="https://unpkg.com/tabulator-tables@5.2.0/dist/css/tabulator.min.css">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.2.0/dist/js/tabulator.min.js"></script>
</head>

<body>

    <div id="example-table"></div>

    <script>
    var tableData = [{
            id: 1,
            name: 'John Doe',
            description: 'Line 1\nLine 2\nLine 3'
        },
        {
            id: 2,
            name: 'Jane Smith',
            description: 'Multi-line\ncontent\nhere'
        },
    ];

    var table = new Tabulator("#example-table", {
        height: "300px",
        data: tableData,
        layout: "fitColumns",
        columns: [{
                title: "ID",
                field: "id",
                width: 50
            },
            {
                title: "Name",
                field: "name",
                width: 150
            },
            {
                title: "Description",
                field: "description",
                formatter: "textarea",
                width: 200,
            },
        ],
    });
    </script>

</body>

</html>