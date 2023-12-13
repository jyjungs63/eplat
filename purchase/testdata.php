<!DOCTYPE html>
<html>
<head>
  <title>Fetch API Example</title>
</head>
<body>

  <button onclick="getData()">Get Data</button>
  <div id="result"></div>

  <script>
    function getData() {
      //fetch('http://localhost:3000/purchase/data.php') // Replace with your API endpoint
      fetch('./data.php') // Replace with your API endpoint
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          // Process the fetched data
          displayData(data);
        })
        .catch(error => {
          // Handle errors
          console.error('There was a problem with the fetch operation:', error);
          document.getElementById('result').innerText = 'Error fetching data';
        });
    }

    function displayData(data) {
      // Display data on the webpage
      const resultDiv = document.getElementById('result');
      resultDiv.innerHTML = '<pre>' + JSON.stringify(data, null, 2) + '</pre>';
    }
  </script>

</body>
</html>
