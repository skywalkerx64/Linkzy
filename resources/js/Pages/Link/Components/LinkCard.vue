<script setup lang="ts">
import { toast } from 'vue-sonner'

import {
    Card,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/Components/ui/card";

import {
    Tooltip,
    TooltipContent,
    TooltipProvider,
    TooltipTrigger,
} from "@/components/ui/tooltip";

import { Badge } from "@/Components/ui/badge";

import { Button } from "@/Components/ui/button";

import { Earth, Calendar, Copy, Share, Pen, QrCode } from "lucide-vue-next";

import type { Link } from "@/types";

const props = defineProps<{
    link: Link;
}>();

async function copyURL(url: string) {
    console.log(url);
    try {
        await navigator.clipboard.writeText(url);
        toast('Copied to clipboard !', {
            description: url,
        });
    } catch ($e) {
        toast('Failed to copy to clipboard !');
    }
}
</script>

<template>
    <Card>
        <CardHeader>
            <div class="flex items-center gap-6">
                <img
                    v-if="link.favicon"
                    :src="`data:image/png;base64,${link.favicon}`"
                    class="rounded-full size-6"
                />
                <Earth v-else />
                <CardTitle class="text-xl"
                    ><a :href="link.shortened_url" class="hover:text-primary">{{
                        link.shortened_url
                    }}</a></CardTitle
                >
            </div>
            <CardDescription class="mt-4"
                ><a :href="link.original_url" class="hover:text-primary">{{
                    link.original_url
                }}</a></CardDescription
            >
        </CardHeader>
        <CardFooter class="flex items-center justify-between gap-4">
            <div class="flex items-center justify-center gap-2">
                <Badge
                    class="bg-neutral-100 hover:bg-neutral-200 dark:text-white dark:bg-neutral-800 dark:hover:bg-neutral-900"
                    ><Calendar class="size-4 mr-2" />
                    {{ link.created_at }}</Badge
                >
            </div>
            <div class="flex items-center gap-4">
                <TooltipProvider>
                    <Tooltip>
                        <TooltipTrigger as-child>
                            <Button variant="outline" size="sm" @click="copyURL(link.shortened_url)"
                                ><Copy class="size-4"
                            /></Button>
                        </TooltipTrigger>
                        <TooltipContent>
                            <p>Copy to clipboard</p>
                        </TooltipContent>
                    </Tooltip>
                    <Tooltip>
                        <TooltipTrigger as-child>
                            <Button variant="outline" size="sm"
                                ><Share class="size-4"
                            /></Button>
                        </TooltipTrigger>
                        <TooltipContent>
                            <p>Share link</p>
                        </TooltipContent>
                    </Tooltip>
                    <Tooltip>
                        <TooltipTrigger as-child>
                            <Button variant="outline" size="sm"
                                ><QrCode class="size-4"
                            /></Button>
                        </TooltipTrigger>
                        <TooltipContent>
                            <p>Show QRCode</p>
                        </TooltipContent>
                    </Tooltip>

                    <Tooltip>
                        <TooltipTrigger as-child>
                            <Button variant="outline" size="sm"
                                ><Pen class="size-4"
                            /></Button>
                        </TooltipTrigger>
                        <TooltipContent>
                            <p>Edit link</p>
                        </TooltipContent>
                    </Tooltip>
                </TooltipProvider>
            </div>
        </CardFooter>
    </Card>
</template>
