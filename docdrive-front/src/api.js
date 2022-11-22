import axios from 'axios'

export class HttpClient {
  constructor(token) {

    this.request = axios.create({
      baseUrl: 'http://localhost:8082',
      headers: {
        Accept: 'application/json',
        Authorization: 'Bearer ' + token
      }
    })
  }
}


