import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Activite } from '../models/activite';

@Injectable({ providedIn: 'root' })
export class ActivityService {
  constructor(private http: HttpClient) {}

  getAllActivites() {
    return this.http.get<Activite[]>('/api/activites');
  }

  logActivite(description: string) {
    return this.http.post('/api/activites', { description });
  }
}
