<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Modal from "@/Components/Modal.vue";
import WelcomeBanner from "@/Components/WelcomeBanner.vue";
import SuccessButton from "@/Components/SuccessButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

const showInstallButton = ref(false);
let deferredPrompt = null;

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

onMounted(() => {
    window.addEventListener("beforeinstallprompt", (event) => {
        event.preventDefault();
        deferredPrompt = event;
        showInstallButton.value = true;
    });
});

const installPwa = () => {
    if (deferredPrompt) {
        deferredPrompt.prompt();

        deferredPrompt.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === "accepted") {
                console.log("User accepted the install prompt");
            } else {
                console.log("User dismissed the install prompt");
            }

            showInstallButton.value = false;
        });
    }
};

// Modal
const confirmingOpeningModal = ref(false);

const confirmOpenModal = () => {
    confirmingOpeningModal.value = true;
};

const closeModal = () => {
    confirmingOpeningModal.value = false;
};

const currentStep = ref(1);

const form = useForm({
    see: "",
    think: "",
    aim: "",
    review: "",
    tell: "",
});

const nextStep = () => {
    if (currentStep.value < 5) {
        currentStep.value++;
    }
};

const prevStep = () => {
    if (currentStep.value > 1) {
        currentStep.value--;
    }
};

const goToStep = (step) => {
    currentStep.value = step;
};

const submitForm = () => {
    // Handle form submission logic here
    console.log("Form submitted:", formData.value);
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <WelcomeBanner class="mt-4" />
        <button
            @click="confirmOpenModal"
            class="h-10 w-10 bg-indigo-700 text-white rounded-full"
        >
            +
        </button>

        <Modal :show="confirmingOpeningModal" @close="closeModal">
            <form class="p-6">
                <ol class="flex items-center w-full">
                    <li
                        class="flex w-full items-center text-white after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block after:border-gray-700"
                    >
                        <span
                            @click="goToStep(1)"
                            class="cursor-pointer flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 shrink-0"
                            :class="{
                                'bg-blue-500 text-white': currentStep === 1,
                                'bg-slate-800 text-white': currentStep !== 1,
                            }"
                        >
                            S
                        </span>
                    </li>
                    <li
                        class="flex text-white w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block after:border-gray-700"
                    >
                        <span
                            @click="goToStep(2)"
                            class="cursor-pointer flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 shrink-0"
                            :class="{
                                'bg-blue-500 text-white': currentStep === 2,
                                'bg-slate-800 text-white': currentStep !== 2,
                            }"
                        >
                            T
                        </span>
                    </li>
                    <li
                        class="flex text-white w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block after:border-gray-700"
                    >
                        <span
                            @click="goToStep(3)"
                            class="cursor-pointer flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 shrink-0"
                            :class="{
                                'bg-blue-500 text-white': currentStep === 3,
                                'bg-slate-800 text-white': currentStep !== 3,
                            }"
                        >
                            A
                        </span>
                    </li>
                    <li
                        class="flex text-white w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-4 after:inline-block after:border-gray-700"
                    >
                        <span
                            @click="goToStep(4)"
                            class="cursor-pointer flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 shrink-0"
                            :class="{
                                'bg-blue-500 text-white': currentStep === 4,
                                'bg-slate-800 text-white': currentStep !== 4,
                            }"
                        >
                            R
                        </span>
                    </li>
                    <li class="flex text-white items-center">
                        <span
                            @click="goToStep(5)"
                            class="cursor-pointer flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 shrink-0"
                            :class="{
                                'bg-blue-500 text-white': currentStep === 5,
                                'bg-slate-800 text-white': currentStep !== 5,
                            }"
                        >
                            T
                        </span>
                    </li>
                </ol>
                <div>
                    <!-- v-show="currentStep === 1" -->
                    <div v-show="currentStep === 1">
                        <div class="my-4">
                            <h2>See</h2>
                        </div>

                        <ckeditor
                            name="see"
                            id="see"
                            :editor="editor"
                            v-model="form.see"
                            :config="editorConfig"
                        ></ckeditor>

                        <div class="mt-4 flex items-center justify-end">
                            <SuccessButton type="button" @click="nextStep">
                                Next</SuccessButton
                            >
                        </div>
                    </div>
                    <div v-show="currentStep === 2">
                        <div class="my-4">
                            <h2>Think</h2>
                        </div>

                        <ckeditor
                            name="think"
                            id="think"
                            :editor="editor"
                            v-model="form.think"
                            :config="editorConfig"
                        ></ckeditor>

                        <div class="flex items-center justify-between mt-4">
                            <SecondaryButton type="button" @click="prevStep">
                                Prev</SecondaryButton
                            >
                            <SuccessButton type="button" @click="nextStep">
                                Next</SuccessButton
                            >
                        </div>
                    </div>
                    <div v-show="currentStep === 3">
                        <div class="my-4">
                            <h2>Aim</h2>
                        </div>

                        <ckeditor
                            name="aim"
                            id="aim"
                            :editor="editor"
                            v-model="form.aim"
                            :config="editorConfig"
                        ></ckeditor>

                        <div class="flex items-center justify-between mt-4">
                            <SecondaryButton type="button" @click="prevStep">
                                Prev</SecondaryButton
                            >
                            <SuccessButton type="button" @click="nextStep">
                                Next</SuccessButton
                            >
                        </div>
                    </div>
                    <div v-show="currentStep === 4">
                        <div class="my-4">
                            <h2>R</h2>
                        </div>

                        <ckeditor
                            name="review"
                            id="see"
                            :editor="editor"
                            v-model="form.review"
                            :config="editorConfig"
                        ></ckeditor>
                        <div class="flex items-center justify-between mt-4">
                            <SecondaryButton type="button" @click="prevStep">
                                Prev</SecondaryButton
                            >
                            <SuccessButton type="button" @click="nextStep">
                                Next</SuccessButton
                            >
                        </div>
                    </div>
                    <div v-show="currentStep === 5">
                        <div class="my-4">
                            <h2>Tell</h2>
                        </div>

                        <ckeditor
                            name="tell"
                            id="tell"
                            :editor="editor"
                            v-model="form.tell"
                            :config="editorConfig"
                        ></ckeditor>

                        <div class="flex items-center justify-between mt-4">
                            <SecondaryButton type="button" @click="prevStep">
                                Prev</SecondaryButton
                            >
                            <SuccessButton type="submit" @click="nextStep">
                                Submit
                            </SuccessButton>
                        </div>
                    </div>
                </div>
            </form>
        </Modal>
    </AuthenticatedLayout>
</template>
