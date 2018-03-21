<script>
    import { Line } from 'vue-chartjs';

    export default {
        extends: Line,
        props: [
            'grasses'
        ],
        data() {
            return {
                datacollection: {
                    labels: Array.from(new Array(this.grasses.length)).map((v, i) => String(i + 1)),
                    datasets: [{
                        label: 'tyokinuhata',
                        backgroundColor: 'rgba(0, 0, 0, 0)',
                        borderColor: '#3cb371',
                        radius: 0,
                        data: this.grasses
                    }],
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                min: 0,
                                max: Math.ceil(Math.max(...this.grasses) / 100) * 100
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