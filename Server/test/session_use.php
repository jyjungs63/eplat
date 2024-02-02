<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
    <title>Bootstrap 4.6 Nav Tabs Event</title>
</head>

<body>

    <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" id="tab1" data-toggle="tab" href="#content1" aria-controls="content1">Tab
                    1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab2" data-toggle="tab" href="#content2" aria-controls="content2">Tab 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab3" data-toggle="tab" href="#content3" aria-controls="content3">Tab 3</a>
            </li>
        </ul>

        <div class="tab-content mt-2">
            <div class="tab-pane fade show active" id="content1">
                <h3>Content for Tab 1</h3>
            </div>
            <div class="tab-pane fade" id="content2">
                <h3>Content for Tab 2</h3>
            </div>
            <div class="tab-pane fade" id="content3">
                <h3>Content for Tab 3</h3>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTabs a').on('click', function(e) {
            e.preventDefault();
            //$(this).tab('show');
            //$("#content2").tab('show');
        });
    });
    </script>

</body>

</html>