<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sum</th>
                    <th scope="col">Avg</th>
                    <th scope="col">Min</th>
                    <th scope="col">Max</th>
                    <th scope="col">Median</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ sum }}</td>
                    <td>{{ avg }}</td>
                    <td>{{ min }}</td>
                    <td>{{ max }}</td>
                    <td>{{ median }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['grasses'],
        data() {
            return {
                sum: 0,
                avg: 0,
                min: Math.min(...this.grasses),
                max: Math.max(...this.grasses),
                median: 0,
            }
        },
        methods: {
            calcSum(grasses) {
                return grasses.reduce((prev, current, i, grasses) => {
                    return prev + current
                })
            },
            calcAvg(grasses) {
                return Math.round(this.calcSum(grasses) / grasses.length)
            },
            calcMedian() {

            }
        },
        created() {
            this.sum = this.calcSum(this.grasses)
            this.avg = this.calcAvg(this.grasses)
        }
    }
</script>