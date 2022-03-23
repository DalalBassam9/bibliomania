<template>
    <div>
<div class="bg-no-repeat bg-cover bg-center relative" style="background-image: url(https://i.pinimg.com/564x/29/44/e1/2944e13917fad78f8856c43aff813e4f.jpg);">
<div class="absolute bg-gradient-to-b from-Lightblue-500 to-Lightblue-100 opacity-75 inset-0 z-0"></div>
  <div class="min-h-screen sm:flex sm:flex-row mx-0 justify-center">
      <div class="flex-col flex  self-center p-10 sm:max-w-5xl xl:max-w-2xl  z-10">
        <div class="self-start hidden lg:flex flex-col  text-white">
          <img src="" class="mb-3">
          <h1 class="mb-3 font-bold text-5xl">اهلا بك في منصة بيلومانيا </h1>
          <p class="pr-3"> بيلومانيا تدعم القراءة في الوطن العربي</p>
        </div>
      </div>
      <div class="flex justify-center self-center  z-10">
        <div class="p-12 bg-white mx-auto rounded-2xl w-100 ">
            <div class="mb-4">
              <h3 class="font-semibold text-2xl text-center text-gray-800">تسجيل الدخول</h3>

            </div>
            <div class="space-y-5">
                        <div class="space-y-2">
                              <label for="name" class="text-sm font-medium text-gray-700 tracking-wide">البريد الالكتروني</label>
              <input class=" w-full text-base px-4 py-2 border  border-gray-300 rounded-2xl focus:outline-none focus:border-Lightblue-500" name="email" v-model="formData.email" type="text"  placeholder="ادخل البريد الالكتروني">
                <p class="text-danger" v-text="errors.email"></p>
              </div>
                          <div class="space-y-2">
              <label for="password" class="mb-5 text-sm font-medium text-gray-700 tracking-wide">
                كلمة المرور
              </label>
              <input class="w-full content-center text-base px-4 py-2 border  border-gray-300 rounded-2xl focus:outline-none  focus:border-Lightblue-500" type="password"  name="password" v-model="formData.password"  placeholder="ادخل كلمة المرور">
                 <p class="text-danger" v-text="errors.password"></p>
            </div>

              <div class="text-sm text-left">
                <a href="#" class="text-Lightblue-500 ">
                  نسيت كلمة السر؟
                </a>

            </div>
            <div>
              <button @click="login" class="w-full flex justify-center bg-Lightblue-500   text-gray-100 p-3  rounded-2xl tracking-wide font-semibold  shadow-lg cursor-pointer transition ease-in duration-500">
               تسجيل الدخول
              </button>
            </div>
            </div>
            <div class="pt-4 text-center  text-xs">
            <div>
            <span class="text-gray-900">ليس لديك حساب؟</span>
                 <router-link to="/register" class="text-gray-600 hover:text-Lightblue-500 ">انشأ حساب جديد هنا </router-link>
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
        data(){
            return {
                formData: {
                    email: '',
                    password: '',
                },
                errors: {}
            }
        },
        methods: {
            login(){
                axios.post('api/login', this.formData).then((response) => {

                    this.$router.push('/')
                }).catch((errors) => {
                    this.errors = errors.response.data.errors
                })
            }
        }
    }
</script>
