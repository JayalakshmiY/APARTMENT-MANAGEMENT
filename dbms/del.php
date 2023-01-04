    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <div class="input-group mb-3">
        <form method="post">
            <input type="text" name="input" id="live_search"   placeholder="Search">
            <button name="submit" type="submit">search</button>
          </div>  </form>
          <table class="table">
<thead>

        <tr>
        <th> Employee Number</th>
        <th> Employee Name</th>
        <th> Department Number</th>
        <th> Salary</th>
        <th> Hiredate</th>
        <th> Gender</th>
        </tr>
</thead>
<tbody>
<?php
  $server="localhost";
  $user="root";
  $password="";
  $database="login";
  $connection=new mysqli($server,$user,$password,$database);
  if($connection->connect_error){
      die("connection failed:".$connection->connect_error);
  }
    if(isset($_POST['submit'])){
    $input=$_POST['input'];
    $sql="select * from employee where `ename` like '{$input}%' OR `eno` like '{$input}%' OR `gender` like '{$input}%' OR `hiredate` like '{$input}%';";
    $result=$connection->query($sql);
    if(!$result){
        die("Invalid query:".$connection->error);
    }
    while($row=$result->fetch_assoc()){
        echo " <tr>
        <td>".$row["eno"]."</td>
        <td>".$row["ename"]."</td>
        <td>".$row["dnum"]."</td>
        <td>".$row["salary"]."</td>
        <td>".$row["hiredate"]."</td>
        <td>".$row["gender"]."</td>
       </tr> ";
    }
}
    ?>
    </tbody>
    </table>
    </body>
    </html>