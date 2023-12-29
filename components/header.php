<link rel="stylesheet" href="../style/header.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<nav id="topBar">
    <!-- <h1>book store</h1> -->
    <i class="bx bx-menu" id="humberger"></i>
    <ul id="ulNav">
        <li>
            <a href="../pages/home.php" <?php if($_SERVER["PHP_SELF"]=="/book-store/pages/home.php") echo "class=\"clicked\""; ?>>home</a>
        </li>
        <li>
            <a href="../pages/cart.php" <?php if($_SERVER["PHP_SELF"]=="/book-store/pages/cart.php") echo "class=\"clicked\""; ?>>cart</a>
        </li>
        <li>
            <a href="../pages/wishlist.php" <?php if($_SERVER["PHP_SELF"]=="/book-store/pages/wishlist.php") echo "class=\"clicked\""; ?>>wishlist</a>
            
        </li>
        <li>
            <a href="../pages/about.php" <?php if($_SERVER["PHP_SELF"]=="/book-store/pages/about.php") echo "class=\"clicked\""; ?>>about</a>
        </li>
        <li>
            <a href="../pages/login.php" <?php if($_SERVER["PHP_SELF"]=="/book-store/pages/login.php") echo "class=\"clicked\""; ?>>login</a>
        </li>
    </ul>
    <div class='search-container'>
        <input type="text" placeholder="What are you looking for" class='search-input'/>
        <i class="bx bx-search"></i>
    </div>
    
</nav>

<script>
    const ulNav = document.getElementById('ulNav');
    const humberger = document.getElementById('humberger');
    humberger.onclick = () => ulNav.classList.toggle('show');
</script>