<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';

defineProps({
    posts: Array,
});
</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            داشبرد
        </template>

        <Card v-if="posts.length > 0">
            <table class="w-full">
                <tr v-for="post in posts" :key="post.id">
                    <td>
                        {{ post.title }}
                    </td>
                    <td>
                        name
                    </td>
                    <td>
                        name
                    </td>
                </tr>
            </table>
        </Card>

        <Card v-else>
            هیچ پستی وجود ندارد. <Link :href="route('posts.create')" class="text-sm px-1 py-0.5 bg-green-500 hover:bg-green-700 rounded-sm text-white">ایجاد پست</Link>
        </Card>
    </AuthenticatedLayout>
</template>
