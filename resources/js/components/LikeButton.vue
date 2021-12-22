<template>
    <div>
        <button class="tweet__like" @click="likePost" :class="{ tweet__like_active: status }">{{ likes }}</button>
    </div>
</template>

<script>
    export default {
        props: ['postId', 'liked', 'likes'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function () {
            return {
                status: this.liked,
            }
        },

        methods: {
            likePost() {
                axios.post('/like/' + this.postId)
                    .then(response => {
                        this.status = !this.status
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login'
                        }
                    })
            }
        },
    }
</script>