<html>

<link href="https://s3-us-west-2.amazonaws.com/colors-css/2.2.0/colors.min.css" rel="stylesheet">
<link href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
<script src="record.js"></script>

<body>
<table
  data-toggle="table"
  data="record"
  data-height="400"
  data-row-style="rowStyle">
  <thead>
    <tr>
      <th data-field="uid">Item ID</th>
      <th data-field="name">
        <i class="fa fa-star"></i>
        Item Name
      </th>
      <th data-field="rdate">
        <i class="fa fa-heart"></i>
        Item Price
      </th>
    </tr>
  </thead>
</table>

<script>
  function rowStyle(row, index) {
    var classes = [
      'bg-blue',
      'bg-green',
      'bg-orange',
      'bg-yellow',
      'bg-red'
    ]

    if (index % 2 === 0 && index / 2 < classes.length) {
      return {
        classes: classes[index / 2]
      }
    }
    return {
      css: {
        color: 'blue'
      }
    }
  }
</script>
</body>
</html>