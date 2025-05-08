import { Component, OnInit } from '@angular/core';
import { UserService } from '../services/user.service';
import { User } from '../models/users';

@Component({
  selector: 'app-user-management',
  templateUrl: './usermanagement.component.html',
})
export class UserManagementComponent implements OnInit {
  users: User[] = [];

  constructor(private userService: UserService) {}

  ngOnInit(): void {
    this.loadUsers();
  }

  loadUsers() {
    this.userService.getAll().subscribe(data => this.users = data);
  }

  deleteUser(id: number) {
    if (confirm('Supprimer cet utilisateur ?')) {
      this.userService.delete(id).subscribe(() => this.loadUsers());
    }
  }
}
