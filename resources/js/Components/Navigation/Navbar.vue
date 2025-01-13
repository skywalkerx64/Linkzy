<script lang="ts" setup>
import { ref } from "vue";
import {
    NavigationMenu,
    NavigationMenuContent,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    NavigationMenuTrigger,
} from "@/Components/ui/navigation-menu";
import {
    Sheet,
    SheetContent,
    SheetFooter,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from "@/Components/ui/sheet";

import { Button } from "@/Components/ui/button";
import { Separator } from "@/Components/ui/separator";

import { Menu, Github } from "lucide-vue-next";
import ToggleTheme from "@/Components/Utils/ToggleTheme.vue";
import ApplicationLogo from "../ApplicationLogo.vue";

interface RouteProps {
    href: string;
    label: string;
}

interface FeatureProps {
    title: string;
    description: string;
}

const routeList: RouteProps[] = [
    {
        href: "#pricing",
        label: "Pricing",
    },
    {
        href: "#contact",
        label: "Contact",
    },
    {
        href: "#faq",
        label: "FAQ",
    },
];

const featureList: FeatureProps[] = [
    {
        title: "Quick Link Shortening",
        description:
            "Transform long, messy URLs into sleek and compact links in seconds.",
    },
    {
        title: "Analytics Dashboard",
        description: "Track clicks, geographic data, and device types.",
    },
    {
        title: "Secure",
        description: "Reliable and privacy-focused service.",
    },
];

const isOpen = ref<boolean>(false);
</script>

<template>
    <header
        :class="{
            'w-[90%] md:w-[70%] lg:w-[75%] lg:max-w-screen-xl top-5 mx-auto sticky z-40 flex justify-between items-center p-2 bg-card': true,
        }"
    >


        <a href="/" class="font-bold text-lg flex items-center gap-2"><ApplicationLogo class="size-8" /> Linkzy</a>
        <!-- Mobile -->
        <div class="flex items-center lg:hidden">
            <Sheet v-model:open="isOpen">
                <SheetTrigger as-child>
                    <Menu @click="isOpen = true" class="cursor-pointer" />
                </SheetTrigger>

                <SheetContent
                    side="left"
                    class="flex flex-col justify-between rounded-tr-2xl rounded-br-2xl bg-card"
                >
                    <div>
                        <SheetHeader class="mb-4 ml-4">
                            <SheetTitle class="flex items-center">
                                <a href="/" class="flex items-center gap-2">
                                    <ApplicationLogo class="size-8"/>
                                    Linkzy
                                </a>
                            </SheetTitle>
                        </SheetHeader>

                        <div class="flex flex-col gap-2">
                            <Button
                                v-for="{ href, label } in routeList"
                                :key="label"
                                as-child
                                variant="ghost"
                                class="justify-start text-base"
                            >
                                <a @click="isOpen = false" :href="href">
                                    {{ label }}
                                </a>
                            </Button>
                        </div>
                    </div>

                    <SheetFooter
                        class="flex-col sm:flex-col justify-start items-start"
                    >
                        <Separator class="mb-2" />

                        <ToggleTheme />
                    </SheetFooter>
                </SheetContent>
            </Sheet>
        </div>

        <!-- Desktop -->
        <NavigationMenu class="hidden lg:block sticky">
            <NavigationMenuList>
                <NavigationMenuItem>
                    <NavigationMenuTrigger class="bg-card text-base">
                        Features
                    </NavigationMenuTrigger>
                    <NavigationMenuContent>
                        <div class="grid w-[600px] grid-cols-2 gap-5 p-4">
                            <img
                                src="https://www.radix-vue.com/logo.svg"
                                alt="Beach"
                                class="h-full w-full rounded-md object-cover"
                            />
                            <ul class="flex flex-col gap-2">
                                <li
                                    v-for="{
                                        title,
                                        description,
                                    } in featureList"
                                    :key="title"
                                    class="rounded-md p-3 text-sm hover:bg-muted"
                                >
                                    <p
                                        class="mb-1 font-semibold leading-none text-foreground"
                                    >
                                        {{ title }}
                                    </p>
                                    <p
                                        class="line-clamp-2 text-muted-foreground"
                                    >
                                        {{ description }}
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </NavigationMenuContent>
                </NavigationMenuItem>

                <NavigationMenuItem>
                    <NavigationMenuLink asChild>
                        <Button
                            v-for="{ href, label } in routeList"
                            :key="label"
                            as-child
                            variant="ghost"
                            class="justify-start text-base"
                        >
                            <a :href="href">
                                {{ label }}
                            </a>
                        </Button>
                    </NavigationMenuLink>
                </NavigationMenuItem>
            </NavigationMenuList>
        </NavigationMenu>

        <div class="hidden lg:flex gap-2 text-base">
            <Button as-child aria-label="Login" variant="ghost">
                <a aria-label="Login" href="login"> Login </a>
            </Button>

            <Button as-child aria-label="Login">
                <a aria-label="View on GitHub" href="register"> Sign up Free </a>
            </Button>

            <ToggleTheme />

            <Button as-child variant="ghost" aria-label="View on GitHub">
                <a
                    aria-label="View on GitHub"
                    href="https://github.com/skywalkerx64"
                    target="_blank"
                >
                    <Github class="size-5" />
                </a>
            </Button>
        </div>
    </header>
</template>
