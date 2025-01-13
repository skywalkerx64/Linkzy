import type { ColumnDef } from '@tanstack/vue-table'
import type { Link } from '@/types'
import { h } from 'vue'
import DataTableColumnHeader from './DataTableColumnHeader.vue'
import DataTableRowActions from './DataTableRowActions.vue'

export const columns: ColumnDef<Link>[] = [
  {
    accessorKey: 'title',
    header: ({ column }) => h(DataTableColumnHeader, { column, title: 'Title' }),

    cell: ({ row }) => {

      return h('div', { class: 'flex space-x-2' }, [
        h('span', { class: 'max-w-[500px] truncate font-medium' }, row.getValue('title')),
      ])
    },
  },
  {
    accessorKey: 'shortened_url',
    header: ({ column }) => h(DataTableColumnHeader, { column, title: 'Short URL' }),

    cell: ({ row }) => {

      return h('a', { class: 'flex space-x-2 underline hover:text-primary', href: row.getValue('shortened_url'), target: '_blank' }, [
        h('span', { class: 'max-w-[500px] truncate font-medium' }, row.getValue('shortened_url')),
      ])
    },
  },
  {
    accessorKey: 'original_url',
    header: ({ column }) => h(DataTableColumnHeader, { column, title: 'Original URL' }),

    cell: ({ row }) => {

    const url = String(row.getValue('original_url'));
    const truncatedUrl = url.length > 100 ? url.slice(0, 100) + '...' : url;

    return h('a', { class: 'flex space-x-2 underline hover:text-primary', href: row.getValue('original_url'), target: '_blank' }, [
      h('span', { class: 'max-w-[500px] truncate font-medium' }, truncatedUrl),
    ])
    },
  },
  {
    id: 'actions',
    cell: ({ row }) => h(DataTableRowActions, { row }),
  },
]
