<template>
    <div>
<div class="bg-no-repeat bg-cover bg-center relative" style="background-image: url(https://i.pinimg.com/564x/29/44/e1/2944e13917fad78f8856c43aff813e4f.jpg);">
<div class="absolute bg-gradient-to-b from-Lightblue-500 to-Lightblue-100 opacity-75 inset-0 z-0"></div>
  <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
      <div class="flex-col flex  self-center p-10 sm:max-w-5xl xl:max-w-2xl  z-10">
        <div class="self-start hidden lg:flex flex-col  text-white">
          <img src="" class="mb-3">
          <h1 class="mb-3 font-bold text-5xl">اهلا بك في منصة بيلومانيا </h1>
          <p class="pr-3"> ببلومانيا تدعم القراءة في الوطن العربي</p>
        </div>
      </div>
      <div class="flex justify-center self-center  z-10">
        <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
            <div class="mb-4">
              <h3 class="font-semibold text-2xl text-center text-gray-800">انشاء حساب جديد</h3>

            </div>
            <div class="space-y-5">
                        <div class="space-y-2">
                              <label class="text-sm font-medium text-gray-700 tracking-wide">الاسم</label>
              <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-2xl focus:outline-none focus:border-Lightblue-500"  type="text" name="name" v-model="formData.name" placeholder="الاسم">
               <p class="text-danger" v-text="errors.name"></p>
              </div>
      <div class="space-y-5">
                        <div class="space-y-2">
                              <label class="text-sm font-medium text-gray-700 tracking-wide">البريد الالكتروني</label>
              <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-2xl focus:outline-none focus:border-Lightblue-500" type="text" name="email" v-model="formData.email" placeholder="ادخل البريد الالكتروني">
                 <p class="text-danger" v-text="errors.email"></p>
              </div>

                          <div class="space-y-2">
              <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                كلمة المرور
              </label>
              <input class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-2xl focus:outline-none  focus:border-Lightblue-500" type="password" name="password" v-model="formData.password" placeholder="ادخل كلمة المرور">
                <p class="text-danger" v-text="errors.password"></p>
            </div>

               <div class="space-y-2">
              <label class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
               تأكيد كلمة المرور
              </label>
              <input class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-2xl focus:outline-none  focus:border-Lightblue-500"  type="password" name="password_confirmation" v-model="formData.password_confirmation" placeholder="تأكيد كلمة المرور">
               <p class="text-danger" v-text="errors.password_confirmation"></p>
            </div>

            <div>
              <button @click="registerUser" class="w-full flex justify-center bg-Lightblue-500   text-gray-100 p-3  rounded-2xl tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
              انشاء حساب جديد
              </button>
            </div>
            </div>
            <div class="pt-4 text-center  text-xs">
            <div>
            <span class="text-gray-900">لديك حساب؟</span>
               <router-link to="/login" class="text-gray-600 hover:text-Lightblue-500 ">سجل الدخول </router-link>
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
    export default {
        data() {
            return {
                formData: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                errors: {}
            }
        },
        methods: {
      registerUser(){
                axios.post('api/register', this.formData).then((response) => {
                    console.log(response.data)
                    this.formData.name = this.formData.email = this.formData.password = this.formData.password_confirmation = ''
                    this.errors = {}
                    this.$router.push('/login')
                    this.$toaster.success('Account created successfully, now you can login!')
                }).catch((errors) => {
                    this.errors = errors.response.data.errors
                    console.log(errors.response.data.errors)
                });
            }
        }
    
    }
</script>
