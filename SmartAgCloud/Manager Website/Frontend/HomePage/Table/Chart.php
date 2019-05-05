<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "completedata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql1 = "SELECT * FROM data where SensorHealth = 1";
$result1 = $conn->query($sql1);
$sql2 = "SELECT * FROM data where SensorHealth = 0";
$result2 = $conn->query($sql2);
$sql3 = "SELECT * FROM data where NodeHealth = 1";
$result3 = $conn->query($sql3);
$sql4 = "SELECT * FROM data where NodeHealth = 0";
$result4 = $conn->query($sql4);
$sql5 = "SELECT * FROM data where ClusterHealth = 1";
$result5 = $conn->query($sql5);
$sql6 = "SELECT * FROM data where ClusterHealth = 0";
$result6 = $conn->query($sql6);
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(sensordrawChart);
      google.charts.setOnLoadCallback(nodedrawChart);
      google.charts.setOnLoadCallback(clusterdrawChart);
      function sensordrawChart() {
        var sensordata = google.visualization.arrayToDataTable([
          ['Status', 'Count'],
          ['Good',<?php echo $result1->num_rows; ?>],
          ['Bad',<?php echo $result2->num_rows; ?>]
        ]);
        var SensorOptions = {
          title: 'Sensor Health Status',
          width:400,
          height:300,
          is3D: true
        };
        var chart = new google.visualization.PieChart(document.getElementById('sensor_div'));
        chart.draw(sensordata, SensorOptions);
      }
      function nodedrawChart() {
        var nodedata = google.visualization.arrayToDataTable([
          ['Status', 'Count'],
          ['Good',<?php echo $result3->num_rows; ?>],
          ['Bad',<?php echo $result4->num_rows; ?>]
        ]);
        var NodeOptions = {
          title: 'Node Health Status',
          width:400,
          height:300,
          is3D: true
        };
        var chart = new google.visualization.PieChart(document.getElementById('node_div'));
        chart.draw(nodedata, NodeOptions);
      }
      function clusterdrawChart() {
        var clusterdata = google.visualization.arrayToDataTable([
          ['Status', 'Count'],
          ['Good',<?php echo $result5->num_rows; ?>],
          ['Bad',<?php echo $result6->num_rows; ?>]
        ]);
        var NodeOptions = {
          title: 'Cluster Health Status',
          width:400,
          height:300,
          is3D: true
        };
        var chart = new google.visualization.PieChart(document.getElementById('cluster_div'));
        chart.draw(clusterdata, NodeOptions);
      }
    </script>
  </head>
  <body>
   <!-- <div id="piechart_3d" style="width: 900px; height: 500px;"></div> -->
    <table class="columns">
      <tr>
        <td><div id="sensor_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="node_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="cluster_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
  </body>
</html>
