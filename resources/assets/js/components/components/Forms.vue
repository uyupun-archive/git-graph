<template>
    <div>
        <input type="text" class="form-control formName" v-model="name" placeholder="Please enter username" maxlength="39" autofocus>
        <button type="button" class="btn btn-primary formSend" @click="sendName">Send</button>
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
</style>