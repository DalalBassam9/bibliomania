<template>
    <div>

        <div class=" bg-gray-100  ">
            <div class="min-h-full">
                <Nav />
                <div class="py-10" >
                    <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-full lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                        <Sidbar />
                        <main class="lg:col-span-10 mt-8 ">



                            <div
                                class="   px-3 lg:col-span-10 "
                            >
                                <div    class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-4 md:grid-cols-3 lg:gap-x-8">
                                    <div  v-for="user in users.data" :key="user.id" >
                                        <div class=" flex">
                                            <div class="relative w-72  bg-white rounded-2xl pt-16 pb-8 px-4 shadow-md hover:shadow-lg transition flex flex-col items-center">
                                                <div class="absolute rounded-full bg-Lightblue-100 w-32 h-32 p-2 z-10 -top-16 shadow-lg hover:shadow-xl transition">
                                                    <img class="w-full  rounded-full h-full" :src="user.data.attributes.profile_image.data
                                        .attributes.path" >

                                                </div>
                                                <label class=" mt-4 text-gray-600 text-lg">
                                                    {{user.data.attributes.name}}
                                                </label>

                                                <div class="mt-4 flex flex-col w-full">
                                                    <router-link :to="'/profile/'+ user.data.user_id" class="inline-flex
             items-center justify-center
              px-4 py-2 border border-transparent text-sm font-medium rounded-2xl shadow-sm
              text-white bg-Lightblue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-Lightblue-100">

    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>

                                                      <span class="mr-2"> الملف الشخصي</span>

                                                    </router-link>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>

import Nav from '../components/Nav.vue';
import Sidbar from '../components/Sidbar.vue';


export default {
    name: "Users",

    components: {
        Nav,
        Sidbar,


    },

    data() {
        return {

            users:[],

        }
    },


    mounted() {

        axios.get('/api/get-users/').
        then(res => {
            this.users = res.data;
        })
            .catch(error => {
                console.log('no users');
            });

    }
}
</script>

<style scoped>

</style>
