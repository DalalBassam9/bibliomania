<template>
    <div class="bg-white rounded shadow w-full  p-4 ">
        <div class="flex justify-between items-center">
            <main class="w-full">
                <div class="bg-white w-full rounded shadow my-4  p-4 ">
                    <h3 class="py-2 text-right  border-b">اضافة اقتباس</h3>

                    <div
                        class="flex justify-between my-2 border-b border-gray-300  items-center"
                    >
                        <div class="mb-6">
                            <img
                                :src="
                                    authUser.data.attributes.profile_image.data
                                        .attributes.path
                                "
                                alt="profile image for user"
                                class="w-10 h-10 rounded-full"
                            />
                        </div>

                        <div class="flex-1 w-full mt-4  flex mx-4 ">
                            <textarea
                                v-model="postMessage"
                                type="text"
                                rows="3"
                                name="body"
                                id="comment"
                                class="block w-full  pt-3 pb-2 resize-none focus:outline-none  sm:text-sm"
                                placeholder="اضف اقتباس "
                            ></textarea>
                        </div>
                    </div>

                    <div>
                        <button
                            ref="postImage"
                            class="dz-clickable flex justify-center items-center w-10 h-10 text-Lightblue-500"
                        >


                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                class="dz-clickable fill-current w-15 h-15"
                            >
                                <path
                                    d="M21.8 4H2.2c-.2 0-.3.2-.3.3v15.3c0 .3.1.4.3.4h19.6c.2 0 .3-.1.3-.3V4.3c0-.1-.1-.3-.3-.3zm-1.6 13.4l-4.4-4.6c0-.1-.1-.1-.2 0l-3.1 2.7-3.9-4.8h-.1s-.1 0-.1.1L3.8 17V6h16.4v11.4zm-4.9-6.8c.9 0 1.6-.7 1.6-1.6 0-.9-.7-1.6-1.6-1.6-.9 0-1.6.7-1.6 1.6.1.9.8 1.6 1.6 1.6z"
                                />
                            </svg>
                        </button>
                    </div>


                    <div
                        class="dropzone-previews my-2"
                    >
                        <div id="dz-template" class="hidden">
                            <div class="dz-preview dz-file-preview">
                                <div
                                    class="dz-details my-4 "
                                >
                                    <img
                                        data-dz-thumbnail
                                        class="rounded-2xl w-48 h-48"

                                    />
                                    <div class="mt-4">

                                    <button data-dz-remove class="inline-flex  items-center px-4 py-2 rounded-2xl bg-Lightblue-100 text-sm font-medium text-Lightblue-500">

    <svg
                                    class="ml-1 h-4 w-4 text-Lightblue-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                  <span>حذف</span>

                                    </button>
                                    </div>
                                </div>
                                <div class="dz-progress">
                                    <span
                                        class="dz-upload"
                                        data-dz-upload
                                    ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-shrink-0 mt-2">
                    <button
                        @click="postHandler"
                        class="flex justify-center rounded-2xl text-white items-center w-full px-4 py-2 border border-transparent text-sm font-medium shadow-sm bg-Lightblue-500 focus:outline-none"
                    >
                        <svg
                            class="-ml-1 mr-0.5 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"
                            />
                        </svg>

                        <span class="mr-1">اضافة اقتباس</span>
                    </button>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import _ from "lodash";
import { mapGetters } from "vuex";
import Dropzone from "dropzone";

export default {
    name: "NewPost",

    data: () => {
        return {
            dropzone: null
        };
    },

    mounted() {
        this.dropzone = new Dropzone(this.$refs.postImage, this.settings);
    },

    computed: {
        ...mapGetters({
            authUser: "authUser"
        }),

        postMessage: {
            get() {
                return this.$store.getters.postMessage;
            },
            set: _.debounce(function(postMessage) {
                this.$store.commit("updateMessage", postMessage);
            }, 300)
        },

        settings() {
            return {
                paramName: "image",
                url: "/api/posts",
                acceptedFiles: "image/*",
                clickable: ".dz-clickable",
                autoProcessQueue: false,
                maxFiles: 1,
                previewsContainer: ".dropzone-previews",
                previewTemplate: document.querySelector("#dz-template")
                    .innerHTML,
                params: {
                    width: 1000,
                    height: 1000
                },
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector(
                        "meta[name=csrf-token]"
                    ).content
                },
                sending: (file, xhr, formData) => {
                    formData.append("body", this.$store.getters.postMessage);
                },
                success: (event, res) => {
                    this.dropzone.removeAllFiles();

                    this.$store.commit("pushPost", res);
                },
                maxfilesexceeded: file => {
                    this.dropzone.removeAllFiles();
                    this.dropzone.addFile(file);
                }
            };
        }
    },

    methods: {


        postHandler() {
            if (this.dropzone.getAcceptedFiles().length) {
                this.dropzone.processQueue();
            } else {
                this.$store.dispatch("postMessage");
            }

            this.$store.commit("updateMessage", "");
        }
    },
    toggleModal() {
        this.isVisibility = !this.isVisibility;
    }
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
