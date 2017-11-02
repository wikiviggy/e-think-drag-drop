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

$sql="SELECT * FROM question ";
$result=mysqli_query($conn,$sql);
$i=0;
if(mysqli_num_rows($result) > 0) {
while($row=mysqli_fetch_assoc($result)){
$question_num[$i]=$row['qno'];
$array[$i]=$row['name'];
$answers[$i]=$row['response'];
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
    height: 90px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: 2cm;
}
.gr {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: 2cm;
    background-color:green;
}
.ye {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: 2cm;
    background-color: yellow;
}
.or {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: 2cm;
    background-color:orange;
}
.bl {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: 2cm;
    background-color:blue;
}
.wh {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: red;
}
</style>
<script>
var user_answers = [];
var asw= <?php echo json_encode($answers); ?>;
var x =1;
var num_question = <?php echo $number_of_questions; ?>;
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
//$.ajax({
  //          url: 'action.php',
    //        data: {'xyz' :ab} ,
      ///      type: "POST",
         //   success: function (json) {
           ///   alert("Updated Successfully");
       //     }
        //  });
} 

function validate_answers(){
    	
    	var checker= 0;
    	for(x=0;x<num_question;x++){
    	    if(user_answers[x]==asw[x])
    	      checker++;
    	      }
    	var result_string = "<div class = \"card\"><div class = \"card-content\">";
    	for(x = 1;x<=num_question;x++){
    	  var card_color;
    	  if(checker==num_question){
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
    	  result_string = result_string + "<div class= \"col s12 l6\">";
    	  result_string = result_string + "<p><b> Your Answer : </b>" + user_answers[x-1]+"</p>";
    	  result_string = result_string + "</div>";
    	  result_string = result_string + "<div class = \"col s12 l6\">";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + asw[x-1]+ "</p>";
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
       <nav>
       <div class="title blue-grey darken-2 white-text text-darken-2">
       <img src="https://upload.wikimedia.org/wikipedia/en/f/fe/Srmseal.png" style="width:50px; height:70 px;">
       <a href="http://ulc.srmuniv.ac.in/">e-think</a>
       </div>
     </nav>
         <div class="card-panel teal lighten-2 " id="quiz_container">
         <div class="card content">
      <?php
      for($i=0,$x=1,$y=0;$i<count($array);$i=$i+5,$x=$x+5,$y++) {?>
            <div class="questions">
                <p> Question <span><?php echo $question_num[$y];?></span></p>
                <p> <span><?php echo $array[$i];?></span></p>
        <div class="dr" id="div<?php echo $x; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        <center> 
        <div class="gr"id="drag<?php echo $x; ?>"  draggable="true" 
        ondragstart="drag(event)" width="336" height="69">
           <p class="option" type="text" name="questions" value="5">Strongly agree</p>
       </div>
       </center>
                <p> <span><?php echo $array[$i+1];?></span></p>
       <div class="dr" id="div<?php echo $x+1; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
       <center>   
       <div class="ye" id="drag<?php echo $x+1; ?>"  draggable="true"   
       ondragstart="drag(event)" width="336" height="69">
       <p class="option" type="text" name="questions" value="4">Somewhat agree</p>
       </div>
       </center>
                <p> <span><?php echo $array[$i+2];?></span></p>
       <div class="dr" id="div<?php echo $x+2; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        <center> 
        <div class="or" id="drag<?php echo $x+2; ?>"  draggable="true" 
        ondragstart="drag(event)" width="336" height="69">
        <p class="option" type="text" name="questions" value="3">neutral</p>
       </div>
        </center>
                <p> <span><?php echo $array[$i+3];?></span></p>
       <div class="dr" id="div<?php echo $x+3; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
       <center>
       <div class="bl" id="drag<?php echo $x+3; ?>"  draggable="true" 
       ondragstart="drag(event)" width="336" height="69">
       <p class="option" type="text" name="questions" value="2">Somewhat disagree</p>
       </div>
       </center>
                <p> <span><?php echo $array[$i+4];?></span></p>
       <div class="dr" id="div<?php echo $x+4; ?>" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
       <center>
       <div class="wh" id="drag<?php echo $x+4; ?>"  draggable="true" 
       ondragstart="drag(event)" width="336" height="69">
       <p class="option" type="text" name="questions" value="1">Strongly disagree</p>
     </div>
       </center>
     </div>
     <?php } ?>
     </div>
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
  
  
  
  
  
  
  
  
  
  
  
  
