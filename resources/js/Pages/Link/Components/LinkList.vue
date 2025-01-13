<script setup lang="ts">
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import type { Link as LinkType, Pagination as PaginationType } from "@/types";
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/Components/ui/table";

import { Button } from "@/Components/ui/button";

const props = defineProps<{
    links: {
        data: LinkType[];
        meta: PaginationType;
    };
}>();

const links = props.links.data;

const meta = props.links.meta;
const count = 100
</script>

<template>
    <Table>
        <TableCaption>A list of your links.</TableCaption>
        <TableHeader>
            <TableRow>
                <TableHead> Invoice </TableHead>
                <TableHead>Status</TableHead>
                <TableHead>Method</TableHead>
                <TableHead class="text-right"> Amount </TableHead>
            </TableRow>
        </TableHeader>
        <TableBody>
            <TableRow v-for="link in links" :key="link.id">
                <TableCell class="font-medium">
                    {{ link.title }}
                </TableCell>
                <TableCell>{{ link.description }}</TableCell>
                <TableCell>{{ link.original_url }}</TableCell>
                <TableCell class="text-right">
                    {{ link.visits }}
                </TableCell>
            </TableRow>
        </TableBody>
    </Table>

    <div class="flex gap-2 mt-4">
        <Button
            :variant="link.active ? 'default' : 'outline'"
            v-for="link in meta.links"
            :key="link.url"
        >
            <Link :href="link.url" v-html="link.label"></Link>
        </Button>
    </div>
</template>
