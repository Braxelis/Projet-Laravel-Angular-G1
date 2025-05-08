import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Courrier } from '../models/courrier';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CourrierService {
  private apiUrl = 'http://localhost:8000/api/courriers'; // Assurez-vous que votre backend accepte les requêtes

  constructor(private http: HttpClient) {}

  getCourriers(): Observable<Courrier[]> {
    return this.http.get<Courrier[]>(this.apiUrl);
  }

  addCourrier(data: FormData): Observable<any> {
    return this.http.post(this.apiUrl, data);
  }
}
