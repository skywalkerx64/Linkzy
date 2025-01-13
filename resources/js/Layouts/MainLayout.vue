<script setup lang="ts">
import { Badge } from '@/Components/ui/badge'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import { Button } from '@/Components/ui/button'
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/Components/ui/card'
import { Input } from '@/Components/ui/input'
import { Sheet, SheetContent, SheetTrigger } from '@/Components/ui/sheet'
import { LayoutDashboard, Link as LinkIcon, Home, LineChart, Menu, Package, Package2, Search, ShoppingCart, Users } from 'lucide-vue-next'
import UserProfile from '@/Components/Auth/UserProfile.vue'
import ToggleTheme from '@/Components/Utils/ToggleTheme.vue'
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import { Toaster } from '@/Components/ui/sonner'

const sidebarLinks = [
    { href: 'dashboard', label: 'Dashboard', icon: LayoutDashboard },
    { href: route('links.index'), label: 'Links', icon: LinkIcon },
    { href: 'analytics', label: 'Analytics', icon: LineChart },
]


const page = usePage()

const user = computed(() => page.props.auth.user)

</script>

<template>
  <div class="grid min-h-screen w-full md:grid-cols-[220px_1fr] lg:grid-cols-[280px_1fr]">
    <div class="hidden border-r bg-muted/40 md:relative md:block">
      <div class="h-full w-[220px] fixed max-h-screen flex flex-col gap-2">
        <div class="flex h-14 items-center border-b px-4 lg:h-[60px] lg:px-6">
          <a href="/" class="flex items-center gap-2 font-semibold">
            <ApplicationLogo class="h-8 w-8" />
            <span class="">Linkzy</span>
          </a>
        </div>
        <div class="flex-1">
          <nav class="grid items-start px-2 text-sm font-medium lg:px-4">
            <Link v-for="sidebarLink in sidebarLinks" :key="sidebarLink.label" :href="sidebarLink.href" :class="route().current(sidebarLink.href) ? 'bg-muted text-primary' : ''" class="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary hover:bg-muted">
              <component :is="sidebarLink.icon" class="h-4 w-4" />
              {{ sidebarLink.label }}
            </Link>
          </nav>
        </div>
        <div class="mt-auto p-4">
          <Card>
            <CardHeader class="p-2 pt-0 md:p-4">
              <CardTitle>Upgrade to Pro</CardTitle>
              <CardDescription>
                Unlock all features and get unlimited access to our support
                team.
              </CardDescription>
            </CardHeader>
            <CardContent class="p-2 pt-0 md:p-4 md:pt-0">
              <Button size="sm" class="w-full">
                Upgrade
              </Button>
            </CardContent>
          </Card>
        </div>
      </div>
    </div>

    <div class="flex flex-col">
        <!-- Mobile Nav -->
        <header class="flex h-14 items-center gap-4 border-b bg-muted/40 px-4 lg:h-[60px] lg:px-6">
        <Sheet>
            <SheetTrigger as-child>
            <Button
                variant="outline"
                size="icon"
                class="shrink-0 md:hidden"
            >
                <Menu class="h-5 w-5" />
                <span class="sr-only">Toggle navigation menu</span>
            </Button>
            </SheetTrigger>
            <SheetContent side="left" class="flex flex-col">
            <nav class="grid gap-2 text-lg font-medium">
                <a
                href="#"
                class="flex items-center gap-2 text-lg font-semibold"
                >
                <Package2 class="h-6 w-6" />
                <span class="sr-only">Acme Inc</span>
                </a>
                <a
                href="#"
                class="mx-[-0.65rem] flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground"
                >
                <Home class="h-5 w-5" />
                Dashboard
                </a>
                <a
                href="#"
                class="mx-[-0.65rem] flex items-center gap-4 rounded-xl bg-muted px-3 py-2 text-foreground hover:text-foreground"
                >
                <ShoppingCart class="h-5 w-5" />
                Orders
                <Badge class="ml-auto flex h-6 w-6 shrink-0 items-center justify-center rounded-full">
                    6
                </Badge>
                </a>
                <a
                href="#"
                class="mx-[-0.65rem] flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground"
                >
                <Package class="h-5 w-5" />
                Products
                </a>
                <a
                href="#"
                class="mx-[-0.65rem] flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground"
                >
                <Users class="h-5 w-5" />
                Customers
                </a>
                <a
                href="#"
                class="mx-[-0.65rem] flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground"
                >
                <LineChart class="h-5 w-5" />
                Analytics
                </a>
            </nav>
            <div class="mt-auto">
                <Card>
                <CardHeader>
                    <CardTitle>Upgrade to Pro</CardTitle>
                    <CardDescription>
                    Unlock all features and get unlimited access to our
                    support team.
                    </CardDescription>
                </CardHeader>
                <CardContent>
                    <Button size="sm" class="w-full">
                    Upgrade
                    </Button>
                </CardContent>
                </Card>
            </div>
            </SheetContent>
        </Sheet>

        <div class="w-full flex-1">
            <form>
            <div class="relative">
                <Search class="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground" />
                <Input
                type="search"
                placeholder="Search products..."
                class="w-full appearance-none bg-background pl-8 shadow-none md:w-2/3 lg:w-1/3"
                />
            </div>
            </form>
        </div>

        <!-- User profile dropdown -->
        <ToggleTheme/>

        <UserProfile :user="user"/>
        </header>
        <!-- Main Content -->
      <main class="lg:p-6 overflow-hidden">
        <slot></slot>
    </main>
</div>

</div>
<Toaster />
</template>
