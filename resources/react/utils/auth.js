import * as config from './../config/app';
import { checkStatus, toQueryString } from './helpers';

// register user
export function register(inputs){
  let options = {
    method: "POST",
    body: JSON.stringify(inputs),
    headers: new Headers({
      'Content-Type': 'application/json'
    }),
  };

  let url = config.base_api_url + '/register';

  return fetch( url , options)
      .then(checkStatus)
      .then(function(res) {
          return res.json();
      });
}

export function forgotPassword(inputs){
  let options = {
    method: "POST",
    body: JSON.stringify(inputs),
    headers: new Headers({
      'Content-Type': 'application/json'
    }),
  };

  let url = config.base_api_url + '/forgot-password';

  return fetch( url , options)
      .then(checkStatus)
      .then(function(res) {
          return res.json();
      });
}

export function verifyForgotPasswordHash(inputs){
  let options = {
    method: "POST",
    body: JSON.stringify(inputs),
    headers: new Headers({
      'Content-Type': 'application/json'
    }),
  };

  let url = config.base_api_url + '/forgot-password/verify';

  return fetch( url , options)
      .then(checkStatus)
      .then(function(res) {
          return res.json();
      });
}

export function verifyAccount(inputs){
  let options = {
    method: "GET",
    headers: new Headers({
      'Content-Type': 'application/json'
    }),
  };

  let url = config.base_api_url + '/user/verify' +  toQueryString(inputs);

  return fetch( url , options)
      .then(checkStatus)
      .then(function(res) {
          return res.json();
      });
}


export function resendVerificationEmail(){
  let options = {
    method: "GET",
    headers: new Headers({
      'Content-Type': 'application/json',
      'Authorization' : localStorage.getItem('pollAppApiToken'),
    }),
  };

  let url = config.base_api_url + '/user/verify/retry';

  return fetch( url , options)
      .then(checkStatus)
      .then(function(res) {
          return res.json();
      });
}


export function resetPassword(inputs){
  let options = {
    method: "POST",
    body: JSON.stringify(inputs),
    headers: new Headers({
      'Authorization' : localStorage.getItem('pollAppApiToken'),
      'Content-Type': 'application/json'
    }),
  };

  let url = config.base_api_url + '/reset-password';

  return fetch(url , options)
      .then(checkStatus)
      .then(function(res) {
          return res.json();
      });
}


export function login(inputs){
  let options = {
    method: "POST",
    body: JSON.stringify(inputs),
    headers: new Headers({
      'Content-Type': 'application/json'
    }),
  };

  let url = config.base_api_url + '/login';

  return fetch( url , options)
      .then(checkStatus)
      .then(function(res) {
        return res.json();
      });
}

export function changePassword(inputs){
  let options = {
    method: "POST",
    body: JSON.stringify(inputs),
    headers: new Headers({
      'Authorization' : localStorage.getItem('pollAppApiToken'),
      'Content-Type': 'application/json'
    }),
  };

  let url = config.base_api_url + '/change-password';

  return fetch( url , options)
      .then(checkStatus)
      .then(function(res) {
        return res.json();
      });
}

export function changeAbout(inputs){
  let options = {
    method: "POST",
    body: JSON.stringify(inputs),
    headers: new Headers({
      'Authorization' : localStorage.getItem('pollAppApiToken'),
      'Content-Type': 'application/json'
    }),
  };

  let url = config.base_api_url + '/user/profile';

  return fetch( url , options)
      .then(checkStatus)
      .then(function(res) {
        return res.json();
      });
}

export function changeAvatar(photo){
  let options = {
    method: "POST",
    body: photo,
    headers: new Headers({
      'Authorization' : localStorage.getItem('pollAppApiToken')
    }),
  };

  let url = config.base_api_url + '/user/profile/photo';

  return fetch( url , options)
      .then(checkStatus)
      .then(function(res) {
        return res.json();
      });
}

export function getAuthUser(){
  let options = {
    method: "GET",
    headers: new Headers({
      'Content-Type': 'application/json',
      'Authorization' : localStorage.getItem('pollAppApiToken')
    }),
  };

  let url = config.base_api_url + '/user';

  return fetch( url , options)
      .then(checkStatus)
      .then(function(res) {
          return res.json();
      });
}
