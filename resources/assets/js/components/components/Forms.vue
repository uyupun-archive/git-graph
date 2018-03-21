<template>
    <div>
        <input type="text" class="form-control formName" v-model="name" placeholder="Please enter username">
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
                    message: 'message',
                    name: this.name
                })
                axios.post('/api/grasses', {
                    name: this.name
                })
                    .then(response => {
                        this.$emit('form-grasses', response.data)
                    })
                    .catch(error => {
                        console.log(error.response)
                    })
            },
        }
    }
</script>

<style lang="scss">
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