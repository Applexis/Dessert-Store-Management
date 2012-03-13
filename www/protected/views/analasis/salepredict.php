<?php
$this->breadcrumbs=array(
	'Analasis'=>array('/analasis'),
	'Salepredict',
);?>
<h1>销量预测</h1>


<h2>销量上升最快的商品：</h2>

<?php $this->widget('ext.bootstrap.widgets.BootAlert'); ?>

<?php 
if (isset($dataProvider)) {
		$this->widget('ext.bootstrap.widgets.BootListView',array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); 
	$keys = $dataProvider->getKeys();
	$data = $dataProvider->getData();
} ?>
<div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>
<?php 
	$baseUrl = Yii::app()->baseUrl; 
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile($baseUrl.'/js/highcharts.js');
	$cs->registerScriptFile($baseUrl.'/js/modules/exporting.js');
	$cs->registerScript('line_chart', "
		var chart;
		$(document).ready(function() {

			// define the options
			var options = {

				chart: {
					renderTo: 'container'
				},

				title: {
					text: '销量分析'
				},

				subtitle: {
					text: '统计热卖产品一个月内的销量'
				},

				xAxis: {
					type: 'datetime',
					tickInterval: 7 * 24 * 3600 * 1000, // one week
					tickWidth: 0,
					gridLineWidth: 1,
					labels: {
						align: 'left',
						x: 3,
						y: -3
					}
				},

				yAxis: [{ // left y axis
					title: {
						text: null
					},
					labels: {
						align: 'left',
						x: 3,
						y: 16,
						formatter: function() {
							return Highcharts.numberFormat(this.value, 0);
						}
					},
					showFirstLabel: false
				}, { // right y axis
					linkedTo: 0,
					gridLineWidth: 0,
					opposite: true,
					title: {
						text: null
					},
					labels: {
						align: 'right',
						x: -3,
						y: 16,
						formatter: function() {
							return Highcharts.numberFormat(this.value, 0);
						}
					},
					showFirstLabel: false
				}],

				legend: {
					align: 'left',
					verticalAlign: 'top',
					y: 20,
					floating: true,
					borderWidth: 0
				},

				tooltip: {
					shared: true,
					crosshairs: true
				},

				plotOptions: {
					series: {
						cursor: 'pointer',
						point: {
							events: {
								click: function() {
									hs.htmlExpand(null, {
										pageOrigin: {
											x: this.pageX,
											y: this.pageY
										},
										headingText: this.series.name,
										maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) +':<br/> '+
											this.y +' visits',
										width: 200
									});
								}
							}
						},
						marker: {
							lineWidth: 1
						}
					}
				},

				series: [{
					name: '{$data[0]->name}',
					lineWidth: 4,
					marker: {
						radius: 4
					}
				}, {
					name: '{$data[1]->name}'
				}]
			};


			jQuery.get('../js/analytics.tsv', null, function(tsv, state, xhr) {
				var lines = [],
					listen = false,
					date,

					// set up the two data series
					allVisits = [],
					newVisitors = [];

				// inconsistency
				if (typeof tsv !== 'string') {
					tsv = xhr.responseText;
				}

				// split the data return into lines and parse them
				tsv = tsv.split(/\\n/g);
				jQuery.each(tsv, function(i, line) {

					// listen for data lines between the Graph and Table headers
					if (tsv[i - 3] == '# Graph') {
						listen = true;
					} else if (line == '' || line.charAt(0) == '#') {
						listen = false;
					}

					// all data lines start with a double quote
					if (listen) {
						line = line.split(/\t/);
						date = Date.parse(line[0] +' UTC');

						allVisits.push([
							date,
							parseInt(line[1].replace(',', ''), 10)
						]);
						newVisitors.push([
							date,
							parseInt(line[2].replace(',', ''), 10)
						]);
					}
				});

				options.series[0].data = allVisits;
				options.series[1].data = newVisitors;

				chart = new Highcharts.Chart(options);
			});
		});
	")
 ?>