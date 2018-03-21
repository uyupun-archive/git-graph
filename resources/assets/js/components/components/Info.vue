<template>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sum</th>
                    <th scope="col">Min</th>
                    <th scope="col">Max</th>
                    <th scope="col">Average</th>
                    <th scope="col">Median</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ sum }}</td>
                    <td>{{ min }}</td>
                    <td>{{ max }}</td>
                    <td>{{ avg }}</td>
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
                min: Math.min(...this.grasses),
                max: Math.max(...this.grasses),
                avg: 0,
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
                return calcSum(grasses) / grasses.length
            },
            calcMedian() {

            }
        },
        created() {
            console.log(this.calcSum(this.grasses))
//            this.calcSum(this.grasses)
//            this.calcAvg(this.grasses)
        }
    }
</script>