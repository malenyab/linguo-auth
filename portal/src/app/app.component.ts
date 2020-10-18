import { Component, OnInit } from '@angular/core';
import { AngularFireMessaging } from '@angular/fire/messaging';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  title = 'portal';
  constructor(private angularFireMessaging: AngularFireMessaging) {
    
  }

  ngOnInit() {
    this.angularFireMessaging.requestToken.subscribe(
      (token) => {
        console.log('token', token);
      });

    this.angularFireMessaging.messages.subscribe(
      (msg) => {
        console.log("show message!", msg);
      })
  }
}
