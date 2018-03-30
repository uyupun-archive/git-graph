<template>
    <nav class="navbar navbar-expand-lg nav">
        <div class="container">
            <h1 class="navbar-brand title">
                <i class="fab fa-github"></i>
                <span>GitGraph</span>
            </h1>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#Navber" aria-controls="Navber" aria-expanded="false" aria-label="ナビゲーションの切替">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="Navber">
                <div class="form-inline my-2 my-lg-0">
                    <input type="text" class="form-control mr-sm-2 formName" v-model="name" placeholder="Please enter username" maxlength="39" autofocus>
                    <button type="button" class="btn btn-primary formSend my-2 my-sm-0" @click="sendName">Send</button>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link link" href="https://github.com/tyokinuhata/git-graph" target="_blank">GitHub</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link" href="https://twitter.com/h_tyokinuhata" target="_blank">Twitter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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
        padding: 5px 0;
    }

    .title {
        margin: 0;
        margin-right: 20px;
        padding: 0;
        font-size: 30px;
        color: #fff;
    }

    .formName {
        width: 200px;
        height: 30px;
        box-shadow: none;
        border: 0;
        background: #3f4449;
        color: #fff;

        &:focus {
            background: #4b4f54;
        }
    }

    .formSend {
        margin-right: 20px;
        box-shadow: none;
        border: 0;
        background: #3f4449;

        &:hover {
            background: #4b4f54;
        }
    }

    .graphWrapper {
        margin-top: 20px;
        border-radius: 3px;
        padding: 5px;
        background: #fff;
    }

    .link {
        font-weight: 600;
        color: rgba(255,255,255,0.75);

        &:hover {
            color: #fff;
        }
    }
</style>