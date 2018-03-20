<template>
    <div class="container">
        <input type="text" class="form-control">
        <button type="button" class="btn btn-primary" @click="send">Send</button>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {

            }
        },
        methods: {
            send() {
                axios.post('/api/grasses', {
                    data: 'test'
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
