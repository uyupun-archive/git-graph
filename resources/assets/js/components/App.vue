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
                <load :load="load"></load>
            </div>
        </div>
    </div>
</template>

<script>
    import Navi from './components/Navi.vue'
    import Load from './components/Load.vue'
    import Graph from './components/Graph.vue'
    import Info from './components/Info.vue'

    export default {
        components: {
            Navi,
            Load,
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
        },
        mounted() {
            const messages = [
                'Simpler is usually better',
                'Done is better than perfect',
                'Stay hungry, stay foolish',
                'Life is not fair. Get used to it.',
                'Reinventing the wheel',
                'We are What We Choose'
            ]
            const random = Math.floor(Math.random() * messages.length)
            this.message = messages[random]
        }
    }
</script>

<style lang="scss">
    .formWrapper {
        margin-top: 10px;
        text-align: center;
    }

    .graphWrapper {
        margin-top: 20px;
        border-radius: 3px;
        padding: 5px;
        background: #fff;
    }

    .infoWrapper {
        margin-top: 5px;
        text-align: center;
    }

    .msgWrapper {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateY(-50%) translateX(-50%);
        font-size: 32px;
    }
</style>
