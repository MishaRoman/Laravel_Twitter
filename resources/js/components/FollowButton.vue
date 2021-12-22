<template>
    <div>
        <button class="tweet-form__btn" @click="followUser">Читать</button>
    </div>
</template>

<script>
    export default {
        props: ['userId'],

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(response => {
                        alert(response.data)
                    });
            }
        }
    }
</script>

<style scoped>
    div {
        display: contents;
    }
</style>