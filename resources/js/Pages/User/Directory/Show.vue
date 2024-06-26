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
import relativeTime from "dayjs/plugin/relativeTime";

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

const props = defineProps([
    "directory",
    "mentoringOutlining",
    "replies",
    "userNotificationReplies",
]);
dayjs.extend(LocalizedFormat);
dayjs.extend(relativeTime);

const form = useForm({
    start_id: props.directory.id,
    mentoring: props.mentoringOutlining
        ? props.mentoringOutlining.mentoring
        : "",
    outlining: props.mentoringOutlining
        ? props.mentoringOutlining.outlining
        : "",
});

const formReply = useForm({
    start_id: props.directory.id,
    my_id: props.directory.user.id,
    body: "",
});

const markReadForm = useForm({
    userNotificationReplies: props.userNotificationReplies.filter(
        (notification) => notification.start_id === props.directory.id
    ),
});

const countNotifications = (documentId) => {
    return props.userNotificationReplies.filter(
        (notification) => notification.start_id === documentId
    ).length;
};
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
                    <div
                        class="mt-4"
                        v-if="
                            $page.props.role.user &&
                            countNotifications(directory.id) > 0
                        "
                    >
                        You have
                        <span class="font-bold">
                            {{ countNotifications(directory.id) }}
                        </span>
                        unread
                        {{
                            countNotifications(directory.id) === 1
                                ? "reply"
                                : "replies"
                        }}
                        <form
                            class="inline-block"
                            @submit.prevent="
                                markReadForm.post(
                                    route('reply-notification.store')
                                )
                            "
                        >
                            <button
                                class="mt-4 ms-2 bg-indigo-700 inline-block text-white p-1 px-3 hover:bg-indigo-600 ring-1 ring-white outline outline-indigo-500 rounded"
                            >
                                <span class="text-xs"> Mark all as read </span>
                            </button>
                        </form>
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
                            class="prose-xl text-base font-normal text-gray-700"
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
                            class="prose-xl text-base font-normal text-gray-700"
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
                            class="prose-xl text-base font-normal text-gray-700"
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
                            class="prose-xl text-base font-normal text-gray-700"
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
                            class="prose-xl text-base font-normal text-gray-700"
                            v-html="directory.tell"
                        ></div>
                        <ol
                            v-if="
                                $page.props.role.superadministrator ||
                                replies.length > 0
                            "
                            class="relative mt-6 border-s border-gray-700"
                        >
                            <li
                                v-for="reply in replies"
                                :key="reply.id"
                                class="mb-10 ms-6"
                            >
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-gray-900 bg-slate-900"
                                >
                                    <img
                                        class="rounded-full shadow-lg"
                                        src="https://upload.wikimedia.org/wikipedia/en/7/75/Pangasinan_State_University_logo.png"
                                        alt=""
                                    />
                                </span>
                                <Link
                                    :href="
                                        route('profile.index', {
                                            user: reply.user.id,
                                        })
                                    "
                                    class="pb-4 font-medium text-indigo-700"
                                >
                                    {{ reply.user.name }}
                                </Link>

                                <div
                                    class="items-center justify-between p-4 border rounded-lg shadow-sm sm:flex bg-slate-900 border-gray-600"
                                >
                                    <time
                                        class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0"
                                        >{{
                                            dayjs(reply.created_at).fromNow()
                                        }}</time
                                    >
                                    <div
                                        class="prose-xl text-sm font-normal text-gray-300"
                                        v-html="reply.body"
                                    ></div>
                                </div>
                            </li>
                            <li class="mb-10 ms-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900"
                                >
                                    <img
                                        class="rounded-full shadow-lg"
                                        src="https://upload.wikimedia.org/wikipedia/en/7/75/Pangasinan_State_University_logo.png"
                                        alt=""
                                    />
                                </span>
                                <div
                                    class="p-4 border rounded-lg shadow-sm bg-slate-900 border-gray-600"
                                >
                                    <div
                                        class="items-center justify-between mb-3 sm:flex"
                                    >
                                        <div
                                            class="text-sm font-normal text-gray-500 lex dark:text-gray-300"
                                        >
                                            Write your coment here
                                        </div>
                                    </div>
                                    <div
                                        class="p-3 border rounded-lg bg-slate-100 border-gray-500"
                                    >
                                        <form
                                            @submit.prevent="
                                                formReply.post(
                                                    route('reply.store'),
                                                    {
                                                        onSuccess: () =>
                                                            formReply.reset(),
                                                    }
                                                )
                                            "
                                        >
                                            <div>
                                                <ckeditor
                                                    name="body"
                                                    id="body"
                                                    :editor="editor"
                                                    v-model="formReply.body"
                                                    :config="editorConfig"
                                                ></ckeditor>
                                            </div>
                                            <SuccessButton
                                                class="mt-4"
                                                type="submit"
                                                :disabled="
                                                    formReply.processing ||
                                                    !formReply.body
                                                "
                                            >
                                                Submit
                                            </SuccessButton>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </li>
                    <li
                        class="mb-10 ms-10"
                        v-if="$page.props.role.user && mentoringOutlining"
                    >
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-yellow-500 bg-indigo-600 text-white"
                        >
                            M
                        </span>
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">
                            Mentoring
                        </h3>
                        <div
                            class="prose-xl text-base font-normal bg-slate-900 rounded p-4 text-white"
                            v-html="mentoringOutlining.mentoring"
                        ></div>
                    </li>
                    <li
                        class="mb-10 ms-10"
                        v-if="$page.props.role.user && mentoringOutlining"
                    >
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 rounded-full -start-3 ring-8 ring-yellow-500 bg-indigo-600 text-white"
                        >
                            O
                        </span>
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">
                            Outlining
                        </h3>
                        <div
                            class="prose-xl text-base font-normal bg-slate-900 rounded p-4 text-white"
                            v-html="mentoringOutlining.outlining"
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
