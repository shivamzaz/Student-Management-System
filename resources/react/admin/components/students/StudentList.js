import React from 'react';

var StudentList = React.createClass({

  getInitialState : function(){
      return {
        students : []
      }
  },

  componentWillMount : function(){
    this.setState({
      students : [
        {
          'name' : 'Pawan Kumar',
        },
        {
          'name' : 'Shivam Gupta'
        }
      ]
    });
  },

  render : function(){
    return (
      <div id="users">
        <div id="content">
          <div className="menubar fixed">
            <div className="sidebar-toggler visible-xs">
              <i className="ion-navicon"></i>
            </div>

            <div className="page-title">
              Customers
            </div>
            <form className="search hidden-xs">
              <i className="fa fa-search"></i>
              <input type="text" name="q" placeholder="Search customers, clients..." />
              <input type="submit" />
            </form>
            <a href="form.html" className="new-user btn btn-success pull-right">
              <span>New user</span>
            </a>
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
                    <label className="text-right"><a href="#">Signed up</a></label>
                  </div>
                </div>


                {this.state.students.map(student => (
                  <div className="row user">
                    <div className="col-sm-2 avatar">
                      <input type="checkbox" name="select-user" />
                      <img src="/images/avatars/2.jpg" />
                    </div>
                    <div className="col-sm-3">
                      <a href="user-profile.html" className="name">{student.name}</a>
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
                        Feb 27, 2014
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
