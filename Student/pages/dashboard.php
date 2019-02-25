
            <div class="col-md-9" id="content">
                <div class="row-fluid">
                    <!-- breadcrumb -->


                    <ul class="breadcrumb">
                        <?php
                        $school_year_query = mysqli_query($conn, "select * from school_year order by school_year DESC") or die(mysql_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
                        <li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a></li>
                    </ul>
                    <!-- end breadcrumb -->


                    <div class="span3" id="">
	<div class="row-fluid">

				      <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><h4><i class="icon-pencil"></i> Create Message</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								    <ul class="nav nav-tabs">
										<li class="active">
											<a href="student_message.php">For Teacher</a>
										</li>
										<li><a href="student_message_student.php">For Student</a></li>
									</ul>
								
								
	

								<form method="post" id="send_message">
										<div class="control-group">
											<label>To:</label>
                                          <div class="controls">
                                            <select name="teacher_id" class="chzn-select" required>
                                              	<option></option>
											<?php
            $query = mysqli_query($conn, "select * from teacher order by firstname");
            while ($row = mysqli_fetch_array($query)) {

                ?>
											
											<option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
											
											<?php 
        } ?>
                                            </select>
                                          </div>
                                        </div>
								
							
										<div class="control-group">
											<label>Content:</label>
                                          <div class="controls">
											<textarea name="my_message" class="my_message" required></textarea>
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
												<button  class="btn btn-success"><i class="icon-envelope-alt"></i> Send </button>

                                          </div>
                                        </div>
                                </form>

					
								
								
							
								
								
										<script>
			jQuery(document).ready(function(){
			jQuery("#send_message").submit(function(e){
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "send_message_student.php",
						data: formData,
						success: function(html){
						
						$.jGrowl("Message Successfully Sended", { header: 'Message Sent' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'student_message.php'  }, delay);  
						
						
						}
						
					});
					return false;
				});
			});
			</script>
			
			
							
								
								</div>
                            </div>
                        </div>
                        <!-- /block -->
						

	</div>
</div>
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-right">
                                <?php $query = mysqli_query($conn, "select * from teacher_class_student
														LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
														LEFT JOIN class ON class.class_id = teacher_class.class_id 
														LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
														LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
														where student_id = '$session_id' and school_year = '$school_year'
														") or die(mysqli_error());
                                $count = mysqli_num_rows($query);
                                ?>
                                <span class="badge badge-info"><?php echo $count; ?></span>
                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">

                                <ul id="da-thumbs" class="da-thumbs">
                                    <?php
                                    if ($count != '0') {
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id = $row['teacher_class_id'];
                                            ?>
                                    <li>
                                        <a href="my_classmates.php<?php echo '?id=' . $id; ?>">
                                            <img src="<?php echo $row['thumbnails'] ?>" width="124" height="140"
                                                class="img-polaroid">
                                            <div>
                                                <span>
                                                    <p><?php echo $row['class_name']; ?></p>

                                                </span>
                                            </div>
                                        </a>
                                        <p class="class"><?php echo $row['class_name']; ?></p>
                                        <p class="subject"><?php echo $row['subject_code']; ?></p>
                                        <p class="subject"><?php echo $row['firstname'] . " " . $row['lastname'] ?></p>


                                    </li>


                                    <?php 
                                }
                            } else { ?>
                                    <div class="alert alert-info"><i class="icon-info-sign"></i> You are currently not
                                        enroll to your class</div>
                                    <?php 
                                } ?>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>


            </div>