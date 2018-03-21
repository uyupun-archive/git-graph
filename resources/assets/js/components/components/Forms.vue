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
                axios.post('/api/grasses', {
                    name: this.name
                })
                    .then(response => {
                        this.$emit('form-event', response.data)
                    })
                    .catch(error => {
                        console.log(error.response)
                    })
            },
        }
    }
</script>