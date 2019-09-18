import { Component } from '@angular/core';
import {ApiService} from "../services/api.service";

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  public users: Array<any>;
  public editUser = [];
  public addTask = [];
  public userTasks: Array<any>;
  public addUser = false;
  public newUser = { name: undefined, email: undefined};
  public newTask = { title: undefined, description: undefined, status: undefined};

  constructor(
      private api: ApiService,
  ) {}

  ionViewWillEnter() {
    this.getUsers();
  }

  getUsers() {
    const endpoint = '/api/users';

    this.api.get(endpoint)
        .then(res => {
          this.users = res;
        })
        .catch(err => {
          console.log(err);
        })
  }

  showTasksFromUser(indexUser) {
      if (this.userTasks && this.userTasks[0].userId === this.users[indexUser].id) {
          this.userTasks = undefined;
      } else {
          const endpoint = '/api/users/' + this.users[indexUser].id + '/tasks';

          this.api.get(endpoint)
              .then(res => {
                  this.userTasks = res;
              })
              .catch(err => {
                  console.log(err);
              });
      }
  }

  modifyUser(indexUser) {
    const user = this.users[indexUser];
    const endpoint = '/api/users/' + user.id;
    const params = {
        name: user.name,
        email: user.email
    };

    this.api.put(endpoint, params)
        .then(res => {
            this.getUsers();
            this.editUser[indexUser] = false;
        })
        .catch(err => {
            console.log(err);
        })
  }

  saveUser() {
      const endpoint = '/api/users';
      const body = {
          name: this.newUser.name,
          email: this.newUser.email
      };

      this.api.post(endpoint, body)
          .then(res => {
              this.newUser.email = undefined;
              this.newUser.name = undefined;
              this.addUser = false;
              this.getUsers();
          })
          .catch(err => {
              console.log(err);
          })
  }

    saveTask(indexUser) {
        const endpoint = '/api/tasks';
        const body = {
            title: this.newTask.title,
            description: this.newTask.description,
            status: this.newTask.status,
            userId: this.users[indexUser].id
        };

        this.api.post(endpoint, body)
            .then(res => {
                this.newTask.title = undefined;
                this.newTask.description = undefined;
                this.newTask.status = undefined;
                this.addTask[indexUser] = false;
                this.showTasksFromUser(indexUser);
            })
            .catch(err => {
                console.log(err);
            })
    }

    deleteTask(indexTask) {
      const endpoint = '/api/tasks/' + this.userTasks[indexTask].id;

      this.api.delete(endpoint)
          .then(res => {
              delete this.userTasks[indexTask]
          })
          .catch(err => {
              console.log(err);
          })
    }
}
