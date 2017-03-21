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
              <div className="name">
                <img className="avatar" src="/images/avatars/1.jpg" />
                <span>
              {JSON.parse(localStorage.getItem('auth_user'))["full_name"]}
              <i className="fa fa-chevron-down"></i>
            </span>
              </div>
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
          <h3>Dashboard</h3>
          <ul>
            <li>
              <Link to={'/app/admin/students'} style={{ marginRight : '10px'}} className="new-user pull-right">
                <i className="ion-person-stalker"></i>
                    <span>List All</span>
             </Link>
            </li>
            <li>
              <Link to={'/app/admin/students/create'} style={{ marginRight : '10px'}} className="new-user pull-right">
              <i className="ion-plus-round"></i>
                  <span>New student</span>
             </Link>
            </li>
            <li>
           </li>
          </ul>
        </div>

      </div>
    );
  }
});

export default Sidebar;
