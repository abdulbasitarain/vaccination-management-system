<?php
include("header.php");
include("dbconnection.php");

if (isset($_GET['delid'])) {
  $sql = "DELETE FROM hospital WHERE hospitalid='{$_GET['delid']}'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('Hospital record deleted successfully.');</script>";
  }
}

?>

<style>
  table {
    margin-left: 10%;    
    width: 80%;
    /* border-collapse: collapse; */
  }

  th, td {
    padding: 8px;
    border: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #f5f5f5;
  }

  .search-form {
    padding-top: 5%;
    margin-bottom: 20px;
    padding-left: 10%;
    padding-right: 10%;
  }

  .search-form input[type="text"] {
    padding: 10px;
    width: 90%;
  }

  .search-form input[type="submit"] {
    padding: 10px;
    width: 9%;
    background-color: #3472f7;
    color: white;
    border: none;
    cursor: pointer;
  }

  .results-table {
    margin-bottom: 20px;
  }
</style>

<div class="search-form">
  <form method="GET" action="">
    <input type="text" name="search" placeholder="Search">
    <input type="submit" value="Submit">
  </form>
</div>

<?php
// Check if the search form is submitted
if (isset($_GET['search'])) {
  // Get the search query
  $search = $_GET['search'];

  // Modify the SQL query to include the search condition
  $sql = "SELECT * FROM hospital WHERE hospitalname LIKE '%$search%' OR address LIKE '%$search%'";
} else {
  $sql = "SELECT * FROM hospital";
}

$qsql = mysqli_query($con, $sql);

if (mysqli_num_rows($qsql) > 0) {
  echo '<div class="results-table">
          <table>
            <tr>
              <th>Hospital Name</th>
              <th>Vaccine Name</th>
              <th>Hospital Number</th>
              <th>Hospital Address</th>
            </tr>';

  while ($rs = mysqli_fetch_array($qsql)) {
    $sqlvacc = "SELECT * FROM vaccine WHERE vaccineid='{$rs['vaccineid']}'";
    $qsqlvacc = mysqli_query($con, $sqlvacc);
    $rsvacc = mysqli_fetch_array($qsqlvacc);

    echo '<tr>
            <td>' . $rs['hospitalname'] . '</td>
            <td>' . $rsvacc['vaccinename'] . '</td>
            <td>' . $rs['mobileno'] . '</td>
            <td>' . $rs['address'] . '</td>
          </tr>';
  }

  echo '</table>
        </div>';
} else {
  echo '<p>No results found.</p>';
}

include("footer.php");
?>