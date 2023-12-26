<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/colors-css/2.2.0/colors.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script src="record.js"></script>
    <title>Eplat 자료실</title>
    <style>
    * {
        box-sizing: border-box;
    }

    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        padding: 10px;
    }

    button[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        margin-right: 20px;
        margin-top: 10px;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        margin-top: 20px;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    .col-25 {
        float: left;
        width: 20%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 80%;
        padding-right: 20px;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }

    .inset-border {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.15) 0%, rgba(255, 255, 255, 0.15) 100%);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    </style>
</head>

<body>
    <div id="table"></div>

</body>


<script>
function multipleLinksFormatter(value, row) {
    // Assuming 'value' is an array of objects containing link information
    let links = '';
    icon = '<i class="fas fa-times"></i>';
    // Loop through the array of links and create anchor tags
    value.forEach(link => {
        links +=
            `<a href="${link.url}" target="_blank">${link.text} ${icon} </a>&nbsp;`;
    });

    return links;
}

// Example data for the 'linksColumn'
const data = [{
        id: 1,
        linksColumn: [{
                url: 'https://example.com',
                text: 'Link 1'
            },
            {
                url: 'https://example.org',
                text: 'Link 2'
            }
        ]
    },
    {
        id: 2,
        linksColumn: [{
            url: 'https://example.net',
            text: 'Link 3'
        }]
    }
];

// Initialize BootstrapTable
$(function() {
    $('#table').bootstrapTable({
        data: data,
        columns: [{
                field: 'id',
                title: 'ID'
            },
            {
                field: 'linksColumn',
                title: 'Links',
                formatter: multipleLinksFormatter
            }
            // Add other columns as needed
        ]
    });
});
</script>

</html>