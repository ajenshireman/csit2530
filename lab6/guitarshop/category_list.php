<?php
    require_once('database.php');

    // Get all categories
    $query = 'SELECT * FROM categories1
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

    <h1>Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        
    <!-- add code for the rest of the table here -->
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td><form action="delete_category.php" method="post"
                      id="delete_category_form">
                <input type="hidden" name="category_id"
                       value="<?php echo $category['categoryID']; ?>" />
                <input type="hidden" name="category_id"
                       value="<?php echo $category['categoryID']; ?>" />
                <input type="submit" value="Delete" />
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add Category</h2>
    
    <!-- add code for the form here -->
    
    <br />
    <p><a href="index.php">List Products</a></p>

    </div> <!-- end main -->

<?php require 'foot.php' ?>
