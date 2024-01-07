<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bootstrap 5 Select with User Input</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <form>
    <div class="mb-3">
      <label for="selectWithInput" class="form-label">Select or Enter Value:</label>
      <div class="input-group">
        <select class="form-select" id="selectWithInput">
          <option value="1">Option 1</option>
          <option value="2">Option 2</option>
          <option value="3">Option 3</option>
          <!-- Add an option for custom input -->
          <option value="custom">Enter Custom Value</option>
        </select>
        <input type="text" class="form-control d-none" id="customInput" placeholder="Enter custom value">
      </div>
    </div>
  </form>
</div>

<!-- Bootstrap JS (for Bootstrap 5) and your script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Function to toggle between select and input
  const selectWithInput = document.getElementById('selectWithInput');
  const customInput = document.getElementById('customInput');

  selectWithInput.addEventListener('change', function() {
    if (selectWithInput.value === 'custom') {
      customInput.classList.remove('d-none');
    } else {
      customInput.classList.add('d-none');
    }
  });
</script>
</body>
</html>
