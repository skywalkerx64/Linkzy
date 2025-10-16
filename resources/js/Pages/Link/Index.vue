<script setup lang="ts">
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import type { Link as LinkType, Pagination as PaginationType } from "@/types";
import LinkCard from "@/Pages/Link/Components/LinkCard.vue";
import CreateLinkModal from "@/Pages/Link/Components/CreateLinkModal.vue";
import LinkList from "./Components/LinkList.vue";

const props = defineProps<{
    links: {
        data: LinkType[];
        meta: PaginationType;
    };
}>();
</script>

<template>
    <Head title="Your Links" />
    <MainLayout>
        <div class="flex items-center">
            <h1 class="text-lg font-semibold md:text-2xl">Links</h1>
        </div>
        <div class="flex w-full justify-end">
            <CreateLinkModal />
        </div>
        <LinkList :links="props.links" />
        <!-- <div class="grid grid-cols-1 p-4 lg:p-0 gap-4 mt-4 md:grid-cols-2 lg:grid-cols-3">
            <LinkCard
                v-for="link in props.links.data"
                :key="link.id"
                :link="link"
            />
        </div> -->
    </MainLayout>
</template>
