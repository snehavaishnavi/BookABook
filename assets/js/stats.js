 // This example lays out multiple interactive pie charts on a page with multiple HTML layout constructs.
      // Created by Frank Guerino : "http://www.guerino.net"

      // Data Used for this example...
     /* var dataSet1 = [
        {legendLabel: "Written", magnitude: 2, link: "http://www.if4it.com"},
        {legendLabel: "Round1", magnitude: 1, link: "http://www.if4it.com/glossary.html"},
        {legendLabel: "Round2", magnitude: 1, link: "http://www.if4it.com/resources.html"},
        {legendLabel: "Round3", magnitude: 0, link: "http://www.if4it.com/taxonomy.html"},
        {legendLabel: "Round4", magnitude: 0, link: "http://www.if4it.com/disciplines.html"},
        ];
*/     
var vis=d3.select('#linechart2').select('svg');
      function drawPie( pieName, dataSet, selectString, colors, margin, outerRadius, innerRadius, sortArcs ) {		
	// pieName => A unique drawing identifier that has no spaces, no "." and no "#" characters.
	// dataSet => Input Data for the chart, itself.
	// selectString => String that allows you to pass in
	//           a D3 select string.
	// colors => String to set color scale.  Values can be...
	//           => "colorScale10"
	//           => "colorScale20"
	//           => "colorScale20b"
	//           => "colorScale20c"
	// margin => Integer margin offset value.
	// outerRadius => Integer outer radius value.
	// innerRadius => Integer inner radius value.
	// sortArcs => Controls sorting of Arcs by value.
	//              0 = No Sort.  Maintain original order.
	//              1 = Sort by arc value size.

	// Color Scale Handling...
        var colorScale = d3.scale.category20c();
		
        switch (colors)
        {
          case "colorScale10":
            colorScale = d3.scale.category10();
            break;
          case "colorScale20":
            colorScale = d3.scale.category20();
            break;
          case "colorScale20b":
            colorScale = d3.scale.category20b();
            break;
          case "colorScale20c":
            colorScale = d3.scale.category20c();
            break;
          default:
            colorScale = d3.scale.category20c();
        };
	var colorSet=["#660000","#990000","#cc0000","#ff0000","#ff3232","#ff6666","#ff9999","#ffcccc"];
    var canvasWidth = $('.chart1').width()*2;
	
	
	var pieWidthTotal = outerRadius * 2;;
	var pieCenterX = outerRadius + margin/2;
	var pieCenterY = outerRadius + margin/2;
	var legendBulletOffset = 30;
	var legendVerticalOffset = outerRadius - margin;
	var legendTextOffset = 20;
	var textVerticalSpace = 20;

	var canvasHeight = 0;
        var pieDrivenHeight = outerRadius*2 + margin*2;
        //var legendTextDrivenHeight = (dataSet.length * textVerticalSpace) + margin*2;
		var legendTextDrivenHeight = pieDrivenHeight;
	// Autoadjust Canvas Height
	if (pieDrivenHeight >= legendTextDrivenHeight)
	{
	  canvasHeight = pieDrivenHeight;
	}
	else
	{
	  canvasHeight = legendTextDrivenHeight;
	}
	
        var x = d3.scale.linear().domain([0, d3.max(dataSet, function(d) { return d.magnitude; })]).rangeRound([0, pieWidthTotal]);
        var y = d3.scale.linear().domain([0, dataSet.length]).range([0, (dataSet.length * 20)]);
		

        var synchronizedMouseOver = function() {
          var arc = d3.select(this);
          var indexValue = arc.attr("index_value");

          var arcSelector = "." + "pie-" + pieName + "-arc-" + indexValue;
          var selectedArc = d3.selectAll(arcSelector);
          selectedArc.style("fill", "Maroon");

          /*var bulletSelector = "." + "pie-" + pieName + "-legendBullet-" + indexValue;
          var selectedLegendBullet = d3.selectAll(bulletSelector);
          selectedLegendBullet.style("fill", "Maroon");

          var textSelector = "." + "pie-" + pieName + "-legendText-" + indexValue;
          var selectedLegendText = d3.selectAll(textSelector);
          selectedLegendText.style("fill", "Maroon");*/
        };

        var synchronizedMouseOut = function() {
          var arc = d3.select(this);
          var indexValue = arc.attr("index_value");

          var arcSelector = "." + "pie-" + pieName + "-arc-" + indexValue;
          var selectedArc = d3.selectAll(arcSelector);
          var colorValue = selectedArc.attr("color_value");
          selectedArc.style("fill", colorValue);

         /* var bulletSelector = "." + "pie-" + pieName + "-legendBullet-" + indexValue;
          var selectedLegendBullet = d3.selectAll(bulletSelector);
          var colorValue = selectedLegendBullet.attr("color_value");
          selectedLegendBullet.style("fill", colorValue);

          var textSelector = "." + "pie-" + pieName + "-legendText-" + indexValue;
          var selectedLegendText = d3.selectAll(textSelector);
          selectedLegendText.style("fill", "Blue");*/
        };

        var tweenPie = function (b) {
          b.innerRadius = 0;
          var i = d3.interpolate({startAngle: 0, endAngle: 0}, b);
          return function(t) {
            return arc(i(t));
          };
        }

        // Create a drawing canvas...
        var canvas = d3.select(selectString)
          .append("svg:svg") //create the SVG element inside the <body>
            .data([dataSet]) //associate our data with the document
            .attr("width", canvasWidth) //set the width of the canvas
            .attr("height", canvasHeight) //set the height of the canvas
            .append("svg:g") //make a group to hold our pie chart
              .attr("transform", "translate(" + pieCenterX + "," + pieCenterY + ")") // Set center of pie

	// Define an arc generator. This will create <path> elements for using arc data.
        var arc = d3.svg.arc()
            .innerRadius(innerRadius) // Causes center of pie to be hollow
            .outerRadius(outerRadius);

	// Define a pie layout: the pie angle encodes the value of dataSet.
	// Since our data is in the form of a post-parsed CSV string, the
	// values are Strings which we coerce to Numbers.
        var pie = d3.layout.pie()
	    .value(function(d) { return d.magnitude; })
	    .sort(function(a, b) {if (sortArcs==1) { return b.magnitude - a.magnitude; } else { return null; } });

        // Select all <g> elements with class slice (there aren't any yet)
        var arcs = canvas.selectAll("g.slice")
          // Associate the generated pie data (an array of arcs, each having startAngle,
          // endAngle and value properties) 
          .data(pie)
          // This will create <g> elements for every "extra" data element that should be associated
          // with a selection. The result is creating a <g> for every object in the data array
          // Create a group to hold each slice (we will have a <path> and a <text>      // element associated with each slice)
			.enter().append("svg:a")
            .attr("xlink:href", function(d) { return d.data.link; })
            .append("svg:g")
              .attr("class", "slice")    //allow us to style things in the slices (like text)
              // Set the color for each slice to be chosen from the color function defined above
              // This creates the actual SVG path using the associated data (pie) with the arc drawing function
              .style("stroke", "White" )
              .attr("d", arc);

        arcs.append("svg:path")
          // Set the color for each slice to be chosen from the color function defined above
          // This creates the actual SVG path using the associated data (pie) with the arc drawing function
          .attr("fill", function(d, i) { return colorSet[i]; /*alert(d.color);return d.color; */} )
          .attr("color_value", function(d, i) { return colorSet[i];/*return d.color; */}) // Bar fill color...
          .attr("index_value", function(d, i) { return "index-" + i; })
          .attr("class", function(d, i) { return "pie-" + pieName + "-arc-index-" + i; })
          .style("stroke", "White" )
          .attr("d", arc)
          .on('mouseover', synchronizedMouseOver)
          .on("mouseout", synchronizedMouseOut)
          .transition()
            .ease("bounce")
            .duration(2000)
            .delay(function(d, i) { return i * 50; })
            .attrTween("d", tweenPie);

        // Add a magnitude value to the larger arcs, translated to the arc centroid and rotated.
        arcs.filter(function(d) { return d.endAngle - d.startAngle > .2; }).append("svg:text")
          .attr("dy", ".35em")
          .attr("text-anchor", "middle")
          //.attr("transform", function(d) { return "translate(" + arc.centroid(d) + ")rotate(" + angle(d) + ")"; })
          .attr("transform", function(d) { //set the label's origin to the center of the arc
            //we have to make sure to set these before calling arc.centroid
            d.outerRadius = outerRadius; // Set Outer Coordinate
            d.innerRadius = innerRadius; // Set Inner Coordinate
            return "translate(" + arc.centroid(d) + ")rotate(" + angle(d) + ")";
          })
          .style("fill", "White")
          .style("font", "11px Arial")
          .text(function(d) { return d.data.magnitude; });

        // Computes the angle of an arc, converting from radians to degrees.
        function angle(d) {
          var a = (d.startAngle + d.endAngle) * 90 / Math.PI - 90;
          return a > 90 ? a - 180 : a;
        }

        // Plot the bullet circles...
      /*  canvas.selectAll("circle")
          .data(dataSet).enter().append("svg:circle") // Append circle elements
          .attr("cx", pieWidthTotal + legendBulletOffset)
          .attr("cy", function(d, i) { return i*textVerticalSpace - legendVerticalOffset; } )
          .attr("stroke-width", ".5")
          .style("fill", function(d, i) { return colorScale(i); }) // Bullet fill color
          .attr("r", 5)
          .attr("color_value", function(d, i) { return colorScale(i); }) // Bar fill color...
          .attr("index_value", function(d, i) { return "index-" + i; })
          .attr("class", function(d, i) { return "pie-" + pieName + "-legendBullet-index-" + i; })
          .on('mouseover', synchronizedMouseOver)
          .on("mouseout", synchronizedMouseOut);
*/
        // Create hyper linked text at right that acts as label key...
        /*canvas.selectAll("a.legend_link")
          .data(dataSet) // Instruct to bind dataSet to text elements
          .enter().append("svg:a") // Append legend elements
            .attr("xlink:href", function(d) { return d.link; })
            .append("text")
              .attr("text-anchor", "center")
              .attr("x", pieWidthTotal + legendBulletOffset + legendTextOffset)
              //.attr("y", function(d, i) { return legendOffset + i*20 - 10; })
          //.attr("cy", function(d, i) {    return i*textVerticalSpace - legendVerticalOffset; } )
              .attr("y", function(d, i) { return i*textVerticalSpace - legendVerticalOffset; } )
              .attr("dx", 0)
              .attr("dy", "5px") // Controls padding to place text in alignment with bullets
              .text(function(d) { return d.legendLabel;})
              .attr("color_value", function(d, i) { return colorScale(i); }) // Bar fill color...
              .attr("index_value", function(d, i) { return "index-" + i; })
              .attr("class", function(d, i) { return "pie-" + pieName + "-legendText-index-" + i; })
              .style("fill", "Blue")
              .style("font", "normal 1.5em Arial")
              .on('mouseover', synchronizedMouseOver)
              .on("mouseout", synchronizedMouseOut);
*/
      };
	function drawLineChart(lineData,selectString)
	{			
			var total = lineData[0].w;
		    var lineData = lineData;	
			var rounds=new Array();
			for(var i=1;i<=total;i++)
			{
				rounds[i]=lineData[i].j;
				//alert(rounds[i]);
			}
			var WIDTH = $("#linechart2").width();			
			var vis = d3.select(selectString).append("svg").attr("width",WIDTH).attr("height",220).attr('transform', 'translate(0 ,20)'),
			HEIGHT = 200,
			MARGINS = {
			  top: 20,
			  right: 30,
			  bottom: 20,
			  left: 30
			},			
			/*xRange = d3.scale.linear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([d3.min(lineData, function(d) {
			  return d.x;
			}), d3.max(lineData, function(d) {
			  return d.x;
			})]),*/
			xRange = d3.scale.linear().range([MARGINS.left, WIDTH - MARGINS.right]).domain([0,8]),
			yRange = d3.scale.linear().range([HEIGHT - MARGINS.top, MARGINS.bottom]).domain([0, d3.max(lineData, function(d) {
			  return d.y+15;
			})]),
			xAxis = d3.svg.axis()
			  .scale(xRange)
			  /*.tickFormat(function(d,i) { if(i==0){return "";}else if(i==1){ return "WT";}else if(i==2){return "VR";}else if(i==3){return "TR1"}else if(i==4){return "TR2"}else if(i==5){return "CR"}else if(i==6){return "Ons."}else if(i==7){return "M.D"}else if(i==8){return "HR"}else{return "R"+(i-1);} })*/
			  .tickFormat(function(d,i) { return rounds[i];})
			  .tickSize(1)
			  .tickSubdivide(false),
			yAxis = d3.svg.axis()
			  .scale(yRange)
			  .tickSize(1)
			  .orient('left')
			  .tickSubdivide(true)
			  .ticks(6);
		 
		vis.append('svg:g')
		  .attr('class', 'x axis')
		  .attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
		  .style('stroke', '#666666')
		  .style('opacity','0.7')
		  .style('font-size',function(d){if(WIDTH<400){return "9px";}else{ return "11px";}})
		  .call(xAxis);
		 
		vis.append('svg:g')
		  .attr('class', 'y axis')
		  .attr('transform', 'translate(' + (MARGINS.left) + ',0)')
		  .style('font-size',function(d){if(WIDTH<400){return "9px";}else{ return "11px";}})
		  .style('opacity','0.7')
		  .call(yAxis)
		  .style('stroke', '#666666');
		  vis.append("g")            
				.attr("class", "grid")
				.attr('transform', 'translate(0,' + (HEIGHT - MARGINS.bottom) + ')')
				.call(xAxis
					.tickSize(-HEIGHT+40, 0, 0)
					.tickFormat("")
				);
			vis.append("g")            
				.attr("class", "grid")
				.attr('transform', 'translate(' + (MARGINS.left) + ',0)')
				.call(yAxis
					.tickSize(-WIDTH+60, 0, 0)
					.tickFormat("")
				);
		  var lineFunc = d3.svg.line()
		  .x(function(d) {
			return xRange(d.x);
		  })
		  .y(function(d) {if(d.y>0){
			return yRange(d.y);}
		  })
		  .interpolate('linear');
		 var path1 = vis.append('svg:path')
		  .attr('d', lineFunc(lineData))
		  .attr('stroke', 'steelblue')		  
		  .attr('stroke-width', 1.5)
		  .attr('fill', 'none');
		  vis.selectAll("circle.line2")
				.data(lineData)
				.enter().append("svg:circle")
				.attr("class", "line")
				.style("fill", "none")
				.style("stroke", "steelblue")
				.style("stroke-width", 2.5)
				.attr("cx", lineFunc.x())
				.attr("cy", lineFunc.y())
				.attr("r", 0.1);
			var circles = vis.selectAll(".line");
			circles.each(function(d,i){if(i>0 && d.y>0){var xa=d3.select(this).attr("cx");var ya=d3.select(this).attr("cy");var font=14;
			if(WIDTH<400){xa=xa-10;font=9;}else{xa=xa-50;}
			vis.append('foreignObject').attr('x', xa).attr('y', ya-30).attr('width', 150).attr('height', 100).append("xhtml:body").attr("style","background:rgba(0,0,0,0)")
								.html('<div style="width: 150px;"><i class="fa fa-clock-o fa-1x text-warning" ></i><strong><b style="font-size:'+font+'px">&nbsp;'+d.w+'&nbsp;&nbsp;</b></strong><br/><i class="fa fa-times-circle fa-1x text-danger"></i><strong><b style="font-size:'+font+'px">&nbsp;'+d.r+'</b></strong></div>');
			}
			});
			var totalLength = path1.node().getTotalLength();
		path1
        .attr("stroke-dasharray", totalLength+","+totalLength)
        .attr("stroke-dashoffset", totalLength)
        .transition()
        .duration(2000)
        .ease("linear-in-out")
        .attr("stroke-dashoffset", 0);
		
	
	}
	/*$(window).resize(function() {
			//location.href=location.href;
		  var width = $("#linechart2").width();
		  //alert(width);
		  
		  var aspect = 1/2;
		  
		  var height = width * aspect;
		  
		  vis.attr("width", width);
		 //vis.attr("height", height);
		 
		 
	});*/