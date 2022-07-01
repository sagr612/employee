<?php
    require_once 'emp_header.php';
    require "database.php";
    session_start();
    if( !$_SESSION['e_login']){
        $_SESSION['a_login']=false;
        header("Location:index.php");
        exit();
    }
    $id = $_SESSION['id'];
    $sql="SELECT * FROM employee WHERE id ='$id' ";
    $result=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    
    $name=$row['name'];
    $dob=$row['DOB'];
    $fname=$row['FatherName'];
    $salary=$row['Salary'];

    echo "<table>";
    echo "<tr><th> Employee Name :- </th><td>".$name."</td></tr> ";

    echo "<tr><th> Employee id :-  </th><td>".$id."</td></tr>";

    echo "<tr><th> Date of birth :- </th><td>".$dob."</td></tr>";

    echo "<tr><th> Father's Name :- </th><td>".$fname."</td></tr>";

    echo "<tr><th> Salary :- </th><td>".$salary."</td></tr>";



    $q1="SELECT * FROM marks where id='$id' ";
    $r1=mysqli_query($conn,$q1);
    $num=mysqli_num_rows($r1);

    while($row1=mysqli_fetch_assoc($r1)){
        echo "<tr><td colspan=2>In ".$row1['city'].", mobile number was ".$row1['phone']." while working on ".$row1['project']."</td></tr>";
        
    }
    echo "</table>";
?>

<!-- </div> -->

<?php
    require_once 'footer.php';
?>
