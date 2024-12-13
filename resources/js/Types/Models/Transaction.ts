export default interface Transaction {
    coin: string
    event: string
    price: number
    average: number
    stock: number
    cost: number
    min_threshold: number
    max_threshold: number
    package_count: number
    account: string
    total: number
    quantity: number
    happened_at: string
}
