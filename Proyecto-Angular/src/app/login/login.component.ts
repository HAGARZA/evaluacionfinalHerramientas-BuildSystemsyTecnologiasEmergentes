import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';
import { LoginService } from '../services/login.service';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
  providers: [LoginService]
})
export class LoginComponent implements OnInit {

  public txt_user: string;
  public txt_passw: string;
  public idUsuario: any;
  public valida_usuario: boolean;



  constructor(
    private _route: ActivatedRoute,
    private _router: Router,
    private _loginService: LoginService
  ) {
  this.txt_user = "";
  this.txt_passw = "";
  this.idUsuario = 1;
  this.valida_usuario = false;
  }

  ngOnInit() {

  }


  onSubmit(form){
    //alert("hola mundo " + this.txt_user);



 this.mostrarUsuario();


      if(this.valida_usuario == true){

              console.log("Acceso Autorizado");
               form.reset();
              this.rederigir();
             }else{
             console.log("Acceso Denegado");
             }

  }

  rederigir(){
   this._router.navigate(['/home']);
 }



  mostrarUsuario(){
    //NOTA: Un obserbale siempre tiene un  metodo subscribe, para subscribirme  y el metodo subscribe tiene 2 fuciones de callbacks una que recoge el resultado y otra que recoge el posible error.


    this._loginService.getMostrarUser().subscribe(

     result => {
        //console.log(result);

        for(var i = 0; i< result.length; i++)
        {
            if(result[i].nombre == this.txt_user  && result[i].passw == this.txt_passw)
            {
                console.log("Encontro en: " + this.txt_user);
                this.valida_usuario = true;
                console.log("Acceso Autorizado");
                this.rederigir();
            }
        }

        if(this.valida_usuario == false)
        {
            console.log("No encontro id: " + this.txt_user);
              this.valida_usuario = false;
        }

    },
    error => {
      console.log(<any>error);
    }
    );

  }




}
