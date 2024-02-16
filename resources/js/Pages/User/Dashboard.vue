<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import WelcomeBanner from "@/Components/WelcomeBanner.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <WelcomeBanner class="mt-4" />
    </AuthenticatedLayout>
</template>
