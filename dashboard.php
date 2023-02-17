<?php
session_start();
if($_SESSION["user"]=="" && ($_SESSION["user"]==0))
{
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="project1.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Student', 'Status'],
          ['Approved', <?php
                            $con=mysqli_connect('localhost','root','','myproject');
                            $query="select * from tbl_form where status='Y'";
                            $result=mysqli_query($con,$query);
                            $res=mysqli_num_rows($result);
                            echo $res;
                           ?>],
          ['NotApproved', <?php
                            $con=mysqli_connect('localhost','root','','myproject');
                            $query="select * from tbl_form where status='N'";
                            $result=mysqli_query($con,$query);
                            $res=mysqli_num_rows($result);
                            echo $res;
                           ?>]
         
        ]);

        var options = {
          title: ' Student deatil'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <style>

        li
        {
           height:40px;
           background-color:blue;
           display:block;
           border-bottom:1px solid grey;
           
           text-align:center;
        }
        a
        {
         text-decoration:none;
         color:white;
         
        }
        li:hover
        {
            background-color:lightblue;
        }
        a:hover
        {
            color:red;
        }
        input 
        {
            color:red;
        }
        
    </style>
</head>
<body>
    <!-----First Row--->
    <div class="header">
        <div class="container-fluid bg-info">
            <div class="row" style="min-height:150px;">
                <div class="col-sm-1"></div>
                <div class="col-sm-3 mt-5">
                    <img src="image/spilogo.png"/>
                </div>
                <div class="col-sm-5">
                    <h2 class="mt-4">Softpro Learning Center</h2>
                    <h3>A Unit Of Softpro Group Of Companies</h3>
                </div>
                <div class="col-sm-2">
                    <button  onclick="location.href='http://localhost/myproject/login.php'" class="mt-5">Admin Login</button>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
    <!--header close-->
      <div class="container-fluid bg-success">
      <div class="row">
          <div class="col-sm-3 pt-4" style="background-color:blue;height:600px;">
               
               <li><a href="admin.php">Welcome-Admin</a></li>
               <li><a href="dashboard.php">Dashboard</a></li>
               <li><a href="viewallreg.php">View All Registration</a></li>
               <li> <a href="notapproved.php">Not Approved Students</a></li>
               <li><a href="approved.php">View Approved Student</a></li>
               <li><a href="verify.php">Verify Student</a></li>
               <li> <a href="logout.php">Logout</a></li>
           </div>
           
           <div class="col-sm-9 ">
            <div class="row">
                
                    <div class="col-sm-3" >
                        <div class="well"style="background-color:#e43e31; padding:6%;text-align:center;border:10px solid white;">
                            <h3 >Registered</h3>
                            <?php
                            $con=mysqli_connect('localhost','root','','myproject');
                            $query="select * from tbl_reg";
                            $result=mysqli_query($con,$query);
                            $res=mysqli_num_rows($result);
                            echo "<h1 class='text-white'>".$res."</h1>";
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-3 " >
                        <div class="well"style="background-color:#209040; padding:6%;text-align:center;border:10px solid white;">
                          <h3  >  Approved</h3>
                           <?php
                            $con=mysqli_connect('localhost','root','','myproject');
                            $query="select * from tbl_form where status='Y'";
                            $result=mysqli_query($con,$query);
                            $res=mysqli_num_rows($result);
                            echo "<h1 class='text-white'>".$res."</h1>";
                           ?>
                        </div>
                    </div>
                    <div class="col-sm-3 " >
                        <div class="well"style="background-color:#d83b01; padding:6%;text-align:center;border:10px solid white;">
                            <h3  >not-approved</h3>
                            <?php
                            $con=mysqli_connect('localhost','root','','myproject');
                            $query="select * from tbl_form where status='N'";
                            $result=mysqli_query($con,$query);
                            $res=mysqli_num_rows($result);
                            echo "<h1 class='text-white'>".$res."</h1>";
                           ?>
                        </div>
                    </div>
                    <div class="col-sm-3 " >
                      <div class="well" style="background-color:yellow; padding:6%;text-align:center;border:10px solid white;">
                         <h3 >Reported
                         <?php
                            $con=mysqli_connect('localhost','root','','myproject');
                            $query="select * from tbl_form";
                            $result=mysqli_query($con,$query);
                            $res=mysqli_num_rows($result);
                            echo "<h1 class='text-white'>".$res."</h1>";
                           ?>
                           </h3>
                      </div>
                    </div>
                
            </div>
            <div class="row  p-2 pt-5">
                <div class="col-sm-6 bg-info p-0">
                    <div class="well" style="border:10px solid gray;">
                    <div id="piechart" style="width:100%; height:300px;"></div>
                    </div>
                </div>
                <div class="col-sm-6 p-0">
                    <div class="well"  style="border:10px solid gray;">
                    <div id="columnchart_material" style="width:100%; height:300px;"></div>
                    </div>
                </div>
            </div>
           </div>
      
           <div class="row bg-light">
                    <div class="col-sm-12">
                    <table class="table table-stripped" style=";font-family:monotype">
                        <tr>
                            <th>Name</th>
                            <th>College</th>
                            <th>Email</th>
                            <th>Contact No</th>
                        </tr>
                
                <?php
                $con=mysqli_connect("localhost","root","","myproject");
                $query="select * from tbl_reg";
                $res=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($res)){
                ?>
                    <tr>
                       <td><?php echo $row["name"];?></td>
                       <td><?php echo $row["college"];?></td>
                       <td><?php echo $row["email"];?></td>
                       <td><?php echo $row["mobile"];?></td>
                    </tr>
                <?php
                   };
                ?>
                </table>
                    </div>
                </div>

      </div>
      </div>
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Register', 'Apporved', 'not-Approved'],
          ['2023',<?php
                            $con=mysqli_connect('localhost','root','','myproject');
                            $query="select * from tbl_reg";
                            $result=mysqli_query($con,$query);
                            $res=mysqli_num_rows($result);
                            echo $res;
                            ?> , <?php
                            $con=mysqli_connect('localhost','root','','myproject');
                            $query="select * from tbl_form where status='Y'";
                            $result=mysqli_query($con,$query);
                            $res=mysqli_num_rows($result);
                            echo $res;
                           ?>, <?php
                           $con=mysqli_connect('localhost','root','','myproject');
                           $query="select * from tbl_form where status='N'";
                           $result=mysqli_query($con,$query);
                           $res=mysqli_num_rows($result);
                           echo $res;
                          ?>]
          
        ]);

        var options = {
          chart: {
            title: 'Reported',
            
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</html>