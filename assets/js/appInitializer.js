var dataSet1;
	$(function() {
		$.get('index.php?op=activities', function(data) {
		  $('#activity').html(data);
		});
	});
	
	/*$(function() {

	 
		$.get('index.php?op=panels', function(data) {
		  $('#panels').html(data);
		});

	});*/
	
	$(function() {

  setInterval(function() {
    $.get('index.php?op=activities', function(data) {
      $('#activity').html(data);
    });
  }, 5 * 1000);

});


/*$(function() {

  setInterval(function() {
    $.get('index.php?op=panels', function(data) {		;
      $('#panels').html(data);
    });
  }, 5 * 1000);
  }); */
$.get('index.php?op=panelspie', function(data) {    
		//alert(data);
	  dataSet1=jQuery.parseJSON(data);	  
	  d3.select(".chart1 svg").remove();
	  drawPie("Pie1", dataSet1, "#pie_chart_1 .chart1", "colorScale20", 10, 90, 10, 0);
    });
 
setInterval(function() {
    $.get('index.php?op=panelspie', function(data) {    
		//alert(data);
	  dataSet1=jQuery.parseJSON(data);	  
	  d3.select(".chart1 svg").remove();
	  drawPie("Pie1", dataSet1, "#pie_chart_1 .chart1", "colorScale20", 10, 90, 10, 0);
    });
  }, 10 * 1000);
  
 $.get('index.php?op=linechart', function(data2) {
		//alert(data2);
	  dataSet2=jQuery.parseJSON(data2);			
	  d3.select("#linechart2 svg").remove();
	  drawLineChart(dataSet2,"#linechart2");
    });
var resizeTimeout;
function updateLineChart(){
 clearTimeout(resizeTimeout);
        // handle normal resize
        resizeTimeout = setTimeout(function() {
			$.get('index.php?op=linechart', function(data2) {
				//alert(data2);
			  dataSet2=jQuery.parseJSON(data2);			
			  d3.select("#linechart2 svg").remove();
			  drawLineChart(dataSet2,"#linechart2");
			});
            // handle after finished resize
        }, 1000); // set for 1/4 second.  May need to be adjusted.

}
window.onresize=updateLineChart;
setInterval(function() {
    $.get('index.php?op=linechart', function(data2) {
		//alert(data2);
	  dataSet2=jQuery.parseJSON(data2);			
	  d3.select("#linechart2 svg").remove();
	  drawLineChart(dataSet2,"#linechart2");
    });
  }, 10 * 1000);
$("#ex1").slider();
$("#ex1").on("slide", function(slideEvt) {
	$("#ex6SliderVal").text(slideEvt.value);
})