import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms'
import { HttpClientModule } from '@angular/common/http';
import { AppComponent } from './app.component';
import { LoginComponent } from './auth/login/login.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { UserManagementComponent } from './usermanagement/usermanagement.component';

@NgModule({
  declarations: [
  ],
  imports: [
    AppComponent,
    LoginComponent,
    DashboardComponent,
    UserManagementComponent,
    BrowserModule,
    FormsModule,
    HttpClientModule,
  ],
  providers: [],
  // bootstrap: [AppComponent]
})
export class AppModule { }

// --- app/app.component.ts ---
import { Component } from '@angular/core';
import { CourrierComponent } from './courrier/courrier.component';

@Component({
  selector: 'app-root',
  template: '<router-outlet></router-outlet>',
})
