$(document).ready(function () {
    let months = [], success_orders = [], fail_orders = [], rate_of_increase_orders = [], rate_of_increase_sales = [];
    let months2 = [];
    // chart 1
    $.getJSON("http://127.0.0.1:8000/api/order", function (response) {
            months = response.months;
            success_orders = response.success_orders;
            fail_orders = response.fail_orders;

            const labels = months;
            const data = {
                labels: labels,
                datasets: [
                    {
                        label: 'Thành công',
                        data: success_orders,
                        borderColor: 'rgba(39, 174, 96,1.0)',
                        backgroundColor: 'rgba(39, 174, 96,1.0)',
                        type: 'bar',
                    },
                    {
                        label: 'Bị hủy',
                        data: fail_orders,
                        borderColor: 'rgba(192, 57, 43,1.0)',
                        backgroundColor: 'rgba(192, 57, 43,1.0)',
                        type: 'bar',
                    },
                ],
            };

            // plugin
            const chartAreaBorder = {
                id: 'chartAreaBorder',
                beforeDraw(chart, args, options) {
                    const {ctx, chartArea: {left, top, width, height}} = chart;
                    ctx.save();
                    ctx.strokeStyle = options.borderColor;
                    ctx.lineWidth = options.borderWidth;
                    ctx.setLineDash(options.borderDash || []);
                    ctx.lineDashOffset = options.borderDashOffset;
                    ctx.strokeRect(left, top, width, height);
                    ctx.restore();
                }
            };

            var delayed;

            const config = {
                type: 'bar',
                data: data,
                options: {
                    color: '#fff',
                    responsive: true,
                    animation: { // animation
                        onComplete: () => {
                            delayed = true;
                        },
                        delay: (context) => {
                            let delay = 0;
                            if (context.type === 'data' && context.mode === 'default' && !delayed) {
                                delay = context.dataIndex * 300 + context.datasetIndex * 100;
                            }
                            return delay;
                        },
                        scales: {
                            y: {
                                stacked: true
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#fff',
                            }
                        },
                        y: {
                            ticks: {
                                color: '#fff',
                            }
                        }
                    },
                    plugins: {
                        title: { // title chart
                            display: true,
                            text: 'Biểu đồ biểu thị số lượng đơn hàng qua các tháng',
                            color: '#fff',
                        },
                        chartAreaBorder: { // border chart
                            borderColor: 'rgba(192, 57, 43,1.0)',
                            borderWidth: 2,
                            borderDash: [5, 5],
                            borderDashOffset: 2,
                        },
                    },
                    elements: { // smooth
                        line: {
                            tension: 0.4,
                        }
                    },
                },
                plugins: [chartAreaBorder]
            };

            var totalSales = new Chart(
                document.getElementById('totalSales'),
                config
            );

        }
    )

    // chart 2
    $.getJSON("http://127.0.0.1:8000/api/order", function (response) {
            months2 = response.months;
            months2.pop();
            rate_of_increase_orders = response.rate_of_increase_orders;
            rate_of_increase_sales = response.rate_of_increase_sales;

            const labels2 = months2;
            const data = {
                labels: labels2,
                datasets: [
                    {
                        label: 'Tỉ lệ tăng trưởng đơn hàng (%)',
                        data: rate_of_increase_orders,
                        borderColor: 'rgba(186, 220, 88,1.0)',
                        backgroundColor: 'rgba(106, 176, 76,0.4)',
                        type: 'line',
                        fill: true,
                    },
                    {
                        label: 'Tỉ lệ tăng trưởng doanh số (%)',
                        data: rate_of_increase_sales,
                        borderColor: 'rgba(52, 152, 219,1.0)',
                        backgroundColor: 'rgba(41, 128, 185,0.4)',
                        type: 'line',
                        fill: true,
                    },
                ],
            };

            // plugin
            const chartAreaBorder = {
                id: 'chartAreaBorder',
                beforeDraw(chart, args, options) {
                    const {ctx, chartArea: {left, top, width, height}} = chart;
                    ctx.save();
                    ctx.strokeStyle = options.borderColor;
                    ctx.lineWidth = options.borderWidth;
                    ctx.setLineDash(options.borderDash || []);
                    ctx.lineDashOffset = options.borderDashOffset;
                    ctx.strokeRect(left, top, width, height);
                    ctx.restore();
                }
            };

            var delayed;

            const config = {
                type: 'line',
                data: data,
                options: {
                    color: '#000',
                    responsive: true,
                    animation: { // animation
                        onComplete: () => {
                            delayed = true;
                        },
                        delay: (context) => {
                            let delay = 0;
                            if (context.type === 'data' && context.mode === 'default' && !delayed) {
                                delay = context.dataIndex * 300 + context.datasetIndex * 100;
                            }
                            return delay;
                        },
                        scales: {
                            y: {
                                stacked: true
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#000',
                            }
                        },
                        y: {
                            ticks: {
                                color: '#000',
                                beginAtZero: true,
                            }
                        }
                    },
                    plugins: {
                        title: { // title chart
                            display: true,
                            text: 'Biểu đồ biểu thị tỉ lệ tăng trưởng doanh số và đơn hàng',
                            color: '#000',
                        },
                        chartAreaBorder: { // border chart
                            borderColor: 'rgba(192, 57, 43,1.0)',
                            borderWidth: 2,
                            borderDash: [5, 5],
                            borderDashOffset: 2,
                        },
                        filler: {
                            propagate: false,
                        },
                    },
                    pointBackgroundColor: '#fff',
                    radius: 5,
                    interaction: {
                        intersect: false,
                    },
                    elements: { // smooth
                        line: {
                            tension: 0.4,
                        }
                    },
                },
                plugins: [chartAreaBorder]
            };

            var averargeOrder = new Chart(
                document.getElementById('averargeOrder'),
                config
            );

        }
    )
})
