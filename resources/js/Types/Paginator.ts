import type PaginatorLink from "@/Types/PaginatorLink"

export default interface Paginator<T> {
    data: T[]
    current_page: number
    first_page_url: string
    from: number
    last_page: number
    last_page_url: string
    links: PaginatorLink[]
    next_page_url: string | null
    path: string
    per_page: number
    prev_page_url: string | null
    to: number
    total: number
}
