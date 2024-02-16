<script setup>
import { Head, Link } from "@inertiajs/vue3";
import BackgroundGradient from "@/Components/BackgroundGradient.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <main>
        <div
            class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
            aria-hidden="true"
        >
            <BackgroundGradient />
        </div>
        <h1 class="text-center font-bold text-4xl py-6 text-indigo-600">
            STARTMO
        </h1>
        <div class="h-[45vh]">
            <img src="/assets/home-image.svg" class="h-full w-full" alt="" />
        </div>
        <p class="font-bold tracking-wider my-4 text-center text-xl">
            START.THINK.AIM.TELL
        </p>
        <div class="flex flex-col items-center justify-center gap-3">
            <Link
                v-if="canRegister"
                :href="route('register')"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-full px-7 py-2 text-center me-2 mb-2"
            >
                Create Account
            </Link>
            <p>
                Have an account?
                <Link
                    :href="route('login')"
                    class="font-semibold underline text-indigo-600 hover:text-indigo-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500"
                    >Log in</Link
                >
            </p>
        </div>
    </main>
</template>
