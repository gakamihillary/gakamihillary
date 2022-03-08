<html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
<link rel="stylesheet" href="bootstrap/css/search.css">

</head>

<style>
li.v {list-style-type: none;}
  </style>
<body>



  


<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT book_isbn, book_image, book_title FROM books";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
echo' <div class="search-box">
<button class="btn-search"><i class="fas fa-search"></i></button>
<input type="text" class="input-search" id = "searchBar" oninput = "Search((this.value).toLowerCase())" placeholder="Type to Search...">
</div>';
// echo '<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">';
 
 
$title = "Full Catalogs of Books";
  require_once "./template/header.php";
?>

  <p class="lead text-center text-muted">Full Catalogs of Books</p>
 
  
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
   
      <div class="row" >
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <ul>
  
          <div class="col-md-3">
          <li class = "listItem v"><a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>"> 
              <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $query_row['book_image']; ?>">
              <br><?php echo $query_row['book_title']; ?></li><br>
            </a>
        
          </div>
        
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
          
      </div>
      
      </ul>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer.php";
?>



<script>
    function Search(item){
            var collection = document.getElementsByClassName("listItem");
            for (i = 0;i < collection.length; i++){
                if (((collection[i].innerHTML).toLowerCase()).indexOf(item) > -1) {
                    collection[i].style.display = "block";
                    } else {
                        collection[i].style.display = "none";
                        }
            }
    }
    </script>
</script> -->

</body>
</html>


