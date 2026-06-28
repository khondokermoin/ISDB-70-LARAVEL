/*
Template Name: Nazox -  Admin & Dashboard Template
Author: Themesdesign
Contact: themesdesign.in@gmail.com
File: Dashboard Init Js File
*/

// Line-column chart

const optionsLine = {
    series: [{
        name: '2020',
        type: 'column',
        data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
    }, {
        name: '2019',
        type: 'line',
        data: [23, 32, 27, 38, 27, 32, 27, 38, 22, 31, 21, 16]
    }],
    chart: {
        height: 280,
        type: 'line',
        toolbar: {
            show: false,
        }
    },
    stroke: {
        width: [0, 3],
        curve: 'smooth'
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '20%',
        },
    },
    dataLabels: {
        enabled: false,
    },

    legend: {
        show: false,
    },
    colors: ['#5664d2', '#1cbb8c'],
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
};

const chartLine = new ApexCharts(document.querySelector("#line-column-chart"), optionsLine);
chartLine.render();

// donut chart

const optionsDonut = {
    series: [42, 26, 15],
    chart: {
        height: 250,
        type: 'donut',
    },
    labels: ["Product A", "Product B", "Product C"],
    plotOptions: {
        pie: {
            donut: {
                size: '75%'
            }
        }
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        show: false,
    },
    colors: ['#5664d2', '#1cbb8c', '#eeb902'],

};

const chartDonut = new ApexCharts(document.querySelector("#donut-chart"), optionsDonut);
chartDonut.render();


// Radialchart 1

const radialoptions1 = {
    series: [72],
    chart: {
        type: 'radialBar',
        wight: 60,
        height: 60,
        sparkline: {
            enabled: true
        }
    },
    dataLabels: {
        enabled: false
    },
    colors: ['#5664d2'],
    stroke: {
        lineCap: 'round'
    },
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: '70%'
            },
            track: {
                margin: 0,
            },

            dataLabels: {
                show: false
            }
        }
    }
};

const radialchart1 = new ApexCharts(document.querySelector("#radialchart-1"), radialoptions1);
radialchart1.render();


// Radialchart 2

const radialoptions2 = {
    series: [65],
    chart: {
        type: 'radialBar',
        wight: 60,
        height: 60,
        sparkline: {
            enabled: true
        }
    },
    dataLabels: {
        enabled: false
    },
    colors: ['#1cbb8c'],
    stroke: {
        lineCap: 'round'
    },
    plotOptions: {
        radialBar: {
            hollow: {
                margin: 0,
                size: '70%'
            },
            track: {
                margin: 0,
            },

            dataLabels: {
                show: false
            }
        }
    }
};

const radialchart2 = new ApexCharts(document.querySelector("#radialchart-2"), radialoptions2);
radialchart2.render();


// sparkline chart

const optionsSpark = {
    series: [{
        data: [23, 32, 27, 38, 27, 32, 27, 34, 26, 31, 28]
    }],
    chart: {
        type: 'line',
        width: 80,
        height: 35,
        sparkline: {
            enabled: true
        }
    },
    stroke: {
        width: [3],
        curve: 'smooth'
    },
    colors: ['#5664d2'],

    tooltip: {
        fixed: {
            enabled: false
        },
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (seriesName) {
                    return ''
                }
            }
        },
        marker: {
            show: false
        }
    }
};

const chartSpark = new ApexCharts(document.querySelector("#spak-chart1"), optionsSpark);
chartSpark.render();


const optionsSpark2 = {
    series: [{
        data: [24, 62, 42, 84, 63, 25, 44, 46, 54, 28, 54]
    }],
    chart: {
        type: 'line',
        width: 80,
        height: 35,
        sparkline: {
            enabled: true
        }
    },
    stroke: {
        width: [3],
        curve: 'smooth'
    },
    colors: ['#5664d2'],
    tooltip: {
        fixed: {
            enabled: false
        },
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (seriesName) {
                    return ''
                }
            }
        },
        marker: {
            show: false
        }
    }
};

const chartSpark2 = new ApexCharts(document.querySelector("#spak-chart2"), optionsSpark2);
chartSpark2.render();


const optionsSpark3 = {
    series: [{
        data: [42, 31, 42, 34, 46, 38, 44, 36, 42, 32, 54]
    }],
    chart: {
        type: 'line',
        width: 80,
        height: 35,
        sparkline: {
            enabled: true
        }
    },
    stroke: {
        width: [3],
        curve: 'smooth'
    },
    colors: ['#5664d2'],
    tooltip: {
        fixed: {
            enabled: false
        },
        x: {
            show: false
        },
        y: {
            title: {
                formatter: function (seriesName) {
                    return ''
                }
            }
        },
        marker: {
            show: false
        }
    }
};

const chartSpark3 = new ApexCharts(document.querySelector("#spak-chart3"), optionsSpark3);
chartSpark3.render();

// vectormap

$('#usa-vectormap').vectorMap({
    map: 'us_merc_en',
    backgroundColor: 'transparent',
    regionStyle: {
        initial: {
            fill: '#e8ecf4',
            stroke: '#74788d',
            'stroke-width': 1,
            "stroke-opacity": 0.4,
        }
    },

});



// datatable
$(document).ready(function () {
    $('.datatable').DataTable({
        "lengthMenu": [5, 10, 25, 50],
        "pageLength": 5,
        "columns": [
            {'orderable': false},
            {'orderable': true},
            {'orderable': true},
            {'orderable': true},
            {'orderable': true},
            {'orderable': true},
            {'orderable': false}
        ],
        "order": [[ 1, "asc" ]],
        "language": {
            "paginate": {
                "previous": "<i class='mdi mdi-chevron-left'>",
                "next": "<i class='mdi mdi-chevron-right'>"
            }
        },
        "drawCallback": function () {
            $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
        }
    });

    $(".dataTables_length select").addClass('form-select form-select-sm');
});