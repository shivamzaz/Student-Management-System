import React from 'react';
import axios from 'axios';
import * as config from './../../../config/app';
import { Router } from 'react-router';
import { Link } from 'react-router';

var StudentList  = React.createClass({
  getInitialState : function(){
    return {
      students: [],
    }
  },
  componentDidMount(){
    axios.get(config.base_url + '/api/v1/students')
    .then(response => {
      this.setState({
        students : response.data.data
      });
    })
    .catch(function (error) {
      console.log(error);
    });
  },
// handlecli : function(){
//   this.state({});
// },

_handleSearch : function(e){
  axios.get(config.base_url + '/api/v1/students?q='+ e.target.value )
    .then(response => {
      console.log(response);
      this.setState({
        students : response.data.data
      });
    })
    .catch(function (error) {
      console.log(error);
    });
},
_deleteStudent : function(student, event){

  let _this = this;

    confirm('are you sure');
    axios.delete(config.base_url + '/api/v1/students/' + student.id, {
      headers: {
        'Content-Type': 'application/json'
      }
    })
    .then(response => {
      var students_copy = _this.state.students.slice();
      var student_index = _this.state.students.indexOf(student);
      students_copy.splice(student_index, 1);
      _this.setState({
        students : students_copy
      });
    })
},
  render(){
    return (
      <div id="users">
        <div id="content">
          <div className="menubar fixed">
            <div className="sidebar-toggler visible-xs">
              <i className="ion-navicon"></i>
            </div>

            <div className="page-title">
              Students
            </div>
            <form className="search hidden-xs">
              <i className="fa fa-search"></i>
              <input type="text" name="q" onChange={this._handleSearch} placeholder="Search Students...." />
              <input type="submit" />
            </form>
            <Link to={'/app/admin/students/create'} style={{ marginRight : '10px'}} className="new-user btn btn-success pull-right">
             New User
           </Link>
            {/* <button type="submit" onClick={this.handlecli} className="btn btn-success">Log Out </button> */}
          </div>
          <div className="content-wrapper">
            <div className="row page-controls">
              <div className="col-md-12 filters">
                <label>Filter users:</label>
                <a href="#">All users (243)</a>
                <a href="#" className="active">Active (3)</a>
                <a href="#">Suspended (8)</a>
                <a href="#">Prospects</a>

                <div className="show-options">
                  <div className="dropdown">
                      <a className="button" data-toggle="dropdown" href="#">
                        <span>
                          Sort by
                          <i className="fa fa-unsorted"></i>
                        </span>
                      </a>
                      <ul className="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="#">Name</a></li>
                        <li><a href="#">Signed up</a></li>
                      <li><a href="#">Last seen</a></li>
                      <li><a href="#">Browser</a></li>
                      <li><a href="#">Country</a></li>
                      </ul>
                  </div>
                  <a href="#" data-grid=".users-list" className="grid-view active"><i className="fa fa-th-list"></i></a>
                  <a href="#" data-grid=".users-grid" className="grid-view"><i className="fa fa-th"></i></a>
                </div>
              </div>
            </div>

            <div className="row users-list">
              <div className="col-md-12">
                <div className="row headers">
                  <div className="col-sm-2 header select-users">
                    <input type="checkbox" />
                    <div className="dropdown bulk-actions">
                      <a data-toggle="dropdown" href="#">
                          Bulk actions
                          <span className="total-checked"></span>

                          <i className="fa fa-chevron-down"></i>
                        </a>
                        <ul className="dropdown-menu" role="menu" aria-labelledby="dLabel">
                          <li><a href="#">Add tags</a></li>
                        <li><a href="#">Delete users</a></li>
                        <li><a href="#">Edit customers</a></li>
                        <li><a href="#">Manage permissions</a></li>
                        </ul>
                    </div>
                  </div>
                  <div className="col-sm-3 header hidden-xs">
                    <label><a href="#">Name</a></label>
                  </div>
                  <div className="col-sm-3 header hidden-xs">
                    <label><a href="#">Email</a></label>
                  </div>
                  <div className="col-sm-2 header hidden-xs">
                    <label><a href="#">Total spent</a></label>
                  </div>
                  <div className="col-sm-2 header hidden-xs">
                      <label className="text-right"><a href="#">Delete</a></label>
                  </div>
                </div>


                {this.state.students.map((student, index) => (
                  <div className="row user" key={index}>
                    <div className="col-sm-2 avatar">
                      <input type="checkbox" name="select-user" />
                      <img src="/images/avatars/2.jpg" />
                    </div>
                    <div className="col-sm-3">
                      <a href="user-profile.html" className="name">{student.full_name}</a>
                    </div>
                    <div className="col-sm-3">
                      <div className="email">john.39@gmail.com</div>
                    </div>
                    <div className="col-sm-2">
                      <div className="total-spent">
                        $9,400.00
                      </div>
                    </div>
                    <div className="col-sm-2">
                      <div className="created-at">
                        <span className="btn btn-danger" onClick={this._deleteStudent.bind(this, student)}>Delete</span>
                      </div>
                    </div>
                  </div>
                ))}

                { this.state.students.length == 0 ? (
                  <div>No Student found</div>
                ) : false }



                <div className="row pager-wrapper">
                  <div className="col-sm-12">
                    <ul className="pager">
                        <li><a href="#">Previous</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>


          </div>
        </div>
      </div>
);
  }
});

module.exports = StudentList;
