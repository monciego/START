<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import WelcomeBanner from "@/Components/WelcomeBanner.vue";
import { Head } from "@inertiajs/vue3";
import Introduction from "@/Components/Introduction.vue";
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <WelcomeBanner class="mt-4" />
        <Introduction />
    </AuthenticatedLayout>
</template>
