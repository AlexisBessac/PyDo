import { Routes } from '@angular/router';
import { ConnexionComponent } from './connexion/connexion.component';
import { InscriptionComponent } from './inscription/inscription.component';
import { Page404Component } from './page404/page404.component';

export const routes: Routes = [
    {path: "inscription", component: InscriptionComponent},
    {path: "connexion", component: ConnexionComponent},
    {path: "", redirectTo: "accueil", pathMatch: "full" },
    {path: "", component :Page404Component},
];
