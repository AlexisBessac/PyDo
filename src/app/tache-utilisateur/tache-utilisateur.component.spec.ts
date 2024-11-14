import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TacheUtilisateurComponent } from './tache-utilisateur.component';

describe('TacheUtilisateurComponent', () => {
  let component: TacheUtilisateurComponent;
  let fixture: ComponentFixture<TacheUtilisateurComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [TacheUtilisateurComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(TacheUtilisateurComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
