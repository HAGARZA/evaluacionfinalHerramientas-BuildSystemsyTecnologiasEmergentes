import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule, JsonpModule } from '@angular/http';

import { routing, appRoutingProviders } from './app.routing';
import { HttpClientModule} from '@angular/common/http';

import { AppComponent } from './app.component';
import { SearchBarComponent } from './search-bar/search-bar.component';
import { FiltersComponent } from './filters/filters.component';
import { ShowcaseComponent } from './showcase/showcase.component';
import { CartComponent } from './cart/cart.component';
import { ProductComponent } from './product/product.component';
import { ProductThumbnailComponent } from './product-thumbnail/product-thumbnail.component';
import { CartPreviewComponent } from './cart-preview/cart-preview.component';
import { DataShellComponent } from './data-shell/data-shell.component';
import { SortFiltersComponent } from './sort-filters/sort-filters.component';

import { DataService } from './data.service';
import { CartService } from './cart.service';
import { UrlFormComponent } from './url-form/url-form.component';

import { BarraSuperiorComponent } from './barra-superior/barra-superior.component';
import { LoginComponent } from './login/login.component';
import { HomeComponent } from './home/home.component';

@NgModule({
  declarations: [
    AppComponent,
    SearchBarComponent,
    FiltersComponent,
    ShowcaseComponent,
    CartComponent,
    ProductComponent,
    ProductThumbnailComponent,
    CartPreviewComponent,
    DataShellComponent,
    SortFiltersComponent,
    UrlFormComponent,
    BarraSuperiorComponent,
    LoginComponent,
    HomeComponent,
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    JsonpModule,
    routing,
    HttpClientModule
  ],
  providers: [
    DataService,
    CartService,
    appRoutingProviders
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
