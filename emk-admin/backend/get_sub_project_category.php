<?php
include('../db_connection.php');

$output = '';
$output .= '<label for="exampleFormControlInput1" class="form-label">Sub Project Category</label>
 <select required type="text" name="sub_project_title_id" class="form-control" id="sub_project_title_id" >
     <option value=""></option>';
 
     $sql = "SELECT * FROM sub_project_title WHERE main_project_title_id='".$_POST['id']."'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {
            $output .= '
            <option value="'.$row['id'].'">'.$row['name'].'</option>
            ';
           }
     }
     
 $output .= '</select>';

 echo $output;