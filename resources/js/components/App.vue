<template>
    <div class="flex font-Kufi flex-col flex-1 h-screen overflow-y-hidden" v-if="authUser">


        <div class="flex overflow-y-hidden flex-1">


            <div class="overflow-x-hidden w-full">
                <router-view :key="$route.fullPath"></router-view>
            </div>
        </div>
    </div>
</template>

<script>
    import Nav from './Nav';
    import Sidebar from './Sidbar';
    import { mapGetters } from 'vuex';

    export default {
        name: "App",

        components: {
            Nav,
            Sidebar
        },

        mounted() {
            this.$store.dispatch('fetchAuthUser');
        },

        created() {
            this.$store.dispatch('setPageTitle', this.$route.meta.title);
        },

        computed: {
            ...mapGetters({
                authUser: 'authUser',
            }),
        },

        watch: {
            $route(to, from) {
                this.$store.dispatch('setPageTitle', to.meta.title);
            }
        }
    }
</script>

<style scoped>
@import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);
.font-Kufi {
  font-family: "Droid Arabic Kufi", serif;
}
</style>

</style>
