<?php
    require_once 'admin_header.php';
    require "database.php";
    session_start();
    if( !$_SESSION['a_login']){
        $_SESSION['e_login']=false;
        header("Location:index.php");
        exit();
    }
    $id = $_SESSION['id'];
    $sql="SELECT * FROM employee ";
    $result=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);
    // echo $rowcount;
    if($rowcount>0){
        echo "<table>";
        echo "<tr><th> Employee id </th>";
        echo "<th> Employee Name </th>";
        echo "<th> Date of birth</th>";
        echo "<th> Father's Name</th>";
        echo " <th> Password </th>";
        echo " <th> Department </th>";
        echo "<th> Salary </th></tr> ";
    
        while($row1=mysqli_fetch_assoc($result)){
            $l=strlen($row1['Password']);
            $p=substr($row1['Password'],0,$l-4);
            echo "<tr> ";
            echo "<td>".$row1['id']."</td>";
            echo "<td>".$row1['name']."</td>";
            echo "<td>".$row1['DOB']."</td>";
            echo "<td>".$row1['FatherName']."</td>";
            echo "<td>".$p."</td>";
            echo "<td>".$row1['department']."</td>";
            echo "<td>".$row1['Salary']."</td>";
            echo "</tr>";
            
        }
        echo "</table>";
    }
   
?>

<?php
    require_once 'footer.php';
?>
