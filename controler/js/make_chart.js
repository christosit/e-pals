

$(document).ready(function(){//Users
   $('.make_chart').click(function(){
       console.log("hi");

       $.ajax({
           type: "POST",
           url: '../model/admin_functions.php',
           data: {
               choice: 4
           },
           success: function(data) {
                console.log(data);
                show_chart(data)
           }
       });
   });


    $('.make_chart2').click(function(){//Interests
       console.log("hi2");

       $.ajax({
           type: "POST",
           url: '../model/admin_functions.php',
           data: {
               choice: 3
           },
           success: function(data) {
                console.log(data);
               //var obj = jQuery.parseJSON(data);
               show_chart2(data);
               //Get context with jQuery - using jQuery's .get() method.
               //This will get the first returned node in the jQuery collection.

              // new Chart(ctx).Doughnut(data);

           }
       });
   });
   });






function show_chart(data){
    var ctx = $(".myChart").get(0).getContext("2d");

    //pie chart data
    //sum of values = 360
    var chart_data = $.parseJSON(data);
    var line_data = {
        labels: ["January", "February", "March", "April", "May", "June", "July","August","September", "October", "November", "December"],
        datasets: [
            {
                label: "User Subscription",
                multiTooltipTemplate: "Hello",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: chart_data.datasets.data
            }
        ]
    };

    //draw
    //var piechart = new Chart(ctx);
   // new Chart(ctx).Pie(chart_data);
    console.log(line_data );

   // var piechart = new Chart(ctx).Line(chart_data);
        var piechart = new Chart(ctx).Bar(line_data,{
            graphTitle:"Fuck"
        });

    var legendHolder = document.createElement('div');
    legendHolder.innerHTML = piechart.generateLegend();
    document.getElementById('legend').appendChild(legendHolder.firstChild);

}

function show_chart2(data){
    var ctx = $(".myChart2").get(0).getContext("2d");
var chart_data = $.parseJSON(data);
    var newopts = {
        inGraphDataShow: true,
        inGraphDataRadiusPosition: 4,
        inGraphDataFontColor: 'black'
    };

    //var obj = jQuery.parseJSON(data);







  /*  var chart_data = [
        {
            value: 270,
            color: "cornflowerblue",
            highlight: "lightskyblue",
            label: "Corn Flower Blue"
        },
        {
            value: 50,
            color: "lightgreen",
            highlight: "yellowgreen",
            label: "Lightgreen"
        },
        {
            value: 40,
            color: "orange",
            highlight: "darkorange",
            label: "Orange"
        }
    ];

*/
  //  var dataArr = [];
  //  dataArr.push(data);

   // console.log( JSON.stringify(chart_data));
//draw
    //var piechart = new Chart(ctx);
   // new Chart(ctx).Pie(chart_data);
console.log("Type = "+typeof chart_data );
    var piechart = new Chart(ctx).Pie(chart_data,newopts);

    var legendHolder = document.createElement('div');
    legendHolder.innerHTML = piechart.generateLegend();
    document.getElementById('legend').appendChild(legendHolder.firstChild);
}
