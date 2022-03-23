<template>
     <div>


            <button
                ref="userImage"

                class="dz-clickable  flex justify-center items-center w-72 h-32 text-Lightblue-500"
            >
                <div
                    class="dropzone-previews"
                >
                    <div id="dz-template" >
                        <div class="dz-preview  dz-file-preview">
                            <div
                                class="dz-details  realtive  "
                            >


<div class="   w-12 h-32" >

                                   <img  data-dz-thumbnail
                                    :class="classes"  class="dz-clickable  left-0 mx-auto  absolute  rounded-full right-0  top-28 justify-center items-center flex   "
                                    :src="userImage.data.attributes.path"


                                />
</div>
                            </div>





                        </div>


                    </div>

                </div>

            </button>

</div>

</template>

<script>
    import Dropzone from 'dropzone';
    import { mapGetters } from 'vuex';

    export default {
        name: "UploadableImage",

        props: [
            'userImage',
            'imageWidth',
            'imageHeight',
            'location',
            'classes',
            'alt',


        ],

        data: () => {
            return {
                dropzone: null,


            }
        },

        mounted() {
            if (this.authUser.data.user_id.toString() === this.$route.params.userId) {
                this.dropzone = new Dropzone(this.$refs.userImage, this.settings);

            }

        },

        methods:{

        change()
        {
            this.$emit("changeProfile");
        },

        },

        computed: {
            ...mapGetters({
                authUser: 'authUser',
            }),



            settings() {
                return {
                    paramName: 'image',
                    url: '/api/user-images',
                    acceptedFiles: 'image/*',
     clickable: ".dz-clickable",
              //  autoProcessQueue: false,
                maxFiles: 1,
                previewsContainer: ".dropzone-previews",
                previewTemplate: document.querySelector("#dz-template")
                    .innerHTML,
                  //  autoProcessQueue: false,
                    //maxFiles: 1,
                  //  previewsContainer: '.dropzone-previews',
                 //   previewTemplate: document.querySelector('#dz-template').innerHTML,
                    params: {
                        'width': this.imageWidth,
                        'height': this.imageHeight,
                        'location': this.location,

                    },
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content,
                    },


                    success: (e, res) => {



                        this.$store.dispatch('fetchAuthUser');
                        this.$store.dispatch('fetchUser', this.$route.params.userId);
                        this.$store.dispatch('fetchUserPosts', this.$route.params.userId);
this.change();


                    },


                };
            },
        }
    }
</script>

<style scoped>

</style>
