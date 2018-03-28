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
                <div :class="load" class="loadWrapper">
                    <div class="load" :class="'load' + index"  v-for="index in 9" :key="index"></div>
                </div>
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
                name: '',
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

    .loadWrapper {
        max-width: 90px;
        height: 90px;
        margin-right: auto;
        margin-left: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        transform: translateY(100%)
    }

    .load {
        width: 25px;
        height: 25px;
        background: green;
        opacity: 0;
        animation: load 0.8s infinite;
        @keyframes load {
            0% {
                opacity: 0;
            }
            25% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
            100% {
                opacity: 0;
            }
        }
    }

    .load1 {
        animation-delay: 0s;
    }

    .load2 {
        animation-delay: 0.1s;
    }

    .load3 {
        animation-delay: 0.2s;
    }

    .load4 {
        animation-delay: 0.7s;
    }

    .load5 {
        visibility: hidden;
    }

    .load6 {
        animation-delay: 0.3s;
    }

    .load7 {
        animation-delay: 0.6s;
    }

    .load8 {
        animation-delay: 0.5s;
    }

    .load9 {
        animation-delay: 0.4s;
    }

    .msgWrapper {
        margin-top: 10px;
        text-align: center;
        font-size: 32px;
    }
</style>
