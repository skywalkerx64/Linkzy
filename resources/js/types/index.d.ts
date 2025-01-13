export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string
    email_verified_at?: string;
}

export interface AppData {
    app_name: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
        app: AppData
    };
};

export type Link = {
    id: number;
    title: string;
    description: string;
    original_url: string;
    shortened_url: string;
    visits: number;
    favicon: string;
    user_id?: number;
    status?: string;
    user?: User;
    created_at: string;
    updated_at: string;
}

export type Pagination = {
    current_page: number,
    from: number,
    to: number,
    total: number,
    per_page: number,
    last_page: number,
    links: {
        url: string,
        label: string,
        active: boolean,
    }[]
}
