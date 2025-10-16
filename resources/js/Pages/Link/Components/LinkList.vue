<script setup lang="ts">
import { Head, Link } from "@inertiajs/vue3";
import type { Link as LinkType, Pagination as PaginationType } from "@/types";
import { Badge } from '@/Components/ui/badge';
import { Button } from '@/Components/ui/button';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/Components/ui/card';
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator, DropdownMenuTrigger } from '@/Components/ui/dropdown-menu';
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/Components/ui/table';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/Components/ui/tabs';
import { File, ListFilter, MoreHorizontal, Truck, Undo2 } from 'lucide-vue-next';

const props = defineProps<{
    links: {
        data: LinkType[];
        meta: PaginationType;
    };
}>();

const links = props.links.data;

</script>

<template>
    <Tabs default-value="all">
      <div class="flex items-center">
        <TabsList>
          <TabsTrigger value="all"> All </TabsTrigger>
          <TabsTrigger value="placed"> Placed </TabsTrigger>
          <TabsTrigger value="processed"> Processed </TabsTrigger>
        </TabsList>
        <div class="ml-auto flex items-center gap-2">
          <DropdownMenu>
            <DropdownMenuTrigger as-child>
              <Button variant="outline"  class="h-7 gap-1">
                <ListFilter class="h-3.5 w-3.5" />
                <span class="sr-only sm:not-sr-only sm:whitespace-nowrap"> Filter </span>
              </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent align="end">
              <DropdownMenuLabel>Filter by</DropdownMenuLabel>
              <DropdownMenuSeparator />
              <DropdownMenuItem checked> Placed </DropdownMenuItem>
              <DropdownMenuItem>Processed</DropdownMenuItem>
            </DropdownMenuContent>
          </DropdownMenu>
          <Button  variant="outline" class="h-7 gap-1">
            <File class="h-3.5 w-3.5" />
            <span class="sr-only sm:not-sr-only sm:whitespace-nowrap"> Export </span>
          </Button>
        </div>
      </div>
      <TabsContent value="all">
        <Card>
          <CardHeader>
            <CardTitle>Links</CardTitle>
            <CardDescription> Manage your links. </CardDescription>
          </CardHeader>
          <CardContent>
            <Table>
              <TableHeader>
                <TableRow>
                  <TableHead class="hidden w-[100px] sm:table-cell">
                    <span class="sr-only">id</span>
                  </TableHead>
                  <TableHead>Short URL</TableHead>
                  <TableHead>Original URL</TableHead>
                  <TableHead>Status</TableHead>
                  <TableHead class="hidden md:table-cell"> Created at </TableHead>
                  <TableHead>
                    <span class="sr-only">Actions</span>
                  </TableHead>
                </TableRow>
              </TableHeader>
              <TableBody>
                <TableRow v-for="link in links" :key="link.id">
                  <TableCell class="hidden sm:table-cell">
                    <span class="text-xl"> #{{ link.id }}</span>
                  </TableCell>
                  <TableCell class="font-medium">
                    {{ link.shortened_url }}
                  </TableCell>
                  <TableCell class="font-medium">
                    ${{ link.original_url }}
                  </TableCell>
                  <TableCell>
                    <Badge variant="outline">
                      {{ link.status }}
                    </Badge>
                  </TableCell>
                  <TableCell class="hidden md:table-cell">
                    {{ link.created_at }}
                  </TableCell>
                  <TableCell class="flex">
                    <DropdownMenu>
                      <DropdownMenuTrigger as-child>
                        <Button aria-haspopup="true" size="icon" variant="ghost">
                          <MoreHorizontal class="h-4 w-4" />
                          <span class="sr-only">Toggle menu</span>
                        </Button>
                      </DropdownMenuTrigger>
                      <DropdownMenuContent align="end">
                        <DropdownMenuLabel>Actions</DropdownMenuLabel>
                        <Link :href="route('links.index')" class="w-full cursor-pointer"><DropdownMenuItem class="flex items-center gap-4"> <Truck class="size-4"/> Process</DropdownMenuItem></Link>
                      </DropdownMenuContent>
                    </DropdownMenu>
                  </TableCell>
                </TableRow>
              </TableBody>
            </Table>
          </CardContent>
          <CardFooter class="flex flex-col items-center md:flex-row md:justify-between">
            <div class="text-xs text-muted-foreground">
              Showing
              <strong>{{ props.links.meta.from + '-' + props.links.meta.to }}</strong>
              of <strong>{{ props.links.meta.total }}</strong>
              links
            </div>
            <div class="flex gap-2 mt-4">
              <Link v-for="link in props.links.meta.links" :href="link.url">
                <Button v-html="link.label" :variant="link.active ? 'default' : 'outline'" :key="link.url"> </Button>
              </Link>
            </div>
          </CardFooter>
        </Card>
      </TabsContent>
    </Tabs>
</template>
