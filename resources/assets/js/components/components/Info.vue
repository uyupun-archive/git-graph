<template>
    <div>
        <caption>Weekly</caption>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sum</th>
                    <th scope="col">Avg</th>
                    <th scope="col">Median</th>
                    <th scope="col">Min</th>
                    <th scope="col">Max</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ week.sum }}</td>
                    <td>{{ week.avg }}</td>
                    <td>{{ week.median }}</td>
                    <td>{{ week.min }}</td>
                    <td>{{ week.max }}</td>
                </tr>
            </tbody>
        </table>

        <caption>Daily</caption>
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Sum</th>
                <th scope="col">Avg</th>
                <th scope="col">Median</th>
                <th scope="col">Min</th>
                <th scope="col">Max</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ day.sum }}</td>
                <td>{{ day.avg }}</td>
                <td>{{ day.median }}</td>
                <td>{{ day.min }}</td>
                <td>{{ day.max }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: [
            'weeks',
            'days'
        ],
        data() {
            return {
                week: {
                    sum: 0,
                    avg: 0,
                    min: Math.min(...this.weeks),
                    max: Math.max(...this.weeks),
                    median: 0,
                },
                day: {
                    sum: 0,
                    avg: 0,
                    min: Math.min(...this.days),
                    max: Math.max(...this.days),
                    median: 0,
                },
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
            this.week.sum = this.calcSum(this.weeks)
            this.week.avg = this.calcAvg(this.weeks)
            this.week.median = this.calcMedian(this.weeks)

            this.day.sum = this.calcSum(this.days)
            this.day.avg = this.calcAvg(this.days)
            this.day.median = this.calcMedian(this.days)
        }
    }
</script>