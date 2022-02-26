$(document).ready(function () {

    getDataStatistic_1();
    getDataStatistic_2();
    getDataStatistic_3();

});

let currentTime = new Date();

function getDataStatistic_1() {
    let año_actual = currentTime.getFullYear();
    $.ajax({
        url: 'http://localhost/order/reporte/getEstadistica_1_AJAX',
        data: { año: año_actual },
        type: 'POST',
        dataType: 'json',
    }).done(function (data) {
        renderStatistic_1(data);
    });
}

function getDataStatistic_2() {
    mes_actual = currentTime.getMonth() + 1;
    $.ajax({
        url: 'http://localhost/order/reporte/getEstadistica_2_AJAX',
        data: { mes: mes_actual },
        type: 'POST',
        dataType: 'json',
    }).done(function (data) {
        renderStatistic_2(data);
    });
}

function getDataStatistic_3() {
    let year = currentTime.getFullYear()
    let años = [];
    for (let i = 4; i >= 0; i--) {
        años.push(year-i);
    }

    $.ajax({
        url: 'http://localhost/order/reporte/getEstadistica_3_AJAX',
        data: { año: años },
        type: 'POST',
        dataType: 'json',
    }).done(function (data) {
        renderStatistic_3(data);
    });
}

function renderStatistic_1(data) {
    if ($("#visit-sale-chart").length) {
        Chart.defaults.global.legend.labels.usePointStyle = true;
        var ctx = document.getElementById('visit-sale-chart').getContext("2d");

        var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
        gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
        gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
        var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

        var gradientStrokeYellow = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStrokeYellow.addColorStop(0, 'rgba(249, 232, 145, 1)');
        gradientStrokeYellow.addColorStop(1, 'rgba(255, 166, 81, 1)');
        var gradientLegendYellow = 'linear-gradient(to right, rgba(249, 232, 145, 1), rgba(255, 166, 81, 1))';

        var gradientStrokeGray = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStrokeGray.addColorStop(0, 'rgba(231, 235, 240)');
        gradientStrokeGray.addColorStop(1, 'rgba(134, 142, 150)');
        var gradientLegendGray = 'linear-gradient(to right, #e7ebf0, #868e96)';

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data['meses'],
                datasets: [
                    {
                        label: "Total Creadas",
                        borderColor: gradientStrokeViolet,
                        backgroundColor: gradientStrokeViolet,
                        hoverBackgroundColor: gradientStrokeViolet,
                        legendColor: gradientLegendViolet,
                        pointRadius: 0,
                        fill: false,
                        borderWidth: 1,
                        fill: 'origin',
                        data: data['data'][0]
                    },
                    {
                        label: "Pendientes",
                        borderColor: gradientStrokeYellow,
                        backgroundColor: gradientStrokeYellow,
                        hoverBackgroundColor: gradientStrokeYellow,
                        legendColor: gradientLegendYellow,
                        pointRadius: 0,
                        fill: false,
                        borderWidth: 1,
                        fill: 'origin',
                        data: data['data'][1]
                    },
                    {
                        label: "Cerradas",
                        borderColor: gradientStrokeGray,
                        backgroundColor: gradientStrokeGray,
                        hoverBackgroundColor: gradientStrokeGray,
                        legendColor: gradientLegendGray,
                        pointRadius: 0,
                        fill: false,
                        borderWidth: 1,
                        fill: 'origin',
                        data: data['data'][2]
                    }
                ]
            },
            options: {
                responsive: true,
                legend: false,
                legendCallback: function (chart) {
                    var text = [];
                    text.push('<ul>');
                    for (var i = 0; i < chart.data.datasets.length; i++) {
                        text.push('<li><span class="legend-dots" style="background:' +
                            chart.data.datasets[i].legendColor +
                            '"></span>');
                        if (chart.data.datasets[i].label) {
                            text.push(chart.data.datasets[i].label);
                        }
                        text.push('</li>');
                    }
                    text.push('</ul>');
                    return text.join('');
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            display: true,
                            min: 0,
                            stepSize: 10,
                            max: 50
                        },
                        gridLines: {
                            drawBorder: false,
                            color: 'rgba(235,237,242,1)',
                            zeroLineColor: 'rgba(235,237,242,1)'
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                            color: 'rgba(0,0,0,1)',
                            zeroLineColor: 'rgba(235,237,242,1)'
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "#9c9fa6",
                            autoSkip: true,
                        },
                        categoryPercentage: 0.5,
                        barPercentage: 0.5
                    }]
                }
            },
            elements: {
                point: {
                    radius: 0
                }
            }
        })
        $("#visit-sale-chart-legend").html(myChart.generateLegend());
    }
}

function renderStatistic_2(data_res) {
    var doughnutPieData = {
        datasets: [{
            data: data_res,
            backgroundColor: [
                'rgba(255, 206, 86, 0.5)',  //PENDIENTE
                'rgba(132, 217, 210, 0.5)',  //PROCESO
                'rgba(54, 162, 235, 0.5)',  //ATENDIDA
                /** ------------------------------------------ */
                'rgba(255, 159, 64, 0.5)',  //PENDIENTE
                'rgba(10, 191, 163, 0.5)',  //PROCESO
                'rgba(153, 102, 255, 0.5)', //ATENDIDA
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)',    //PENDIENTE
                'rgba(132, 217, 210, 1)',       //PROCESO
                'rgba(54, 162, 235, 1)',    //ATENDIDA
                /** ------------------------------------------ */
                'rgba(255, 159, 64, 1)',    //PENDIENTE
                'rgba(10, 191, 163, 1)',    //PROCESO
                'rgba(153, 102, 255, 1)',   //ATENDIDA
            ],
        }],

        labels: [
            'Pendiente',
            'Proceso',
            'Atendida',
        ]
    };
    var doughnutPieOptions = {
        responsive: true,
        animation: {
            animateScale: true,
            animateRotate: true
        }
    };
    if ($("#doughnutChart").length) {
        var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
        var doughnutChart = new Chart(doughnutChartCanvas, {
            type: 'doughnut',
            data: doughnutPieData,
            options: doughnutPieOptions
        });
    }
}

function renderStatistic_3(data) {
    let datasets_data = [];

    for(let valor of data["data"]){
        let dataset = {
            label: valor['tiposistema'],
            data: valor['datos'],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',  //label
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            fill: true, // 3: no fill
        };
        datasets_data.push(dataset);
    }

    var areaData = {
        labels: data['años'],
         datasets: datasets_data
    };
    var areaOptions = {
        plugins: {
            filler: {
                propagate: true
            }
        }
    }
    if ($("#areaChart").length) {
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        var areaChart = new Chart(areaChartCanvas, {
            type: 'line',
            data: areaData,
            options: areaOptions
        });
    }
}