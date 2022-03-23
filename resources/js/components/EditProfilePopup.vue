<template>
    <div>


        <div  class="fixed z-10 inset-0 overflow-y-auto">
            <div
                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            >
                <div  @click.prevent="close"

                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                ></div>

                <div
                    class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                >

                    <div class="bg-white flex">

                        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                            <button  @click.prevent="close"
                                type="button"

                                class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none "
                            >

                                <svg
                                    class="h-6 w-6"
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
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                        <div class="sm:flex sm:items-start">

                            <div class=" flex flex-col  py-6  sm:px-6  lg:px-20">
                                <div class="mx-auto  max-w-sm lg:w-80">
                                    <div>
                                        <h2 class="mt-2 pb-7 text-2xl text-center font-extrabold text-gray-900">
                                           تعديل الملف الشخصي
                                        </h2>
                                    </div>

                <form  @submit.prevent="editProfile">
                                    <div>
                                        <label for="email"
                                              class="block text-right my-4  text-sm font-medium text-gray-700">
                                            البريد الالكتروني
                                        </label>
                                        <div class="mt-2">
                                            <input id="email"  v-model="form.email"    :class="{ 'has-error': errors.email }"   name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-3xl shadow-sm placeholder-gray-400 focus:outline-none  focus:border-Lightblue-500   sm:text-sm">
                                            <span
                                                class="error-feedback"

                                                v-if="errors.email"
                                            >
                                     <strong>{{ errors.email[0] }}</strong>
                                     </span>
                                        </div>
                                    </div>

                                    <div class="space-y-1">
                                        <label for="name" class="block my-4  text-right  text-sm font-medium text-gray-700">
                                           الاسم
                                        </label>
                                        <div class="mt-2">
                                            <input id="password"   v-model="form.name"
                                                   :class="{ 'has-error': errors.name }"     name="name" type="text" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-3xl shadow-sm placeholder-gray-400 focus:outline-none focus:border-Lightblue-500 sm:text-sm">
                                            <span
                                                class="error-feedback"
                                                v-if="errors.name"
                                            >
                      <strong>{{ errors.name[0] }}</strong>
                    </span>

                                        </div>
                                    </div>

      <div class="space-y-1">
          <label for="name" class="block my-4  text-right  text-sm font-medium text-gray-700">
                                      الوصف
                                        </label>
                    <div class="mt-2">
                      <textarea id="about" v-model="form.bio"  name="bio" rows="3" class="shadow-sm resize-none px-3 py-3  focus:outline-none  focus:border-Lightblue-500 focus mt-1 block w-full sm:text-sm border border-gray-300 rounded-3xl"></textarea>
                    </div>

                  </div>






                    <button     class="w-full flex justify-center my-5 py-2 px-4  border border-transparent rounded-2xl shadow-sm text-sm font-medium text-white bg-Lightblue-500  focus:outline-none ">
                                           تعديل
                                        </button>
  </form>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>




            </div>



        </div>


</template>

<script>
import axios from "axios";
  import _ from 'lodash'
export default {

    data() {
        return {
            showEdit: false,
            errors: {},
            loading: false,
            success: null,
            user:null,

            form:{
               name:"",
                email:"",
                bio:"",
            }

        };

    },
    mounted() {
        axios.get('/api/user-auth').
        then(res=>{
            this.user=res.data.user;
            this.form.name = this.user.name;
            this.form.email=this.user.email;
            this.form.bio=this.user.bio;


            //  this.loading=false;
        })
            .catch(error=>{
                console.log('error.res');
                //   this.loading=false;

            });

    },


    methods: {
        close()
        {
            this.$emit("toggle-modal");
        },



        editProfile() {
            this.errors = {};
            this.success = false;

            axios
                .post("/api/settings",
                    this.form

                )
                .then((response) => {
                    this.success = true;
                    this.loading = false;


                    this.$store.dispatch("fetchUser", this.$route.params.userId);

                    this.close();
                })
                .catch((error) => {
                    console.log(error.response);

                    if (error.response.status == 422) {
                        this.errors = error.response.data.errors;
                    }
                    this.loading = false;

                });
        },
    },









};
</script>
<style scoped>
.has-error{
    border-style: solid;
    border-color: red;

}
.error-feedback{
    color:red;
}

</style>
