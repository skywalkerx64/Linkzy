<script setup lang="ts">
import { Button } from "@/Components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/Components/ui/card";
import { Input } from "@/Components/ui/input";
import { Label } from "@/Components/ui/label";
import { ArrowRight } from "lucide-vue-next";
import { ref } from "vue";

const link = ref("");

function validateLink() {
    const urlPattern = new RegExp(
        "^(https?:\\/\\/)?" + // protocol
            "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|" + // domain name
            "((\\d{1,3}\\.){3}\\d{1,3}))" + // OR ip (v4) address
            "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" + // port and path
            "(\\?[;&a-z\\d%_.~+=-]*)?" + // query string
            "(\\#[-a-z\\d_]*)?$",
        "i"
    ); // fragment locator
    if (!urlPattern.test(link.value)) {
        // alert("Please enter a valid URL.");
    }
}
</script>

<template>
    <div class="flex justify-center">
        <Card class="w-3/5 rounded-3xl bg-gray-50 dark:bg-neutral-900">
            <CardHeader>
                <CardTitle class="text-4xl font-bold"
                    ><h1>Shorten a long link</h1></CardTitle
                >
                <CardDescription>First link is Free 🚀</CardDescription>
            </CardHeader>
            <CardContent class="mt-4">
                <form>
                    <div class="grid items-center w-full gap-4">
                        <div class="flex flex-col space-y-1.5">
                            <Label for="link" class="font-bold text-2xl my-4"
                                >Paste your link here</Label
                            >
                            <Input
                                id="link"
                                placeholder="https://example.com/my-very-long-link"
                                class="h-12 text-lg bg-white dark:bg-neutral-800 text-black dark:text-white"
                            />
                        </div>
                    </div>
                </form>
            </CardContent>
            <CardFooter class="flex justify-between px-6 pb-6">
                <Button class="font-bold group/arrow text-lg" size="lg">
                    Get your link for free
                    <ArrowRight
                        class="size-5 ml-2 group-hover/arrow:translate-x-1 transition-transform"
                    />
                </Button>
            </CardFooter>
        </Card>
    </div>
</template>
