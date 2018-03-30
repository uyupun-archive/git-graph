<template>
    <div class="nav">
        <div class="navContainer">
            <h1 class="title">
                <i class="fab fa-github"></i>
                <span>GitGraph</span>
            </h1>
            <input type="text" class="form-control formName" v-model="name" placeholder="Please enter username" maxlength="39" autofocus>
            <button type="button" class="btn btn-primary formSend" @click="sendName">Send</button>
            <a href="https://github.com/tyokinuhata/git-graph" target="_blank" class="link">GitHub</a>
            <a href="https://twitter.com/h_tyokinuhata" target="_blank" class="link">Twitter</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: ''
            }
        },
        methods: {
            sendName() {
                this.$emit('form-data', {
                    load: 'load',
                    name: this.name
                })
                axios.post('/api/grasses', {
                    name: this.name
                })
                    .then(response => {
                        this.$emit('form-grasses', response.data)
                    })
                    .catch(error => {
                        this.$emit('form-grasses', 'You sent a bad request!')
                    })
            },
        }
    }
</script>

<style lang="scss" scoped>
    .nav {
        background: #24292e;
        width: 100%;
        height: 55px;
    }

    .navContainer {
        max-width: 980px;
        width: 100%;
        margin: 0 auto;
    }

    .title {
        display: inline-block;
        margin-right: 30px;
        line-height: 55px;
        font-size: 33px;
        color: #fff;
    }

    .formName {
        display: inline-block;
        width: 200px;
        vertical-align : middle;
        margin-right: 3px;
    }

    .graphWrapper {
        margin-top: 20px;
        border-radius: 3px;
        padding: 5px;
        background: #fff;
    }

    .link {
        margin-right: 20px;
        text-decoration: none;
        font-weight: 600;
        color: rgba(255,255,255,0.75);
    }
</style>