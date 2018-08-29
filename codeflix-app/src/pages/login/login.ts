import { Component } from '@angular/core';
import {IonicPage, MenuController, NavController, NavParams} from 'ionic-angular';
import 'rxjs/add/operator/toPromise'
import {Auth} from "../../providers/auth/auth";
import {HomePage} from "../home/home";

/**
 * Generated class for the LoginPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {

    user ={
        email:'admin@user.com',
        password:'secret'
    };

    constructor(
        public navCtrl: NavController,
        public menuCtrl: MenuController,
        public navParams: NavParams,
        private auth:Auth ) {
        this.menuCtrl.enable(false);
    }

    ionViewDidLoad() {
        console.log('ionViewDidLoad LoginPage');
    }

    login() {
        this.auth.login(this.user)
            .then(() => {
               this.afterLogin();
            });
       /* this.jwtClient.accessToken({email: this.email, password: this.password})
            .then((token) => {
                console.log(token);
            });
    */}

    afterLogin(){
        this.menuCtrl.enable(true);
        this.navCtrl.push(HomePage);
    }
}