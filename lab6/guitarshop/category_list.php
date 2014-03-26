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
    
    </table>
    <br />

    <h2>Add Category</h2>
    
    <!-- add code for the form here -->
    
    <br />
    <p><a href="index.php">List Products</a></p>

    </div> <!-- end main -->

<?php require 'foot.php' ?>
