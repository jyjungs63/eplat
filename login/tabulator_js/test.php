<!DOCTYPE html>
<html>
<head>
  <title>Tabulator Cell Value Validation</title>
  <link href="https://unpkg.com/tabulator-tables@5.1.0/dist/css/tabulator.min.css" rel="stylesheet">
</head>
<body>

<div id="example-table"></div>

<script src="https://unpkg.com/tabulator-tables@5.1.0/dist/js/tabulator.min.js"></script>
<script>
    var table = new Tabulator("#example-table", {
        columns: [
            { title: "Name", field: "name" },
            {
                title: "Age",
                field: "age",
                validator: function(cell, value, parameters) {
                    // Custom validation logic
                    if (value < 0 || value > 120) {
                        alert( "Age must be between 0 and 120");
                        cell.setValue(0); 
                        return true; 
                    }
                    return true; // Return true for valid values
                },
                editor: true,
            },
            // Add more columns as needed
        ],
        data: [ // Example data
            { id: 1, name: "John", age: 30 },
            { id: 2, name: "Alice", age: 150 },
        ],
    });
</script>

</body>
</html>
