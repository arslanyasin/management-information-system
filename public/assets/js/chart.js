$(document).ready(function() {

	// Bar Chart

	Morris.Bar({
		element: 'bar-charts',
		data: [
			{ y: '2015', a: 10,  b: 65 },
			{ y: '2016', a: 75,  b: 65 },
			{ y: '2017', a: 75,  b: 65 },
			{ y: '2018', a: 75,  b: 65 },
			{ y: '2019', a: 50,  b: 40 },
			{ y: '2020', a: 75,  b: 65 },
			{ y: '2021', a: 100, b: 90 },
			{ y: '2022', a: 100, b: 90 }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Total Income', 'Total Outcome'],
		lineColors: ['#009cfd','#4ab5f8'],
		lineWidth: '0px',
		barColors: ['#009cfd','#4ab5f8'],
		resize: true,
		redraw: true
	});

	// Line Chart

	Morris.Line({
		element: 'line-charts',
		data: [
			{ y: '2006', a: 50, b: 90 },
			{ y: '2007', a: 75,  b: 65 },
			{ y: '2008', a: 50,  b: 40 },
			{ y: '2009', a: 75,  b: 65 },
			{ y: '2010', a: 50,  b: 40 },
			{ y: '2011', a: 75,  b: 65 },
			{ y: '2012', a: 100, b: 50 }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Total Sales', 'Total Revenue'],
		lineColors: ['#ff9b44','#fc6075'],
		lineWidth: '3px',
		resize: true,
		redraw: true
	});

});
