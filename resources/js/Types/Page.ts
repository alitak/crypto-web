// resources/js/Types/Page.ts
import type { PageProps as InertiaPageProps } from "@inertiajs/core"
import type Auth from "@/Types/Auth"
import type Notifications from "@/Types/Notifications"
import type MenuGroup from "@/Types/Models/MenuGroup"
import type Child from "@/Types/Models/Child"
import type Group from "@/Types/Models/Group"

export interface PageProps extends InertiaPageProps {
    auth: {
        data: Auth
    }
    environment: string
    jetstream: {
        flash: {
            banner: string
            bannerStyle: string
        }
    }
    notifications: Notifications
    menuGroups: MenuGroup[]
    selectedChild: Child
    selectedGroup: Group
    version: string
}

export interface Page {
    component: string
    props: PageProps
    rememberedState: string
    scrollRegions: string
    url: string
    version: string
}
