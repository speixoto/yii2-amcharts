<?php
namespace speixoto\amcharts;
use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
/**
 * @author Sérgio Peixoto <matematico2002@hotmail.com>
 */
class AmChart extends Widget
{
    /**
     * @var array the HTML attributes for the breadcrumb container tag.
     */
    public $options = [];
    /**
     * @var string the width of the chart
     */
    public $width = '640px';
    /**
     * @var string the height of the chart
     */
    public $height = '400px';
    /**
     * @var array the AmChart configuration array
     * @see http://docs.amcharts.com/3/javascriptcharts
     */
    public $chartConfiguration = [];

    protected $_chartDivId;

    public function init()
    {
        parent::init();
        $this->chartDivId = 'chartdiv-' . $this->id;
        AmChartAsset::register($this->getView());
    }

    public function run()
    {
        $this->makeChart();
        $this->options['id']    = $this->chartDivId;
        $this->options['style'] = "width: {$this->width}; height: {$this->height};";
        echo Html::tag('div', '', $this->options);
    }

    protected function makeChart()
    {
        $chartConfiguration = json_encode($this->chartConfiguration);
        $js = "AmCharts.makeChart('{$this->chartDivId}', {$chartConfiguration});";
        $this->getView()->registerJs($js, \yii\web\View::POS_READY);
    }

    protected function setChartDivId($value)
    {
        $this->_chartDivId = $value;
    }

    protected function getChartDivId()
    {
        return $this->_chartDivId;
    }
}