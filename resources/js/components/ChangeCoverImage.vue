<template>
    <div>
        <div>


            <button
                ref="coverImage"

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
                                    :class="classes"  class="dz-clickable  left-0 mx-auto  absolute h-32 w-72 rounded-2xl right-0  top-36 justify-center items-center flex   "
                                    :src="coverImage.data.attributes.path"


                                />
</div>
                            </div>





                        </div>


                    </div>

                </div>

            </button>




</div>


    </div>
</template>

<script>
import Dropzone from "dropzone";
import { mapGetters } from "vuex";

export default {
    name: "ChangeCoverImage",

    props: [
        "coverImage",
        "imageWidth",
        "imageHeight",
        "location",
        "classes",
        "alt"
    ],

    data: () => {
        return {
            dropzone: null,
            image:true,

        };
    },

    mounted() {
        if (
            this.authUser.data.user_id.toString() === this.$route.params.userId
        ) {
            this.dropzone = new Dropzone(this.$refs.coverImage, this.settings);
        }
    },

    methods: {
        cover() {
            this.$emit("changeCoverImage");
        }
    },

    computed: {
        ...mapGetters({
            authUser: "authUser"
        }),

        settings() {
            return {
                paramName: "image",
                url: "/api/user-images",
                acceptedFiles: "image/*",
               clickable: ".dz-clickable",
              //  autoProcessQueue: false,
                maxFiles: 1,
                previewsContainer: ".dropzone-previews",
                previewTemplate: document.querySelector("#dz-template")
                    .innerHTML,

                params: {
                    width: this.imageWidth,
                    height: this.imageHeight,
                    location: this.location
                },
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector(
                        "meta[name=csrf-token]"
                    ).content
                },

                success: (e, res) => {


                    this.$store.dispatch("fetchAuthUser");
                    this.$store.dispatch(
                        "fetchUser",
                        this.$route.params.userId
                    );
                    this.$store.dispatch(
                        "fetchUserPosts",
                        this.$route.params.userId
                    );
                    this.cover();

                },



            };
        }
    }
};
</script>

<style scoped></style>
