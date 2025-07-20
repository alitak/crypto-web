export default interface Wallet {
    coin: string
    package_count: number
    trigger_price: number
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
    // potential_value: number
    // potential_account: number
    // potential_profit: number
    // package_count_total: string
    // cost_total: string
    package_profit: number
    url_profit: number
}
