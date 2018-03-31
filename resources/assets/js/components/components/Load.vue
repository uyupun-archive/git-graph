<template>
    <div :class="load" class="loadWrapper">
        <div class="load-anime" :class="'load-anime' + index"  v-for="index in 9" :key="index"></div>
    </div>
</template>

<script>
    export default {
        props: ['load']
    }
</script>

<style lang="scss" scoped>
    .loadWrapper {
        max-width: 90px;
        height: 90px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateY(-50%) translateX(-50%);
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
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
</style>