<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import dayjs from "dayjs";
import LocalizedFormat from "dayjs/plugin/localizedFormat";

dayjs.extend(LocalizedFormat);

const props = defineProps({
    user: {
        type: Object,
    },
});

const birthDate = dayjs(props.user.birthdate, "YYYY-MM-DD");
console.log(birthDate);
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <div class="m-2 sm:m-6">
            <div class="px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">
                    {{ user.name }} Profile
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">
                    Personal details and information.
                </p>
            </div>
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Full name
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ user.name }}
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Email address
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            <a
                                href="mailto:{{ user.email }}"
                                class="text-indigo-600"
                            >
                                {{ user.email }}
                            </a>
                        </dd>
                    </div>
                </dl>
                <template v-if="$page.props.role.user">
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            School
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ user.school }}
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Strand
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ user.strand }}
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Birthdate
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ dayjs(user.birthdate).format("MMMM D, YYYY") }}
                        </dd>
                    </div>
                    <div
                        class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                    >
                        <dt class="text-sm font-medium leading-6 text-gray-900">
                            Age
                        </dt>
                        <dd
                            class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                        >
                            {{ dayjs().diff(birthDate, "year") }}
                        </dd>
                    </div>
                </template>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
