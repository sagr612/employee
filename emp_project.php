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
    $sql="SELECT * FROM project WHERE id ='$id' ";
    $result=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);
    if($rowcount>0){
        echo "<table>";
        echo "<tr><th> Employee id </th>";
        echo "<th> Project Name </th>";
        echo " <th> Project Supervisor </th>";
        echo "</tr> ";
    
        while($row1=mysqli_fetch_assoc($result)){
            echo "<tr> ";
            echo "<td>".$row1['id']."</td>";
            echo "<td>".$row1['pname']."</td>";
            echo "<td>".$row1['dep']."</td>";
            echo "</tr>";
            
        }
        echo "</table>";
    }
    
        
    
?>


<?php
    require_once 'footer.php';
?>
