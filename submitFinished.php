<?php  include "includes/db.php";  ?>

<?php 


if (isset($_POST['allsubmit'])) {


    $sql10 = query("SELECT * FROM temp_questions ");
   

    while($row10=mysqli_fetch_array($sql10))

		    {


		        $teacher = clean($row10['teacherid']);
				$complex = clean($row10['complexity']);
				$options = clean($row10['optionstext']);
				$answer = clean($row10['answer']);
				$feedback = clean($row10['feedback']);
				$comment = clean($row10['comment']);
				$question = clean($row10['question_text']);
				$classroom = clean($row10['class']);
				$chapter = clean($row10['chapter']);
				$subject = clean($row10['subject']);
				$hintstatement = clean($row10['hint_statement']);

		         $var = "INSERT INTO main_questions (teacherid, class, complexity, question_text,answer, optionstext, hint_statement, feedback, comment, subject, chapter)VALUES ('$teacher','$classroom', '$complex', '$question','$answer', '$options', '$hintstatement', '$feedback', '$comment', '$subject', '$chapter')";


		          $query = query($var);
		          
		}


//deleting from the temporary table

        $delete = query("DELETE FROM temp_questions ");

	    if ($delete) {

	      echo "<script> alert('successfully inserted'); window.location.href='index.php';</script>";

	    } else {

	       echo "<script> alert('Oooops, Something wrong happened');  window.location.href='index.php';</script>";

	    }


  
      
      
      }






 ?>

<!--  <fieldset>
  <legend>Choose your interests</legend>
  <div>
    <input type="checkbox" id="coding" name="interest" value="coding" checked>
    <label for="coding">Coding</label>
  </div>
  <div>
    <input type="checkbox" id="music" name="interest" value="music">
    <label for="music">Music</label>
  </div>
</fieldset> -->