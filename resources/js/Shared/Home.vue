<template>
    <div>
        <div class="p-6 sm:px-20 bg-purple-600 border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-white text-2xl">
                Welcome to your Contacts application!
            </div>

            <div class="mt-6 text-white">
                Stack: Laravel 8, Vue3, Laravel Jetstream, InertiaJs,
                TailWindcss
            </div>
        </div>

        <div class="bg-blue-50 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-400"
                    >
                        <path
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                        ></path>
                    </svg>
                    <div
                        class="
                            ml-4
                            text-lg text-gray-600
                            leading-7
                            font-semibold
                        "
                    >
                        <Link href="/csv">Upload CSV</Link>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Upload your own csv file and see the status.
                    </div>

                    <div
                        class="
                            mt-3
                            flex
                            items-center
                            text-sm
                            font-semibold
                            text-indigo-700
                        "
                    >
                        <Link href="/csv">
                            <div>Go</div>
                        </Link>
                        <div class="ml-1 text-indigo-500">
                            <svg
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                class="w-4 h-4"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-400"
                    >
                        <path
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                        ></path>
                        <!-- <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path> -->
                    </svg>
                    <div
                        class="
                            ml-4
                            text-lg text-gray-600
                            leading-7
                            font-semibold
                        "
                    >
                        <Link href="/contacts">Contacts</Link>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        See the list of your contacts
                    </div>

                    <div
                        class="
                            mt-3
                            flex
                            items-center
                            text-sm
                            font-semibold
                            text-indigo-700
                        "
                    >
                        <Link href="/contacts">
                            <div>Go</div>
                        </Link>
                        <div class="ml-1 text-indigo-500">
                            <svg
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                class="w-4 h-4"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200">
                <div class="flex items-center">
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-400"
                    >
                        <path
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                        ></path>
                    </svg>
                    <div
                        class="
                            ml-4
                            text-lg text-gray-600
                            leading-7
                            font-semibold
                        "
                    >
                        <Link href="/logs">Contact Logs</Link>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        See the logs of failed uploads
                    </div>
                    <div
                        class="
                            mt-3
                            flex
                            items-center
                            text-sm
                            font-semibold
                            text-indigo-700
                        "
                    >
                        <Link href="/logs">
                            <div>Go</div>
                        </Link>
                        <div class="ml-1 text-indigo-500">
                            <svg
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                class="w-4 h-4"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-l">
                <div class="flex items-center">
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        class="w-8 h-8 text-gray-400"
                    >
                        <path
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                        ></path>
                    </svg>
                    <div
                        class="
                            ml-4
                            text-lg text-gray-600
                            leading-7
                            font-semibold
                        "
                    >
                        Other option
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Eligendi soluta voluptatibus quidem ratione fugit, nihil
                        mollitia dolor deleniti odio, atque inventore quaerat
                        minima dolore culpa perspiciatis numquam totam facilis?
                        Numquam?
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        JetApplicationLogo,
        Link,
    },
};
</script>
