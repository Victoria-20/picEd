<?php session_start(); ?>

<?php  include "includes/header.php";  ?>

<?php if(!isset($_SESSION['user_id'])){

 header('Location:index.php');

} ?>
<!-- Content
  ============================================= -->
<div id="content" style="padding-top:0px">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="index.php"><strong>Pic-Ed</strong>
            <!-- <img src="bird.jpg" alt="logo" style="width:40px;"> -->
        </a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Resouces-1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Resouces-2</a>
            </li>
            <li class="nav-item pull-right">
                <a class="btn btn-sm btn-danger" href="c_logout.php">Logout Here</a>
            </li>

        </ul>
    </nav>

    <div class="container mt-5">



        <h3 class="text-center">SUBMITTED DATA</h3>
        <br>

        <div class="card p-5">

            <div class="table-responsive">


                <table class="table table-bordered table-stripped">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Class</th>
                            <th>Teacher's Name</th>
                            <th>Subject</th>
                            <th>Chapter</th>
                            <th>Question</th>
                            <th>Options</th>
                            <th>Answer</th>
                            <th>Complexity</th>
                            <th>Feedback</th>
                            <th>Hint</th>
                            <th>Comment</th>
                        </tr>
                    </thead>

                    <tbody>


                        <?php  


                        $sql2 = query("SELECT * FROM main_questions");


                        $count = 0;

                        while($row = mysqli_fetch_array($sql2)){

                           $count++;


                           $t_id = $row['teacherid'];

                           $sqlT = query("SELECT * FROM teachers WHERE id = '$t_id' ");

                           while($rowT = mysqli_fetch_array($sqlT)){

                            
                              $teachers_name = $rowT['fullname'];
                              
                           }

                           //class

                           $c_id = $row['teacherid'];

                           $sqlC= query("SELECT * FROM classes WHERE classid = '$c_id' ");

                           while($rowC = mysqli_fetch_array($sqlC)){

                            
                              $classname = $rowC['classname'];
                              
                           }

                           //correct answer

                              $correct_answer = $row['answer'];

                              if($correct_answer == '1'){

                                $correct = "A";
                              }else if($correct_answer == '2'){

                                $correct = "B";
                              }else if($correct_answer == '3'){

                                $correct = "C";
                              }else{
                                $correct = "D";
                              }


                                 //complex answer

                              $complex = $row['complexity'];

                             switch ($complex) {
                               case '1':
                                $comp = "Simple"; # code...
                               break;

                               case '2':
                                 $comp = "Moderate"; 
                               break;
                               
                               case '3':
                                 $comp = "Hard"; 
                               break;
                               
                               default:
                                 # code...
                                 break;
                             }

                          

                        ?>

                        <tr>

                            <td><?php echo $count; ?></td>
                            <td><?php  echo $row['class']; ?></td>
                            <td><?php echo $teachers_name; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['chapter']; ?></td>
                            <td><?php echo $row['question_text']; ?></td>
                            <td><?php echo $row['optionstext']; ?></td>
                            <td><?php echo $correct; ?></td>
                            <td><?php echo $comp; ?></td>
                            <td><?php echo $row['feedback']; ?></td>
                            <td><?php echo $row['hint_statement']; ?></td>
                            <td><?php echo $row['comment']; ?></td>


                        </tr>

                        <?php } ?>

                    </tbody>





                </table>

            </div>








        </div>
    </div>





</div>
<!--container end-->

</div><!-- Content end -->



<?php  include "includes/footer.php";  ?>