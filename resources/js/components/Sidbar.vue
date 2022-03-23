<template>
    <div
        class="hidden lg:block  bg-white px-3  lg:col-span-3 xl:col-span-2"
    >
        <nav
            aria-label="Sidebar"
            class="sticky top-4 divide-y divide-gray-300"
        >
            <div class="pb-8 mt-4 space-y-1">

         <router-link   active-class="active"   exact   :to="'/profile/'+ authUser.data.user_id"

                               class="text-gray-900    group flex  px-3 py-2 text-sm font-medium rounded-md"

                >
                <span class="bg-Lightblue-100 rounded-full  h-10 w-10 justify-center flex  items-center">
 <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" :src="authUser.data.attributes.profile_image.data.attributes.path" alt="">

                </span>
                    <span class="pt-3 pr-2 hover:text-Lightblue-500 text-gray-700">
                      {{authUser.data.attributes.name}}
                 </span>
                </router-link>

                <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-600 hover:bg-gray-50" -->
                <router-link :to="'/'"
                             active-class="active"   exact
                             class=" text-gray-900  hover:bg-gray-50  group flex  px-3 py-2 text-sm font-medium rounded-md"

                >
                <span class=" rounded-full  h-10 w-10 justify-center flex  items-center">
                  <svg
                      class="text-Lightblue-500  flex-shrink-0   h-6 w-6"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      aria-hidden="true"
                  >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    />

                  </svg>
                </span>
                    <span     class="pt-3 pr-2 hover:text-Lightblue-500 text-gray-700">
                    الرئيسية
                  </span>
                </router-link>

                <router-link :to="'/books'"     active-class="active"   exact
                             class="text-gray-900   group flex  px-3 py-2 text-sm font-medium rounded-md"

                >
                <span
                    class="bg-Lightblue-100 rounded-full  h-10 w-10 justify-center flex  items-center">

      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-Lightblue-500  flex-shrink-0  w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                </span>
                    <span  class="pt-3 pr-2 hover:text-Lightblue-500 text-gray-700">
             الكتب
                  </span>
                </router-link>

                <router-link :to="'/users'"    active-class="active"   exact

                             class="text-Lightblue-500  hover:bg-gray-50  group flex  px-3 py-2 text-sm font-medium rounded-md"

                >
                <span       class="bg-Lightblue-100 rounded-full  h-10 w-10 justify-center flex  items-center">
               <svg class="h-6 w-6  bg-Lightblue-100   fill-current" viewBox="0 0 512 512">
                    <path d="M239.208 343.937c-17.78 10.103-38.342 15.876-60.255 15.876-21.909 0-42.467-5.771-60.246-15.87C71.544 358.331 42.643 406 32 448h293.912c-10.639-42-39.537-89.683-86.704-104.063zM178.953 120.035c-58.479 0-105.886 47.394-105.886 105.858 0 58.464 47.407 105.857 105.886 105.857s105.886-47.394 105.886-105.857c0-58.464-47.408-105.858-105.886-105.858zm0 186.488c-33.671 0-62.445-22.513-73.997-50.523H252.95c-11.554 28.011-40.326 50.523-73.997 50.523z"/><g><path d="M322.602 384H480c-10.638-42-39.537-81.691-86.703-96.072-17.781 10.104-38.343 15.873-60.256 15.873-14.823 0-29.024-2.654-42.168-7.49-7.445 12.47-16.927 25.592-27.974 34.906C289.245 341.354 309.146 364 322.602 384zM306.545 200h100.493c-11.554 28-40.327 50.293-73.997 50.293-8.875 0-17.404-1.692-25.375-4.51a128.411 128.411 0 0 1-6.52 25.118c10.066 3.174 20.779 4.862 31.895 4.862 58.479 0 105.886-47.41 105.886-105.872 0-58.465-47.407-105.866-105.886-105.866-37.49 0-70.427 19.703-89.243 49.09C275.607 131.383 298.961 163 306.545 200z"/></g>
                </svg>
                </span>
                    <span class="pt-3 pr-2 hover:text-Lightblue-500 text-gray-700">
                   القراء
                  </span>
                </router-link>

            </div>
        </nav>
    </div>
</template>

<script>

import { mapGetters } from 'vuex';

export default {
    name: "Sidbar",

    mounted() {
        this.$store.dispatch('fetchAuthUser');

    },


    computed: {
        ...mapGetters({
            authUser: 'authUser'
        })
    }
}


</script>

<style scoped>
.active {
    background-color:#E0F2FE ;
    color: 	#03a9f4;

}
</style>
