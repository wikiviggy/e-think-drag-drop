<!DOCTYPE HTML>
<html>
<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" > </script>
<?php
$servername='localhost';
$username='root';
$password='mysql123';
$dbname='test';
$question_num= [];
$array= [];
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
die("connection failed :" . $conn->connect_error);
}

$sql="SELECT qno,name FROM question ";
$result=mysqli_query($conn,$sql);
$i=0;
if(mysqli_num_rows($result) > 0) {
while($row=mysqli_fetch_assoc($result)){
$question_num[$i]=$row['qno'];
$array[$i]=$row['name'];
$i++;
}
}
else {
echo "0 results";
}
$conn->close();
?>
<style>
#div1 {
    width: 500px;
    height: 90px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: 2cm;
}
#drag1 {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: 2cm;
    background-color:green;
}
#drag2 {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: 2cm;
    background-color: yellow;
}
#drag3 {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: 2cm;
    background-color:orange;
}
#drag4 {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: 2cm;
    background-color:blue;
}
#drag5 {
    width: 350px;
    height: 70px;
    padding: 10px;
    border: 8px solid #aaaaaa;
    padding-left: red;
}
</style>
<script>
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
    
$.ajax({
            url: 'action.php',
            data: {'xyz' :ab} ,
            type: "POST",
            success: function (json) {
              alert("Updated Successfully");
            }
          });
} 


</script>
</head>
<body>
       <nav>
       <div class="navbar-wrapper teal lighten2">
       <img src="https://upload.wikimedia.org/wikipedia/en/f/fe/Srmseal.png" style="width:50px; height:70 px;">
       <a href="http://ulc.srmuniv.ac.in/">e-think</a>
       </div>
     </nav>
         <div class="card-panel teal lighten-2 ">
         <div class="card content">
      <?php
      for($i=0;$i<count($array);$i++) {?>
         
            <div class="row">
            <div class="questions">
                <p> Question <span><?php echo $question_num[$i];?></span></p>
                <br>
                <p> <span><?php echo $array[$i];?></span></p>
        <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        <center> 
        <div id="drag1"  draggable="true" 
        ondragstart="drag(event)" width="336" height="69">
           <p class="option" type="text" name="questions" value="5">Strongly agree</p>
       </div>
       </center>
       <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
       <center>   
       <div id="drag2"  draggable="true"   
       ondragstart="drag(event)" width="336" height="69">
       <p class="option" type="text" name="questions" value="4">Somewhat agree</p>
       </div>
       </center>
       <div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
        <center> 
        <div id="drag3"  draggable="true" 
        ondragstart="drag(event)" width="336" height="69">
        <p class="option" type="text" name="questions" value="3">neutral</p>
       </div>
        </center>
       <div id="div4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
       <center>
       <div id="drag4"  draggable="true" 
       ondragstart="drag(event)" width="336" height="69">
       <p class="option" type="text" name="questions" value="2">Somewhat disagree</p>
       </div>
       </center>
       <div id="div5" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
       <center>
       <div id="drag5"  draggable="true" 
       ondragstart="drag(event)" width="336" height="69">
       <p class="option" type="text" name="questions" value="1">Strongly disagree</p>
     </div>
       </center>
     </div>
     <?php } ?>
  </div>
   </div>
  </body>
  </html>
