<template>
    <div class="container">
        <forms @form-event="adjustGrasses"></forms>
        <div v-if="grasses.length > 0" class="graphWrapper">
            <graph :grasses="grasses"></graph>
            <info></info>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Forms from './components/Forms.vue'
    import Graph from './components/Graph.vue'
    import Info from './components/Info.vue'

    export default {
        components: {
            Forms,
            Graph,
            Info,
        },
        data() {
            return {
                grasses: []
            }
        },
        methods: {
            adjustGrasses(grasses) {
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
