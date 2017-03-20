import React from 'react';
import { Link } from 'react-router';
import { Router } from 'react-router';
import { browserHistory } from 'react-router';

var Sidebar = React.createClass({

  _onLogoutBtnClick : function(){
      localStorage.removeItem("auth_user");
      browserHistory.push('/app/login');
  },

  render(){
    return (
      <div id="sidebar-default" className="main-sidebar">
        <div className="current-user">
            <img className="avatar" src="images/avatars/1.jpg" />
            <span>
              {JSON.parse(localStorage.getItem('auth_user'))["full_name"]}
              <i className="fa fa-chevron-down"></i>
            </span>
          <ul className="menu">
            <li>
              <a href="account-profile.html">Account settings</a>
            </li>
            <li>
              <a href="account-billing.html">Billing</a>
            </li>
            <li>
              <a href="account-notifications.html">Notifications</a>
            </li>
            <li>
              <a href="account-support.html">Help / Support</a>
            </li>
            <li>
              <a href="signup.html">Sign out</a>
            </li>
          </ul>
        </div>

        <div className="menu-section">
          <h3 onClick={this._onLogoutBtnClick}>Logout</h3>
        </div>


        <div className="menu-section">
          <h3>Students</h3>
          <ul>
            <li>
              <Link to={'/app/admin/students'} style={{ marginRight : '10px'}} className="new-user btn btn-success pull-right">
               List all
             </Link>
            </li>
            <li>
              <Link to={'/app/admin/students/create'} style={{ marginRight : '10px'}} className="new-user btn btn-success pull-right">
               Create
             </Link>
            </li>
          </ul>
        </div>

      </div>
    );
  }
});

export default Sidebar;
