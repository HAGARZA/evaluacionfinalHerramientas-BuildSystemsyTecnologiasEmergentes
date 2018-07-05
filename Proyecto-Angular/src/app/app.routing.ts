//Importar modulos del router de angular

import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';


//Importar los componentes
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './login/login.component';
import { ProductThumbnailComponent } from './product-thumbnail/product-thumbnail.component';

//Array de Rutas
const  appRoutes: Routes = [
   {path: '', component: LoginComponent},
   {path: 'login', component: LoginComponent},
   {path: 'home', component: HomeComponent},
  {path: 'product-thumbnail', component: ProductThumbnailComponent},
   {path: '**', component: LoginComponent}
]

//Exportar el modulo de ruting
export const appRoutingProviders: any[] = [];
export const routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);
