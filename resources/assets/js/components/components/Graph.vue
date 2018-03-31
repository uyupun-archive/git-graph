<script>
    import { Line } from 'vue-chartjs'

    export default {
        extends: Line,
        props: [
            'weeks',
            'name'
        ],
        data() {
            return {
                datacollection: {
                    labels: Array.from(new Array(this.weeks.length)).map((v, i) => String(i + 1)),
                    datasets: [{
                        label: this.name,
                        backgroundColor: 'rgba(0, 0, 0, 0)',
                        borderColor: '#3cb371',
                        radius: 0,
                        data: this.weeks
                    }],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                min: 0,
                                max: Math.ceil(Math.max(...this.weeks) / 100) * 100
                            },
                            gridLines: {
                                display: false
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'contributes',
                                fontSize: 14
                            },
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'weeks',
                                fontSize: 14
                            },
                        }],
                    },
                    legend: {
                        display: true
                    },
                    responsive: true,
                    maintainAspectRatio: false
                }
            }
        },
        mounted() {
            this.renderChart(this.datacollection, this.options)
        }
    }
</script>