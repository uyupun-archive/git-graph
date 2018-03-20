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
                    labels: [ '1週', '2週', '3週', '4週', '5週', '6週', '7週', '8週', '9週', '10週', '11週', '12週', '13週', '14週', '15週', '16週', '17週', '18週', '19週', '20週', '21週', '22週', '23週', '24週', '25週', '26週', '27週', '28週', '29週', '30週', '31週', '32週', '33週', '34週', '35週', '36週', '37週', '38週', '39週', '40週', '41週', '42週', '43週', '44週', '45週', '46週', '47週', '48週', '49週', '50週', '51週', '52週'],
                    datasets: [{
                        label: 'Prime and Fibonacci',
                        backgroundColor: 'rgba(0, 0, 0, 0)',
                        borderColor: '#81b77d',
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
                                max: 1000
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
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