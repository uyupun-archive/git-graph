<template>
    <div>
        <navi @form-grasses="callBoth" @form-data="setData"></navi>
        <div class="container">
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
                    <div class="load-anime" :class="'load-anime' + index"  v-for="index in 9" :key="index"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Navi from './components/Navi.vue'
    import Graph from './components/Graph.vue'
    import Info from './components/Info.vue'

    export default {
        components: {
            Navi,
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
                this.weeks = []
                this.days = []
                this.message = ''

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
        margin-top: 5px;
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
        transform: translateY(100%);
        visibility: hidden;
    }

    .load-anime {
        width: 25px;
        height: 25px;
        background: green;
        opacity: 0;
        animation: load-anime 0.8s infinite;
        @keyframes load-anime {
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

    .load {
        visibility: visible;
    }

    .load-anime1 {
        animation-delay: 0s;
    }

    .load-anime2 {
        animation-delay: 0.1s;
    }

    .load-anime3 {
        animation-delay: 0.2s;
    }

    .load-anime4 {
        animation-delay: 0.7s;
    }

    .load-anime5 {
        visibility: hidden;
    }

    .load-anime6 {
        animation-delay: 0.3s;
    }

    .load-anime7 {
        animation-delay: 0.6s;
    }

    .load-anime8 {
        animation-delay: 0.5s;
    }

    .load-anime9 {
        animation-delay: 0.4s;
    }

    .msgWrapper {
        margin-top: 10px;
        text-align: center;
        font-size: 32px;
    }
</style>
