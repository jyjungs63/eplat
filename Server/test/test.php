<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table Column</title>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th {
            background-color: #4246b7;
        }

        .nb {
            border: none;
            /* Remove borders from table cells */

            text-align: center;
        }
    </style>
</head>

<body>

    <table id="mainTable">
        <thead>
            <tr>
                <th>Header 1</th>
                <th>Header 2</th>
                <th>Header 3</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="r1c2">Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
            </tr>
        </tbody>
    </table>

    <button id="addColumnBtn">Add Column</button>

    <script>
        $(document).ready(function() {
            // Add column button click event
            $("#addColumnBtn").click(function() {
                // Create a new table column with a new table
                // var newColumn = $("<th>New Header</th>");
                // var newTable = $("<table><tbody><tr><td>New Data</td></tr></tbody></table>");

                // // Append the new column to the header row
                // //$("#mainTable thead tr").append(newColumn);
                // $("#mainTable thead tr").append(newColumn);

                // // Append the new table to each row in the tbody
                // $("#mainTable tbody tr").append("<td></td>").children("td:last").append(newTable);


                var tbody = $("#mainTable tbody");

                // Create a new row
                var newRow = $("<tr>");

                // Add cells (td) to the new row
                let A = "AA",
                    B = "BB",
                    C = "CC";

                newRow.append("<td >Date</td>");
                newRow.append(
                    "<td><table class='nb' style='margin-top:0px'>" +
                    "<tr><td class='nb'>" + A + "</td> <td class='nb'>" + B +
                    "</td> <td class='nb'>C</td></tr>" +
                    "<tr><td class='nb'>" + A + "</td> <td class='nb'>" + B +
                    "</td> <td class='nb'>C</td></tr>" +
                    "<tr><td class='nb'>" + A + "</td> <td class='nb'>" + B +
                    "</td> <td class='nb'>C</td></tr>" +
                    "</table></td>"
                );

                newRow.append("<td>New Data 3</td>");

                // Append the new row to the table body
                tbody.append(newRow);

                var newRow = $("<tr>");

                // Add cells (td) to the new row
                A = "AA",
                    B = "BB",
                    C = "CC";

                newRow.append("<td >Date</td>");
                newRow.append(
                    "<td><table class='nb' style='margin-top:0px'>" +
                    "<tr><td class='nb'>" + A + "</td> <td class='nb'>" + B +
                    "</td> <td class='nb'>C</td></tr>" +
                    "<tr><td class='nb'>" + A + "</td> <td class='nb'>" + B +
                    "</td> <td class='nb'>C</td></tr>" +
                    "<tr><td class='nb'>" + A + "</td> <td class='nb'>" + B +
                    "</td> <td class='nb'>C</td></tr>" +
                    "</table></td>"
                );

                newRow.append("<td>New Data 3</td>");

                // Append the new row to the table body
                tbody.append(newRow);
            });
        });
    </script>

</body>

</html>