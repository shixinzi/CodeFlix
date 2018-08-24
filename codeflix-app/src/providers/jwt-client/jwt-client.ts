import { Injectable } from '@angular/core';
import {JwtCredentials} from "../../models/jwt-credentials";
import {Http, Response} from "@angular/http";
import {Storage} from "@ionic/storage";

/*
  Generated class for the JwtClientProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class JwtClient {

    private _token = null;

  constructor(public http: Http, public storage:Storage) {
    console.log('Hello JwtClientProvider Provider');
  }

accessToken(jwtCredentials: JwtCredentials): Promise<string> {
    return this.http.post('http://codeflix.test/api/access_token', jwtCredentials)
        .toPromise()
        .then((response: Response) => {
            let token = response.json().token;
            this._token = token;
            this.storage.set('token', this._token);
            this.storage.get('token').then((token) => {
                console.log(token)
            });
              return token;
          });
  }







}
