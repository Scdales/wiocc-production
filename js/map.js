$(function () {

	$.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=world-population.json&callback=?', function (data) {

		var mapData = Highcharts.geojson(Highcharts.maps['custom/world']);

		console.log(data);
		// Correct UK to GB in data
		$.each(data, function () {
			if (this.code === 'UK') {
				this.code = 'GB';
			}
		});

		$('#map-container').highcharts('Map', {
			chart: {
				borderWidth: 1
			},

			title: {
				text: 'World population 2013 by country'
			},

			subtitle: {
				text: 'Demo of Highcharts map with bubbles'
			},

			legend: {
				enabled: false
			},

			mapNavigation: {
				enabled: true,
				buttonOptions: {
					verticalAlign: 'bottom'
				}
			},

			series: [{
				name: 'Countries',
				mapData: mapData,
				color: '#E0E0E0',
				enableMouseTracking: false
			}, {
				// type: 'mapbubble',
				mapData: mapData,
				name: 'Population 2013',
				joinBy: ['iso-a2', 'code'],
				data: data,
				minSize: 4,
				maxSize: '12%',
				tooltip: {
					pointFormat: '{point.code}: {point.z} thousands'
				},
				dataLabels: {
					enabled: true,
					overflow: 'none',
					crop:false,
					formatter: function () {
						if(typeof(this.point.properties)!=='undefined' ){
							return this.point.properties['name'];
						}

					}
				}
			},
				{
					type: "mappoint",
					lineWidth: 2,
					data: [
						{ lat: -1.5063911484594008, lon: 2.092513326393521 },
						{ lat: 5.23995017297105, lon: -19.07259218131753 },
						{ lat: 21.11707115752174, lon: -18.55421784570433 },
						{ lat: 28.66285180938197, lon: -17.436883676577626 },
						{ lat: 22.349712565475784, lon: -15.139400821989408 },
						{ lat: 27.484731501934423, lon: -12.102870642623843 }
					]
				}
			]
		});

	});
});
