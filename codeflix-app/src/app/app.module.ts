import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { ListPage } from '../pages/list/list';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { Test } from '../components/test/test';
import {LoginPage} from "../pages/login/login";

import { HttpModule } from '@angular/http';
import {IonicStorageModule} from "@ionic/storage";
import { JwtClient } from '../providers/jwt-client/jwt-client';
import {JwtHelper} from "angular2-jwt";
import {Auth} from '../providers/auth/auth';


@NgModule({
  declarations: [
    MyApp,
    Test,
    HomePage,
    ListPage,
    LoginPage
  ],
  imports: [
    HttpModule,
    BrowserModule,
    IonicModule.forRoot(MyApp),
      IonicStorageModule.forRoot({
          driverOrder: ['localstorage']
      }),
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    HomePage,
    ListPage,
    Test,
    LoginPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    JwtClient,
      JwtHelper,
    Auth
  ]
})
export class AppModule {}
