import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { User } from '../models/users';

@Injectable({ providedIn: 'root' })
export class UserService {
  constructor(private http: HttpClient) {}

  getAll() {
    return this.http.get<User[]>('/api/users');
  }

  getById(id: number) {
    return this.http.get<User>(`/api/users/${id}`);
  }

  update(id: number, data: any) {
    return this.http.put(`/api/users/${id}`, data);
  }

  delete(id: number) {
    return this.http.delete(`/api/users/${id}`);
  }
}
