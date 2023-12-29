<link rel="stylesheet" href="../style/product-section.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<section class='productsSection'>
    <div class="section-title">
        <div class="title-half">
            <div>
                <div class="red-title">
                    <div></div>
                    <h5>today's</h5>
                </div>
                <h2>flash sales</h2>
            </div>
            <div id="timerContainer"></div>
        </div>
        <div class="arrows-box">
            <button class="bx bx-left-arrow-alt" onclick="scrollTodayProducts('left')"></button>
            <button class="bx bx-right-arrow-alt" onclick="scrollTodayProducts('right')"></button>
        </div>
    </div>
    <div class="flex-section" id="todayProducts">
        <?php 
            $content = getAllBooks();
            foreach($content as $book){
                include("../components/product.php");
            }
            
        ?>
    </div>
</section>

<script>
    const todayProductsRef = document.getElementById('todayProducts');
    function scrollTodayProducts(dir) {
        const offset = window.innerWidth / 1.5;
        if (todayProductsRef)
            todayProductsRef.scrollLeft += (dir === "right" ? offset : -offset);
    }

</script>