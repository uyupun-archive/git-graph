<template>
    <div>
        <navi></navi>
        <div class="container">
            <div class="formWrapper">
                <forms @form-grasses="callBoth" @form-data="setData"></forms>
            </div>
            <div v-if="weeks.length > 0">
                <div class="graphWrapper">
                    <graph :weeks="weeks" :days="days" :name="name"></graph>
                </div>
                <div class="infoWrapper">
                    <info :weeks="weeks" :days="days"></info>
                </div>
            </div>
            <div v-else-if="message.length > 0" class="msgWrapper">
                <p>{{ message }}</p>
            </div>
            <div v-else>
                <div :class="load"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Navi from './components/Navi.vue'
    import Forms from './components/Forms.vue'
    import Graph from './components/Graph.vue'
    import Info from './components/Info.vue'

    export default {
        components: {
            Navi,
            Forms,
            Graph,
            Info,
        },
        data() {
            return {
                weeks: [],
                days: [],
                message: '',
                load: '',
                name: ''
            }
        },
        methods: {
            callBoth(grasses) {
                this.days = Object.assign([], grasses)
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
                    this.weeks.push(sum)
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
    .formWrapper {
        margin-top: 10px;
        text-align: center;
    }

    .infoWrapper {
        margin-top: 10px;
        text-align: center;
    }

    .load {
        width: 20px;
        height: 20px;
        background: red;
    }

    .msgWrapper {
        margin-top: 10px;
        text-align: center;
        font-size: 32px;
    }
</style>