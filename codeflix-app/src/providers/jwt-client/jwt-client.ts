import { Injectable } from '@angular/core';
import {JwtCredentials} from "../../models/jwt-credentials";
import {Http, Response} from "@angular/http";

/*
  Generated class for the JwtClientProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class JwtClient {

  constructor(public http: Http) {
    console.log('Hello JwtClientProvider Provider');
  }

accessToken(jwtCredentials: JwtCredentials): Promise<string> {
    return this.http.post('http://localhost:8000/api/access_token', jwtCredentials)
        .toPromise()
        .then((response: Response) => {
            let token = response.json().token;
              return token;
          });
  }







}
