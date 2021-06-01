<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css" >
    <title>Home page</title>
</head>
    
<body>
    <div class="box-area">
        <header>
           <div class="wrapper"> 
                <div class="logo">
                    <a href="#">YouCode Librérie  </a>  
                </div>
                
                <nav>
                    
                    <!-- <a href="">Contact</a> -->
                    <!-- <a href="">About</a> -->
                    <!-- <a href="">Episodes</a> -->

                        <a href="<?php echo URLROOT;?>/UserController/Admin"> <button
                        type="submit" value="submit" name="submit_add" 
                        class="btn btn-outline-warning btn-rounded"
                        data-mdb-ripple-color="dark"
                        >Sign in</button></a>
                        
                </nav>
            </div>
    </header>
    <div class="banner-area">
        <div class="loading">
        
        <span>library</span>
        <span>Youcode</span>
        <span>Bibliothèque</span>

        </div>
    
    </div>
    <div class="content-area row">
        <h2 class="">A fiew words about me</h2>
        <img class="col-6 text-center "  src="<?php echo URLROOT; ?>/img/OIP.jpg" alt="">
        <p class="col-5" style="margin-left: 57vh;">
        I introduce myself to you. I am Younes. I study programming for the first year. This is my small project, which is a small library for borrowing books
        Developed in php (oop mvc) 
        </p>
        <h2 class="">discover and reserve books</h2>
        <!-- <img class="col-6 " style=" width: 60vh; margin: 5vh 20vh"src="<?php echo URLROOT; ?>/img/book.jpeg" alt="book"> -->
       
        </p>
    
        
         
     
        //  <!-- barre de recherche -->
        <div ></div>
         <!-- <input name="myInput" id="myInput" placeholder="Search for Episodes" style="width: 500px; margin: auto; box-shadow: 2px rgb(0, 0, 0, 0);" onkeyup="myFunction()"> -->
        <!-- Card -->
<div class="container">
    <div class="row ">
      <?php foreach ($data as $row) :?>
        <div class="col-md-3">
        <!-- <ul id="myUL"> -->
            <div class="card text-center shadow m-4" style="width: 18rem;">
                <img src="<?php echo URLROOT; ?>/img/harry.jpg" class="card-img-top" alt="">
                <div class="card-body" >
                
                <h5 class="card-title" id="element"><?php echo $row->titre ;?></h5>
                
        
                <p class="card-text text-center" ><?php echo $row->auteur ;?></p>
               <!-- Button trigger modal -->
                    <button type="button" class="btn text-white"  style="background-color: #0D4E6D;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Click to read more ...
                    </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><?php echo $row->titre ;?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <?php echo $row->contenu ;?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
                </div> 
             </div>
          </div>
        </div> 

        <?php  endforeach ?>  
        
     </div>
    
</div>
                
    
</body>
</html>