<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <title>Bootstrap 5 Month Select Example</title>
</head>

<body>

    <div class="container mt-5">
        <form id="myform">
            <div class="mb-3 d-flex">
                <label for="monthPicker" class="form-label">Select Month:</label>
                <input type="month" class="form-control w-25" id="monthPicker" name="month">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
document.getElementById('myform').addEventListener("submit", function(evt) {
    //alert(document.getElementById('monthPicker').value);

    var givenMonth = 5; // May (0-indexed, so May is 4)
    var givenYear = 2022;

    // Create a moment representing the first day of the given month
    var startDate = moment({
        year: givenYear,
        month: givenMonth
    });

    // Get the end of the given month
    var staDate = startDate.startOf('month');
    var endDate = startDate.endOf('month');

    // Display the results
    console.log('Start Date:', startDate.format('YYYY-MM-DD HH:mm:ss'));
    console.log('End of Given Month:', endDate.format('YYYY-MM-DD HH:mm:ss'));
})
</script>

</html>