<!DOCTYPE html>
<html>
<head>
  <title>Invoice Slip</title>
  <link rel='stylesheet' type='text/css' href='./css/styles.css'>
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  
  .invoice {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
  }
  
  h1 {
    text-align: center;
  }
  
  .invoice-details {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
  }
  
  .left, .right {
    flex-basis: 50%;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  
  th, td {
    border: 1px solid #ccc;
    padding: 8px;
  }
  
  thead th {
    background-color: #f2f2f2;
  }
  
  tfoot td {
    text-align: right;
  }
  
  .footer {
    text-align: center;
    margin-top: 20px;
  }
  
</style>
<body>
  <div class='invoice'>
    <h1>BoatConnect Ticket Slip</h1>
    <div style='display: flex; justify-content: center;' class='qr_image'>
    <img style='width: 200px;' src='./Backend/temp/2654b3f1f0637897c51a54e2396d75b1.png' alt=''>
  </div>
    <div class='invoice-details'>
      <div class='left'>
        <h2>Ticket Id:</h2>
        <h2>Date:</h2>
      </div>
      <div class='right'>
        <h2>#12345</h2>
        <h2>July 1, 2023</h2>
      </div>
    </div>
    <table>
      <thead>
        <tr>
          <th>Username</th>
          <th>Seats</th>
          <th>Type</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Bhuwan</td>
          <td>3</td>
          <td>Large</td>
          <td>Rs. 2000</td>
        </tr>
      </tbody>
    </table>
    <div class='footer'>
      <p>Enjoy your ride!</p>
    </div>
  </div>
</body>
</html>
