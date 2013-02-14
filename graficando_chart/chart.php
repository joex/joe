<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highstock Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(document).ready(function(){

$("#busca").click(function(){

est=$("#selectestado :selected").val();



$.post("ajaxchart.php",{ esta:est},function(data){

/*
data=[ [ Date.UTC(2012, 4, 11, 9, 30),5 ], 
[ Date.UTC(2012, 4, 11, 10), 1 ], 
[ Date.UTC(2012, 4, 11, 10, 30), 1 ],
[ Date.UTC(2012, 4, 11, 10, 40), 6 ], 
[ Date.UTC(2012, 4, 11, 10,50), 2], 
[ Date.UTC(2012, 4, 11, 11, 01), 8 ],
[ Date.UTC(2012, 4, 11,11, 07), 1 ], 
[ Date.UTC(2012, 4, 11, 11,15), 7 ], 
[ Date.UTC(2012, 4, 11, 12), 2],
[ Date.UTC(2012, 4, 11, 12, 30), 0 ], 
[ Date.UTC(2012, 4, 11, 12,33), 1 ],
[ Date.UTC(2012, 4, 11, 13, 30), 8 ]
]
*/
		
		window.chart = new Highcharts.StockChart({
			chart : {
				renderTo : 'container',
				zoomType: 'x'
				
				
				
				
			},

			rangeSelector : {
				selected : 1
			},

			title : {
				text : 'AAPL Stock Price'
			},
			
			series : [{
				name : 'AAPL',
				data : data,
				tooltip: {
					valueDecimals: 2
				}
			}]
		});
		
		alert("OK");
		

},"json");

});

/*
var int=self.setInterval(function(){clock()},5000);
function clock()
  { var d=new Date();
  var t=d.toLocaleTimeString();
  document.getElementById("clock").value=t;
 var x = (new Date()).getTime(), // current time
						y = Math.round(Math.random() * 10);
						chart.series[0].addPoint([x, y], true, true);
					//	chart.series[0].addPoint([x, y], true, true);
  }
  */
	
	
	});
	
	
	
	/*
		// Create the chart
		window.chart = new Highcharts.StockChart({
			chart : {
				renderTo : 'container',
				zoomType: 'x'
			}
			rangeSelector : {
				selected : 1
			},
			title : {
				text : 'AAPL Stock Price'
			},
			series : [{
				name : 'AAPL',
				data : data,
				tooltip: {
					valueDecimals: 2
				}
			}]
		});
		
		*/
		
	



		</script>
		
	
	</head>
	<body>
<script src="http://code.highcharts.com/stock/highstock.js"></script>
<script src="http://code.highcharts.com/stock/modules/exporting.js"></script>

<form action="NOINTERESA.php"  id="registro_mp" name="myForm">
<select name="estado" id="selectestado">
<option value='-6'>-6</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='22'>22</option>


<input type="button" value="BUSCA" id="busca">
</select>

</form>


<div id="container" style="height: 500px; min-width: 500px"></div>


	</body>
</html>
