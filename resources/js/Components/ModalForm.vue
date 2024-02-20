<script setup>
import Modal from "@/Components/Modal.vue";
import SuccessButton from "@/Components/SuccessButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { PlusIcon } from "@heroicons/vue/24/solid";
import { ref, onMounted } from "vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { useForm } from "@inertiajs/vue3";
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
    refine: "",
    tell: "",
});

const submit = () => {
    console.log("submitted");
    form.post(route("start.store"), {
        onFinish: () => (confirmingOpeningModal.value = false),
        onSuccess: () => {
            form.reset(), (currentStep.value = 1);
        },
    });
};

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
</script>

<template>
    <button
        @click="confirmOpenModal"
        class="h-10 w-10 flex items-center justify-center bg-indigo-700 text-white rounded-full"
    >
        <PlusIcon class="h-5 w-5" />
    </button>

    <Modal :show="confirmingOpeningModal" @close="closeModal">
        <form @submit.prevent="submit" class="p-6">
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
                        <h2>Refine</h2>
                    </div>

                    <ckeditor
                        name="refine"
                        id="refine"
                        :editor="editor"
                        v-model="form.refine"
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
                        <SuccessButton
                            type="submit"
                            :disabled="
                                form.processing ||
                                !form.see ||
                                !form.think ||
                                !form.aim ||
                                !form.refine ||
                                !form.tell
                            "
                            @click="nextStep"
                        >
                            Submit
                        </SuccessButton>
                    </div>
                </div>
            </div>
        </form>
    </Modal>
</template>
