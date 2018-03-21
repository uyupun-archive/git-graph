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
            calcMedian(grasses) {
                grasses = Object.assign([], grasses)
                grasses.sort((prev, current) => {
                    if (prev < current)  return -1
                    if (prev > current)  return 1
                    return 0
                })
                if (grasses.length % 2 === 0) {
                    return grasses[grasses.length / 2]
                } else {
                    const ceil = grasses[Math.ceil(grasses.length / 2)]
                    const floor = grasses[Math.floor(grasses.length / 2)]
                    return Math.round((ceil + floor) / 2)
                }
            }
        },
        created() {
            this.sum = this.calcSum(this.grasses)
            this.avg = this.calcAvg(this.grasses)
            this.median = this.calcMedian(this.grasses)
        }
    }
</script>