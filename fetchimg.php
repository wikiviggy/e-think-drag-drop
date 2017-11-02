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
$array=[];
$across1 = array();
$across2 = array();
$across3 = array();
$across4 = array();
$across5 = array();
$across6 = array();
$down1 = array();
$down2 = array();
$down3 = array();
$down4 = array();
$down5 = array();
$down6 = array();
$number_of_questions=0;
$conn = new mysqli($servername, $username, $password,$dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$sql = "SELECT  *FROM images ";
$result = mysqli_query($conn,$sql);
$i=0;
    if(mysqli_num_rows($result) > 0) {
    while($row=mysqli_fetch_assoc($result)){
    $id[$i]=$row['id'];
    $array[$i]=$row['url'];
    $across1[$i] = $row['across1'];
    $across2[$i] = $row['across2'];
    $across3[$i] = $row['across3'];
    $across4[$i] = $row['across4'];     
    $across5[$i] = $row['across5'];
    $across6[$i] = $row['across6'];
    $down1[$i] = $row['down1'];
    $down2[$i] = $row['down2'];   
    $down3[$i] = $row['down3'];
    $down4[$i] = $row['down4'];
    $down5[$i] = $row['down5'];
    $down6[$i] = $row['down6'];   
    $i++;
    $number_of_questions++;
       }
    }
   else {
    echo "0 results";
   }  
$conn->close();
?>     
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
      for($i=0,$x=1;$i<count($array);$i++,$x=$x+6) {?>
            <div class="questions">
                <p> Question <span><?php echo $id[$i];?></span></p>
                <br>
                    <img src="<?php echo $array[$i]; ?>" />
                    <div class="row">
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter across1" type="text" id="across<?php echo $x; ?>"  >
                    </div>
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter down1" type="text"   id="down<?php echo $x; ?>"  >
                    </div>
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter across2" type="text"  id="across<?php echo $x+1; ?>" >
                    </div>
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter down2" type="text"  id="down<?php echo $x+1; ?>"  >
                    </div>
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter across3" type="text"  id="across<?php echo $x+2; ?>" >
                    </div>
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter down3" type="text" id="down<?php echo $x+2; ?>">
                    </div>
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter across4" type="text"  id="across<?php echo $x+3; ?>" >
                    </div>
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter down4" type="text"  id="down<?php echo $x+3; ?>" >
                    </div>
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter across5" type="text"  id="across<?php echo $x+4; ?>" >
                    </div>
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter down5" type="text"  id="down<?php echo $x+4; ?>" >
                    </div>
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter across6" type="text"  id="across<?php echo $x+5; ?>" >
                    </div>
                    <div class="input-field col s6">
                    <input class="option" placeholder="enter down6" type="text"  id="down<?php echo $x+5; ?>" >
                    </div>
                    </div>
                    </div>
<?php } ?>
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
function validate_answers(){
    	var num_question = <?php echo $number_of_questions; ?>;
    	var questions = <?php echo json_encode($url); ?>;
    	//var answer = <?php echo json_encode($answer); ?>;
    	var across1 = <?php echo json_encode($across1); ?>;
    	var across2 = <?php echo json_encode($across2); ?>;
    	var across3 = <?php echo json_encode($across3); ?>;
    	var across4 = <?php echo json_encode($across4); ?>;
        var across5 = <?php echo json_encode($across5); ?>;
    	var across6 = <?php echo json_encode($across6); ?>;
    	var down1 =   <?php echo json_encode($down1); ?>;
    	var down2 =   <?php echo json_encode($down2); ?>;
        var down3 =   <?php echo json_encode($down3); ?>;
    	var down4 =   <?php echo json_encode($down4); ?>;
    	var down5 =   <?php echo json_encode($down5); ?>;
    	var down6 =    <?php echo json_encode($down6); ?>;  	
        var user_answers1 = [];
        var user_answers2 = [];
        var user_answers3 = [];
        var user_answers4 = [];
        var user_answers5 = [];
        var user_answers6 = [];
        var user_answers7 = [];
        var user_answers8 = [];
        var user_answers9 = [];
        var user_answers10 = [];
        var user_answers11 = [];
        var user_answers12 = [];
    	var x =1;
    	for(x=1,i=1;x<=num_question;x++,i=i+6){
    		user_answers1[x-1]=$("#across"+(i)).val();
                user_answers2[x-1]=$("#down"+(i)).val();
                user_answers3[x-1]=$("#across"+(i+1)).val();
                user_answers4[x-1]=$("#down"+(i+1)).val();
                user_answers5[x-1]=$("#across"+(i+2)).val();
                user_answers6[x-1]=$("#down"+(i+2)).val();
                user_answers7[x-1]=$("#across"+(i+3)).val();
                user_answers8[x-1]=$("#down"+(i+3)).val();
                user_answers9[x-1]=$("#across"+(i+4)).val();
                user_answers10[x-1]=$("#down"+(i+4)).val();
                user_answers11[x-1]=$("#across"+(i+5)).val();
                user_answers12[x-1]=$("#down"+(i+5)).val();
    		console.log(user_answers1[x-1]);
                console.log(user_answers2[x-1]);
          }      
    	var result = [];
        var checker = 0;
    	for(x=0;x<num_question;x++){
    		if(user_answers1[x]==across1[x] && user_answers2[x]==down1[x])
                  checker++;
                if(user_answers3[x]==across2[x] && user_answers4[x]==down2[x])
                  checker++;
                if(user_answers5[x]==across3[x] && user_answers6[x]==down3[x])
                  checker++;
                if(user_answers7[x]==across4[x] && user_answers8[x]==down4[x])
                  checker++;
                if(user_answers9[x]==across5[x] && user_answers10[x]==down5[x])
                  checker++;
                if(user_answers11[x]==across6[x] && user_answers12[x]==down6[x])
                  checker++;
    	}
    	var result_string = "<div class = \"card\"><div class = \"card-content\">";
    	for(x = 1;x<=num_question;x++){
    	  var card_color;
    	  if(checker==6*num_question){
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
    	  result_string = result_string + "<p><b> Your Answer : </b>" + user_answers1[x-1]+"</p>"; 
          result_string = result_string + "<p><b> Your Answer : </b>" + user_answers2[x-1]+"</p>";
          result_string = result_string + "<p><b> Your Answer : </b>" + user_answers3[x-1]+"</p>"; 
          result_string = result_string + "<p><b> Your Answer : </b>" + user_answers4[x-1]+"</p>";
          result_string = result_string + "<p><b> Your Answer : </b>" + user_answers5[x-1]+"</p>"; 
          result_string = result_string + "<p><b> Your Answer : </b>" + user_answers6[x-1]+"</p>";
          result_string = result_string + "<p><b> Your Answer : </b>" + user_answers7[x-1]+"</p>"; 
          result_string = result_string + "<p><b> Your Answer : </b>" + user_answers8[x-1]+"</p>";
          result_string = result_string + "<p><b> Your Answer : </b>" + user_answers9[x-1]+"</p>"; 
          result_string = result_string + "<p><b> Your Answer : </b>" + user_answers10[x-1]+"</p>";
          result_string = result_string + "<p><b> Your Answer : </b>" + user_answers11[x-1]+"</p>"; 
          result_string = result_string + "<p><b> Your Answer : </b>" + user_answers12[x-1]+"</p>";
          result_string = result_string + "</div>";
    	  result_string = result_string + "<div class = \"col s12 l6\">";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + across1[x-1]+ "</p>";
          result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + down1[x-1]+ "</p>";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + across2[x-1]+ "</p>";
          result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + down2[x-1]+ "</p>";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + across3[x-1]+ "</p>";
          result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + down3[x-1]+ "</p>";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + across4[x-1]+ "</p>";
          result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + down4[x-1]+ "</p>";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + across5[x-1]+ "</p>";
          result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + down5[x-1]+ "</p>";
    	  result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + across6[x-1]+ "</p>";
          result_string = result_string + "<p id = \"correct_answer\"><b> Correct Answer : </b>" + down6[x-1]+ "</p>";
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
</html>
