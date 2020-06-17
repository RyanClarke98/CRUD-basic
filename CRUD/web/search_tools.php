<?php
if (isset($_POST['submit'])) {
  try {
    require "../src/config.php";
    require "../src/common.php";

    $connection = new PDO($dsn, $username, $password, $options);


	$sql = "SELECT *
	FROM tool_products
	WHERE toolCatagory = :toolCatagory";

    $toolCatagory = $_POST['toolCatagory'];

    $statement = $connection->prepare($sql);
    $statement->bindParam(':toolCatagory', $toolCatagory, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
	} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "../src/header.php"; ?>

<?php
if (isset($_POST['submit'])) {
  if ($result && $statement->rowCount() > 0) { ?>
    <h2>Results</h2>

    <table>
      <thead>
<tr>
  <th>product id</th>
  <th>product name</th>
  <th>tool catagory</th>
  <th>price</th>
  <th>age requirement</th>
</tr>
      </thead>
      <tbody>
  <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo escape($row["product_id"]); ?></td>
<td><?php echo escape($row["productName"]); ?></td>
<td><?php echo escape($row["toolCatagory"]); ?></td>
<td><?php echo escape($row["price"]); ?></td>
<td><?php echo escape($row["ageRequirement"]); ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
  <?php } else { ?>
    > No results found for <?php echo escape($_POST['toolCatagory']); ?>.
  <?php }
} ?>



<h2>Search  Tool Based on Catagory</h2>

Enter a Catagory blades, finishing and heavy
<form method="post">
  <label for="toolCatagory"></label>
  <input type="text" id="toolCatagory" name="toolCatagory">
  <input type="submit" name="submit" value="Search Catagories">
</form>

<a href="index.php">Back to home</a>