import { Form, FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { CheckoutModel } from './checkout.model';

export class Checkout {
    name: FormControl;
    lastname:FormControl;
    email:FormControl;
    payment:FormControl;
    address: FormControl;
    card: FormGroup;

    constructor(checkout?: CheckoutModel){
        this.name = new FormControl((checkout ? checkout.name : ''), [Validators.required]);
        this.lastname = new FormControl((checkout ? checkout.lastname : ''), [Validators.required]);
        this.email = new FormControl((checkout ? checkout.email : ''), [Validators.required]);
        this.payment = new FormControl((checkout ? checkout.payment : ''), [Validators.required]);
        this.address = new FormControl((checkout ? checkout.address: ''), [Validators.required]);
        this.card = FormBuilder.prototype.group({
            bankAccountHolder: [checkout && checkout.card ? checkout.card.bankAccountHolder : '', [Validators.required]],
            cardNumber: [checkout && checkout.card ? checkout.card.cardNumber : null],
            expiryMonth: [checkout && checkout.card ? checkout.card.expiryMonth: null],
            expiryYear: [checkout && checkout.card ? checkout.card.expiryYear: null],
            ccv: [checkout && checkout.card ? checkout.card.ccv : null]
        });
    }    
}
