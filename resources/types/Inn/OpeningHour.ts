export default interface OpeningHour {
    id: number
    inn_id: number
    day_of_week: number
    exception_date: string
    is_closed: Boolean
    exception: Boolean
    open_from: string
    open_to: string
    created_at: string
    updated_at: string
}