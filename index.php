<?php  include "includes/header.php";  ?>



<?php


if(isset($_POST['submitQuestion'])){



$teacher = clean($_POST['teacher']);
$complex = clean($_POST['complex']);
$optionstext = clean($_POST['optionstext']);
$options = clean($_POST['correctOption']);
$feedback = clean($_POST['feedback']);
$comment = clean($_POST['comment']);
$question = clean($_POST['question']);
$classroom = clean($_POST['classroom']);
$chapter = clean($_POST['chapter']);
$subject = clean($_POST['subject']);
$hintstatement = clean($_POST['hintstatement']);


    $var = "INSERT INTO temp_questions (teacherid, class, complexity, question_text,answer, optionstext, hint_statement, feedback, comment, subject, chapter)VALUES ('$teacher','$classroom', '$complex', '$question','$options', '$optionstext', '$hintstatement', '$feedback', '$comment', '$subject', '$chapter')";
    $query = query($var);


    if($query){

    echo "<div class='alert alert-success text-center'> QUESTIONS INSERTED   <script> window.location.href='index.php';</script></div>";
    
    }else{


    echo "FAILED TO INSERTED";
    }
        

}





?>



<div id="content" style="padding-top:0px">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="index.php"><strong>Pic-Ed</strong>
            <!-- <img src="bird.jpg" alt="logo" style="width:40px;"> -->
        </a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Resouces</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Resouces-2</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link " href="teachers.php">Add Teacher</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="classes.php">Add Class</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="index3.php"> <i class="fa fa-user"></i> Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="submitteddata.php">Click if Logged In</a>
            </li>

        </ul>
    </nav>

    <div class="container">


        <div class="heading text-center">

            <h1>PIC-ED EDUCATION</h1>
            <h3>EXAMINATION QUESTIONS FORM</h3>
            <hr>


        </div>


        <?php 


        $sqlF = query("SELECT * FROM  temp_questions");

        $found = mysqli_num_rows($sqlF);

        if($found > 0)

        {

             $rowF=mysqli_fetch_array($sqlF);
             $sqlss = query("SELECT id,fullname,email FROM teachers WHERE id ='".$rowF['teacherid']."' "); 
             $rowss = mysqli_fetch_array($sqlss);



        }


         ?>





        <div class="row">

            <div class="teacher_area col-lg-7  ">

                <form action="" method="POST" class="card p-4 mt-2 mb-5 ">
                    <div class="teacherhead">

                        <h5><strong>TEACHER'S DETAILS</strong></h5>
                    </div>
                    <select name="teacher" id="teach" class="form-control">


                        <?php 


                        if($found >0){


                        ?>


                        <option value="<?php echo $rowF['teacherid'];?>" readonly selected>
                            <?php echo $rowss['fullname']. "IS ENTERING QUESTIONS NOW"; ?></option>


                        <?php


                        }else{


                         ?>

                        <option value="" disabled selected>--select teacher--</option>

                        <?php 




                    $sql = query("SELECT id,fullname FROM teachers"); 
                    while ($row = mysqli_fetch_array($sql)) {  ?>

                        <option value="<?php echo $row['id'] ?>">
                            <?php echo $row['fullname'];?>
                        </option>
                        <?php }} ?>






                    </select>

                    <div class="form-group ">
                        <label for="" class="col-form-label">
                            FULL Name <sup class="text-danger">* </sup>
                        </label>

                        <?php  if($found>0) {  ?>



                        <input name="fullname" type="text" value="<?php  echo $rowss['fullname']; ?>"
                            class="form-control" readonly>


                        <?php   }else{  ?>

                        <input id="fullname" name="fullname" type="text" class="form-control">

                        <?php }?>



                    </div>

                    <div class="form-group  ">
                        <label for="" class=" col-form-label">
                            Email : <sup class="text-danger">* </sup>
                        </label>

                        <?php  if($found>0) {  ?>

                        <input name="email" type="email" value="<?php  echo $rowss['email']; ?>" class="form-control"
                            readonly>

                        <?php   }else{  ?>

                        <input id="email" name="email" type="email" class="form-control">

                        <?php }?>

                    </div>








                    <h5><strong>QUESTIONS AREA</strong></h5>


                    <div class="row justify-content-center">
                        <div class="questionsarea">


                            <div class="class">
                                <h6>Class Details:</h6>

                                <label for="class">Class:</label>
                                <!-- <input type="text" id="cls" placeholder="Enter class" name="class" list="browsers"> -->
                                <select name="classroom" id="cls" class="form-control">
                                    <!-- <option value="" selected disabled>--select class--</option>
                            <option value="Senior1">Senior1</option>
                            <option value="Senior1">Senior1</option>
                            <option value="Senior1">Senior1</option>
                            <option value="Senior1">Senior1</option>
                            <option value="Senior1">Senior1</option> -->
                                    <option value="" disabled selected>--select class--</option>
                                    <?php 
                            
                            $sql = query("SELECT classid, classname FROM classes"); 
                            while ($row = mysqli_fetch_array($sql)) {  ?>

                                    <option value="<?php echo $row['classname'] ?>">
                                        <?php echo $row['classname'];?>
                                    </option>
                                    <?php } ?>


                                </select>

                                <label for="subject">Subject:</label>
                                <!-- <input type="text" id="sub" placeholder="Enter subject" name="subject"> -->
                                <select name="subject" id="sub" class="form-control">
                                    <option value="" selected disabled>--select subject--</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Physics">Physics</option>
                                    <option value="Biology">Biology</option>
                                    <option value="Chemistry">Chemistry</option>
                                    <option value="ICT">ICT</option>
                                    <option value="History">History</option>
                                    <option value="CRE">CRE</option>
                                    <option value="Economics">Economics</option>
                                    <option value="Geography">Geography</option>




                                </select>

                                <label for="chapter">Chapter:</label>
                                <input type="text" id="chap" placeholder="Enter chapter" class="form-control"
                                    name="chapter">


                                <hr>
                            </div>
                            <!--class end-->

                            <div class="complexity">
                                <h6>Complexity:</h6>

                                <div class="checkboxes">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="complex" value="1" checked>
                                        <label class="form-check-label">
                                            Simple
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="complex" value="2">
                                        <label class="form-check-label">
                                            Moderate
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="complex" value="3">
                                        <label class="form-check-label">
                                            Hard
                                        </label>
                                    </div>
                                </div>



                            </div>
                            <!--complexity end-->

                            <hr>

                            <div class="questiontext">
                                <h6>Question Text:</h6>

                                <div class="form-group">
                                    <label for="comment">Question(s)</label>
                                    <textarea class="form-control tiny" rows="5" name="question"></textarea>
                                </div>

                            </div>
                            <!--questiontext end-->
                            <hr>

                            <div class="options">
                                <h6>Options:</h6>

                                <div class="checkboxes">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctOption" value="1"
                                            checked>
                                        <label class="form-check-label">
                                            The option is A
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="correctOption" value="2">
                                        <label class="form-check-label">
                                            The option is B
                                        </label>
                                    </div>
                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="correctOption" value="3">
                                        <label class="form-check-label">
                                            The option is C
                                        </label>
                                    </div>

                                    <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="correctOption" value="4">
                                        <label class="form-check-label">
                                            The option is D
                                        </label>
                                    </div>

                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="hint">option hint</label>
                                    <textarea class="form-control tiny" rows="3" id="hint"
                                        name="optionstext"></textarea>
                                </div>




                            </div>
                            <!--options end-->
                            <hr>

                            <div class="hintstatement">
                                <h6>Hint Statement:</h6>

                                <div class="form-group">
                                    <label for="hint">without giving a direct answer,please provide learners with some
                                        referencing
                                        that could help them choose correct answer(s)</label>
                                    <textarea class="form-control tiny" rows="3" id="hint"
                                        name="hintstatement"></textarea>
                                </div>


                            </div>
                            <!--hintstatement end-->
                            <hr>

                            <div class="Feedback">
                                <h6>Feedback:</h6>

                                <div class="form-group">
                                    <label for="feedback">Correct: That's correct! <br>Incorrect: That's
                                        incorrect.(Specify why
                                        answer is incorrect and provide correct answer)</label>
                                    <textarea class="form-control tiny" rows="3" id="fb" name="feedback"></textarea>
                                </div>


                            </div>
                            <!--Feedback end-->
                            <hr>

                        </div>
                        <!--question area end-->




                        <div class="teachercomment">
                            <h6><strong>TEACHER'S COMMENT , IF ANY:</strong></h6>

                            <div class="form-group">
                                <label for="comment"></label>
                                <textarea class="form-control tiny" rows="3" id="tc" name="comment"
                                    placeholder="Enter your comments here"></textarea>
                            </div>

                        </div>

                        <button type="submit" name="submitQuestion" class="btn btn-success btn-block">Submit</button>

                    </div>
                    <!--questions row end-->

                </form>
            </div>
            <!--questions end-->

            <div class="teacher_area col-lg-5 ">

                <div class="card p-4 mt-2 mb-5 ">

                    <div class="card-body p-4">

                        <h4>SUMMARY OF QUESTIONS</h4>

                        <table class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>QUESTION</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php 

                    $sqldd = query("SELECT * FROM temp_questions");


                    $count = 0;

                    while($rowdd = mysqli_fetch_array($sqldd)){

                        $count++;
                        ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $rowdd['question_text']; ?></td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>

                    </div>

                    <hr>


                    <h2>ACKNOWLEDGE</h2>

                    <div class="alert bg-info">
                        <p class="lead">
                            <strong>After Fully setting all your questions, Please submit them here
                                Thanks, MANAGEMENT.</strong>
                        </p>


                    </div>




                    <form action="submitFinished.php" method="POST">

                        <div class="form-group">
                            <label for="tcf">Enter your FInal words about the questions set(Optional)</label>
                            <textarea class="form-control tiny" rows="5" name="tcf"></textarea>
                        </div>


                        <button class="btn btn-block btn-primary" name="allsubmit" type="submit"> SUBMIT
                            QUESTIONS</button>


                    </form>

                </div>


            </div>


        </div>

    </div><!-- Content end -->



    <?php  include "includes/footer.php";  ?>