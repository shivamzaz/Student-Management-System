import React from 'react';
import axios from 'axios';
import * as config from './../../../config/app';
import { Router } from 'react-router';
import { Link } from 'react-router';
import { browserHistory } from 'react-router';

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
_onredirect : function(student){
  browserHistory.push('/app/admin/students/'+ student.id);
},
_handleSearch : function(e){
  axios.get(config.base_url + '/api/v1/students?q='+ e.target.value )
    .then(response => {
      console.log(response);
      this.setState({
        students : response.data.data
        // let to roar it's setting the main students state 
      });
    })
    .catch(function (error) {
      console.log(error);
    });
},
_deleteStudent : function(student, event){

  let _this = this;

    confirm('are you sure ?');
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
             + New Student
           </Link>
            {/* <button type="submit" onClick={this.handlecli} className="btn btn-success">Log Out </button> */}
          </div>
          <div className="content-wrapper">
            
            <div className="row users-list">
              <div className="col-md-12">
                <div className="row headers">
                  <div className="col-sm-2 header select-users">
                    
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
                    <label><a href="#">Gender</a></label>
                  </div>
                  <div className="col-sm-2 header hidden-xs">
                    <label><a href="#">Year</a></label>
                  </div>
                  <div className="col-sm-2 header hidden-xs">
                      <label className="text-right">Delete</label>
                  </div>
                </div>

                {this.state.students.map((student, index) => (
                  <div className="row user" key={index}>
                    <div className="col-sm-2 avatar">
                      
                      <img src="/images/avatars/2.jpg" />
                    </div>
                    <div className="col-sm-3">
                      <Link to={`/app/admin/students/${student.id}`}  className="name">{student.full_name}</Link>
                    </div>
                    <div className="col-sm-3">
                      <div className="email">{student.gender==1 ? "male" : "female"}</div>
                    </div>
                    <div className="col-sm-2">
                      <div className="total-spent">
                        {student.year}
                      </div>

                    </div>

                    <div className="col-sm-2">
                      <div className="created-at">
                        <span className="btn btn-danger btn-sm" onClick={this._deleteStudent.bind(this, student)}>Delete</span>
                      </div>
                    </div>
                  </div>
                ))}

                { this.state.students.length == 0 ? (
                  <div>No Student found</div>
                ) : false }

              </div>

            </div>


          </div>
        </div>
      </div>
);
  }
});

module.exports = StudentList;
