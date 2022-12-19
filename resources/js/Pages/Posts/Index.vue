<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Card from '@/Components/Card.vue';

defineProps({
    posts: {
        type: Array,
        default: [],
    },
});
</script>

<template>

    <Head title="Posts" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <div>
                    پست‌ها
                </div>
                <Link class="text-sm bg-green-500 hover:bg-green-700 text-white px-2 py-1" :href="route('posts.create')">
                <span class="block md:hidden">+</span>
                <span class="hidden md:block">ایجاد پست جدید</span>
                </Link>
            </div>
        </template>

        <Card v-if="posts.length > 0" padding="0">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-center">
                                <thead class="border-b bg-gray-50">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                            #
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                            عنوان
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                            اکشن
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b" v-for="post in posts" :key="post.id">
                                        <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap">
                                            {{ post.id }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ post.title }}
                                        </td>
                                        <td
                                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left">
                                            <Link class="text-sm bg-blue-500 hover:bg-blue-700 text-white px-2 py-1"
                                                :href="route('posts.edit', post.id)">ویرایش</Link>
                                            <Link class="text-sm bg-red-500 hover:bg-red-700 text-white px-2 py-1"
                                                method="delete" as="button" :href="route('posts.destroy', post.id)">حذف
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </Card>

        <Card v-else>
            هیچ پستی وجود ندارد.
            <Link :href="route('posts.create')"
                class="text-sm px-1 py-0.5 bg-green-500 hover:bg-green-700 rounded-sm text-white">ایجاد پست</Link>
        </Card>
    </AuthenticatedLayout>
</template>