<?php
// $data = new ProductsController();
// $products = $data->getAllProducts();
$data = new UsersController();
$wishlist = $data->ShowWishlist();
// echo "<pre>";
// print_r($wishlist);
// echo "</pre>";
// delete from wishlist 
if (isset($_GET["delete"])) {
    $data = new WishlistController();
    $result = $data->delete($_GET["delete"]);
    if ($result === "ok") {
        Redirect::to("likes");
    } else {
        echo $result;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product INFORMATIONS</title>
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>./public/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/bc3854343b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.14.3/dist/full.css" rel="stylesheet" type="text/css" />

    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="./views/src/output.css" rel="stylesheet">
    <script src="./public/js/main.js"></script>
    <script src="./public/js/jquery.min.js"></script>

</head>
<?php
include('./views/includes/alerts.php')
?>


<table class="table-auto">
    <thead>
        <tr>
            <th>Product</th>
            <th>Image</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($wishlist as $wish) : ?>

            <tr></tr>
            <td><?php echo $wish['product_title']; ?></td>
            </tr>
            <tr>
                <td><img src="<?php echo BASE_URL; ?>./public/uploads/<?= $wish['product_image'] ?>" alt="image"></td>
            </tr>
            <tr>
                <td><?php echo $wish['cat_title']; ?></td>
            </tr>
    </tbody>
<?php endforeach; ?>
</table>