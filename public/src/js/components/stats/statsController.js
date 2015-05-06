


statsController.$inject = [
    '$window'
];

function statsController($window) {

    $scope.menu = $window.menu;

    $scope.myGridLayoutOptions = {
        dimensions: [2,2] // specifies number of columns and rows
    };

    $scope.grids = [{bgColor: "orange"}, {bgColor: "red"}, {bgColor: "green"}, {bgColor: "yellow"}];
}

angular.module('stats')
    .controller('chartJsLineCtrl', chartJsLineCtrl)
    .controller('chartJsBarCtrl', chartJsLineCtrl)
    .controller('chartJsDoughnutCtrl', chartJsDoughnutCtrl)
    .controller('polarAreaCtrl', polarAreaCtrl)
    .controller('gaugeCtrl', gaugeCtrl)
    .controller('statsController', statsController);

statsController.$inject = [
    '$window'
];

function chartJsLineCtrl($scope) {

    // Chart.js Data
    $scope.data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Network Usage',
            fillColor: 'rgba(26,188,156,0.5)',
            strokeColor: 'rgba(26,188,156,1)',
            pointColor: 'rgba(220,220,220,1)',
            pointStrokeColor: '#fff',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [65, 59, 80, 81, 56, 55, 40]
        }, {
            label: 'CPU Load',
            fillColor: 'rgba(31,123,182,0.5)',
            strokeColor: 'rgba(31,123,182,1)',
            pointColor: 'rgba(151,187,205,1)',
            pointStrokeColor: '#fff',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(151,187,205,1)',
            data: [28, 48, 40, 19, 86, 27, 90]
        }]
    };

    // Chart.js Options
    $scope.options = {

        // Sets the chart to be responsive
        responsive: true,

        ///Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: true,

        //String - Colour of the grid lines
        scaleGridLineColor: "rgba(0,0,0,.05)",

        //Number - Width of the grid lines
        scaleGridLineWidth: 1,

        //Boolean - Whether the line is curved between points
        bezierCurve: true,

        //Number - Tension of the bezier curve between points
        bezierCurveTension: 0.4,

        //Boolean - Whether to show a dot for each point
        pointDot: true,

        //Number - Radius of each point dot in pixels
        pointDotRadius: 4,

        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth: 1,

        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius: 20,

        //Boolean - Whether to show a stroke for datasets
        datasetStroke: true,

        //Number - Pixel width of dataset stroke
        datasetStrokeWidth: 2,

        //Boolean - Whether to fill the dataset with a colour
        datasetFill: true,

        // Function - on animation progress
        onAnimationProgress: function() {},

        // Function - on animation complete
        onAnimationComplete: function() {},

        //String - A legend template
        legendTemplate: '<ul class="tc-chart-js-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].strokeColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>'
    };

};


function chartJsBarCtrl($scope) {

    // Chart.js Data
    $scope.data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Network Usage',
            fillColor: 'rgba(26,188,156,0.5)',
            strokeColor: 'rgba(255,255,255,0.8)',
            highlightFill: 'rgba(26,188,156,1)',
            highlightStroke: 'rgba(255,255,255,0.8)',
            data: [65, 59, 80, 81, 56, 55, 40]
        }, {
            label: 'CPU Load',
            fillColor: 'rgba(31,123,182,0.5)',
            strokeColor: 'rgba(255,255,255,0.8)',
            highlightFill: 'rgba(31,123,182,1)',
            highlightStroke: 'rgba(255,255,255,0.8)',
            data: [28, 48, 40, 19, 86, 27, 90]
        }]
    };

    // Chart.js Options
    $scope.options = {

        // Sets the chart to be responsive
        responsive: true,

        //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleBeginAtZero: true,

        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: true,

        //String - Colour of the grid lines
        scaleGridLineColor: "rgba(0,0,0,.05)",

        //Number - Width of the grid lines
        scaleGridLineWidth: 1,

        //Boolean - If there is a stroke on each bar
        barShowStroke: true,

        //Number - Pixel width of the bar stroke
        barStrokeWidth: 2,

        //Number - Spacing between each of the X value sets
        barValueSpacing: 5,

        //Number - Spacing between data sets within X values
        barDatasetSpacing: 1,

        //String - A legend template
        legendTemplate: '<ul class="tc-chart-js-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>'
    };


};

function chartJsDoughnutCtrl($scope) {

    // Chart.js Data
    $scope.data = [{
        value: 300,
        color: "#1ABC9C",
        highlight: "#1ABC9C",
        label: "Chrome"
    }, {
        value: 50,
        color: "#556B8D",
        highlight: "#556B8D",
        label: "IE"
    }, {
        value: 100,
        color: "#EDCE8C",
        highlight: "#EDCE8C",
        label: "Safari"
    }, {
        value: 40,
        color: "#CED1D3",
        highlight: "#1F7BB6",
        label: "Other"
    }, {
        value: 120,
        color: "#1F7BB6",
        highlight: "#1F7BB6",
        label: "Firefox"
    }];

    // Chart.js Options
    $scope.options = {

        // Sets the chart to be responsive
        responsive: true,

        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke: true,

        //String - The colour of each segment stroke
        segmentStrokeColor: '#fff',

        //Number - The width of each segment stroke
        segmentStrokeWidth: 2,

        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts

        //Number - Amount of animation steps
        animationSteps: 100,

        //String - Animation easing effect
        animationEasing: 'easeOutBounce',

        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate: true,

        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale: true,

        //String - A legend template
        legendTemplate: '<ul class="tc-chart-js-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'

    };


};

function polarAreaCtrl($scope) {

    $scope.data = [{
        value: 300,
        color: '#F7464A',
        highlight: '#FF5A5E',
        label: 'Red'
    }, {
        value: 50,
        color: '#46BFBD',
        highlight: '#5AD3D1',
        label: 'Green'
    }, {
        value: 100,
        color: '#FDB45C',
        highlight: '#FFC870',
        label: 'Yellow'
    }, {
        value: 40,
        color: '#949FB1',
        highlight: '#A8B3C5',
        label: 'Grey'
    }, {
        value: 120,
        color: '#4D5360',
        highlight: '#616774',
        label: 'Dark Grey'
    }];

    // Chart.js Options
    $scope.options = {

        // Sets the chart to be responsive
        responsive: true,

        //Boolean - Show a backdrop to the scale label
        scaleShowLabelBackdrop: true,

        //String - The colour of the label backdrop
        scaleBackdropColor: 'rgba(255,255,255,0.75)',

        // Boolean - Whether the scale should begin at zero
        scaleBeginAtZero: true,

        //Number - The backdrop padding above & below the label in pixels
        scaleBackdropPaddingY: 2,

        //Number - The backdrop padding to the side of the label in pixels
        scaleBackdropPaddingX: 2,

        //Boolean - Show line for each value in the scale
        scaleShowLine: true,

        //Boolean - Stroke a line around each segment in the chart
        segmentShowStroke: true,

        //String - The colour of the stroke on each segement.
        segmentStrokeColor: '#fff',

        //Number - The width of the stroke value in pixels
        segmentStrokeWidth: 2,

        //Number - Amount of animation steps
        animationSteps: 100,

        //String - Animation easing effect.
        animationEasing: 'easeOutBounce',

        //Boolean - Whether to animate the rotation of the chart
        animateRotate: true,

        //Boolean - Whether to animate scaling the chart from the centre
        animateScale: true,

        //String - A legend template
        legendTemplate: '<ul class="tc-chart-js-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    };
};

function gaugeCtrl($scope, $timeout) {
    $scope.animationTime = 10;
    $scope.value = 3200;
    $scope.maxValue = 5000;
    $scope.gaugeType = 'gauge';

    $scope.gaugeOptions = {
        lines: 12,
        // The number of lines to draw
        angle: 0,
        // The length of each line
        lineWidth: 0.4,
        // The line thickness
        pointer: {
            length: 0.75,
            // The radius of the inner circle
            strokeWidth: 0.042,
            // The rotation offset
            color: '#1D212A' // Fill color
        },
        limitMax: 'false',
        // If true, the pointer will not go past the end of the gauge
        colorStart: '#1ABC9C',
        // Colors
        colorStop: '#1ABC9C',
        // just experiment with them
        strokeColor: '#F0F3F3',
        // to see which ones work best for you
        generateGradient: true
    };

    $scope.donutGaugeOptions = {
        lines: 12,
        // The number of lines to draw
        angle: 0.15,
        // The length of each line
        lineWidth: 0.044,
        // The line thickness
        pointer: {
            length: 0.09,
            // The radius of the inner circle
            strokeWidth: 0.0035,
            // The rotation offset
            color: '#000000' // Fill color
        },
        limitMax: 'false',
        // If true, the pointer will not go past the end of the gauge
        colorStart: '#6FADCF',
        // Colors
        colorStop: '#8FC0DA',
        // just experiment with them
        strokeColor: '#E0E0E0',
        // to see which ones work best for you
        generateGradient: true
    };
};
