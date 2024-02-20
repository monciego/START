<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

defineProps(["directory"]);

import dayjs from "dayjs";
import LocalizedFormat from "dayjs/plugin/localizedFormat";

dayjs.extend(LocalizedFormat);
</script>

<template>
    <Head title="Directory" />
    <AuthenticatedLayout>
        <ol class="relative mt-10 mx-6 sm:mx-10 border-s border-gray-700">
            <li class="mb-10 ms-10">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-yellow-500 bg-indigo-600 text-white"
                >
                    S
                </span>
                <h3 class="mb-2 text-lg font-semibold text-gray-900">SEE</h3>
                <div
                    class="prose text-base font-normal text-gray-700"
                    v-html="directory.see"
                ></div>
            </li>
            <li class="mb-10 ms-10">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-yellow-500 bg-indigo-600 text-white"
                >
                    T
                </span>
                <h3 class="mb-2 text-lg font-semibold text-gray-900">THINK</h3>
                <div
                    class="prose text-base font-normal text-gray-700"
                    v-html="directory.think"
                ></div>
            </li>
            <li class="mb-10 ms-10">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-yellow-500 bg-indigo-600 text-white"
                >
                    A
                </span>
                <h3 class="mb-2 text-lg font-semibold text-gray-900">AIM</h3>
                <div
                    class="prose text-base font-normal text-gray-700"
                    v-html="directory.aim"
                ></div>
            </li>
            <li class="mb-10 ms-10">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-yellow-500 bg-indigo-600 text-white"
                >
                    R
                </span>
                <h3 class="mb-2 text-lg font-semibold text-gray-900">REFINE</h3>
                <div
                    class="prose text-base font-normal text-gray-700"
                    v-html="directory.refine"
                ></div>
            </li>
            <li class="mb-10 ms-10">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-yellow-500 bg-indigo-600 text-white"
                >
                    T
                </span>
                <h3 class="mb-2 text-lg font-semibold text-gray-900">TELL</h3>
                <div
                    class="prose text-base font-normal text-gray-700"
                    v-html="directory.tell"
                ></div>
            </li>
        </ol>
    </AuthenticatedLayout>
</template>
