import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';

@Injectable()

export class LoginService{

  public url: string;

  constructor(
    public _http: HttpClient
  ){
    this.url = "http://133.145.3.120/pruebas/TiendaWS/usuarios";
  }


    getMostrarUser(): Observable<any>{
      return this._http.get(this.url);
    }



}
