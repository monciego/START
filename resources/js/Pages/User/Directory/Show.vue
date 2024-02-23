<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import {
    EnvelopeIcon,
    CalendarIcon,
    BuildingLibraryIcon,
    AcademicCapIcon,
    ArrowLeftIcon,
    ClipboardDocumentListIcon,
} from "@heroicons/vue/24/solid";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import SuccessButton from "@/Components/SuccessButton.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import dayjs from "dayjs";
import LocalizedFormat from "dayjs/plugin/localizedFormat";

const editor = ref(ClassicEditor);

const editorConfig = {
    mediaEmbed: {
        removeProviders: [
            "dailymotion",
            "spotify",
            "youtube",
            "vimeo",
            "instagram",
            "twitter",
            "googleMaps",
            "flickr",
            "facebook",
        ],
    },
    toolbar: [
        "undo",
        "redo",
        "bold",
        "italic",
        "|",
        "bulletedList",
        "numberedList",
        "|",
        "heading",
        "|",
        "outdent",
        "indent",
        "|",
        "link",
        "|",
        "blockQuote",
    ],
};

const props = defineProps(["directory", "mentoringOutlining"]);
dayjs.extend(LocalizedFormat);

const form = useForm({
    start_id: props.directory.id,
    mentoring: props.mentoringOutlining
        ? props.mentoringOutlining.mentoring
        : "",
    outlining: props.mentoringOutlining
        ? props.mentoringOutlining.outlining
        : "",
});
</script>

<template>
    <Head title="Directory" />
    <AuthenticatedLayout>
        <div class="my-10 mx-6 sm:mx-10">
            <div class="lg:flex mb-10 lg:items-center lg:justify-between">
                <div class="min-w-0 flex-1">
                    <h2
                        class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight"
                    >
                        {{ directory.user.name }}
                    </h2>
                    <div
                        class="mt-2 flex font-medium items-center text-sm text-gray-700"
                    >
                        <ClipboardDocumentListIcon
                            class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                        />
                        {{ directory.identifier_id }}
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-700">
                        <CalendarIcon
                            class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                        />
                        Submittted on:
                        {{ dayjs(directory.created_at).format("LLL") }}
                    </div>
                    <div
                        class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6"
                    >
                        <div
                            class="mt-2 flex items-center text-sm text-gray-500"
                        >
                            <EnvelopeIcon
                                class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                            />
                            <a
                                class="underline"
                                href="mailto:{{ directory.user.email }}"
                            >
                                {{ directory.user.email }}
                            </a>
                        </div>
                        <div
                            class="mt-2 flex items-center text-sm text-gray-500"
                        >
                            <BuildingLibraryIcon
                                class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                            />
                            {{ directory.user.school }}
                        </div>
                        <div
                            class="mt-2 flex items-center text-sm text-gray-500"
                        >
                            <AcademicCapIcon
                                class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400"
                            />
                            {{ directory.user.strand }}
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex lg:ml-4 lg:mt-0">
                    <span class="hidden sm:block">
                        <Link
                            :href="route('directory.index')"
                            class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                        >
                            <ArrowLeftIcon
                                class="-ml-0.5 mr-2 h-5 w-5 text-gray-400"
                            />
                            Back
                        </Link>
                    </span>
                </div>
            </div>

            <form
                @submit.prevent="form.post(route('mentoring-outlining.store'))"
            >
                <ol class="relative border-s border-gray-700">
                    <li class="mb-10 ms-10">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-yellow-500 bg-indigo-600 text-white"
                        >
                            S
                        </span>
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">
                            SEE
                        </h3>
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
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">
                            THINK
                        </h3>
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
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">
                            AIM
                        </h3>
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
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">
                            REFINE
                        </h3>
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
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">
                            TELL
                        </h3>
                        <div
                            class="prose text-base font-normal text-gray-700"
                            v-html="directory.tell"
                        ></div>
                    </li>
                    <li
                        class="mb-10 ms-10"
                        v-if="$page.props.role.superadministrator"
                    >
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-yellow-500 bg-indigo-600 text-white"
                        >
                            M
                        </span>
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">
                            MENTORING
                        </h3>
                        <div>
                            <ckeditor
                                name="mentoring"
                                id="mentoring"
                                :editor="editor"
                                v-model="form.mentoring"
                                :config="editorConfig"
                            ></ckeditor>
                        </div>
                    </li>
                    <li
                        class="ms-10"
                        v-if="$page.props.role.superadministrator"
                    >
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-yellow-500 bg-indigo-600 text-white"
                        >
                            O
                        </span>
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">
                            OUTLINING
                        </h3>
                        <div>
                            <ckeditor
                                name="outlining"
                                id="outlining"
                                :editor="editor"
                                v-model="form.outlining"
                                :config="editorConfig"
                            ></ckeditor>
                        </div>
                    </li>
                    <SuccessButton
                        v-if="$page.props.role.superadministrator"
                        class="ms-10 mt-6"
                        type="submit"
                        :disabled="
                            form.processing ||
                            !form.mentoring ||
                            !form.outlining
                        "
                    >
                        <span v-if="mentoringOutlining"> Update </span>
                        <span v-else> Submit </span>
                    </SuccessButton>
                </ol>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
