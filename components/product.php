<link rel="stylesheet" href="../style/product.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<div class='product'>
    <div class='product-div'>
        <div class='wishlist-button-container'>
            <button class='wishlist-button bx bxs-heart'></button>
        </div>
        <div class="image-container">
            <img src = <?php echo $book['image']?> alt='book'/>
        </div>
        <button class='cart-button'>
            <i class='bx bx-cart-alt'></i> Add to cart
        </button>
    </div>
    <h4><?php echo $book['name']?></h4>
    <h5 style='font-weight:normal'>$ <?php echo $book['price']?></h5>
    <div class='rate-box'>
        <i class='bx bxs-star' style='color:orange;'></i>
        <i class='bx bxs-star' style='color:orange;'></i>
        <i class='bx bxs-star' style='color:orange;'></i>
        <i class='bx bxs-star' style='color:orange;'></i>
        <i class='bx bxs-star' style='color:orange;'></i>
    </div>
</div>
<script>
    
</script>
