<?php
$conn = new mysqli("localhost", "root", "", "student_registration");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob_day = $_POST['day'];
    $dob_month = $_POST['month'];
    $dob_year = $_POST['year'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pin_code = $_POST['pin_code'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    // Handle hobbies
    $hobbies = "";
    if(isset($_POST['hobbies'])){
        $hobbies = implode(",", $_POST['hobbies']);
    }
    // Add other hobby if provided
    if(!empty($_POST['other_hobby'])){
        if($hobbies != ""){
            $hobbies .= "," . $_POST['other_hobby'];
        } else {
            $hobbies = $_POST['other_hobby'];
        }
    }

    // Handle courses
    $courses_applied = "";
    if(isset($_POST['course'])){
        $courses_applied = $_POST['course'];
    }

    // Insert into students table
    $sql = "INSERT INTO students(first_name, last_name, dob_day, dob_month, dob_year, email, mobile, gender, address, city, pin_code, state, country, hobbies, courses_applied)
    VALUES('$first_name','$last_name','$dob_day','$dob_month','$dob_year','$email','$mobile','$gender','$address','$city','$pin_code','$state','$country','$hobbies','$courses_applied')";

    if($conn->query($sql) === TRUE){
        $student_id = $conn->insert_id;
        
        // Insert qualifications
        $examinations = ['Class X', 'Class XII', 'Graduation', 'Masters'];
        
        for($i = 1; $i <= 4; $i++){
            $board = $_POST['board' . $i];
            $percentage = $_POST['per' . $i];
            $year_of_passing = $_POST['year' . $i];
            
            // Only insert if at least one field has value
            if(!empty($board) || !empty($percentage) || !empty($year_of_passing)){
                $qual_sql = "INSERT INTO qualifications(student_id, examination, board, percentage, year_of_passing) 
                            VALUES('$student_id', '{$examinations[$i-1]}', '$board', '$percentage', '$year_of_passing')";
                $conn->query($qual_sql);
            }
        }
        
        echo "<script>alert('Registration Successful!'); window.location.href='';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Registration Form</title>

<style>
body{
    font-family: Arial;
    background: white;
}

h2{
    text-align: center;
}

table{
    margin: auto;
    border-collapse: collapse;
}

td{
    padding: 8px;
    vertical-align: top;
}

input, select, textarea{
    padding: 5px;
}

input[type="text"], input[type="email"], select, textarea{
    width: 250px;
}

.qualification-table{
    width: 100%;
    border-collapse: collapse;
}

.qualification-table th, .qualification-table td{
    border: 1px solid #000;
    padding: 5px;
    text-align: left;
}

.qualification-table input{
    width: 100%;
    box-sizing: border-box;
}

.small-note{
    font-size: 11px;
    color: #666;
    margin-top: 3px;
}

button{
    padding: 8px 20px;
    margin: 0 5px;
    cursor: pointer;
}
</style>

</head>

<body>

<h2>STUDENT REGISTRATION FORM</h2>

<form method="POST">

<table>

<tr>
<td>FIRST NAME</td>
<td><input type="text" name="first_name" required></td>
</tr>

<tr>
<td>LAST NAME</td>
<td><input type="text" name="last_name" required></td>
</tr>

<tr>
<td>DATE OF BIRTH</td>
<td>
<select name="day" required>
<option value="">Day</option>
<?php for($i=1;$i<=31;$i++) echo "<option value='$i'>$i</option>"; ?>
</select>

<select name="month" required>
<option value="">Month</option>
<option value="1">Jan</option><option value="2">Feb</option><option value="3">Mar</option>
<option value="4">Apr</option><option value="5">May</option><option value="6">Jun</option>
<option value="7">Jul</option><option value="8">Aug</option><option value="9">Sep</option>
<option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>
</select>

<select name="year" required>
<option value="">Year</option>
<?php for($i=1980;$i<=2025;$i++) echo "<option value='$i'>$i</option>"; ?>
</select>
</td>
</tr>

<tr>
<td>EMAIL ID</td>
<td><input type="email" name="email" required></td>
</tr>

<tr>
<td>MOBILE NUMBER</td>
<td><input type="text" name="mobile" pattern="[0-9]{10}" required></td>
</tr>

<tr>
<td>GENDER</td>
<td>
<input type="radio" name="gender" value="Male" required> Male
<input type="radio" name="gender" value="Female"> Female
</td>
</tr>

<tr>
<td>ADDRESS</td>
<td><textarea name="address" rows="3" required></textarea></td>
</tr>

<tr>
<td>CITY</td>
<td><input type="text" name="city" required></td>
</tr>

<tr>
<td>PIN CODE</td>
<td><input type="text" name="pin_code" required></td>
</tr>

<tr>
<td>STATE</td>
<td><input type="text" name="state" required></td>
</tr>

<tr>
<td>COUNTRY</td>
<td>
<select name="country" required>
<option value="India" selected>India</option>
<option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="Argentina">Argentina</option>
<option value="Australia">Australia</option>
<option value="Brazil">Brazil</option>
<option value="Canada">Canada</option>
<option value="China">China</option>
<option value="France">France</option>
<option value="Germany">Germany</option>
<option value="Kenya">Kenya</option>
<option value="Rwanda">Rwanda</option>
<option value="South Africa">South Africa</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
</select>
</td>
</tr>

<tr>
<td>HOBBIES</td>
<td>
<input type="checkbox" name="hobbies[]" value="Drawing"> Drawing
<input type="checkbox" name="hobbies[]" value="Singing"> Singing
<input type="checkbox" name="hobbies[]" value="Dancing"> Dancing
<input type="checkbox" name="hobbies[]" value="Sketching"> Sketching
<br>
Others <input type="text" name="other_hobby" placeholder="Specify hobby">
</td>
</tr>

<!-- QUALIFICATION -->
<tr>
<td>QUALIFICATION</td>
<td>
<table class="qualification-table" border="1">
<tr>
<th>Sl.No</th>
<th>Examination</th>
<th>Board</th>
<th>Percentage</th>
<th>Year of Passing</th>
</tr>

<tr>
<td>1</td>
<td>Class X</td>
<td><input type="text" name="board1" maxlength="100"></td>
<td><input type="text" name="per1" placeholder="upto 2 decimal"></td>
<td><input type="text" name="year1" placeholder="Year"></td>
</tr>

<tr>
<td>2</td>
<td>Class XII</td>
<td><input type="text" name="board2" maxlength="100"></td>
<td><input type="text" name="per2" placeholder="upto 2 decimal"></td>
<td><input type="text" name="year2" placeholder="Year"></td>
</tr>

<tr>
<td>3</td>
<td>Graduation</td>
<td><input type="text" name="board3" maxlength="100"></td>
<td><input type="text" name="per3" placeholder="upto 2 decimal"></td>
<td><input type="text" name="year3" placeholder="Year"></td>
</tr>

<tr>
<td>4</td>
<td>Masters</td>
<td><input type="text" name="board4" maxlength="100"></td>
<td><input type="text" name="per4" placeholder="upto 2 decimal"></td>
<td><input type="text" name="year4" placeholder="Year"></td>
</tr>

</table>
<div class="small-note">(Board max 100 characters) (Percentage upto 2 decimal places)</div>
</td>
</tr>

<tr>
<td>COURSES APPLIED FOR</td>
<td>
<input type="radio" name="course" value="BCA"> BCA
<input type="radio" name="course" value="B.Com"> B.Com
<input type="radio" name="course" value="B.Sc"> B.Sc
<input type="radio" name="course" value="B.A"> B.A
</td>
</tr>

<tr>
<td></td>
<td>
<button type="submit" name="submit">Submit</button>
<button type="reset">Reset</button>
</td>
</tr>

</table>

</form>

</body>
</html>
