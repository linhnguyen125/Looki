$(document).ready(function () {
    let months = [], success_orders = [], fail_orders = [], ratio_success_orders = [], ratio_fail_orders = [];
    $.getJSON("http://127.0.0.1:8000/api/order", function (response) {
        months = response.months;
        success_orders = response.success_orders;
        fail_orders = response.fail_orders;
        ratio_success_orders = response.ratio_success_orders;
        ratio_fail_orders = response.ratio_fail_orders;
        console.log(months);

        const labels = months;
        const data = {
            labels: labels,
            datasets: [
                // {
                //     label: 'Tỉ lệ đơn bị hủy',
                //     data: ratio_fail_orders,
                //     borderColor: 'rgba(186, 220, 88,1.0)',
                //     backgroundColor: 'rgba(106, 176, 76,1.0)',
                //     type: 'line',
                //     order: 0
                // },
                // {
                //     label: 'Tỉ lệ đơn thành công',
                //     data: ratio_success_orders,
                //     borderColor: 'rgba(52, 152, 219,1.0)',
                //     backgroundColor: 'rgba(41, 128, 185,1.0)',
                //     type: 'line',
                //     order: 0
                // },
                {
                    label: 'Thành công',
                    data: success_orders,
                    borderColor: 'rgba(39, 174, 96,1.0)',
                    backgroundColor: 'rgba(39, 174, 96,0.8)',
                    type: 'bar',
                    order: 1
                },
                {
                    label: 'Bị hủy',
                    data: fail_orders,
                    borderColor: 'rgba(192, 57, 43,1.0)',
                    backgroundColor: 'rgba(192, 57, 43,0.8)',
                    type: 'bar',
                    order: 1
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
                plugins: {
                    title: { // title chart
                        display: true,
                        text: 'Đơn Hàng',
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

    })
})
