<?php
require "api.php";
?>
<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#00cb00" />
    <!-- Link rels -->
    <link rel="stylesheet" href="stocks.css">
    <!-- search bar icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <body style="background-color: black;">
        <div class="everything-stocks-container">
            <h3>Search stocks </h3>

            <div class="top-search-container">

            <div class="searchInputWrapper">
                <input class="searchInput" id="myInput" onkeyup="myFunction()" type="text" placeholder='focus here to search'>
                <i class="searchInputIcon fa fa-search"></i>
                </input>
            </div>
            </div>
            <br>
            <br>

<div id="myUl">
            <?php
            
for($i=0; $i<count($stocks); $i++){
    $asset_name=$stocks[$i]['code'];
    $asset_change=round($stocks[$i]['change_p'],3);
    $asset_price=$stocks[$i]['close'];
    $time=$stocks[$i]['time'];
    $closes=$stocks[$i]['closes'];
    $dip=$stocks[$i]['dip'];
    $stock_name=$stock_names[$i];
    ?>
<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
// Set Data
var data = google.visualization.arrayToDataTable([
  ['Date', 'Price'],
  <?php
            for ($j = 0; $j < count($time); $j++) {
              echo "['" . $time[$j] . "', " . $closes[$j] . "],";
            }
          ?>
]);
// Set Options
var options = {
  title: '',
  hAxis: {title: '',gridlines: {
        color: 'transparent',
      },
    textPosition: 'none'},
  vAxis: {title: '',gridlines: {
        color: 'transparent'
      },
    textPosition: 'none'},
  legend: 'none',
  backgroundColor: {fill:'transparent'},
  fontColor: "transparent",
  <?php if ($dip) { echo "colors: ['red'],"; }else{echo "colors: ['#00cb00'],";} ?>
  
  
};
// Draw
var chart = new google.visualization.LineChart(document.getElementById('myChart-<?php echo $asset_name; ?>'));
chart.draw(data, options);
}
</script>
        <!--beginning of loop -->
        <a href="view-chart.php?tick=<?php echo $asset_name; ?>">
        <div class="stock_containers">
            <div class="stock-name_containers">
            <h4><?php echo $asset_name; ?></h4>
            <p><?php echo $stock_name; ?></p>
            </div>

            <div class="stock-graph_template">
            <div id="myChart-<?php echo $asset_name; ?>" style="width:80px; max-width:80px; height:80px; margin-top:-20px"></div>
            </div>

            <div class="stock-numbers_container">
                <h4><?php echo $asset_price; ?></h4>
               

               <div class="percentage <?php if($asset_change<0){echo 'bg-danger';} ?>" >
               <?php echo $asset_change; ?>%
            </div>
            </div>
            

            </div>
</a>

<!--end of loop -->
<?php
}

?>
            
<style>
    .stock-numbers_container .percentage {
        margin-top: 0px;
    }
</style>
</div>
           
        </div>


    </body>
    <script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUl");
  li = ul.getElementsByClassName('stock_containers');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("stock-name_containers")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
</html>
