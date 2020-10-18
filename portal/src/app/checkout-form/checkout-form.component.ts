import { Component, OnDestroy, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Subscription } from 'rxjs';
import { Checkout } from '../models/checkout.fg';

@Component({
  selector: 'app-checkout-form',
  templateUrl: './checkout-form.component.html',
  styleUrls: ['./checkout-form.component.css']
})
export class CheckoutFormComponent implements OnInit, OnDestroy {
  form: FormGroup;
  paymentChanged$: Subscription;
  constructor(private fb: FormBuilder) { }

  ngOnInit(): void {
    this.form = this.fb.group(new Checkout());
    this.paymentChanged$ = this.form.get('payment').valueChanges.subscribe((val: string) => {
      if(val.toLowerCase() === 'bbva'){
        this.sendNotification();
      }
    });
  }

  ngOnDestroy(): void {
    this.paymentChanged$.unsubscribe();
  }

  purchase(){
    console.log('object >>', this.form.getRawValue());
  }

  sendNotification(){
    console.log('enviar notificacion');
  }

}
