<template>
    <div class="container">
        <input type="text" class="form-control" v-model="name">
        <button type="button" class="btn btn-primary" @click="sendName">Send</button>
        <ul v-if="grasses.length > 0">
            <graph :grasses="grasses"></graph>
        </ul>
    </div>
</template>

<script>
    import axios from 'axios'
    import Graph from './Graph.vue'

    export default {
        components: {
            Graph
        },
        data() {
            return {
                name: '',
                grasses: []
            }
        },
        methods: {
            sendName() {
                axios.post('/api/grasses', {
                    name: this.name
                })
                    .then(response => {
                        this.adjustGrasses(response.data)
                    })
                    .catch(error => {
                        console.log(error.response)
                    })
            },
            adjustGrasses(grasses) {
                console.log(grasses)
                outside: for (let i = 0; i < grasses.length; i += 7) {
                    let sum = 0
                    for (let j = 0; j < 7; j++) {
                        if (isNaN(sum += grasses[i + j])) {
                            break outside
                        }
                        sum += grasses[i + j]
                    }
                    this.grasses.push(sum)
                }
            }
        }
    }
</script>
