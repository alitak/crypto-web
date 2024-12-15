export default interface Transaction {
    coin: string
    package_count: number
    current_price: number
    min_threshold: number
    min_percent: number
    max_threshold: number
    max_percent: number
    quantity: number
    stock: number
    cost: number
    avg_price: number
    current_value: number
    profit: number
    current_pnl: number
    account: number
    fees: number
    packet_price: number
    min_threshold_percent_value: number
    max_threshold_percent_value: number
    start_account: number
}
