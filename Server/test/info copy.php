<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Select with Event Listeners</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-3">
        <label for="selectExample" class="form-label">Select Example:</label>
        <select id="selectExample" class="form-select">
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>

        <p id="sampleText">Sample Text</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    let selectElement = document.getElementById('selectExample');
    let sampleTextElement = document.getElementById('sampleText');

    // Event listener for change event
    selectElement.addEventListener('change', function() {
        sampleTextElement.innerText = "Selected value: " + this.value;
    });

    // Event listener for click event
    selectElement.addEventListener('click', function() {
        // Additional logic for click event if needed
        console.log("Select element clicked" + this.value);
    });
    </script>

</body>

</html>