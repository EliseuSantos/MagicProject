/******************************************\
| * Autor: Eliseu dos Santos               |
| * Git:   https://github.com/EliseuSantos |
| * Email:   s.eliseu.santos@gmail.com     |
\******************************************/
'use strict';
function gitLab() {
  this.get();
}

gitLab.prototype.get = function () {
  this.getJSON('http://git.medlynx.com.br/api/v3/projects/91/repository/commits?private_token=8XP96yhxv7rjqNChL8dW&page=1&per_page=1000&ref_name=master').then(function(data) {
    console.log(data);
  });
};

gitLab.prototype.commits = function (commits) {
  var arrayCommits = new Array();
  for (var i = 0; i < commits.length; i++) {
    commits[i];
  };
  return arrayCommits;
};

gitLab.prototype.branches = function (data) {
};

gitLab.prototype.issues = function (data) {
};

gitLab.prototype.pullREQUEST = function (data) {
};

gitLab.prototype.parametroURL = function (busca) {
  var url = {
    "commits" : "Sunscreen and hat",
    "branches" : "Umbrella and boots",
    "commit" : "Scarf and Gloves",
    "projeto" : "Play it by ear",
    "default" : "Play it by ear"
  }
  var urlGit = whatToBring[weather] || whatToBring["default"];
  return urlGit;
};

gitLab.prototype.getRepositorio = function (repo) {
};

gitLab.prototype.getJSON = function (url) {
  return new Promise(function(resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.open('get', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
      var status = xhr.status;
      if (status == 200) {
        resolve(xhr.response);
      } else {
        reject(status);
      }
    };
    xhr.send();
  });
};