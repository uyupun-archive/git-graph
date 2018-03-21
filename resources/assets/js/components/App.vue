<template>
    <div class="container">
        <h1 class="title">GitGraph</h1>
        <div class="formWrapper">
            <forms @form-grasses="callBoth" @form-data="setData"></forms>
        </div>
        <div v-if="grasses.length > 0" class="graphWrapper">
            <div class="graphWrapper">
                <graph :grasses="grasses" :name="name"></graph>
            </div>
            <div class="graphWrapper">
                <info :grasses="grasses"></info>
            </div>
        </div>
        <div v-else-if="message.length > 0">
            <p>{{ message }}</p>
        </div>
        <div v-else>
            <div :class="load"></div>
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
                grasses: [],
                message: '',
                load: '',
                name: ''
            }
        },
        methods: {
            callBoth(grasses) {
                if (typeof grasses === 'string') {
                    this.showMsg(grasses)
                } else {
                    this.adjustGrasses(grasses)
                }
            },
            showMsg(grasses) {
                this.message = grasses
            },
            adjustGrasses(grasses) {
                for (let i = 0; i < grasses.length; i += 7) {
                    let sum = 0
                    for (let j = 0; j < 7 && i + j < grasses.length; j++) {
                        sum += grasses[i + j]
                    }
                    this.grasses.push(sum)
                }
            },
            setData(data) {
                this.load = data.load
                this.name = data.name
            }
        }
    }
</script>

<style lang="scss">
    .title {
        margin-top: 20px;
        text-align: center;
        font-size: 48px;
    }

    .formWrapper {
        margin-top: 10px;
        text-align: center;
    }

    .load {
        width: 20px;
        height: 20px;
        background: red;
    }
</style>