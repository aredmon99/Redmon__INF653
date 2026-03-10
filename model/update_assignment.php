<?php
require('database.php');
require('course_db.php');

$course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);

$course = get_course($course_id);
?>

<h2>Update Course</h2>

<form action="controller.php" method="post">

<input type="hidden" name="action" value="update_course">
<input type="hidden" name="course_id" value="<?php echo $course['courseID']; ?>">

<label>Course Name:</label>

<input type="text" name="course_name"
value="<?php echo $course['courseName']; ?>">

<br><br>

<input type="submit" value="Update Course">

</form>