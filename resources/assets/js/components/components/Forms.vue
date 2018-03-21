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
                this.$emit('form-msg', 'Loading now ...')
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