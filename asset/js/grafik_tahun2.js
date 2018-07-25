$(document).ready
(
    function(){
        var options = {
            chart2: {
                renderTo: 'container2',
                type: 'line'
            },
            title: {
                text: 'Jumlah Talent Member',
                x: -20 //center
            },
            subtitle: {
                text: 'Berdasarkan Minggu',
                x: -20
            },
            xAxis: {
                title: {
                    text: 'Minggu'
                }
            },
            yAxis: {
                title: {
                    text: 'Jumlah Member'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                    return '<b>Minggu '+ this.x +'</b><br/>'+
                        this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: []
        };
        $.getJSON(data_member_url2, function(json) {
            options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
            options.series[0] = json[1];
            chart2 = new Highcharts.Chart(options);
        });
    });