<?php
include('configDb.php');
require_once('Student/addStudent.php');
require_once('feedback.php');
require_once('Admin/addCourse.php');
require_once('Admin/addLesson.php');
require_once('Admin/editCourse.php');
use PHPUnit\Framework\TestCase;

class projectTests extends TestCase
{
public function testAddStudent()
    {
        $con = mysqli_connect("localhost","root","","guitarschool");
        $this->assertNotFalse($con, "Failed to connect to MySQL: " . mysqli_connect_error());

        $_POST['studentSignUp'] = true;
        $_POST['studentName'] = "John Doe";
        $_POST['studentEmail'] = "john.doe@example.com";
        $_POST['studentPassword'] = "password123";
        $_POST['studentPassword2'] = "password123";

        addStudent($con);

        $query = "SELECT * FROM students WHERE student_name = 'John Doe'";
        $result = $con->query($query);
        $this->assertNotFalse($result, "Failed to execute query: " . $con->error);

        $student = $result->fetch_assoc();
        $this->assertEquals($student['student_name'], "John Doe");
        $this->assertEquals($student['student_email'], "john.doe@example.com");
    }


    public function testConnection() {
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = '';
        $db_name = 'guitarschool';

        $con = new mysqli($db_host, $db_user, $db_password, $db_name);

        $this->assertInstanceOf(mysqli::class, $con);
    }

    public function testAddFeedback()
    {
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = "";
        $db_name = "guitarschool";

        $con = new mysqli($db_host,$db_user,$db_password,$db_name);

        $student_id = 1;
        $student_name = 'John Doe';
        $student_email = 'john@example.com';
        $feedback_content = 'Great course!';

        $message = addFeedback($con, $student_id, $student_name, $student_email, $feedback_content);

        $this->assertStringContainsString('*Succesfully!', $message);

        $query = "SELECT * FROM feedback WHERE student_id = $student_id AND student_name = '$student_name' AND student_email = '$student_email' AND feedback_content = '$feedback_content'";
        $result = $con->query($query);
        $this->assertNotNull($result);
        $this->assertGreaterThan(0, $result->num_rows);
    }

    public function testAddCourse()
    {
        $_REQUEST['course_name'] = 'Test Course';
        $_REQUEST['course_description'] = 'Test Course Description';
        $_REQUEST['course_author'] = 'Test Author';
        $_REQUEST['course_duration'] = '10 hours';
        $_REQUEST['course_category'] = 'Beginner';
        $_REQUEST['course_new_price'] = '50';
        $_REQUEST['course_original_price'] = '100';
        $_FILES['upload_file']['name'] = 'test.jpg';
        $_FILES['upload_file']['tmp_name'] = 'test.jpg';

        $con = mysqli_connect("localhost","root","","guitarschool");

        $result = addCourse($con);

        $this->assertEquals("<div class='modal__span-success'>*Course Added Successfully!</div>", $result);

        $con->query("DELETE FROM courses WHERE course_name = 'Test Course'");
    }

    public function testGetVideoDuration() {
        $filePath = 'assets/video/office.mp4';
        $duration = getVideoDuration($filePath);
        $this->assertIsInt($duration);
        $this->assertGreaterThan(0, $duration);
    }

    public function testUpdateCourse() {
        // Create a mock $con object
        $con = mysqli_connect("localhost","root","","guitarschool");
      
        // Set up test data
        $_REQUEST['course_id'] = 20;
        $_REQUEST['course_name'] = 'Test Course';
        $_REQUEST['course_description'] = 'This is a test course';
        $_REQUEST['course_author'] = 'Marko Polo';
        $_REQUEST['course_duration'] = '5 Days';
        $_REQUEST['course_category'] = 'Test';
        $_REQUEST['course_new_price'] = 10;
        $_REQUEST['course_original_price'] = 20;
        $_FILES['upload_file']['name'] = 'assets/img/courseImg/guy-jamming-acoustic.jpg';
      
        // Call the function
        $result = updateCourse($con);
      
        // Assert that the function returns a success message
        $this->assertEquals("<div class='modal__span-success'>*Course Updated Succesfully!</div>", $result);
      }



}

?>