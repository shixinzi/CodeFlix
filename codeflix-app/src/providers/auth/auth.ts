
import { Injectable } from '@angular/core';
import {JwtClient} from "../jwt-client/jwt-client";
import {JwtPayload} from "../../models/jwt-payload";

/*
  Generated class for the AuthProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class Auth {
  private _user = null;

  constructor(public jwtClient:JwtClient) {
    this.user().then((user) => {
      console.log(user);
    })
  }

  user():Promise<Object>{
      return new Promise((resolve) => {
          if (this._user){
            resolve(this._user);
          }

          this.jwtClient.getPayload().then((payload:JwtPayload) => {
              if (payload) {
                  this._user = payload.user;
              }
              resolve(this._user);
          });

      });
  }

  login({email, password}): Promise<Object>{
    return this.jwtClient
        .accessToken({email, password})
        .then(() =>{
           return this.user();
        });
  }

  logout(){
    return this.jwtClient
        .revokeToken()
        .then(() => {
        this._user = null;
    });
  }


}
