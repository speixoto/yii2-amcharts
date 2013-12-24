<?php
namespace speixoto\amcharts;
use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
/**
 * @author Sérgio Peixoto <matematico2002@hotmail.com>
 */
class AmChart extends \yii\base\Widget
{
    public function init()
    {
        parent::init();
        AmChartAsset::register($this->getView());
    }

    public function run()
    {
        $this->registerChart();
        echo Html::tag('div', '', array('id' => 'chartdiv', 'style' => 'width: 640px; height: 400px;'));
    }

    protected function registerChart()
    {
        $js = '
        var chart;

        var chartData = [
    {
        "year": 1930,
        "italy": 1,
        "germany": 5,
        "uk": 3
    },
    {
        "year": 1934,
        "italy": 1,
        "germany": 2,
        "uk": 6
    },
    {
        "year": 1938,
        "italy": 2,
        "germany": 3,
        "uk": 1
    },
    {
        "year": 1950,
        "italy": 3,
        "germany": 4,
        "uk": 1
    },
    {
        "year": 1954,
        "italy": 5,
        "germany": 1,
        "uk": 2
    },
    {
        "year": 1958,
        "italy": 3,
        "germany": 2,
        "uk": 1
    },
    {
        "year": 1962,
        "italy": 1,
        "germany": 2,
        "uk": 3
    },
    {
        "year": 1966,
        "italy": 2,
        "germany": 1,
        "uk": 5
    },
    {
        "year": 1970,
        "italy": 3,
        "germany": 5,
        "uk": 2
    },
    {
        "year": 1974,
        "italy": 4,
        "germany": 3,
        "uk": 6
    },
    {
        "year": 1978,
        "italy": 1,
        "germany": 2,
        "uk": 4
    }
];


AmCharts.ready(function () {
    // SERIAL CHART
    chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData;
    chart.categoryField = "year";
    chart.startDuration = 0.5;
    chart.balloon.color = "#000000";

    // AXES
    // category
    var categoryAxis = chart.categoryAxis;
    categoryAxis.fillAlpha = 1;
    categoryAxis.fillColor = "#FAFAFA";
    categoryAxis.gridAlpha = 0;
    categoryAxis.axisAlpha = 0;
    categoryAxis.gridPosition = "start";
    categoryAxis.position = "top";

    // value
    var valueAxis = new AmCharts.ValueAxis();
    valueAxis.title = "Place taken";
    valueAxis.dashLength = 5;
    valueAxis.axisAlpha = 0;
    valueAxis.minimum = 1;
    valueAxis.maximum = 6;
    valueAxis.integersOnly = true;
    valueAxis.gridCount = 10;
    valueAxis.reversed = true; // this line makes the value axis reversed
    chart.addValueAxis(valueAxis);

    // GRAPHS
    // Italy graph
    var graph = new AmCharts.AmGraph();
    graph.title = "Italy";
    graph.valueField = "italy";
    graph.hidden = true; // this line makes the graph initially hidden
    graph.balloonText = "place taken by Italy in [[category]]: [[value]]";
    graph.lineAlpha = 1;
    graph.bullet = "round";
    chart.addGraph(graph);

    // Germany graph
    var graph = new AmCharts.AmGraph();
    graph.title = "Germany";
    graph.valueField = "germany";
    graph.balloonText = "place taken by Germany in [[category]]: [[value]]";
    graph.bullet = "round";
    chart.addGraph(graph);

    // United Kingdom graph
    var graph = new AmCharts.AmGraph();
    graph.title = "United Kingdom";
    graph.valueField = "uk";
    graph.balloonText = "place taken by UK in [[category]]: [[value]]";
    graph.bullet = "round";
    chart.addGraph(graph);

    // CURSOR
    var chartCursor = new AmCharts.ChartCursor();
    chartCursor.cursorPosition = "mouse";
    chartCursor.zoomable = false;
    chartCursor.cursorAlpha = 0;
    chart.addChartCursor(chartCursor);

    // LEGEND
    var legend = new AmCharts.AmLegend();
    legend.useGraphSettings = true;
    chart.addLegend(legend);

    // WRITE
    chart.write("chartdiv");
});';
        $this->getView()->registerJs($js, \yii\base\View::POS_READY);
    }
}