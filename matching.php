<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8"> 
<script type  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" > </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"> </script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../../js/materialize.min.js"></script>
<title>Match the following </title>
<?php
$servername='localhost';
$username='root';
$password='bitnami';
$dbname='test';
$question_num= [];
$array= [];
$answers= [];
$number_of_questions=0;
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
die("connection failed :" . $conn->connect_error);
}
$sql="SELECT * FROM associate ";
$result=mysqli_query($conn,$sql);
$i=0;
if(mysqli_num_rows($result) > 0) {
while($row=mysqli_fetch_assoc($result)){
$question_num[$i]=$row['qno'];
$array1[$i]=$row['first'];
$answers1[$i]=$row['ansa'];
$array2[$i]=$row['second'];
$answers2[$i]=$row['ansb'];
$array3[$i]=$row['third'];
$answers3[$i]=$row['ansc'];
$array4[$i]=$row['fourth'];
$answers4[$i]=$row['ansd'];
$array5[$i]=$row['fifth'];
$answers5[$i]=$row['anse'];
$i++;
$number_of_questions++;
}
}
else {
echo "0 results";
}
$conn->close();
?>
<style>
.dr {
    width: 420px;
    height: 80px;
    padding: 10px;
    border: 2px solid #aaaaaa;
   
}
.gr {
    width: 350px;
    height: 80px;
    border: 1px solid #c8e6c9;
  
   
}
.ye {
    width: 350px;
    height: 80px;
    padding: 10px;
    border: 1px solid #9e9d24;
  
}
.or {
    width: 350px;
    height: 80px;
    padding: 10px;
    border: 1px solid #ffa726;
   
}
.bl {
    width: 350px;
    height: 80px;
    padding: 10px;
    border: 1px solid #18ffff;
    
}
.wh {
    width: 350px;
    height: 80px;
    padding: 10px;
    border: 1px solid #aaaaaa;
    
}
</style>
<script>
var useranswers1 = [];
var useranswers2 = [];
var useranswers3 = [];
var useranswers4 = [];
var useranswers5 = [];
var asw1= <?php echo json_encode($answers1); ?>;
var asw2= <?php echo json_encode($answers2); ?>;
var asw3= <?php echo json_encode($answers3); ?>;
var asw4= <?php echo json_encode($answers4); ?>;
var asw5= <?php echo json_encode($answers5); ?>;
var x =1;
var num_question = <?php echo $number_of_questions; ?>;
var number= <?php echo json_encode($question_num); ?>;
function allowDrop(ev) {
    ev.preventDefault();
}
function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}
function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    	 
} 
function _(id){
   return document.getElementById(id);	
     }
   
function validate_answers()
{
        for(x=1,i=0;i < num_question;x=x+5,i++){
        
        var d= document.getElementById("div"+(x));
        var f= document.getElementById("div"+(x+1));
        var h= document.getElementById("div"+(x+2));
        var j= document.getElementById("div"+(x+3));
        var l= document.getElementById("div"+(x+4));
    	useranswers1[i]=d.textContent;
    	useranswers2[i]=f.textContent;
    	useranswers3[i]=h.textContent;
    	useranswers4[i]=j.textContent;
    	useranswers5[i]=l.textContent;	
    	}
        var result = [];
        var sum=0;
    	for(i=0;i<num_question;i++)
    	{
    if(useranswers1[i].toString().trim()==asw1[i].toString().trim() && useranswers2[i].toString().trim()==asw2[i].toString().trim() && useranswers3[i].toString().trim()==asw3[i].toString().trim() && useranswers4[i].toString().trim()==asw4[i].toString().trim() &&              useranswers5[i].toString().trim()==asw5[i].toString().trim())
    {
   
    	      result[i]=1;
              sum  = sum+1; 	      
    }	         
    		else
    		  result[i]=0;
   }
    	var result_string = "<div class = \"card\"><div class = \"card-content\">";
    	for(x = 1;x<=num_question;x++)
    	{
    	  var card_color;
    	  if(result[x-1]==1){
    	    card_color = "green lighten-5";
    	  }
          else {
    	    card_color = " red lighten-5";
    	  }
    	  result_string = result_string + "<div class = \"card "+card_color+"\"><div class = \"card-content\">";
    	  result_string = result_string + "<div class = \"row\">";
    	  result_string = result_string + "<div class = \"col s12 l6\">";
    	  result_string = result_string + "<p><b>Question no. : </b>" +number[x-1]+"</p>";
    	  result_string = result_string + "</div>";
    	  result_string = result_string + "<div class= \"col s12 l6\">";
    	  result_string = result_string + "<p><b> Your Answer : </b>" + useranswers1[x-1]+"</p>";
    	  result_string = result_string + "<p><b> Your Answer : </b>" + useranswers2[x-1]+"</p>";
    	  result_string = result_string + "<p><b> Your Answer : </b>" + useranswers3[x-1]+"</p>";
    	  result_string = result_string + "<p><b> Your Answer : </b>" + useranswers4[x-1]+"</p>";
    	  result_string = result_string + "<p><b> Your Answer : </b>" + useranswers5[x-1]+"</p>";
    	  result_string = result_string + "</div>";
    	  result_string = result_string + "<div class = \"col s12 l6\">";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + asw1[x-1]+ "</p>";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + asw2[x-1]+ "</p>";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + asw3[x-1]+ "</p>";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + asw4[x-1]+ "</p>";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + asw5[x-1]+ "</p>";
    	  result_string = result_string + "</div>";
    	  result_string = result_string + "</div>";
    	  result_string = result_string + "</div></div>";
    	}
          result_string = result_string + "<div class = \"row\">";
    	  result_string = result_string + "<div class = \"col s12 l2\">";
    	  result_string = result_string + "<p id = \"mark\">Mark scored : " + sum + "</p>";
    	  result_string = result_string + "</div>";
    	  result_string = result_string + "</div>";
    	  result_string = result_string + "</div></div>";
    	$("#quiz_container").html(result_string);
    }     
</script>
</head>
<body>
<div class="container">
       <nav class="cyan accent-4">
       <h4> Match the following Type: </h4>
     </nav>
         <div class="card-panel " id="quiz_container">
        
      <?php
      $arr=array();
      for($i=0,$x=1;$i<count($array1);$i++,$x=$x+5) 
    { 
       $arr[0]=$answers1[$i];
       $arr[1]=$answers2[$i];
       $arr[2]=$answers3[$i];
       $arr[3]=$answers4[$i];
       $arr[4]=$answers5[$i];
       shuffle($arr); 
    
    ?>
            <div class="questions">
                <p> Question <span><?php echo $question_num[$i];?></span></p>
                <p> <span><?php echo $array1[$i];?></span></p>
        <div class="row"> 
        
        <div class="dr col s5"  id="div<?php echo $x; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        <div class="gr col s5 offset-s2"  id="drag<?php echo $x; ?>"  draggable="true" 
        ondragstart="drag(event)"><?php echo $arr[0]; ?>
       </div>
       </div>
                <p> <span><?php echo $array2[$i];?></span></p>
       <div class="row">        
       <div class="dr col s5"  id="div<?php echo $x+1; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>   
       <div class="ye col s5 offset-s2"  id="drag<?php echo $x+1; ?>"  draggable="true"   
       ondragstart="drag(event)"><?php echo $arr[1]; ?>
       </div>
       </div>
                <p> <span><?php echo $array3[$i];?></span></p>
        <div class="row">        
       <div class="dr col s5" id="div<?php echo $x+2; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        <div class="or col s5 offset-s2"  id="drag<?php echo $x+2; ?>"  draggable="true" 
        ondragstart="drag(event)"><?php echo $arr[2]; ?></p>
       </div>
        </div>
                <p> <span><?php echo $array4[$i];?></span></p>
       <div class="row">         
       <div class="dr col s5"  id="div<?php echo $x+3; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
       <div class="bl col s5 offset-s2"  id="drag<?php echo $x+3; ?>"  draggable="true" 
       ondragstart="drag(event)"><?php echo $arr[3]; ?>
       </div>
       </div>
                <p> <span><?php echo $array5[$i];?></span></p>
        <div class="row">        
       <div class="dr col s5"  id="div<?php echo $x+4; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
       <div class="wh col s5 offset-s2"  id="drag<?php echo $x+4; ?>"  draggable="true" 
       ondragstart="drag(event)"><?php echo $arr[4]; ?>
     </div>
       </div>
     </div>
     <?php } ?>
   
   </div>
     <button class="btn waves-effect waves-light" type="submit" name="next" onclick="changeprev()" >previous
<i class="material-icons left">arrow_back</i>
</button>
<button class="btn waves-effect waves-light" type="submit" name="next" onclick="changenext()" >next 
<i class="material-icons right">arrow_forward</i>
     </button>  
<button class = "btn waves-light waves-effect indigo darken-2 white-text" type="submit" name="submit" onClick="validate_answers()">Finish</button>   
     </div>
     </div>
    </div> 
  </body>
  <script>
  var totalQuestions = <?php echo $number_of_questions ; ?> ;
var currentQuestion = 0;
$questions = $('.questions');
$questions.hide();
$($questions.get(currentQuestion)).fadeIn();
function changenext(){
    $($questions.get(currentQuestion)).fadeOut(function(){
        currentQuestion = currentQuestion + 1;
        if(currentQuestion == totalQuestions){
               //do stuff with the result
             alert("quiz completed");
        }else{
        $($questions.get(currentQuestion)).fadeIn();
        }
    });
}
function changeprev(){
    $($questions.get(currentQuestion)).fadeOut(function(){
        currentQuestion = currentQuestion - 1;
        if(currentQuestion == -1){
               //do stuff with the result
               alert("cant move further");
        }else{
        $($questions.get(currentQuestion)).fadeIn();
        }
    });
}
</script>
</html>
