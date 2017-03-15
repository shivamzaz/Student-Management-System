import React from 'react';

class Sidebar extends React.Component{

  render(){
    return (
      <div id="sidebar-default" className="main-sidebar">
        <div className="current-user">
          <a href="index.html" className="name">
            <img className="avatar" src="images/avatars/1.jpg" />
            <span>
              John Smith
              <i className="fa fa-chevron-down"></i>
            </span>
          </a>
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
          <h3>Students</h3>
          <ul>
            <li>
              <a href="index.html">
                <i className="ion-android-earth"></i>
                <span>List All</span>
              </a>
            </li>
            <li>
              <a href="index.html">
                <i className="ion-android-earth"></i>
                <span>Create</span>
              </a>
            </li>
          </ul>
        </div>

      </div>
    );
  }
};

export default Sidebar;
