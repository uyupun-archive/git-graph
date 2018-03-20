<template>
    <div class="container">
        <input type="text" class="form-control" v-model="name">
        <button type="button" class="btn btn-primary" @click="send">Send</button>
        <ul v-if="grasses.length > 0">
            <li v-for="grass in grasses">
                {{ grass }}
            </li>
        </ul>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                name: '',
                grasses: []
            }
        },
        methods: {
            send() {
                axios.post('/api/grasses', {
                    name: this.name
                })
                    .then(response => {
                        this.grasses = response.data
                    })
                    .catch(error => {
                        console.log(error.response)
                    })
            }
        }
    }
</script>
