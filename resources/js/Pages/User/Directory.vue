<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps(["documents", "yourDocuments"]);

import dayjs from "dayjs";
import LocalizedFormat from "dayjs/plugin/localizedFormat";

dayjs.extend(LocalizedFormat);
</script>

<template>
    <Head title="Directory" />
    <AuthenticatedLayout>
        <div v-if="$page.props.role.superadministrator">
            <ul
                role="list"
                class="grid m-4 mt-10 grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8"
            >
                <Link
                    v-for="document in documents"
                    :href="route('directory.show', { directory: document.id })"
                    :key="document.id"
                    class="relative"
                >
                    <div
                        class="group block w-full aspect-w-3 aspect-h-2 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden"
                    >
                        <img
                            src="https://static-00.iconduck.com/assets.00/folder-icon-512x410-jvths5l6.png"
                            alt=""
                            class="object-cover pointer-events-none group-hover:opacity-75"
                        />
                        <button
                            type="button"
                            class="absolute inset-0 focus:outline-none"
                        >
                            <span class="sr-only"
                                >View details for
                                {{ document.created_at }}</span
                            >
                        </button>
                    </div>
                    <p
                        class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none"
                    >
                        START &CenterDot; {{ document.user.name }}
                    </p>
                    <p
                        class="block text-sm font-medium text-gray-500 pointer-events-none"
                    >
                        {{ dayjs(document.created_at).format("LLL") }}
                    </p>
                </Link>
            </ul>
            <div
                v-if="documents.length === 0"
                class="flex flex-col gap-8 items-center justify-center"
            >
                <img class="h-64 w-full" src="/assets/empty-directory.svg" />
                <h2 class="text-center sm:text-xl uppercase font-bold">
                    Nothing can be found here
                </h2>
            </div>
        </div>

        <div v-if="$page.props.role.user">
            <ul
                role="list"
                class="grid m-4 mt-10 grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8"
            >
                <Link
                    :href="route('directory.show', { directory: document.id })"
                    v-for="document in yourDocuments"
                    :key="document.id"
                    class="relative"
                >
                    <div
                        class="group block w-full aspect-w-3 aspect-h-2 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden"
                    >
                        <img
                            src="https://static-00.iconduck.com/assets.00/folder-icon-512x410-jvths5l6.png"
                            alt=""
                            class="object-cover pointer-events-none group-hover:opacity-75"
                        />
                        <button
                            type="button"
                            class="absolute inset-0 focus:outline-none"
                        >
                            <span class="sr-only"
                                >View details for
                                {{ document.created_at }}</span
                            >
                        </button>
                    </div>
                    <p
                        class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none"
                    >
                        START
                    </p>
                    <p
                        class="block text-sm font-medium text-gray-500 pointer-events-none"
                    >
                        {{ dayjs(document.created_at).format("LLL") }}
                    </p>
                </Link>
            </ul>

            <div
                v-if="yourDocuments.length === 0"
                class="flex flex-col gap-8 items-center justify-center"
            >
                <img class="h-64 w-full" src="/assets/empty-directory.svg" />
                <h2 class="text-center sm:text-xl uppercase font-bold">
                    Nothing can be found here
                </h2>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
