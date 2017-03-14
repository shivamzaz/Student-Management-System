import React from 'react';

const Sidebar = React.createClass({

  render : function(){
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
          <h3>General</h3>
          <ul>
            <li>
              <a href="index.html">
                <i className="ion-android-earth"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="users.html" className="active" data-toggle="sidebar">
                <i className="ion-person-stalker"></i> <span>Lists & Tables</span>
                <i className="fa fa-chevron-down"></i>
              </a>
              <ul className="submenu">
                <li><a href="users.html" className="active">Customers list</a></li>
                <li><a href="datatables.html">Orders (Datatables)</a></li>
                <li><a href="search.html">Products (Filters)</a></li>
              </ul>
            </li>
            <li>
              <a href="users.html" data-toggle="sidebar">
                <i className="ion-stats-bars"></i> <span>Reports</span>
                <i className="fa fa-chevron-down"></i>
              </a>
              <ul className="submenu">
                <li><a href="reports.html">Reports orders</a></li>
                <li><a href="reports-alt.html">Report sales</a></li>
              </ul>
            </li>
            <li>
              <a href="users.html" data-toggle="sidebar">
                <i className="ion-pricetags"></i> <span>Forms</span>
                <i className="fa fa-chevron-down"></i>
              </a>
              <ul className="submenu">
                <li><a href="form.html">New Customer (validation)</a></li>
                <li><a href="form-product.html">New Product (add-ons)</a></li>
                <li><a href="wizard.html">Wizard</a></li>
              </ul>
            </li>
          </ul>
        </div>

      </div>
    );
  }
});

export default Sidebar;
