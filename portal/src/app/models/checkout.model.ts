export interface CheckoutModel {
    name?: string;
    lastname?:string;
    email?:string;
    payment?:"BBVA" | "DEBITCARD" | "PAYPAL";
    address?: string;
    card?: CardInfo;
}

export interface CardInfo{
    bankAccountHolder?:string;
    cardNumber?:string;
    expiryMonth?: number;
    expiryYear?: number;
    ccv?:string;    
}
