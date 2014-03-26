<?php
require('database.php');
$query = 'SELECT *
          FROM categories1
          ORDER BY categoryID';
$categories = $db->query($query);
?>
<?php require 'head.php' ?>
<!-- the body section -->
<body>
    <div id="page">
        <div id="header">
            <h1>Product Manager</h1>
        </div>

        <div id="main">
            <h1>Add Product</h1>
            <form action="add_product.php" method="post"
                  id="add_product_form">

                <label>Category:</label>
                <select name="category_id">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
                </select>
                <br />

                <label>Code:</label>
                <input type="input" name="code" />
                <br />

                <label>Name:</label>
                <input type="input" name="name" />
                <br />

                <label>List Price:</label>
                <input type="input" name="price" />
                <br />

                <label>&nbsp;</label>
                <input type="submit" value="Add Product" />
                <br />
            </form>
            <p><a href="index.php">View Product List</a></p>
        </div><!-- end main -->

<?php require 'foot.php' ?>
