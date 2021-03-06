<?php
    require_once('database.php');

    // Get category ID
    if(!isset($category_id)) {
        $category_id = $_GET['category_id'];
        if (!isset($category_id)) {
            $category_id = 1;
        }
    }

    // Get name for current category
    $query = "SELECT * FROM categories1
              WHERE categoryID = $category_id";
    $category = $db->query($query);
    $category = $category->fetch_assoc();
    $category_name = $category['categoryName'];

    // Get all categories
    $query = 'SELECT * FROM categories1
              ORDER BY categoryID';
    $categories = $db->query($query);

    // Get products for selected category
    $query = "SELECT * FROM products1
              WHERE categoryID = $category_id
              ORDER BY productID";
    $products = $db->query($query);
    
    // Check the result set to see if anything was returned
    if ($products) {
      $product_count = $products->num_rows;
      for ($i=0; $i < product_count; $i++)
          $product2 = $products->fetch_assoc();
      }
    else {
	  $product_count = 0;
    } 
    
?>
<?php require 'head.php' ?>
<!-- the body section -->
<body>
    <div id="page">

    <div id="header">
        <h1>Product Manager</h1>
    </div>

    <div id="main">

        <h1>Product List</h1>

        <div id="sidebar">
            <!-- display a list of categories -->
            <h2>Categories</h2>
            <ul class="nav">
            <?php foreach ($categories as $category) : ?>
                <li>
                <a href="?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>

        <div id="content">
            <!-- display a table of products -->
            <h2><?php echo $category_name; ?></h2>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th class="right">Price</th>
                    <th>&nbsp;</th>
                </tr>
                <?php for ($j=0; $j < product_count; $j++) : 
                      $product = $products->fetch_assoc(); 
                ?>
                <tr>
                    <td><?php echo $product['productCode']; ?></td>
                    <td><?php echo $product['productName']; ?></td>
                    <td class="right"><?php echo $product['listPrice']; ?></td>
                    <td><form action="delete_product.php" method="post"
                              id="delete_product_form">
                        <input type="hidden" name="product_id"
                               value="<?php echo $product['productID']; ?>" />
                        <input type="hidden" name="category_id"
                               value="<?php echo $product['categoryID']; ?>" />
                        <input type="submit" value="Delete" />
                    </form></td>
                </tr>
                <?php endfor; ?>
            </table>
            <p><a href="add_product_form.php">Add Product</a></p>
            <p><a href="category_list.php">List Categories</a></p>
        </div>
    </div>

<?php require 'foot.php' ?>
