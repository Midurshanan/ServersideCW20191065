<?php include 'includes1/header.php';

if ($this->session->flashdata('welcome')){
    echo "<h3>".$this->session->flashdata('welcome')."</h3>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Admin</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

</head>
<body>
<div id="data">
		<table>
			<?php foreach ($names as $row) { ?>
			<tr>
				<td><?=$row->$qid?></td>
				<td><?=$row->$question?></td>
				<td><?=$row->op1?></td>
				<td><?=$row->op2?></td>
				<td><?=$row->op3?></td>
				<td><?=$row->op4?></td>
				<td><?=$row->answer?></td>
			</tr>
			
			<?php } ?>
		</table>
	</div>
<br>

<p id="message"></p>
<p id="createmsg"></p>

<br> <br><br>

<h3>Create Question</h3>

   <form>
   
   <label for='question'> Question </label>
		<input type='text' name='question' id='question' size='30' /><br>

		<label for='option1'> Option1 </label>
		<input type='text' name='op1' id='op1' size='30' /> <br>
		
		<label for='option2'> Option2 </label>
		<input type='text' name='opn2' id='op2' size='30' /> <br>

		<label for='option3'> Option3 </label>
		<input type='text' name='op3' id='op3' size='30' /> <br>

		<label for='option4'> Option4 </label>
		<input type='text' name='op4' id='op4' size='30' /> <br>

		<label for='answer'> Answer </label>
		<input type='text' name='answer' id='answer' size='30' /> <br>

		<label for='qtype'> Category </label>
		<input type='text' name='questiontype' id='questiontype' size='30' /> <br>
		
		<input type="submit" value="Create" id="create" />
   
   </form>
   
   <br><br>
   
   <form>
     <label for="edit"> Type in the id to delete/edit</label>
       <input type="text" name="qid" id="qid" size="10" /> <br>
       
          <input type="submit" value="Delete" id="delete" />
             <input type="submit" value="Edit" id="edit" />
   </form>
   
   <br><br><br>
   
  <div id="editBox" style="display: none;"> 
   <form>
   
   <input type="hidden" name="quizid" id="quizid" size="20" /> <br>
			<h3>Edit Question</h3>
			<label for="editquestion">Edit Question</label>
			<input type="text" name="editquestion" id="editquestion" size="30" /> <br>
			
			<label for="editquestion">Edit Option1</label>
			<input type="text" name="editoption1" id="editoption1" size="30" /> <br>

			<label for="editquestion">Edit Option2</label>
			<input type="text" name="editoption2" id="editoption2" size="30" /> <br>

			<label for="editquestion">Edit Option3</label>
			<input type="text" name="editoption3" id="editoption3" size="30" /> <br>

			<label for="editquestion">Edit Option4</label>
			<input type="text" name="editoption4" id="editoption4" size="30" /> <br>
			
			<label for="editquestion">Edit Answer</label>
			<input type="text" name="editanswer" id="editanswer" size="30" /> <br>

			<label for="editquestion">Edit Category</label>
			<input type="text" name="editqtype" id="editqtype" size="30" /> <br>
			
			<input type="submit" value="Update" id="update">
   
   </form>
   
   </div>
   
   
  <script>
  
  $(document).ready(function() {
			
			$("#create").click(function(event) {
				event.preventDefault();
				var question = $("input#question").val();  
				var option1 = $("input#option1").val(); 
				var option2 = $("input#option2").val(); 
				var option3 = $("input#option3").val(); 
				var option4 = $("input#option4").val(); 
				var answer = $("input#answer").val(); 
				var qtype = $("input#qtype").val(); 
			$.ajax({
				method: "POST",
				url: "<?php echo base_url(); ?>index.php/questioncontroller/person",	
				dataType: 'JSON',
				data: {question: question, op1: op1, op2: op2,op3: op3,op4: op4,answer: answer,questiontype: questiontype},
				
				success: function(data) {
					console.log(question, op1, op2,op3,op4, answer,questiontype);
					$("#data").load(location.href + " #data");
					$("input#question").val(""); 
					$("input#op1").val(""); 
					$("input#op2").val(""); 
					$("input#op3").val(""); 
					$("input#op4").val(""); 
					$("input#answer").val("");  
					$("input#questiontype").val("");
				}
			});
			});
		});
		
		
		$(document).ready(function() {
			$("#delete").click(function(event) {
				event.preventDefault();
				var qid  = $("input#quizID ").val();  
			$.ajax({
				method: "GET",
				url: "<?php echo base_url(); ?>index.php/questioncontroller/person",	
				dataType: 'JSON',
				data: {qid : qid },
				success: function(data) {
					console.log(qid );
					$("#data").load(location.href + " #data");
					$("#message").html("You have successfully deleted number " + qid  + " Thank you");
					$("#message").show().fadeOut(5000);
					$("input#qid ").val("");  
				}
			});
			});
		});
		
		
		
		$(document).ready(function() {
			$("#edit").click(function(event) {
				event.preventDefault();
				var qid  = $("input#qid ").val();  
			$.ajax({
				method: "GET",
				url: "<?php echo base_url(); ?>index.php/questioncontroller/user",	
				dataType: 'JSON',
				data: {qid : qid },
				
				success: function(data) {
					
					$.each(data,function(qid , question, op1, op2,op3,op4, answer,questiontype) {
					
					console.log(quizID , question, op1, op2,op3,op4, answer,questiontype);
					$("input#qid ").val(qid ); 
					$("#editBox").show();
					$("input#editquestion").val(question[0]);
					$("input#editop1").val(question[1]);
					$("input#editop2").val(question[2]);
					$("input#editop3").val(question[3]);
					$("input#editop4").val(question[4]);
					$("input#editanswer").val(question[5]);
					$("input#editquestiontype").val(question[6]);
					});
				}
			});
			});
		});
		
		
		
		$(document).ready(function() {
			
			$("#update").click(function(event) {
				event.preventDefault();
				var quizID  = $("input#qid ").val();
				var question = $("input#editquestion").val();  
				var option1 = $("input#editop1").val(); 
				var option2 = $("input#editop2").val(); 
				var option3 = $("input#editop3").val(); 
				var option4 = $("input#editop4").val(); 
				var answer = $("input#editanswer").val(); 
				var qtype = $("input#editquestiontype").val();
			$.ajax({
				method: "POST",
				url: "<?php echo base_url(); ?>index.php/People/user",	
				dataType: 'JSON',
				data: {qid:qid, question: question, op1: op1, op2: op2,op3: op3,op4: op4,answer: answer,questiontype: questiontype},
				
				success: function(data) {
					console.log(qid , question, op1, op2,op3,op4, answer,questiontype);
					$("#data").load(location.href + " #data");
					$("#message").html("You have successfully updated " + question + " Thank you");
					$("#message").show().fadeOut(5000);
					$("#editBox").hide();
					
				}
			});
			});
			});
		
		
			$(document).ready(function() {
				
				var Create = Backbone.Model.extend({
					url: function () {
						var link = "<?php echo base_url(); ?>index.php/questioncontroller/person?question=" + this.get("question");
						return link;
					},
					defaults: {
						question: null,
						op1: null,
						op2: null,
						op3: null,
						op4: null,
						answer: null }
				});
				
				var createModel = new Create();
				
				var DisplayView = Backbone.View.extend({
					el: ".container", 
					model: createModel,
					initialize: function () {
						this.listenTo(this.model,"sync change",this.gotdata);
					},
					
					events: {
						"click #create" : "getdata"
					},
					
					getdata: function (event) {
						var question = $('input#question').val();
						var op1 = $('input#option1').val();
						var op2 = $('input#option2').val();
						var op3 = $('input#option3').val();
						var op4 = $('input#option4').val();
						var answer = $('input#answer').val();
						this.model.set({question: question, op1: op1, op2: op2,op3: op3,op4: op4,answer: answer});
						this.model.fetch();
					},
					
					gotdata: function () {
						$('#createmsg').html('Question ' + this.model.get('question') +  ' has been created').show().fadeOut(5000);
					}
				});
				
				var displayView = new DisplayView();
				
			});
  
  
  
  
  </script>



</div>

</body>
</html>



<?php include 'includes1/footer.php'; ?>