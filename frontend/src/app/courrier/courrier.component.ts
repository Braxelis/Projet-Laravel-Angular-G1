import { Component } from '@angular/core';
import { CourrierService } from '../services/courrier.service';

@Component({
  selector: 'app-courrier',
  templateUrl: './courrier.component.html'
})
export class CourrierComponent {
  type: 'entrant' | 'sortant' = 'entrant';
  date: string = '';
  objet: string = '';
  service: string = '';
  personne: string = '';
  file?: File;

  constructor(private courrierService: CourrierService) {}

  onFileSelected(event: any) {
    this.file = event.target.files[0];
  }

  enregistrer() {
    const formData = new FormData();
    formData.append('type', this.type);
    formData.append('date', this.date);
    formData.append('objet', this.objet);
    formData.append('service', this.service);
    formData.append('personne', this.personne);
    if (this.file) formData.append('pieceJointe', this.file);

    this.courrierService.addCourrier(formData).subscribe({
      next: () => alert('Courrier enregistré avec succès'),
      error: err => alert('Erreur : ' + err.message)
    });
  }
}
