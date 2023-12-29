<?php
    @include '../server_side/config.php';
    @include '../server_side/book.php';
?>
<div id="book-form">
    <form method="post" id="updateBookForm" enctype="multipart/form-data">
        <?php
            $updateBook = array( "id" => null,
                "name" => "",
                "author" => "",
                "description" => "",
                "price" => null,
                "rate" => null,
                "image" => "",
                "date" => null,
                "category" => "" );
            if(isset($_GET['id'])){
                if($_GET['id'] == 'new') echo "<h2>Add a new book</h2>";
                else{
                    $updateBook = getBookById($_GET['id']);
                    echo "<h2>update book</h2>";
                }
            }
        ?>
        <label>name:</label>
        <input type="text" name="name" required value="<?php echo htmlspecialchars($updateBook['name'])?>">
        <label>author:</label>
        <input type="text" name="author" required value="<?php echo htmlspecialchars($updateBook['author'])?>">
        <label>description:</label>
        <textarea name="description" id="description" cols="20" rows="4" required><?php echo htmlspecialchars($updateBook['description'])?></textarea>
        <label>price:</label>
        <input type="number" name="price" required value=<?php echo $updateBook['price']?>>
        <label>date:</label>
        <input type="date" name="date"  value=<?php echo $updateBook['date']?>>
        <label>category:</label>
        <select name="category" id="categorySelect" >
            <?php 
                $categories = array_unique(getAllCategories());
                
                foreach($categories as $category){
                    echo "<option value='$category' " . ($category == $updateBook['category'] ? 'selected' : '') . ">$category</option>";
                }
            ?>
            <option value='add'>Add</option>
        </select>
        <div id="newCategory">
            <label>new category:</label><br>
            <input type='text' name='newCategory'>
        </div>
        <?php
            if (isset($updateBook['image']) && !empty($updateBook['image'])) {
                echo "
                    <label>Current image:</label>
                    <img src='{$updateBook['image']}' width='100px' />
                ";
            }
        ?>
        <label>Upload image:</label>
        <input type="file" accept="image/*" name="image" <?php if (!isset($updateBook['image']) || empty($updateBook['image'])) echo 'required' ?> >
        <input type="submit">
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let updateBookForm = document.getElementById('updateBookForm');

        updateBookForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Fetch the form data
            let formData = new FormData(updateBookForm);

            // Send the form data using XMLHttpRequest
            let xhr = new XMLHttpRequest();
            
            // Set up the onload event handler
            xhr.onreadystatechange = function() {
                // Handle the response from the server
                if (xhr.status == 200 && xhr.readyState == 4) {
                    // Success - you can handle the response as needed
                    console.log(xhr.responseText);
                } else {
                    // Error - handle the error case
                    console.error(xhr.statusText);
                }
            };
            xhr.open('POST', '../server_side/book.php', true);

            // Send the form data
            xhr.send(formData);
        });
    });
</script>

<script>
    let categorySelect = document.getElementById('categorySelect');    
    let newCategory = document.getElementById('newCategory');
    categorySelect.addEventListener('change',()=>{
        newCategory.style.display = categorySelect.value == 'add'? 'block':'none';
    });
</script>
<style>
    #book-form form{
        position: absolute;
        left: 25%;
        right: 25%;
        top: 0;
        border-radius: 10px;
        border: 1px solid black;
        box-shadow: 2px 2px 2px #aaa;
        background: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: start;
        min-height: 60vh;
        padding: 30px;
    }
    #book-form{
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100vh;
        background: #88888888;
        z-index: 2;
    }
    #newCategory{
        display: none;
    }
    #description{
        resize: none;
    }
</style>