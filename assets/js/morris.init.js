$(document).ready(function () {
    $.ajax({
        url: '../user_operation/appointmentchart',
        dataType: 'json',
        success: function (data) {

            var list = [];
            for (var i = 0; i <= data.length - 1; i++) {
                list[i] = { y: data[i].month, a: data[i].total };
            }

            Morris.Bar({
                element: 'morris-bar-chart',
                data: list,
                xkey: 'y',
                ykeys: ['a'],
                labels: ['Total Appointment'],
                gridLineColor: '#eef0f2',
                barSizeRatio: 0.4,
                xLabelAngle: 35,
                resize: true,
                hideHover: 'auto',
                barColors: ['#77D0AA']
            });
        },
        error: function (data) {
            console.log(data);
        }
    });
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [
            { y: 'April', a: 1 },
            { y: 'Mei', a: 2 },
            { y: 'Juni', a: 1 }
        ],
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Total Appointment'],
        gridLineColor: '#eef0f2',
        barSizeRatio: 0.4,
        xLabelAngle: 35,
        resize: true,
        hideHover: 'auto',
        barColors: ['#5a9b81']
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [
            { label: "Lunas", value: 1 }
        ],
        resize: true,
        colors: ['#77D0AA', '#707070']
    });
});