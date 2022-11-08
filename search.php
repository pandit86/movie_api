<?php include ('header.php'); ?>

<form action="search.php" method="POST">
  <div class="form-group mt-3 mx-auto text-center">
      <input class="form-control w-50 mx-auto" style="display:inline-block" type="text" name="search_text" placeholder="movie title...">

      <input class="btn btn-primary"style="display:inline-block" type="submit" name="search_btn" value="Search">

  </div>
</form>



<?php
  

$curl = curl_init();

if(isset($_POST['search_btn'])){
    $keyword = $_POST['search_text'];
    $url = "http://www.omdbapi.com/?i=tt3896198&apikey=40976a0&s=".$keyword;
}else{
    $url = "http://www.omdbapi.com/?i=tt3896198&apikey=40976a0&s=superman";
}
 


curl_setopt($curl,CURLOPT_URL,$url); // use the url
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false); // extract data
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

$result = curl_exec($curl);

$result_json = json_decode($result);


    $movies = $result_json->Search;



?>

<div class="container">
   <div class="row">
   <?php foreach($movies as $movie){?>

         <div class="col-lg-4 col-md-4 col-sm-12 mt-2 text-center">
          
                <img src="<?php echo $movie->Poster;?>"/>
                <h5><?php echo $movie->Title;?> </h5> 
                <p><?php echo $movie->Year;?> </p>

                <form method="POST" action="single_movie.php">
                    <input type="hidden" name="title" value="<?php echo $movie->Title;?>">
                    <input class="btn btn-success" type="submit" name="search_btn" value="check out">
                </form>

        </div>
        <?php } ?>
    </div>
</div>

     
    
 <?php include('footer.php');?> 


