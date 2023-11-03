import type OpeningHour from "./Inn/OpeningHour";
import type Address from "./Inn/Address";
import type Owner from "./Inn/Owner";
import type Contact from "./Inn/Contact";

export default interface Inn {
    id: number
    name: string
    description: string
    photo_url: string
    establishment: string
    created_at: string
    updated_at: string
    identification_number: string
    today_hours?: OpeningHour[]
    address?: Address
    owner?: Owner
    contact?: Contact
}