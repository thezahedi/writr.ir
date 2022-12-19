<script setup>
import { ref } from 'vue';

let open = ref(false);

defineProps({
    posts: {
        type: Array,
        default: [],
    },
});

</script>

<template>

    <Head title="Welcome" />

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow-lg">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">فروشگاه</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">درباره</a></li>
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                <a class="" href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                سامان زاهدی
            </a>
            <p class="text-lg text-gray-600">
                برنامه‌نویس بک‌اند
            </p>
        </div>
    </header>

    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-blue-50">
        <div class="block sm:hidden">
            <div class="block md:hidden text-base font-bold uppercase text-center justify-center items-center cursor-pointer"
                @click="open = !open">
                موضوعات <i :class="open ? 'fa-chevron-down' : 'fa-chevron-up'" class="fas ml-2"></i>
            </div>
        </div>
        <div :class="open ? 'block' : 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">تکنولوژی</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">شبکه‌های اجتماعی</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">برنامه‌نویسی</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">سیاسی</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">فرهنگی</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">ورزشی</a>
            </div>
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow-lg my-4 w-full" v-for="post in posts" :key="post.id">
                <!-- Article Image -->
                <!-- <a href="#" class="hover:opacity-75">
                    <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
                </a> -->
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">
                        تکنولوژی
                    </a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">
                        {{ post.title }}
                    </a>
                    <p href="#" class="text-sm pb-3">
                        نوشته شده توسط <a href="#" class="font-semibold hover:text-gray-800">سامان زاهدی</a>,
                        در تاریخ ۲۴ خرداد ۱۴۰۱
                    </p>
                    <div class="pb-6" v-html="post.content"></div>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">ادامه‌ی مطلب <i
                            class="fas fa-arrow-right"></i></a>
                </div>
            </article>

            <!-- Pagination -->
            <div class="flex items-center py-8">
                <a href="#"
                    class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">۱</a>
                <a href="#"
                    class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">۲</a>
                <a href="#"
                    class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">
                    بعدی <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow-lg flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">درباره من</p>
                <p class="pb-2">
                    سامان زاهدی هستم متولد ۱۳۶۹ از شهر سنندج. برنامه‌نویسی رو از سال ۱۳۹۰ با زبان برنامه‌نویسی PHP شروع کردم و الان توسعه‌دهنده Laravel و VueJS هستم.
                </p>
                <a href="#"
                    class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    تماس با من
                </a>
            </div>

        </aside>

    </div>

    <footer class="w-full border-t bg-white pb-12">
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">تماس با من</a>
                <a href="#" class="uppercase px-3">حریم خصوصی</a>
                <a href="#" class="uppercase px-3">شرایط و توافقات</a>
                <a href="#" class="uppercase px-3">درباره من</a>
            </div>
            <div class="uppercase pb-6">&copy; سامان زاهدی</div>
        </div>
    </footer>

</template>
