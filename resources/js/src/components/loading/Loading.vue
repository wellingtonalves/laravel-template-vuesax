<template>
    <!--    <div v-if="active" class="loader w-full h-100 mh-100">-->
    <!--        <loader-->
    <!--                :animation-duration="2000"-->
    <!--                :size="60"-->
    <!--                :color="'#1748ff'"-->
    <!--        />-->
    <!--    </div>-->
</template>

<script>
    import {FulfillingBouncingCircleSpinner} from 'epic-spinners'

    export default {
        name: "loading",
        components: {
            'loader': FulfillingBouncingCircleSpinner
        },
        data() {
            return {
                active: false
            }
        },
        watch: {
            '$root.loadingActive': function (val) {
                if (val) {
                    this.$vs.loading();
                } else {
                    this.$vs.loading.close();
                }

            }
        }
    }
</script>

<style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .loader {
        position: fixed;
        z-index: 10000;
        background-color: white;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        left: 0;
    }

</style>