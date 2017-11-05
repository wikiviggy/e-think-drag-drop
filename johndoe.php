<!DOCTYPE HTML>
<html>
<head>
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
$password='mysql123';
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
    height: 70px;
    padding: 10px;
    border: 2px solid #aaaaaa;
    padding-left: 11px;
}
.gr {
    width: 350px;
    height: 70px;
    border: 1px solid #c8e6c9;
    padding-right: 25px;
   
}
.ye {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 1px solid #9e9d24;
    padding-right: 25px;
}
.or {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 1px solid #ffa726;
    padding-right: 25px;
}
.bl {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 1px solid #18ffff;
    padding-right: 25px;
}
.wh {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 1px solid #aaaaaa;
    padding-right: 25px;
}

</style>
<script>
var user_answers = [];
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
    var xyz= document.getElementById(data) ;
    var ab= xyz.textContent;
    	user_answers.push(ab); 
} 

function validate_answers(){
    	
        var checker= 0;
    	for(x=0,i=0;i<num_question;x=x+5,i++){
    	    if(user_answers[x]==asw1[i])
    	      checker++;
    	    if(user_answers[x+1]==asw2[i])
    	      checker++;
    	      if(user_answers[x+2]==asw3[i])
    	      checker++;
    	      if(user_answers[x+3]==asw4[i])
    	      checker++;
    	      if(user_answers[x+4]==asw5[i])
    	      checker++;
    	      }
    	var result_string = "<div class = \"card\"><div class = \"card-content\">";
    	for(x = 1,i = 1;x<=num_question;x++,i=i+4){
    	  var card_color;
    	  if(checker==5*num_question){
    	    card_color = "green lighten-5";
    	  }
    	  else if(checker==0) {
    	    card_color = "red lighten-5";
    	  }
          else {
    	    card_color = " orange lighten-4";
    	  }
    	  result_string = result_string + "<div class = \"card "+card_color+"\"><div class = \"card-content\">";
    	  result_string = result_string + "<div class = \"row\">";
    	  result_string = result_string + "<div class = \"col s12 l6\">";
    	  result_string = result_string + "<p><b>Question no. : </b>" +number[x-1]+"</p>";
    	  result_string = result_string + "</div>";
    	  result_string = result_string + "<div class= \"col s12 l6\">";
    	  result_string = result_string + "<p><b> Your Answer : </b>" + user_answers[i-1]+"</p>";
    	  result_string = result_string + "<p><b> Your Answer : </b>" + user_answers[i]+"</p>";
    	  result_string = result_string + "<p><b> Your Answer : </b>" + user_answers[i+1]+"</p>";
    	  result_string = result_string + "<p><b> Your Answer : </b>" + user_answers[i+2]+"</p>";
    	  result_string = result_string + "<p><b> Your Answer : </b>" + user_answers[i+3]+"</p>";
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
    	  result_string = result_string + "<p id = \"mark\">Mark scored : " + checker + "</p>";
    	  result_string = result_string + "</div>";
    	  result_string = result_string + "</div>";
    	  result_string = result_string + "</div></div>";
    	$("#quiz_container").html(result_string);
    }     
</script>
</head>
<body>
<div class="container">
       <nav>
       <div class="title blue-grey darken-2 white-text text-darken-2">
       <img src="https://upload.wikimedia.org/wikipedia/en/f/fe/Srmseal.png" style="width:50px; height:70 px;">
       <a href="http://ulc.srmuniv.ac.in/">e-think</a>
       </div>
     </nav>
         <div class="card-panel " id="quiz_container">
        
      <?php
      for($i=0,$x=1;$i<count($array1);$i++,$x=$x+5) {?>
            <div class="questions">
                <p> Question <span><?php echo $question_num[$i];?></span></p>
                <p> <span><?php echo $array1[$i];?></span></p>
        <div class="row"> 
        <div class="dr col s3" style="Float:left" id="div<?php echo $x; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <div class="gr col s3" style="Float:right" id="drag<?php echo $x; ?>"  draggable="true" 
        ondragstart="drag(event)" width="336" height="69">
           <p class="option" type="text" name="questions" value="5"><?php echo $answers3[$i]; ?></p>
       </div>
       </div>
                <p> <span><?php echo $array2[$i];?></span></p>
       <div class="row">        
       <div class="dr col s3" style="Float:left" id="div<?php echo $x+1; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>   
       <div class="ye col s3" style="Float:right" id="drag<?php echo $x+1; ?>"  draggable="true"   
       ondragstart="drag(event)" width="336" height="69">
       <p class="option" type="text" name="questions" value="4"><?php echo $answers1[$i]; ?></p>
       </div>
       </div>
                <p> <span><?php echo $array3[$i];?></span></p>
        <div class="row">        
       <div class="dr col s3" style="Float:left" id="div<?php echo $x+2; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        <div class="or col s3" style="Float:right" id="drag<?php echo $x+2; ?>"  draggable="true" 
        ondragstart="drag(event)" width="336" height="69">
        <p class="option" type="text" name="questions" value="3"><?php echo $answers5[$i]; ?></p>
       </div>
        </div>
                <p> <span><?php echo $array4[$i];?></span></p>
       <div class="row">         
       <div class="dr col s3" style="Float:left" id="div<?php echo $x+3; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
       <div class="bl col s3" style="Float:right" id="drag<?php echo $x+3; ?>"  draggable="true" 
       ondragstart="drag(event)" width="336" height="69">
       <p class="option" type="text" name="questions" value="2"><?php echo $answers2[$i]; ?></p>
       </div>
       </div>
                <p> <span><?php echo $array5[$i];?></span></p>
        <div class="row">        
       <div class="dr col s3" style="Float:left" id="div<?php echo $x+4; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
       <div class="wh col s3" style="Float:right" id="drag<?php echo $x+4; ?>"  draggable="true" 
       ondragstart="drag(event)" width="336" height="69">
       <p class="option" type="text" name="questions" value="1"><?php echo $answers4[$i]; ?></p>
     </div>
       </div>
     </div>
     <?php } ?>
   
   </div>
     <button class="btn waves-effect waves-light" type="submit" name="next" onclick="changeprev()" >previous
<i class="material-icons right">send</i>
</button>
<button class="btn waves-effect waves-light" type="submit" name="next" onclick="changenext()" >next 
<i class="material-icons right">send</i>
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
  
  
  
  
  
  
  
  
  
  
  
  
