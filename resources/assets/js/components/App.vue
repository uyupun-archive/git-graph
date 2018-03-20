<template>
    <div class="container">
        <input type="text" class="form-control" v-model="name">
        <button type="button" class="btn btn-primary" @click="send">Send</button>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                name: ''
            }
        },
        methods: {
            send() {
                axios.post('/api/grasses', {
                    name: this.name
                })
                    .then(response => {
                        console.log(response.data)
                    })
                    .catch(error => {
                        console.log(error.response)
                    })
            }
        }
    }
</script>
