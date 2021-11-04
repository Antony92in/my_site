<template>
    <div id="the-site-footer" class="container">
        <h4>{{ time }}</h4>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                time: this.getCurrentTime()
            }
        },
        methods: {
            getCurrentTime() {
                return new Date().toLocaleDateString()
            }
        }
    }
</script>

