import { Routes } from '@angular/router';
import { ConnexionComponent } from './connexion/connexion.component';
import { InscriptionComponent } from './inscription/inscription.component';
import { Page404Component } from './page404/page404.component';
import { AccueilComponent } from './accueil/accueil.component';

export const routes: Routes = [
    {path: '', component: AccueilComponent }, 
    {path: "", redirectTo: "accueil", pathMatch: "full" },
    {path: "inscription", component: InscriptionComponent},
    {path: "connexion", component: ConnexionComponent},
    {path: "", component :Page404Component},
];
