<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps(["directory"]);

import dayjs from "dayjs";
import LocalizedFormat from "dayjs/plugin/localizedFormat";

dayjs.extend(LocalizedFormat);
</script>

<template>
    <Head title="Directory" />
    <AuthenticatedLayout> {{ directory }}</AuthenticatedLayout>
</template>
