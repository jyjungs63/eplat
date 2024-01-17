<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tabulator-tables@5.3.0/dist/css/tabulator.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tabulator-tables@5.3.0/dist/js/tabulator.min.js"></script>
    <title>Tabulator.js Dynamic Column Hide Example</title>
</head>

<body>

    <div id="example-table"></div>
    <input type="button" id="idBtn">click</input>
    <script>
    var table = new Tabulator("#example-table", {
        columns: [{
                title: "Name",
                field: "name",
                width: 150
            },
            {
                title: "Age",
                field: "age",
                align: "left"
            },
            {
                title: "Occupation",
                field: "occupation"
            },
            {
                title: "Email",
                field: "email",

            },
        ],
        data: [{
                id: 1,
                name: "John Doe",
                age: 30,
                occupation: "Engineer",
                email: "john@example.com"
            },
            {
                id: 2,
                name: "Jane Doe",
                age: 25,
                occupation: "Designer",
                email: "jane@example.com"
            },
            // Add more data as needed
        ],
        renderComplete: function() {
            // This function will be called after the table has finished rendering
            hideAgeColumn();
            // Perform actions or manipulations after the display is complete
        },
    });

    // Example: Hide the "Age" column programmatically


    // Call the function to hide the "Age" column based on some condition


    document.getElementById("idBtn").addEventListener('click', function() {
        hideAgeColumn();
    })

    document.addEventListener('DOMContentLoaded', function() {
        // Your code here
        hideAgeColumn();
        // Execute functions or perform actions that need the DOM to be ready
    });

    function hideAgeColumn() {
        table.toggleColumn("age");
        table.toggleColumn("occupation");
    }
    </script>

</body>

</html>