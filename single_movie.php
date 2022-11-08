<?php include ('header.php'); ?>


<?php
  
if(isset($_POST['search_btn'])){

$title = $_POST['title'];    

$curl = curl_init();

$url ="http://www.omdbapi.com/?i=tt3896198&apikey=40976a0&t=".$title;

curl_setopt($curl,CURLOPT_URL,$url); // use the url
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false); // extract data
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

$result = curl_exec($curl);

$result_json = json_decode($result);

//print_r($result_json);

$movie = $result_json;

}
?>

<div class="container">
   <div class="row">
   

         <div class="col-lg-12 col-md-12 col-sm-12 mt-4 text-center">
          
                <img style="display: flex; float:left"src="<?php echo $movie->Poster;?>"/>
               
               <div style="display: inline-block; float:left; width:70%">
                
                        <h5>Title :<?php echo $movie->Title;?> </h5> 
                        <p>Production Year :<?php echo $movie->Year;?> </p>
                        <p>Story Line :<?php echo $movie->Plot?></p>
                        <p>Genre :<?php echo $movie->Genre?></p>
                        <p>Runtime :<?php echo $movie->Runtime?></p>
                        <p>Language :<?php echo $movie->Language?></p>
                        <p>Country :<?php echo $movie->Country?></p>
                        <p>Actors :<?php echo $movie->Actors?></p>
                        <p>Director :<?php echo $movie->Director?></p>
                        <p>Awards :<?php echo $movie->Awards?></p>
                
                </div>
        </div>
       
    </div>
</div>

     
    
 <?php include('footer.php');?> 


