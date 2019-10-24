<template>
    <div>
        <h4 class="title-page">{{title}}</h4>
        <div class="card w-full mh-100">
            <div class="card-body" v-if="visible">
                <div class=" w-full pb-2">
                    <h5 class="card-title w-full">Home</h5>

                    <p>Dashboard</p>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    export default {
        components: {},
        data() {
            return {
                title: this.$route.meta.title || '',
                visible: true,
                isAdmin: false
            }
        },
        mounted() {
            if (this.$store.getters.isAdmin) {
                this.visible = true;
                this.isAdmin = this.$store.getters.isAdmin;
            }
        }
    }
</script>
