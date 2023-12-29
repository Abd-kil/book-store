<?php
    @include '../server_side/config.php';
    @include '../server_side/book.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashboard.css">
    <title>dashboard</title>
</head>
<body>
    <?php
        include('../components/header.php');
        $books = getAllBooks();
        
    ?>
    <div class="cart">
        <table>
            <tr>
                <td>id</td>
                <td></td>
                <td>name</td>
                <td>author</td>
                <td>price</td>
                <td></td>
            </tr>
            <?php
                foreach($books as $book){
                    echo "
                    <tr>
                        <td>{$book['id']}</td>
                        <td>
                            <div class='cart-product-title'>
                                <img src='{$book['image']}' width='50px' />
                            </div>
                        </td>
                        <td>{$book['name']}</td>
                        <td>{$book['author']}</td>
                        <td>\$ {$book['price']}</td>
                        <td>
                        <button onclick='openEdit({$book['id']})'>Edit</button>
                        <button onclick='deleteBook({$book['id']})'>delete</button>
                        </td>
                    </tr>
                    ";
                }
            ?>
        </table>
        <div class='space-between buttons-container'>
            <button onclick="openEdit('new')">Add a book</button>
        </div>
        <div id='dialog'></div>
        <script>
            let edit = new XMLHttpRequest();

            function openEdit(id){
                edit.onreadystatechange = ()=>{
                    if(edit.readyState == 4 && edit.status == 200)
                        document.querySelector(`#dialog`).innerHTML = edit.responseText;
                    else console.log('error:', edit.statusText);
                }
                edit.open('GET', '../components/update-book.php?id='+id,true);
                edit.send();
                // let panel = document.getElementById('book-form');
                // panel.style.display = 'flex';
                // document.getElementById('book_id').value = id;
            }
            let delet = new XMLHttpRequest();
            function deleteBook(id){
                if(confirm('do you want to delete this book ?')){
                    delet.onreadystatechange = ()=>{
                    if(delet.readyState == 4 && delet.status ==2){
                        document.querySelector('#dialog').innerHTML = delet.responseText;
                    }
                    else console.log('error:',delet.statusText);
                }
                delet.open('GET','../server_side/book.php?id='+id,true);
                delet.send();
                }
            }
        </script>
    </div>

</body>
</html>