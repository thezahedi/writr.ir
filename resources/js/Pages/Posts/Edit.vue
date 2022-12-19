<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import Editor from '@tinymce/tinymce-vue';

const props = defineProps({
    post: Object,
});

const form = useForm({
    title: props.post.title,
    content: props.post.content,
});
</script>

<template>

    <Head title="Create Post" />

    <AuthenticatedLayout>
        <template #header>
            پست‌ها
        </template>

        <Card>
            <form @submit.prevent="form.patch(route('posts.update', props.post.id))" class="grid gap-y-6">
                <div>
                    <label for="title">عنوان مطلب</label>
                    <input type="text" v-model="form.title" class="w-full rtl">
                    <span v-if="form.errors.title" class="inline-block bg-red-500 text-white text-sm px-2 py-1 mt-2">{{
                            form.errors.title
                    }}</span>
                </div>
                <div>
                    <label for="title">متن مطلب</label>
                    <Editor api-key="no-api-key" :init="{
                        plugins: 'lists link image table code wordcount directionality rtl ltr',
                        directionality: 'rtl',
                        language: 'fa',
                    }" id="content" v-model="form.content" class="w-full" rows="14"></Editor>
                    <span v-if="form.errors.content"
                        class="inline-block bg-red-500 text-white text-sm px-2 py-1 mt-2">{{ form.errors.content
                        }}</span>
                </div>
                <div class="text-left">
                    <span v-if="form.processing" class="text-gray-700">در حال ایجاد</span>
                    <button as="submit"
                        class="bg-green-500 hover:bg-green-700 text-white px-2 py-1 cursor-pointer">ایجاد</button>
                </div>
            </form>
        </Card>
    </AuthenticatedLayout>
</template>
